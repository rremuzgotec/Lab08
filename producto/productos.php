<?php 

include ('../conexion.php'); 

// se abre la conexion
$conexion = conectar();

// busqueda 

if(isset($_GET['busqueda'])) {
    $busqueda = $_GET['busqueda'];

    $sql = "SELECT id_producto, nombre, descripcion, stock, precio_venta from producto where nombre like '%$busqueda%'";

    $resultado = mysqli_query($conexion, $sql);

} else {
    $sql = 'SELECT id_producto, nombre, descripcion, stock, precio_venta FROM producto';
    $resultado = mysqli_query($conexion, $sql);
}

desconectar($conexion);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/18b9c6a8fe.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
        <h1 class="text-center" >Productos</h1>
        <div>
            <form method="GET" action="">
                <div class="form-group mx-auto col-10 col-md-10">
                    <label for="busqueda">Buscar Producto:</label>
                    <input type="text" name="busqueda" id="busqueda" class="form-control">
                    <button type="submit" class="btn btn-success mt-3">Buscar</button>
                </div>
            </form>
            <a href="agregar.html" class="btn btn-primary mt-3">Nuevo Producto</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Stock</th>
                        <th>Precio venta</th>
                        <th>Acciones</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($producto = mysqli_fetch_array($resultado)){
                            $id_producto = $producto['id_producto'];
                            $nombre = $producto['nombre'];
                            $descripcion = $producto['descripcion'];
                            $stock = $producto['stock'];
                            $precio_venta = $producto['precio_venta'];

                            echo '<tr>';
                            echo '<td>' . $id_producto . '</td>';
                            echo '<td>' . $nombre . '</td>';
                            echo '<td>' . $descripcion . '</td>';
                            echo '<td>' . $stock . '</td>';
                            echo '<td>' . $precio_venta . '</td>';
                            echo '<td><a href="editar_producto.php?id_producto=' . $id_producto . '"><i class="fa-solid fa-pen-to-square btn btn-primary"></i></a></td>';
                            echo '<td><a href="eliminar_producto.php?id_producto=' . $id_producto . '"><i class="fa-solid fa-trash btn btn-danger"></i></a></td>';

                        }
                    ?>
                </tbody>
        </table>   
</body>
</html>