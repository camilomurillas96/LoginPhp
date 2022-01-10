<?php
include("conexion.php");
session_start();
if (!isset($_SESSION['id_usuario'])) {
    header("Location: index.php");
}
$idUsuario = $_SESSION['id_usuario'];
$sql = "SELECT id,nombre FROM usuarios WHERE id = '$idUsuario'";
$resultado = $conexion->query($sql);
$row = $resultado->fetch_assoc();

/*     function Curl( $url)
{

	$ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
  curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.2; WOW64; rv:27.0) Gecko/20100101 Firefox/27.0.1");
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_TIMEOUT, 10);


  $output = curl_exec( $ch);
  $error = curl_errno($ch);

  return( $output); 

}


$url = "https://jsonplaceholder.typicode.com/posts";

$json = Curl( $url);

echo ($json);*/

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container fondo">
        <div class="text-center">
        <h1>Bienvenido <?php echo utf8_decode($row['nombre']); ?></h1>        
        </div>
        
        <a href="salir.php" class="btn btn-danger">Salir</a>
        
        
    </div>


</body>

</html>