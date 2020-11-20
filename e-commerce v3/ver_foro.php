<?php
	session_start();

	if(isset($_SESSION['codusu'])){
		$user = $_SESSION['nomusu'];
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


		.caja{
			font-family: helvetica;
			font-size: 15px;
			width: 90%;
			margin-left: 50px;
			background-color: hsl(60.0, 55.6%, 91.2%);
			border: 3px solid #ffe4c4;
			margin-bottom: 15px;
		}

		.caja_msj{
			margin: auto;
			width: 90%;
		}

		.caja_author{
			width: 90%;
			margin: auto;

		}

		.caja_title{
			width: 90%;
			margin: auto;
		}

		.caja_fech{
			width: 90%;
			margin: auto;

		}
		.content{
			width: 100%;
		}

		.form-content{
			background-color: hsl(60.0, 55.6%, 91.2%);
			width: 60%;
			margin-left: 50px;
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
		textarea{
			margin: 15px 0 ;
			resize: none;
			width: 100%;
			height: 150px;
		}

		form textarea{
			padding: 0;
			margin: 0;
			height: 150px;
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
			<b><a href="somos.php">¿Quiénes Somos?</b></a>
			<b><a href="send_custom_pro.php">Conseguir tallados personalizados</b></a>
			<b><a href="cnc_info.php">¿Qué es una CNC?</b></a>
			</nav>
		</section>
		</div>
	</header>
	
	<div class="title"><h2>FORO DISCUSIÓN</h2></div>

<?php 
	
	include('services/connection.php');
	$id = $_GET['id'];
	$sqli = "SELECT * FROM FORO WHERE id = $id ";

	if ($resi = mysqli_query($con,$sqli)){
		while ($fila = mysqli_fetch_row($resi)) {
			$id = $fila[0];
			$title = $fila[2];
			$author = $fila[1];
			$msj = $fila[3];
			$fech = $fila[4];
			$resp = $fila[5];
		}
		echo "<div class='caja'> <br>";
		echo "<div class='caja_title'> TÍTULO: $title  </div>";
		echo "<div class='caja_author'> USUARIO: $author </div> ";
		echo "<div class='caja_fech'>FECHA: $fech </div> ";	
		echo "<div class='caja_msj'><textarea readonly>$msj</textarea></div> ";
		echo "</div>";

	}


	$sqlcount = "SELECT COUNT(*) total FROM FORO WHERE identifier = $id";
	$update = mysqli_query($con,$sqlcount);
	$count = mysqli_fetch_assoc($update);

	$sqla = "SELECT * FROM FORO WHERE identifier = $id ";
	$updateres = mysqli_query($con,$sqla);

	$i=0;

	if ($count['total'] > 0){
		if ($updateres){
			while ($row= mysqli_fetch_row($updateres)) {
				$authorans = $row[1];
				$msjans = $row[3];
				$fechans = $row[4];
				echo "<div class='caja'><br>
				<div class='caja_author'> USUARIO: $authorans </div> 
				<div class='caja_fech'>FECHA: $fechans </div> 
				<div class='caja_msj'><textarea readonly>$msjans</textarea></div> 
				</div>";
				$i++;
				$nresupdate = "UPDATE FORO SET resp = $i WHERE id = $id ";
				$finalizar = mysqli_query($con,$nresupdate);
			}
			
	}

	}
	echo '<div class="caja">Número de respuestas: ' . $count['total'].'</div';
	

		
 ?>
	</div>
	<div class="content">
		<div class="form-content">
		<form name="formulario" action="<?php echo("services/foro/responder_foro.php?id=".$id); ?>" method="post" >
				RESPUESTA: <textarea name="respuesta" required = true minlength="4"></textarea>
				<input type="submit" class="btn" value="Publicar">	
			</form>
		</div>		
	</div>

	<footer>
		<div class="info_footer"> e-mail: <a href="mailto:cnc3drouter@gmail.com">cnc3drouter@gmail.com </a>Dirección:<span> Cándido Zúnin Padilla 391</span>  </div>
	</footer>
</body>
</html>