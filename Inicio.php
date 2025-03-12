<?php
// Inicia a session p acessar os dados do user
session_start();

// se o usuário nao tiver logado
if (!isset($_SESSION['user_id'])) {
    // vai pra pagina de login
    header('Location: login.php');
    exit; // encerra o script
}

// Pega o nome do user
$nome = $_SESSION['user_nome'];
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Página Inicial</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-light">

    <div class="container d-flex flex-column justify-content-center align-items-center min-vh-100">

        <!-- Mensagem de boas-vindas -->
        <div class="text-center mb-4">
            <h1 class="fw-bold">Bem-vindo, <?php echo htmlspecialchars($nome); ?>!</h1>
            <p class="text-muted">Você está logado.</p>
        </div>

        <!--form de calcular tmb -->
        <div class="card p-4 shadow" style="width: 100%; max-width: 500px;">
            <h2 class="text-center mb-3">Calcular Taxa de Metabolismo Basal (TMB)</h2>

            <form method="POST">
                <div class="mb-3">
                    <label for="sexo" class="form-label">Sexo:</label>
                    <select class="form-select" id="sexo" name="sexo" required>
                        <option value="masculino">Masculino</option>
                        <option value="feminino">Feminino</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="peso" class="form-label">Peso (kg):</label>
                    <input type="number" class="form-control" id="peso" name="peso" step="1.0" required>
                </div>

                <div class="mb-3">
                    <label for="altura" class="form-label">Altura (cm):</label>
                    <input type="number" class="form-control" id="altura" name="altura" required>
                </div>

                <div class="mb-3">
                    <label for="idade" class="form-label">Idade:</label>
                    <input type="number" class="form-control" id="idade" name="idade" required>
                </div>

                <div class="mb-3">
                    <label for="atividade" class="form-label">Nível de Atividade Física:</label>
                    <select class="form-select" id="atividade" name="atividade" required>
                        <option value="1.2">Sedentário (pouco ou nenhum exercício)</option>
                        <option value="1.375">Levemente ativo (exercício leve 1-3 dias/semana)</option>
                        <option value="1.55">Moderadamente ativo (exercício moderado 3-5 dias/semana)</option>
                        <option value="1.725">Muito ativo (exercício intenso 6-7 dias/semana)</option>
                        <option value="1.9">Extremamente ativo (exercício muito intenso ou trabalho físico)</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary w-100">Calcular TMB</button>
            </form>

            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $sexo = $_POST['sexo'];
                $peso = (float)$_POST['peso'];
                $altura = (int)$_POST['altura'];
                $idade = (int)$_POST['idade'];
                $atividade = (float)$_POST['atividade'];

                if ($sexo == 'masculino') {
                    $tmb = 88.362 + (13.397 * $peso) + (4.799 * $altura) - (5.677 * $idade);
                } else {
                    $tmb = 447.593 + (9.247 * $peso) + (3.098 * $altura) - (4.330 * $idade);
                }

                $gasto_calorico_total = $tmb * $atividade;

                echo "<div class='alert alert-info mt-4 text-center'>
                        <strong>Resultado:</strong><br>
                        TMB: " . number_format($tmb, 2) . " kcal/dia<br>
                        Gasto Calórico Total: " . number_format($gasto_calorico_total, 2) . " kcal/dia
                      </div>";
            }
            ?>
        </div>

        <!-- Botão de logout -->
        <a href="logout.php" class="btn btn-danger mt-3">Sair</a>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>