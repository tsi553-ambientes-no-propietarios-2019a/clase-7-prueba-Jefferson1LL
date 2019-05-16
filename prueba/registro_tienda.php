<?php 
include('php/utils.php');
if($_POST){
    if(isset($_POST['nomTienda']) && isset($_POST['user'])
            && isset($_POST['pass']) && isset($_POST['pass2'])
			&&  !empty($_POST['nomTienda']) && !empty($_POST['user']) 
			&& !empty($_POST['pass']) && !empty($_POST['pass2']) ){

         $nomTienda = $_POST['nomTienda'];
		$user = $_POST['user'];
        $pass = $_POST['pass'];
        $pass2 = $_POST['pass2'];
   
        if ($pass==$pass2) {
            $conn= new mysqli('localhost','root','','prueba1');

            $sql="insert into tienda(nomTienda,user,pass,pass2) values('$nomTienda','$user','$pass','$pass2')";
            $conn->query($sql);
            if($conn->error){
                header("Location: registro_tienda.php?error_message=El usuario $user ya existe!");
                exit;
            }else {
                header('Location: index.php?successful_message=Tienda registrada correctamente, puede iniciar sesión.');
                exit;
            }
        }else {
            header('Location: registro_tienda.php?error_message=Las contraseñas no coinciden!');
            exit;
        }

    }else {
        header('Location: registro_tienda.php?error_message=Ingrese todos los datos');
        exit;
    }
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

        <header style="text-align: center"> <h1>TiendasEC</h1></header>

        <div>
        <h2 style="text-align: center">Registro de tienda</h2>
        <div class="container" style="text-align: center">
                       
                    <form action="index.php" method="POST">
                        <div class="form-group" style = "padding-bottom:10px">
                            <label for="Nombre_tienda" style = "padding-rigth: 5px">Nombre de la tienda</label>
                            <input type="text" class="form-control" name="Nombre_tienda" required>
                        </div>
                        <div class="form-group" style = "padding-bottom:10px">
                            <label for="Usuario" style = "padding-right: 80px">Usuario</label>
                            <input type="text" class="form-control" name="Usuario" required>
                        </div>
                        <div class="form-group" style = "padding-bottom:10px">
                            <label for="Contrasena" style = "padding-right: 58px">Contraseña</label>
                            <input type="password" class="form-control" name="Contrasena" required>
                        </div>
                        <div class="form-group" style = "padding-bottom:10px">
                            <label for="Confi_contrasena" style = "padding-right: 10px">Repetir contraseña</label>
                            <input type="password" class="form-control" name="Confi_contrasena" required>
                        </div>


                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">registrar</button>
                        </div>
                    </form>
                
        </div>
        </div>


    
</body>
</html>