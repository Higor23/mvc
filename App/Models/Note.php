<?php

use App\Core\Model;

class Note extends Model
{
    public $titulo;
    public $texto;
    public $imagem;


    /**
     * Método responsável por listar todos os dados do banco de dados
     */
    public function getAll()
    {

        $sql = "SELECT * FROM notes";
        $stmt = Model::getConn()->prepare($sql); //Prepara a consulta SQL e retorna um identificador de instrução a ser usado para outras operações na instrução.
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $resultado;
            exit;
        }

        return [];
    }

    public function findId($id)
    {
        $sql = "SELECT * FROM notes WHERE id = ?";
        $stmt = Model::getConn()->prepare($sql); //Prepara a consulta SQL e retorna um identificador de instrução a ser usado para outras operações na instrução.
        $stmt->bindValue(1, $id);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

            return $resultado;
            exit;
        }

        return [];
    }

    /**
     * Método responsável por salvar os dados no banco de dados
     */
    public function save()
    {
        $sql = "INSERT INTO notes (titulo,texto,imagem) VALUES (?,?,?)";

        $stmt = Model::getConn()->prepare($sql); //Prepara a consulta SQL e retorna um identificador de instrução a ser usado para outras operações na instrução.

        $stmt->bindValue(1, $this->titulo);
        $stmt->bindValue(2, $this->texto);
        $stmt->bindValue(3, $this->imagem);

        if ($stmt->execute()) {

            return true;
        } else {

            return false;
        }
    }

    /**
     * Método responsável por excluir dados do banco de dados
     * @param integer $id
     */
    public function update($id)
    {
        $sql = "UPDATE notes SET titulo = ?, texto = ? WHERE id = ?";
        $stmt = Model::getConn()->prepare($sql); //Prepara a consulta SQL e retorna um identificador de instrução a ser usado para outras operações na instrução.

        $stmt->bindValue(1, $this->titulo);
        $stmt->bindValue(2, $this->texto);
        $stmt->bindValue(3, $id);

        if ($stmt->execute()) {

            return true;
        } else {

            return false;
        }
    }

    /**
     * Método responsável por excluir dados do banco de dados
     * @param integer $id
     */
    public function updateImagem($id)
    {
        $sql = "UPDATE notes SET titulo = ?, texto = ?, imagem = ? WHERE id = ?";
        $stmt = Model::getConn()->prepare($sql); //Prepara a consulta SQL e retorna um identificador de instrução a ser usado para outras operações na instrução.

        $stmt->bindValue(1, $this->titulo);
        $stmt->bindValue(2, $this->texto);
        $stmt->bindValue(3, $this->imagem);
        $stmt->bindValue(4, $id);

        if ($stmt->execute()) {

            return true;
        } else {

            return false;
        }
    }

    /**
     * Método responsável por excluir dados do banco de dados
     * @param integer $id
     */
    public function delete($id)
    {

        $resultado = $this->findId($id);


        if(!empty($resultado['imagem'])){
            unlink('images/'.$resultado['imagem']);
        }

        $sql = "DELETE FROM notes WHERE id = ?";
        $stmt = Model::getConn()->prepare($sql); //Prepara a consulta SQL e retorna um identificador de instrução a ser usado para outras operações na instrução.
        $stmt->bindValue(1, $id);

        if ($stmt->execute()) {

            return true;
        } else {

            return false;
        }
    }

    public function deleteImage($id)
    {
        $sql = "UPDATE notes SET imagem = ? WHERE id = ?";
        $stmt = Model::getConn()->prepare($sql); //Prepara a consulta SQL e retorna um identificador de instrução a ser usado para outras operações na instrução.

        $stmt->bindValue(1, "");
        $stmt->bindValue(2, $id);

        if ($stmt->execute()) {

            return true;
        } else {

            return false;
        }
    }
}
