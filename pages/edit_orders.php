<?php
require_once './functions/orders.php';
require_once './functions/clients.php';
require_once './functions/products.php';

$id = $_GET['id'];
$order = getOrders($id);
?>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Editar Pedido</h1>

    <div class="row">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="" method="POST">

                        <input type="hidden" name="id" value="<?php echo $order['order_id']; ?>">
                        <input type="hidden" name="update" value="1">

                        <div class="form-group">
                            <label>Cliente</label>
                            <select name="client_id" class="form-control" required>
                                <?php foreach (selectClients() as $cliente): ?>
                                    <option value="<?php echo $cliente['client_id']; ?>" <?php echo ($cliente['client_id'] == $order['client_id']) ? 'selected' : ''; ?>>
                                        <?php echo $cliente['nome']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Produto</label>
                            <select name="product_id" class="form-control" required>
                                <?php foreach (selectProducts() as $produto): ?>
                                    <option value="<?php echo $produto['product_id']; ?>" <?php echo ($produto['product_id'] == $order['product_id']) ? 'selected' : ''; ?>>
                                        <?php echo $produto['product_name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Data do Pedido</label>
                            <input type="date" name="data_pedido" class="form-control"
                                value="<?php echo date('Y-m-d', strtotime($order['data_pedido'])); ?>" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                        <a href="?p=orders" class="btn btn-secondary">Cancelar</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>