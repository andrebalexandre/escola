<?php
    include("conecta.php");

    $matricula = $_POST["Matricula"];
    $nome      = $_POST["Nome"];
    $idade     = $_POST["Idade"];


    //se clicou no botão Inserir:
    if(isset($_POST["inserir"]) )
    {

    $comando = $pdo->prepare("INSERT INTO aluno Values($matricula,'$nome',$idade)");
    $resultado = $comando->execute();
    //para voltar no formulário:
    header("location: cadastro.html");
    }

    if(isset($_POST["excluir"]) )
    {

    $comando = $pdo->prepare("DELETE FROM aluno where matricula=$matricula");
    $resultado = $comando->execute();
    
    //para voltar no formulário:
    header("location: cadastro.html");

    }

    if(isset($_POST["alterar"]) )
    {
        $comando = $pdo->prepare("UPDATE aluno set nome='$nome',idade=$idade where matricula=$matricula");
        $resultado = $comando->execute();
        header("location: cadastro.html");
    }

    if(isset($_POST["listar"]) )
    {
        $comando = $pdo->prepare("SELECT * from aluno");
        $resultado = $comando->execute();
        
        while( $linhas = $comando->fetch()) 
        {
            $m = $linhas["Matricula"]; //nome da coluna xampp
            $n = $linhas["Nome"];
            $i = $linhas["Idade"];

            echo("Matricula: $m Nome: $n Idade: $i <br>");
        }
    }