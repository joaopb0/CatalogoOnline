<?php
    include '../dbconfig/loginadmquery.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usuario = $_POST["usuario"];
        $senha = $_POST["senha"];

        $sql = "SELECT * FROM loginadmpass WHERE usuario = '$usuario' AND senha = '$senha'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Use o caminho absoluto para o redirecionamento
            header("Location: ../server/indexadm.php");
            exit();
        } else {
            echo "Credenciais inválidas. Por favor, tente novamente.";
        }
    }
?>

