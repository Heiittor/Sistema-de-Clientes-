<?php
require './functions/products.php';

$id = $_GET['id'];

$product = getProducts($id);
?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Editar Produto</h1>

    <div class="row">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="" method="POST">
                        
                        <!-- Campos Ocultos necessários para atualizar -->
                        <input type="hidden" name="id" value="<?php echo $product['product_id']; ?>">
                        <input type="hidden" name="update" value="1">

                        <div class="form-group">
                            <label>Nome do Produto</label>
                            <input type="text" name="nome" class="form-control" value="<?php echo $product['product_name']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label>Preço</label>
                            <input type="number" step="0.01" name="preco" class="form-control" value="<?php echo $product['product_price']; ?>" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                        <a href="?p=products" class="btn btn-secondary">Cancelar</a>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>