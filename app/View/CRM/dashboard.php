<?php
require_once '../../Controller/session_validation.php';
require_once '../../Model/classes/autoload.php';
$tittle='Dashboard';
$favicon='../../../public/images/icon_edit.png';
require '../templates/headLoaderCRM.php';
$conn->createCompaniesTable();

switch (true) {
    
    case ($_SESSION['role']===999):
        
        ?>
            <body>

            <div class="info-bar">

            <button name="mostrarUsuarios" onclick="redirectToPage('show_users.php')"> Mostrar Usuarios</button>

            <button name="form-company" onclick="redirectToPage('show_users.php?action=insert')"> Insertar Usuario</button>

            <button name="mostrarDatos" onclick="redirectToPage('show_companies.php')"> Mostrar Compañias </button>

            <button name="form-company" onclick="redirectToPage('show_companies.php?action=insert')"> Insertar Compañia</button>

            <form class="form-logout" action="<?php $_SERVER['PHP_SELF']; ?>" method="get">
                <input type="hidden" name="logout" value="true">
                <input type="submit" class='link closeSesion' value='Cerrar Sesión'>
            </form>

            </div>

            <div id="titulo">
                <h1> · ¡Bienvenido, <?php echo $_SESSION['name'].'!'; ?> · </h1>
            </div>


            </body>
            </html>
        <?php
        break;

    case ($_SESSION['role']===0):

        ?>
            <body>

            <div class="info-bar">

            <button name="mostrarUsuarios" onclick="redirectToPage('.php')"> Turnos disponibles </button>

            <button name="form-company" onclick="redirectToPage('.php')"> Pedir Turno</button>

            <button name="mostrarDatos" onclick="redirectToPage('.php')"> Mostrar turnos </button>

            <button name="mostrarDatos" onclick="redirectToPage('.php')"> Atención al cliente </button>

            <button name="form-company" onclick="redirectToPage('#')"> Insertar Compañia</button>

            <form class="form-logout" action="<?php $_SERVER['PHP_SELF']; ?>" method="get">
                <input type="hidden" name="logout" value="true">
                <input type="submit" class='link closeSesion' value='Cerrar Sesión'>
            </form>

            </div>

            <div id="titulo">
                <h1> · ¡Bienvenido, <?php echo $_SESSION['name'].'!'; ?> · </h1>
            </div>


            </body>
            </html>
        <?php
        break;

    case ($_SESSION['role']===1):
        
        ?>
            <body>

            <div class="info-bar">

            <button name="mostrarUsuarios" onclick="redirectToPage('show_users.php')"> Mostrar Usuarios</button>

            <button name="mostrarDatos" onclick="redirectToPage('show_companies.php')"> Mostrar Compañias </button>

            <form class="form-logout" action="<?php $_SERVER['PHP_SELF']; ?>" method="get">
                <input type="hidden" name="logout" value="true">
                <input type="submit" class='link closeSesion' value='Cerrar Sesión'>
            </form>

            </div>

            <div id="titulo">
                <h1> · ¡Bienvenido, <?php echo $_SESSION['name'].'!'; ?> · </h1>
            </div>


            </body>
            </html>
        <?php
        break;

    case ($_SESSION['role']===2):

        ?>
            <body>

            <div class="info-bar">

            <button name="mostrarDatos" onclick="redirectToPage('show_companies.php')"> Mostrar Compañias </button>

            <button name="form-company" onclick="redirectToPage('show_companies.php?action=insert')"> Insertar Compañia</button>

            <form class="form-logout" action="<?php $_SERVER['PHP_SELF']; ?>" method="get">
                <input type="hidden" name="logout" value="true">
                <input type="submit" class='link closeSesion' value='Cerrar Sesión'>
            </form>

            </div>

            <div id="titulo">
                <h1> · ¡Bienvenido, <?php echo $_SESSION['name'].'!'; ?> · </h1>
            </div>


            </body>
            </html>
        <?php                  
        break;

    case ($_SESSION['role']===3):
        
        ?>
            <body>

            <div class="info-bar">

            <button name="mostrarDatos" onclick="redirectToPage('show_companies.php')"> Mostrar Compañias </button>

            <form class="form-logout" action="<?php $_SERVER['PHP_SELF']; ?>" method="get">
                <input type="hidden" name="logout" value="true">
                <input type="submit" class='link closeSesion' value='Cerrar Sesión'>
            </form>

            </div>

            <div id="titulo">
                <h1> · ¡Bienvenido, <?php echo $_SESSION['name'].'!'; ?> · </h1>
            </div>


            </body>
            </html>

        <?php                               
        break;
                                                    
    default:
        session_destroy();
        header('Location:loginNT.php');           
        break;
}
?>

<html>
    <script type="text/javascript" src="../../../public/js/dashboard.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script> -->
</html>
