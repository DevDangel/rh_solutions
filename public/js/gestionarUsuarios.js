//Script para ojo de la contraseña

const passwordInput = document.getElementById("InputContraseña");
const eyeIconSpan = document.getElementById("eyeIconSpan");
const eyeIcon = document.getElementById("eyeIcon");

// Mostrar el icono cuando el campo tiene texto
passwordInput.addEventListener("input", () => {
    eyeIconSpan.style.display =
        passwordInput.value.length > 0 ? "inline" : "none";
});

// Alternar mostrar/ocultar contraseña al hacer clic en el icono
eyeIconSpan.addEventListener("click", () => {
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        eyeIcon.classList.remove("fa-eye");
        eyeIcon.classList.add("fa-eye-slash");
    } else {
        passwordInput.type = "password";
        eyeIcon.classList.remove("fa-eye-slash");
        eyeIcon.classList.add("fa-eye");
    }
});

//Para convertir la primera letra mayuscula en por medio de capitalize en class

document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".capitalize").forEach(function (input) {
        input.addEventListener("input", function (e) {
            let valor = e.target.value;
            if (valor.length > 0) {
                e.target.value =
                    valor.charAt(0).toUpperCase() +
                    valor.slice(1).toLowerCase();
            }
        });
    });
});

//Script para manatener los datos del modal "modificar usuario" cuando doy cerrar o doy click afuera

document.addEventListener("DOMContentLoaded", function () {
    const modales = document.querySelectorAll(".modal");

    modales.forEach((modal) => {
        modal.addEventListener("hidden.bs.modal", function () {
            const form = modal.querySelector("form");
            if (form) {
                form.reset();
            }
        });
    });
});

//Script externo para la validacion del documento por ajax en modal editar y crear
function validarCampo(inputId, errorId, campo, nombreCampoAmigable, bloquear) {
    const input = document.getElementById(inputId);
    const error = document.getElementById(errorId);

    if (!input) return;

    input.removeEventListener("input", input._inputHandler);

    const handler = function () {
        const valor = input.value.trim();

        if (valor === "") {
            error.style.display = "none";
            error.textContent = "";
            input.setCustomValidity(""); // Limpia error nativo
            return;
        }

        clearTimeout(input._timeout);

        input._timeout = setTimeout(() => {
            fetch(window.validarCampoUrl, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": window.csrfToken,
                },
                body: JSON.stringify({ campo: campo, valor: valor }),
            })
                .then((response) => response.json())
                .then((data) => {
                    if (data.exists) {
                        error.style.display = "block";
                        error.textContent = `El ${nombreCampoAmigable} ya está registrado.`;

                        if (bloquear) {
                            input.setCustomValidity(`El ${nombreCampoAmigable} ya está registrado.`);
                        } else {
                            input.setCustomValidity(""); // Solo muestra advertencia
                        }
                    } else {
                        error.style.display = "none";
                        error.textContent = "";
                        input.setCustomValidity("");
                    }
                })
                .catch((error) => {
                    console.error(`Error al validar ${campo}:`, error);
                    input.setCustomValidity("");
                });
        }, 400);
    };

    input._inputHandler = handler;
    input.addEventListener("input", handler);
}

document.addEventListener("DOMContentLoaded", function () {
    const formularioCrear = document.getElementById("formCrearUsuario");

    // Crear (bloquear si ya existe)
    validarCampo("InputNum_documen", "crearDocumentoError", "num_documento", "número de documento", true);
    validarCampo("InputCorreo", "crearCorreoError", "correo", "correo electrónico", true);
    validarCampo("InputCelular", "crearCelularError", "celular", "número de celular", true);

    if (formularioCrear) {
        formularioCrear.addEventListener("submit", (e) => {
            const inputsValidar = [
                document.getElementById("InputNum_documen"),
                document.getElementById("InputCorreo"),
                document.getElementById("InputCelular"),
            ];

            for (const input of inputsValidar) {
                if (input && !input.checkValidity()) {
                    e.preventDefault();
                    input.reportValidity();
                    break;
                }
            }
        });
    }

    // Editar (solo muestra advertencia, no bloquea)
    const modalesEditar = document.querySelectorAll('[id^="modalEditar"]');
    modalesEditar.forEach((modal) => {
        modal.addEventListener("shown.bs.modal", function () {
            const userId = modal.id.replace("modalEditar", "");

            validarCampo(`InputNum_docume${userId}`, `numDocumentoError${userId}`, "num_documento", "número de documento", false);
            validarCampo(`InputCorre${userId}`, `correoError${userId}`, "correo", "correo electrónico", false);
            validarCampo(`InputCelula${userId}`, `celularError${userId}`, "celular", "número de celular", false);
        });
    });
});

