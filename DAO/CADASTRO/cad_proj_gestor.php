<?php 
 
$cpf = $_GET['id'];
$nome = $_POST['name'];
$descr = $_POST['descr'];
$dt_ini = $_POST['dt_nascimento'];

$connect = mysqli_connect('localhost','root',null,'intime');
$db = mysqli_select_db($connect,'intime');

$query_select = "select * from projeto where nome_projeto='$nome' and data_inicio='$dt_ini' and descricao='$descr'";
$select = mysqli_query($connect,$query_select);
$linhas = mysqli_num_rows($select); 

if($linhas>=1){ 
    echo"<script language='javascript' type='text/javascript'>
    alert('Já existe um projeto semelhante cadastrado!');window.location.href='../../cadastrar_proj.php';</script>";
}else{
    $query_select = "insert into projeto (nome_projeto,data_inicio,data_fim,descricao) values
                                     ('$nome','$dt_ini','$dt_ini','$descr') ";
    mysqli_query($connect,$query_select);
    $query_select = "select * from projeto where nome_projeto='$nome' and data_inicio='$dt_ini' and descricao='$descr' ";
    $select = mysqli_query($connect,$query_select);
    $proj = mysqli_fetch_assoc($select);
    $id_proj = $proj['id_projeto'];
    $query_select = "insert into projeto_gestor  (id_projeto,cpf,ativo) values('$id_proj','$cpf',1) ";
    mysqli_query($connect,$query_select);

    echo"<script language='javascript' type='text/javascript'>
    alert('Projeto cadastrado :D');window.location.href='../../painel_gest.php';</script>";
}
// // $linhas = mysqli_num_rows($select);
//   if($nome == "" || $nome == null || $descr == "" || $descr == null || $cpf == "" || $cpf == null || 
//     $dt_ini == "" || $dt_ini == null){
//     echo"<script language='javascript' type='text/javascript'>
//     alert('Por favor, preencha todos os campos!');window.location.href='../../painel_gest.php';</script>";
//     }else{
//       if($linhas >= 1){
 
//         echo"<script language='javascript' type='text/javascript'>
//         alert('Já existe um usuário cadastrado com essas informações!');window.location.href='../../cadastro_gestor.php';</script>";
//         die();
 
//       }else{
//         $query = "INSERT INTO cadastro_gestor (nome_completo,email,cpf,dt_nascimento,senha,dt_inicio,dt_fim) VALUES ('$name','$email','$cpf','$dt_nascimento','$senha',NOW(),NOW())";
//         $insert = mysqli_query($connect,$query);
//         if($insert){
//           echo"<script language='javascript' type='text/javascript'>
//           alert('Usuário cadastrado com sucesso!');window.location.href='../../login.php'</script>";
//         }else{
//           echo"<script language='javascript' type='text/javascript'>
//           alert('Não foi possível cadastrar esse usuário');window.location.href='../../cadastro_gestor.php'</script>";
//         }
//       }
//     }
?>