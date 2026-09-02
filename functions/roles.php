<?php

function selectRoles(){ 
    $db = connect();
    $query = $db->prepare("SELECT * FROM roles");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

// function insertUsers($nome, $email, $password){ // função para inserir usuarios
//     $db = connect();
//     $query = $db->prepare("INSERT INTO usuarios (nome, email, password) VALUES ('$nome', '$email', '$password')");
//     $query->execute();
//     header("Location: ../?p=users");
// }

// function getUsers($id){
//     $db = connect();
//     $query = $db->prepare("SELECT * FROM usuarios WHERE id = $id");
//     $query->execute();
//     $result = $query->fetch(PDO::FETCH_ASSOC);
//     return $result;

// }

// function setUsers($nome, $email, $password, $id){
//     $db = connect();
//     $query = $db->prepare("UPDATE usuarios SET nome= '$nome', email='$email', password='$password' WHERE id = $id");
//     $query->execute();
//     header("Location: ../?p=users");
// }

// function deleteUsers($id){
//     $db = connect();
//     $query = $db->prepare("DELETE FROM usuarios WHERE id = $id");
//     $query->execute();
//     header("Location: ../?p=users");
// }