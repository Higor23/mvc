<h2 class="">Adicionar livro</h2>

<?php
$mensagem = '';
if (!empty($data['mensagem'])) {
    foreach ($data['mensagem'] as $m) {
        if ($m === true) {
            echo '<script type="text/javascript"> alert("Cadastrado com sucesso!");self.location.href="/"; </script>';
        } else {
            echo '<script type="text/javascript"> alert("Não foi possivel cadastrar!");self.location.href="/"; </script> </script>';
        }
    }
}

$msgValidacao = '';
if (!empty($data['msgValidacao'])) {
    foreach ($data['msgValidacao'] as $m) {
        if ($m === true) {
        } else {
            echo "Campos obrigatórios não preenchidos";
        }
    }
}
?>

<form action="/notes/criar" class="form-control" method="POST" enctype="multipart/form-data">
    <label for="">Título</label>
    <input type="text" class="form-control" name="titulo"><br>
    <label for="">Anotações</label>
    <textarea name="texto" class="form-control" id="" cols="30" rows="10"></textarea>
    <br><br>
    <label for="">Arquivo</label>
    <input type="file" name="imagem">
    <br><br>
    <div class="form-group">
    <button class="btn btn-success" name="cadastrar">Cadastrar</button>
    </div>
</form>