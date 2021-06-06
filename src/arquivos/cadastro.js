
function lista_cadastros(){
    $('#lista_pessoas').html('');
    $.getJSON(url_site+"api/lista_pessoa", function( data ) {
        $.each( data, function( index, value) {
            $('#lista_pessoas').append("<li class='list-group-item'>"+
                                    "<button class='btn btn-danger btn-sm remove_pessoa' title='Remove' cod='"+value.id+"'>"+
                                        "<i class='fas fa-trash-alt'></i>"+
                                    "</button> "+
                                    "<button class='btn btn-info btn-sm edita_pessoa' title='Edita' cod='"+value.id+"'>"+
                                        "<i class='far fa-edit'></i>"+
                                    "</button> "+
                                    value.nome+" <small>"+value.lista_contatos+"</small>"+
                                    "</li>");
           
        });       
      });       
}

lista_cadastros();
$(document).on('click', '#add_contato', function(){
    var contato_temp = $('#contato').val();
    var nome_contato_temp = $('#nome_contato').val()
    if(contato_temp.length > 1 && nome_contato_temp.length > 1){
        $('#lista').append("<li class='list-group-item'>"+
                                 "<button class='btn btn-danger btn-sm remove_contato' title='Remove contato'>"+
                                    "<i class='fas fa-trash-alt'></i>"+
                                "</button> "+
                                "<span class='nome_contato'>"+nome_contato_temp+"</span>: <span class='contato'>"+contato_temp+"</span>"+
                                "</li>");
    }else{
        $.alert('Preencha os campos corretamento');
    }
    $('#contato').val('');
    $('#nome_contato').val('');
    $('#nome_contato').focus();
})

$(document).on('click','#salvar', function(){
    var nome =  $("#nome").val();              
    var cod_pessoa = $("#cod_pessoa").val();
    var lista = {};
    var nome_contato = '';
    var contato = '';

    $.each($('li'), function () { 
        nome_contato = $(this).find('.nome_contato').text();
        contato = $(this).find('.contato').text();
        lista[nome_contato] = contato;
    });


    var dataJSON = {
        "id": cod_pessoa,
        "nome":nome,
        "contato": lista
    }


    if(cod_pessoa > 0){
        $.ajax({
            url: url_site+"api/altera_pessoa",
            method : "PUT",
            contentType : 'application/json',
            dataType : 'json',
            data : JSON.stringify(dataJSON),
            error: function(error) {
                console.log("Erro", error);
            }
        }).done(function(data) {
            if(data.Sucesso)
                $.alert(data.Sucesso);
            else{
                console.log(data);
                $.alert('Erro');
            }
            $('input').val('');
            $('#lista').html('');
            lista_cadastros();
        });
    }else{
        if(nome){
            $.ajax({
                url: url_site+"api/cadastro_pessoa",
                method : "POST",
                contentType : 'application/json',
                dataType : 'json',
                data : JSON.stringify(dataJSON),
                error: function(error) {
                    console.log("Erro", error);
                }
            }).done(function(data) {
                if(data.Sucesso)
                    $.alert(data.Sucesso);
                else{
                    console.log(data);
                    $.alert('Erro');
                }
                $('input').val('');
                $('#lista').html('');
                lista_cadastros();
            });
        }
    }
});

$(document).on('click','.remove_contato', function(){
    $(this).parent().remove();
});

$(document).on('click','.remove_pessoa', function(){
    var id_pessoa = $(this).attr('cod');
    $.ajax({
        url: url_site+"api/remove_pessoa/"+id_pessoa,
        type: 'DELETE',        
        dataType : 'json',
        error: function(error) {
            console.log("Erro", error);
        }
    }).done(function(data){
        console.log(data);
        lista_cadastros();
    });
});

$(document).on('click','.edita_pessoa', function(){
    var id_pessoa = $(this).attr('cod');
    var lista_contatos = [];
    var itens_contato = [];
    $.getJSON(url_site+"api/lista_pessoa/"+id_pessoa, function( data ) {    
        lista_contatos = data[0]['lista_contatos'].split(',');
        $('#lista').html('');
        $('#nome').val(data[0]['nome']);        
        $('#cod_pessoa').val(data[0]['id']);
        $.each( lista_contatos, function( index, value) {
            itens_contato = value.split(':');
            $('#lista').append("<li class='list-group-item'>"+
                                "<button class='btn btn-danger btn-sm remove_contato' title='Remove contato'>"+
                                    "<i class='fas fa-trash-alt'></i>"+
                                "</button> "+
                                "<span class='nome_contato'>"+itens_contato[0]+"</span>: <span class='contato'>"+itens_contato[1]+"</span>"+
                                "</li>");
        
        });       
      })
});
