<?php
	session_start();
	if (!isset($_SESSION['codusu'])){
	header('location: index.php');
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

		.mar{
			margin-right: 5px;
		}


		.body-pedidos{
			width: 100%;

		}

		img{
			height: 100%;
		}

		span{
			color: rgb(0, 100, 0);
			font-size: 18px;

		}
		.proc_buy{
			margin-top: 10px;
			outline: none;
			border-radius: 15px;
			padding: 13px 20px;
			color: black;
			background-color: rgb(173, 255, 47);
			border-style: none;
			font-size: 15px;
			font-weight: bolder;
			cursor: pointer;
			border: 1px solid black;
			display: flex;
		}

		.btn_exit{
			float: right;
		}

		.exit{
			float: right;
		}

		

		.proc_buy:hover{
			color: hsl(0.0, 0.0%, 100.0%);
			background-color: #2e8b57;
			border: 1px solid black;
		}

		.pedido-img{
			width: 200px;
		}

		.pedido-datail{
			padding: 10px;
			width: 100%;
		}

		.pedido-detail h3,
		.pedido-detail p{

			margin: 10px 5px;
		}

		.pedido-img img{
			width: 100%;
		}

		.item-pedido{
			background-color: #c1c1;
			height: 260px;
			display: flex;
			margin-bottom: 5px;
			border: 1px black solid;
		}


		@media only screen and (max-width: 493px){
			.item-pedido{
				height: 340px;
			}
		}
		@media only screen and (max-width: 400px){
			.item-pedido{
				height: 400px;
				
			}
			.cuenta{
				font-size: 22px;
			}
			.option{
				font-size: 22px;
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
				echo '<div class="cuenta"><i class="fa fa-user "></i>  '. $_SESSION['nomusu'] .'</div>';
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
			<h2><i class="fa fa-shopping-cart"></i>  Mis Pedidos </h2>
			<div id="put_info"></div>
			<div id="put_info2"></div>
			<button class="proc_buy">Total: &nbsp; $UYU  &nbsp;  <div class="mar" id="total">0</div> <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
</button>
			
		</div>
	</div>

	<footer>
		<div class="info_footer"> e-mail: <a href="mailto:cnc3drouter@gmail.com">cnc3drouter@gmail.com </a>Dirección:<span> Cándido Zúnin Padilla 391 </span> Teléfono<span> 47721089</span> <a href="https://www.facebook.com/pages/category/E-commerce-Website/Cnc-tallados-personalizados-233915274690980/"> <div class="face"> <i class="fa fa-facebook-official" aria-hidden="true"></i></a></div> </div>
	</footer>
	
	<script type="text/javascript">
		var precio = 0;
		$(document).ready(function(){//llamar a la funcion al iniciar
			$.ajax({ 
				url: 'services/pedido/get_all_pedidos.php',
				type: 'POST',
				data:{},
				success:function(data){
					console.log(data);
					let html = '';
					
					for (var i = 0; i < data.datos.length; i++){ //rellenar los datos con la db
						if(data.datos[i].codusu ==  <?php echo $_SESSION['codusu']?>){
							precio = precio + parseInt(data.datos[i].precio);
							html += '<div class="body-pedidos">'+
										'<div class="item-pedido">'+				
											'<div class="pedido-img">'+
												'<img src="images/'+ data.datos[i].rutimapro +'">'+
											'</div>'+
											'<div class="pedido-detail">'+
												'<h3>Producto: '+ data.datos[i].nompro +'</h3>'+
												'<p><b>Precio: </b><span>$UYU '+ data.datos[i].precio +'</span>'+
												'</p>'+
												'<p><b>Fecha: </b>'+ data.datos[i].fecped +'</p>'+
												'<p><b>Estado: </b> '+ data.datos[i].estado +' </p>'+
												'<p><b>Dimensiones: </b>'+ data.datos[i].dimx +' x ' + 
												data.datos[i].dimy +' cm</p>'+
												'<p><b>Material: </b> '+ data.datos[i].material +' </p>'+
												'<p><b>Dirección: </b>'+ data.datos[i].dirusuped +' </p>'+
												'<p><b>Telefono/Celular: </b>'+ data.datos[i].telusuped +'</b> 	</p>'+
												'<p><b>Cédula: </b>'+ data.datos[i].cedusuped + '</p>'+
											'</div>'+
											'<div class="exit"><button class="btn_exit" onclick="deleted('+
											data.datos[i].codped+')"><i class="fa fa-times"'+  'aria-hidden="true"></i></button></a></div>'+
										'</div>'+
									'</div>';
							}
						
					}

					document.getElementById("put_info").innerHTML= html;
				},
				error:function(err){
					console.error(err);
				}
			});//fin ajax
		});//fin funcion

		$(document).ready(function(){//llamar a la funcion al iniciar
			$.ajax({ 
				url: 'services/pedido/custom_pedido.php',
				type: 'POST',
				data:{},
				success:function(data){
					console.log(data);
					let html2 = '';
					for (var i = 0; i < data.datos.length; i++){ //rellenar los datos con la db
						if(data.datos[i].nomusu ==  '<?php echo $_SESSION['nomusu']?>'){
							precio = precio + parseInt(data.datos[i].precio);
							html2 += '<div class="body-pedidos">'+
										'<div class="item-pedido">'+				
											'<div class="pedido-img">'+
												'<img src="services/pedido/'+data.datos[i].imgpro+'">'+
											'</div>'+
											'<div class="pedido-detail">'+
												'<h3> Producto Personalizado: '+ data.datos[i].nompro +'</h3>'+
												'<p><b>Precio: </b><span>$UYU '+ data.datos[i].precio +'</span>'+
												'</p>'+
												'<p><b>Fecha: </b>'+ data.datos[i].fech +'</p>'+
												'<p><b>Dimensiones: </b>'+ data.datos[i].dimx +' x ' + 
												data.datos[i].dimy +' cm</p>'+
												'<p><b>Material: </b> '+ data.datos[i].material +' </p>'+
												'<p><b>Estado: </b> '+ data.datos[i].estado +' </p>'+
												'<p><b>Dirección: </b>'+ data.datos[i].dirusu +' </p>'+
												'<p><b>Telefono/Celular: </b>'+ data.datos[i].telusu +'</b> 	</p>'+
												'<p><b>Cédula: </b>'+ data.datos[i].cedusu + '</p>'+

											'</div>'+
											'<div class="exit"><button class="btn_exit" onclick="custom_deleted('+
											data.datos[i].id+')"><i class="fa fa-times"'+  'aria-hidden="true"></i></button></a></div>'+
										'</div>'+
									'</div>';
						}
					}
					
					document.getElementById("put_info2").innerHTML= html2;
					document.getElementById('total').innerHTML = precio;

				},
				error:function(err){
					console.error(err);
				}
			});//fin ajax
		});//fin funcion*/

		function deleted(parameter){
			var num = parameter;
			//alert(parameter);
			//return num;
			$.ajax({
  				type: "POST",
   				url: "services/pedido/eliminar.php",
    			data: { 'num' : num },
 				success: function(data){
    			}
			});
			location.reload();
			
		}
		function custom_deleted(parameter){
			var num = parameter;
			//alert(parameter);
			//return num;
			$.ajax({
  				type: "POST",
   				url: "services/pedido/eliminar_custom.php",
    			data: { 'num' : num },
 				success: function(data){
    			}
			});
			location.reload();
			
		}
		
	</script>
</body>
</html>
