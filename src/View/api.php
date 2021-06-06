<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Balanced Brackets</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
 
</head>
<body>
  <div> 
  <a href="<?=URL_SITE?>valida">1. Balanced Brackets</a> ||      
  <a href="<?=URL_SITE?>api">2. Contact List Backend</a> ||
  <a href="<?=URL_SITE?>cadastro">3 - Contact List Frontend</a> 
    <section class="mt-2 col-12">
      <div class="card p-3 m-3">
        <label for="#texto">Cadastro</label><br />
        Endpoint: <?=URL_SITE?>api/cadastro_pessoa <br />
        Type: POST <br />
        JSON: {    
                "nome":"mario",
                "contato":{
                    "telefone":"0000000000",
                    "whatsapp":"0000000000",
                    "telegran":"000000000",
                    "email":"mail@mail"
                    }            
                }
                    
      </div>
      <div class="card p-3 m-3">
        <label for="#texto">Remove Cadastro</label><br />
        Endpoint: <?=URL_SITE?>api/remove_pessoa/id<br />
        Type: DELETE <br />
                    
      </div>
      <div class="card p-3 m-3">
        <label for="#texto">Altera Cadastro</label><br />
        Endpoint: <?=URL_SITE?>api/altera_pessoa <br />
        Type: PUT <br />
        JSON: {
                "id":"6",
                "nome":"mario jose ",
                "contato":[
                        {"0":{"id":"5","nome_contato":"telefone", "contato":"359915684"}},
                        {"1":{"id":"6","nome_contato":"telene casa", "contato":"346754"}},
                        {"2":{"nome_contato":"whatsapp", "contato":"3594564"}},
                        {"3":{"nome_contato":"email", "contato":"sdftttsa dasdasff"}}
                    ]
             }
                    
      </div>
      <div class="card p-3 m-3">
        <label for="#texto">Remove Contato</label><br />
        Endpoint: <?=URL_SITE?>api/remove_contato/id <br />
        Type: DELETE <br />
        
                    
      </div>
      <div class="card p-3 m-3">
        <label for="#texto">Lista cadastros</label><br />
        Endpoint: <?=URL_SITE?>api/lista_pessoa <br />
        Type: GET <br />
        
                    
      </div>
    <section>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
  <script src="<?=URL_SITE?>src/arquivos/valida.js"></script>
</body>
</html>
