<?php 
	$num = $_POST['num'];
	include_once('../connection.php');
	$del = "DELETE FROM PROCUSTOM WHERE idpro = {$num}";
	$qdel = mysqli_query($con,$del);
	
?>