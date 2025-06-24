function previewPhoto(event) {
    const reader = new FileReader();
    reader.onload = function () {
        document.getElementById('previewImage').src = reader.result;
    };
    if (event.target.files[0]) {
        reader.readAsDataURL(event.target.files[0]);
    }
}
