<?php
require '../../Controller/session_validation.php';
require_once '../../Model/classes/autoload.php';

?>
<!-- ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Search Bar  ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■  -->

    <?php


        //searchBar in case current file is 'show_companies':

        if (((basename($_SERVER['SCRIPT_NAME'], ".php")) =='show_companies')) {
            ?>
                <div class="info-bar">

                <!--■■■■■■■■ Search ■■■■■■■■-->

                    <form class='search' action="../../Controller/filter_company.php" method="get">
                        <select name="searchField" id='searchField'>
                            <option value="option" selected disabled>Categoria: </option>
                            <option value="name">Nombre</option>
                            <option value="services">Servicios</option>
                            <option value="responsable">Responsable</option>
                            <option value="phone">Telefono</option>
                            <option value="website">Pagina</option>
                            <option value="city">Ciudad</option>
                            <option value="openingDate">Fecha_inicio</option>
                            <option value="closingDate">Fecha_cierre</option>
                        </select>
                    
                        <input type="text" id='inputSearch' placeholder="Ingrese su busqueda">  

                    </form>
            <?php

        } else if((basename($_SERVER['SCRIPT_NAME'], ".php"))=='show_users'){

            //searchBar in case current file is 'show_users':
                
            ?>
                <div class="info-bar">

                <!--■■■■■■■■ Search ■■■■■■■■-->

                <form class='search' action="../../Controller/filter_user.php" method="get">
                    <select name="searchField" id='searchField'>
                        <option value="option" selected disabled>Categoria: </option>
                        <option value="user">Usuario</option>
                        <option value="name">Nombre</option>
                        <option value="lastName">Apellido</option>
                        <option value="company">Compañia</option>
                        <option value="phone">Telefono</option>
                        <option value="email">Email</option>
                        <option value="city">Ciudad</option>
                        <option value="country">País</option>
                        <option value="registrationDate">Fecha de Registro</option>
                    </select>
                
                    <input type="text" id='inputSearch' placeholder="Ingrese su busqueda">  

                </form>

            <?php
        }


