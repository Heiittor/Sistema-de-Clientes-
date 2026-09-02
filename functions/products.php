<?php

require_once 'connect.php';


// Atualizado 'idade' para 'preco' para fazer sentido com produtos
$nome = isset($_POST['nome']) ? $_POST['nome'] : '';
$preco = isset($_POST['preco']) ? $_POST['preco'] : '';
$update = isset($_POST['update']) ? $_POST['update'] : '';
$id = isset($_POST['id']) ? $_POST['id'] : '';
$deletar = isset($_GET['deletar']) ? $_GET['deletar'] : '';
$deleteId = isset($_GET['id']) ? $_GET['id'] : '';

if (!empty($nome) && !empty($preco)) {
    if(!empty($update) && !empty($id)){
        setProducts($nome, $preco, $id);
    }else {
        insertProducts($nome, $preco);
    } 
}

if(!empty($deletar) && !empty($deleteId)){
    deleteProducts($deleteId);
}

function selectProducts(){
    $db = connect();
    $query = $db->prepare("SELECT * FROM products");
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function insertProducts($product_name, $product_price){
    $db = connect();
    // Nomes corretos das colunas baseados na imagem
    $query = $db->prepare("INSERT INTO products (product_name, product_price) VALUES (:nome, :preco)");
    $query->execute([
        ':nome' => $product_name,
        ':preco' => $product_price
    ]);
    header("Location: ../?p=products");
    exit;
}

function getProducts($id){
    $db = connect();
    $query = $db->prepare("SELECT * FROM products WHERE product_id = :id");
    $query->execute([':id' => $id]);
    return $query->fetch(PDO::FETCH_ASSOC);
}

function setProducts($nome, $preco, $id){
    $db = connect();
    $query = $db->prepare("UPDATE products SET product_name = :nome, product_price = :preco WHERE product_id = :id");
    $query->execute([
        ':nome' => $nome,
        ':preco' => $preco,
        ':id' => $id
    ]);
    header("Location: ../?p=products");
    exit;
}

function deleteProducts($id){
    $db = connect();
    $query = $db->prepare("DELETE FROM products WHERE product_id = :id");
    $query->execute([':id' => $id]);
    header("Location: ../?p=products");
    exit;
}