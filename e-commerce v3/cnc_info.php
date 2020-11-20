<?php
	session_start();
	
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
		
		.text{
		color: rgb(169, 169, 169);
		font-size: 25px;
		}

		.title{
			text-align: center;
		}

		.img img{
			height: 300px;
			margin: 12px 7%;
			width: 350px;
		}

		.img{
			text-align: center;
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
	<div class="main-content">
		<div class="content-page">
			<div class="title"><img src="images/cnc.png"></div><br>
			
			<div class="text">
			El control numérico por computadora (o más comúnmente conocido como CNC) es un sistema que permite controlar la posición de un elemento físico. Normalmente una herramienta, que está montada en una máquina.(como lo es un minitorno en nuestro caso)

			Esto se consigue mediante un programa y un conjunto de órdenes añadidas. Con ambos, se pueden controlar las coordenadas de posición de un punto (el minitorno) respecto a un origen. En pocas palabras, estamos trabajando con una especie de GPS pero aplicado al mundo de los mecanizados, y muchísimo más preciso.

			Si tuviéramos un cubo, cada una de las aristas se compondría de unas coordenadas propias e únicas. Así, para dirigir una punta de una herramienta al tocar cada una de las coordenadas, solo hay que introducir las órdenes pertinentes en el programa. Se cargará en la máquina, la cual, ejecutará todos los caminos. 
			<div class="img"><img src="images/cnc.jpg"><img src="images/cnc222.jpg"> </div>
			<p>Las tecnologías empleadas son de confianza, herramientas que sirven para automatizar el proceso de tallados. Se convierten las imágenes rasterizadas, en vectoriales, las cuales son transformadas a código g mediante el programa inkscape. Luego se orienta la posición de la CNC con un el mismo programa en el cual se introduce el código g, Universal G Code Sender. Si está interesado en este tema puede contactarse con nosotros mediante el foro o por correo electrónico </p>
			</div>
			
		</div>
	</div>

	<footer>
		<div class="info_footer"> e-mail: <a href="mailto:cnc3drouter@gmail.com">cnc3drouter@gmail.com </a>Dirección:<span> Cándido Zúnin Padilla 391 </span> Teléfono<span> 47721089</span> <a href="https://www.facebook.com/pages/category/E-commerce-Website/Cnc-tallados-personalizados-233915274690980/"> <div class="face"> <i class="fa fa-facebook-official" aria-hidden="true"></i></a></div> </div>
	</footer>

</body>
</html>