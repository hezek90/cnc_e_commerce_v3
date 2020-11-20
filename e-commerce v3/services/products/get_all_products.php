<?php
include('../connection.php');

$response=new stdClass(); //crea un objeto génerico que se le puede añadir atributos

$datos=[]; #array
$i=0;

$sql="SELECT * FROM PRODUCTO WHERE estado=1"; 
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){ #vuelca los datos de la consulta como array, los itera hasta
	$obj = new stdClass(); // se crea un objeto generico
	$obj->codpro=$row['codpro']; // se le añaden los atributos igual a las filas de consultas 
	$obj->nompro=$row['nompro'];
	$obj->despro=$row['despro'];
	$obj->prepro=$row['prepro'];
	$obj->rutimapro=$row['rutimapro'];
	$datos[$i]=$obj; //se almacena el objeto en los array, cada fila un array 
	$i++;
}# se iteran hasta completar los datos de la consulta

$response->datos=$datos;
mysqli_close($con);
header('Content-Type: application/json');# para indicar que el resultado es del tipo json
echo json_encode($response);#mostrar la respuesta en formato json

?>