<?php
require 'conexion_db.php';
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$query = "SELECT COUNT(*) as contar,id,name from Users where email = '$email' and password = '$password'";

$bdconect = mysqli_query($conexion,$query);
$parametros = mysqli_fetch_array($bdconect);

$id = $parametros['id'];
$name = $parametros['name'];

if($parametros['contar']>0){
    $_SESSION['email'] = $email;
    $_SESSION['id'] = $id;
    $_SESSION['name'] = $name;
    header("location: ../actividades_View.php");

}else {

    echo "<script>alert('Contraseña incorrecta o usuario no existe.');</script>";

    echo "<a href='../login_View.php'>";
        echo "<button>Volver</button>";
            echo "</a>";


}