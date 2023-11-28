<?php
include '../dbconfig/bancoprodutos.php';

// Verifica se o parâmetro 'id' foi passado na URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Prepara e executa a consulta de exclusão
    $stmt = $conn->prepare("DELETE FROM produtos WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Exclusão bem-sucedida, redireciona para a página principal
        header("Location: ../server/viewadm.php");
        exit();
    } else {
        echo "Erro ao excluir o registro: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "ID inválido.";
}

$conn->close();
?>
