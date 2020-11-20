<?php 
	session_start();
	
	$msj = $_POST['message'];
	$title = $_POST['title'];
	$author = $_SESSION['nomusu'];		

	include('../connection.php');

	$sql="INSERT INTO FORO (author, title, msj, fech, resp, identifier) VALUES ('$author','$title',
	'$msj',now(),0,0)";

	$result = mysqli_query($con,$sql);

	header('Location: ../../foro.php');

	
?>

