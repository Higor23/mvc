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
    <label for="">Anotações</label>
    <textarea name="texto" required class="form-control" id="" cols="30" rows="10" value="<?php echo $data['registros']['texto']; ?>"><?php echo $data['registros']['texto']; ?></textarea>
    <br>
    <?php
    if (!empty($data['registros']['imagem'])) :
    ?>
        <button class="btn btn-warning" name="deletarImagem">Excluir Imagem </button>
        <button class="btn btn-success" name="atualizar">Atualizar</button>
    <?php
    else :
    ?>
        <br><br>
        <label for="">Arquivo</label>
        <input type="file" name="imagem">
        <br><br>
        <button class="btn btn-success" name="atualizarImagem">Atualizar</button>
        <br><br>
    <?php
    endif;
    ?>
    <br>


</form>