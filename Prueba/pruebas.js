window.onload = iniciar;
function iniciar(){
alert ("FuSoft, El Futuro del Software, Ahora");
var nombre = prompt ("Ingrese su nombre");
var edad = prompt ("Ingrese su Edad");
if (edad >18) {
    alert("Es mayor de edad")
}
else {
    alert("Es menor de edad")
}
var suma = edad + 10;
var telefono = prompt ("Ingrese su # Telefono");
var publicacion = "Nombre: " + nombre + ". Edad:  "+ edad +". Telefono: "+telefono+". En 10 años tendra "+suma ;
alert(publicacion);
//>=Mayor o igual
//<=Menor o Igual
//== igual
//&& Y
//|| O
//crear funciones
function calcularSuperficie() {
    alert("prueba de function")
};
//llamar la fucnion
calcularSuperficie();
}