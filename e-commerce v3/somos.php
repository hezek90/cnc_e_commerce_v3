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


		}

		.title{
			text-align: center;
		}

		li{
			margin-bottom: 10px;

		}
		.equipo img{
			width: 350px;
			height: 300px;
		}

		.ubi{
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
		<div class="title-section"><div class="title"><img src="images/cnclogo.png"><br>
			<div class="equipo"><img src="images/equipo.png"><img src="images/em1.png"><img src="images/em2.png"></div></div>
			<div class="content-page">

				<div class="text"><p>Somos una empresa que realiza tallados
				personalizados en diversos materiales
				entre ellos vidrio, madera, acrílico.
				Los mismos son realizados con
				nuestra maquina Router CNC.</p>
				<p>Existe una gran variedad de productos
				tradicionales que las personas
				acostumbran a regalar a sus seres
				queridos, pero que pueden ser
				personalizados por nuestra empresa.
				Esto hace que un regalo tradicional pase
				a ser único.</p>
				<p>En este sentido, nuestra empresa se
				enfoca en aquellas personas que buscan
				un obsequio especial y único para un ser
				querido o un grupo de personas.
				Ofrecemos un producto de buena calidad
				y a un precio accesible.</p></div>
				
				<div class="valores"><ul><div class="mate"><b><u>Nuestros valores</u></b></div> <li><div class="mate">Pasión </div>
				Tenemos pasión por nuestra actividad ya que nos gusta lo que
				hacemos y mejoramos día a día para ofrecer siempre algo mejor.</li>
				<li><div class="mate">Originalidad e Innovación </div> Nuestra empresa está constantemente 
				creando productos cada vez más novedosos. </li>
				<li><div class="mate">Calidad</div> Es fácil y usual prometer calidad, pero comprometerse con
				ella significa insistir en los procesos hasta que el producto obtenido
				sea el mejor posible, es decir, no conformarse con menos.  </li>
				<li><div class="mate">Honestidad y responsabilidad</div> Poseemos transparencia con nuestros
				clientes informándoles en todo momento acerca de su pedido, y nos
				comprometemos con el pedido.</li></ul></div>
				<div class="ubi">Ubicación de cnc tallados:(Artigas,Uruguay)<br>
				<img src="images/ubicacion.png"></div>
				

			</div>
		</div>
	</div>
 
	<footer>
		<div class="info_footer"> e-mail: <a href="mailto:cnc3drouter@gmail.com">cnc3drouter@gmail.com </a>Dirección:<span> Cándido Zúnin Padilla 391 </span> Teléfono<span> 47721089</span> <a href="https://www.facebook.com/pages/category/E-commerce-Website/Cnc-tallados-personalizados-233915274690980/"> <div class="face"> <i class="fa fa-facebook-official" aria-hidden="true"></i></a></div> </div>
	</footer>
</body>
</html>