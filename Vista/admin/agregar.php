<!DOCTYPE html>
<html>
<head>
    <title>Agregar Usuario</title>
</head>
<body>
    <h1>Agregar Usuario</h1>
    <form action="guardar.php" method="POST" enctype="multipart/form-data">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required><br><br>
        
        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" required><br><br>
        
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" required><br><br>
        
        <label for="annio">Año:</label>
        <select name="annio" required>
            <option value="1">1er Año</option>
            <option value="2">2do Año</option>
            <option value="3">3er Año</option>
            <option value="4">4to Año</option>
            <option value="5">5to Año</option>
            <option value="6">6to Año</option>
        </select><br><br>
        
        <label for="seccion">Sección:</label>
        <select name="seccion" required>
            <option value="A">Sección A</option>
            <option value="B">Sección B</option>
            <option value="C">Sección C</option>
            <option value="D">Sección D</option>
            <option value="E">Sección E</option>
            <option value="F">Sección F</option>
            <option value="G">Sección G</option>
            <option value="H">Sección H</option>
            <option value="I">Sección I</option>
            <option value="J">Sección J</option>
            <option value="K">Sección K</option>
            <option value="L">Sección L</option>
        </select><br><br>
        
        <label for="pass">Contraseña:</label>
        <input type="password" name="pass" required><br><br>
        
        <label for="foto">Foto:</label>
        <input type="file" name="foto" required><br><br>
        
        <label for="id_rol">Rol:</label>
        <select name="id_rol" required>
        <?php
                    require_once __DIR__ . "/../../Controlador/RolCtrl.php";

                    $rolController = new RolController();
                    $roles = $rolController->obtenerTodosRoles();
                    
                    foreach ($roles as $rol) {
                        echo "<option value='" . $rol->getId() . "'>" . $rol->getDescripcion() . "</option>";
                    }
                    ?>
        </select>

        <br><br>
        
        <input type="submit" value="Guardar">
    </form>
</body>
</html>
