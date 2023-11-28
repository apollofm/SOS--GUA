<?php

    $db_ = "localhost";
    $db_User = "root";
    $db_pass = "";
    $db_name = "sosagua";


    $conn = mysqli_connect("localhost","root","","sosagua");

            if(!$conn) {
                die("Erro ao conectar ao banco de dados:" . mysqli_connect_error());
            }


?>