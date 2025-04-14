<?php
// Ya no usas header.php ni footer.php, así que los quitamos
include "conexion_be.php";
session_start(); // Necesario para $_SESSION['idUser']

// Validar producto
if (empty($_REQUEST['id']) || !is_numeric($_REQUEST['id'])) {
    header("Location: lista_productos.php");
    exit;
}

$id_producto = $_REQUEST['id'];
$query_producto = mysqli_query($conexion, "SELECT id, nombre, precio, existencia FROM producto WHERE id = $id_producto");
$result_producto = mysqli_num_rows($query_producto);

if ($result_producto > 0) {
    $data_producto = mysqli_fetch_assoc($query_producto);
} else {
    header("Location: lista_productos.php");
    exit;
}

// Agregar Productos a entrada
if (!empty($_POST)) {
    $alert = "";
    if (!empty($_POST['cantidad']) && !empty($_POST['precio'])) {
        $precio = $_POST['precio'];
        $cantidad = $_POST['cantidad'];
        $producto_id = $id_producto;
        $usuario_id = $_SESSION['idUser']; // asegúrate que esté logueado

        $query_insert = mysqli_query($conexion, "INSERT INTO entradas(codproducto, cantidad, precio, usuario_id) VALUES ($producto_id, $cantidad, $precio, $usuario_id)");

        if ($query_insert) {
            // Ejecutar procedimiento almacenado (debes tenerlo creado)
            $query_upd = mysqli_query($conexion, "CALL actualizar_precio_producto($cantidad, $precio, $producto_id)");
            $result_pro = mysqli_num_rows($query_upd);

            if ($result_pro > 0) {
                $alert = '<div class="alert alert-primary" role="alert">Producto actualizado con éxito</div>';
            }
        } else {
            $alert = '<div class="alert alert-danger" role="alert">Error al insertar entrada</div>';
        }
        mysqli_close($conexion);
    } else {
        $alert = '<div class="alert alert-danger" role="alert">Todos los campos son obligatorios</div>';
    }
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 m-auto">
            <form action="" method="post">
                <?php echo isset($alert) ? $alert : ''; ?>
                <div class="form-group">
                    <label for="precio">Precio Actual</label>
                    <input type="number" class="form-control" value="<?php echo $data_producto['precio']; ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="existencia">Cantidad de productos disponibles</label>
                    <input type="number" class="form-control" value="<?php echo $data_producto['existencia']; ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="precio">Nuevo Precio</label>
                    <input type="number" step="0.01" placeholder="Ingrese nuevo precio" name="precio" class="form-control" value="<?php echo $data_producto['precio']; ?>">
                </div>
                <div class="form-group">
                    <label for="cantidad">Agregar Cantidad</label>
                    <input type="number" placeholder="Ingrese cantidad" name="cantidad" class="form-control">
                </div>

                <input type="submit" value="Actualizar" class="btn btn-primary">
                <a href="lista_productos.php" class="btn btn-danger">Regresar</a>
            </form>
        </div>
    </div>
</div>