document.getElementById('edad').addEventListener('input', function () {
    document.getElementById('edadOutput').textContent = this.value;
});



document.getElementById('tipo_telefono').addEventListener('change', function() {
    var tipoSeleccionado = this.value;
    var telefonoInput = document.getElementById('telefono');
    
    if (tipoSeleccionado === 'celular') {
        telefonoInput.placeholder = 'Ingrese su número de celular';
    } else if (tipoSeleccionado === 'fijo') {
        telefonoInput.placeholder = 'Ingrese su número fijo';
    }
});
