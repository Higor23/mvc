<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Loja</title>
</head>

<body>
    <h2>Bloco de anotações</h2>
    <a href="/">Home</a> |
    <a href="/notes/criar">Criar bloco</a>
    <!-- Importa a view -->
    <?php require_once '../App/views/' . $view . '.php'; ?>

</body>

</html>