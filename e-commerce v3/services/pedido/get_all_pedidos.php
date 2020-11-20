<?php
include('../connection.php');

$response=new stdClass(); //crea un objeto génerico que se le puede añadir atributos

function totextinho($par){
	switch ($par) {
		case '1':
			return 'Por procesar';
			break;

		case '2':
			return 'Por pagar';
			break;

		default:
			# code...
			break;
	}
}
$datos=[]; #array
$i=0;

$sql2 = "UPDATE PEDIDO SET dirusuped=(SELECT dirusu FROM USUARIO WHERE USUARIO.codusu = PEDIDO.codusu), 
telusuped=(SELECT telusu FROM USUARIO WHERE USUARIO.codusu = PEDIDO.codusu), cedusuped = (SELECT cedusu FROM USUARIO WHERE USUARIO.codusu = PEDIDO.codusu)";

$update= mysqli_query($con,$sql2);

$sql="SELECT * FROM PEDIDO ped inner join PRODUCTO pro on ped.codpro=pro.codpro where ped.estado=1"; //inner join unir tablas
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){ #vuelca los datos de la consulta como array, los itera hasta
	$obj = new stdClass(); // se crea un objeto generico
	$obj->codusu=$row['codusu'];
	$obj->codped=$row['codped'];// se le añaden los atributos igual a las filas de consultas 
	$obj->codpro=$row['codpro']; 
	$obj->nompro=$row['nompro'];
	$obj->fecped=$row['fecped'];
	$obj->material=$row['material'];
	$obj->dimy=$row['dimy'];
	$obj->dimx=$row['dimx'];
	$obj->dirusuped=$row['dirusuped'];
	$obj->telusuped=$row['telusuped'];//por si hay carácteres no soportados (ñ,´,etc) utf-8encode()
	$obj->precio=$row['precio'];
	$obj->rutimapro=$row['rutimapro'];
	$obj->estado= totextinho($row['estado']);
	$obj->cedusuped=$row['cedusuped'];
	$datos[$i]=$obj; //se almacena el objeto en los array, cada fila un array 
	$i++;
}# se iteran hasta completar los datos de la consulta


$response->datos=$datos;


mysqli_close($con);
header('Content-Type: application/json');# para indicar que el resultado es del tipo json
echo json_encode($response);#mostrar la respuesta en formato json

?>
