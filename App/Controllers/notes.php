<?php

use App\Core\Controller;

class Notes extends Controller
{
    /**
     * Método responsável por chamar o Model User
     */
    public function ver($id = '')
    {
        $note = $this->model('Note');
        $dados = $note->findId($id);

        $this->view('notes/ver', $dados);
    }

    /**
     * Método responsável por receber os dados da view
     */
    public function criar()
    {

        $mensagem = array();
        $msgValidacao = array();

        if (isset($_POST['cadastrar'])) {

            if (empty($_POST['titulo'])) {
                $msgValidacao[] = "O campo título precisa ser preenchido.";
            } elseif (empty($_POST['texto'])) {
                $msgValidacao[] = "O campo texto precisa ser preenchido.";
            } else {

                //UPLOAD DE ARQUIVOS
                $storage = new \Upload\Storage\FileSystem('images');
                $file = new \Upload\File('imagem', $storage);

                // Optionally you can rename the file on upload
                $new_filename = uniqid();
                $file->setName($new_filename);


                $file->addValidations(array(

                    // new \Upload\Validation\Mimetype('image'),


                    new \Upload\Validation\Size('5M')
                ));


                $data = array(
                    'name'       => $file->getNameWithExtension(),
                    'extension'  => $file->getExtension(),
                    'mime'       => $file->getMimetype(),
                    'size'       => $file->getSize(),
                    'md5'        => $file->getMd5(),
                    'dimensions' => $file->getDimensions()
                );

                // TENTANDO FAZER O UPLOAD
                try {
                    $file->upload();

                    $note = $this->model('Note');
                    $note->titulo = $_POST['titulo'];
                    $note->texto = $_POST['texto'];
                    $note->imagem = $data['name'];
                    $mensagem[] = $note->save();

                } catch (\Exception $e) {
                    $errors = $file->getErrors();
                }


            }
        }

        $this->view('notes/criar', $dados = ['mensagem' => $mensagem, 'msgValidacao' => $msgValidacao]);
    }

    /**
     * Método responsável por excluir registros do banco
     */
    public function excluir($id = '')
    {
        $note = $this->model('Note');

        $mensagem[] = $note->delete($id);

        $dados = $note->getAll();

        $this->view('home/index', $dados = ['registros' => $dados, 'mensagem' => $mensagem]);
    }

    /**
     * Método responsável por editar registros no banco
     */
    public function editar($id)
    {

        $mensagem = array();

        $note = $this->model('Note');

        if (isset($_POST['atualizar'])) {

            $note->titulo = $_POST['titulo'];
            $note->texto = $_POST['texto'];
            $mensagem[] = $note->update($id);
        }

        $dados = $note->findId($id);

        $this->view('notes/editar', $dados = ['registros' => $dados, 'mensagem' => $mensagem]);
    }
}
