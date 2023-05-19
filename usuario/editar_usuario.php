<?php 

include ('../conexion.php'); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id_usuario = $_POST['id_usuario'];
    $nombre = $_POST['nombre'];
    $ape_paterno = $_POST['ape_paterno'];
    $ape_materno = $_POST['ape_materno'];
    $direccion = $_POST['direccion'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $password = $_POST['password'];


    $conexion = conectar();

    $sql = "UPDATE usuario SET nombre = '$nombre', ape_paterno = '$ape_paterno', ape_materno = '$ape_materno', direccion = '$direccion', email = '$email',
            telefono = '$telefono', password = '$password' WHERE id_usuario = $id_usuario";

    if (mysqli_query($conexion, $sql)) {
        
        desconectar($conexion);

        header('Location: usuarios.php');
        exit;
    } else {
        $error = 'No se pudo actualizar al usuario'. mysqli_error($conexion);
    }
    } else {
        
        
        $id_usuario = $_GET['id_usuario'];

        $conexion = conectar();

        $sql = "SELECT nombre, ape_paterno, ape_materno, direccion, email, telefono, password FROM usuario WHERE id_usuario = $id_usuario";

        $resultado = mysqli_query($conexion, $sql);

        $usuario = mysqli_fetch_array($resultado);

        desconectar($conexion);

        $nombre = $usuario['nombre'];
        $ape_paterno = $usuario['ape_paterno'];
        $ape_materno = $usuario['ape_materno'];
        $direccion = $usuario['direccion'];
        $email = $usuario['email'];
        $telefono = $usuario['telefono'];
        $password = $usuario['password'];

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <h1>Editar Usuario</h1>
        <?php  if(isset($error)) { ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php } ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre; ?>" required>
            </div>
            <div class="form-group">
                <label for="ape_paterno">Apellido Paterno:</label>
                <input type="text" class="form-control" id="ape_paterno" name="ape_paterno" value="<?php echo $ape_paterno; ?>" required>
            </div>
            <div class="form-group">
                <label for="ape_materno">Apellido Materno:</label>
                <input type="text" class="form-control" id="ape_materno" name="ape_materno" value="<?php echo $ape_materno; ?>" required>
            </div>
            <div class="form-group">
                <label for="direccion">Direccion:</label>
                <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $direccion; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="form-group">
                <label for="telefono">Telefono:</label>
                <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $telefono; ?>">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="text" class="form-control" id="password" name="password" value="<?php echo $password; ?>" required>
            </div>
            <input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>">
            <button type="submit" class="btn btn-warning mt-3">Guardar</button>
        </form>
    </div>
</body>
</html>