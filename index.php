<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="src/style.css">
    <script src="src/jquery-3.7.1.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>PHP - Prática</title>
</head>

<body>
    <main class="amarelo-claro" >
        <div class="container">
            <form action="Actions/Form.php" class="d-flex gap-3 row-cols-1">
                
                    <input type="text" placeholder="Nome..." name="nome" class="form-control flex-grow-1">
                    <input type="number" placeholder="Altura (cm)..." name="nome" class="form-control">
                    <input type="number" placeholder="Peso (kg)..." name="nome" class="form-control">
                
                <button type="submit">enviar</button>
            </form>
        </div>
    </main>
</body>

</html>