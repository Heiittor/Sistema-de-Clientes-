<?php
require_once 'connect.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$nome = isset($_POST['nome']) ? $_POST['nome'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$update = isset($_POST['update']) ? $_POST['update'] : '';
$id = isset($_POST['id']) ? $_POST['id'] : '';
$role_id = isset($_POST['role_id']) ? $_POST['role_id'] : '';
$deletar = isset($_GET['deletar']) ? $_GET['deletar'] : '';
$deleteId = isset($_GET['id']) ? $_GET['id'] : '';

if (!empty($nome) && !empty($email)) {
    if (!empty($update) && !empty($id)) {
        $user = getUsers($id);
        $password = (!empty($_POST['password'])) ? md5($_POST['password']) : $user['password'];
        $roleToSet = (!empty($_POST['role_id'])) ? $_POST['role_id'] : $user['role_id'];
        setUsers($nome, $email, $password, $roleToSet, $id);
    } else {
        $password = isset($_POST['password']) ? md5($_POST['password']) : '';
        insertUsers($nome, $email, $password, $role_id);
    }
}

if (!empty($deletar) && !empty($deleteId)) {
    deleteUsers($deleteId);
}

function selectUsers(){
    $db = connect();
    $query = $db->prepare("SELECT u.*, r.role_name FROM usuarios AS u
                            LEFT JOIN roles AS r ON u.role_id = r.role_id");
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function insertUsers($nome, $email, $password, $role_id){
    $db = connect();
    $query = $db->prepare("INSERT INTO usuarios (nome, email, password, role_id) VALUES (:nome, :email, :password, :role_id)");
    $query->execute([
        ':nome' => $nome,
        ':email' => $email,
        ':password' => $password,
        ':role_id' => $role_id
    ]);
    header("Location: ../?p=users");
    exit;
}

function getUsers($id){
    $db = connect();
    $query = $db->prepare("SELECT * FROM usuarios WHERE id = :id");
    $query->execute([':id' => $id]);
    return $query->fetch(PDO::FETCH_ASSOC);
}

function setUsers($nome, $email, $password, $role_id, $id){
    $db = connect();
    $query = $db->prepare("UPDATE usuarios SET nome = :nome, email = :email, password = :password, role_id = :role_id WHERE id = :id");
    $query->execute([
        ':nome' => $nome,
        ':email' => $email,
        ':password' => $password,
        ':role_id' => $role_id,
        ':id' => $id
    ]);
    header("Location: ../?p=users");
    exit;
}

function deleteUsers($id){
    $db = connect();

    // Impede que o usuário logado apague a própria conta
    if (isset($_SESSION['user']['id']) && $_SESSION['user']['id'] == $id) {
        header("Location: ../?p=users&erro=nao_pode_deletar_a_si_mesmo");
        exit;
    }

    try {
        $db->beginTransaction();
        $query = $db->prepare("DELETE FROM atributes WHERE user_id = :id");
        $query->execute([':id' => $id]);
        $query = $db->prepare("DELETE FROM usuarios WHERE id = :id");
        $query->execute([':id' => $id]);
        $db->commit();
    } catch (PDOException $e) {
        $db->rollBack();
        error_log($e->getMessage());
        header("Location: ../?p=users&erro=falha_ao_deletar");
        exit;
    }

    header("Location: ../?p=users");
    exit;
}

function getAttributes(){
    $db = connect();
    $query = $db->prepare("SELECT * FROM usuarios AS u
                            JOIN atributes AS attr ON u.id = attr.user_id
                            WHERE u.id = :id");
    $query->execute([':id' => $_SESSION['user']['id']]);
    return $query->fetchAll(PDO::FETCH_ASSOC);
}