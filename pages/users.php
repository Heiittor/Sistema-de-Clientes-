<?php

require './functions/users.php'; 
require './functions/roles.php';

?>

<h1 class="h3 mb-2 text-gray-800">Usuários</h1>
<p class="mb-4">Esta e a pagina de manutenção de usuarios.</p>

<!-- Formulário Inline -->
<form action="/functions/users.php" method="post" class="form-inline mb-4">
    <input type="text" name="nome" placeholder="Insira seu nome" class="form-control mr-2">
    <input type="email" name="email" placeholder="Insira seu E-mail" class="form-control mr-2">
    <select name="role_id" id="" class="form-control"  class="form-control mr-2"> 
        <option value="">Selecione uma permissão</option>
        <?php foreach(selectRoles() as $role): ?>
            <option value="<?php echo $role['role_id']; ?>"><?php echo $role['role_name']; ?></option>
        <?php endforeach; ?>
    </select> 
    <input type="password" name="password" placeholder="Digite uma senha" class="form-control mr-2">
    <input type="submit" value="Enviar" class="btn btn-primary">
</form>

<!-- Tabela de Dados -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Cadastro de Usuários</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Permissões</th>
                        <th>Ações</th>
                    </tr>
                </thead> 
                <tbody>
                    <?php foreach(selectUsers() as $user): ?>
                        <tr>
                            <td><?php echo $user['id']; ?></td>
                            <td><?php echo $user['nome']; ?></td>
                            <td><?php echo $user['email']; ?></td> 
                            <td> <?php echo $user['role_name'] ?? 'Sem permissão'; ?></td>
                            <td>
                                <a href="/?p=edit_users&id=<?php echo $user['id']; ?>" rel="noopener noreferrer">Editar</a>
                                <a href="/functions/users.php?deletar=1&id=<?php echo $user['id']; ?>"  rel="noopener noreferrer">Deletar</a> 
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>