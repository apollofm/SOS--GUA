<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "@zbNwl2ww";
$dbname = "sosagua";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

// Armazena a foto no servidor
$target_dir = "fotos/";
$target_file = $target_dir . basename($_FILES["foto"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Verifica se a foto é real e se é da extensão correta
if (isset($_POST["submit"])) {
   $check = getimagesize($_FILES["foto"]["tmp_name"]);
   if ($check !== false) {
      echo "Arquivo é uma imagem - " . $check["mime"] . ".";
      $uploadOk = 1;
   } else {
      echo "O arquivo não é uma imagem.";
      $uploadOk = 0;
   }
}

// Tenta mover a foto para o servidor
if ($uploadOk == 1) {
   if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
      echo "A foto " . htmlspecialchars(basename($_FILES["foto"]["name"])) . " foi enviada.";
   } else {
      echo "Houve um erro ao enviar a foto.";
   }
}

// Insere os dados no banco de dados
// Verifica se o formulário foi enviado corretamente
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $endereco = $_POST['endereco'];
    $complemento = $_POST['complemento'];
    $numero = $_POST['numero'];
    $problema = $_POST['problema'];
    $foto = $_FILES["foto"]["name"];
    
    // Preparar a consulta SQL (remova a vírgula extra após '$foto')
    $sql = "INSERT INTO problemas (endereco, complemento, numero, problema, foto) VALUES ('$endereco', '$complemento', '$numero','$problema','$foto')";
    
    if ($conn->query($sql) === TRUE) {
       // Redireciona para outra página
       header("Location: /SOS--GUA/index.html");
       exit(); // Certifique-se de sair do script após o redirecionamento
    } else {
       echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
