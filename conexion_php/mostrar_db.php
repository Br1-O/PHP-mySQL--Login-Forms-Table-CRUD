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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Listado de Empresas</title>
</head>

<body background: "linear-gradient(to bottom, #8d8de3, #a874cd)"  bgcolor="#2C62D4">

    <table border="4"; bgcolor="#9ccbdcF5"; text-align:"center";  border-color:"#389ee0";>
        <!-- <Tr>
            <th>Nombre</Th>
            <Th>Servicios</Th>
            <Th>Responsable</Th>
            <Th>Telefono</Th>
            <Th>Pagina</Th>
            <Th>Comentarios</Th>
            <Th>Fecha de Inicio</Th>
            <Th>Fecha de Cierre</Th>
        </Tr> -->
    
</body>
</html>

<?php

while($fila=$resultado->fetch_assoc()){

    //imprimir datos en cada fila
    echo"</head><Tr><Td rowspan ='8' bgcolor='#D3e6f7'>".$fila["nombre"]."</Td>"."<Tr><th>Servicios</Th><Td>".$fila["servicios"]."</Td></Tr>";
    echo"<Th>Responsable</Th><Td>".$fila["responsable"]."</Td><Tr><Th>Telefono</Th><Td>".$fila["telefono"]."</Td></Tr>";
    echo"<Tr><Th>Pagina</Th><Td>".$fila["pagina"]."</Td></Tr>";
    echo"<Tr><Th>Comentarios</Th><Td>".$fila["comentarios"]."</Td></Tr>";
    echo"<Tr><Th>Fecha de Inicio</Th><Td>".$fila["fecha_inicio"]."</Td></Tr><Tr><Th>Fecha de Cierre</Th><Td>".$fila["fecha_cierre"]."</Td></Tr>";
}

$conn->close();

?>

