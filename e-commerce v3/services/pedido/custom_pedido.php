<?php
include('../connection.php');

$response=new stdClass(); //crea un objeto génerico que se le puede añadir atributos

$sql2 = "UPDATE PROCUSTOM SET codusu=(SELECT codusu FROM USUARIO WHERE USUARIO.nomusu = PROCUSTOM.nomusu), 
telusu=(SELECT telusu FROM USUARIO WHERE USUARIO.nomusu = PROCUSTOM.nomusu), cedusu = (SELECT cedusu FROM USUARIO WHERE USUARIO.nomusu = PROCUSTOM.nomusu),dirusu=(SELECT dirusu FROM USUARIO WHERE USUARIO.nomusu = PROCUSTOM.nomusu)";

$update= mysqli_query($con,$sql2);

$datos=[]; #array
$i=0;

$sql="SELECT * FROM PROCUSTOM"; 

$result=mysqli_query($con,$sql);

while($row=mysqli_fetch_array($result)){ #vuelca los datos de la consulta como array, los itera hasta
	$obj = new stdClass(); // se crea un objeto generico
	$obj->id=$row['idpro'];
	$obj->nomusu=$row['nomusu'];
	$obj->nompro=$row['nompro'];
	$obj->imgpro=$row['imgpro'];
	$obj->dimx=$row['dimx'];
	$obj->dimy=$row['dimy'];
	$obj->material=$row['material'];
	$obj->precio=$row['precio'];
	$obj->estado=$row['estado'];
	$obj->fech=$row['fech'];
	$obj->telusu=$row['telusu'];
	$obj->dirusu=$row['dirusu'];
	$obj->cedusu=$row['cedusu'];
	$datos[$i]=$obj; //se almacena el objeto en los array, cada fila un array 
	$i++;
}# se iteran hasta completar los datos de la consulta


$response->datos=$datos;


mysqli_close($con);
header('Content-Type: application/json');# para indicar que el resultado es del tipo json
echo json_encode($response);#mostrar la respuesta en formato json

?>