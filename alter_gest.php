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
	<script src="assets/js/form_cadastro.js"></script>
	<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' />			
		<div class="header_painel_gestor"><h4> <a href="painel_gest.php">Olá, <?php  $NOME = EXPLODE(" ",$_SESSION['nome']); ECHO $NOME[0].' '.$NOME[SIZEOF($NOME)-1]; ?></a> </h4></div>
		<input type="checkbox" class="openSidebarMenu" id="openSidebarMenu">
		<label for="openSidebarMenu" class="sidebarIconToggle">
		<div class="spinner diagonal part-1"></div>
		<div class="spinner horizontal"></div>
		<div class="spinner diagonal part-2"></div>
		</label>
		<div id="sidebarMenu_gestor">
		<ul class="sidebarMenuInner_gestor">
			<li><a href="painel_gest.php">Home</a></li>
			<li><a href="projetos.php">Projetos</a></li>
			<li><a href="alter_gest.php">Meus dados</a></li>
			<li><a href="DAO/logout.php">Sair</a></li>
			<li><a href="DAO/desativa_conta.php?id=<?php echo $_SESSION['cpf'];?>" style="color:#FFB0B0;">Desativar Perfil</a></li>
		</ul>
		</div>
		<!-- Header -->
			<!-- <header id="header_painel_gestor">
				<div class="inner">
					<a href="index.html" class="logo"><strong>Bem-vindo</strong> Funcionário </a>
					<nav id="nav_painel">
						<a href="painel_func.php">Home</a>
						<a href="alter_func.php">Meus dados</a>
						<a href="logout.php">Sair</a>
					</nav>
				</div>
			</header> -->
		<br><br><br>
		
        <?php 
            $cpf = $_SESSION['cpf'];
            $connect = mysqli_connect('localhost','root',null,'intime');
            $db = mysqli_select_db($connect,'intime');
            $query_select = ("SELECT * FROM `cadastro_gestor` A
                                WHERE A.ATIVO=1 AND A.CPF='$cpf'");

            $select = mysqli_query($connect,$query_select);
            $linhas = mysqli_num_rows($select);
            if($linhas>=1){
                $proj = mysqli_fetch_assoc($select);
                $nome_completo= $proj['nome_completo'];
                $email = $proj['email'];
                $dt_nasc =  $proj['dt_nascimento'];
                
            }?>



		<center>
            
        <h3>Altere seus dados pessoais</h3>
        
        <form name="form_cad_func" action="DAO/ATUALIZA/atualiza_gest_cadastro.php?id=<?php echo $cpf;?>" method="post">
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
            <BR>
                <input value="Atualizar" id="Atualizar" class="btn" type="submit" ></input>
            
            </form>

            <h6>*Para alterar seu CPF, envie um e-mail para sac@intime.com.br</h6>
            

</center>
			
	
		
			
			

		

		<!-- Scripts -->
			<!-- <script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script> -->

	</body>
</html>