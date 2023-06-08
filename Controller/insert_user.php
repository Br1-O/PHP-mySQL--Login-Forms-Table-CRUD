<?php

include '../Model/classes/class_User.php';

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
    header('Location:../View/login.php');
}

///////////////////////////////////////Instance of User///////////////////////////////////////////////

$user= new User($usuario,$hashed_password,$nombre,$apellido,$empresa,$email,$telefono,$pais,$localidad);
$user->insert();

//////////////////////////////////////PHPMailer///////////////////////////////////////////////

if(empty(trim($nombre))) $nombre = 'anonimo';
if(empty(trim($apellido))) $apellido = ' ';

$body="
    <h1> ¡Un nuevo usuario se ha registrado! </h1><br>
    <p> De: $nombre $apellido / <a href='mailto:$email'> $email</a> </p><br>
    <h2> » Los datos de $nombre son: </h2><br>
    <ul>
        <li>Usuario: $usuario</li>
        <li>Contraseña: $hashed_password</li>

        <li>Nombre: $nombre</li>
        <li>Apellido: $apellido</li>
        <li>Empresa: $empresa</li>
        <li>E-mail: $email</li>
        <li>Telefono: $telefono,</li>
        <li>País: $pais</li>
        <li>Localidad: $localidad</li>
    </ul>";

require '../vendor/PHPMailer/src/PHPMailer.php';
require '../vendor/PHPMailer/src/Exception.php';
require '../vendor/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\{PHPMailer, SMTP, Exception};

$mailer= new PHPMailer(true);

try {
    //Configuraciones SMTP de sendinblue:
    $mailer->SMTPDebug= SMTP::DEBUG_OFF;
    $mailer->isSMTP();
    $mailer->Host='smtp-relay.sendinblue.com';
    $mailer->SMTPAuth=true;
    $mailer->Username=""; //insert credentials here!
    $mailer->Password="";
    $mailer->SMTPSecure= PHPMailer::ENCRYPTION_STARTTLS;
    $mailer->Port=587;
    //remitente,dirección que recibirá el mensaje,etiquetasHTML,Charset,Asunto,Mensaje,Mensaje sin etiquetas HTML, y calleo al método de envio:
    $mailer->setFrom($email, "$nombre $apellido");
    $mailer->addAddress('bruno.ortuno2@gmail.com', 'Bruno');
    $mailer->isHTML(true);
    $mailer->CharSet = 'UTF-8';
    $mailer->Subject='Usuario agregado a la base de datos falopa de Bruno';
    $mailer->Body= $body;
    $mailer->AltBody=strip_tags($body);
    $rta= $mailer->send();
    var_dump($rta);

    if($rta){
        echo '<script type="text/javascript">';
        echo 'alert("' ."Usuario creado correctamente.". '");';
        echo 'setTimeout(function() {';
        echo '  window.location.href = "../View/login.html";';
        echo '}, 500);';  
        echo '</script>';
        exit;
    }else{
        echo "Algo salió mal. Por favor, volver a intentarlo";
    }

}catch (Exception $e) {
    echo 'Mensaje '.$mailer->ErrorInfo;
}

?>

