<?php
$host = "localhost";
$user= "root";
$password= "";
$dbname="panama";

$conn = new mysqli("localhost", "root","","panama");
if ($conn->connect_error){
    die("Error al conectar en la base de datos.").$conn->connect_error;
}

$sql="SELECT*FROM usuarios";
$resultado = $conn->query($sql);

if($conn->error){
    die("Error al ejecutar la consulta".$conn->error);
}

while($fila=$resultado->fetch_assoc()){
    //imprimir datos en cada fila
    echo$fila["usuario"]." - ".$fila["contrasena"]."<br>"."<br>";
    echo$fila["nombre"]." - ".$fila["apellido"]."<br>"."<br>";
    echo$fila["empresa"]."<br>"."<br>";
    echo$fila["email"]."<br>"."<br>";
    echo$fila["telefono"];
    echo$fila["pais"]." - ".$fila["localidad"]."<br>"."<br>"."<br>"."<br>";
}

$conn->close();
?>