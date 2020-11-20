<?php
include('connection.php');
$emausu = $_POST["emausu"];//recibir variable de entrada desde el form /public_html/login.php
$sql = "SELECT * FROM USUARIO WHERE emausu='$emausu'";
$result= mysqli_query($con,$sql);

if ($result){
	console.log($result);
	$row = mysqli_fetch_array($result);
	$count = mysqli_num_rows($result); //cuenta los resultados de la consulta, si es 0 el mail no existe
	if ($count != 0){
		$pass = $_POST['pasusu'];
		$pasusu = sha1($pass);

		if ($row['pasusu']!=$pasusu){
			//3 Contraseña incorrecta
			header('Location: ../login.php?e=3');
		}
		else{
			session_start();
			$_SESSION['codusu'] = $row['codusu'];
			$_SESSION['emausu'] = $row['emausu'];
			$_SESSION['nomusu'] = $row['nomusu'];
			header('Location: ../');

		}
	}
	else{
		//2 Email inválido
		header('Location: ../login.php?e=2');
	}
}	
else{
		//1 Error de conexión
	header('Location: ../login.php?e=1');
}

?>