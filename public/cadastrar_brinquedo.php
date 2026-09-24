<?php

include "../infra/conexao.php";

$nome = $_POST["nome"];
$categoria = $_POST["categoria"];
$faixa_etaria = $_POST["faixa_etaria"];
$preco = $_POST["preco"];
$quantidade_estoque = $_POST["quantidade_estoque"];

$sql = "INSERT INTO brinquedos (nome, categoria, faixa_etaria, preco, quantidade_estoque) VALUES (?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conexao, $sql);

if ($stmt === false) {
    die("Erro ao preparar a inserção do brinquedo: " . mysqli_error($conexao));
}

mysqli_stmt_bind_param($stmt, 'ssdss', $nome, $categoria, $faixa_etaria, $preco, $quantidade_estoque);

if (mysqli_stmt_execute($stmt)) {
    echo "Brinquedo cadastrado com sucesso!";
    echo "<br><a href='../index.php'>Voltar</a>";
    mysqli_stmt_close($stmt);
    exit();
} else {
    echo "Erro ao cadastrar brinquedo: " . mysqli_error($conexao);
}

header("Location: ../index.php");

?>