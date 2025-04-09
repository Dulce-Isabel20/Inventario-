<?php

    include 'conexion_be.php';

    $nombre_completo = $_POST['nombre_completo'];
    $usuario = $_POST ['usuario'];
    $contraseña = $_POST['contraseña'];
    //Encriptamos la contraseña para mas seguridaddd
    $contraseña = hash('sha512', $contraseña);

    $query = "INSERT INTO usuarios( nombre_completo, usuario, contraseña)
                VALUES('$nombre_completo', '$usuario', '$contraseña')";
    //VERIFICAR QUE EL NOMBRE NO SE REPITA EN LA BD
    $verificar_nombre = mysqli_query($conexion,"SELECT * FROM usuarios WHERE nombre_completo= '$nombre_completo'");
    if(mysqli_num_rows($verificar_nombre)>0){
        echo '
            <script> 
                alert("este nombre ya esta registrado, intenta con otro diferente");
                window.location= "../index.php";
            </script>
        ';
        exit();
    }

    //VERIFICAR QUE EL USUARIO NO SE REPITA EN LA BD
    $verificar_usuario = mysqli_query($conexion,"SELECT * FROM usuarios WHERE usuario= '$usuario'");
    if(mysqli_num_rows($verificar_usuario)>0){
        echo '
            <script> 
                alert("este usuario ya esta registrado, intenta con otro diferente");
                window.location= "../index.php";
            </script>
        ';
        exit();
    }

    


    $ejecutar = mysqli_query($conexion, $query); 

    if($ejecutar) {
        echo '
            <script>
                alert("usuario almacenado exitosamente");
                window.location= "../index.php";
            </script>

        ';
    }else{
        echo '
            <script>
                alert("intentalo de nuevo, usuario no almacenado");
                window.location= "../index.php";
            </script>
        ';
    }

    mysqli_close($conexion);
?>