document
  .querySelector(".password-toggle")
  .addEventListener("click", function () {
    const passwordInput = this.previousElementSibling;
    const type = passwordInput.type === "password" ? "text" : "password";
    passwordInput.type = type;
    this.classList.toggle("fa-eye");
    this.classList.toggle("fa-eye-slash");
  });
