
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
			<form action="services/register.php" method="POST" id="registro" enctype="multipart/form-data">
				<h3>Regístrate</h3>
				<input type="text" name="nomusu" placeholder="Nombre" minlength="3" maxlength="12" required = true >
				<input type="text" name="apeusu" placeholder="Apellido" minlength="3" required = true>
				<input type="text" name="citusu" placeholder="Ciudad" minlength="3"required = true>
				<input type="email" name="emausu" placeholder="Correo Electrónico" required = true>
				<input type="password" name="pasusu" id="pass" placeholder="Contraseña" minlength="5" autocomplete="off" required = true>
				<input type="password" name="pasusu" id="repass" placeholder="Confirme su contraseña" autocomplete="off" required = true>
				<input type="text" name="dir" placeholder="Dirección de domicilio" minlength="3" required = true>
				<input type="text" name="tel" placeholder="Teléfono o Celular" pattern="\d*" minlength="9" maxlength="9" required = true>
				<input type="text" name="ced" placeholder="Cédula de identidad" pattern="\d*" minlength="8"
				maxlength="8" required = true>
				<button type="submit" >Registrarse </button>
			</form>			
		</div>



	<footer>
		<div class="info_footer"> e-mail: <a href="mailto:cnc3drouter@gmail.com">cnc3drouter@gmail.com </a>Dirección:<span> Cándido Zúnin Padilla 391 </span> Teléfono<span> 47721089</span> <a href="https://www.facebook.com/pages/category/E-commerce-Website/Cnc-tallados-personalizados-233915274690980/"> <div class="face"> <i class="fa fa-facebook-official" aria-hidden="true"></i></a></div> </div>
	</footer>

</body>
<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script><!--jquery link, enable ajax -->
<script type="text/javascript">

	const form = document.getElementById('registro');
	let pass = document.getElementById('pass');
	let repass = document.getElementById('repass');

	function  validation() { //validación de la constraseña
		if (pass.value != repass.value){
			repass.setCustomValidity("Las contraseñas no coinciden");
		}
		else{
			repass.setCustomValidity("");
		}

	}

	pass.onchange = ()=>{//si la contraseña cambia actualizar validación
		validation();
	}

	repass.onkeyup = ()=>{//si la contraseña  de confirmación cambia actualizar validación
		validation();
	}


	$.ajax({
		type: 'POST',
		url: "services/register.php",
		data:{},
		sucees:function(a){
			if(a==2){
				alertify.success("Este correo ya existe");
			}
			else{
				alertify.success("Agregado exitosamente");
			}
		}
	});

	

	

</script>	

</html>