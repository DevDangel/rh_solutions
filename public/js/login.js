 // Obtener los elementos necesarios
        const eyeIconSpan = document.getElementById("eyeIconSpan");
        const passwordField = document.getElementById("exampleInputPassword1");
        const eyeIcon = document.getElementById("eyeIcon");

        // Mostrar el icono cuando el campo de la contraseña tenga el foco
        passwordField.addEventListener("focus", function () {
            eyeIconSpan.style.display = "inline"; // Mostrar el icono
        });

        // No ocultar el icono cuando el campo pierda el foco (lo dejamos visible siempre)
        passwordField.addEventListener("blur", function () {
            // El icono permanece visible incluso cuando el campo pierde el foco
        });

        // Función para alternar la visibilidad de la contraseña cuando se hace clic en el icono
        eyeIconSpan.addEventListener("click", function () {
            if (passwordField.type === "password") {
                passwordField.type = "text";
                eyeIcon.classList.remove("fa-eye");
                eyeIcon.classList.add("fa-eye-slash");
            } else {
                passwordField.type = "password";
                eyeIcon.classList.remove("fa-eye-slash");
                eyeIcon.classList.add("fa-eye");
            }
        });

        // Escuchar cambios en el campo de la contraseña para ocultar el icono cuando esté vacío
        passwordField.addEventListener("input", function () {
            if (passwordField.value === "") {
                eyeIconSpan.style.display = "none";
            } else {
                eyeIconSpan.style.display = "inline";
            }
        });
