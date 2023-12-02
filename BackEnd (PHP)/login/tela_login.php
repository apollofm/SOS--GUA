<?php

  include ('config.php');

    

    if(isset($_POST['cpf']) || isset($_POST['senha'])) {

    if(strlen($_POST['cpf']) == 0) {
        echo "Preencha seu cpf";
    } else if(strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    } else {

        $cpf = $con->real_escape_string($_POST['cpf']); 
        $senha = $con->real_escape_string($_POST['senha']); 
       
        $sql_code = "SELECT * FROM usuario WHERE cpf = '$cpf' AND senha = '$senha'";
        $sql_query = $con->query($sql_code) or die("Falha na execução do codigo SQL; " . $con->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {

            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)){
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: /SOS--GUA/localizacao.php");

        } else {
            echo "Falha ao logar! CPF ou senha incorretos ";
        }

    }
}
?>