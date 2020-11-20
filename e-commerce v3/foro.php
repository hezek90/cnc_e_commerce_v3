<?php
	session_start();

	#if(isset($_SESSION['codusu'])){
		#echo $_SESSION['nomusu'];

	#}

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

		h4{
			color: #aaa;
		}

		.tabla{
			width: 100%;

		}

		table{
			margin: auto;
			text-align: center;
		}
		.discuss{
			margin: 40px;
			font-family: helvetica;
		}

		footer{
			margin-top: 330px;
		}

		.ver{
			color: rgb(0, 80, 0);
		}

		.ver:hover{
			font-weight: bold;
		}		

		.btn{
			font-size: 15px;
			background-color: #add8e6;
		}
		.btn:hover{
			font-size: 15px;
			background-color: hsl(180.0, 100.0%, 27.3%);
			color: #fffff0;
		}
		@media only screen and (max-width: 350px){
			table{
			font-size: 12px;
			}

			.btn{
				font-size: 10px;
			}

			.btn:hover{
				font-size: 10px;
			}

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
	<h4>Comparte tus dudas e ideas libremente</h4>
	</div>
	<div class="tabla">
		<table width="90%" border="0">
			<tr>
				<td width="4%"><b>LINK </td>
				<td width="19%"><b>USUARIO</td>
				<td width="19%"><b>TÍTULO</td>
				<td width="19%"><b>FECHA</td>
				<td width="19%"><b>RESPUESTAS</td>
			</tr>
		</table>
	</div>

	
	<?php 
		include('services/connection.php');

		$sql="SELECT * FROM FORO WHERE identifier = 0 ORDER BY fech DESC";

		if ($resultado=mysqli_query($con,$sql)){ //si es posible la consulta
			while ($fila = mysqli_fetch_row($resultado)){
				$author = $fila[1];
				$id = $fila[0];
				$title = $fila[2];
				$fech = $fila[4];
				$res = $fila[5];
				echo ("<div class='tabla'>");
				echo ("<table width='90%'' border='0'>");
				echo ("<tr>");
				echo ("<td width= 4%><a href='ver_foro.php?id=$id'class='ver'>Ver <i class='fa fa-reply' aria-hidden='true'></i></a></td>");
				echo ("<td width='19%'> $author</td>");
				echo ("<td width='19%'>$title</td>");
				echo ("<td width='19%'>$fech</td>");
				echo ("<td width='19%'>$res</td>");
				echo ("</tr>");
				echo ("<hr></table>");
				echo ("</div>");
			}
			mysqli_free_result($resultado);//liberar los resultados
		}

	?>

	<div class="discuss">
		<button class="btn"><a href="form_foro.php"><i class='fa fa-comment-o' aria-hidden='true'></i> <b>Comenzar Discusión</b> </a></button>
	</div>


	<footer>
		<div class="info_footer"> e-mail: <a href="mailto:cnc3drouter@gmail.com">cnc3drouter@gmail.com </a>Dirección:<span> Cándido Zúnin Padilla 391 </span> Teléfono<span> 47721089</span> <a href="https://www.facebook.com/pages/category/E-commerce-Website/Cnc-tallados-personalizados-233915274690980/"> <div class="face"> <i class="fa fa-facebook-official" aria-hidden="true"></i></a></div> </div>
	</footer>
</body>
</html>