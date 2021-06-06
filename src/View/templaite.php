<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Test for Fullstack developer at guide121</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-info">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="<?=URL_SITE?>" tabindex="-1" >Produtos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=URL_SITE?>cadastro" tabindex="-1" >Cadastro</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=URL_SITE?>api" tabindex="-1" >Api</a>
        </li>
      </ul>
      <form class="d-flex" action="<?=URL_SITE?>" method="GET">
        <input class="form-control me-2" id="textoPesquisa" name="pesquisa" type="search" placeholder="Search" aria-label="Search" value="<?=$_GET['pesquisa']?>">
        <button class="btn btn-success" type="submit">buscar produto</button>
      </form>
</nav>
<div>
  <script>const url_site = '<?=URL_SITE?>' </script>
  <?php
    include_once $this->pagina
  ?>
</div>
</body>
</html>
