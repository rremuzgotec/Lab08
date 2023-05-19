<?php 

include ('../conexion.php'); 

// se abre la conexion
$conexion = conectar();

// busqueda 

if(isset($_GET['busqueda'])) {
    $busqueda = $_GET['busqueda'];

    $sql = "SELECT id_usuario, nombre, ape_paterno, ape_materno, direccion, email, telefono,
    password from usuario where nombre like '%busqueda%'";

    $resultado = mysqli_query($conexion, $sql);

} else {
    $sql = 'SELECT id_usuario, nombre, ape_paterno, ape_materno, direccion, email, telefono, password FROM usuario';
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
        <h1 class="text-center" >Usuarios</h1>
    </div>
        <a href="agregar.html" class="btn btn-warning mt-5">Nuevo Usuario</a>
        <table class="table table-warning mt-3">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Direccion</th>
                    <th>Email</th>
                    <th>Telefono</th>
                    <th>Password</th>
                    <th>Acciones</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                
                while ($usuario = mysqli_fetch_array($resultado)){
                    $id_usuario = $usuario['id_usuario'];
                    $nombre = $usuario['nombre'];
                    $ape_paterno = $usuario['ape_paterno'];
                    $ape_materno = $usuario['ape_materno'];
                    $direccion = $usuario['direccion'];
                    $email = $usuario['email'];
                    $telefono = $usuario['telefono'];
                    $password = $usuario['password'];

                    echo '<tr>';
                    echo '<td>'. $id_usuario. '</td>';
                    echo '<td>'. $nombre. '</td>';
                    echo '<td>'. $ape_paterno. '</td>';
                    echo '<td>'. $ape_materno. '</td>';
                    echo '<td>'. $direccion. '</td>';
                    echo '<td>'. $email. '</td>';
                    echo '<td>'. $telefono. '</td>';
                    echo '<td>'. $password. '</td>';
                    echo '<td><a href="editar_usuario.php?id_usuario=' . $id_usuario . '" <i class="fa-solid fa-pen-to-square btn btn-primary"></i></a></td>';
                    echo '<td><a href="eliminar_usuario.php?id_usuario=' . $id_usuario . '" <i class="fa-solid fa-trash btn btn-danger"></i></a></td>';
                }
                ?>
            </tbody>
        </table>   
</body>
</html>