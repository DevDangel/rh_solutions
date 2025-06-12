
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

// quitar el alert despeus de unos segundos}
setTimeout(function() {
    $('.alert').fadeOut('slow');
}, 3000); // Desaparece en 3 segundos


