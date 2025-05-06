function validarFormulario() {
    var calificacion = document.getElementById("calificacion").value;
    if (calificacion < 1 || calificacion > 10) {
        alert("La calificación debe estar entre 1 y 10.");
        return false;
    }
    return true;
}