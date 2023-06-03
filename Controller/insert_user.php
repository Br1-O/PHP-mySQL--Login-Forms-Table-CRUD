<?php

include 'class_User.php';

if($_POST){

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
}else{
    header('Location:../View/login.html');
}

///////////////////////////////////////Instance of User///////////////////////////////////////////////

$user= new User($usuario,$hashed_password,$nombre,$apellido,$empresa,$email,$telefono,$pais,$localidad);

$user->insert();

/////////////////////////////////////////////////////////////////////////////////////

if(empty(trim($nombre))) $nombre = 'anonimo';
if(empty(trim($apellido))) $apellido = ' ';

$body="
    <h1> ¡Un nuevo usuario se ha registrado! </h1>
    <p> De: $nombre $apellido / $email </p>
    <h2> » Los datos de $nombre son: </h2>
    <ul>
        <li>$usuario</li>

        <li>$nombre</li>
        <li>$apellido</li>
        <li>$empresa</li>
        <li>$email</li>
        <li>$telefono,</li>
        <li>$pais</li>
        <li>$localidad</li>
    </ul>";

/////////////////////////////////////Usando mail() function/////////////////////////////////////////////////////////



// $to = 'bruno.ortuno2@gmail.com';
// $subject = '¡Nuevo usuario registrado!';
// $header = "From: $nombre $apellido | $email";

// if (mail($to, $subject, $body, $header)) {
//     echo 'Email sent successfully.';
// } else {
//     echo 'Email could not be sent.';
// }


/////////////////////////////////////////////PHPMailer/////////////////////////////////////////////////

// require 'PHPMailer/src/PHPMailer.php';
// require 'PHPMailer/src/Exception.php';

// use PHPMailer\PHPMailer\PHPMailer;

// $mailer= new PHPMailer();
// $mailer->setFrom($email, "$nombre $apellido");
// $mailer->addAddress('bruno.ortuno2@gmail.com', 'Bruno');
// $mailer->Subject="Usuario agregado a la base de datos";
// $mailer->msgHTML($body);
// $mailer->AltBody=strip_tags($body);
// $rta= $mailer->send();
// var_dump($rta);

// if($rta){
//     echo "¡Usuario registrado correctamente!";
// }else{
//     echo "Algo salió mal. Por favor, volver a intentarlo";
// }




?>
