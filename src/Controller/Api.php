<?php

namespace Controller;

use Exception;
use Models\Conect;
use Models\Request_m;
use PDO;
use Service\Produtos;

class Api extends Request_m{
    private $conexao;
    private $dados;
    public function __construct($rota)
    {
        parent::__construct();
        $this->rota = $rota;
        $this->conexao = Conect::abreConexao();
    }

    public function cadastroProduto(){
        $this->conexao->beginTransaction();
        try{
            $this->dados = json_decode($this->json,true);
            $produto = new Produtos;
            $produto->nome = $this->dados['nome'];
            $produto->valor = floatval($this->dados['valor']);
            $produto->imagem = $this->dados['imagem'];
            $produto->cadastraProduto($this->conexao);
            $this->conexao->commit();
            $this->retorno['data'] = ["id"=>$produto->id];
        } catch (\Throwable $e) {
            $this->conexao->rollBack();
            $this->retorno = ['message'=>$e->getMessage()];
            $this->codigoRetorno = 400;
        }finally{
            $this->resposta->setData($this->retorno)->setStatusCode($this->codigoRetorno)->send();
            die;
        }
    }

    public function removeProduto($data){
      $this->conexao->beginTransaction();
      try{
          $produto = new Produtos;
          $produto->id = intval($data['id_produto']);
          $produto->removeProduto($this->conexao);

          $this->conexao->commit();
      } catch (\Throwable $e) {
          $this->conexao->rollBack();
          $this->retorno = ['message'=>$e->getMessage()];
          $this->codigoRetorno = 400;
      }finally{
          $this->resposta->setData($this->retorno)->setStatusCode($this->codigoRetorno)->send();
          die;
      }
    }

    public function alteraProdutos(){
      $this->conexao->beginTransaction();
      try{
          $this->dados = json_decode($this->json,true);
          $produto = new Produtos;
          $produto->id = intval($this->dados['id']);
          $produto->nome = $this->dados['nome'];
          $produto->valor = floatval($this->dados['valor']);
          $produto->imagem = $this->dados['imagem'];
          $produto->atualizaProduto($this->conexao);
          $this->conexao->commit();
          $this->retorno['data'] = ["id"=>$produto->id];
      } catch (\Throwable $e) {
          $this->conexao->rollBack();
          $this->retorno = ['message'=>$e->getMessage()];
          $this->codigoRetorno = 400;
      }finally{
          $this->resposta->setData($this->retorno)->setStatusCode($this->codigoRetorno)->send();
          die;
      }
    }

    public function listaProdutos($data){
      $this->conexao->beginTransaction();
      try{
          $produto = new Produtos;
          $produto->id = ($data['id_produto'])??null;

          $produto->pequisa = ($data['pesquisa'])??null;

          $this->retorno['data'] = $produto->consultaProduto($this->conexao);

          $this->conexao->commit();
      } catch (\Throwable $e) {
          $this->conexao->rollBack();
          $this->retorno = ['message'=>$e->getMessage()];
          $this->codigoRetorno = 400;
      }finally{
          $this->resposta->setData($this->retorno)->setStatusCode($this->codigoRetorno)->send();
          die;
      }
    }


}
?>
