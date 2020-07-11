<!DOCTYPE HTML>
<!--
	Projection by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	
<!-- <?php include('DAO/verifica_login.php');
if($_SESSION['func']==0){
    header('Location:painel_gest.php');
    exit();}
?> -->
	<head>
		<title>InTime</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/painel.css" />
		<link rel="sortcut icon" href="images/LOGO.jpg" type="image/x-icon" />
	</head>
	<body>
    <script src="assets/js/form_cadastro.js"></script>
	<!-- meta para tirar o zoom quando clica no input -->
	<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' />
		<div class="header_painel"><h3> <a href="painel_func.php">Olá, <?php  $NOME = EXPLODE(" ",$_SESSION['nome']); ECHO $NOME[0].' '.$NOME[SIZEOF($NOME)-1]; ?> </a> </h3></div>
		<input type="checkbox" class="openSidebarMenu" id="openSidebarMenu">
		<label for="openSidebarMenu" class="sidebarIconToggle">
		<div class="spinner diagonal part-1"></div>
		<div class="spinner horizontal"></div>
		<div class="spinner diagonal part-2"></div>
		</label>
		<div id="sidebarMenu">
		<ul class="sidebarMenuInner">
			<li><a href="painel_func.php">Home</a></li>
            <li><a href="alter_func.php">Meus dados</a></li>
            <li><a href="DAO/logout.php">Sair</a></li>
            <li><a href="DAO/desativa_conta.php?id=<?php echo $_SESSION['cpf'];?>" style="color:#FFB0B0;">Desativar Perfil</a></li>
		</ul>
		</div>
        <br><br><br>


        <?php 
            $cpf = $_SESSION['cpf'];
            $connect = mysqli_connect('localhost','root',null,'intime');
            $db = mysqli_select_db($connect,'intime');
            $query_select = ("SELECT * FROM `cadastro_funcionario` A
                                WHERE A.ATIVO=1 AND A.CPF='$cpf'");

            $select = mysqli_query($connect,$query_select);
            $linhas = mysqli_num_rows($select);
            if($linhas>=1){
                $proj = mysqli_fetch_assoc($select);
                $nome_completo= $proj['nome_completo'];
                $email = $proj['email'];
                $dt_nasc =  $proj['dt_nascimento'];
                $cargo = $proj['cargo'];
            }?>



		<center>
            
        <h3>Altere seus dados pessoais</h3>
        
        <form name="form_cad_func" action="DAO/ATUALIZA/atualiza_func_cadastro.php?id=<?php echo $cpf;?>" method="post">
            <div class="field half">
                <label for="name">CPF*</label>
                <input name="name" id="name" type="text" required="true" value="<?php echo $cpf;?>" required="true" maxlength="60" style="background-color:#D3D3D3; cursor: not-allowed;  " disabled>
            </div>
            <div class="field half">
                <label for="name">Nome Completo</label>
                <input name="name" id="name" type="text" placeholder="Nome Completo" required="true" value="<?php echo $nome_completo;?>" required="true" maxlength="60">
            </div>
            <div class="field half">
                <label for="email">Email</label>
                <input name="email" id="email" type="email" placeholder="Email" required="true" value="<?php echo $email;?>" required="true" maxlength="80">
            </div>
            <div class="field half">
                <label for="dt_nascimento">Data de Nascimento</label>
                <input name="dt_nascimento" id="dt_nascimento" onBlur="validaData(form_cad_func.dt_nascimento);" type="text" placeholder="dd/mm/aaaa" onKeyUp="mascaraData(form_cad_func.dt_nascimento);" 
                maxlength="10" required="true" value="<?php echo $dt_nasc;?>" required="true">
            </div>
            <div class="field half">
                <label for="cargo">Cargo</label>
                <input name="cargo" id="cargo" type="text" placeholder="Ex: Analista de Sistemas Jr" required="true" value="<?php echo $cargo;?>">
            </div> 
            <BR>
                <input value="Atualizar" id="Atualizar" class="btn" type="submit" ></input>
            
            </form>

            <h6>*Para alterar seu CPF, envie um e-mail para sac@intime.com.br</h6>
            

</center>
			
		

	</body>
</html>