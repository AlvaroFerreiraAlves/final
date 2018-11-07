$(document).ready(function () {
    $.ajax({
        url: 'http://localhost/final/Controller/ProductController.php?method=index',
        dataType: 'json'
    }).done(function (data) {

        var i;
        for (i = 0; i < data.length; i++) {
            products = "<tr id='product"+data[i].id+"'><td>" + data[i].id + "</td><td>" + data[i].name + "</td><td>" + data[i].description + "</td><td>" + data[i].price + "</td>";
            products += "<td><a href='../../../../final/View/product/create-update.html?id=" + data[i].id + "' class='btn btn-primary'>Editar </a> ";
            products += '<button id="'+data[i].id+'" class="btn btn-danger" type="button" onclick="destroy(this.id)" value="'+data[i].id+'">Excluir</button></tr>';
            $('#product-list').append(products);

        }
    });
});


$(document).ready(function () {
    var query = location.search.slice(1);
    var partes = query.split('&');
    var data = {};
    partes.forEach(function (parte) {
        var chaveValor = parte.split('=');
        var chave = chaveValor[0];
        var valor = chaveValor[1];
        data[chave] = valor;
    });

    $.ajax({
        url: 'http://localhost/final/Controller/ProductController.php?method=show&id=' + data.id,
        dataType: 'json'
    }).done(function (data) {
        $('#name').val(data.name);
        $('#description').val(data.description);
        $('#price').val(data.price);

        if (data.id) {
            btnupdate = '<button type="button" id="save" name="save" class="btn btn-primary" onclick="updateProduct()">Atualizar</button>';
            id = '<input id="id" name="id" type="hidden" value="' + data.id + '">';
            $('#save').remove();
            $('#btn-salvar').append(btnupdate);
            $('#field').append(id);
            $('#method').val('update');
        }
    });
});


function saveProduct() {
    var data = $('#form-product').serialize();

    $.ajax({
        url: '../../Controller/ProductController.php',
        method: 'POST',
        data: data,
        dataType: 'json'
    }).done(function (data) {
        if (!data.msg == "") {
            $('.display-error').html('<ul>' + data.msg + '</ul>');
            $('.display-error').css('display', 'block');
            $('.display-success').hide();

        }

        else {
            console.log(data);
            $('.display-success').html('<ul><li>Produto Cadastrado!</li></ul>');
            $('.display-success').css('display', 'block');
            $('.display-error').hide();
            $('#form-product').trigger('reset');
        }
    })
}

function updateProduct() {
    var data = $('#form-product').serialize();

    $.ajax({
        url: '../../Controller/ProductController.php',
        method: 'POST',
        data: data,
        dataType: 'json',
    }).done(function (data) {
        if (!data.msg == "") {
            $('.display-error').html('<ul>' + data.msg + '</ul>');
            $('.display-error').css('display', 'block');
            $('.display-success').hide();
        }

        else {
            console.log(data);
            $('.display-success').html('<ul><li>Produto Atualizado!</li></ul>');
            $('.display-success').css('display', 'block');
            $('.display-error').hide();
        }
    })
}

function destroy(id){
    $.ajax({
        url: 'http://localhost/final/Controller/ProductController.php?method=destroy&id='+id,
        dataType: 'json'
    }).done(function () {

    });

    $('#product'+id).remove();
}



