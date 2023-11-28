<?php
include '../dbconfig/bancoprodutos.php';

$nome_produto = isset($_POST['nome_produto']) ? $_POST['nome_produto'] : '';
$descricao_produto = isset($_POST['descricao_produto']) ? $_POST['descricao_produto'] : '';
$quant_1 = isset($_POST['quant_1']) ? $_POST['quant_1'] : '';
$valor_1 = isset($_POST['valor_1']) ? $_POST['valor_1'] : '';
$quant_2 = isset($_POST['quant_2']) ? $_POST['quant_2'] : '';
$valor_2 = isset($_POST['valor_2']) ? $_POST['valor_2'] : '';
$quant_3 = isset($_POST['quant_3']) ? $_POST['quant_3'] : '';
$valor_3 = isset($_POST['valor_3']) ? $_POST['valor_3'] : '';
$quant_4 = isset($_POST['quant_4']) ? $_POST['quant_4'] : '';
$valor_4 = isset($_POST['valor_4']) ? $_POST['valor_4'] : '';
$quant_5 = isset($_POST['quant_5']) ? $_POST['quant_5'] : '';
$valor_5 = isset($_POST['valor_5']) ? $_POST['valor_5'] : '';

$sql = $conn->prepare("INSERT INTO produtos (nome_produto, descricao_produto, quant_1, valor_1, quant_2, valor_2, quant_3, valor_3, quant_4, valor_4, quant_5, valor_5) 
                      VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

if ($sql === false) {
    echo "Erro ao preparar a query: " . $conn->error;
} else {

    $sql->bind_param("ssssssssssss", $nome_produto, $descricao_produto, $quant_1, $valor_1, $quant_2, $valor_2, $quant_3, $valor_3, $quant_4, $valor_4, $quant_5, $valor_5);

    if ($sql->execute()) {
        echo "Registro inserido com sucesso";
    } else {
        echo "Erro ao inserir registro: " . $sql->error;
    }

    $sql->close();
}

$conn->close();
?>
