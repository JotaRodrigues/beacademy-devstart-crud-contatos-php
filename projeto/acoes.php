<?php

    function home(){
        include 'pages/home.html';
    }
    function login(){
        include 'pages/login.php';
    }
    function cadastro(){
        if($_POST){
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];

            $arquivo = fopen('dados/contatos.csv', 'a+');

            fwrite($arquivo, "{$nome};{$email};{$telefone}".PHP_EOL);

            fclose($arquivo);

            $mensagem = 'Cadastro realizado com sucesso!';
            include 'pages/mensagem.php';
        }
        include 'pages/cadastro.php';
    }
    function erro404(){
        include 'pages/erro404.html';
    }
    function lista(){
        $contatos = file('dados/contatos.csv');
        include 'pages/lista.php';
    }
    function excluir(){
        $id = $_GET['id'];

        $contatos = file('dados/contatos.csv');

        // Irá retirar o set do id
        unset($contatos[$id]);

        unlink('dados/contatos.csv');

        $arquivo = fopen('dados/contatos.csv', 'a+');

        foreach($contatos as $cadaContato){
            fwrite($arquivo, $cadaContato);
        }
        $mensagem = 'Exluido com sucesso!';
        include 'pages/mensagem.php';
    }
    function editar(){
        $id = $_GET['id'];
        $contatos = file('dados/contatos.csv');
        $dados = explode(';',$contatos[$id]);
        
        if($_POST){
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];

            $contatos[$id] = "{$nome};{$email};{$telefone}".PHP_EOL;

            unlink('dados/contatos.csv');
            $arquivo = fopen('dados/contatos.csv', 'a+');

            foreach($contatos as $cadaContato){
                fwrite($arquivo, $cadaContato);
            }

            fclose($arquivo);

            $mensagem = 'Atualizado com sucesso!';
            include 'pages/mensagem.php';
        }

        include 'pages/editar.php';
    }