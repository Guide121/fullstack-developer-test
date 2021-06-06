<?php
namespace Models;

class EventoDb extends Conect
{
    private $query;

    
    public function getquery()
    {
        return $this->query;
    }
        
    public function setquery($query)
    {
        $this->query= $query;
    }

    public function Consulta()
    {
        if (self::$error) {
            return self::$error;
        } else {
            return self::$instance->query($this->query)->fetchAll();
        }
    }

    public function Inserir($dados)
    {
        $sql_insere = self::$instance->prepare($this->query);
        foreach ($dados as $nome => $valor) {
            $sql_insere->bindValue(":".$nome, $valor);
        }
        return $sql_insere->execute();
    }

    public function Atualiza($dados)
    {
        $sql_insere = self::$instance->prepare($this->query);
        foreach ($dados as $nome => $valor) {
            $sql_insere->bindParam(":".$nome, $valor);
        }
        return $sql_insere->execute();
    }

    public function Exclui($dados)
    {
        $sql_insere = self::$instance->prepare($this->query);
        foreach ($dados as $nome => $valor) {
            $sql_insere->bindParam(":".$nome, $valor);
        }
        return $sql_insere->execute();
    }

    public function procedure($dados)
    {
        $sql_insere = self::$instance->prepare($this->query);
        return $sql_insere->execute();
    }
}
?>