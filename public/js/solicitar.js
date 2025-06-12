$(document).ready(function () {
      $('#certTable').DataTable({
        language: {
          search: "Buscar:",
          lengthMenu: "Mostrar _MENU_ registros",
          info: "Mostrando _START_ a _END_ de _TOTAL_ entradas",
          paginate: {
            first: "Primero",
            last: "Último",
            next: "Siguiente",
            previous: "Anterior"
          }
        }
      });

      // Seleccionar todas
    $('#selectAll').on('change', function () {
        $('.casilla:not(:disabled)').prop('checked', this.checked); // ✅ Solo afecta los habilitados
        toggleSolicitarBtn();
    });

    });

//habilitar botonm solicitar y enviar solicitud
$(document).ready(function () {
    let solicitarBtn = $('#solicitarBtn');

    // Inicialmente el botón debe estar gris
    solicitarBtn.css({
        'background-color': 'gray',
        'cursor': 'not-allowed',
        'opacity': '0.5'
    });

    $('#selectAll').on('change', function () {
        $('.casilla').prop('checked', this.checked);
        toggleSolicitarBtn();
    });

    $('.casilla').on('change', function () {
        toggleSolicitarBtn();
    });

    function toggleSolicitarBtn() {
        if ($('.casilla:checked').length > 0) {
            solicitarBtn.prop('disabled', false).css({
                'background-color': 'rgb(4, 4, 110)',
                'cursor': 'pointer',
                'opacity': '1'
            });
        } else {
            solicitarBtn.prop('disabled', true).css({
                'background-color': 'gray',
                'cursor': 'not-allowed',
                'opacity': '0.5'
            });
        }
    }

    $('#formSolicitar').on('submit', function (event) {
        event.preventDefault();

        let contratosSeleccionados = [];
        let motivosSeleccionados = {};
        let valid = true; // Verificador de validación

        $('.casilla:checked').each(function () {
            let idContrato = $(this).val();
            let motivo = $(this).closest('tr').find('.motivoSolicitud').val().trim();

            if (motivo === '') {
                valid = false; // Si un motivo está vacío, no enviamos
                $(this).closest('tr').find('.motivoSolicitud').css('border', '2px solid red'); // Resaltar error
            } else {
                $(this).closest('tr').find('.motivoSolicitud').css('border', ''); // Limpiar error
                contratosSeleccionados.push(idContrato);
                motivosSeleccionados[idContrato] = motivo;
            }
        });

        if (!valid) {
            alert('❌ Debes escribir el motivo de la solicitud en los contratos seleccionados.');
            return; // Evita el envío
        }

        $('#contratosSeleccionados').val(JSON.stringify(contratosSeleccionados));
        $('#motivosSeleccionados').val(JSON.stringify(motivosSeleccionados));

        this.submit(); // Enviar el formulario
    });
});

//desaparecer el mensaje
setTimeout(function () {
    $('.alert').fadeOut('slow');
}, 3000); // Ocultar después de 3 segundos

