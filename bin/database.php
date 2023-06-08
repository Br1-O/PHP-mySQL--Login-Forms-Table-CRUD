<?php
$host = "localhost";
$user= "root";
$password= "";
$dbname="panama";

$conn = new mysqli("localhost", "root","","panama");
if ($conn->connect_error){
    die("Error al conectar en la base de datos.").$conn->connect_error;
}

$sql="SELECT*FROM empresas";
$resultado = $conn->query($sql);

if($conn->error){
    die("Error al ejecutar la consulta".$conn->error);
}

while($fila=$resultado->fetch_assoc()){
    //imprimir datos en cada fila
    echo$fila["nombre"]." - ".$fila["servicio"]."<br>";
    echo$fila["responsable"]." - ".$fila["telefono"]."<br>";
    echo$fila["pagina"]."<br>";
    echo$fila["comentarios"]."<br>";
    echo$fila["fecha_inicio"]." - ".$fila["fecha_cierre"]."<br>";
    ;
}

$conn->close();
?>

