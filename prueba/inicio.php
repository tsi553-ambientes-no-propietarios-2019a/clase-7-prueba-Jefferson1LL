<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio</title>
</head>
<body style="align-content: center">

<header> 
            <h1>TiendasEC</h1>
            <h2 >Bienvenido</h2>
            <h2 >Nombre de la tienda: </h2>   
            <h4>Productos de la tienda: </h4>   
</header>

<div>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Codigo</th>
      <th scope="col">Nombre</th>
      <th scope="col">Tipo</th>
      <th scope="col">Stock</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
</div>
<a class="btn btn-primary" href="nuevo_producto.php" role="button">Registrar producto</a>
</body>
</html>

<?php
session_start();
if(!empty($_SESSION)){
$idtienda=$_SESSION['user'];
}else{
    header('Location: index.php');
    exit;
}


    $conn= new mysqli('localhost','root','','pruebab1');

    if ($conn->connect_error) {
        echo 'Error en la conexion '. $conn->connect_error;
    }

    $sql="select * from producto where idtienda='$idtienda'";
    $res=$conn->query($sql);
    

    if($conn->error){
        header('Location: index.php?error_message=Ocurrió un error: '.$conn->error);
        exit;
    }
    
            
        
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container">
<?php
echo 'Bienvenido ';
print_r($_SESSION['tienda']['user']);
echo '<br>Tienda: ';
print_r($_SESSION['tienda']['nomTienda']);?>
<center><h1>Productos</h1></center>
<div class="row">
    <div class="col-sm">
    <a href="nuevo_producto.php">Agregar nuevo producto</a>
    </div>
    <div class="col-sm">
    </div>
  </div>

    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Cod</th>
      <th scope="col">Nombre</th>
      <th scope="col">Tipo</th>
      <th scope="col">Cantidad en stock</th>
      <th scope="col">Precio</th>
    </tr>
  </thead>
  <tbody>
  <?php if ($res->num_rows> 0 ) {
        while($row=$res->fetch_assoc()) {?>
  <tr>
      <th scope="row"><?php print_r($row['Codigo']);?></th>
      <td><?php print_r($row['Nombre']); ?></td>
      <td><?php print_r($row['Tipo']); ?></td>
      <td><?php print_r($row['Cantidad']); ?></td>
      <td><?php print_r($row['Precio']); ?></td>
    </tr>
  <?php
        }
}else {
    echo 'No hay productos<br>';
    

}
  ?>
    
</table>

</div>
</body>
</html>