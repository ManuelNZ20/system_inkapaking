<?php
error_reporting(E_ALL); // Error/Exception engine, always use E_ALL permite mostrar todos los errores
ini_set('display_errors', 1); // Error/Exception display, use ini_set to override permite mostrar todos los errores
session_start();
date_default_timezone_set('America/Lima');
require_once(__DIR__.'/../../../config/database.php');

class UserModel {
    private $con;
    private $sql;
    private $res;

    public function __construct()
    {
        $this->con = new ConnectionDataBase();
        $this->con = $this->con->getConnection();
    }

    public function getUsers()
    {
    }

    public function emailExists($email) {
        $this->sql = "SELECT COUNT(*) FROM users WHERE email = :email";
        $this->res = $this->con->prepare($this->sql);
        $this->res->bindParam(':email', $email);
        $this->res->execute();
        $count = $this->res->fetchColumn();

        return $count > 0; // Retorna true si el correo existe, false si no
    }

    public function createUser($email,$password,$fullname,$area_id) {
         // Verificar si el correo ya existe
         if ($this->emailExists($email)) {
            // Redirigir al formulario con un mensaje de error
            header("Location: ../views/register.php?error=email_exists");
            exit;
        }
        
        $this->sql = "INSERT INTO users (email, password, fullname) VALUES (:email, :password, :fullname)";
        $this->res = $this->con->prepare($this->sql);
        $this->res->bindParam(':email', $email);
        // Encriptar la contraseña
        $password = password_hash($password, PASSWORD_DEFAULT);
        $this->res->bindParam(':password', $password);
        $this->res->bindParam(':fullname', $fullname);
        // obtener id de usuario
        $this->res->execute();
        // obtener el id del usuario
        $user_id = $this->con->lastInsertId();
        // agregar usuario a un área
        $this->addUserArea($user_id,$area_id);
        
        return $user_id;
    }

    public function addUserArea($user_id,$area_id) {
        $this->sql = "INSERT INTO user_area (user_id, area_id) VALUES (:user_id, :area_id)";
        $this->res = $this->con->prepare($this->sql);
        $this->res->bindParam(':user_id', $user_id);
        $this->res->bindParam(':area_id', $area_id);
        return $this->res->execute();
    }
    // LoginController
    public function authenticateUser($email,$password) {
         // Verifica si el usuario existe y la contraseña es correcta
        $this->sql = "SELECT * FROM users WHERE email = :email LIMIT 1";
        $this->res = $this->con->prepare($this->sql);
        $this->res->bindParam(':email', $email);
        $this->res->execute();
        $user = $this->res->fetch(PDO::FETCH_ASSOC);
        // Verifica la contraseña
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
}
?>