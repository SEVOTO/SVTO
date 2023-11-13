<!DOCTYPE html>
<html>
<head>
    <title>Editar Usuario</title>
</head>
<body>
    <h1>Editar Usuario</h1>
    <?php
    require_once ("../../Controlador/UsuarioCtrl.php");

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
        $id = $_GET["id"];
        $usuarioController = new UsuarioController();
        $usuario = $usuarioController->obtenerUsuario($id);

        if ($usuario) {
            ?>
            <form action="actualizar.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $usuario->getId(); ?>">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" value="<?php echo $usuario->getNombre(); ?>" required><br><br>

                <label for="apellido">Apellido:</label>
                <input type="text" name="apellido" value="<?php echo $usuario->getApellido(); ?>" required><br><br>

                <label for="usuario">Usuario:</label>
                <input type="text" name="usuario" value="<?php echo $usuario->getUsuario(); ?>" required><br><br>

                <label for="annio">Año:</label>
                <select name="annio" required>
                    <option value="1" <?php if ($usuario->getAnnio() == 1) echo "selected"; ?>>1er Año</option>
                    <option value="2" <?php if ($usuario->getAnnio() == 2) echo "selected"; ?>>2do Año</option>
                    <option value="3" <?php if ($usuario->getAnnio() == 3) echo "selected"; ?>>3er Año</option>
                    <option value="4" <?php if ($usuario->getAnnio() == 4) echo "selected"; ?>>4to Año</option>
                    <option value="5" <?php if ($usuario->getAnnio() == 5) echo "selected"; ?>>5to Año</option>
                    <option value="6" <?php if ($usuario->getAnnio() == 6) echo "selected"; ?>>6to Año</option>
                </select><br><br>

                <label for="seccion">Sección:</label>
                <select name="seccion" required>
                    <option value="A" <?php if ($usuario->getSeccion() == "A") echo "selected"; ?>>Sección A</option>
                    <option value="B" <?php if ($usuario->getSeccion() == "B") echo "selected"; ?>>Sección B</option>
                    <option value="C" <?php if ($usuario->getSeccion() == "C") echo "selected"; ?>>Sección C</option>
                    <option value="D" <?php if ($usuario->getSeccion() == "D") echo "selected"; ?>>Sección D</option>
                    <option value="E" <?php if ($usuario->getSeccion() == "E") echo "selected"; ?>>Sección E</option>
                    <option value="F" <?php if ($usuario->getSeccion() == "F") echo "selected"; ?>>Sección F</option>
                    <option value="G" <?php if ($usuario->getSeccion() == "G") echo "selected"; ?>>Sección G</option>
                    <option value="H" <?php if ($usuario->getSeccion() == "H") echo "selected"; ?>>Sección H</option>
                    <option value="I" <?php if ($usuario->getSeccion() == "I") echo "selected"; ?>>Sección I</option>
                    <option value="J" <?php if ($usuario->getSeccion() == "J") echo "selected"; ?>>Sección J</option>
                    <option value="K" <?php if ($usuario->getSeccion() == "K") echo "selected"; ?>>Sección K</option>
                    <option value="L" <?php if ($usuario->getSeccion() == "L") echo "selected"; ?>>Sección L</option>
                </select><br><br>

                <label for="pass">Contraseña:</label>
                <input type="password" name="pass" required><br><br>



                <label for="foto">Foto:</label>
                    <?php
                    if ($usuario->getFoto()) {
                        echo "<img src='../img/" . $usuario->getFoto() . "' alt='Foto de usuario'>";
                    } else {
                        echo "No se ha cargado ninguna foto.";
                    }
                    ?><br>
                <input type="file" name="foto" id="fotoInput" onchange="mostrarFoto()" required><br><br>
                <img id="fotoPreview" src="#" alt="Vista previa de la foto" style="display: none; max-width: 200px; max-height: 200px;"><br><br>

                <label for="id_rol">Rol:</label>
                <select name="id_rol" required>
                    <?php
                    require_once __DIR__ . "/../../Controlador/RolCtrl.php";
                    $rolController = new RolController();
                    $roles = $rolController->obtenerTodosRoles();

                    foreach ($roles as $rol) {
                        echo "<option value='" . $rol->getId() . "'";
                        if ($rol->getId() == $usuario->getIdRol()) echo "selected";
                        echo ">" . $rol->getDescripcion() . "</option>";
                    }
                    ?>
                </select><br><br>

                <input type="submit" value="Actualizar">
            </form>
            <?php
        } else {
            echo "El usuario no existe.";
        }
    } else {
        echo "No se ha especificado un ID de usuario.";
    }
    ?>

<script>
function mostrarFoto() {
  var fotoInput = document.getElementById('fotoInput');
  var fotoPreview = document.getElementById('fotoPreview');

  if (fotoInput.files && fotoInput.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      fotoPreview.src = e.target.result;
      fotoPreview.style.display = 'block';
    }

    reader.readAsDataURL(fotoInput.files[0]);
  }
}
</script>
</body>
</html>
