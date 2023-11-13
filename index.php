<?php
require_once ("Controlador/UsuarioCtrl.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $pass = $_POST["pass"];

    $usuarioValidado = new UsuarioController();
    $usuarioValidado->validarCredenciales($usuario, $pass);
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="vista/estilos/estilos.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="vista/dist/img/sevoto.png" rel="icon" type="image/png" />
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>SEVOTO</title>

    <script>
        function validateCedula() {
            var cedula = document.forms["loginForm"]["usuario"].value;
            if (cedula < 1000000) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Introduzca una cédula válida'
                });
            }
        }
        function validatePassword() {
            var password = document.forms["loginForm"]["password"].value;
            if (password == "") {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'La contraseña no puede estar vacía'
                });
            }
        }
        <?php if (isset($_SESSION['mensaje'])): ?>
      Swal.fire({
        icon: 'error',
        title: 'error',
        text: '<?php echo $_SESSION['mensaje']; ?>'
      });
      <?php unset($_SESSION['mensaje']); ?>
    <?php endif; ?>
    </script>
</head>

<body background="vista/dist/img/New.jpg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="zoom-layer">
                    <div class="box">
                        <form name="loginForm" action="index.php" method="POST">
                            <img class="img-logo" src="vista/dist/img/sevoto.png" class="img-fluid mb-3" alt="Logo">
                            <div class="inputBox">
                                <div class="form-group">
                                    <label for="usuario" class="label"><b>Usuario</b></label>
                                    <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="8" class="form-control" id="usuario" name="usuario" onblur="validateCedula()" required>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="label"><b>Contraseña</b></label>
                                    <input type="password" class="form-control" id="pass" name="pass" onblur="validatePassword()" required>
                                </div>
                                <input type="submit" value="Iniciar Sesión">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
