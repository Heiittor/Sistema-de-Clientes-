<?php
    require './functions/users.php';
?>

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Profile de <?php echo $_SESSION['user']['nome']?></h1>
<p class="mb-4">Esta é a página de profile.</p>

<div class="row">
    <?php foreach(getAttributes() as $attr): ?>
    <div class="col-md-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><?php echo $attr['attr_name'] ?></h6>
            </div>
            <div class="card-body">
                <?php echo $attr['attr_value'] ?>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>