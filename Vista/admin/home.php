<?php
require_once ("../../Controlador/UsuarioCtrl.php");
require_once ("../../Controlador/RolCtrl.php");

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
    <a href="../../Controlador/logout.php">Cerrar sesión</a>

    <h1>Menú</h1>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Usuario</th>
            <th>Año</th>
            <th>Seccion</th>
            <th>Foto</th>
            <th>IDRol</th>
            <th>Rol</th>
            <th>Acciones</th>
        </tr>
        <?php
require_once ("../../Controlador/UsuarioCtrl.php");

        $usuarioController = new UsuarioController();
        $usuarios = $usuarioController->obtenerTodosUsuarios();

        foreach ($usuarios as $usuario) {
            ?>
            <tr>
                <td><?php echo $usuario->getNombre(); ?></td>
                <td><?php echo $usuario->getApellido(); ?></td>
                <td><?php echo $usuario->getUsuario(); ?></td>
                <td><?php echo $usuario->getAnnio(); ?></td>
                <td><?php echo $usuario->getSeccion(); ?></td>
                <td><img src="../img/<?php echo $usuario->getFoto(); ?>" alt="Foto de perfil" width="100" height="100"></td>
                <td><?php echo $usuario->getIdRol(); ?></td>
                <td><?php echo $rolController->obtenerRol($usuario->getIdRol())->getDescripcion(); ?></td>
                <td>
                    <a href="editar.php?id=<?php echo $usuario->getId(); ?>">Editar</a>
                    <a href="eliminar.php?id=<?php echo $usuario->getId(); ?>" onclick="return confirm('¿Estás seguro de eliminar los datos del usuario <?php echo $usuario->getNombre(); ?>?')">Eliminar</a>

                </td>
            </tr>
            <?php
        }
        ?>
    </table>
    <br>
    <a href="agregar.php">Agregar Usuario</a>
</body>
</html>
