<!DOCTYPE HTML>
<!--
	Projection by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	
	<?php include('DAO/verifica_login.php'); 
	if($_SESSION['func']==1){
		header('Location:painel_func.php');
		exit();
	}?>
	<head>
		<title>InTime</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/painel.css" />
		<link rel="sortcut icon" href="images/LOGO.jpg" type="image/x-icon" />
	</head>
	<body>			
		<div class="header_painel_gestor"><h4><a href="painel_func.php">Olá, <?php  $NOME = EXPLODE(" ",$_SESSION['nome']); ECHO $NOME[0].' '.$NOME[SIZEOF($NOME)-1]; ?></a> </h4></div>
		<input type="checkbox" class="openSidebarMenu" id="openSidebarMenu">
		<label for="openSidebarMenu" class="sidebarIconToggle">
		<div class="spinner diagonal part-1"></div>
		<div class="spinner horizontal"></div>
		<div class="spinner diagonal part-2"></div>
		</label>
		<div id="sidebarMenu_gestor">
		<ul class="sidebarMenuInner_gestor">
			<li><a href="painel_func.php">Home</a></li>
			<li><a href="alter_func.php">Meus dados</a></li>
			<li><a href="DAO/logout.php">Sair</a></li>
			<li><a href="DAO/desativa_conta.php?id=<?php echo $_SESSION['cpf'];?>" style="color:#FFB0B0;">Desativar Perfil</a></li>
		</ul>
		</div>

		<br><br><br>
		
		<?php include ('DAO/SELECAO/select_atividade_proj.php');?>
		
			

		

		<!-- Scripts -->
			<!-- <script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script> -->

	</body>
</html>