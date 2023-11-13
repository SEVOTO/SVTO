<?php
require_once ("../../Controlador/UsuarioCtrl.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];
    $usuarioController = new UsuarioController();
    $usuarioExistente = $usuarioController->obtenerUsuario($id);

    if ($usuarioExistente) {
        $resultado = $usuarioExistente->eliminar();

        if ($resultado) {
            echo "Usuario eliminado exitosamente.";
            return(header("Location: home.php"));
        } else {
            echo "Error al eliminar el usuario.";
        }
    } else {
        echo "El usuario no existe.";
    }
} else {
    echo "No se ha especificado un ID de usuario.";
}
?>
