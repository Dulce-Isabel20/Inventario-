<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login y Registro - MagtimusPro</title>
    <link rel="stylesheet" href="css/estilos.css"> 
</head>
<body>

    <main>

        <div class="contenedor__todo">

            <!-- Sección trasera con botones de login y registro -->
            <div class="caja__trasera">
                <div class="caja__trasera-login">
                    <h3>¿Ya tienes una cuenta?</h3>
                    <p>Inicia sesión para entrar en la página</p>
                    <button id="btn__iniciar-sesion">Iniciar sesión</button>  
                </div>
                <div class="caja__trasera-register">
                    <h3>¿Aún no tienes una cuenta?</h3>
                    <p>Regístrate para que puedas iniciar sesión</p>
                    <button id="btn__registrarse">Registrarse</button>
                </div>
            </div>

            <!-- Contenedor principal de login y registro -->
            <div class="contenedor__login-register">

                <!-- Formulario de inicio de sesión -->
                <form action="includes/menu" method="POST" class="formulario__login">
                    <h2>Iniciar sesión</h2>
                    <input type="text" placeholder="Correo electrónico">
                    <input type="password" placeholder="Contraseña">
                    <button>Entrar</button>
                </form>

                <!-- Formulario de registro -->
                <form action="php/registro_usuario_be.php" method="POST" class="formulario__register">
                    <h2>Registrarse</h2>
                    <input type="text" placeholder="Nombre completo" name="nombre_completo">
                    <input type="text" placeholder="Correo electrónico" name="correo">
                    <input type="text" placeholder="Usuario" name="usuario">
                    <input type="password" placeholder="Contraseña" name="contrasena">
                    <button>Registrarse</button>
                </form>

            </div>

        </div> <!-- Cierre del contenedor__todo -->

    </main>
    <script src="js/script.js"></script>

</body>
</html>
