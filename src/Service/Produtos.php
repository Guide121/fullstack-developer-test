<?php

namespace Service;

use Exception;
use Models\Produto;
use PDO;

class Produtos extends Produto
{
  public function cadastraProduto(PDO $conexao){
    $exec = $conexao->prepare("INSERT INTO produtos (nome,valor,imagem) VALUES (:nome,:valor,:imagem)");
    $exec->bindValue(":nome",$this->nome,PDO::PARAM_STR);
    $exec->bindValue(":valor",$this->valor,PDO::PARAM_STR);
    $exec->bindValue(":imagem",$this->imagem,PDO::PARAM_STR);
    if(!$exec->execute())
      throw new Exception("Erro para realizar o cadastro", 1);
    $this->id = $conexao->lastInsertId();
  }

  public function removeProduto(PDO $conexao){
    $exec = $conexao->prepare("DELETE FROM produtos WHERE produtos.id = :id");
    $exec->bindValue(":id",$this->id,PDO::PARAM_INT);
    $exec->execute();
    if($exec->rowCount() == 0)
      throw new Exception("Erro para remover ou Produto já foi removido", 1);
    return true;
  }

  public function atualizaProduto(PDO $conexao){
    $exec = $conexao->prepare("UPDATE produtos SET  produtos.nome = :nome, produtos.valor = :valor, produtos.imagem = :imagem WHERE produtos.id = :id");
    $exec->bindValue(":nome",$this->nome,PDO::PARAM_STR);
    $exec->bindValue(":valor",$this->valor,PDO::PARAM_STR);
    $exec->bindValue(":imagem",$this->imagem,PDO::PARAM_STR);
    $exec->bindParam(":id",$this->id,PDO::PARAM_INT);
    $exec->execute();
    if($exec->rowCount() == 0)
      throw new Exception("Não houve atualização no produto", 1);
    return true;
  }

  public function carregaProduto(PDO $conexao){
    $exec = $conexao->prepare("SELECT produtos.id,
                                  produtos.nome,
                                  produtos.valor,
                                  produtos.imagem
                                FROM produtos
                                WHERE produtos.id = :id");
    $exec->bindParam(":id",$this->id,PDO::PARAM_INT);
    $exec->execute();
    if($dados =  $exec->fetch(PDO::FETCH_ASSOC)){
      $this->id = $dados['id'];
      $this->nome = $dados['nome'];
      $this->valor = floatval($dados['valor']);
    }
  }

  public function consultaProduto(PDO $conexao){
    $complemento = '';
    if($this->id)
      $complemento = " WHERE produtos.id = :id";

    if($this->pequisa)
    $complemento = " WHERE produtos.nome LIKE :pesquisa";

    $sql = "SELECT produtos.id,
              produtos.nome,
              produtos.valor,
              produtos.imagem
            FROM produtos ";
    $exec = $conexao->prepare($sql.$complemento." ORDER BY produtos.id DESC LIMIT 500");
    if($this->id)
      $exec->bindParam(":id",$this->id,PDO::PARAM_INT);
    if($this->pequisa)
      $exec->bindValue(":pesquisa",'%'.$this->pequisa.'%',PDO::PARAM_STR);
    $exec->execute();
    return $exec->fetchAll(PDO::FETCH_ASSOC);
  }
}
