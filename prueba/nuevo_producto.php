<?php 
session_start();
if($_POST) {
    if (isset($_POST['codigo']) && isset($_POST['nombre']) &&
        isset($_POST['tipo']) && isset($_POST['stock']) && isset($_POST['precio']) 
    && !empty($_POST['codigo']) && !empty($_POST['nombre']) 
    && !empty($_POST['tipo']) && !empty($_POST['stock']) && !empty($_POST['precio'])) {

        $codigo = $_POST['codigo'];
        $nombre = $_POST['nombre'];
        $tipo = $_POST['tipo'];
        $stock = $_POST['stock'];
        $precio = $_POST['precio'];
        

        $conn = new mysqli('localhost', 'root', '', 'prueba1');

        if($conn->connect_error){
            echo 'Error repita contraseña o usuario' . $connect->error;
        }else{
            echo 'conexion exitosa';
        }

		$sql_insert = "INSERT INTO productos
		(codigo, nombre, tipo, stock, precio)
		VALUES ('$codigo', '$nombre','$tipo', '$stock', '$precio')";
		echo $sql_insert;
		$conn->query($sql_insert);
		if ($conn->error) {
			echo 'Ocurrió un error ' . $conn->error;
		} else {
			redirect('nuevo_producto.php');
		}
	} else {
		header('Location: nuevo_producto.php.php?error_message=Ingrese todos los datos!');
		exit;
	}
} else {
	header('Location: nuevo_producto.php');
	exit;
}
?>

<!DOCTYPE html>
<html>
<head>
   <tittle>TIENDASeC</tittle>

</head>
<body>
	
	<h1>Resgistro de productos</h1>

<form  method="post" >

<input type="text" name ="codigo" >
<input type ="text" name ="nombre">
<input type ="text" name="tipo">
<input type="password"  name="stock">
<input type="password"  name="precio">
<button>Resgitrar</button>


</form>
</body>
</html>