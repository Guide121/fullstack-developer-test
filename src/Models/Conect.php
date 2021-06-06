<?php

namespace Models;

use PDO;
use PDOException;

class Conect
{

    public static function abreConexao()
    {
        try {
            $instance = new PDO(
                DATA_LAYER_CONFIG["driver"] . ":host=" . DATA_LAYER_CONFIG["host"] . ";dbname=" . DATA_LAYER_CONFIG["dbname"] . ";port=" . DATA_LAYER_CONFIG["port"],
                DATA_LAYER_CONFIG["username"],
                DATA_LAYER_CONFIG["passwd"],
                DATA_LAYER_CONFIG["options"]
            );
            return $instance;
        } catch (PDOException $error) {
                echo $error->getMessage();
        }
    }
}
