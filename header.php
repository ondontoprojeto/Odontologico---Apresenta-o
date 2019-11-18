<?php include 'validar.php'?>
<div class = "row">
	<header class="bg-light border border-dark pb-2 mb-4 col-md-12">
		<div class = "row">
			<div id="menu" class="d-flex justify-content-start col-md-4">
				<div class="d-inline-flex bd-highlight">
					<img src="img/logo.png">
				</div>
			</div>
			<div class="d-flex justify-content-center col-md-4">
				<div class="d-flex flex-column bd-highlight mt-3">
					<div class="d-flex justify-content-center">
						<h2 class = "d-none d-xl-block">GERENCIAMENTO E CONTROLE</h2>
					</div>
					<div class="d-flex justify-content-center">
						<h2 class = "d-none d-xl-block">DE</h2>
					</div>
					<div class="d-flex justify-content-center mb-4">
						<h2 class = "d-none d-xl-block">CONSULTÓRIO ODONTOLÓGICO</h2>
					</div>
				</div>
			</div>
			<div class="d-flex justify-content-end col-md-4">
				<div class="d-inline-flex bd-highlight mt-3 mr-2">
					<div>
						<h5>Seja Bem-vindo (a)</h5>
						<a href="sair.php"><button type="button" class="btn btn-dark float-right">Sair</button></a>
					</div>
				</div>
			</div>
		</div>
		<nav class="navbar navbar-expand-lg navbar-light">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse justify-content-around" id="navbarSupportedContent">

				<ul class="d-flex flex-column nav-item">
					<a class = "text-black" href="home.php">
						<div class="d-flex justify-content-center">
					 		<i id = "home" class="fa fa-home fa-3x" aria-hidden="true"></i>
					 	</div>
						<div class="d-flex justify-content-center text-dark">
							<b>Início</b>
						</div>
					</a>
				</ul>

				<ul class="d-flex flex-column nav-item">
					<a class = "text-black" href="cadastro.php">
						<div class="d-flex justify-content-center">
							<i id = "cadastro" class="fa fa-address-book-o fa-3x" aria-hidden="true"></i>
						</div>
						<div class="d-flex justify-content-center text-dark">
							<b>Cadastro</b>
						</div>
					</a>
				</ul>

				<ul class="d-flex flex-column nav-item">
					<a href="agenda.php">
						<div class="d-flex justify-content-center">
							<i id = "agenda"class="fa fa-calendar-check-o fa-3x" aria-hidden="true"></i>
						</div>
						<div class="d-flex justify-content-center text-dark">
							<b>Agenda</b>
						</div>
					</a>
				</ul>

				<ul class="d-flex flex-column nav-item">
					<a href="estoque.php ?>">
						<div class="d-flex justify-content-center">
							<i id = "estoque"class="fa fa-stack-overflow fa-3x" aria-hidden="true"></i>
						</div>
						<div class="d-flex justify-content-center text-dark">
							<b>Estoque</b>
						</div>
					</a>
				</ul>

				<!-- <ul class="d-flex flex-column nav-item">
					<a href="relatorio.php">
						<div class="d-flex justify-content-center">
							<i id = "relatorio" class="fa fa-list-ul fa-3x" aria-hidden="true"></i>
						</div>
						<div class="d-flex justify-content-center text-dark">
							<b>Relatório</b>
						</div>
					</a>
				</ul> -->

				<ul class="d-flex flex-column nav-item">
					<a href="adm.php">
						<div class="d-flex justify-content-center">
							<i id = "adm" class="fa fa-gears fa-3x" aria-hidden="true"></i>
						</div>
						<div class="d-flex justify-content-center text-dark">
							<b>Administração</b>
						</div>
					</a>
				</ul>
			</div>
		</nav>
	</header>
</div>
