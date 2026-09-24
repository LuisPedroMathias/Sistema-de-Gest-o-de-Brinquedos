<?php

include '../infra/conexao.php';

$id_brinquedo = isset($_GET['id_brinquedo']) ? (int) $_GET['id_brinquedo'] : 0;

$sql = "SELECT * FROM brinquedos WHERE id_brinquedo = ?";
$stmt = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param($stmt, 'i', $id_brinquedo);
mysqli_stmt_execute($stmt);
$resultadoBrinquedo = mysqli_stmt_get_result($stmt);
$brinquedo = mysqli_fetch_assoc($resultadoBrinquedo);

if (!$brinquedo) {
    die('Brinquedo não encontrado.');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome']);
    $categoria = trim($_POST['categoria']);
    $faixa_etaria = trim($_POST['faixa_etaria']);
    $preco = (float) $_POST['preco'];
    $quantidade_estoque = (int) $_POST['quantidade_estoque'];
 
    $sql = "UPDATE brinquedos SET nome = ?, preco = ?, categoria = ?, faixa_etaria = ?, quantidade_estoque = ? WHERE id_brinquedo = ?";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, 'sdssii', $nome, $preco, $categoria, $faixa_etaria, $quantidade_estoque, $id_brinquedo);

    if (mysqli_stmt_execute($stmt)) {
        echo "Brinquedo atualizado com sucesso!";
        echo "<br><a href='../index.php'>Voltar</a>";
        exit();
    } else {
        echo "Erro ao atualizar brinquedo: " . mysqli_stmt_error($stmt);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <h1>Editar Brinquedo!</h1>
    <link rel="stylesheet" href="../styles/style.css">
</head>

<body>
    <form method="POST">

        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" value="<?php echo htmlspecialchars($brinquedo['nome']); ?>" required>
        <br>
        <label for="categoria">Categoria:</label>
        <input type="text" name="categoria" id="categoria" value="<?php echo htmlspecialchars($brinquedo['categoria']); ?>" required>
        <br>
        <label for="faixa_etaria">Faixa Etária:</label>
        <input type="text" name="faixa_etaria" id="faixa_etaria" value="<?php echo htmlspecialchars($brinquedo['faixa_etaria']); ?>" required>
        <br>
        <label for="preco">Preço:</label>
        <input type="number" name="preco" id="preco" value="<?php echo htmlspecialchars($brinquedo['preco']); ?>" step="0.01" required>
        <br>
        <label for="quantidade_estoque">Quantidade em Estoque:</label>
        <input type="number" name="quantidade_estoque" id="quantidade_estoque" value="<?php echo htmlspecialchars($brinquedo['quantidade_estoque']); ?>" required>
        <br>
        <button type="submit">Atualizar Brinquedo</button>
    </form>
    <button type="button" onclick="window.location.href='../index.php'">Voltar</button>

</body>

</html>