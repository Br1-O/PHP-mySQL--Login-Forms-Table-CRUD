<?php

require_once '../Model/classes/autoload.php';

if ($_POST) {

    $nombre=$_POST["nombre"];
    $servicios=$_POST["servicios"];
    $responsable=$_POST["responsable"];
    $telefono=$_POST["telefono"];
    $pagina=$_POST["pagina"];
    $comentarios=$_POST["comentarios"];
    $fecha_inicio=$_POST["fecha_inicio"];
    $fecha_cierre=$_POST["fecha_cierre"];
} else {
    header('Location:../View/form_company.html');
}

//////////////////////////////////////////////////////////////////////////////////////

$company= new Company($conn,$nombre,$servicios,$responsable,$telefono,$pagina,$comentarios,$fecha_inicio,$fecha_cierre);
$company->insert();

?>
