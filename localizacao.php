<?php

include("BackEnd (PHP)/login/protect.php");

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./Estilização (CSS)/localizacao.css">
  <link rel="shortcut icon" href="IMAGENS/favicon.png" type="image/x-icon">
  <title>Localização</title>

  <script src="/SCRIPTS (JS)/functionform.js"></script>

  <style>
    label {
      display: inline-block;
      margin-top: 5px;
      margin-bottom: 5px;
    }

    input,
    textarea {
      display: inline-block;
    }

    #endereço {
      width: 315px;
    }

    #complemento {
      width: 160px;
    }

    #numero {
      width: 50px;
    }
  </style>

</head>

<body>

  <div class="localidade">
    <h1>LOCALIZE SUA POSIÇÃO</h1>
  </div>

  <a href="index.html">
    <img class="backhome" src="IMAGENS/SOS AGUA titulo.png">
  </a>

  <img class="mundo" src="IMAGENS/mundo.png" alt="">
  <div class="mapbox">
    <iframe
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126212.25472956957!2d-35.975740668797435!3d-8.67890382409485!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x700aabf4f183ccf%3A0x8bc956219c1c4811!2sLagoa%20dos%20Gatos%20-%20PE!5e0!3m2!1spt-PT!2sbr!4v1698959612608!5m2!1spt-PT!2sbr"
      style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>

  <!-- Nova Caixa de Texto (Pronto para Banco de Dados) -->
  <div class="carde">
    <form action="BackEnd (PHP)/insercaoLocalizacao.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">

      <label for="endereco">Endereço:</label>
      <input type="text" id="endereco" name="endereco" pattern="[a-zA-Z\s.,;'-]+" title="Apenas texto é permitido" required>
      </input>
      <br>

      <label for="complemento">Complemento:</label>
      <input type="text" id="complemento" name="complemento" pattern="[a-zA-Z\s.,;'-]+" title="Apenas texto é permitido" required>
      </input>

      <label for="numero">Número:</label>
      <input type="text" id="numero" name="numero" pattern="[0-9]+" required>
      </input>
      <br>

      <label for="message">Problema:</label>
      <textarea id="problema" name="problema" rows="10" cols="50" required>
        </textarea>
      <br>

      <label for="imagem">Anexar arquivo:</label>
      <input type="file" id="foto" name="foto" required>
      <br>

      <label for="Enviar Report!">Enviar Report!</label>
      <input type="submit" name="submit" value="OK">
    </form>
  </div>

  </div>

  <p><a href="BackEnd (PHP)/login/logout.php">Sair</a></p>

  <script src="/SCRIPTS (JS)/functionform.js"></script>
</body>

</html>