//script para desahbilitar y hacer required el imput de registro profesional segun la profesion en modal crear
document.addEventListener("DOMContentLoaded", function () {
    const profesionSelect = document.getElementById("InputProfesion");
    const registroInput = document.getElementById("InputRegistro_profe");
    const errorMsg = document.getElementById("registroProError");
    const crearBtn = document.getElementById("crearBtn");
    const form = document.getElementById("formCrearUsuario");

    const profesionesSinRegistro = ["aseador", "conductor"];

    function toggleRegistroInput() {
        const selectedOption =
            profesionSelect.options[profesionSelect.selectedIndex];
        const valueText = selectedOption
            ? selectedOption.text.trim().toLowerCase()
            : "";

        const deshabilitar =
            valueText === "seleccione" ||
            valueText === "" ||
            profesionesSinRegistro.includes(valueText);

        registroInput.disabled = deshabilitar;

        // 👇 Cambiar el required dinámicamente
        if (deshabilitar) {
            registroInput.removeAttribute("required");
            registroInput.value = "";
            errorMsg.textContent = "";
            errorMsg.style.display = "none";
        } else {
            registroInput.setAttribute("required", "required");
            validarRegistro();
        }
    }

    function validarRegistro() {
        const value = registroInput.value.trim();

        if (registroInput.disabled) return true;

        if (value === "") {
            errorMsg.textContent =
                "Este campo es obligatorio para esta profesión.";
            errorMsg.style.display = "block";
            return false;
        } else if (!/^[0-9]{7,10}$/.test(value)) {
            errorMsg.textContent = "Debe tener entre 7 y 10 dígitos numéricos.";
            errorMsg.style.display = "block";
            return false;
        } else {
            errorMsg.textContent = "";
            errorMsg.style.display = "none";
            return true;
        }
    }

    profesionSelect.addEventListener("change", toggleRegistroInput);
    registroInput.addEventListener("input", validarRegistro);

    if (crearBtn && form) {
        crearBtn.addEventListener("click", function (e) {
            const esValido = validarRegistro();
            if (!esValido) {
                e.preventDefault(); // Detiene envío si hay errores
            }
        });
    }

    toggleRegistroInput(); // Ejecutar al cargar
});

