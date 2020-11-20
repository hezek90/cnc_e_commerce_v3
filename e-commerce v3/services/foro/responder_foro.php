<?php 
	session_start();


	if(isset($_SESSION['codusu'])){
		$respuesta = $_POST['respuesta'];
		$user = $_SESSION['nomusu'];
		include('../connection.php');
		$id = $_GET['id'];
		$sqli = " INSERT INTO FORO (author, title, msj, fech, resp, identifier) VALUES 
		('$user','','$respuesta',now(),1,$id)";
		$consultar = mysqli_query($con,$sqli);
		header('Location: ../../ver_foro.php?id='.$id);


	}
	else{
		echo "<script type='text/javascript'> alert('Debe iniciar sesión para usar esta modalidad');
		window.location.href='../../login.php'; </script>";
	}

	
?>