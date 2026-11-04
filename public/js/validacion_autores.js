var formulario = document.getElementById("formulario");
limpiarAlCorregir(formulario);

formulario.addEventListener("submit", function(event){
    event.preventDefault();
    var nombre = document.getElementById("nombre");
    var nacionalidad = document.getElementById("nacionalidad");
    var fecha_nacimiento = document.getElementById("fecha_nacimiento");
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

    // nationality: string nullable (opcional, máximo 255 caracteres)
    if(nacionalidad.value.trim().length > 255){
        mostrarError(nacionalidad, "La nacionalidad no puede tener más de 255 caracteres.");
        valido = false;
    }

    // birth_date: date nullable (opcional, pero si se escribe no puede ser mayor a la fecha actual)
    // (las fechas en formato AAAA-MM-DD se pueden comparar como texto)
    if(fecha_nacimiento.value !== "" && fecha_nacimiento.value > fechaHoy()){
        mostrarError(fecha_nacimiento, "La fecha de nacimiento no puede ser mayor a la fecha actual.");
        valido = false;
    }

    // enviar formulario si todo está correcto
    if(valido){
        this.submit();
    }
})


