<?php


if ($_POST) {

    $nombre=$_POST["nombre"];
    $servicios=$_POST["servicios"];
    $responsable=$_POST["responsable"];
    $telefono=$_POST["telefono"];
    $pagina=$_POST["pagina"];
    $comentarios=$_POST["comentarios"];
    $fecha_inicio=$_POST["fecha_inicio"];
    $fecha_cierre=$_POST["fecha_cierre"];
}

//////////////////////////////////////////////////////////////////////////////////////


$host = "localhost";
$user= "root";
$password= "";
$dbname="panama";

$conn = new mysqli("localhost", "root","","panama");
if ($conn->connect_error){
    die("Error al conectar en la base de datos.").$conn->connect_error;
}

$conn->close();

?>