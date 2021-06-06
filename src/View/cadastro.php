<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Balanced Brackets</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
 
</head>
<body>
  <div> 
  <a href="<?=URL_SITE?>valida">1. Balanced Brackets</a> ||      
  <a href="<?=URL_SITE?>api">2. Contact List Backend</a> ||
  <a href="<?=URL_SITE?>cadastro">3 - Contact List Frontend</a> 
    <section class="mt-2 col">
      <h4>Cadastro
        <div class="form-group">
          <label for="nome">Nome</label>
          <input type="text" class="form-control" id="nome" placeholder="Nome">
          <input type="hidden" id="cod_pessoa" value="">
        </div>
        <div class="form-group row">
          <div class='col-5'>
            <label for="nome">Nome Contato</label>
            <input type="text" class="form-control" id="nome_contato" placeholder="Telefone, whatsapp, e-mail...">
          </div>
          <div class='col-5'>
            <label for="nome">Contato</label>
            <input type="text" class="form-control" id="contato" placeholder="35 99158444">
          </div>
          <div class='col-2'>
            <label for="nome">Adicionar</label><br />
            <button id="add_contato" class="mb-2 btn btn-primary btn-sm">+</button>
          </div>
        </div>

        <div >
          <ul id=lista class='mb-2 col-12 list-group '>
          </ul>
        </div>
       
        <button id='salvar' class="mt2 btn btn-success" title='Salvar'>Salvar</button>
      <section>
      <section>
        <h4> Lista de pessoas</h4>        
        <ul id='lista_pessoas' class='mb-2 col-12 list-group '>
        </ul>
      </section>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
  <script>const url_site = '<?=URL_SITE?>'</script>
  <script src="<?=URL_SITE?>src/arquivos/cadastro.js"></script>
</body>
</html>
