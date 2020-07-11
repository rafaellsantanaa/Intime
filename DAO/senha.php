<?php 
 session_start();

$cpf = $_POST['cpf'];
$email = ($_POST['email']);
$connect = mysqli_connect('localhost','root',null,'intime');
$db = mysqli_select_db($connect,'intime');
$query_select_func = "SELECT * FROM cadastro_funcionario WHERE cpf = '$cpf' and email = '$email'"; 
$query_select_gest=  "SELECT * FROM cadastro_gestor WHERE cpf = '$cpf' and email = '$email'";

$select_func = mysqli_query($connect,$query_select_func);
$select_gest = mysqli_query($connect,$query_select_gest);
$linhas_func = mysqli_num_rows($select_func);
$linhas_gest = mysqli_num_rows($select_gest);

function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

$nova_senha = randomPassword();
$nova_senhamd5 = md5($nova_senha);

if( $cpf == "" || $cpf == null || $email == "" || $email == null){
echo"<script language='javascript' type='text/javascript'>
alert('Por favor, preencha todos os campos!');window.location.href='../login.php';</script>";
}else{
    if($linhas_func == 1){
        $dados = mysqli_fetch_array($select_func,MYSQLI_NUM);
        $_SESSION['cpf']=$dados[0];
        $_SESSION['nome']=$dados[1];
        $_SESSION['func']=1;
    
        $query_select_func = "update cadastro_funcionario set senha='$nova_senhamd5',nova_senha=1 WHERE cpf = '$cpf'"; 
        $select_func = mysqli_query($connect,$query_select_func);   
        
        // EMAIL
        $msg = "Ola ".$_SESSION['nome'].",\n\nSua nova senha para acesso ao InTime: ".$nova_senha." \nPara alterar a senha, acesse o InTime\n\nConte conosco,\nEquipe InTime | sac@intime.com.br";
        
        mail($email,"Recuperacao de Senha - InTime",$msg);
        echo("<script language='javascript' type='text/javascript'>
        alert('Senha redefinida, confira a caixa de entrada ou lixo eletronico do seu email :D');window.location.href='../login.php';</script>");
        exit();
    
    }else if($linhas_gest == 1){
    
        $dados = mysqli_fetch_array($select_gest,MYSQLI_NUM);
        $_SESSION['cpf']=$dados[0];
        $_SESSION['nome']=$dados[1];
        $_SESSION['func']=0;
        
        $query_select_func = "update cadastro_gestor set senha='$nova_senhamd5',nova_senha=1 WHERE cpf = '$cpf'"; 
        $select_func = mysqli_query($connect,$query_select_func);   
        
        // EMAIL
        $msg = "Ola ".$_SESSION['nome'].",\n\nSua nova senha para acesso ao InTime: ".$nova_senha." \nPara alterar a senha, acesse o InTime\n\nConte conosco,\nEquipe InTime | sac@intime.com.br";
        
        mail($email,"Recuperacao de Senha - InTime",$msg);
        echo("<script language='javascript' type='text/javascript'>
        alert('Senha redefinida, confira a caixa de entrada ou lixo eletronico do seu email :D');window.location.href='../login.php';</script>");
        exit();
    }
    else{
    echo"<script language='javascript' type='text/javascript'>
    alert('CPF ou email incorretos!');window.location.href='../login.php';</script>";
    exit();
    }
    }

?>