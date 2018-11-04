<?php
require_once ('../layout/header.php');
require_once ('../layout/nav.php');
require_once ('../../Model/Product.php');
?>

<div class="container">
    <div class="alert alert-danger display-error" style="display: none"></div>
    <div class="alert alert-success display-success" style="display: none"></div>

    <form class="form-horizontal" id="form-product">
        <fieldset>


            <!-- Form Name -->
            <legend>Cadastrar produto</legend>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="name">Nome:</label>
                <div class="col-md-5">
                    <input id="name" name="name" type="text" placeholder="" class="form-control input-md" required="">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="description">Descrição:</label>
                <div class="col-md-5">
                    <input id="description" name="description" type="text" placeholder="" class="form-control input-md" required="">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="price">Preço:</label>
                <div class="col-md-5">
                    <input id="price" name="price" type="text" placeholder="" class="form-control input-md" required="">

                </div>
            </div>

            <input type="hidden" name="method" value="store">

            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="save"></label>
                <div class="col-md-4">
                    <button type="button" id="save" name="save" class="btn btn-primary" onclick="saveProduct()">Salvar</button>
                </div>
            </div>

        </fieldset>
    </form>


    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Descrição</th>
            <th scope="col">Price</th>
        </tr>
        </thead>
        <tbody id="product-list">
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


<?php
require_once ('../layout/footer.php');
?>


