<?php

        require "config.php";

        $nome = $_POST["nome"];
        $sobrenome = $_POST["sobrenome"];
        $cpf = $_POST["cpf"];
        $senha = $_POST["senha"];
        
        if(empty($nome) || empty($sobrenome) || empty($cpf) || empty($senha) ) {
                echo "Preencha todos os campos!";
        } else {
                $sql = "INSERT INTO cadastro(nome, sobrenome, cpf, senha) VALUES ('$nome', '$sobrenome', '$cpf', '$senha')";
                $result = mysqli_query($conn, $sql);
                
                $row = mysqli_affected_rows($conn);
                echo $row . "cadastrado com sucesso!";

                header("Location: /SOS--GUA/login.html ");

                mysqli_close($conn);
        }


?>