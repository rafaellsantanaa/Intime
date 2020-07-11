<?php 
 
$name = $_POST['name'];
$email = $_POST['email'];
$cpf = $_POST['cpf'];
$dt_nascimento = $_POST['dt_nascimento'];
$senha = MD5($_POST['senha']);
$connect = mysqli_connect('localhost','root',null,'intime');
$db = mysqli_select_db($connect,'intime');
$query_select = "SELECT cpf FROM cadastro_funcionario WHERE cpf = '$cpf' || email = '$email' 
                UNION SELECT cpf FROM cadastro_gestor WHERE cpf = '$cpf' || email = '$email'";
$select = mysqli_query($connect,$query_select);
$linhas = mysqli_num_rows($select);
  if($name == "" || $name == null || $email == "" || $email == null || $cpf == "" || $cpf == null || 
    $dt_nascimento == "" || $dt_nascimento == null || $senha == "" || $senha == null){
    echo"<script language='javascript' type='text/javascript'>
    alert('Por favor, preencha todos os campos!');window.location.href='../../cadastro_gestor.php';</script>";
    }else{
      if($linhas >= 1){
 
        echo"<script language='javascript' type='text/javascript'>
        alert('Já existe um usuário cadastrado com essas informações!');window.location.href='../../cadastro_gestor.php';</script>";
        die();
 
      }else{
        $query = "INSERT INTO cadastro_gestor (nome_completo,email,cpf,dt_nascimento,senha,dt_inicio,dt_fim) VALUES ('$name','$email','$cpf','$dt_nascimento','$senha',NOW(),NOW())";
        $insert = mysqli_query($connect,$query);
        if($insert){
          echo"<script language='javascript' type='text/javascript'>
          alert('Usuário cadastrado com sucesso!');window.location.href='../../login.php'</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>
          alert('Não foi possível cadastrar esse usuário');window.location.href='../../cadastro_gestor.php'</script>";
        }
      }
    }
?>