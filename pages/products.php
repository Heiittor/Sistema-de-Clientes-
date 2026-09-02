<?php require './functions/products.php' ?>

<h1 class="h3 mb-2 text-gray-800">Produtos</h1>
<p class="mb-4">Esta e a pagina de manutenção de produtos.</p>

<!-- Formulário Inline -->
<form action="" method="post" class="form-inline mb-4">
    <input type="text" name="nome" placeholder="Insira o nome do produto" class="form-control mr-2">
    <input type="text" name="preco" placeholder="Insira o preço do produto" class="form-control mr-2">
    <input type="submit" value="Enviar" class="btn btn-primary">
</form>

<!-- Tabela de Dados -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Cadastro de Produtos</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Valor</th>
                        <th>Ações</th>
                    </tr>
                </thead> 
                <tbody>
                    <?php foreach(selectProducts() as $products): ?>
                        <tr>
                            <td><?php echo $products['product_id']; ?></td>
                            <td><?php echo $products['product_name']; ?></td>
                            <td> R$ <?php echo number_format($products['product_price'], 2, ',', '.'); ?></td> 
                            <td>
                                <a href="/?p=edit_products&id=<?php echo $products['product_id']; ?>" rel="noopener noreferrer">Editar</a>
                                <a href="/functions/products.php?deletar=1&id=<?php echo $products['product_id']; ?>"  rel="noopener noreferrer">Deletar</a> 
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>