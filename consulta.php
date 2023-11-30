<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Dados do Banco de Dados</h1>

<table border="1" cellpadding="10" border-collapse: collapse;>
    <thead>
        <tr>
            <th>ID</th>
            <th>endereco</th>
            <th>complemento</th>
            <th>numero</th>
            <th>Problema</th>
            <th>Foto</th>
        </tr>
    </thead>
    <tbody>
        <?php
        
        
        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "sosagua";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Conexão falhou: " . $conn->connect_error);
        }

    
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_id'])) {
        $delete_id = $_POST['delete_id'];

        
        $sql_delete = "DELETE FROM usuario WHERE id = $delete_id";

        if ($conn->query($sql_delete) === TRUE) {
            echo "Registro excluído com sucesso!";
        } else {
            echo "Erro ao excluir o registro: " . $conn->error;
        }
    }

        // Consulta SQL para obter os dados
        $sql = "SELECT id, endereco, complemento, numero, Problema, foto FROM problemas";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Exibindo os dados na tabela
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['endereco'] . "</td>";
                echo "<td>" . $row['complemento'] . "</td>";
                echo "<td>" . $row['numero'] . "</td>";
                echo "<td>" . $row['Problema'] . "</td>";
                echo '<td><img src="BackEnd (PHP)/fotos/' . $row['foto'] . '" width="159" height="150"/></td>';
                echo '<td><a href="BackEnd (PHP)/fotos/' . $row['foto'] . '" download>Baixar</a></td>';
                echo '<td><form method="post"><input type="hidden" name="delete_id" value="' . $row['id'] . '"/><button type="submit">Resolvido</button></form></td>';

                echo "</tr>";
            }
        } else {
            echo "0 resultados";
        }

        $conn->close();
        ?>
</body>
</html>