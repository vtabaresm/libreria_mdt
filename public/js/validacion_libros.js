document.getElementById("formulario").addEventListener("submit", function(event){
    event.preventDefault();
    var nombre = document.getElementById("nombre").value;
    var nacionalidad = document.getElementById("nacionalidad").value;
    var fecha_nacimiento = document.getElementById("fecha_nacimiento").value;

    // validar campos (eliminar espacios en blanco, cantidad de caracteres)
    // la fecha de nacimiento debe ser una fecha válida y no puede ser mayor a la fecha actual
    if(nombre.trim() === "" || nombre.length > 50){
        alert("El nombre es obligatorio y no puede tener más de 50 caracteres.");
        return;
    }
    if(nacionalidad.trim() === "" || nacionalidad.length > 50){
        alert("La nacionalidad es obligatoria y no puede tener más de 50 caracteres.");
        return;
    }
    if(fecha_nacimiento.trim() === ""){
        alert("La fecha de nacimiento es obligatoria.");
        return;
    }
    // se convierte la fecha de nacimiento a un objeto Date y se mira la fecha actual
    var fechaNacimientoDate = new Date(fecha_nacimiento);
    var fechaActual = new Date();
    if(fechaNacimientoDate > fechaActual){
        alert("La fecha de nacimiento no puede ser mayor a la fecha actual.");
        return;
    }

    // enviar formulario si todo está correcto
    this.submit();
})
