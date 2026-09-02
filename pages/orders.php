<?php
require_once './functions/orders.php';
require_once './functions/clients.php';
require_once './functions/products.php';
?>

<h1 class="h3 mb-2 text-gray-800">Pedidos</h1>
<p class="mb-4">Esta e a pagina de manutenção de pedidos.</p>

<form action="" method="post" class="form-inline mb-4">
    <select name="client_id" class="form-control mr-2" required>
        <option value="">Selecione o cliente</option>
        <?php foreach (selectClients() as $cliente): ?>
            <option value="<?php echo $cliente['client_id']; ?>"><?php echo $cliente['nome']; ?></option>
        <?php endforeach; ?>
    </select>

    <select name="product_id" class="form-control mr-2" required>
        <option value="">Selecione o produto</option>
        <?php foreach (selectProducts() as $produto): ?>
            <option value="<?php echo $produto['product_id']; ?>"><?php echo $produto['product_name']; ?></option>
        <?php endforeach; ?>
    </select>

    <input type="date" name="data_pedido" class="form-control mr-2"
        title="Opcional — deixe em branco para usar a data de hoje">

    <input type="submit" value="Enviar" class="btn btn-primary">
</form>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Relatório de Pedidos</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Produto</th>
                        <th>Valor</th>
                        <th>Data</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach(selectOrders() as $orders): ?>
                        <tr>
                            <td><?php echo $orders['order_id']; ?></td>
                            <td><?php echo $orders['nome']; ?></td>
                            <td><?php echo $orders['product_name']; ?></td>
                            <td> R$ <?php echo number_format($orders['product_price'], 2, ',', '.'); ?></td>
                            <td><?php echo date('d/m/Y', strtotime($orders['data_pedido'])); ?></td>
                            <td>
                                <a href="/?p=edit_orders&id=<?php echo $orders['order_id']; ?>" rel="noopener noreferrer">Editar</a>
                                <a href="/functions/orders.php?deletar=1&id=<?php echo $orders['order_id']; ?>" rel="noopener noreferrer">Deletar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>