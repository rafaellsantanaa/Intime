<?php 

$cpf = $_GET['cpf'];
$id_proj = $_GET['id'];

$connect = mysqli_connect('localhost','root',null,'intime');
$db = mysqli_select_db($connect,'intime');
$query_select = "SELECT cpf FROM projeto_funcionario WHERE cpf = '$cpf' and id_projeto = '$id_proj'";
$select = mysqli_query($connect,$query_select);
$linhas = mysqli_num_rows($select);

      if($linhas >= 1){
        $query =("update `projeto_funcionario` set ativo=1
        where id_projeto = '$id_proj' and cpf='$cpf'");
        $insert = mysqli_query($connect,$query);
        if($insert){
          echo"<script language='javascript' type='text/javascript'>
          alert('Funcionário Alocado :) ');window.location.href='../../report_func_proj.php?id=$id_proj'</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>
          alert('Não foi possível alocar esse funcionário');window.location.href='../../report_func_proj.php?id=$id_proj'</script>";
        }     
        die();
 
      }else{
        $query = "INSERT INTO projeto_funcionario (cpf,id_projeto,ativo) VALUES ('$cpf','$id_proj','1')";
        $insert = mysqli_query($connect,$query);
        if($insert){
          echo"<script language='javascript' type='text/javascript'>
          alert('Funcionário Alocado :) ');window.location.href='../../report_func_proj.php?id=$id_proj'</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>
          alert('Não foi possível alocar esse funcionário');window.location.href='../../report_func_proj.php?id=$id_proj'</script>";
        }
        die();
      }
    
?>