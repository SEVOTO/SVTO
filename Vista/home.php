<?php
require_once __DIR__ . ("../../Controlador/UsuarioCtrl.php");
require_once __DIR__ . ("../../Controlador/RolCtrl.php");

// Verificar si el usuario ha iniciado sesión
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../../index.php");
    exit();
}

// Obtener el nombre y el rol del usuario que inició sesión
$usuarioController = new UsuarioController();
$rolController = new RolController();

$nombreUsuario = $_SESSION['usuario'];
$rolUsuario = $_SESSION['rol'];

$usuarios = $usuarioController->obtenerTodosUsuarios();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Usuarios</title>
</head>
<body>
    <h1>Bienvenido, <?php echo $nombreUsuario; ?></h1>
    <h2>Rol: <?php echo $rolUsuario->getDescripcion(); ?></h2>
    <a href="../Controlador/logout.php">Cerrar sesión</a>


    <h3>Tabla de Usuarios</h3>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Rol</th>
        </tr>
        <?php foreach ($usuarios as $usuario) { ?>
            <tr>
                <td><?php echo $usuario->getId(); ?></td>
                <td><?php echo $usuario->getNombre(); ?></td>
                <td><?php echo $usuario->getApellido(); ?></td>
                <td><?php echo $rolController->obtenerRol($usuario->getIdRol())->getDescripcion(); ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
