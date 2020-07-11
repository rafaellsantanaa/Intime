<?php 
session_start();
$id_proj = $_GET['id'];

// echo $cpf."\n";
// echo $id_projeto."\n";
// echo $data;
// echo $desc_atividade;
// echo $tempo;

$connect = mysqli_connect('localhost','root',null,'intime');
$db = mysqli_select_db($connect,'intime');

    $query_select = ("update `projeto` set data_fim = data_inicio
                        where id_projeto = '$id_proj'");
    mysqli_query($connect,$query_select);
   
    echo"<script language='javascript' type='text/javascript'>
    alert('Projeto Ativado com sucesso! :D');window.location.href='../../painel_gest.php';</script>";

    
?>