<?php
include("conexion.php");
$nombre = mysqli_real_escape_string($conexion,$_POST['nombre']);
$correo = mysqli_real_escape_string($conexion,$_POST['correo']);
$usuario = mysqli_real_escape_string($conexion,$_POST['usuario']);
$pass = mysqli_real_escape_string($conexion,$_POST['pass']);
$passr = mysqli_real_escape_string($conexion,$_POST['passr']);
if($pass == $passr){
    $pass_encriptada = sha1($pass);
    $sqlUsuario = "SELECT id FROM usuarios WHERE usuario = '$usuario'";
$resultadoUsuario = $conexion->query($sqlUsuario);
$filas = $resultadoUsuario->num_rows;
if ($filas > 0) {
    echo "<script>
            alert('El usuario ya existe');
            window.location = 'index.php';
        </script>";
}else{
    $sqlInsertUser = "INSERT INTO usuarios (nombre,correo,usuario,clave) VALUES ('$nombre','$correo','$usuario','$pass_encriptada')";
    $resUsuario = $conexion->query($sqlInsertUser);
    if($resUsuario > 0){
        echo "<script>
            alert('Registro exitoso');
            window.location = 'index.php';
        </script>";
    }else{
        echo "<script>
            alert('Encontré un error intenta nuevamente');
            window.location = 'index.php';
        </script>";
    }

}
}else{
    echo "<script>
            alert('Las contraseñas no coinciden');
            window.location = 'index.php';            
        </script>";
}







?>

