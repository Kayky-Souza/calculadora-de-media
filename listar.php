<?php
// Informações de login
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mediaalunos";

// Conexão com o banco de dados
$connection = new mysqli($servername, $username, $password, $dbname);

// Verifica se há erro na conexão
if ($connection->connect_error) {
    die("Erro de conexão: " . $connection->connect_error);
}

// Consulta para obter todos os dados dos alunos
$sql = "SELECT aluno, nota1, nota2, nota3, nota4, media FROM alunos";
$result = $connection->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Alunos</title>
    <link rel="stylesheet" href="css/media.css">
</head>

<body>

    <!-- Botão de Voltar -->
    <div class="back-button">
        <a href="index.php">
            <button>Voltar para a Página Inicial</button>
        </a>
    </div>
    </div>

    <div class="container">
        <h2>Lista de Alunos e Notas</h2>
        <div class="table">
            <div class="table-header">
                <div class="header__item"><a id="nome" class="filter__link" href="#">Aluno</a></div>
                <div class="header__item"><a id="nota1" class="filter__link filter__link--number" href="#">Nota 1</a>
                </div>
                <div class="header__item"><a id="nota2" class="filter__link filter__link--number" href="#">Nota 2</a>
                </div>
                <div class="header__item"><a id="nota3" class="filter__link filter__link--number" href="#">Nota 3</a>
                </div>
                <div class="header__item"><a id="nota4" class="filter__link filter__link--number" href="#">Nota 4</a>
                </div>
                <div class="header__item"><a id="media" class="filter__link filter__link--number" href="#">Média</a>
                </div>
            </div>
            <div class="table-content">
                <?php
                // Verifica se há resultados na consulta
                if ($result->num_rows > 0) {
                    // Exibe os dados de cada linha
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='table-row'>";
                        echo "<div class='table-data'>" . htmlspecialchars($row["aluno"]) . "</div>";
                        echo "<div class='table-data'>" . htmlspecialchars($row["nota1"]) . "</div>";
                        echo "<div class='table-data'>" . htmlspecialchars($row["nota2"]) . "</div>";
                        echo "<div class='table-data'>" . htmlspecialchars($row["nota3"]) . "</div>";
                        echo "<div class='table-data'>" . htmlspecialchars($row["nota4"]) . "</div>";
                        echo "<div class='table-data'>" . number_format($row["media"], 2) . "</div>";
                        echo "</div>";
                    }
                } else {
                    echo "<div class='table-row'>Nenhum dado encontrado</div>";
                }
                ?>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/tabela.js"></script>
</body>

</html>

<?php
// Fecha a conexão com o banco de dados
$connection->close();
?>