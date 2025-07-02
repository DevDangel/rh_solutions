
//------------------ limpiar el formulario-----------------------//
function resetForm() {
    const form = document.querySelector('#modalCrearContrato form');
    if (!form) return;

    // Resetear el formulario
    form.reset();

    // Limpiar campos manualmente por si Laravel los dejó con old() o valores precargados
    form.querySelectorAll('input[type="text"], input[type="date"], input[type="number"]').forEach(el => {
        el.value = '';
    });

    // Limpiar radio buttons
    form.querySelectorAll('input[type="radio"]').forEach(el => {
        el.checked = false;
    });

    // Reiniciar selects
    form.querySelectorAll('select').forEach(select => {
        select.selectedIndex = 0;
    });

    // Limpiar textarea
    form.querySelectorAll('textarea').forEach(textarea => {
        textarea.value = '';
    });
}
document.addEventListener('DOMContentLoaded', function () {
    const modalCrearContrato = document.getElementById('modalCrearContrato');

    if (modalCrearContrato) {
        modalCrearContrato.addEventListener('show.bs.modal', function () {
            resetForm(); // limpia los campos cada vez que se abre el modal
        });
    }
});
// quitar tambien el mensaje de error
$('#modalCrearContrato').on('hidden.bs.modal', function () {
    // Limpiar mensaje de error de fecha
    $('#fechaError').text('').removeClass('visible').hide();

    // Limpiar mensaje de error de documento
    $('#crearDocumentoError').text('').removeClass('visible').hide();

    // Limpiar campos de nombre y apellido
    $('#nombre').val('');
    $('#apellido').val('');

    // Reactivar el botón de crear
    $('#btnCrear').prop('disabled', false);
});

// quitar el alert despeus de unos segundos}
setTimeout(function() {
    $('.alert').fadeOut('slow');
}, 3000); // Desaparece en 3 segundos
// ---------------------------------------------------------------------------//

// ----------------------- CREAR CONTRATO ----------------------------------------//
//------- validar el numero de documento si existe en crear contrato--------------//
document.addEventListener('DOMContentLoaded', function () {
    const input = document.getElementById('InputNum_documen');
    const errorMsg = document.getElementById('crearDocumentoError');
    const nombreInput = document.getElementById('nombre');
    const apellidoInput = document.getElementById('apellido');

    input.addEventListener('input', function () {
        const valor = input.value.trim();

        // Siempre limpiar los campos mientras se está escribiendo
        nombreInput.value = '';
        apellidoInput.value = '';
        // Ocultar mensaje si hay edición
        errorMsg.classList.remove('visible');

        // Si está vacío, ocultamos el mensaje inmediatamente
        if (valor === '' && errorMsg) {
           // errorMsg.style.display = 'none';
            errorMsg.classList.remove('visible');
            return; // Salimos para evitar que intente validar con vacío
        }
        const regex = /^[0-9]{7,10}$/;
        if (!regex.test(valor)) {
            errorMsg.classList.remove('visible');
            return;
        }
        // Si tiene una longitud válida, hacemos la consulta
        if (valor.length >= 7 && valor.length <= 10) {
            fetch('/verificar-documento', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ doc_usuario: valor })
            })
            .then(response => response.json())
            .then(data => {
                if (!data.existe) {
                    errorMsg.textContent = 'El número de documento no se encuentra registrado.';
                   // errorMsg.style.display = 'block';
                    errorMsg.classList.add('visible');
                    nombreInput.value = '';
                    apellidoInput.value = '';
                } else {
                   // errorMsg.style.display = 'none';
                   errorMsg.classList.remove('visible');
                    nombreInput.value = data.nombre_completo || '';
                    apellidoInput.value = data.apellido_completo || '';
                }
            })
            .catch(error => {
                console.error('Error en la petición:', error);
            });
        } else {
            // Mientras el número no cumpla con el patrón, ocultamos mensaje
           // errorMsg.style.display = 'none';
           errorMsg.classList.remove('visible');
        }
    });
});
//-- validar que le fecha de salida no sea menor a la de ingreso en crear contrato --//
document.addEventListener('DOMContentLoaded', function () {
    const fechaInicio = document.getElementById('fecha_ingreso');
    const fechaFin = document.getElementById('fecha_finalizacion');
    const fechaError = document.getElementById('fechaError');
    const btnCrear = document.getElementById('btnCrear');
    const docError = document.getElementById('crearDocumentoError');

    function validarEstadoBoton() {
        const docInvalido = docError.classList.contains('visible');
        const fechaInvalida = fechaError.classList.contains('visible');
        btnCrear.disabled = docInvalido || fechaInvalida;
    }

    function validarFechas() {
        const inicio = new Date(fechaInicio.value);
        const fin = new Date(fechaFin.value);

        if (fechaInicio.value && fechaFin.value) {
            if (fin < inicio) {
                fechaError.textContent = 'La fecha final no puede ser menor a la fecha de ingreso.';
                fechaError.classList.add('visible');
                fechaError.style.display = 'block';
            } else {
                fechaError.textContent = '';
                fechaError.classList.remove('visible');
                fechaError.style.display = 'none';
            }
        } else {
            fechaError.textContent = '';
            fechaError.classList.remove('visible');
            fechaError.style.display = 'none';
        }

        validarEstadoBoton();
    }

    // Cuando cambia fecha, validamos
    fechaInicio.addEventListener('change', validarFechas);
    fechaFin.addEventListener('change', validarFechas);

    // También vigilamos si aparece el error del documento
    const observer = new MutationObserver(validarEstadoBoton);
    observer.observe(docError, { attributes: true, attributeFilter: ['class'] });
});
//----------------------------------------------------------------------------------//

