<?php
session_start();
 if ($_POST) {
	if(isset($_POST['Codigo']) &&isset($_POST['Nombre'])&&isset($_POST['Tipo'])&&isset($_POST['Cantidad']) 
	&&isset($_POST['Precio'])&& !empty($_POST['Codigo']) && !empty($_POST['Nombre']) && !empty($_POST['Tipo']) 
	&& !empty($_POST['Cantidad'])&&!empty($_POST['Precio'])){
        
        $Codigo=$_POST['Codigo'];
        $Nombre=$_POST['Nombre'];
        $Tipo=$_POST['Tipo'];
        $Cantidad=$_POST['Cantidad'];
        $Precio=$_POST['Precio'];
        
            $conn= new mysqli('localhost','root','','prueba1');
            $sql="insert into producto(Codigo,Nombre,Tipo,Cantidad,Precio) values('$Codigo','$Nombre','$Tipo','$Cantidad','$Precio')";
            $conn->query($sql);
            if($conn->error){
                header("Location: nuevo_producto.php?error_message=$conn->error");
                exit;
            }else {
                header('Location: inicio.php?successful_message=Prducto registrado exitosamente!');
                exit;
            }
        

    }else {
        header('Location: nuevo_producto.php?error_message=Por favor,llene todos los datos');
        exit;
    }
}
?>


<!DOCTYPE html>
<html>
	<head>
		<title>Registro Producto</title>
	</head>
	<body>
		<center>
			<h2>Registro de Producto</h2>
			<form action="inicio.php" method="POST" >
				<div class="jumbotron">
					
					<input type="text" name="codigo" placeholder="Ingrese un codigo"><br><br>
					
					<input type="text" name="nombre" placeholder="Nombre del producto" required="required"><br><br>

                    <input type="text" name="Tipo" placeholder="Tipo de producto" required="required"><br><br>

					<br>
					
					<input type="password" name="clave2" placeholder="Ingrese de nuevo la Contraseña" required="required"><br><br>

				<button type="submit" >Registrar</button>
				</div>
			</form>
		</center>
	</body>
</html>