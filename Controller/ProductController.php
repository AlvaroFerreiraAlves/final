<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 04/11/18
 * Time: 13:45
 */
require_once ('../Model/Product.php');
if(isset($_POST['method']) && $_POST['method'] == 'store'){
    $msgError = "";

    if(empty($_POST['name'])){
        $msgError = "<li>O campo Nome deve ser preenchido</li>";
    }

    if(empty($_POST['description'])){
        $msgError .= "<li>O campo Descrição deve ser preenchido</li>";
    }

    if(empty($_POST['price'])){
        $msgError .= "<li>O campo Preço deve ser preenchido</li>";
    }
    if(!empty($msgError)){
        echo json_encode(['msg'=>$msgError]);
    }



    if(empty($msgError)){
        $product = new Product();
        $product->setName($_POST['name']);
        $product->setDescription($_POST['description']);
        $product->setPrice($_POST['price']);
        $product->create();
        $product = $product->findLast();
        echo json_encode([$product]);
    }
}

if(isset($_POST['method']) && $_POST['method'] == 'update'){
    $msgError = "";

    if(empty($_POST['name'])){
        $msgError = "<li>O campo Nome deve ser preenchido</li>";
    }

    if(empty($_POST['description'])){
        $msgError .= "<li>O campo Descrição deve ser preenchido</li>";
    }

    if(empty($_POST['price'])){
        $msgError .= "<li>O campo Preço deve ser preenchido</li>";
    }

        echo json_encode(['msg'=>$msgError]);



    if(empty($msgError)){
        $product = new Product();
        $product->setName($_POST['name']);
        $product->setDescription($_POST['description']);
        $product->setPrice($_POST['price']);
        $product->update($_POST['id']);
    }
}