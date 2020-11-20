<?php

	include('connection.php');

	$email = $_POST['emausu'];
	$pass = $_POST['pasusu'];
	$dir = $_POST['dir'];
	$tel = $_POST['tel'];
	$cit = $_POST['citusu'];
	$nom = $_POST['nomusu'];
	$ape = $_POST['apeusu'];
	$cedusu = $_POST['ced'];

	if(buscarepetido($email,$con)==1){
		echo 2;
	}else{
		$password = sha1($pass);

		$insql = "INSERT INTO USUARIO (nomusu,apeusu,emausu,pasusu,dirusu,telusu,citusu,estado,cedusu) 
		VALUES ('$nom','$ape','$email','$password','$dir','$tel','$cit',1,'$cedusu')";

		$result = mysqli_query($con,$insql);
	}
	

	function buscarepetido($usumail,$con){
		$sql = "SELECT * from USUARIO where emausu='$usumail'";
		$result = mysqli_query($con,$sql);

		if(mysqli_num_rows($result) > 0){ //si hay algun registro de coincidencia
			return 1;
		}else{
			return 0;
		}

	}

	if ($result){
		$var = "Usuario registrado con éxito";
		echo "<script> alert('".$var."'); </script>";
		echo "<meta http-equiv='refresh' content='0;url=../login.php'>";
	}
	else{
		$var = "Fallo al registrar usuario";
		echo "<script> alert('".$var."'); </script>";
		echo "<meta http-equiv='refresh' content='0;url=../registro.php'>";
	}



?>