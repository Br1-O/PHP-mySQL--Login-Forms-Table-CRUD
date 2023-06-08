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
    <title>Listado de Empresas</title>
</head>

<body background: "linear-gradient(to bottom, #8d8de3, #a874cd)"  bgcolor="#2C62D4">

    <div class="info-bar">

        <button name="btn-open" onclick="openModal()">Aplicar Filtros</button>

        <button name="mostrarDatos" onclick="redirectToPage('show_companies.php')"> Mostrar todos </button>

        <button name="form-company" onclick="redirectToPage('form_company.php')"> Insertar Compañia</button>

        <button name="mostrarUsuarios" onclick="redirectToPage('show_users.php')"> Mostrar Usuarios</button>

        <button><a href='../Controller/PDF_companies.php' style="color:#FFF; display:inline; width:100px"> Exportar PDF </a></button>
       
        <button><a href='../Controller/PDF_company.php?id=".$fila['id']."' style="color:#FFF; display:inline; width:100px"> Exportar Excel </a></button>

        <form class="form-logout" action="<?php $_SERVER['PHP_SELF']; ?>" method="get">
            <input type="hidden" name="logout" value="true">
            <input type="submit" class='link closeSesion' value='Cerrar Sesión'>
        </form>
 
    </div>


    <dialog class='modalFilters' id='modalFilters'>

        <div class="div-modal">
            <button name="btn-close-Modal" onclick="closeModal()">Cerrar</button>
            <form class="form" action="../Controller/filter_company.php" method="get">
                <label for="filtro-campo"> Seleccionar filtro:</label>
                <select name="filtro-campo" id="">
                    <option value="nombre">Nombre</option>
                    <option value="servicios">Servicios</option>
                    <option value="responsable">Responsable</option>
                    <option value="telefono">Telefono</option>
                    <option value="pagina">Pagina</option>
                    <option value="comentarios">Comentarios</option>
                    <option value="fecha_inicio">Fecha_inicio</option>
                    <option value="fecha_cierre">Fecha_cierre</option>
                </select>
                <label for="campo"> Indique el valor a buscar:</label>
                <input type="text" name="valor" placeholder= "Ingrese un valor" required>
                <input type="submit" value="Buscar">

                <!-- <label for="">A por nombre</label>
                <input type="radio" name="" id="">
                <label for=""></label>
                <input type="radio" name="" id="">
                <label for=""></label>
                <input type="radio" name="" id="">
                <label for=""></label>
                <input type="radio" name="" id="">
                <label for=""></label>
                <input type="radio" name="" id=""> -->
            </form>

            <!-- <form class="form" action="filter_company.php" method="get">
                <label for="campo"> Indique la letras o letras por las que comienza el valor a buscar:</label>
                <input type="text" name="letra" placeholder= "Ingrese un valor" required>
                <input type="submit" value="Buscar">
            </form> -->
        
        </div>

    </dialog>
        <script>
            var modal=document.getElementById('modalFilters');

            function openModal(){modal.showModal();}

            function closeModal(){modal.close();}
        </script>
</body>
</html>

<?php
error_reporting(0);
if($_GET['data']){

    $results=$_GET['data'];

    echo "<table class='table-companies'>";

    foreach ($results as $fila){
        //imprimir datos en cada fila
     
        echo "<Tr><Th rowspan ='8'id='th-1'><a href='show_company.php?id=".$fila['id']."'>".$fila["nombre"]."</a></Th></Tr>";
        echo "<Tr><th>Servicios</Th><Td id='td-1'>".$fila["servicios"]."</Td></Tr>";
        echo "<Tr><Th>Responsable</Th><Td>".$fila["responsable"]."</Td></Tr>";
        echo "<Tr><Th>Telefono</Th><Td>".$fila["telefono"]."</Td></Tr>";
        echo "<Tr><Th>Pagina</Th><Td>".$fila["pagina"]."</Td></Tr>";
        // echo"<Tr><Th>Comentarios</Th><Td>".$fila["comentarios"]."</Td></Tr>";
        echo "<Tr><Th>Fecha de Inicio</Th><Td>".$fila["fecha_inicio"]."</Td></Tr>";
        echo "<Tr><Th>Fecha de Cierre</Th><Td>".$fila["fecha_cierre"]."</Td></Tr>";
        echo "<Tr id='tr-last' ><Th id='th-last' colspan ='2' >
        <a href='edit_company.php?assoc=".$fila['id']."' ><img src='../../public/images/icon_edit.png' alt='edit register' style='width:30px; height:30px; margin-right:5%;' id='btn_edit'></a>
        <a href='../Controller/delete_company.php?idborrar=".$fila['id']."'><img id='btn_delete' src='../../public/images/icon_delete2.png' alt='delete register' style='width:30px; height:30px; margin-right:5%;'></a>
        <a href='../Controller/PDF_company.php?id=".$fila['id']."'><img id='btn_delete' src='../../public/images/download-pdf.png' alt='delete register' style='width:30px; height:30px; margin-right:5%;'></a>
        <a href='../Controller/EXCEL_company.php?id=".$fila['id']."'><img id='btn_delete' src='../../public/images/excel3.png' alt='delete register' style='width:30px; height:30px; margin-right:5%;'></a>
        </Th></Tr>";
}

    echo "</table>";

}else{

    require_once '../Model/classes/autoload.php';
    
    $fil=Company::showData($conn);

    echo "<table class='table-companies'>";

    while($fila=$fil->fetch_assoc()){
        //imprimir datos en cada fila
    
        echo "<Tr><Th rowspan ='8'id='th-1'><a href='show_company.php?id=".$fila['id']."'>".$fila["nombre"]."</a></Th></Tr>";
        echo "<Tr><th>Servicios</Th><Td id='td-1'>".$fila["servicios"]."</Td></Tr>";
        echo "<Tr><Th>Responsable</Th><Td>".$fila["responsable"]."</Td></Tr>";
        echo "<Tr><Th>Telefono</Th><Td>".$fila["telefono"]."</Td></Tr>";
        echo "<Tr><Th>Pagina</Th><Td>".$fila["pagina"]."</Td></Tr>";
        // echo"<Tr><Th>Comentarios</Th><Td>".$fila["comentarios"]."</Td></Tr>";
        echo "<Tr><Th>Fecha de Inicio</Th><Td>".$fila["fecha_inicio"]."</Td></Tr>";
        echo "<Tr><Th>Fecha de Cierre</Th><Td>".$fila["fecha_cierre"]."</Td></Tr>";
        echo "<Tr id='tr-last' ><Th id='th-last' colspan ='2' >
        <a title='Editar' class='tableIcon' href='edit_company.php?assoc=".$fila['id']."' ><img src='../../public/images/icon_edit.png' alt='edit register' style='width:30px; height:30px; margin-right:5%;' id='btn_edit'></a>
        <a title='Borrar' href='../Controller/delete_company.php?idborrar=".$fila['id']."'><img id='btn_delete' src='../../public/images/icon_delete2.png' alt='delete register' style='width:30px; height:30px; margin-right:5%;'></a>
        <a title='Exportar PDF' href='../Controller/PDF_company.php?id=".$fila['id']."'><img id='btn_delete' src='../../public/images/download-pdf.png' alt='delete register' style='width:30px; height:30px; margin-right:5%;'></a>
        <a title='Exportar Excel' href='../Controller/EXCEL_company.php?id=".$fila['id']."'><img id='btn_delete' src='../../public/images/excel3.png' alt='delete register' style='width:30px; height:30px; margin-right:5%;'></a>
        </Th></Tr>";
}

    echo "</table>";    

}



?>