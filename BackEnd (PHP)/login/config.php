<?php
    // atributo para criar conexão
    $db_name = 'localhost';
    $db_user = 'root';
    $db_pass = '';
    $db_ = 'sosagua';

    $con = new mysqli("localhost", "root", "", "sosagua");

    if($con->error){
        die("Falha ao conectar ou banco de dados" . $con->error);
    }
?>