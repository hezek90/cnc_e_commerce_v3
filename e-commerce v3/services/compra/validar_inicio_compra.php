<?php
session_start();//activa las variables de sesión al logearse en una página
$response = new stdClass();


if (!isset($_SESSION['codusu'])){ //sí no existe un codigo de usuario iniciado en sesión
	$response->state=false;
	$response->detail="No está logeado";
	$response->open_login=true;
}else{
	include_once('../connection.php');
	$codusu=$_SESSION['codusu'];
	$dimx = $_POST['dimx'];
	$dimy = $_POST['dimy'];
	$mat = $_POST['material'];
	$codpro = $_POST['codpro'];
	$sql="INSERT INTO PEDIDO
	(codusu,codpro,fecped,estado,dirusuped,telusuped,cedusuped,dimx,dimy,material)
	VALUES
	($codusu,$codpro,now(),1,'','','',$dimx,$dimy,$mat)";
	$result=mysqli_query($con,$sql);

	if ($result) {
		$response->state=true;
		$response->detail="Producto agregado";
	}else{
		$response->state=false;
		$response->detail="No se pudo agregar producto. Intente más tarde";
	}
	mysqli_close($con);
}
header('Content-Type: application/json');# para indicar que el resultado es del tipo json
echo json_encode($response);#mostrar la respuesta en formato json
?>
