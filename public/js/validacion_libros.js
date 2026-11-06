var formulario = document.getElementById("formulario");
prepararFormulario(formulario);

formulario.addEventListener("submit", function(event){
    event.preventDefault();
    var titulo = document.getElementById("titulo");
    var anio = document.getElementById("anio");
    var categoria = document.getElementById("categoria");
    var autores = document.getElementById("autores");
    var autoresSeleccionados = autores.querySelectorAll("input[type=checkbox]:checked");
    var anioActual = new Date().getFullYear();
    var valido = true;

    limpiarErrores(this);

    // title: string (obligatorio, máximo 255 caracteres)
    if(titulo.value.trim() === ""){
        mostrarError(titulo, "El campo título es obligatorio.");
        valido = false;
    } else if(titulo.value.trim().length > 255){
        mostrarError(titulo, "El título no puede tener más de 255 caracteres.");
        valido = false;
    }

    // publication_year: year nullable (opcional). En MySQL el tipo YEAR solo admite desde 1901,
    // y además el año no puede ser mayor al actual
    if(anio.value !== ""){
        var numeroAnio = Number(anio.value);
        if(!Number.isInteger(numeroAnio) || numeroAnio < 1901 || numeroAnio > anioActual){
            mostrarError(anio, "El año de publicación debe estar entre 1901 y " + anioActual + ".");
            valido = false;
        }
    }

    // category_id: llave foránea obligatoria
    if(categoria.value === ""){
        mostrarError(categoria, "Seleccione una categoría.");
        valido = false;
    }

    // se debe marcar al menos un autor
    if(autoresSeleccionados.length === 0){
        mostrarError(autores, "Seleccione al menos un autor.");
        valido = false;
    }

    // enviar formulario si todo está correcto
    if(valido){
        this.submit();
    }
})
