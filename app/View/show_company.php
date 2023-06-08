<?php

require '../Controller/session_validation.php';

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../public/css/styles.css">
    <script type="text/javascript" src="../../public/js/functions.js"></script>
    <title> Datos de la Empresa </title>
</head>


<?php

if($_GET['id']){

require_once '../Model/classes/autoload.php';
$fila=Company::searchById($conn, $_GET['id']);

    echo "<table class='table-companies'>";
    echo"<Tr><Th rowspan ='9'id='th-1'>".$fila["nombre"]."</Th>"."<Tr><th>Servicios</Th><Td id='td-1'>".$fila["servicios"]."</Td></Tr>";
    echo"<Tr><Th>Responsable</Th><Td>".$fila["responsable"]."</Td><Tr><Th>Telefono</Th><Td>".$fila["telefono"]."</Td></Tr>";
    echo"<Tr><Th>Pagina</Th><Td>".$fila["pagina"]."</Td></Tr>";
    echo"<Tr><Th>Comentarios</Th><Td>".$fila["comentarios"]."</Td></Tr>";
    echo"<Tr><Th>Fecha de Inicio</Th><Td>".$fila["fecha_inicio"]."</Td></Tr><Tr class='th-last2'><Th>Fecha de Cierre</Th><Td>".$fila["fecha_cierre"]."</Td></Tr>";
    echo"<Tr id='tr-last' ><Th id='th-last' colspan ='2' >
    <a href='edit_company.php?assoc=".$fila['id']."' ><img src='../../public/images/icon_edit.png' alt='edit register' style='width:30px; height:30px; margin-right:5%;' id='btn_edit'></a>
    <a href='../Controller/delete_company.php?idborrar=".$fila['id']."'><img id='btn_delete' src='../../public/images/icon_delete2.png' alt='delete register' style='width:30px; height:30px; margin-right:5%;'></a>
    <a href='../Controller/PDF_company.php?id=".$fila['id']."'><img id='btn_delete' src='../../public/images/download-pdf.png' alt='delete register' style='width:30px; height:30px; margin-right:5%;'></a>
    <a href='../Controller/EXCEL_company.php?id=".$fila['id']."'><img id='btn_delete' src='../../public/images/excel3.png' alt='delete register' style='width:30px; height:30px; margin-right:5%;'></a>
    </Th></Tr>";
}    
    echo "</table>";
?>