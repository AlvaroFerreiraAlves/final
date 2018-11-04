function saveProduct(){
    var data = $('#form-product').serialize();

    $.ajax({
        url: '../../Controller/ProductController.php',
        method: 'POST',
        data: data,
        dataType: 'json'
    }).done(function (data) {
        if (!data.msg == ""){
            $('.display-error').html('<ul>'+data.msg+'</ul>');
            $('.display-error').css('display', 'block');
            $('.display-success').hide();

        }

        else{
            console.log(data);
            $('.display-success').html('<ul><li>Produto Cadastrado</li></ul>');
            $('.display-success').css('display', 'block');
            $('.display-error').hide();

            product = '<tr><th scope="row">' + data[0].id + '</th><td>' + data[0].name + '</td><td>' + data[0].description + '</td><td>'+data[0].price+'</td>';
            product += '<td><a href="update-product.php?id='+data[0].id+'" class="btn btn-primary">Editar</a></td></tr>';

            $('#product-list').append(product);
        }
    })
}

function updateProduct() {
    var data = $('#form-product-update').serialize();

    $.ajax({
        url: '../../Controller/ProductController.php',
        method: 'POST',
        data: data,
        dataType: 'json',
    }).done(function (data) {
        if (!data.msg == ""){
            $('.display-error').html('<ul>'+data.msg+'</ul>');
            $('.display-error').css('display', 'block');
            $('.display-success').hide();
        }

        else{
            console.log(data);
            $('.display-success').html('<ul><li>Produto Atualizado</li></ul>');
            $('.display-success').css('display', 'block');
            $('.display-error').hide();
        }
    })
}