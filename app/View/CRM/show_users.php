<?php
require_once '../../Controller/session_validation.php';
$tittle='Listado de Usuarios';
$favicon='../../../public/images/icon_edit.png';
require '../templates/headLoaderCRM.php';
?>

<body>

    <?php
        require_once "../templates/navBarCRM.php";
    ?>

    <!-- ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Modals | Insert User · Show Full User ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■  -->
       
        <!--·■■■ Insert Modal ■■■-->

                <div class="modal fade" id="modalInsertUser" tabindex="-1" role="dialog" aria-labelledby="modalInsertUserLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">

                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title" id="modalInsertUserLabel">· Ingrese los datos del Usuario, <?php echo $_SESSION['name']; ?>. ·</h5>
                            <button type="button" class="close" id='closeModalInsertUser' data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <form id="formInsertUser" class="form evenColumns row">
                                <div class="formColumn col-6">
                                    <!-- User -->
                                    <div class="form-group">
                                        <label for="user">Usuario:</label>
                                        <input type="text" id="user" name="user" required class="form-control" placeholder="Por favor, ingrese el usuario">
                                    </div>
                                    <!-- Password -->
                                    <div class="form-group">
                                        <label for="password">Password:</label>
                                        <input type="password" id="password" name="password" required class="form-control" placeholder="Por favor, ingrese la contraseña">
                                    </div>
                                    <!-- Role -->
                                    <div class="form-group">
                                        <label for="role">Rol:</label>
                                        <select name="role" id="role" class="form-control">
                                            <option value="" selected disabled>Selecciona el Rol:</option>
                                            <option value="999">Admin</option>
                                            <option value="0">Cliente</option>
                                            <option value="1">Scrum Master</option>
                                            <option value="2">First Contact</option>
                                            <option value="3">Vendedor</option>
                                        </select>
                                    </div>
                                    <!-- Name -->
                                    <div class="form-group">
                                        <label for="name">Nombre:</label>
                                        <input type="text" id="name" name="name" class="form-control" placeholder="Por favor, ingrese el nombre">
                                    </div>
                                    <!-- Last Name -->
                                    <div class="form-group">
                                        <label for="lastN">Apellido:</label>
                                        <input type="text" id="lastN" name="lastN" class="form-control" placeholder="Por favor, ingrese el apellido">
                                    </div>
                                    <!-- Birth Date -->
                                    <div class="form-group">
                                        <label for="birthDate">Fecha de Nacimiento:</label>
                                        <input type="date" id="birthDate" name="birthDate" class="form-control" placeholder="Por favor, ingrese la fecha de nacimiento">
                                    </div>
                                </div>

                                <div class="formColumn col-6">
                                    <!-- Gender -->
                                    <div class="form-group">
                                        <label for="gender">Género:</label>
                                        <input type="text" id="gender" name="gender" class="form-control" placeholder="Por favor, ingrese el género">
                                    </div>
                                    <!-- Company -->
                                    <div class="form-group">
                                        <label for="company">Compañía:</label>
                                        <input type="text" id="company" name="company" class="form-control" placeholder="Por favor, ingrese la compañía">
                                    </div>
                                    <!-- Email -->
                                    <div class="form-group">
                                        <label for="email">Correo Electrónico:</label>
                                        <input type="email" id="email" name="email" class="form-control" placeholder="Por favor, ingrese el correo electrónico">
                                    </div>
                                    <!-- Phone -->
                                    <div class="form-group">
                                        <label for="phone">Teléfono:</label>
                                        <input type="tel" id="phone" name="phone" class="form-control" placeholder="Por favor, ingrese el teléfono">
                                    </div>
                                    <!-- Country -->
                                    <div class="form-group">
                                        <label for="country">País:</label>
                                        <input type="text" id="country" name="country" class="form-control" placeholder="Por favor, ingrese el país">
                                    </div>
                                    <!-- City -->
                                    <div class="form-group">
                                        <label for="city">Ciudad:</label>
                                        <input type="text" id="city" name="city" class="form-control" placeholder="Por favor, ingrese la ciudad">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <!-- Submit Button -->
                                    <button id="btnInsertUser" type="submit" class="btn btn-primary">Cargar usuario</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>


        <!--·■■■ PUT Modal ■■■-->
                    <div class="modal fade" id="modalEditUser" tabindex="-1" role="dialog" aria-labelledby="modalEditUserLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title" id="modalEditUserLabel">· Modifique los datos del Usuario, <?php echo $_SESSION['name']; ?>. ·</h5>
                                <button type="button" class='close' id="closeModalEditUser" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                
                                <form id="formEditUser" class="form evenColumns row">
                                    
                                    <div class="formColumn col-6">
                                        <!-- User -->
                                        <div class="form-group">
                                            <label for="userEdit">Usuario:</label>
                                            <input type="text" id="userEdit" name="user" required class="form-control" placeholder="Por favor, ingrese el usuario">
                                        </div>
                                        <!-- Password -->
                                        <div class="form-group">
                                            <label for="passwordEdit">Password:</label>
                                            <input type="password" id="passwordEdit" name="password" required class="form-control" placeholder="Por favor, ingrese la contraseña">
                                        </div>
                                        <!-- Role -->
                                        <div class="form-group">
                                            <label for="roleEdit">Rol:</label>
                                            <select name="role" id="roleEdit" class="form-control">
                                                <option value="" selected disabled>Selecciona el nuevo Rol:</option>
                                                <option value="999">Admin</option>
                                                <option value="0">Cliente</option>
                                                <option value="1">Scrum Master</option>
                                                <option value="2">First Contact</option>
                                                <option value="3">Vendedor</option>
                                            </select>
                                        </div>
                                        <!-- Name -->
                                        <div class="form-group">
                                            <label for="nameEdit">Nombre:</label>
                                            <input type="text" id="nameEdit" name="name" class="form-control" placeholder="Por favor, ingrese el nombre">
                                        </div>
                                        <!-- Last Name -->
                                        <div class="form-group">
                                            <label for="lastNEdit">Apellido:</label>
                                            <input type="text" id="lastNEdit" name="lastN" class="form-control" placeholder="Por favor, ingrese el apellido">
                                        </div>
                                        <!-- Birth Date -->
                                        <div class="form-group">
                                            <label for="birthDateEdit">Fecha de Nacimiento:</label>
                                            <input type="date" id="birthDateEdit" name="birthDate" class="form-control" placeholder="Por favor, ingrese la fecha de nacimiento">
                                        </div>
                                    </div>

                                    <div class="formColumn col-6">
                                        <!-- Gender -->
                                        <div class="form-group">
                                            <label for="genderEdit">Género:</label>
                                            <input type="text" id="genderEdit" name="gender" class="form-control" placeholder="Por favor, ingrese el género">
                                        </div>
                                        <!-- Company -->
                                        <div class="form-group">
                                            <label for="companyEdit">Compañía:</label>
                                            <input type="text" id="companyEdit" name="company" class="form-control" placeholder="Por favor, ingrese la compañía">
                                        </div>
                                        <!-- Email -->
                                        <div class="form-group">
                                            <label for="emailEdit">Correo Electrónico:</label>
                                            <input type="email" id="emailEdit" name="email" class="form-control" placeholder="Por favor, ingrese el correo electrónico">
                                        </div>
                                        <!-- Phone -->
                                        <div class="form-group">
                                            <label for="phoneEdit">Teléfono:</label>
                                            <input type="tel" id="phoneEdit" name="phone" class="form-control" placeholder="Por favor, ingrese el teléfono">
                                        </div>
                                        <!-- Country -->
                                        <div class="form-group">
                                            <label for="countryEdit">País:</label>
                                            <input type="text" id="countryEdit" name="country" class="form-control" placeholder="Por favor, ingrese el país">
                                        </div>
                                        <!-- City -->
                                        <div class="form-group">
                                            <label for="cityEdit">Ciudad:</label>
                                            <input type="text" id="cityEdit" name="city" class="form-control" placeholder="Por favor, ingrese la ciudad">
                                        </div>
                                        <!-- Photo -->
                                        <div class="form-group">
                                            <label for="photo">Foto:</label>
                                            <input type="text" id="photo" name="photo" class="form-control" placeholder="Por favor, ingrese la foto del usuario">
                                        </div>
                                        <!-- Validated Email -->
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input type="checkbox" id="validatedEmailEdit" name="validatedEmail" value="1" class="form-check-input">
                                                <label class="form-check-label" for="validatedEmailEdit">Email Validado</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="formColumn">
                                        <!-- Submit Button -->
                                        <button id="btnEditUser" type="submit" class="btn btn-primary">Editar usuario</button>
                                    </div>

                                </form>

                            </div>
                    </div>
                </div>
            </div>


        <!--·■■■ Full data Modal ■■■-->

            <!-- Modal -->

            <div class="modal fade" id="modalFullUser" tabindex="-1" aria-labelledby="fulluserLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content">

                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="fullUserLabel"></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                        <section class='nav-tabs-section'>

                            <nav>
                                <div class="nav nav-underline d-flex justify-content-center" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-anteproyecto" aria-selected="true">
                                    Contacto
                                    </button>
                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-planos constructivos" aria-selected="false">
                                    Actividad
                                    </button>
                                    <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-permisos de construcción" aria-selected="false">
                                    Datos del registro
                                    </button>
                                    <button class="nav-link" id="nav-disabled-tab" data-bs-toggle="tab" data-bs-target="#nav-disabled" type="button" role="tab" aria-controls="nav-permisos de ocupación" aria-selected="false">
                                    Datos financieros
                                    </button>
                                    <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-Trámites post-ocupación" aria-selected="false">
                                    Documentos
                                    </button>
                                </div>
                            </nav>

                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                                    <div class="even-columns1 row tab-content">
                                    
                                        <div class='split-image1 tab1-img col-xl-5 col-lg-9 col-md-8 col-sm-8 col-8' >
                                            <img src="../../../public/images/Batch/splash-solutions.png" alt="splash de edificio visto desde abajo" aria-label="imagen splash de edificio visto desde abajo">
                                        </div>   
                                        
                                        <div class='tab-text col-xl-6 col-lg-9 col-md-8 col-sm-8 col-8' >
                                            

                                            <table class="table table-success table-striped table-hover" id='tableFullUserTab1'>

                                            </table>

                                            <div>
                                            </div>

                                        </div>
                                    </div>  

                                </div>

                                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                                    <p class='tab-content'></p>
                                </div>

                                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">
                                    <p class='tab-content'></p>
                                </div>

                                <div class="tab-pane fade" id="nav-disabled" role="tabpanel" aria-labelledby="nav-disabled-tab" tabindex="0">
                                <p class='tab-content'></p>
                                </div>

                            </div>

                        </section>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>            
                    </div>

                </div>
            </div>
            </div>

    <!-- ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Alerts in page | Table of Users | Check for GET actions ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■  -->

        <!--Optional in window alerts (will change display property based on events)-->

            <div class="container" id="alerts-container">
                <div class="alerts">
                    <div class="alert alert-success" style='display:none;'> Success! </div>
                    <div class="alert alert-danger" style='display:none;'> Failed. </div>
                </div>
            </div>

        <!--main table where all the registers will be appended-->

            <table class='table-users'> 
            </table>

    <!-- ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Includes Js Functions & External CDNs ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■  -->   
                
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type="text/javascript" src="../../../public/js/functionsUsers.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <!-- ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Check for GET actions ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■  -->   
            
        <?php

            if(isset($_GET['action']) && $_GET['action']=='insert'){
                ?>
                    <script>
                        document.getElementById('btnOpenInsertUser').click();
                    </script>
                <?php
            }
        ?>

</body>

</html>