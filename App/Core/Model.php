<?php


//Define o namespace do Model Base
namespace App\Core;

use PDO;

/**
 * É o Model principal
 * Classe responsável por fazer a conexão com o banco de dados
 */
class Model
{

    /**
     * Propriedade que recebe o valor título
     * @var string $titulo
     */
    public $titulo;

    /**
     * Propriedade que recebe o valor título
     * @var string $texto
     */
    public $texto;

    /**
     * Instância da conexão
     * @var string $instance
     */
    private static $instance;

    /**
     * Método responsável por fazer a conexão com o banco de dados
     */
    public static function getConn()
    {

        if (!isset(self::$instance)) :
            self::$instance = new PDO('mysql:host=mysql;dbname=mvc;charset=utf8', 'root', 'root');
        endif;

        return self::$instance;
    }
}
