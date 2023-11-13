<?php
require_once("conexion.php");

class Usuario {
    // Propiedades de la clase Usuario
    private $id;
    private $nombre;
    private $apellido;
    private $usuario;
    private $annio;
    private $seccion;
    private $pass;
    private $foto;
    private $id_rol;

    // Constructor de la clase Usuario
    public function __construct($id, $nombre, $apellido, $usuario, $annio, $seccion, $pass, $foto, $id_rol) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->usuario = $usuario;
        $this->annio = $annio;
        $this->seccion = $seccion;
        $this->pass = $pass;
        $this->foto = $foto;
        $this->id_rol = $id_rol;
    }

    // Métodos de acceso (getters) y modificación (setters) para las propiedades
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function getAnnio() {
        return $this->annio;
    }

    public function setAnnio($annio) {
        $this->annio = $annio;
    }

    public function getSeccion() {
        return $this->seccion;
    }

    public function setSeccion($seccion) {
        $this->seccion = $seccion;
    }

    public function getPass() {
        return $this->pass;
    }

    public function setPass($pass) {
        $this->pass = $pass;
    }

    public function getFoto() {
        return $this->foto;
    }

    public function setFoto($foto) {
        $this->foto = $foto;
    }

    public function getIdRol() {
        return $this->id_rol;
    }

    public function setIdRol($id_rol) {
        $this->id_rol = $id_rol;
    }

    // Método para obtener un usuario por su ID
    public static function obtenerPorId($id) {
        $db = new DBConexion();
        $conn = $db->getConexion();

        $query = "SELECT * FROM usuarios WHERE id = $id";
        $result = $conn->query($query);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $usuario = new Usuario($row['id'], $row['nombre'], $row['apellido'], $row['usuario'], $row['annio'], $row['seccion'], $row['pass'], $row['foto'], $row['id_rol']);
            return $usuario;
        } else {
            return null;
        }
    }

    public static function obtenerTodos() {
        $db = new DBConexion();
        $conn = $db->getConexion();
    
        $query = "SELECT * FROM usuarios";
        $result = $conn->query($query);
    
        $usuarios = array();
    
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $usuarios[] = $row;
            }
        }
    
        return $usuarios;
    }
    

    // Método para validar las credenciales de un usuario
    public static function validarCredenciales($usuario, $pass) {
        $db = new DBConexion();
        $conn = $db->getConexion();

        $usuario = $conn->real_escape_string($usuario);
        $pass = $conn->real_escape_string($pass);

        $query = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND pass = '$pass'";
        $result = $conn->query($query);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $usuario = new Usuario($row['id'], $row['nombre'], $row['apellido'], $row['usuario'], $row['annio'], $row['seccion'], $row['pass'], $row['foto'], $row['id_rol']);
            return $usuario;
        } else {
            return null;
        }
    }

    // Método para crear un nuevo usuario
    public function crear() {
        $db = new DBConexion();
        $conn = $db->getConexion();

        $nombre = $conn->real_escape_string($this->nombre);
        $apellido = $conn->real_escape_string($this->apellido);
        $usuario = $conn->real_escape_string($this->usuario);
        $annio = $conn->real_escape_string($this->annio);
        $seccion = $conn->real_escape_string($this->seccion);
        $pass = $conn->real_escape_string($this->pass);
        $foto = $conn->real_escape_string($this->foto);
        $id_rol = $conn->real_escape_string($this->id_rol);

        $query = "INSERT INTO usuarios (nombre, apellido, usuario, annio, seccion, pass, foto, id_rol) VALUES ('$nombre', '$apellido', '$usuario', '$annio', '$seccion', '$pass', '$foto', '$id_rol')";
        $result = $conn->query($query);

        if ($result) {
            $this->id = $conn->insert_id;
            return true;
        } else {
            return false;
        }
    }

    // Método para actualizar los datos de un usuario
    public function actualizar() {
        $db = new DBConexion();
        $conn = $db->getConexion();

        $id = $conn->real_escape_string($this->id);
        $nombre = $conn->real_escape_string($this->nombre);
        $apellido = $conn->real_escape_string($this->apellido);
        $usuario = $conn->real_escape_string($this->usuario);
        $annio = $conn->real_escape_string($this->annio);
        $seccion = $conn->real_escape_string($this->seccion);
        $pass = $conn->real_escape_string($this->pass);
        $foto = $conn->real_escape_string($this->foto);
        $id_rol = $conn->real_escape_string($this->id_rol);

        $query = "UPDATE usuarios SET nombre = '$nombre', apellido = '$apellido', usuario = '$usuario', annio = '$annio', seccion = '$seccion', pass = '$pass', foto = '$foto', id_rol = '$id_rol' WHERE id = $id";
        $result = $conn->query($query);

        return $result;
    }

    // Método para eliminar un usuario
    public function eliminar() {
        $db = new DBConexion();
        $conn = $db->getConexion();

        $id = $conn->real_escape_string($this->id);

        $query = "DELETE FROM usuarios WHERE id = $id";
        $result = $conn->query($query);

        return $result;
    }
}
?>
