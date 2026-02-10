<?php
session_start();

function check_login($role = null) {
    if(!isset($_SESSION['user_id'])){
        header("Location: ../public/login.php");
        exit();
    }
    if($role && $_SESSION['role'] != $role){
        header("Location: ../public/login.php");
        exit();
    }
}

function is_logged_in() {
    return isset($_SESSION['user_id']);
}
?>
