<?php 
(isset($_GET['p']) ? $page = $_GET['p'] : $page = 'home');
include_once "./components/header.php"; ?>



<div class="container-fluid">

<?php
if(file_exists('./pages/' . $page . '.php') == false){
    echo '<h1>Pagina não encontrada</h1>';
    echo '<p>A pagina que você esta tentando acessar não existe.</p>';
    echo '<a href="/">Voltar para a página inicial</a>';
    exit;

}
        include_once ('./pages/' . $page . '.php');
?>


</div>



<?php include_once "./components/footer.php"; ?>