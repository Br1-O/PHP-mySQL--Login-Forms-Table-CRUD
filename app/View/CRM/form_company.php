<?php
require '../../Controller/session_validation.php';
require_once '../../Model/classes/autoload.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../../public/css/styles.css">
    <script type="text/javascript" src="../../../public/js/functions.js"></script>
    <title>Proyecto</title>
</head>

<body>

    <div class="info-bar" style="max-width:30%;">
        <button name="mostrarDatos" onclick="redirectToPage('show_companies.php')">Mostrar Empresas</button>
        <button name="mostrarUsuarios" onclick="redirectToPage('show_users.php')">Mostrar Usuarios</button>
        <form class="form-logout" action="<?php $_SERVER['PHP_SELF']; ?>" method="get">
            <input type="hidden" name="logout" value="true">
            <input type="submit" class='link closeSesion' value='Cerrar Sesión'>
        </form>
    </div>

    <div id="titulo">
        <h1> · Ingrese los datos de la Empresa, <?php echo $_SESSION['name']; ?>. · </h1>
    </div>

    <form method="POST" action="../Controller/insert_company.php">

        <label for="empresa">» Empresa:</label>
        <input type="text" name="nombre" id="Ingrese el nombre de la Empresa" placeholder="Ingrese el nombre de la Empresa" required><br>

        <label for="servicios">» Servicios:</label>
        <input type="text" name="servicios" id="servicios" placeholder="Ingrese los servicios que brinda la Empresa" required><br>
        
        <label for="responsable">» Responsable:</label>
        <input type="text" name="responsable" id="responsable" placeholder="Ingrese el nombre del contacto dentro de la Empresa" required><br>
        
        <label for="telefono">» Teléfono:</label>
        <input type="tel" name="telefono" id="telefono" pattern="[0-9+-]" maxlength="20" placeholder="Ingrese el telefono de contacto" required><br>

        <label for="pagina">» Página:</label>
        <input type="text" name="pagina" id="pagina" placeholder="Ingrese la direccion del sitio web de la Empresa" required><br>

        <label for="comentarios">» Comentarios:</label>
        <textarea name="comentarios" id="comentarios" placeholder="Ingrese las observaciones para el seguimiento" required></textarea><br>

        <label for="fecha_inicio">■ Fecha Inicio:</label>
        <input type="date" name="fecha_inicio" id="fecha_inicio" placeholder="fecha inicio" required><br>

        <label for="fecha_cierre" id="fecha_cierre">■ Fecha Cierre:</label>
        <input type="date" name="fecha_cierre" id="fecha_cierre" placeholder="fecha cierre"><br>

        <input type="submit" value="Guardar datos">
        
        
    </form>

</body>
</html>
