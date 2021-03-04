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



    <form action="/notes/editar/<?php echo $data['registros']['id'];?>" class="form-control" method="POST">
        <label for="" value>Título</label>
        <input type="text" class="form-control" name="titulo" value="<?php echo $data['registros']['titulo'];?>"><br>
        <label for="">Texto</label>
        <input name="texto" class="form-control" value="<?php echo $data['registros']['texto'];?>"></input>
        <button class="btn btn-success" name="atualizar">Atualizar</button>

    </form>
