<?php 
	$num = $_POST['num'];
	include_once('../connection.php');
	$del = "DELETE FROM PEDIDO WHERE codped ={$num}";
	$qdel = mysqli_query($con,$del);
	
?>