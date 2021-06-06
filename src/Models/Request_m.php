<?php
namespace Models;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class Request_m{
    protected $request;
    protected $reposta;
    protected $json;
    protected $retorno;

    public function __construct()
    {
       $this->request = Request::createFromGlobals();
       $this->json = $this->request->getContent();
       $this->resposta = new JsonResponse();
       $this->retorno = ['message' => 'sucesso!','data' => []];
       $this->codigoRetorno = 200;
    }
}
?>
