<?php require './functions/clients.php' ?>

<h1 class="h3 mb-2 text-gray-800">Clientes</h1>
<p class="mb-4">Esta e a pagina de manutenção de clientes.</p>

<!-- Formulário Inline -->
<form action="/functions/clients.php" method="post" class="form-inline mb-4">
    <input type="text" name="nome" placeholder="Insira seu nome" class="form-control mr-2">
    <input type="text" name="idade" placeholder="Insira sua idade" class="form-control mr-2">
    <input type="submit" value="Enviar" class="btn btn-primary">
</form>

<!-- Tabela de Dados -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Cadastro de Clientes</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Idade</th>
                        <th>Ações</th>
                    </tr>
                </thead> 
                <tbody>
                    <?php foreach(selectClients() as $clients): ?>
                        <tr>
                            <td><?php echo $clients['client_id']; ?></td>
                            <td><?php echo $clients['nome']; ?></td>
                            <td><?php echo $clients['idade']; ?> anos</td> 
                            <td>
                                <a href="/?p=edit_clients&id=<?php echo $clients['client_id']; ?>" rel="noopener noreferrer">Editar</a>
                                <a href="/functions/clients.php?deletar=1&id=<?php echo $clients['client_id']; ?>"  rel="noopener noreferrer">Deletar</a> 
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>