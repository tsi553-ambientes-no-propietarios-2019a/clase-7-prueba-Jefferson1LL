<?php 

session_start();

if($_POST){
 if(isset($_POST['username']) && isset($_POST['password']) && 
 !empty($_POST['username']) && !empty($_POST['password']) ){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $conn = new mysqli('localhost', 'root', '', 'prueba1');

    if($conn->connect_error){
        echo 'Error repita contraseña o usuario' . $connect->error;
    }else{
        echo 'conexion exitosa';
    }

    $sql_insert = "SELECT * FROM tienda WHERE username = '$username' 
    AND password=MD5('$password')";

    $res = $conn->query($sql);

    if($conn->error){
        redirect('index.php?error_message=Ocurrio un error: ' . $conn->error);
    }
    if($res->num_rows = 0){
        while ($row = $res->fetch_assoc()){
            $_SESSION['user'] = [
                'username' => $row['
                username'],
                'id' => $row['id']
             ];
            redirect('inicio.php');
        }
    }else{
        redirect('index.php?error_message=Usuario o clave incorrecta');
    }
}else{
    redirect('index.php?error_message=Ingrese todos los datos');
}

}else{
    
}

?>

<!DOCTYPE html>
<html>
<head>
<center>

</head>
<body>
	
	<h1>Resgistro de usuarios</h1>

<form  method="post" action="inicio.php">
<label>Usuario</label>
<input type ="text" name="username" >
<br>
<br>
<label>Contraseña</label>
<input type="password"  name="password"> 
<br>
<br>
<button>Resgitrarme</button> 
<a href="registro_tienda.php">Registrar mi tienda</a>

</form>
</center>
</body>
</html>