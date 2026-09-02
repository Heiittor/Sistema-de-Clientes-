<?php
require_once 'connect.php';

$client_id = isset($_POST['client_id']) ? $_POST['client_id'] : '';
$product_id = isset($_POST['product_id']) ? $_POST['product_id'] : '';
$data_pedido = isset($_POST['data_pedido']) ? $_POST['data_pedido'] : '';
$update = isset($_POST['update']) ? $_POST['update'] : '';
$id = isset($_POST['id']) ? $_POST['id'] : '';
$deletar = isset($_GET['deletar']) ? $_GET['deletar'] : '';
$deleteId = isset($_GET['id']) ? $_GET['id'] : '';

if (!empty($client_id) && !empty($product_id)) {
    if (!empty($update) && !empty($id)) {
        setOrders($client_id, $product_id, $data_pedido, $id);
    } else {
        insertOrders($client_id, $product_id, $data_pedido);
    }
}

if (!empty($deletar) && !empty($deleteId)) {
    deleteOrders($deleteId);
}

function selectOrders(){
    $db = connect();
    $query = $db->prepare("SELECT * FROM orders AS o
                            JOIN clientes AS c ON o.client_id = c.client_id
                            JOIN products AS p ON o.product_id = p.product_id
                            ORDER BY o.order_id DESC");
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function insertOrders($client_id, $product_id, $data_pedido = ''){
    $db = connect();
    if (!empty($data_pedido)) {
        // Data escolhida pelo usuário no form
        $query = $db->prepare("INSERT INTO orders (client_id, product_id, data_pedido) VALUES (:client_id, :product_id, :data_pedido)");
        $query->execute([
            ':client_id' => $client_id,
            ':product_id' => $product_id,
            ':data_pedido' => $data_pedido
        ]);
    } else {
        // Campo deixado em branco: o DEFAULT CURRENT_TIMESTAMP da coluna assume
        $query = $db->prepare("INSERT INTO orders (client_id, product_id) VALUES (:client_id, :product_id)");
        $query->execute([
            ':client_id' => $client_id,
            ':product_id' => $product_id
        ]);
    }
    header("Location: ../?p=orders");
    exit;
}

function getOrders($id){
    $db = connect();
    $query = $db->prepare("SELECT * FROM orders WHERE order_id = :id");
    $query->execute([':id' => $id]);
    return $query->fetch(PDO::FETCH_ASSOC);
}

function setOrders($client_id, $product_id, $data_pedido, $id){
    $db = connect();
    $query = $db->prepare("UPDATE orders SET client_id = :client_id, product_id = :product_id, data_pedido = :data_pedido WHERE order_id = :id");
    $query->execute([
        ':client_id' => $client_id,
        ':product_id' => $product_id,
        ':data_pedido' => $data_pedido,
        ':id' => $id
    ]);
    header("Location: ../?p=orders");
    exit;
}

function deleteOrders($id){
    $db = connect();
    $query = $db->prepare("DELETE FROM orders WHERE order_id = :id");
    $query->execute([':id' => $id]);
    header("Location: ../?p=orders");
    exit;
}