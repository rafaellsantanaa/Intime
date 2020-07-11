<?php 
session_start();
$cpf = $_GET['id'];
$nome_completo= $_POST['name'];
$email = $_POST['email'];
$dt_nasc = $_POST['dt_nascimento'];
$cargo = $_POST['cargo'];

// echo $cpf."\n";
// echo $id_projeto."\n";
// echo $data;
// echo $desc_atividade;
// echo $tempo;

$connect = mysqli_connect('localhost','root',null,'intime');
$db = mysqli_select_db($connect,'intime');
    

$query_select = "SELECT cpf FROM cadastro_funcionario WHERE cpf <> '$cpf' AND email = '$email' 
                UNION SELECT cpf FROM cadastro_gestor WHERE cpf <> '$cpf' AND email = '$email'";
$select = mysqli_query($connect,$query_select);
$linhas = mysqli_num_rows($select);

if ($linhas==0){
    $query_select = ("update `cadastro_funcionario` set cargo='$cargo', email='$email', dt_nascimento='$dt_nasc', nome_completo='$nome_completo'  
                        where cpf='$cpf' and ativo=1");
    mysqli_query($connect,$query_select);
    
        echo"<script language='javascript' type='text/javascript'>
        alert('Funcionário atualizado com sucesso :D');window.location.href='../../painel_func.php';</script>";
    }else{
        echo"<script language='javascript' type='text/javascript'>
        alert('Email de funcionario já utilizado');window.location.href='../../alter_func.php';</script>";
    }
    ?>