<?php 

include ('../conexion.php'); 

if(isset($_GET['id_usuario'])) {

    $id_usuario = $_GET['id_usuario'];

    $conexion = conectar();

    $sql = "DELETE FROM usuario where id_usuario = $id_usuario";

    if(mysqli_query($conexion, $sql)) {
        header("Location: usuarios.php");
    } else {

        $error = "Error al eliminar al usuario". mysqli_error($conexion);
    }

    desconectar($conexion);
} else {
    $error = "No se elimino el usuario";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <h1>Eliminar Usuario</h1>
        <?php if(isset($error)) { ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php } else { ?>
            <div class="alert alert-success"> Se ha eliminado el producto</div>
        <?php } ?>
        <a href="usuarios.php" class="btn btn-primary">Volver a los usuarios</a>
    </div>
</body>
</html>