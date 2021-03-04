<?php

use App\Core\Controller;

class Home extends Controller
{
    /**
     * Método responsável por chamar o Model User
     */
    public function index($nome = '')
    {
        $note = $this->model('Note');
        $dados = $note->getAll();

        $this->view('home/index',$dados = ['registros' => $dados]);
    }
}
