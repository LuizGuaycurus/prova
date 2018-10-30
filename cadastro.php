<?php

    // Variáveis recebem dados do POST (criptografados - ninguém vê)
    $n = $_POST["nome"];
    $e = $_POST["email"];
    $u = $_POST["usuario"];
    $s = $_POST["senha"];

    $erro = "Nada";

    // Conectar o BD
    $conexao = new mysqli("localhost","root","","banco");

    // Verifica se está conectado
    if($conexao->error)
        die("Erro: " . $conexao->error);
    
    // Verifica LOGIN
    if(($n=="")||($e=="")||($u=="")||($s=="")){
        $erro = "Voce deixou campos vazios";
    }else{
        $sql = "INSERT INTO usuarios(nome,email,usuario,senha) 
            VALUES ('{$n}','{$e}','{$u}','{$s}');";
        if($conexao->query($sql) === TRUE){
            $erro = "{$n}, você foi cadastrado com sucesso!!!";
        }else{
            //erro += ", Erro: " . $sql . "<br>" .$conexao->error;
                
            $erro = "Cadastro não realizado!!!";
        }
    }
    $conexao->close();
?>