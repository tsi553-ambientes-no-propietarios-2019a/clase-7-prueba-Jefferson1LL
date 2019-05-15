<?php
session_start();
print_r($_SESSION['tienda']);
?>

<!DOCTYPE html>
<html>
<head>
	<tittle>TIENDA_EC</tittle>
</head>
<body>

	<h1>BIENVENIDO<?php echo $_SESSION['tienda']['username']; ?></h1>



    <a href="nuevo_producto.php">Registrar nuevo producto</a>
</body>
</html>