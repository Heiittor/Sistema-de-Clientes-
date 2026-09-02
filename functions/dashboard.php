<?php
require_once 'connect.php';

function getTotalClientes(){
    $db = connect();
    $query = $db->prepare("SELECT COUNT(*) as total FROM clientes");
    $query->execute();
    return (int) $query->fetch(PDO::FETCH_ASSOC)['total'];
}

function getTotalProdutos(){
    $db = connect();
    $query = $db->prepare("SELECT COUNT(*) as total FROM products");
    $query->execute();
    return (int) $query->fetch(PDO::FETCH_ASSOC)['total'];
}

function getTotalPedidos(){
    $db = connect();
    $query = $db->prepare("SELECT COUNT(*) as total FROM orders");
    $query->execute();
    return (int) $query->fetch(PDO::FETCH_ASSOC)['total'];
}

function getValorTotalPedidos(){
    $db = connect();
    $query = $db->prepare("SELECT SUM(p.product_price) as total
                            FROM orders o
                            JOIN products p ON o.product_id = p.product_id");
    $query->execute();
    return (float) ($query->fetch(PDO::FETCH_ASSOC)['total'] ?? 0);
}

function getPercentProdutosVendidos(){
    $db = connect();
    $totalProdutos = getTotalProdutos();
    if ($totalProdutos === 0) return 0;
    $query = $db->prepare("SELECT COUNT(DISTINCT product_id) as total FROM orders");
    $query->execute();
    $vendidos = (int) $query->fetch(PDO::FETCH_ASSOC)['total'];
    return round(($vendidos / $totalProdutos) * 100);
}

function getReceitaPorProduto(){
    $db = connect();
    $query = $db->prepare("SELECT p.product_name, SUM(p.product_price) as total
                            FROM orders o
                            JOIN products p ON o.product_id = p.product_id
                            GROUP BY p.product_id, p.product_name
                            ORDER BY total DESC");
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function getPedidosPorMes(){
    $db = connect();
    $query = $db->prepare("SELECT DATE_FORMAT(o.data_pedido, '%Y-%m') as mes, SUM(p.product_price) as total
                            FROM orders o
                            JOIN products p ON o.product_id = p.product_id
                            GROUP BY mes
                            ORDER BY mes ASC");
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}