<?php
require 'assets/vendor/autoload.php';

session_start();

// Konfigurasi Google Client
$client_id = "688707321558-073nnqvsohj6e7j81veqguoa4glvhtto.apps.googleusercontent.com";
$client_secret = "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";
$redirect_uri = "http://localhost:8000/google.php";

// Inisialisasi Google Client
$client = new Google\Client();
$client->setClientId($client_id);
$client->setClientSecret($client_secret);
$client->setRedirectUri($redirect_uri);
$client->addScope("email");
$client->addScope("profile");

// Tangani proses login
if (!isset($_GET['code'])) {
    // Redirect ke halaman login Google
    $auth_url = $client->createAuthUrl();
    header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
    exit();
} else {
    // Tukar kode otorisasi dengan token akses
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token);

    // Ambil data pengguna
    $google_service = new Google\Service\Oauth2($client);
    $user_info = $google_service->userinfo->get();

    // Simpan data pengguna ke sesi
    $_SESSION['user'] = [
        'id' => $user_info->id,
        'name' => $user_info->name,
        'email' => $user_info->email,
        'picture' => $user_info->picture,
    ];

    // Redirect ke halaman dashboard
    header('Location: dashboard.php');
    exit();
}