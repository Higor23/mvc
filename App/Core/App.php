<?php


namespace App\Core;

class App
{
    /**
     * Identifica o Controller que será acessado caso o
     * usuário digitar somente a url inicial padrão, com ou sem a barra.
     * É o Controller padrão
     * @var string
     */
    protected $controller = 'home';

    /**
     * Identifica o método que será acessado dentro do controller
     * @var string
     */
    protected $method = 'index';


    /**
     * Identifica o parâmetro que será passado na url
     * @var string
     */
    protected $params = [];

    /**
     * Método construtor
     */
    public function __construct()
    {
        print_r($url = $this->parseUrl());
        // $url = $this->parseUrl();

        //VERIFICA SE EXISTE O CONTROLLER
        if (file_exists('../App/Controllers'.$url[1].'.php')) :
            $this->controller = $url[1];
            unset($url[1]);
        endif;

        //IMPORTA O CONTROLLER
        require_once '../App/Controllers/'.$this->controller.'.php';

        //VERIFICA SE EXISTE O MÉTODO DENTRO DO CONTROLLER
        //O ATRIBUTO $controller PASSA A SER UM OBJETO
        $this->controller = new $this->controller;

        if(isset($url[2])):
            if(method_exists($this->controller, $url[2])):
                $this->method = $url[2];
                //LIMPA
                unset($url[2]);
                unset($url[0]);
            endif;
        endif;
        //VERIFICA SE EXISTEM PARÂMETROS NA URL
        $this->params = $url ? array_values($url) : [];
        // var_dump($this->params);

        //EXECUTA O MÉTODO DENTRO DO CONTROLLER
        call_user_func_array([$this->controller,$this->method],$this->params);
    }

    /**
     * Método responsável pelas rotas
     */
    public function parseUrl()
    {   //O MÉTODO EXPLODE TRANSFORMA UMA STRING EM UM ARRAY A PARTIR DE UM SEPARADOR '/'
        return explode('/', filter_var($_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL));
    }
}
