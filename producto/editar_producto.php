<?php

include('../conexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
    $id_producto = $_POST['id_producto'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $stock = $_POST['stock'];
    $precio_venta = $_POST['precio_venta'];
    
    $conexion = conectar();

    $sql = "UPDATE producto SET nombre = '$nombre', descripcion = '$descripcion', stock = '$stock', precio_venta = '$precio_venta' WHERE id_producto = $id_producto";

    if (mysqli_query($conexion, $sql)) {  
        desconectar($conexion);  
        header('Location: productos.php');
        exit;
    } else {
        $error = 'No se pudo actualizar el prodcuto: ' . mysqli_error($conexion);
    }
} else {
    $id_producto = $_GET['id_producto'];

    $conexion = conectar();

    $sql = "SELECT nombre, descripcion, stock, precio_venta FROM producto WHERE id_producto = $id_producto";

    $resultado = mysqli_query($conexion, $sql);
    
    $producto = mysqli_fetch_array($resultado);

    desconectar($conexion);
    $nombre = $producto['nombre'];
    $descripcion = $producto['descripcion'];
    $stock = $producto['stock'];
    $precio_venta = $producto['precio_venta'];
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <h1>Editar Producto</h1>
        <?php if (isset($error)) { ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php } ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group">
                <label for="nombre">Nombre del Producto:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre; ?>" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripcion:</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo $descripcion; ?>">
            </div>
            <div class="form-group">
                <label for="stock">Stock:</label>
                <input type="text" class="form-control" id="stock" name="stock" value="<?php echo $stock; ?>" required>
            </div>
            <div class="form-group">
                <label for="precio_venta">Precio de venta:</label>
                <input type="text" class="form-control" id="precio_venta" name="precio_venta" value="<?php echo $precio_venta; ?>" required>
            </div>
            <input type="hidden" name="id_producto" value="<?php echo $id_producto; ?>">
            <button type="submit" class="btn btn-primary mt-3">Guardar cambios</button>
        </form>
    </div>
</body>
</html>