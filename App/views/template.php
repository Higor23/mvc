<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    
    <title>Minha leitura</title>
</head>

<body >
    <div class='container'>


        <h2 class="mt-5">Minha leitura</h2>

        <div>
            <a href="/">Home</a>
            <br><br>
        </div>

        <!-- Importa a view -->
        <?php require_once '../App/views/' . $view . '.php'; ?>
    
</body>

</html>