<?php 
session_start();
if($_POST) {
    if (isset($_POST['nomTienda']) && isset($_POST['direccion']) &&
        isset($_POST['username']) && isset($_POST['password']) 
    && !empty($_POST['nomTienda']) && !empty($_POST['direccion']) 
    && !empty($_POST['username']) && !empty($_POST['password'])) {

        $nomTienda = $_POST['nomTienda'];
        $direccion = $_POST['direccion'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        

        $conn = new mysqli('localhost', 'root', '', 'prueba1');

        if($conn->connect_error){
            echo 'Error repita contraseña o usuario' . $connect->error;
        }else{
            echo 'conexion exitosa';
        }

		$sql_insert = "INSERT INTO tienda
		(nomTienda, direccion, username, password)
		VALUES ('$nomTienda', '$direccion','$username', MD5('$password'))";
		echo $sql_insert;
		$conn->query($sql_insert);
		if ($conn->error) {
			echo 'Ocurrió un error ' . $conn->error;
		} else {
			redirect('index.php');
		}
	} else {
		header('Location: registro_tienda.php?error_message=Ingrese todos los datos!');
		exit;
	}
} else {
	header('Location: registro_tienda.php');
	exit;
}
?>

<!DOCTYPE html>
<html>
<head>
   <tittle>TIENDASeC</tittle>

</head>
<body>
	
	<h1>Resgistro de tienda</h1>

<form  method="post" action="index.php">

<input type="text" name ="nomTienda">
<input type ="text" name ="direccion">
<input type ="text" name="username">
<input type="password"  name="password">
<button>Resgitrar</button>


</form>
</body>
</html>