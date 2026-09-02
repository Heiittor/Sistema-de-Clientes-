<?php
session_start();
require_once 'connect.php';

$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['password']) ? md5($_POST['password']) : '';

if (!empty($email) && !empty($password)) {
    autenticar($email, $password);
}

function autenticar($email, $password){
    $db = connect();
    $query = $db->prepare("SELECT * FROM usuarios WHERE email = :email AND password = :password");
    $query->execute([
        ':email' => $email,
        ':password' => $password
    ]);
    $result = $query->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        unset($result['password']);
        $_SESSION['user'] = $result;
    }

    header("Location: /");
    exit;
}