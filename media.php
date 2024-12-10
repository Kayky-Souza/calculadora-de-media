<!DOCTYPE html>
<?php

include "db.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // atribuindo os valores das notas
    $aluno = $_POST["aluno"];
    $nota1 = $_POST["nota1"];
    $nota2 = $_POST["nota2"];
    $nota3 = $_POST["nota3"];
    $nota4 = $_POST["nota4"];

    // Calcula a média
    $media = ($nota1 + $nota2 + $nota3 + $nota4) / 4;

    $insertDados = "INSERT INTO alunos(aluno, nota1, nota2, nota3, nota4, media) VALUES ('$aluno', '$nota1', '$nota2', '$nota3', '$nota4', '$media')";
    $connection->query($insertDados);

    $url = "index.php";

    header('Location: '.$url);

    $connection->close();
}
?>


<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>medias</title>
    <link rel="stylesheet" href="css/media.css">
</head>
<body>

<div class="container">
<h2>Média das notas</h2>
	<div class="table">
		<div class="table-header">
            <div class="header__item"><a id="name" class="filter__link" href="#">Aluno</a></div>
			<div class="header__item"><a id="name" class="filter__link" href="#">Nota 1</a></div>
			<div class="header__item"><a id="wins" class="filter__link filter__link--number" href="#">Nota 2</a></div>
			<div class="header__item"><a id="draws" class="filter__link filter__link--number" href="#">Nota 3</a></div>
			<div class="header__item"><a id="losses" class="filter__link filter__link--number" href="#">Nota 4</a></div>
			<div class="header__item"><a id="total" class="filter__link filter__link--number" href="#">Média</a></div>
		</div>
		<div class="table-content">	
			<div class="table-row">		
                <div class="table-data"><?php echo $aluno ?></div>
				<div class="table-data"><?php echo $nota1 ?></div>
				<div class="table-data"><?php echo $nota2 ?></div>
				<div class="table-data"><?php echo $nota3 ?></div>
				<div class="table-data"><?php echo $nota4 ?></div>
                <div class="table-data"><?php echo $media ?></div>
			</div>
		</div>	
	</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/tabela.js"></script>
</body>
</html>