// Habilitar/deshabilitar campo de registro profesional segun valor en imputProfesio en modal editar
document.addEventListener("DOMContentLoaded", function () {
    const profesionesSinRegistro = ["aseador", "conductor"];

    const modales = document.querySelectorAll('[id^="modalEditar"]');

    modales.forEach((modal) => {
        modal.addEventListener("shown.bs.modal", () => {
            const userId = modal.id.replace("modalEditar", "");
            const editarBtn = document.getElementById(`editarBtn${userId}`);
            const profesioSelect = document.getElementById(
                `InputProfesio${userId}`
            );
            const registrInput = document.getElementById(
                `InputRegistro_prof${userId}`
            );
            const errorMs = document.getElementById(`regisProError${userId}`);
            const form = document.getElementById(`formEditar${userId}`);

            if (
                !editarBtn ||
                !profesioSelect ||
                !registrInput ||
                !errorMs ||
                !form
            )
                return;

            function toggleRegistroInput() {
                const selectedOption =
                    profesioSelect.options[profesioSelect.selectedIndex];
                const valueText = selectedOption
                    ? selectedOption.text.trim().toLowerCase()
                    : "";

                const deshabilitar =
                    valueText === "seleccione" ||
                    valueText === "" ||
                    profesionesSinRegistro.includes(valueText);

                registrInput.disabled = deshabilitar;

                if (deshabilitar) {
                    registrInput.removeAttribute("required");
                    registrInput.value = "";
                    errorMs.textContent = "";
                    errorMs.style.display = "none";
                } else {
                    registrInput.setAttribute("required", "required");
                    validarRegistroEditar();
                }
            }

            function validarRegistroEditar() {
                const value = registrInput.value.trim();

                if (registrInput.disabled) return true;

                if (value === "") {
                    errorMs.textContent =
                        "Este campo es obligatorio para esta profesión.";
                    errorMs.style.display = "block";
                    return false;
                } else if (!/^[0-9]{7,10}$/.test(value)) {
                    errorMs.textContent =
                        "Debe tener entre 7 y 10 dígitos numéricos.";
                    errorMs.style.display = "block";
                    return false;
                } else {
                    errorMs.textContent = "";
                    errorMs.style.display = "none";
                    return true;
                }
            }

            // Listeners para los campos
            profesioSelect.removeEventListener(
                "change",
                profesioSelect._handler
            );
            profesioSelect._handler = toggleRegistroInput;
            profesioSelect.addEventListener("change", toggleRegistroInput);

            registrInput.removeEventListener("input", registrInput._handler);
            registrInput._handler = validarRegistroEditar;
            registrInput.addEventListener("input", validarRegistroEditar);

            // Aaqui esta el submit del formulario
            form.addEventListener("submit", function (f) {
                if (!validarRegistroEditar()) {
                    f.preventDefault(); // Detiene envío si no pasa validación
                }
            });

            // Ejecutar al abrir el modal
            toggleRegistroInput();
        });
    });
});

// validacion de correo por dominio para modal crear
const inputCorreo = document.getElementById("InputCorreo");
const errorFormato = document.getElementById("errorFormatoCorreoCrear");
const errorAjax = document.getElementById("errorAjaxCrear"); // nombre corregido
const form = document.getElementById("formCrearUsuario");

function validarCorreo(correo) {
    const regex = /^[^@\s]+@(?:hotmail\.com|gmail\.com|outlook\.com|yahoo\.com)$/i;
    return regex.test(correo);
}

// Validación en tiempo real
if (inputCorreo) {
    inputCorreo.addEventListener("input", () => {
        const correo = inputCorreo.value.trim();

        if (!validarCorreo(correo)) {
            inputCorreo.setCustomValidity("El correo no tiene un dominio válido (ej: hotmail.com).");

            if (errorFormato) {
                errorFormato.style.display = "block";
                errorFormato.textContent = "El correo no tiene un dominio válido (ej: hotmail.com).";
            }
            if (errorAjax) {
                errorAjax.style.display = "none"; // Oculta error AJAX si el formato es inválido
            }
        } else {
            inputCorreo.setCustomValidity(""); //limpiar error
            if (errorFormato) {
                errorFormato.style.display = "none";
                errorFormato.textContent = "";
            }
        }
    });
}

// Validación al enviar el formulario
form.addEventListener("submit", (e) => {
    const correo = inputCorreo.value.trim();

    if (!validarCorreo(correo)) {
        e.preventDefault(); //evitar envío
        inputCorreo.reportValidity(); // mostrar validación nativa
    }
});


//validacion de correo por dominio para modal editar

