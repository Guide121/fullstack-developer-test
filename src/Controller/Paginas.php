<?php

namespace Controller;

use Cript\Cript;
use GUMP;
use Models\EventoDb;
use Models\Produtos;
use Models\vendedor;

class Paginas{
   
    public function __construct($rota)
    {
       $this->rota = $rota;       
    }

    public function home(){ 
        require_once __DIR__."/../View/validacao.php"; 
        
    }
    public function valida(){ 
        require_once __DIR__."/../View/validacao.php"; 
        
    }
   
    public function cadastro($data){ 
        require_once __DIR__."/../View/cadastro.php"; 
        
    }
    
    public function api(){ 
        require_once __DIR__."/../View/api.php"; 
        
    }

    public function erro($data){        
        require_once __DIR__."/../View/erro.php";   
    }
}
?>