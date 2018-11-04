<?php
require_once ('../../Model/Product.php');
require_once ('../layout/header.php');
require_once ('../layout/nav.php');
?>

<div class="container">

    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Descrição</th>
            <th scope="col">Price</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $products = new Product();
        foreach ($products->all() as $p){
        ?>
        <tr>
            <th scope="row"><?php echo $p['id'] ?></th>
            <td><?php echo $p['name'] ?></td>
            <td><?php echo $p['description'] ?></td>
            <td><?php echo $p['price'] ?></td>
            <td><a href="update-product.php?id=<?php echo $p['id']?>" class="btn btn-primary">Editar</a></td>
        </tr>
        <?php }?>
        </tbody>
    </table>

</div>



<?php require_once ('../layout/footer.php')?>
