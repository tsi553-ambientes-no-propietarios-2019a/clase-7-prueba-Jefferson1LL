<?php
session_start();
if($_POST){
	if(isset($_POST['user'])&&
isset($_POST['pass']) &&  !empty($_POST['user']) && ($_POST['pass']) ){

     $user = $_POST['user'];
		$pass = $_POST['pass'];
		

        $sql="select * from tienda where user= '$user' and pass='$pass'";

        $res=$conn->query($sql);
        if ($res->num_rows> 0 ) {
            while ($row=$res->fetch_assoc()) {
                $_SESSION['tienda']=[
                'username'=>$row['username'],
              ];    
            }
            header('Location: inicio.php');
        }else {
            header('Location: index.php?error_message= Usuario o clave incorrectas!');
            exit;
        }
    }else{
        header('Location: index.php?error_message=Ingrese los datos!');
    }
}else{
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

        <header style="text-align: center"> 
            <h1>TiendasEC</h1>
            <h5 style="text-align: center">Tienda registrada correctamente, puede iniciar sesion</h5>  
        </header>

        <div>
        <h2 style="text-align: center">Iniciar sesion</h2>
        <div class="container" style="text-align: center">
                       
                    <form action="inicio.php" method="POST">
                        
                        <div class="form-group" style = "padding-bottom:10px">
                            <label for="Usuario" style = "padding-right: 80px">Usuario</label>
                            <input type="text" class="form-control" name="Usuario" required>
                        </div>
                        <div class="form-group" style = "padding-bottom:10px">
                            <label for="Contrasena" style = "padding-right: 58px">Contraseña</label>
                            <input type="password" class="form-control" name="Contrasena" required>
                        </div>
                        

                        

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">Ingresar</button>
                            <a class="btn btn-primary" href="registro_tienda.php" role="button">Registrar mi tienda</a>
                        </div>
                    </form>
                
        </div>
        </div>


    
</body>
</html>