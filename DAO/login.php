<?php 
 session_start();

$cpf = $_POST['cpf'];
$senha = MD5($_POST['senha']);
$connect = mysqli_connect('localhost','root',null,'intime');
$db = mysqli_select_db($connect,'intime');
$query_select_func = "SELECT * FROM cadastro_funcionario WHERE cpf = '$cpf' and senha = '$senha'"; 
$query_select_gest=  "SELECT * FROM cadastro_gestor WHERE cpf = '$cpf' and senha = '$senha'";

$select_func = mysqli_query($connect,$query_select_func);
$select_gest = mysqli_query($connect,$query_select_gest);
$linhas_func = mysqli_num_rows($select_func);
$linhas_gest = mysqli_num_rows($select_gest);

  if( $cpf == "" || $cpf == null || $senha == "" || $senha == null){
    echo"<script language='javascript' type='text/javascript'>
    alert('Por favor, preencha todos os campos!');window.location.href='../login.php';</script>";
    }else{
      if($linhas_func == 1){
        $dados = mysqli_fetch_array($select_func,MYSQLI_NUM);
        $_SESSION['cpf']=$dados[0];
        $_SESSION['nome']=$dados[1];
        $_SESSION['func']=1;
        if ($dados[9]==1){
          echo("<script language='javascript' type='text/javascript'>
          alert('Você será direcionado para redefinir sua nova senha :D');window.location.href='../nova_senha_func.php';</script>");
        }else if ($dados[8]==0){
            $query_select_func = "update cadastro_funcionario set ativo= 1 WHERE cpf = '$cpf'"; 
            $select_func = mysqli_query($connect,$query_select_func);
            echo("<script language='javascript' type='text/javascript'>
            alert('Perfil Reativado, bem-vindo novamente :D');window.location.href='../painel_func.php';</script>");
        }else{
            header('Location: ../painel_func.php');
        }
        
        exit();
      }else 
      if($linhas_gest == 1){
        $dados = mysqli_fetch_array($select_gest,MYSQLI_NUM);
        $_SESSION['cpf']=$dados[0];
        $_SESSION['nome']=$dados[1];
        $_SESSION['func']=0;
        if ($dados[8]==1){
          echo("<script language='javascript' type='text/javascript'>
          alert('Você será direcionado para redefinir sua nova senha :D');window.location.href='../nova_senha_gest.php';</script>");
        }else if ($dados[7]==0){
          $query_select_func = "update cadastro_gestor set ativo= 1 WHERE cpf = '$cpf'"; 
          $select_func = mysqli_query($connect,$query_select_func);
          echo("<script language='javascript' type='text/javascript'>
          alert('Perfil Reativado, bem-vindo novamente :D');window.location.href='../painel_gest.php';</script>");
        }else{
          header('Location: ../painel_gest.php');
        exit();
 
      }}
      else{
        echo"<script language='javascript' type='text/javascript'>
        alert('CPF ou senha incorretos!');window.location.href='../login.php';</script>";
        exit();
      }
      }
    
?>