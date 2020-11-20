
<!DOCTYPE html>
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!--utf-8 -->
	<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script><!--jquery link, enable ajax -->
	<link rel="icon" type="image/png" href="images/logo.png" /> <!-- logo en el window -->
	<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- posibilidad responsive -->
	<link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css"><!-- link a fontawesome, para usar iconos -->
	<title> CNC TALLADOS </title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<style type="text/css">
		form p{
			margin: 5px 4px;
			color: darkred;
		}

		form{
			max-width: 500px;
			width: calc(100% - 40px);
			padding: 20px;
			background: #fff;
			border-radius: 8px;
			margin:auto;
		}

		footer{
			margin-top: 253px;
		}

		form h3{
			margin:5px 0;
		}

		form input{
			padding: 15px 10px;
			width: calc(100% - 34px);
			margin-bottom: 10px;
		}

		form button {
			margin: 0;
			padding: 0;
			height: 50px;
			width: calc(100% - 11px);
			font-weight: bold;
			cursor: pointer;
			background-color: lightblue;
			font-family: Helvetica
		}

		form button:hover{
			background-color: lightgreen;
		}

		form a{
			color: #8a2be2;
			font-weight: bold;
		}
	</style>
</head>

<body>
	<header>
		<section class="first_header">
		<div class="logo-place2" ><a href="index.php"><img src="images/logo1.png"></a></div>
		<div class="logo-place"><a href="index.php"><img src="images/cnc.png"></a></div>
		<div class="options-place">
			<div class="option" title="Foro Discusión"><a href="foro.php"><i class="fa fa-comments"></i></a></div>
			<div class="option" title="Mi Carrito"><a href="carrito.php"><i class="fa fa-shopping-cart"></i></a> </div>
			<?php
			if (isset($_SESSION['codusu'])){
				echo '<div class="cuenta"><i class="fa fa-user"></i>  '. $_SESSION['nomusu'] .'</div>';
				echo '<div class="option" title="Cerrar Sesión"><a href="services/cerrar_session.php"<i class="fa fa-sign-out"></i> </a></div>';
			}
			else{
			
			?>
			<div class="option" title="Mi cuenta"><a href="login.php"><i class="fa fa-user"></i></a> </div>
			<?php
			}

			?>
		</div>
		</section>
		<section class="second_header">
		<div class="second_bar">
			<nav>
			<b><a href="somos.php">¿Quiénes Somos?</b></a>
			<b><a href="send_custom_pro.php">Conseguir tallados personalizados</b></a>
			<b><a href="cnc_info.php">¿Qué es una CNC?</b></a>
			</nav>
		</section>
		</div>
	</header>
	<div class="main-content">
		<div class="content-page">
			<form action="services/login.php" method="POST">
				<h3>Iniciar Sesión</h3>
				<input type="text" name="emausu" placeholder="Correo Electrónico">
				<input type="password" name="pasusu" placeholder="Contraseña">
				<?php

			if (isset($_GET['e'])){
				switch ($_GET['e']){
					case '1':
					
						echo '<p>Error de conexión </p>';
						break;
					
					case '2':
						echo '<p>Email Inválido</p>';
						break;

					case '3':
						echo '<p>Constraseña incorrecta</p>';
						break;

					default:
						break;
					}
				}

				?>
				<button type="submit">Ingresar</button>
				<a href="registro.php">¿No tienes una cuenta?, Regístrate aquí</a>

			</form>			
		</div>



	<footer>
		<div class="info_footer"> e-mail: <a href="mailto:cnc3drouter@gmail.com">cnc3drouter@gmail.com </a>Dirección:<span> Cándido Zúnin Padilla 391</span>  </div>
	</footer>

</body>

</html>