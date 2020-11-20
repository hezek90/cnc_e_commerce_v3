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
		.des{
			color: #aac;
			font-size: 24px;
			margin-bottom: 5px;
		}

		.numerito{
			width: 40px;
		}
		
		.submit{
			color: rgb(0, 128, 128);
			width: calc(100% - 11px);
		}


		.rad{
			width: 3%;
		}

		.pre{
			width: 8%;
		}


		form input{
			padding: 5px;
			margin: 5px 5px;
			width: calc(100% - 25px);
		}
		

		.btn b{
			color: #8b0000;
			font-size: 20px;
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
			<section>
				<div class="part1">
					<img id="put_img" src="">
				</div>
				<div class="part2">
					<div class="exit"><button class="btn_exit"><a href="index.php"><i class="fa fa-times" aria-hidden="true"></i></button></a></div>
					<h2 id="put_pro_name"></h2> 
					<h1 id="put_pro_price"></h4>
					<div class="des" id="put_pro_des"></div>

					<form  method="post" action="services/products/datos_pro.php" >
					<label class="mate">Dimensiones (ancho,altura) en cm: </label>
					<input type="number" max="30"  min="10" pattern="^[0-9]+" class="numerito" id="dimx" required="true" value="10"  
					name="dimx">
					<label> X </label>
					<input type="number" class="numerito" min="10" pattern="^[0-9]+" max="30" id="dimy"  required="true" value="10" name="dimy">
					<br>
					<input type="hidden" name="codpro" value="<?php echo $_GET["p"]; ?>">
					<label class="mate">Material:</label> 
  					<label> Madera MDF</label>
  					<input  type="radio" class="rad" onclick="update('madera')" name="material"  id="mat" checked required="true" value="madera">
 					<label> Acrílico</label>
 					<input type="radio" class="rad" onclick="update('acrilico')"  name="material" id="mat" value="acrilico">
 					<label> Vidrio</label>
 					<input type="radio" class="rad" onclick="update('vidrio')"  name="material" id="mat"  value="vidrio">
					
 					<div id="btn" class="btn"></div>

					</form>


					
				</div>
			</section>
			<div class="title-section">Nuestros Tallados a la venta </div>
			<div class="product-list" id="put_info">
			</div>
		</div>
	</div>

	<footer>
		<div class="info_footer"> e-mail: <a href="mailto:cnc3drouter@gmail.com">cnc3drouter@gmail.com </a>Dirección:<span> Cándido Zúnin Padilla 391 </span> Teléfono<span> 47721089</span> <a href="https://www.facebook.com/pages/category/E-commerce-Website/Cnc-tallados-personalizados-233915274690980/"> <div class="face"> <i class="fa fa-facebook-official" aria-hidden="true"></i></a></div> </div>
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
				document.getElementById("put_pro_price").innerHTML ='$UYU: '+ precio; 
				document.getElementById("btn").innerHTML ='<button class="button_buy"><i class="fa fa-shopping-cart"></i> Comprar</button>' ;
			}else{
				document.getElementById("btn").innerHTML ='<b>Las dimensiones deben ser mayores 10cm cada una y menores a 30cm cada una';
				document.getElementById("put_pro_price").innerHTML =''; 

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

		var p = '<?php echo $_GET["p"]; ?>'; //depositar en variable el parametro
		
		$(document).ready(function(){//llamar a la funcion al iniciar
			$.ajax({ 
				url: 'services/products/get_all_products.php',
				type: 'POST',
				data:{},
				success:function(data){
					console.log(data);
					let html = '';
					for (var i = 0; i < data.datos.length; i++) { //rellenar los datos con la db
						if(data.datos[i].codpro == p){ //si el parametro es igual al codpro:
							document.getElementById("put_img").src = "images/"+data.datos[i].rutimapro 
							document.getElementById("put_pro_name").innerHTML = data.datos[i].nompro
							document.getElementById("put_pro_des").innerHTML = data.datos[i].despro 
							
						}

						html += 
						'<div class="product-box">'+
							'<a href="product.php?p='+ data.datos[i].codpro +'">'+
								'<div class="product">'+
									'<img src="images/'+ data.datos[i].rutimapro +'">'+
									'<div class="detail-title">'+ data.datos[i].nompro +'</div>'+
									'<div class="detail-description">'+ data.datos[i].despro +'</div>'+
								'</div>'+	
							'</a>'+
						'</div>';
					}
					document.getElementById("put_info").innerHTML= html;
				},
				error:function(err){
					console.error(err);
				}
			});//fin ajax
		});//fin funcion

		
	</script>
</body>
</html>
