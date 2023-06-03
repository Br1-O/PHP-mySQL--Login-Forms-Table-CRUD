<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title> Datos de la Empresa </title>
</head>


<?php

if($_GET['id']){

include '../Controller/class_Company.php';
$fila=Company::searchById($_GET['id']);

echo "<table class='table-companies'>";

    //imprimir datos en cada fila
  
    echo"<Tr><Th rowspan ='9'id='th-1'>".$fila["nombre"]."</Th>"."<Tr><th>Servicios</Th><Td id='td-1'>".$fila["servicios"]."</Td></Tr>";
    echo"<Th>Responsable</Th><Td>".$fila["responsable"]."</Td><Tr><Th>Telefono</Th><Td>".$fila["telefono"]."</Td></Tr>";
    echo"<Tr><Th>Pagina</Th><Td>".$fila["pagina"]."</Td></Tr>";
    echo"<Tr><Th>Comentarios</Th><Td>".$fila["comentarios"]."</Td></Tr>";
    echo"<Tr><Th>Fecha de Inicio</Th><Td>".$fila["fecha_inicio"]."</Td></Tr><Tr><Th>Fecha de Cierre</Th><Td>".$fila["fecha_cierre"]."</Td></Tr>";
    echo"<Tr id='tr-last' ><Th id='th-last' colspan ='2' ><a href='edit_company.php?assoc=".$fila['id']."' style='margin-right:40px;' ><img src='../images/icon_edit.png' alt='edit register' style='width:30px; height:30px margin:5px;' id='btn_edit'></a><a href='../Controller/delete_company.php?idborrar=".$fila['id']."'><img id='btn_delete' src='../images/icon_delete2.png' alt='delete register' style='width:30px; height:30px margin:5px;'></a></Th></Tr>";
}

echo "</table>";

?>