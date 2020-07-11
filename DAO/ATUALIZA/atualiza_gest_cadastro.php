<?php 
session_start();
$cpf = $_GET['id'];
$nome_completo= $_POST['name'];
$email = $_POST['email'];
$dt_nasc = $_POST['dt_nascimento'];


// echo $cpf."\n";
// echo $id_projeto."\n";
// echo $data;
// echo $desc_atividade;
// echo $tempo;

$connect = mysqli_connect('localhost','root',null,'intime');
$db = mysqli_select_db($connect,'intime');

$query_select = "SELECT cpf FROM cadastro_funcionario WHERE cpf <> '$cpf' || email = '$email' 
                UNION SELECT cpf FROM cadastro_gestor WHERE cpf <> '$cpf' || email = '$email'";
$select = mysqli_query($connect,$query_select);
$linhas = mysqli_num_rows($select);

if ($linhas>0){
    $query_select = ("update `cadastro_gestor`  set email='$email', dt_nascimento='$dt_nasc', nome_completo='$nome_completo'  
                        where cpf='$cpf' and ativo=1");
    mysqli_query($connect,$query_select);
    echo $query_select;
    if ($_SESSION['func']==0){
        $_SESSION['nome']=$nome_completo;
        echo"<script language='javascript' type='text/javascript'>
        alert('Gestor atualizado com sucesso :D');window.location.href='../../painel_gest.php';</script>";
    }}else{
        echo"<script language='javascript' type='text/javascript'>
        alert('Email de gestor já utilizado');window.location.href='../../alter_gest.php';</script>";
    }

    ?>