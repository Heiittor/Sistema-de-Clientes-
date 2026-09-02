<?php 
ob_start(); 
session_start();

if(isset($_SESSION['user'])) {
    require './template/template.php';
}else{
    require './template/login-template.php';
}
 ?>
