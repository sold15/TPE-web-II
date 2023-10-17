<?php

class AuthHelper {

    function init() {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    function showLogin($user) {
        AuthHelper::init();
        $_SESSION['USER_ID'] = $user->id;
        $_SESSION['USER_EMAIL'] = $user->email; 
    }

     function logout() {
        AuthHelper::init();
        session_destroy();
    }
    function verify() {
        AuthHelper::init();
        if (!isset($_SESSION['USER_ID'])) {
            header('Location: ' . 'mysql:host=localhost;dbname=cine;charset=utf8'. '/login');
            die();
        }
    }
}