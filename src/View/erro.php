<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Erro de acesso</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<body>
<div> 
    <section class="mt-2 col-12">
      <div class="alert alert-danger" role="alert">
        <h2 class="headline text-danger">ERRO</h2>

        <div class="error-content">

          <h3><i class="fas fa-exclamation-triangle text-danger"></i> Oops! <?=$data['coderro']?></h3>

          <p>
          Caso o problema persista reporte ao administrador do sistema. 
          </p>
          <a href="<?=URL_SITE?>" class="btn btn-sm btn-danger">Início</a>
        </div>
      </div>
    <section>
</div>
</body>
</html>
