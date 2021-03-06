<?php
	session_start();
	if(!isset($_SESSION['codusu'])){
		echo "<script type='text/javascript'> alert('Debe iniciar sesión para usar esta modalidad');
		window.location.href='login.php'; </script>";
	}
	

?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!--utf-8 -->
	<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script><!--jquery link, enable ajax -->
	<link rel="icon" type="image/png" href="images/logo.png" /> <!-- logo en el window -->
	<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- posibilidad responsive -->
	<link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css"><!-- link a fontawesome, para usar iconos -->
	<title> CNC TALLADOS </title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<style type="text/css">
		.title{
			margin: 30px;
			font-family: helvetica;
		}

		.title h2,h4{
			margin: 4px;
		}

		.content{
			width: 100%;
		}

		.form-content{
			width: 100%;
			margin: auto;
		}

		form{
			max-width: 500px;
			width: calc(100% - 40px);
			padding: 20px;
			background: #fff;
			border-radius: 8px;
			margin:auto;
		}

		form h3{
			margin:5px 0;
		}

		form .input{
			margin: 10px 0;
			padding: 10px 5px;
			width: calc(100% - 11px);
		}

		form input{
			width: 100%;
			outline: none;
			height: 50px;
			font-family: Helvetica
			

		}

		.btn{
			font-weight: bold;
			background-color: #004080;
			color: hsl(0.0, 0.0%, 96.1%);
			font-size: 20px;
			cursor: pointer;
		}

		.btn:hover{
			background-color: #008040;
		}

		form textarea{
			padding: 0;
			margin: 0;
			height: 300px;
			width: 100%;
			resize: none;
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
			<b><a href="somos.php"><i class="fa fa-graduation-cap" aria-hidden="true"></i>
			¿Quiénes Somos?</b></a>
			<b><a href="send_custom_pro.php"><i class="fa fa-envelope" aria-hidden="true"></i>
			Conseguir tallados personalizados</b></a>
			<b><a href="cnc_info.php"><i class="fa fa-info" aria-hidden="true"></i>
			¿Qué es una CNC?</b></a>
			</nav>
		</section>
		</div>
	</header>
	<!--<div class="banner"></div>-->
	<div class="title"><h2>FORO DISCUSIÓN</h2>
	<h4>Complete los datos para publicar lo que desee</h4>
	</div>
	<div class="content">
		<div class="form-content">
		<form name="formulario" action="services/foro/add2foro.php" method="post" >
				TÍTULO:  <input type="text" class="input" name="title" required = true >
				MENSAJE: <textarea name="message" required = true minlength="4"></textarea>
				<input type="submit" class="btn" value="Publicar">	
			</form>
		</div>		
	</div>
	
	<footer>
		<div class="info_footer"> e-mail: <a href="mailto:cnc3drouter@gmail.com">cnc3drouter@gmail.com </a>Dirección:<span> Cándido Zúnin Padilla 391 </span> Teléfono<span> 47721089</span> <a href="https://www.facebook.com/pages/category/E-commerce-Website/Cnc-tallados-personalizados-233915274690980/"> <div class="face"> <i class="fa fa-facebook-official" aria-hidden="true"></i></a></div> </div>
	</footer>
</body>
</html>