<?php

include "infra/conexao.php";


$brinquedos = mysqli_query($conexao, "SELECT id_brinquedo, nome, categoria, faixa_etaria, preco, quantidade_estoque FROM brinquedos");

if (!$brinquedos) {
    die("Erro na consulta: " . mysqli_error($conexao));
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestão de Brinquedos</title>
    <link rel="stylesheet" href="style/styles.css">
</head>

<body>
    <header>
        <h1>Sistema de Gestão de Brinquedos</h1>
    </header>
    <main>

        <h2>Cadastrar Brinquedo!</h2>
        <form action="public/cadastrar_brinquedo.php" method="POST">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
            <br>
            <label for="categoria">Categoria:</label>
            <input type="text" id="categoria" name="categoria" required>
            <br>
            <label for="faixa_etaria">Faixa Etária:</label>
            <input type="text" id="faixa_etaria" name="faixa_etaria" required>
            <br>
            <label for="preco">Preço:</label>
            <input type="number" id="preco" name="preco" step="0.01" required>
            <br>
            <label for="quantidade_estoque">Quantidade em Estoque:</label>
            <input type="number" id="quantidade_estoque" name="quantidade_estoque" step="1" required>
            <br>
            <button type="submit">Cadastrar</button>
        </form>

        <div>
            <h2>Brinquedos Cadastrados</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Categoria</th>
                    <th>Faixa Etária</th>
                    <th>Preço</th>
                    <th>Quantidade em Estoque</th>
                    <th>Ações</th>
                </tr>

                <?php while ($brinquedo = mysqli_fetch_assoc($brinquedos)) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($brinquedo["id_brinquedo"]) ?></td>
                        <td><?php echo htmlspecialchars($brinquedo["nome"]) ?></td>
                        <td><?php echo htmlspecialchars($brinquedo["categoria"]) ?></td>
                        <td><?php echo htmlspecialchars($brinquedo["faixa_etaria"]) ?></td>
                        <td><?php echo number_format($brinquedo["preco"], 2, ',', '.') ?></td>
                        <td><?php echo htmlspecialchars($brinquedo["quantidade_estoque"]) ?></td>
                        <td>
                            <a href="public/editar.php?idbrinquedo=<?php echo urlencode($brinquedo["id_brinquedo"]) ?>">Editar</a>
                            <a href="public/deletar.php?idbrinquedo=<?php echo urlencode($brinquedo["id_brinquedo"]) ?>">Excluir</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </main>
    <footer>

    </footer>
</body>

</html>