//■■■■■■■■■■■■■■■■■■■■■ navBAR Options for Companies and Users handling based on role of current user  ■■■■■■■■■■■■■■■■■■■■■■■■//

    //check for current file and role of user to show proper navBAR:

    switch (true) {
        
        case ($_SESSION['role']===999):


                if (((basename($_SERVER['SCRIPT_NAME'], ".php")) =='show_companies')) {
                ?>
                    <!-- ■■■■■■■■ Nav Bar COMPANIES for ADMIN role ■■■■■■■■-->

                            <div id='optionsNav'>

                                <button name="mostrarDatos" onclick="redirectToPage('show_companies.php')"> Mostrar todos </button>

                                <button name="form-company" id='openInsertCompany'> Insertar Compañia</button>

                                <button name="mostrarUsuarios" onclick="redirectToPage('show_users.php')"> Mostrar Usuarios</button>

                                <button><a href='../../Controller/PDF_companies.php' style="color:#FFF; display:inline; width:100px"> Exportar PDF </a></button>
                            
                                <button><a href='../../Controller/PDF_company.php?id=".$fila['id']."' style="color:#FFF; display:inline; width:100px"> Exportar Excel </a></button>

                                <form class="form-logout" action="<?php $_SERVER['PHP_SELF']; ?>" method="get">
                                    <input type="hidden" name="logout" value="true">
                                    <input type="submit" class='link closeSesion' value='Cerrar Sesión'>
                                </form>

                            </div>
                        </div>
                    <?php
                } else if((basename($_SERVER['SCRIPT_NAME'], ".php"))=='show_users'){
                ?>
                    <!-- ■■■■■■■■ Nav Bar USERS for ADMIN role ■■■■■■■■-->

                            <div id='optionsNav'>

                                <button name="mostrarDatos" onclick="redirectToPage('show_users.php')"> Mostrar todos </button>

                                <button name="form-user" id='openInsertUser'> Insertar Usuario </button>

                                <button name="mostrarUsuarios" onclick="redirectToPage('show_companies.php')"> Mostrar Compañias</button>

                                <button><a href='../../Controller/PDF_users.php' style="color:#FFF; display:inline; width:100px"> Exportar PDF </a></button>

                                <button><a href='../../Controller/PDF_user.php?id=".$fila['id']."' style="color:#FFF; display:inline; width:100px"> Exportar Excel </a></button>

                                <form class="form-logout" action="<?php $_SERVER['PHP_SELF']; ?>" method="get">
                                    <input type="hidden" name="logout" value="true">
                                    <input type="submit" class='link closeSesion' value='Cerrar Sesión'>
                                </form>

                            </div>
                        </div>
            <?php
            }
            break;

        case ($_SESSION['role']===0):

            // ?>

            <!-- ■■■■■■■■ Nav Bar for Client role ■■■■■■■■

            //         <div id='optionsNav'>

            //             <button name="mostrarDatos" onclick="redirectToPage('show_companies.php')"> Mostrar todos </button>

            //             <button name="form-company" id='openInsertCompany'> Insertar Compañia</button>

            //             <button name="mostrarUsuarios" onclick="redirectToPage('show_users.php')"> Mostrar Usuarios</button>

            //             <button><a href='../../Controller/PDF_companies.php' style="color:#FFF; display:inline; width:100px"> Exportar PDF </a></button>
                    
            //             <button><a href='../../Controller/PDF_company.php?id=".$fila['id']."' style="color:#FFF; display:inline; width:100px"> Exportar Excel </a></button>

            //             <form class="form-logout" action="<?php $_SERVER['PHP_SELF']; ?>" method="get">
            //                 <input type="hidden" name="logout" value="true">
            //                 <input type="submit" class='link closeSesion' value='Cerrar Sesión'>
            //             </form>

            //         </div>
            //     </div>
                    
            //--> <?php
            // break;
            return false; 
            //client role is not incorporated to CRM for now, but may be in the future

        case ($_SESSION['role']===1):
            
            ?>
                <!-- ■■■■■■■■ Nav Bar USERS for Scrum Master role (access to users without insert) ■■■■■■■■-->

                    <div id='optionsNav'>

                        <button name="mostrarDatos" onclick="redirectToPage('show_companies.php')"> Mostrar todos </button>

                        <button name="mostrarUsuarios" onclick="redirectToPage('show_users.php')"> Mostrar Usuarios</button>

                        <button><a href='../../Controller/PDF_companies.php' style="color:#FFF; display:inline; width:100px"> Exportar PDF </a></button>
                    
                        <button><a href='../../Controller/PDF_company.php?id=".$fila['id']."' style="color:#FFF; display:inline; width:100px"> Exportar Excel </a></button>

                        <form class="form-logout" action="<?php $_SERVER['PHP_SELF']; ?>" method="get">
                            <input type="hidden" name="logout" value="true">
                            <input type="submit" class='link closeSesion' value='Cerrar Sesión'>
                        </form>

                    </div>
                </div>
                    
            <?php
            break;

        case ($_SESSION['role']===2):

            ?>
                <!-- ■■■■■■■■ Nav Bar COMPANIES for first Contact role ■■■■■■■■-->

                        <div id='optionsNav'>

                            <button name="mostrarDatos" onclick="redirectToPage('show_companies.php')"> Mostrar todos </button>

                            <button name="form-company" id='openInsertCompany'> Insertar Compañia</button>

                            <button><a href='../../Controller/PDF_companies.php' style="color:#FFF; display:inline; width:100px"> Exportar PDF </a></button>
                        
                            <button><a href='../../Controller/PDF_company.php?id=".$fila['id']."' style="color:#FFF; display:inline; width:100px"> Exportar Excel </a></button>

                            <form class="form-logout" action="<?php $_SERVER['PHP_SELF']; ?>" method="get">
                                <input type="hidden" name="logout" value="true">
                                <input type="submit" class='link closeSesion' value='Cerrar Sesión'>
                            </form>

                        </div>
                    </div>
            <?php
            break;

        case ($_SESSION['role']===3):
        
            ?>
                <!-- ■■■■■■■■ Nav Bar COMPANIES for first Contact role ■■■■■■■■-->

                        <div id='optionsNav'>

                            <button name="mostrarDatos" onclick="redirectToPage('show_companies.php')"> Mostrar todos </button>

                            <button><a href='../../Controller/PDF_companies.php' style="color:#FFF; display:inline; width:100px"> Exportar PDF </a></button>
                        
                            <button><a href='../../Controller/PDF_company.php?id=".$fila['id']."' style="color:#FFF; display:inline; width:100px"> Exportar Excel </a></button>

                            <form class="form-logout" action="<?php $_SERVER['PHP_SELF']; ?>" method="get">
                                <input type="hidden" name="logout" value="true">
                                <input type="submit" class='link closeSesion' value='Cerrar Sesión'>
                            </form>

                        </div>
                    </div>
            <?php
            break;
                                                        
        default:
            session_destroy();
            header('Location:../View/CRM/loginNT.php');           
            break;
    }
    ?>
<!--■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Js Imports ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■-->

<html>
    <script type="text/javascript" src="../../../public/js/functions.js"></script>
    <script type="text/javascript" src="../../../public/js/functionsUSERs.js"></script>
    <script type="text/javascript" src="../../../public/js/login.js"></script>
</html>
