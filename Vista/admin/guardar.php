<?php
require_once ("../../Controlador/UsuarioCtrl.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $usuario = $_POST['usuario'];
    $annio = $_POST['annio'];
    $seccion = $_POST['seccion'];
    $pass = $_POST['pass'];
    $foto = $_FILES['foto']['name'];
    $id_rol = $_POST['id_rol'];

    // Guardar la foto en una carpeta y obtener la ruta
    $rutaFoto = "../img/usuario/" . $foto;
    move_uploaded_file($_FILES['foto']['tmp_name'], $rutaFoto);

    $usuarioController = new UsuarioController();
    $nuevoUsuario = $usuarioController->crearUsuario($nombre, $apellido, $usuario, $annio, $seccion, $pass, $rutaFoto, $id_rol);

    if ($nuevoUsuario) {
        echo "Usuario creado exitosamente.";
        return(header("Location: home.php"));
    } else {
        echo "Error al crear el usuario.";
    }
}
?>
