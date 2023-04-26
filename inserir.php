<?php
    include("conecta.php");

    $matricula = $_POST["Matricula"];
    $nome      = $_POST["Nome"];
    $idade     = $_POST["Idade"];

    $comando = $pdo->prepare("INSERT INTO aluno Values($matricula,'$nome',$idade)");

    $resultado = $comando->execute();

    //para voltar no formulário:
        header("location: cadastro.html");
?>