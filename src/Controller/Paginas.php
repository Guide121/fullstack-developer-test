<?php

namespace Controller;

use Models\Conect;
use Service\Produtos;

class Paginas{
    public function __construct($rota)
    {
       $this->rota = $rota;
    }

    public function home(){
        $this->pagina = "produtos.php";
        require_once __DIR__."/../View/templaite.php";
    }


    public function cadastro($data){
      $produto = new Produtos;
      if ($data['id_produto']) {
          $produto->id = intval($data['id_produto']);
          $produto->carregaProduto(Conect::abreConexao());
      }
      $this->pagina = "cadastro.php";
      require_once __DIR__."/../View/templaite.php";
    }

    public function api(){
      $this->pagina = "api.php";
        require_once __DIR__."/../View/templaite.php";
    }

    public function erro($data){
        require_once __DIR__."/../View/erro.php";
    }
}
?>
