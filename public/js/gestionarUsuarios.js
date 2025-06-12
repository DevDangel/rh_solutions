
//Script para ojo de la contraseña

        const passwordInput = document.getElementById('InputContraseña');
        const eyeIconSpan = document.getElementById('eyeIconSpan');
        const eyeIcon = document.getElementById('eyeIcon');

        // Mostrar el icono cuando el campo tiene texto
        passwordInput.addEventListener('input', () => {
            eyeIconSpan.style.display = passwordInput.value.length > 0 ? 'inline' : 'none';
        });

        // Alternar mostrar/ocultar contraseña al hacer clic en el icono
        eyeIconSpan.addEventListener('click', () => {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        });


    //Para convertir la primera letra mayuscula en por medio de capitalize en class

    document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll('.capitalize').forEach(function(input) {
        input.addEventListener('input', function (e) {
            let valor = e.target.value;
            if (valor.length > 0) {
                e.target.value = valor.charAt(0).toUpperCase() + valor.slice(1).toLowerCase();
            }
        });
    });
});


//Script para manatener los datos del modal "modificar usuario" cuando doy cerrar o doy click afuera


    document.addEventListener("DOMContentLoaded", function () {
        const modales = document.querySelectorAll('.modal');

        modales.forEach(modal => {
            modal.addEventListener('hidden.bs.modal', function () {
                const form = modal.querySelector('form');
                if (form) {
                    form.reset();
                }
            });
        });
    });



//Script externo para la validacion del documento por ajax en modal editar y crear
function validarCampo(inputId, errorId, campo, nombreCampoAmigable) {
    const input = document.getElementById(inputId);
    const error = document.getElementById(errorId);

    if (!input) return;

    input.removeEventListener('blur', input._validarHandler); // Evita duplicados

    const handler = function () {
        const valor = input.value.trim();

        if (valor.length > 0) {
            fetch(window.validarCampoUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': window.csrfToken
                },
                body: JSON.stringify({ campo: campo, valor: valor })
            })
            .then(response => response.json())
            .then(data => {
                if (data.exists) {
                    error.style.display = 'block';
                    error.textContent = `El ${nombreCampoAmigable} ya está registrado.`;
                } else {
                    error.style.display = 'none';
                    error.textContent = '';
                }
            })
            .catch(error => console.error(`Error al validar ${campo}:`, error));
        }
    };

    input._validarHandler = handler;
    input.addEventListener('blur', handler);
}

document.addEventListener('DOMContentLoaded', function () {
    // Crear usuario
    validarCampo('InputNum_documen', 'crearDocumentoError', 'num_documento', 'número de documento');
    validarCampo('InputCorreo', 'crearCorreoError', 'correo', 'correo electrónico');
    validarCampo('InputCelular', 'crearCelularError', 'celular', 'número de celular');

    // Editar usuarios (cuando se abre el modal)
    const modalesEditar = document.querySelectorAll('[id^="modalEditar"]');
    modalesEditar.forEach(modal => {
        modal.addEventListener('shown.bs.modal', function () {
            const userId = modal.id.replace('modalEditar', '');

            validarCampo(`InputNum_docume${userId}`, `numDocumentoError${userId}`, 'num_documento', 'número de documento');
            validarCampo(`InputCorre${userId}`, `correoError${userId}`, 'correo', 'correo electrónico');
            validarCampo(`InputCelula${userId}`, `celularError${userId}`, 'celular', 'número de celular');
        });
    });
});



//script para desahbilitar otros imputs segun su valor en otro imput en modal crear
document.addEventListener('DOMContentLoaded', function () {
    const profesionSelect = document.getElementById('InputProfesion');
    const registroInput = document.getElementById('InputRegistro_profe');

    if (profesionSelect && registroInput) {
        function toggleRegistroInput() {
            const selectedOption = profesionSelect.options[profesionSelect.selectedIndex];
            const valueText = selectedOption ? selectedOption.text.trim().toLowerCase() : '';

            // Deshabilitar si es vacío o las profesiones que no deben registrar
            const deshabilitar = (valueText === 'seleccione'|| valueText === '' || valueText === 'aseador' || valueText === 'conductor');

            registroInput.disabled = deshabilitar;
            if (deshabilitar) registroInput.value = '';
        }

        toggleRegistroInput();
        profesionSelect.addEventListener('change', toggleRegistroInput);
    }
});


// Habilitar/deshabilitar campo de registro profesional segun valor en imputProfesio en modal editar

