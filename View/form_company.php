<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Proyecto</title>
</head>

<body>
    <div id="titulo">

    <h1> · Ingrese los datos de la Empresa · </h1></div>

    <form method="POST" action="../Controller/insert_company.php">

        <label for="empresa">» Empresa:</label>
        <input type="text" name="nombre" id="Ingrese el nombre de la Empresa" placeholder="Ingrese el nombre de la Empresa" required><br>

        <label for="servicios">» Servicios:</label>
        <input type="text" name="servicios" id="servicios" placeholder="Ingrese los servicios que brinda la Empresa" required><br>
        
        <label for="responsable">» Responsable:</label>
        <input type="text" name="responsable" id="responsable" placeholder="Ingrese el nombre del contacto dentro de la Empresa" required><br>
        
        <label for="telefono">» Teléfono:</label>
        <input type="tel" name="telefono" id="telefono" placeholder="Ingrese el telefono de contacto" required><br>

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


       <div class="link-empresas">
        <button type="button" onclick="redirectToPage('login.html')" class="link"> Cerrar Sesión </button>

        <button name="mostrarDatos" onclick="redirectToPage('../Controller/show_companies.php')">Mostrar Empresas</button>
        <button name="mostrarUsuarios" onclick="redirectToPage('../Controller/show_users.php')">Mostrar Usuarios</button>
 
    </div>

    <script type="text/javascript">

        function redirectToPage(destination) {
            window.location.href = destination;
            }

            
    </script>


</body>
</html>
