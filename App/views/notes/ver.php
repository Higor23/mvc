<div class="container">
    <div class="div-imagem-ver"><img src="/images/<?php echo $data['imagem']; ?>" class="img-thumbnail" alt="..."></div>
    <br>
    <div class="card" style="width: 70rem;">

        <div class="card-body">
            <label for=""><strong>Título</strong></label>
            <h4><?php echo $data['titulo']; ?></h4>
            <hr>
            <label for=""><strong>Anotações</strong></label>
            <p class="card-text"><?php echo $data['texto']; ?></p>
        </div>
    </div>
</div>

</div>