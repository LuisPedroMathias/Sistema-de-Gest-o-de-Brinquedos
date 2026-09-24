<?php

include "../infra/conexao.php";

$id_brinquedo = $_GET['id_brinquedo'];

$stmt = mysqli_prepare($conexao, "DELETE FROM brinquedos WHERE id_brinquedo = ?");
mysqli_stmt_bind_param($stmt, 'i', $id_brinquedo);

if (mysqli_stmt_execute($stmt)) {
    echo "Brinquedo excluído com sucesso.";
    echo "<br><a href='../index.php'>Voltar</a>";
} else {
    echo "Erro ao excluir brinquedo: " . mysqli_error($conexao);
}

mysqli_stmt_close($stmt);

?>