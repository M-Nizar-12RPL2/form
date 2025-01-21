 
        window.addEventListener('load', () => {
            document.getElementById('username').value = '';
            document.getElementById('password').value = '';
        });

        const togglePassword = document.getElementById('toggle-password');
        const passwordField = document.getElementById('password');
        
        togglePassword.addEventListener('click', () => {
            if (passwordField.type === 'text') {
                passwordField.type = 'password'; 
                togglePassword.src = "assets/galeri/invisible.png"; 
                togglePassword.alt = "Hidden Password"; 
            } else {
                passwordField.type = 'text'; 
                togglePassword.src = "assets/galeri/visible.png"; 
                togglePassword.alt = "Show Password"; 
            }
        });
