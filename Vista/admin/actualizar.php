<?php
require_once("../../Controlador/UsuarioCtrl.php");
require_once ('../../Modelo/Rol.php');

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$usuario = $_POST['usuario'];
$annio = $_POST['annio'];
$seccion = $_POST['seccion'];
$pass = $_POST['pass'];
$id_rol = $_POST['id_rol'];

// Obtener la foto
$foto = $_FILES['foto']['name'];
$rutaCompleta = "../img/usuario/" . $foto;

// Mover el archivo a la carpeta de destino
move_uploaded_file($_FILES['foto']['tmp_name'], $rutaCompleta);


$usuarioController = new UsuarioController();
$usuarioActualizado = $usuarioController->actualizarUsuario($id, $nombre, $apellido, $usuario, $annio, $seccion, $pass, $rutaCompleta, $id_rol);

if ($usuarioActualizado) {
    // El usuario fue actualizado exitosamente
    header("Location: home.php");
} else {
    // Hubo un error al actualizar el usuario
    echo "Hubo un error al actualizar el usuario.";
}
?>
