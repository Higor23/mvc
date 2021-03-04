<?php

namespace App\Core;


/**
 * Controller base da aplicação
 *
 */
class Controller{

    public function model($model){
        require_once '../App/Models/'.$model.'.php';
        return new $model;
    }

    /**
     * Método responsável por chamar as views
     * @param string $view
     * @param array $data
     */
    public function view($view, $data =[]){
        //IMPORTA A VIEW
        require_once '../App/views/template.php';
    }
}