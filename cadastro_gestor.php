
<!DOCTYPE HTML>
<!--
	Projection by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>InTime</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="sortcut icon" href="images/LOGO.jpg" type="image/x-icon" />
	</head>
	<body>
	<script src="assets/js/form_cadastro.js"></script>
		<!-- Header -->
			<header id="header">
				<div class="inner">
					<a href="index.php" class="logo"><strong>InTime</strong></a>
					<nav id="nav">
						<a href="index.php"><strong>Home</strong></a>
						<a href="cadastro_func.php"><strong>Cadastro - Funcionário</strong></a>
						<a href="cadastro_gestor.php"><strong>Cadastro - Gestor</strong></a>
						<a href="login.php"><strong>Login</strong></a>
					</nav>
					<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
				</div>
			</header>

		<!-- Footer -->
			<footer id="footer">
				<div class="inner">
					
						<div>
							<span class="icon fa-users fa-2x"></span>
							<h3>Gerencie Projetos e Pessoas</h3>
						</div>

						<form name="form_cad_gest" action="DAO/CADASTRO/cad_gestor.php" method="post">
							<div class="field half first">
								<label for="name">Nome Completo:</label>
								<input name="name" id="name" type="text" placeholder="Nome Completo" required="true" maxlength="60">
							</div>
							<div class="field half">
								<label for="email">Email</label>
								<input name="email" id="email" type="email" placeholder="exemplo@dominio.com.br" required="true" maxlength="80">
							</div>
							<div class="field half first">
								<label for="cpf">CPF</label>
								<input name="cpf" id="cpf" type="text" onBlur="validarCPF(form_cad_gest.cpf);" onKeyPress="mascaraCPF(form_cad_gest.cpf);"  
								placeholder="000.000.000-00" maxlength="14" required="true">
							</div>
							<div class="field half">
								<label for="dt_nascimento">Data de Nascimento</label>
								<input name="dt_nascimento" id="dt_nascimento" onBlur="validaData(form_cad_gest.dt_nascimento);" type="text" placeholder="dd/mm/aaaa" onKeyUp="mascaraData(form_cad_gest.dt_nascimento);" maxlength="10" required="true">
							</div>
							<br>
							<div class="field half">
								<label for="Senha">Senha</label>
								<input name="senha" id="senha" type="password" placeholder="************" onKeyPress="liberaCadastro();" required="true" minlength="8"> 
							</div><br>
							<div class="field half">
								<label for="Senha">Confirme a Senha</label>
								<input name="Csenha" id="Csenha" type="password" placeholder="************" onBlur="validaSenha();" onKeyUp="liberaCadastro();" required="true" minlength="8">
							</div>
							<ul class="actions">
								<li><input value="Cadastrar" id="cadastrar" class="button alt" type="submit" ></li>
							</ul>
							</form>

					<div class="copyright">
						&copy;2020 Deadalous. Design: <a href="https://templated.co">Deadesing</a>. Images: <a href="https://unsplash.com">Unsplash</a>.
					</div>

				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
			<script> document.getElementById('cadastrar').style.display = 'none'; </script>

	</body>
</html>
