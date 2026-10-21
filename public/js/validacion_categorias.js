document.getElementById("formulario").addEventListener("submit", function(event){
    event.preventDefault();
    var nombre = document.getElementById("nombre").value;
    var descripcion = document.getElementById("descripcion").value;

    // validar campos (eliminar espacios en blanco)
    if(nombre.trim() === ""){
        alert("El campo nombre es obligatorio");
        return;
    }

    // validar campos (eliminar espacios en blanco)
    if(descripcion.trim() === ""){
        alert("El campo descripcion es obligatorio");
        return;
    }

    // enviar formulario si todo está correcto
    this.submit();
})
