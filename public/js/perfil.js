function previewPhoto(event) {
    const reader = new FileReader();
    reader.onload = function () {
        document.getElementById('previewImage').src = reader.result;
    };
    if (event.target.files[0]) {
        reader.readAsDataURL(event.target.files[0]);
    }
}

//tamaño de la foto
document.getElementById('InputFotoPerfil').addEventListener('change', function () {
    const file = this.files[0];
    if (file && file.size > 20 * 1024 * 1024) { // 20 MB en bytes
        alert('La imagen seleccionada supera el tamaño máximo de 20 MB');
        this.value = ''; // borra el archivo
    }
});


//mensajes para el modal