// ---------------------------- EDITAR CONTRATO ------------------------------//
// funcion global para validar el estado el boton

// validar que el documento exista en el modal de editar
document.addEventListener('DOMContentLoaded', function () {
    const editInput = document.getElementById('editInputNum_documen');
    const editError = document.getElementById('editDocumentoError');
    const editNombre = document.getElementById('edit_nombre');
    const editApellido = document.getElementById('edit_apellido');

    if (editInput && editError && editNombre && editApellido) {
        editInput.addEventListener('input', function () {
            const valor = editInput.value.trim();

            // Limpiar mientras se digita
            editNombre.value = '';
            editApellido.value = '';
            editError.classList.remove('visible');

            if (valor === '' && editError) {
                editError.classList.remove('visible');
                return;
            }

            const regex = /^[0-9]{7,10}$/;
            if (!regex.test(valor)) {
                editError.classList.remove('visible');
                return;
            }

            fetch('/verificar-documento', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ doc_usuario: valor })
            })
            .then(response => response.json())
            .then(data => {
                if (!data.existe) {
                    editError.textContent = 'El número de documento no se encuentra registrado.';
                    editError.classList.add('visible');
                //    btnEditar.disabled= true;// deshabilita el boton
                } else {
                    editNombre.value = data.nombre_completo || '';
                    editApellido.value = data.apellido_completo || '';
                    editError.classList.remove('visible');
                //    btnEditar.disabled= true;
                }
            })
            .catch(error => {
                console.error('Error en la petición (modal editar):', error);
            });
        });
    }
});


// validar ahora en el modal de editar las fechas
document.addEventListener('DOMContentLoaded', function () {
    const fechaInicio = document.getElementById('editInputFecha_ingreso');
    const fechaFin = document.getElementById('editInputFecha_finalizacion');
    const fechaError = document.getElementById('editFechaError');
    const btnEditar = document.getElementById('btnActualizar');
    const editError = document.getElementById('editDocumentoError');

    function validarEstadoBotonEdit(){
        const docInvalido = editError.classList.contains('visible');
        const fechaInvalida = fechaError.classList.contains('visible');
        btnEditar.disabled = docInvalido || fechaInvalida;
    }
    function validarFechaEditar() {
        const inicio = new Date(fechaInicio.value);
        const fin = new Date(fechaFin.value);

        if (fechaInicio.value && fechaFin.value) {
            if (fin < inicio) {
                fechaError.textContent = 'La fecha final no puede ser menor a la de ingreso.';
                fechaError.classList.add('visible');
                fechaError.style.display = 'block';

            } else {
                fechaError.textContent = '';
                fechaError.classList.remove('visible');
                fechaError.style.display = 'none';

            }
        } else {
            fechaError.textContent = '';
            fechaError.classList.remove('visible');
            fechaError.style.display = 'none';
        }
        validarEstadoBotonEdit();
    }

    fechaInicio.addEventListener('change', validarFechaEditar);
    fechaFin.addEventListener('change', validarFechaEditar);
     // También vigilamos si aparece el error del documento
    const observer = new MutationObserver(validarEstadoBotonEdit);
    observer.observe(editError, { attributes: true, attributeFilter: ['class'] });
});
//----------------------------------------------------------------------------------//

