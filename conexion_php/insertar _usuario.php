<?php


if ($_POST) {

    $usuario=$_POST["usuario"];
    $password=$_POST["contraseña"];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $nombre=$_POST["nombre"];
    $apellido=$_POST["apellido"];
    $empresa=$_POST["empresa"];
    $email=$_POST["email"];
    $telefono=$_POST["telefono"];
    $pais=$_POST["pais"];
    $localidad=$_POST["localidad"];
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
$sql = "INSERT INTO usuarios (usuario, contrasena, nombre, apellido, empresa, email, telefono, pais, localidad) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

$prep = $conn->prepare($sql);

$prep->bind_param("sssssssss", $usuario,$hashed_password,$nombre,$apellido,$empresa,$email,$telefono,$pais,$localidad);

// Ejecutar la consulta
if ($prep->execute()) {

    echo '<script type="text/javascript">';
    echo 'alert("' ."Usuario creado correctamente.". '");';
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

?>
