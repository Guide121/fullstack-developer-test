<?php

namespace Models;

class Produto
{
  protected $id;
  protected $nome;
  protected $valor;
  protected $imagem;
  protected $pequisa;

  public function __set($atrib, $value)
  {
    $this->$atrib = $value;
  }

  public function __get($atrib)
  {
      return $this->$atrib;
  }

}
