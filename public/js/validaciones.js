// Funciones comunes para mostrar los errores de validación con los estilos de Bootstrap.
// Cada campo debe estar dentro de un contenedor con la clase "mb-3".

// Marca el campo en rojo y muestra el mensaje debajo de él
function mostrarError(campo, mensaje){
    var contenedor = campo.closest(".mb-3");
    campo.classList.add("is-invalid");

    const error = document.createElement("div"); //Crea la etiqueta <div>
    error.className = "invalid-feedback d-block"; //Clases de Bootstrap para el texto en rojo
    error.textContent = mensaje; //Agrega el texto
    contenedor.appendChild(error); //Inserta el mensaje al final del contenedor
}

// Quita el error de un campo (el borde rojo y el mensaje)
function limpiarError(campo){
    var contenedor = campo.closest(".mb-3");
    if(!contenedor) return;
    contenedor.querySelectorAll(".is-invalid").forEach(function(elemento){
        elemento.classList.remove("is-invalid");
    });
    contenedor.classList.remove("is-invalid");
    contenedor.querySelectorAll(".invalid-feedback").forEach(function(mensaje){
        mensaje.remove();
    });
}

// Quita todos los errores del formulario antes de volver a validar
function limpiarErrores(formulario){
    formulario.querySelectorAll(".mb-3").forEach(function(contenedor){
        limpiarError(contenedor);
    });
}

// Quita el error de un campo apenas el usuario lo modifica
function limpiarAlCorregir(formulario){
    formulario.addEventListener("input", function(event){
        limpiarError(event.target);
    });
}

// Desactiva la validación nativa del navegador (equivale a <form novalidate>)
// y activa la limpieza de errores cuando el usuario corrige un campo
function prepararFormulario(formulario){
    formulario.noValidate = true;
    limpiarAlCorregir(formulario);
}

// Retorna la fecha de hoy en formato AAAA-MM-DD (hora local), igual al valor de un <input type="date">
function fechaHoy(){
    var hoy = new Date();
    hoy.setMinutes(hoy.getMinutes() - hoy.getTimezoneOffset());
    return hoy.toISOString().slice(0, 10);
}