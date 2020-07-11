<?php 
session_start();
$cpf = $_GET['id'];
$senha = MD5($_POST['senha']);


// echo $cpf."\n";
// echo $id_projeto."\n";
// echo $data;
// echo $desc_atividade;
// echo $tempo;

$connect = mysqli_connect('localhost','root',null,'intime');
$db = mysqli_select_db($connect,'intime');
    
    $query_select = ("update `cadastro_funcionario` set senha='$senha', nova_senha=0  
                        where cpf='$cpf'");
    mysqli_query($connect,$query_select);
    
   
        echo"<script language='javascript' type='text/javascript'>
        alert('Senha atualizada com sucesso :D');window.location.href='../../login.php';</script>";
        session_destroy();
    
    ?>