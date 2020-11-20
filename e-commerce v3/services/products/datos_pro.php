<?php 
	include('../connection.php');
	
	session_start();
	
	if (isset($_SESSION['codusu'])){
		$codpro = $_POST['codpro'];
		$dimx = $_POST['dimx'];
		$dimy = $_POST['dimy'];
		$mat = $_POST['material'];
		$codusu=$_SESSION['codusu'];
		$precio = 315.00;
		$area = $dimx * $dimy;
		$precio = $precio + ($area * 0.35 );

		
		if ($mat == 'vidrio'){
			$precio = $precio + 50;
		}elseif ($mat == 'acrilico' ) {
			$precio = $precio + 100;
		}



		$sql = "INSERT INTO PEDIDO (codusu,codpro,fecped,estado,dirusuped,telusuped,cedusuped,
		dimx,dimy,material,precio,rutimaped)
		VALUES
		('$codusu','$codpro',now(),1,'','','','$dimx','$dimy','$mat','$precio','')";
		$query = mysqli_query($con,$sql);



		$upd = "UPDATE PEDIDO SET rutimaped=(SELECT rutimapro FROM PRODUCTO WHERE PRODUCTO.codpro = PEDIDO.codpro)";
		$update = mysqli_query($con,$upd);

		$upd2 = "UPDATE PEDIDO SET 
		dirusuped=(SELECT dirusu FROM USUARIO WHERE USUARIO.codusu = PEDIDO.codusu),
		telusuped=(SELECT telusu FROM USUARIO WHERE USUARIO.codusu = PEDIDO.codusu),
		cedusuped=(SELECT cedusu FROM USUARIO WHERE USUARIO.codusu = PEDIDO.codusu)";

		$update2 = mysqli_query($con,$upd2);

		if($query && $update && $update2){
			echo "<script type='text/javascript'> alert('Agregado al carrito');
		window.location.href='../../product.php?p=$codpro'; </script>";
		}
	
	}else{
		echo "<script type='text/javascript'> alert('Debe iniciar sesión');
		window.location.href='../../login.php'; </script>";
	}

?>