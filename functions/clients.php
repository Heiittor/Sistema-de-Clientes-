<?php

require_once 'connect.php';

$nome = isset( $_POST['nome']) ? $_POST['nome'] : '';
$idade = isset($_POST['idade']) ? $_POST['idade'] : '';
$update = isset($_POST['update']) ? $_POST['update'] : '';
$id = isset($_POST['id']) ? $_POST['id'] : '';
$deletar = isset($_GET['deletar']) ? $_GET['deletar'] : '';
$deleteId = isset($_GET['id']) ? $_GET['id'] : '';

if (!empty($nome) && !empty($idade)) {
    if(!empty($update) && !empty($id)){
        setClients($nome, $idade, $id);
    }else {
        insertClients($nome, $idade);
    } 
}

if(!empty($deletar) && !empty($deleteId)){
    deleteClients($deleteId);
}

function selectClients(){ // função para selecionar os clientes do banco de dados
    $db = connect();
    $query = $db->prepare("SELECT * FROM clientes");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function insertClients($nome, $idade){ // função para inserir clientes
    $db = connect();
    $query = $db->prepare("INSERT INTO clientes (nome, idade) VALUES ('$nome', $idade)");
    $query->execute();
    header("Location: ../?p=clients");
}

function getClients($client_id){
    $db = connect();
    $query = $db->prepare("SELECT * FROM clientes WHERE client_id = '$client_id' ");
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function setClients($nome, $idade, $id){
    $db = connect();
    $query = $db->prepare("UPDATE clientes SET nome= '$nome', idade=$idade WHERE client_id = $id");
    $query->execute();
    header("Location: ../?p=clients");
}

function deleteClients($id){
    $db = connect();
    $query = $db->prepare("DELETE FROM clientes WHERE client_id = $id");
    $query->execute();
    header("Location: ../?p=clients");
}