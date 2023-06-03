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


$conn = new mysqli("127.0.0.1", "root","","panama");
if ($conn->connect_error){
    die("Error al conectar en la base de datos.").$conn->connect_error;
}


// Consulta INSERT
$sql = "INSERT INTO empresas (nombre, servicios, responsable, telefono, pagina, comentarios, fecha_inicio, fecha_cierre) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

// Prepare la consulta
$prep = $conn->prepare($sql);

// Bind los parámetros
$prep->bind_param("ssssssss", $nombre, $servicios, $responsable, $telefono, $pagina, $comentarios, $fecha_inicio, $fecha_cierre);

// Ejecutar la consulta
if ($prep->execute()) {


    echo '<script type="text/javascript">';
    echo 'alert("' ."Registro insertado correctamente.". '");';
    echo 'setTimeout(function() {';
    echo '  window.location.href = "../panamaHTML.html";';
    echo '}, 500);';  
    echo '</script>';

    exit;
} else {
    echo "Error al insertar el registro: " . $prep->error;
}

// Cerrar la conexión
$prep->close();
$conn->close();



//create table empresas (id int auto_increment PRIMARY KEY, nombre VARCHAR(255), servicios VARCHAR(255), responsable VARCHAR(255), telefono VARCHAR(255), pagina VARCHAR(255), comentarios longtext, fecha_inicio date, fecha_cierre date); 


?>
