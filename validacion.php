<?php
include("conexion.php");

session_start();
        if (isset($_SESSION['id_usuario'])) {
            header("Location: index.php");
        }
$usuario = mysqli_real_escape_string($conexion,$_POST['usuario']);
$pass = mysqli_real_escape_string($conexion,$_POST['pass']);
$pass_encriptada = sha1($pass);


if(!empty($usuario) && !empty($pass_encriptada)){
    $sql = "SELECT id FROM usuarios WHERE usuario = '$usuario' AND clave = '$pass_encriptada'";
    $resultado = $conexion->query($sql);
    $rows = $resultado->num_rows;
    if ($rows >0) {
        $row = $resultado->fetch_assoc();
        $_SESSION['id_usuario'] = $row["id"];
        header("Location: admin.php");
    }else{
        echo "<script>
            alert('El usuario o la contraseña son incorrectos');
            window.location = 'index.php';
        </script>";
    }
}






?>