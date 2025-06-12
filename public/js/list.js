// ajax mediante laravel no fetch
function cargarDatosUsuario(idUsuario) {
    fetch(`{{ url('/admin/usuarios') }}/${idUsuario}`)
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                console.error('Error:', data.error);
                return;
            }
            document.getElementById('InputId_contrato').value = data.id_contrato || '';
            document.getElementById('InputTip_documen').value = data.tip_documento || '';
            document.getElementById('InputNum_documen').value = data.doc_usuario || '';
            document.getElementById('InputPrim_nombre').value = data.pri_nombre || '';
            document.getElementById('InputSegun_nombre').value = data.seg_nombre || '';
            document.getElementById('InputPrim_apellido').value = data.pri_apellido || '';
            document.getElementById('InputSegun_apellido').value = data.seg_apellido || '';
            document.getElementById('InputFecha_nacimien').value = data.fec_nacimiento || '';
            document.getElementById('InputCorreo').value = data.correo_usuario || '';
            document.getElementById('InputCelular').value = data.cel_usuario || '';
            document.getElementById('InputSexo').value = data.sex_usuario || '';
            document.getElementById('InputEst_civil').value = data.estado_civil || '';
            document.getElementById('InputCelular_emerg').value = data.cel_emer_usuario || '';
        })
        .catch(error => console.error('Error:', error));
}

// eliminacio AJAX
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.btn-confirmar-eliminar').forEach(button => {
        button.addEventListener('click', function () {
            var idUsuario = this.getAttribute('data-id');

            fetch(`{{ url('/admin/usuarios') }}/${idUsuario}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                } else {
                    alert(data.error);
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });
});

// buscar ajax

document.getElementById('searchInput').addEventListener('input', function () {
    const searchTerm = this.value.trim().toLowerCase();

    fetch(`{{ route('usuarios.buscar') }}?q=${searchTerm}`)
        .then(response => response.json())
        .then(data => {
            let tableBody = document.getElementById('employeeTable');
            tableBody.innerHTML = '';

            data.forEach(usuario => {
                let row = `
                    <tr>
                        <td>${usuario.tip_documento}</td>
                        <td>${usuario.doc_usuario}</td>
                        <td>${usuario.pri_nombre} ${usuario.seg_nombre} ${usuario.pri_apellido} ${usuario.seg_apellido}</td>
                        <td>${usuario.fec_nacimiento}</td>
                        <td>${usuario.sex_usuario}</td>
                        <td>${usuario.estado_civil}</td>
                        <td>${usuario.dir_usuario}</td>
                        <td>${usuario.cel_usuario}</td>
                        <td>${usuario.cel_emer_usuario}</td>
                        <td>${usuario.correo_usuario}</td>
                    </tr>
                `;
                tableBody.innerHTML += row;
            });
        })
        .catch(error => console.error('Error:', error));
});


