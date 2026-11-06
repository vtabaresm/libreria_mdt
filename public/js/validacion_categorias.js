var formulario = document.getElementById("formulario");
prepararFormulario(formulario);

formulario.addEventListener("submit", function(event){
    event.preventDefault();
    var nombre = document.getElementById("nombre");
    var valido = true;

    limpiarErrores(this);

    // name: string (obligatorio, máximo 255 caracteres)
    if(nombre.value.trim() === ""){
        mostrarError(nombre, "El campo nombre es obligatorio.");
        valido = false;
    } else if(nombre.value.trim().length > 255){
        mostrarError(nombre, "El nombre no puede tener más de 255 caracteres.");
        valido = false;
    }

    // description: text nullable (opcional, no requiere validación)

    // enviar formulario si todo está correcto
    if(valido){
        this.submit();
    }
})
