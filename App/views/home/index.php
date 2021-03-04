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

<!-- Tabela -->
<section>
    <a href="/notes/criar">
        <button class="btn btn-success">Adicionar Livro</button>
    </a>
</section>

<section>
    <table class="table bg-light mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Imagem</th>
                <th>Título</th>
                <th>Data da última alteração</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($data['registros'] as $note) :; ?>
                <tr style="vertical-align: middle;">
                    <td><?php echo $note['id']; ?></td>
                    <td><img src="/images/<?php echo $note['imagem']; ?>" width="100"  " alt="imagem"></td>
                    <td ><?php echo $note['titulo']; ?></td>
                    <td><?php echo date('d/m/Y', strtotime($note['data'])); ?></td>
                    <td>
                        <a href="/notes/ver/<?php echo $note['id']; ?>" class="btn btn-warning">Detalhes</a>
                        <a href="/notes/editar/<?php echo $note['id']; ?>" class="btn btn-primary">Editar</a>
                        <a href="/notes/excluir/<?php echo $note['id']; ?>" class="btn btn-danger" id="excluir" onclick="return confirm('Tem certeza que deseja deletar esse registro?');">Excluir</a>
                    </td>

                <tr>
                <?php endforeach; ?>
        </tbody>
    </table>
</section>
