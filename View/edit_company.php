<?php
require '../Controller/session_validation.php';
include '../Model/classes/class_Company.php';

$fila=array();

if($_GET){
    $fila=Company::searchById($_GET['assoc']);
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../public/css/styles.css">
        <script type="text/javascript" src="../public/js/functions.js"></script>
        <title> Editar datos de la Empresa </title>
    </head>

    <body>
        <div id="titulo">

        <h1> · Modifique los datos que desea cambiar · </h1></div>

        <form method="POST" action="../Controller/edit_company.php">

            <label for="empresa">» Empresa:</label>
            <input type="text" name="nombre" id="Ingrese el nombre de la Empresa" placeholder="Ingrese el nombre de la Empresa" value="<?php  echo $fila['nombre'];?>" required><br>

            <label for="servicios">» Servicios:</label>
            <input type="text" name="servicios" id="servicios" placeholder="Ingrese los servicios que brinda la Empresa" value="<?php  echo $fila['servicios'];?>" required><br>
            
            <label for="responsable">» Responsable:</label>
            <input type="text" name="responsable" id="responsable" placeholder="Ingrese el nombre del contacto dentro de la Empresa" value="<?php  echo $fila['responsable'];?>" required><br>
            
            <label for="telefono">» Teléfono:</label>
            <input type="tel" name="telefono" id="telefono" placeholder="Ingrese el telefono de contacto" value="<?php  echo $fila['telefono'];?>" required><br>

            <label for="pagina">» Página:</label>
            <input type="text" name="pagina" id="pagina" placeholder="Ingrese la direccion del sitio web de la Empresa" value="<?php  echo $fila['pagina'];?>" required><br>

            <label for="comentarios">» Comentarios:</label>
            <textarea name="comentarios" id="comentarios" placeholder="Ingrese las observaciones para el seguimiento" required><?php  echo $fila['comentarios'];?></textarea><br>

            <label for="fecha_inicio">■ Fecha Inicio:</label>
            <input type="date" name="fecha_inicio" id="fecha_inicio" placeholder="fecha inicio" value="<?php  echo $fila['fecha_inicio'];?>" required><br>

            <label for="fecha_cierre" id="fecha_cierre">■ Fecha Cierre:</label>
            <input type="date" name="fecha_cierre" id="fecha_cierre" value="<?php  echo $fila['fecha_cierre'];?>" placeholder="fecha cierre"><br>

            <input type="hidden" name="id" id="id" value="<?php  echo $fila['id'];?>"><br>

            <input type="submit" value="Editar datos">

        </form>

        <button onclick="redirectToPage('show_companies.php')"> Volver </button>
        </div>

    </body>

 </html>
