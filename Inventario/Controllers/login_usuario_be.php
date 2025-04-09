<?php
    session_start();

    include 'conexion_be.php';

    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];
    $contraseña = hash('sha512', $contraseña);


    $validar_login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario='$usuario'
    and contraseña='$contraseña'");

    if(mysqli_num_rows($validar_login)>0) {
        $_SESSION['usuario'] = $usuario;
        header("location: ../bienvenido.php");
        exit;
    }else {
        echo '
        <script>
            alert("usuario no existe, por favor verifica los datos ingresados")
            window.location= "../index.php";
        </script>
        ';
        exit;
    }

?>