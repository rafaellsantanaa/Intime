
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
			<footer id="footer_login">
				<div class="inner">
						<div>
							<span class="icon fa-sign-in fa-2x"></span>
							<h3>Entre agora mesmo</h3>
						</div>
					

					<form name="form_login" action="DAO/login.php" method="post">

						<div class="field half first">
							<label for="cpf">CPF</label>
							<input name="cpf" id="cpf" type="text" placeholder="000.000.000-00" 
							onBlur="validarCPF(form_login.cpf);" onKeyPress="mascaraCPF(form_login.cpf);" maxlength="14" required="true">
						</div>

						<div class="field half first">
							<label for="senha">Senha</label>
							<input name="senha" id="senha" type="password" placeholder="" required="true">
						</div>
						
						<ul class="actions">	<a href="redefinir_senha.php" text="Esqueci a senha">Esqueci a senha</a><br><br>
							<li><input value="Entrar" class="button alt" type="submit"></li>
						</ul>
						
					</form>
					<div class="copyright">
						&copy;2020 Deadalous. Design: <a href="https://templated.co">Deadesing</a>. Images: <a href="https://unsplash.com">Unsplash</a>.
					</div>
					
				<br><br><br><br><br><br><br>
				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
