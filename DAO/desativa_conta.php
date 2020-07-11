<?php 
session_start();
$cpf = $_GET['id'];

$connect = mysqli_connect('localhost','root',null,'intime');
$db = mysqli_select_db($connect,'intime');
    
    if ($_SESSION['func']==1){
        
        $query_select = ("update `cadastro_funcionario` set ativo=0 where cpf='$cpf' and ativo=1");
        mysqli_query($connect,$query_select);
        session_DESTROY();
        echo"<script language='javascript' type='text/javascript'>
        alert('Conta desativada com sucesso, faça login novamente para ativa-la :D');window.location.href='../index.php';</script>";
        
    }else if ($_SESSION['func']==0){
        $query_select = ("update `cadastro_gestor` set ativo=0 where cpf='$cpf' and ativo=1");
        mysqli_query($connect,$query_select);
        session_DESTROY();
        echo"<script language='javascript' type='text/javascript'>
        alert('Conta desativada com sucesso, faça login novamente para ativa-la :D');window.location.href='../index.php';</script>";
    }
    ?>