<?php
require_once './model/Usuario.php';
session_start();

class Autenticacao {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = new Usuario();
            $logged = $usuario->login($_POST['email'], $_POST['senha']);
            if ($logged) {
                $_SESSION['usuario'] = $logged;
                header("Location: index.php?page=dashboard");
            } else {
                echo "Login inválido.";
            }
        } else {
            include './view/login.php';
        }
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = new Usuario();
            $usuario->register($_POST['nome'], $_POST['email'], $_POST['senha']);
            header("Location: index.php?page=login");
        } else {
            include './view/register.php';
        }
    }

    public function logout() {
        session_destroy();
        header("Location: index.php?page=login");
    }
}
?>
