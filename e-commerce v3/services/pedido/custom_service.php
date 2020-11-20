<?php  

include('../connection.php');

session_start();

if(isset($_SESSION['codusu'])){
	$product = $_POST['product'];
	$user = $_SESSION['nomusu'];
	$codusu = $_SESSION['codusu'];
	$nameimg = $_FILES['img']['name'];
	$archivo = $_FILES['img']['tmp_name'];
	$mat = $_POST['material'];
	$pre = 350.00;
	$dimx = $_POST['dimx'];
	$dimy = $_POST['dimy'];
	$path = "images";
	$area = $dimx * $dimy;
	$pre = $pre + ($area * 0.35 );
		
	if ($mat == 'vidrio'){
		$pre = $pre + 50;
	}elseif ($mat == 'acrilico' ) {
		$pre = $pre + 100;
	}

	$sqid="SELECT idpro FROM PROCUSTOM";

	if ($resultado=mysqli_query($con,$sqid)){ //si es posible la consulta
		while ($fila = mysqli_fetch_row($resultado)){
			$id = $fila[0];
		}  
	}
	if (exif_imagetype($archivo) == IMAGETYPE_PNG || exif_imagetype($archivo) == IMAGETYPE_JPEG && filesize($archivo) <= 3000000) {
   	 	$path = $path."/".$user.$id."n:".$nameimg;
		move_uploaded_file($archivo,$path);

		$sql = "INSERT INTO PROCUSTOM (nompro, imgpro, dimx, dimy, nomusu,material,fech,precio,
		estado,dirusu,telusu,codusu,cedusu) VALUES('$product','$path','$dimx','$dimy','$user','$mat',now()
		,'$pre',DEFAULT,'','',$codusu,0)";

		$go = mysqli_query($con,$sql);
		
		if($go){
			echo "<script type='text/javascript'> alert('Enviado con éxito');
			window.location.href='../../send_custom_pro.php';	</script>";
		}else{
			echo "<script type='text/javascript'> alert('Error,reportélo en el foro de discusiones');
			window.location.href='../../foro.php';</script>";
		}

	}
	else{
		echo "<script type='text/javascript'> alert('Respete el formato solicitado');
		window.location.href='../../send_custom_pro.php'; </script>";
	}
	
}else{
	echo "<script type='text/javascript'> alert('Debe iniciar sesión para usar esta modalidad');
		window.location.href='../../login.php'; </script>";
}


?>