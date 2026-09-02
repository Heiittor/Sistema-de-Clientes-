<?php
require './functions/users.php';

$id = $_GET['id'];

$user = getUsers($id);
?>

<form action="/functions/users.php" class="form-inline mb-4" method="post">
    <div class="form-group mr-2">
        <input class="form-control" type="text" name="nome" placeholder="Insira seu nome" value="<?php echo $user['nome']?>">
    </div>
    <div class="form-group mr-2">
        <input class="form-control" type="email" name="email" placeholder="Insira seu E-mail" value="<?php echo $user['email']?>">
    </div>
    <div class="form-group mr-2">
        <input class="form-control" type="password" name="password" placeholder="Digite uma senha" value="">
    </div>
    <input type="hidden" name="update" value="1">
    <input type="hidden" name="id" value="<?php echo $id?>">
    <input class="btn btn-primary" type="submit" value="Enviar">
</form>