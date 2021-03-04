<h1>Editar bloco de anotações</h1>

<?php
$mensagem = '';
if (!empty($data['mensagem'])) {
    foreach ($data['mensagem'] as $m) {
        if ($m === true) {
            echo '<script type="text/javascript"> alert("Operação realizada com sucesso!");self.location.href="/"; </script>';
        } else {
            echo '<script type="text/javascript"> alert("Não foi possivel realizar a operação!");self.location.href="/"; </script> </script>';
        }
    }
}


?>



<form action="/notes/editar/<?php echo $data['registros']['id']; ?>" class="form-control" method="POST" enctype="multipart/form-data">
    <label for="" value>Título</label>
    <input type="text" required class="form-control" name="titulo" value="<?php echo $data['registros']['titulo']; ?>"><br>
    <label for="">Texto</label>
    <input name="texto" required class="form-control" value="<?php echo $data['registros']['texto']; ?>"></input>

    <?php
    if(!empty($data['registros']['imagem'])):
    ?>
        <button class="btn btn-success" name="deletarImagem">Excluir Imagem</button><br>
        <button class="btn btn-success" name="atualizar">Atualizar</button>
    <?php
    else:
    ?>
    <br><br>
    <label for="">Arquivo</label>
    <input type="file" name="imagem">
    <button class="btn btn-success" name="atualizarImagem">Atualizar Imagem</button>
    <br><br>
    <?php
    endif;
    ?>
    


</form>