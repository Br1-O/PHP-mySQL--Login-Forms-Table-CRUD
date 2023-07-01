<?php
require '../../Controller/session_validation.php';
require 'headLoader.php';

switch (true) {
    case ($_SESSION['role']===999):
        
        ?>
            <body>

            <div class="info-bar">

            <button name="mostrarUsuarios" onclick="redirectToPage('show_users.php')"> Mostrar Usuarios</button>

            <button name="form-company" onclick="redirectToPage('ADMIN_create_user.php')"> Insertar Usuario</button>

            <button name="mostrarDatos" onclick="redirectToPage('show_companies.php')"> Mostrar Compañias </button>

            <button name="form-company" onclick="redirectToPage('form_company.php')"> Insertar Compañia</button>

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

            <button name="form-company" onclick="redirectToPage('form_company.php')"> Insertar Compañia</button>

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

            <button name="form-company" onclick="redirectToPage('form_company.php')"> Insertar Compañia</button>

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

            <button name="form-company" onclick="redirectToPage('form_company.php')"> Insertar Compañia</button>

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
            <!-- 
            <button name="form-company" onclick="redirectToPage('form_company.php')"> Insertar Compañia</button> -->

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
        header('Location:../View/login.php');           
        break;
}
?>

<html>
    <script type="text/javascript" src="../../../public/js/functions.js"></script>
    <script type="text/javascript" src="../../../public/js/login.js"></script>
</html>
