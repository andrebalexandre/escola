<?php
    include("conecta.php");

    $matricula = $_GET["M"];
   

    $comando = $pdo->prepare("DELETE FROM aluno where matricula=$matricula");

    $resultado = $comando->execute();

    //para voltar no formulário:
        header("location: cadastro.html");