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
    <section class="mt-2 col">
      <div class="form-group">
        <label for="#texto">Digite a string para teste</label>
        <input type="text" class="form-control" id="texto" placeholder="Ex: [ff{d}dfdf]">
      </div>
      <button id="valida_string" class="btn btn-primary">Validar</button>
    <section>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
  <script src="<?=URL_SITE?>src/arquivos/valida.js"></script>
</body>
</html>
