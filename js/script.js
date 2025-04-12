//Ejecutando funciones
document.getElementById("btn__iniciar-sesion").addEventListener("click", iniciarSesion);
document.getElementById("btn__registrarse").addEventListener("click", register);
window.addEventListener("resize", anchoPage);

//Declarando variables
var formulario_login = document.querySelector(".formulario__login");
var formulario_register = document.querySelector(".formulario__register");
var contenedor_login_register = document.querySelector(".contenedor__login-register");
var caja_trasera_login = document.querySelector(".caja__trasera-login");
var caja_trasera_register = document.querySelector(".caja__trasera-register");

    //FUNCIONES

function anchoPage(){

    if (window.innerWidth > 850){
        caja_trasera_register.style.display = "block";
        caja_trasera_login.style.display = "block";
    }else{
        caja_trasera_register.style.display = "block";
        caja_trasera_register.style.opacity = "1";
        caja_trasera_login.style.display = "none";
        formulario_login.style.display = "block";
        contenedor_login_register.style.left = "0px";
        formulario_register.style.display = "none";   
    }
}

anchoPage();


    function iniciarSesion(){
        if (window.innerWidth > 850){
            formulario_login.style.display = "block";
            contenedor_login_register.style.left = "10px";
            formulario_register.style.display = "none";
            caja_trasera_register.style.opacity = "1";
            caja_trasera_login.style.opacity = "0";
        }else{
            formulario_login.style.display = "block";
            contenedor_login_register.style.left = "0px";
            formulario_register.style.display = "none";
            caja_trasera_register.style.display = "block";
            caja_trasera_login.style.display = "none";
        }
    }

    function register(){
        if (window.innerWidth > 850){
            formulario_register.style.display = "block";
            contenedor_login_register.style.left = "410px";
            formulario_login.style.display = "none";
            caja_trasera_register.style.opacity = "0";
            caja_trasera_login.style.opacity = "1";
        }else{
            formulario_register.style.display = "block";
            contenedor_login_register.style.left = "0px";
            formulario_login.style.display = "none";
            caja_trasera_register.style.display = "none";
            caja_trasera_login.style.display = "block";
            caja_trasera_login.style.opacity = "1";
        }
}

//---------------------------------------------------------
// VALIDACIÓN PARA EDITAR PRODUCTO (editar_producto.php)
//---------------------------------------------------------
document.addEventListener("DOMContentLoaded", () => {
    const form = document.querySelector("form");
    const cantidadInput = document.getElementById("cantidad");
    const precioInput = document.querySelector('input[name="precio"]');

    // Si el formulario y campos existen en esta página
    if (form && cantidadInput && precioInput) {
        form.addEventListener("submit", (e) => {
            const cantidad = cantidadInput.value.trim();
            const precio = precioInput.value.trim();

            if (!cantidad || !precio) {
                e.preventDefault();
                alert("Por favor, complete todos los campos.");
                return;
            }

            if (isNaN(cantidad) || cantidad <= 0) {
                e.preventDefault();
                alert("La cantidad debe ser un número mayor que cero.");
                return;
            }

            if (isNaN(precio) || precio <= 0) {
                e.preventDefault();
                alert("El precio debe ser un número mayor que cero.");
                return;
            }
        });
    }
});

//---------------------------------------------------------
// VALIDACIÓN PARA EDITAR CLIENTE (editar_cliente.php)
//---------------------------------------------------------
document.addEventListener("DOMContentLoaded", () => {
    const form = document.querySelector("form");
    const dni = document.getElementById("dni");
    const nombre = document.getElementById("nombre");
    const telefono = document.getElementById("telefono");
    const direccion = document.getElementById("direccion");

    if (form && dni && nombre && telefono && direccion) {
        form.addEventListener("submit", (e) => {
            const valDni = dni.value.trim();
            const valNombre = nombre.value.trim();
            const valTelefono = telefono.value.trim();
            const valDireccion = direccion.value.trim();

            if (!valNombre || !valTelefono || !valDireccion) {
                e.preventDefault();
                alert("Por favor, complete todos los campos requeridos.");
                return;
            }

            if (valDni && (isNaN(valDni) || valDni < 0)) {
                e.preventDefault();
                alert("El DNI debe ser un número válido.");
                return;
            }

            if (isNaN(valTelefono) || valTelefono.length < 7) {
                e.preventDefault();
                alert("El teléfono debe ser un número válido con al menos 7 dígitos.");
                return;
            }
        });
    }
});
