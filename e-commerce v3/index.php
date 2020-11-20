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
		<div class="title-section new"><b>Tallados personalizados a buen precio</b></div>
		<div class="banner"> <div class="banner_text"></div></div>
		<div class="content-page">
			<div class="title-section">Nuestros Tallados a la venta </div>
			<div class="product-list" id="put_info">
			</div>
		</div>
	</div>

	<footer>
		<div class="info_footer"> e-mail: <a href="mailto:cnc3drouter@gmail.com">cnc3drouter@gmail.com </a>Dirección:<span> Cándido Zúnin Padilla 391 </span> Teléfono<span> 47721089</span> <a href="https://www.facebook.com/pages/category/E-commerce-Website/Cnc-tallados-personalizados-233915274690980/"> <div class="face"> <i class="fa fa-facebook-official" aria-hidden="true"></i></a></div> </div>
	</footer>

	<script type="text/javascript">
		//alert('En mantenimiento ');
		$(document).ready(function(){//llamar a la funcion al iniciar
			$.ajax({ 
				url: 'services/products/get_all_products.php',
				type: 'POST',
				data:{},
				success:function(data){
					console.log(data);
					let html = '';
					for (var i = 0; i < data.datos.length; i++) {
						html += 
						'<div class="product-box">'+
							'<a href="product.php?p='+data.datos[i].codpro+'">'+
								'<div class="product">'+
									'<img src="images/'+ data.datos[i].rutimapro +'">'+
									'<div class="detail-title">'+ data.datos[i].nompro +'</div>'+
									'<div class="detail-description">'+ data.datos[i].despro +'</div>'+
									'<div class="detail-price"><b>$UYU:  <span>+ '+data.datos[i].prepro+
									'<span></b></div>'+
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