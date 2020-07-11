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
		<div class="header_painel"><h3> Olá, <?php  $NOME = EXPLODE(" ",$_SESSION['nome']); ECHO $NOME[0].' '.$NOME[SIZEOF($NOME)-1]; ?> </h3></div>
		<input type="checkbox" class="openSidebarMenu" id="openSidebarMenu">
		<label for="openSidebarMenu" class="sidebarIconToggle">
		
		</label>
		<br><br><br>


       


		<center>
            
        <h3>Defina sua nova senha</h3>
        
        <form name="form_cad_func" action="DAO/ATUALIZA/atualiza_senha_func.php?id=<?php echo $_SESSION['cpf'];?>" method="post">
        <div class="field half">
							<label for="Senha">Senha</label>
							<input name="senha" id="senha" type="password" placeholder="************" onKeyPress="liberaCadastro();" required="true" minlength="8">
						</div><br>
						<div class="field half">
							<label for="Senha">Confirme a Senha</label>
							<input name="Csenha" id="Csenha" type="password" placeholder="************" onBlur="validaSenha();" onKeyUp="liberaCadastro();" required="true" minlength="8">
						</div>
            <BR>
                <input value="Atualizar" id="cadastrar" class="btn" type="submit"  style='display:none; font-size:13px;' ></input>
    
            </form>

            <h6>*Para alterar seu CPF, envie um e-mail para sac@intime.com.br</h6>
            

</center>
			
		

	</body>
</html>