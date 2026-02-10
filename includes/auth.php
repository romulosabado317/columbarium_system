<?php
session_start();
function check_login($role = null){
if(!isset($_SESSION['user_id'])){ header('Location: ../index.php'); exit(); }
if($role && $_SESSION['role'] != $role){ header('Location: ../index.php'); exit(); }
}
function regenerate_session(){
if(!isset($_SESSION['regenerated'])){
session_regenerate_id(true);
$_SESSION['regenerated'] = true;
}
}
regenerate_session();
?>
