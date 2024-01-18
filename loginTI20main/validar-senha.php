<?php

echo '<h2>validar-senha.php</h2>';

$usuario = $_POST ['usuario'];
$senha = $_POST ['senha'];

// var_dump($usuario, $senha);

function validarLogin($usuario, $senha){// o NEW é para chamar a classe, no caso o PDO 
    $conexao = new PDO("mysql:host=localhost;dbname=tb_login", "root", "");

    $script = "SELECT * FROM tela_login WHERE usuario ='". $usuario ."'AND senha ='" . $senha . "'";
    //Tem que a ' no usuario e antes do AND porque ele ira gardar o que esta dentro da variavel e esta concatenado com o que esta sendo colocado no usuario
    $resultado = $conexao ->query($script);
    $lista = $resultado-> fetchAll();
    
    // echo '<br><pre>';
    // var_dump($lista);
    // var_dump(empty($lista));

    if(empty($lista)){
        // echo '<h2> Você NÃO tem acesso</h2>';
        header('Location:index.php?mensagem1')
    }
    else{
        // echo '<h2> Você tem acesso</h2>';
        header('Location:sistema.php');
    }
}

validarLogin($usuario, $senha);