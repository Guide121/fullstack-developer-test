var imagebase64 = "";  
  
function encodeImageFileAsURL(element) {  
    var file = element.files[0];  
    var reader = new FileReader();  
    reader.onloadend = function() {  
        $("#imagem").val(reader.result); 
        $("#imagemProduto").attr('src',reader.result) 
    }  
    reader.readAsDataURL(file);  
}  
function lista_produtos(){
    var pesquisa = $('#textoPesquisa').val();
    var url = url_site+"api/lista_produtos";
    if(pesquisa.length >= 1)
      url = url_site+"api/lista_produtos/"+pesquisa;
    $('#lista_produtos').html('');
    $.getJSON(url, function( data ) {
        $.each( data.data, function( index, value) {
            $('#lista_produtos').append(`<li class='list-group-item'>
                                    <button class='btn btn-danger btn-sm remove_produto' title='Remove' cod='${value.id}'>
                                        <i class='fas fa-trash-alt'></i>
                                    </button>
                                    <button class='btn btn-info btn-sm' onclick='window.location.replace("${url_site}cadastro/${value.id}");' title='Edita'>
                                        <i class='far fa-edit'></i>
                                    </button>                                    
                                    <img src="${value.imagem}" style="width:30px" />
                                    ${value.nome} <small>${value.valor.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'})}</small>"
                                    </li>`);

        });
      });
}

lista_produtos();

$(document).on('click','.remove_produto', function(){
  $.ajax({
      url: `${url_site}api/remove_produto/${$(this).attr('cod')}`,
      type: 'DELETE',
      dataType : 'json',
      error: function(error) {
          console.log("Erro", error);
      }
  }).done(function(data){
      console.log(data);
      lista_produtos();
  });
});

 function novo(){
  $("#nome").val('');
  $("#valor").val('');
  $("#imagem").val('');
  $("#cod_produto").val('');
}

$(document).on('click','#salvar', function(){
  var produto = new Object();
  var metodo = 'POST';
  var url = url_site+"api/cadastro_produto";
  produto.nome = $("#nome").val();
  produto.valor = $("#valor").val();
  produto.imagem = $("#imagem").val();
  if($("#cod_produto").val() >= 1){
    produto.id = $("#cod_produto").val();
    metodo = 'PUT';
    url = url_site+"api/altera_produtos";
  }
  $.ajax({
      url: url,
      method : metodo,
      contentType : 'application/json',
      dataType : 'json',
      data : JSON.stringify(produto),
      error: function() {
          $.alert('Erro para atualizar produto');
      }
  }).done(function(data) {
      $("#cod_produto").val(data.data.id)
      $.alert("Sucesso!!");
  });

});
