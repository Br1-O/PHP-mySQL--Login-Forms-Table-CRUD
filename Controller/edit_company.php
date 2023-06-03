<?php
include 'class_Company.php';

if($_POST){
 
    $name=$_POST["nombre"];
    $services=$_POST["servicios"];
    $responsable=$_POST["responsable"];
    $phone=$_POST["telefono"];
    $website=$_POST["pagina"];
    $comments=$_POST["comentarios"];
    $OpeningDate=$_POST["fecha_inicio"];
    $ClosingDate=$_POST["fecha_cierre"];
    $Id=$_POST["id"];

    $company= new Company($name,$services,$responsable,$phone,$website,$comments,$OpeningDate,$ClosingDate);
    $company->edit($Id);

}else{
    header('Location:../View/show_companies.php');
}

?>