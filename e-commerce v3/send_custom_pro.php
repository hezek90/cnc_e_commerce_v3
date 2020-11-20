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
		.title {
			font-size: 30px;
		}

		form{
			width: 60%;
			margin: auto;
			background-color: white;
			border-radius: 2px;
			border: 1px solid black;
			margin-top: 30px;
		}
	
		form input{
			padding: 5px;
			margin: 5px 5px;
			width: calc(100% - 25px);
		}	

		.numerito{
			width: 40px;
		}
		
		.submit{
			color: rgb(0, 128, 128);
			width: calc(100% - 11px);
		}

		.erase{
			color: #8b0000;
			width: calc(100% - 11px);
		}
		.main-content{
			margin-bottom: 250px;
		}

		.rad{
			width: 3%;
		}

		.pre{
			width: 8%;
		}
		
		.btn b{
			color: #8b0000;
			font-size: 20px;
		}	

		span{
			color: hsl(120.0, 100.0%, 19.6%);
			font-size: 18px;

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
			<div class="title"><b>Envíenos imágen del diseño personalizado que desee</b></div><br>
			<div class="title-section">Formato: png, jpg, jpeg, su peso debe ser igual o menor a 3MB, notarse claramente la superficie, sin relieves demasiado complejos, su imágen será añadida a su carrito, le envairemos detalles acerca de su pedido dentro de las 24horas. </div>
			<div class="product-list" id="put_info">
				<form action="services/pedido/custom_service.php" method="post" enctype="multipart/form-data">
					<label class="mate">Nombre de la imágen </label><input type="text" name="product" maxlength="20" required="true"><br>
					<label class="mate">Déposite la imágen</label>
					<input type="file" name="img" accept="image/png, image/jpeg, image/jpg"  required="true">
					<label class="mate">Dimensiones (ancho,altura) en cm: </label>
					<input type="number" class="numerito" min="10" value="10" pattern="^[0-9]+" max="30" id="dimx" required="true" name="dimx">
					<label> X </label>
					<input type="number" class="numerito" min="10" value="10" pattern="^[0-9]+" id="dimy" max="30" required="true" name="dimy">
					<br>
  					<label> Madera MDF:</label><input type="radio" checked class="rad" onclick="update('madera')" required name="material" value="madera">
 					<label> Acrílico:</label><input type="radio" class="rad" onclick="update('acrilico')" name="material" value="acrilico">
 					<label> Vidrio:</label><input type="radio" class="rad" onclick="update('vidrio')"  name="material" value="vidrio"> <br>
 					<div id="put_precio"> </div>

					<input type="reset"  class="erase" value="Reiniciar formulario"/>
					<div id="btn" class="btn"> </div>


					
				</form>
			</div>
		</div>
	</div>

	<footer>
		<div class="info_footer"> e-mail: <a href="mailto:cnc3drouter@gmail.com">cnc3drouter@gmail.com </a>Dirección:<span> Cándido Zúnin Padilla 391 </span>  </div>
	</footer>

	<script type="text/javascript">
		
		update();

		function update(material){
			var mat = material;
			var precio  = 315.00;
			var dimx =  document.getElementById("dimx").value;
			var dimy =  document.getElementById("dimy").value;
			var area = dimx * dimy;

			precio = precio + (area * 0.35);
			if (mat == 'vidrio'){
				precio = precio + 50;
			}else if (mat == 'acrilico' ) {
				precio = precio + 100;
			}
			if(dimx >= 10 && dimy >= 10 && dimy <= 30 && dimx <= 30 ){
				document.getElementById("put_precio").innerHTML ='Precio: <span>  $UYU <b>'+ precio + '</b></span>' ; 
				document.getElementById("btn").innerHTML ='<input type="submit" class="submit" name="Enviar">' ;
			}else{
				document.getElementById("btn").innerHTML ='<b>Las dimensiones deben ser mayores 10cm cada una y menores a 30cm cada una';
				document.getElementById("put_precio").innerHTML =''; 

			}

		}


		dimx.onchange = ()=>{//si la contraseña cambia actualizar validación
			update()
		}
		dimy.onchange = ()=>{//si la contraseña cambia actualizar validación
			update()
		}
		dimx.onkeyup = ()=>{//si la contraseña cambia actualizar validación
			update()
		}
		dimy.onkeyup = ()=>{//si la contraseña cambia actualizar validación
			update()
		}

	</script>

</body>
</html>