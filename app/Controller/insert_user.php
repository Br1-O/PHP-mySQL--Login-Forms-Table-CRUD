<?php

require_once '../Model/classes/autoload.php';
require_once 'session_validation.php';

// require_once '../Controller/session_validation.php';

$input=file_get_contents("php://input");

if(!empty($input)){

    $decode=json_decode($input,true);

    $userName=$decode["user"];
    $password=$decode["password"];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    isset($decode["role"])?$role=intval($decode["role"]) : $role=0;
    $name=$decode["name"];
    $lastN=$decode["lastN"];
    $company=$decode["company"];
    $email=$decode["email"];
    $phone=$decode["phone"];
    $country=$decode["country"];
    $city=$decode["city"];
    $birthDate=$decode["birthDate"];
    $gender=$decode["gender"];
    $lastUpdatedBy=$_SESSION["id"];

    $picture="";
    $validatedEmail=0;
    $registrationDate='0000-00-00';
    $lastLogin="0000-00-00";
    $isActive=0;
    $activationToken="";
    $resetPasswordToken="";

}else{
    header('Location:../View/CRM/loginNT.php');
}

///////////////////////////////////////Instance of User///////////////////////////////////////////////

$user= new User($conn,$userName,$hashed_password,$role,$name,$lastN,$company,$email,$phone,$city,$country,$birthDate,$gender,$picture,$validatedEmail, $registrationDate, $lastLogin,$isActive,$activationToken,$resetPasswordToken,$lastUpdatedBy);
$user->insert();

// if(!isset($_SESSION['id'])){
//     header('Location:../View/CRM/loginNT.php?userCreate=success');
// }

//////////////////////////////////////PHPMailer///////////////////////////////////////////////

// if(empty(trim($name))) $name = 'anonimo';
// if(empty(trim($lastN))) $apellido = ' ';

// $body="
//     <h1> ¡Un nuevo usuario se ha registrado! </h1><br>
//     <p> De: $name $lastN / <a href='mailto:$email'> $email</a> </p><br>
//     <h2> » Los datos de $nombre son: </h2><br>
//     <ul>
//         <li>Usuario: $userName</li>
//         <li>Contraseña: $hashed_password</li>

//         <li>Nombre: $name</li>
//         <li>Apellido: $lastN</li>
//         <li>Empresa: $company</li>
//         <li>E-mail: $email</li>
//         <li>Telefono: $phone,</li>
//         <li>País: $country</li>
//         <li>Localidad: $city</li>
//     </ul>";

// require '../../vendor/PHPMailer/src/PHPMailer.php';
// require '../../vendor/PHPMailer/src/Exception.php';
// require '../../vendor/PHPMailer/src/SMTP.php';

// use PHPMailer\PHPMailer\{PHPMailer, SMTP, Exception};

// $mailer= new PHPMailer(true);

// try {

    //Configuraciones SMTP de sendinblue:

    // $mailer->SMTPDebug= SMTP::DEBUG_OFF;
    // $mailer->isSMTP();
    // $mailer->Host='smtp-relay.sendinblue.com';
    // $mailer->SMTPAuth=true;
    // $mailer->Username=""; //insert credentials here!
    // $mailer->Password="";
    // $mailer->SMTPSecure= PHPMailer::ENCRYPTION_STARTTLS;
    // $mailer->Port=587;

    //remitente,dirección que recibirá el mensaje,etiquetasHTML,Charset,Asunto,Mensaje,Mensaje sin etiquetas HTML, y calleo al método de envio:

//     $mailer->setFrom($email, "$name $lastN");
//     $mailer->addAddress('bruno.ortuno2@gmail.com', 'Bruno');
//     $mailer->isHTML(true);
//     $mailer->CharSet = 'UTF-8';
//     $mailer->Subject='Usuario agregado a la base de datos falopa de Bruno';
//     $mailer->Body= $body;
//     $mailer->AltBody=strip_tags($body);
//     $rta= $mailer->send();
//     var_dump($rta);

//     if($rta){
//         echo '<script type="text/javascript">';
//         echo 'alert("' ."Usuario creado correctamente.". '");';
//         echo 'setTimeout(function() {';
//         echo '  window.location.href = "../View/login.php";';
//         echo '}, 500);';  
//         echo '</script>';
//         exit;
//     }else{
//         echo "Algo salió mal. Por favor, volver a intentarlo";
//     }

// }catch (Exception $e) {
//     echo 'Mensaje '.$mailer->ErrorInfo;
// }

?>

