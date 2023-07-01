<?php

require '../../Controller/session_validation.php';
require_once 'templates/autoload.php';

//LOADING THE MULTIPLE DASHBOARDS INTO VARIABLES

$dashboardAdmin= '<body>

        <div class="info-bar">

        <button name="mostrarUsuarios" onclick="redirectToPage(\'show_users.php\')"> Mostrar Usuarios</button>

        <button name="form-company" onclick="redirectToPage(\'ADMIN_create_user.php\')"> Insertar Usuario</button>

        <button name="mostrarDatos" onclick="redirectToPage(\'show_companies.php\')"> Mostrar Compañias </button>

        <button name="form-company" onclick="redirectToPage(\'form_company.php\')"> Insertar Compañia</button>

        <form class="form-logout" action="dashboardEngine.php" method="get">
            <input type="hidden" name="logout" value="true">
            <input type="submit" class=\'link closeSesion\' value=\'Cerrar Sesión\'>
        </form>

        </div>

        <div id="titulo">
            <h1> · ¡Bienvenido, <?php echo $_SESSION[\'name\'].\'!\'; ?> · </h1>
        </div>


    </body>
    </html>';

$dashboardClient='<body>

        <div class="info-bar">

        <button name="mostrarUsuarios" onclick="redirectToPage(\'.php\')"> Turnos disponibles </button>

        <button name="form-company" onclick="redirectToPage(\'.php\')"> Pedir Turno</button>

        <button name="mostrarDatos" onclick="redirectToPage(\'.php\')"> Mostrar turnos </button>

        <button name="mostrarDatos" onclick="redirectToPage(\'.php\')"> Atención al cliente </button>

        <button name="form-company" onclick="redirectToPage("form_company.php")"> Insertar Compañia</button>

        <form class="form-logout" action="dashboardEngine.php" method="get">
            <input type="hidden" name="logout" value="true">
            <input type="submit" class=\'link closeSesion\' value=\'Cerrar Sesión\'>
        </form>

        </div>

        <div id="titulo">
            <h1> · ¡Bienvenido, <?php echo $_SESSION[\'name\'].\'!\'; ?> · </h1>
        </div>


    </body>
    </html>';

$dashboardScrum='<body>

    <div class="info-bar">

    <button name="mostrarUsuarios" onclick="redirectToPage(\'.php\')"> Turnos disponibles </button>

    <button name="form-company" onclick="redirectToPage(\'.php\')"> Pedir Turno</button>

    <button name="mostrarDatos" onclick="redirectToPage(\'.php\')"> Mostrar turnos </button>

    <button name="mostrarDatos" onclick="redirectToPage(\'.php\')"> Atención al cliente </button>

    <button name="form-company" onclick="redirectToPage(\'form_company.php\')"> Insertar Compañia</button>

    <form class="form-logout" action="<?php $_SERVER[\'PHP_SELF\']; ?>" method="get">
        <input type="hidden" name="logout" value="true">
        <input type="submit" class=\'link closeSesion\' value=\'Cerrar Sesión\'>
    </form>

    </div>

    <div id="titulo">
        <h1> · ¡Bienvenido, <?php echo $_SESSION[\'name\'].\'!\'; ?> · </h1>
    </div>


    </body>
    </html>';

$dashboardFirst='<body>

    <div class="info-bar">

    <button name="mostrarUsuarios" onclick="redirectToPage(\'.php\')"> Turnos disponibles </button>

    <button name="form-company" onclick="redirectToPage(\'.php\')"> Pedir Turno</button>

    <button name="mostrarDatos" onclick="redirectToPage(\'.php\')"> Mostrar turnos </button>

    <button name="mostrarDatos" onclick="redirectToPage(\'.php\')"> Atención al cliente </button>

    <button name="form-company" onclick="redirectToPage(\'form_company.php\')"> Insertar Compañia</button>

    <form class="form-logout" action="<?php $_SERVER[\'PHP_SELF\']; ?>" method="get">
        <input type="hidden" name="logout" value="true">
        <input type="submit" class=\'link closeSesion\' value=\'Cerrar Sesión\'>
    </form>

    </div>

    <div id="titulo">
        <h1> · ¡Bienvenido, <?php echo $_SESSION[\'name\'].\'!\'; ?> · </h1>
    </div>


    </body>
    </html>';

$dashboardSales='<body>

    <div class="info-bar">

    <button name="mostrarUsuarios" onclick="redirectToPage(\'.php\')"> Turnos disponibles </button>

    <button name="form-company" onclick="redirectToPage(\'.php\')"> Pedir Turno</button>

    <button name="mostrarDatos" onclick="redirectToPage(\'.php\')"> Mostrar turnos </button>

    <button name="mostrarDatos" onclick="redirectToPage(\'.php\')"> Atención al cliente </button>

    <button name="form-company" onclick="redirectToPage(\'form_company.php\')"> Insertar Compañia</button>

    <form class="form-logout" action="<?php $_SERVER[\'PHP_SELF\']; ?>" method="get">
        <input type="hidden" name="logout" value="true">
        <input type="submit" class=\'link closeSesion\' value=\'Cerrar Sesión\'>
    </form>

    </div>

    <div id="titulo">
        <h1> · ¡Bienvenido, <?php echo $_SESSION[\'name\'].\'!\'; ?> · </h1>
    </div>


    </body>
    </html>';

$dashboardDefault='<body>

    <div class="info-bar">

    <button name="mostrarUsuarios" onclick="redirectToPage(\'.php\')"> Turnos disponibles </button>

    <button name="form-company" onclick="redirectToPage(\'.php\')"> Pedir Turno</button>

    <button name="mostrarDatos" onclick="redirectToPage(\'.php\')"> Mostrar turnos </button>

    <button name="mostrarDatos" onclick="redirectToPage(\'.php\')"> Atención al cliente </button>

    <button name="form-company" onclick="redirectToPage(\'form_company.php\')"> Insertar Compañia</button>

    <form class="form-logout" action="<?php $_SERVER[\'PHP_SELF\']; ?>" method="get">
        <input type="hidden" name="logout" value="true">
        <input type="submit" class=\'link closeSesion\' value=\'Cerrar Sesión\'>
    </form>

    </div>

    <div id="titulo">
        <h1> · ¡Bienvenido, <?php echo $_SESSION[\'name\'].\'!\'; ?> · </h1>
    </div>


    </body>
    </html>';

//PASSING THOSE VARIABLES AS VALUES INTO THE DATA ARRAY

$roleDashboard=array(999 => $dashboardAdmin, 0 => $dashboardClient, 1 => $dashboardScrum, 2 => $dashboardFirst, 3 => $dashboardSales);

$userRole=$_SESSION['role'];


$templateEngine=new TemplateEngine('templates/dashboard.php');
$templateEngine->assign(
    ['title', 'Dashboard'],
    ['userRole', $userRole]
);
$templateEngine->setData('role',$userRole);
$templateEngine->renderForRole($roleDashboard);

?>

<!DOCTYPE html>
<html lang="en">

<body>
<script type="text/javascript" src="../../../public/js/functions.js"></script>
<script type="text/javascript" src="../../../public/js/login.js"></script>
</body>
</html>