document.querySelectorAll("input[id^='InputCorre']").forEach((input) => {
    const userId = input.id.replace("InputCorre", "");
    const errorFormato = document.getElementById(`errorFormatoCorreoEditar${userId}`);
    const errorAjax = document.getElementById(`errorAjaxEditar${userId}`);
    const formulario = document.getElementById(`formEditarUsuario${userId}`);

    function validarCorreo(correo) {
        const dominioValido = /^[^@\s]+@(?:hotmail\.com|gmail\.com|outlook\.com|yahoo\.com)$/i;
        return dominioValido.test(correo);
    }

    input.addEventListener("input", () => {
        const correo = input.value.trim();

        if (!validarCorreo(correo)) {
            input.setCustomValidity("El correo no tiene un dominio válido (ej: hotmail.com).");

            if (errorFormato) {
                errorFormato.style.display = "block";
                errorFormato.textContent = "El correo no tiene un dominio válido (ej: hotmail.com).";
            }
            if (errorAjax) {
                errorAjax.style.display = "none";
            }
        } else {
            input.setCustomValidity(""); // limpia el error nativo
            if (errorFormato) {
                errorFormato.style.display = "none";
                errorFormato.textContent = "";
            }
        }
    });

    if (formulario) {
        formulario.addEventListener("submit", (e) => {
            const correo = input.value.trim();

            if (!validarCorreo(correo)) {
                e.preventDefault();
                input.reportValidity();
            }
        });
    }
});


// validacion de contraseña
const inputPassword = document.getElementById("InputContraseña");
const errorFormatoPassword = document.getElementById("errorFormatoContraseña");
const formulario = document.getElementById("formCrearUsuario");

function validarPassword(password) {
    const tieneLongitud = password.length >= 8 && password.length <= 10;
    const tieneMayuscula = /[A-Z]/.test(password);
    const tieneMinuscula = /[a-z]/.test(password);
    const tieneSimbolo = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(password);
    const cantidadNumeros = (password.match(/\d/g) || []).length >= 5;

    return tieneLongitud && tieneMayuscula && tieneMinuscula && tieneSimbolo && cantidadNumeros;
}

// Validación en tiempo real
inputPassword.addEventListener("input", () => {
    const password = inputPassword.value.trim();

    if (!validarPassword(password)) {
        inputPassword.setCustomValidity("La contraseña no cumple con los requisitos.");
        errorFormatoPassword.style.display = "block";
        errorFormatoPassword.textContent =
            "Debe tener entre 8 y 10 caracteres, al menos 5 números, 1 minúscula, 1 mayúscula y 1 símbolo.";
    } else {
        inputPassword.setCustomValidity(""); //limpia el mensaje para que el form se pueda enviar
        errorFormatoPassword.style.display = "none";
        errorFormatoPassword.textContent = "";
    }
});

// Validación al enviar
formulario.addEventListener("submit", (e) => {
    const password = inputPassword.value.trim();

    if (!validarPassword(password)) {
        e.preventDefault();
        inputPassword.reportValidity(); //muestra el mensaje nativo del navegador
    }
});


//limpiar de mensajes error modal crear cuando le doy cerrar
document
    .getElementById("modalRegistrar")
    .addEventListener("hidden.bs.modal", () => {
        const modal = document.getElementById("modalRegistrar");

        // Ocultar y limpiar mensajes de error con clase text-danger dentro del modal
        modal.querySelectorAll(".text-danger").forEach((errorElem) => {
            errorElem.style.display = "none";
            errorElem.textContent = "";
        });

        const municipioSelect = document.getElementById("InputMunici_residen");
        if (municipioSelect) {
            municipioSelect.innerHTML =
                '<option value="" disabled selected>Seleccione</option>';
        }
    });

//limpiar de mensajes error modal editar cuando le doy cerrar
document.querySelectorAll('[id^="modalEditar"]').forEach((modal) => {
    modal.addEventListener("hidden.bs.modal", () => {
        // Ocultar y limpiar mensajes de error dentro del modal
        modal.querySelectorAll(".text-danger").forEach((errorElem) => {
            errorElem.style.display = "none";
            errorElem.textContent = "";
        });

        // Opcional: resetear el formulario dentro del modal
        const form = modal.querySelector("form");
        if (form) form.reset();
    });
});
