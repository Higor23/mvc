<?php

$mensagem = '';
if (!empty($data['mensagem'])) {
    foreach ($data['mensagem'] as $m) {
        if ($m === true) {
            echo '<script type="text/javascript"> alert("Excluído com sucesso!");self.location.href="/"; </script>';
        } else {
            echo '<script type="text/javascript"> alert("Não foi possivel excluir!");self.location.href="/"; </script> </script>';
        }
    }
}


?>

<?php foreach ($data['registros'] as $note) : ;?>

    <img src="/images/<?php echo $note['imagem']; ?>" width="300" alt="imagem">
    <h1> <a href="/notes/ver/<?php echo $note['id']; ?>"><?php echo $note['titulo']; ?></a></h1>

    <p><?php echo $note['texto']; ?></p>
    <a href="/notes/editar/<?php echo $note['id']; ?>" class="btn btn-warning">Editar</a>
    <a href="/notes/excluir/<?php echo $note['id']; ?>" class="btn btn-danger">Excluir</a>

<?php endforeach; ?>