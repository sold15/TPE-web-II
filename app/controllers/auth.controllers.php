<?php

class UsuarioController {
    public function registro() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Validacion de datos
            if (empty($nombre) || empty($email) || empty($password)) {
                echo "Por favor, complete todos los campos.";
            } else {
                // nuevo usuario
                require_once '../models/user.model.php';
                $UserModel = new UserModel();
                $exito = $UserModel->insertarUsuario($nombre, $email, $password);

                if ($exito) {
                    header("Location: registro_exitoso.php");
                } else {
                    echo "Error al registrar el usuario. Por favor, inténtelo de nuevo.";
                }
            }
        
    }
}
}
?>