document.addEventListener('DOMContentLoaded', function () {
    const modales = document.querySelectorAll('[id^="modalEditar"]');

    modales.forEach(modal => {
        modal.addEventListener('shown.bs.modal', () => {
            const userId = modal.id.replace('modalEditar', '');
            const profesionInput = document.getElementById(`InputProfesio${userId}`);
            const registroInput = document.getElementById(`InputRegistro_prof${userId}`);

            if (!profesionInput || !registroInput) return;

            function toggleRegistro() {
                const selectedOption = profesionInput.options[profesionInput.selectedIndex];
                const valor = selectedOption ? selectedOption.text.trim().toLowerCase() : '';

                const deshabilitar = (valor === 'seleccione' || valor === '' || valor === 'aseador' || valor === 'conductor');

                registroInput.disabled = deshabilitar;
                if (deshabilitar) registroInput.value = '';

                // Para ocultar el input también, descomenta esta línea:
                // registroInput.parentElement.style.display = deshabilitar ? 'none' : 'block';
            }

            // Remover el listener anterior para evitar duplicados
            profesionInput.removeEventListener('input', profesionInput._handler);
            profesionInput._handler = toggleRegistro;
            profesionInput.addEventListener('input', toggleRegistro);

            toggleRegistro(); // Ejecutar al abrir el modal
        });
    });
});




// validacion de correo por dominio

const inputCorreo = document.getElementById('InputCorreo');
const errorFormato = document.getElementById('errorFormatoCorreo');


inputCorreo.addEventListener('input', () => {
    const correo = inputCorreo.value.trim();

    // Validación local
    if (!correo.match(/^[^@\s]+@(?:hotmail\.com|gmail\.com|outlook\.com|yahoo\.com)$/i)) {
        errorFormato.style.display = 'block';
        errorFormato.textContent = 'El correo no tiene un dominio válido (ej: hotmail.com).';
        errorAjax.style.display = 'none'; // oculta el error del backend si el formato es inválido
        return;
    } else {
        errorFormato.style.display = 'none';
        errorFormato.textContent = '';
    }

    // Validación correo con AJAX
    clearTimeout(inputCorreo._timeout);
    inputCorreo._timeout = setTimeout(() => {
        fetch('/validar-correo', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ correo })
        })
        .then(async response => {
            if (!response.ok) {
                const data = await response.json();
                if (data.errors && data.errors.correo) {
                    errorAjax.style.display = 'block';
                    errorAjax.textContent = data.errors.correo[0];
                }
            } else {
                errorAjax.style.display = 'none';
                errorAjax.textContent = '';
            }
        })
        .catch(() => {
            errorAjax.style.display = 'block';
            errorAjax.textContent = 'Error de conexión. Intenta nuevamente.';
        });
    }, 500);
});
// validacion de contraseña
const inputPassword = document.getElementById('InputContraseña');
const errorFormatoPassword = document.getElementById('errorFormatoContraseña');

inputPassword.addEventListener('input', () => {
    const password = inputPassword.value.trim();

    // Requisitos: min 8 caracteres, 1 mayúscula, 1 minúscula, 1 número, 1 símbolo
    const regex = /^(?=(?:[^0-9]*\d){5})(?=[^a-z]*[a-z])(?=[^A-Z]*[A-Z])(?=[^!@#$%^&*()_+=\-{}\[\]:;"'<>,.?\/]*[!@#$%^&*()_+=\-{}\[\]:;"'<>,.?\/][^!@#$%^&*()_+=\-{}\[\]:;"'<>,.?\/]*$)[A-Za-z\d!@#$%^&*()_+=\-{}\[\]:;"'<>,.?\/]{8,10}$/;



    if (!regex.test(password)) {
        errorFormatoPassword.style.display = 'block';
        errorFormatoPassword.textContent = 'Mínimo 5 números, al menos 1 letra minúscula,al menos 1 letra mayúscula,1 símbolo(Longitud entre 8 y 10 caracteres)';
    } else {
        errorFormatoPassword.style.display = 'none';
        errorFormatoPassword.textContent = '';
    }
});
// limpiar el formulario
$('#modalRegistrar').on('hidden.bs.modal', function () {
    $('#errorFormatoContraseña').text('').hide(); // Oculta el mensaje de error
    $('#InputContraseña').val(''); // Opcional: Limpia el campo de contraseña
    console.log("PROBANDO ");
});
console.log("funcionando externo");
