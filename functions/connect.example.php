<?php
// Copie este arquivo para connect.php e preencha com suas credenciais reais.
// connect.php NÃO deve ser commitado — já está no .gitignore.

function connect(){ // conexão com o banco de dados
    try{
        $pdo = new PDO('mysql:host=localhost;port=suaporta;dbname=nome_do_seu_banco', 'usuario_do_banco', 'senha_do_banco');
        return $pdo;
    } catch(\Throwable $th){
        throw $th;
    }
}