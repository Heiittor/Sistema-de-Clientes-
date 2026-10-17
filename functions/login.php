<?php
session_start();
require_once 'connect.php';

$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

if ($email !== '' && $password !== '') {
    autenticar($email, md5($password));
}

$_SESSION['login_error'] = 'Informe e-mail e senha.';
header("Location: /");
exit;

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
    } else {
        $_SESSION['login_error'] = 'E-mail ou senha incorretos.';
    }

    header("Location: /");
    exit;
}