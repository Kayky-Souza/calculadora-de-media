<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Notas</title>
    <link rel="stylesheet" href="css/formulario.css">
</head>
<body>
    <div class="conteiner">
        <h1>Calculadora de Notas</h1>
        <form class="formulario" action="media.php" method="POST">
            <label for="aluno">Aluno</label>
            <input name="aluno" id="aluno" type="text" placeholder="Digite o nome do aluno" required>

            <label for="nota1">Nota 1</label>
           <input name="nota1" id="nota1" type="number" step="0.01" min="0" max="10" placeholder="Digite a Nota 1" required>
    
            <label for="nota2">Nota 2</label>
            <input name="nota2" id="nota2" type="number" step="0.01" min="0" max="10" placeholder="Digite a Nota 2" required>
    
            <label for="nota3">Nota 3</label>
            <input name="nota3" id="nota3" type="number" step="0.01" min="0" max="10" placeholder="Digite a Nota 3" required>
    
            <label for="nota4">Nota 4</label>
            <input name="nota4" id="nota4" type="number" step="0.01" min="0" max="10" placeholder="Digite a Nota 4" required>
    
            <input type="submit" value="CALCULAR NOTA">
        </form>
    </div>
</body>
</html>