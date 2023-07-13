
<!DOCTYPE html>
<html lang="en">

    <!-- ■■■■■■■■ Head · Imports and meta tags ■■■■■■■■-->  

        <head>
            <!-- Metadatos-->
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="author" content="Bruno O. Ortuño">
            <meta name="description" content="Batch · Tramites y Procesos para empresas de construcción">
            <meta name="keywords" content="construcción, empresas, trámites, procesos, construction, building, company, companies, help, paperwork, procedures, construction law, laws">
            <!-- CSS files-->
            <link rel="stylesheet" type="text/css" href="../../../public/css/Batch/styles.css">
            <link rel="stylesheet" href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css'>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
            <!-- FavIcon -->
            <link rel="icon" type="image/x-icon" href="<?= htmlspecialchars($favicon, ENT_QUOTES); ?>">
            <!-- Tittle -->
            <title><?= htmlspecialchars($tittle, ENT_QUOTES); ?></title>
        </head>

    <body>

        <!-- ■■■■■■■■ NavBar ■■■■■■■■-->  

            <nav class="navbar navbar-expand-md navbar-light navbar-container1 position-sticky">
            
                <div class="container-fluid background">

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-toggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse nav-list1 navbar1" id="navbar-toggler">

                    <a class="navbar-brand" href="#">
                    <img src="../../../public/images/Batch/batch_logo.png" alt="logo Batch Tramites y Procesos" class="logo1" alt="logo Batch Tramites y Procesos" aria-label="logo Batch Tramites y Procesos">
                    </a> 

                    <ul class="navbar-nav d-flex justify-content-center align-items-center nav-list2">
                    <li class="nav-item1">
                        <a aria-current="page" href="../Batch/Index.php"> Inicio </a>
                    </li>
                    <li class="nav-item1">
                        <a aria-current="page" href="#about-us"  title="Sepa más sobre quiénes somos y cómo podemos ayudarlo"> Quienes somos </a>
                    </li>
                    <li class="nav-item1">
                        <a href="../Batch/services.php" title="Descubra nuestros servicios"> Servicios </a>
                    </li>
                    <li class="nav-item1">
                        <a href="#contact" title="¡Contactenos para saber más de nosotros!"> Contacto </a>
                    </li>
                    <li class="nav-item1">
                        <a href="#" id='login-link' title="¡Ingrese a su cuenta para un mejor servicio!" data-bs-target="#exampleModalToggle" data-bs-toggle="modal"> Ingresar </a>
                    </li>
                    </ul>

                </div>
                
                </div>
        
            </nav>

        <!-- ■■■■■■■■ Modal · Login ■■■■■■■■-->  

            <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">

                    <div class="modal-header">
                        <h1 class="loginTitle fs-5 mb-0" id="exampleModalToggleLabel"> Ingrese a su cuenta </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form id="login-form" class="visible form" action="../../Controller/login.php" method="POST">
                            <div class='row'> 

                                <div class='col-6'>
                                    <img class='img-fluid' src="../../../public/images/Batch/batch_logo.png" alt="grafico de barras con flecha incrementandose">
                                </div>

                                <div class='col-6 d-flex align-items-center justify-content-center p-1 formLogin'>
                                    <div class='w-75 login'>
                                        <label for="user_login" class="form-label"> Usuario:</label>
                                        <input type="text" class="form-control" name="user_login" placeholder="Ingrese su Usuario" required>
                                        <label for="password_login" class="form-label mt-3"> Contraseña:</label>
                                        <input type="password" class="form-control" name="password_login" placeholder="Ingrese su Contraseña" required>
                                        <button type="submit" class="btnLogin mt-4"><i class="bi bi-box-arrow-in-right"></i>Ingresar</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>

                    <div class="modal-footer">
                        <a href='#' data-bs-target="#exampleModalToggle2" data-bs-toggle="modal"> ¿No tiene cuenta? ¡Cree su cuenta aquí!</a>
                    </div>

                </div>
            </div>
            </div>

            <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                        
                    <div class="modal-header">
                        <h1 class="loginTitle fs-5 mb-0" id="exampleModalToggleLabel2"> Registrese en Batch</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                        <form id="register-form" class='form' action="../../Controller/insert_user.php" method="POST">
                            <div class='row d-flex justify-content-center'>
                                <div class='col-5 login p-1 ps-1 formLogin'>         
                                    <label for="name" class="form-label mt-2"> Nombre:</label>
                                    <input type="text" class="form-control" name="name"  id="name" pattern="[A-Za-Z-_]+" maxlength="50" placeholder="Ingrese su nombre" required>
                                    <label for="lastN" class="form-label mt-3"> Apellido:</label>
                                    <input type="text" class="form-control" name="lastN"  id="lastN" pattern="[A-Za-Z-_]+" maxlength="50" placeholder="Ingrese su apellido" required>
                                    <label for="company" class="form-label mt-3"> Empresa:</label>
                                    <input type="text" class="form-control" name="company" id="company" pattern="[0-9A-Za-Z-_]+" maxlength="50"  placeholder="Ingrese la empresa a la que pertenece" required>
                                    <label for="phone" class="form-label mt-3"> Telefono:</label>
                                    <input type="text" class="form-control" name="phone"  id="phone" pattern="[0-9+-]+" maxlength="20" placeholder="Ingrese su telefono" required>
                                    <label for="city" class="form-label mt-3"> Localidad:</label>
                                    <input type="text" class="form-control" name="city" id="city" pattern="[A-Za-Z]+" maxlength="20"  placeholder="Ingrese su ciudad" required>
                                    <label for="country" class="form-label mt-3"> País:</label>
                                    <input type="text" class="form-control" name="country"  id="country" pattern="[A-Za-Z]+" maxlength="20" placeholder="Ingrese su pais" required>
                                    <label for="gender" class="form-label mt-3"> Ingrese su género:</label>
                                    <input type="text" class="form-control" name="gender" id="gender" pattern="[A-Za-Z]+" maxlength="20"  placeholder="Ingrese su género" required>
                                    <label for="birthDate" class="form-label mt-3 mb-3"> Fecha de Nacimiento:</label>
                                    <input type="date" class="form-control" name="birthDate"  id="birthDate" pattern="[0-9-()-]+" maxlength="20" placeholder="Ingrese su fecha de nacimiento" required>
                                </div>

                                <div class='col-5 login p-1 d-flex flex-column ps-5 formLogin'>
                                    <label for="user" class="form-label mt-2"> Usuario:</label>
                                    <input type="text" class="form-control" name="user" id="user" pattern="[0-9A-Za-Z-_]+" maxlength="20" placeholder="Ingrese un nombre de usuario" required>
                                    <label for="password" class="form-label mt-3"> Contraseña:</label>
                                    <input type="password" class="form-control" name="password" id="password" pattern="[0-9A-Za-Z-_]+" maxlength="25" placeholder="Ingrese una contraseña" required>
                                    <label for="password2" class="form-label mt-3"> Repita su contraseña:</label>
                                    <input type="password" class="form-control" name="password2" id="password2" pattern="[0-9A-Za-Z-_]+" maxlength="25" placeholder="Repita la contraseña" required>
                                    <label for="email" class="form-label mt-3"> Email:</label>
                                    <input type="text" class="form-control" name="email" id="email" maxlength="100"  placeholder="Ingrese su email" required>
                                    <label for="email" class="form-label mt-3"> Repita su email:</label>
                                    <input type="text" class="form-control" name="email2" id="email2" maxlength="100" placeholder="Repita su email" required>
                                    
                                    <button type="submit" id='btnInsertFormUser' class="btnLogin mt-5 justify-self-center"><i class="bi bi-person-vcard"></i>Registrarse</button>
                                </div>
                          
                            </div>
                        </form>  
                    </div>

                    <div class="modal-footer">
                        <a id='toggleLogin2' href='#' data-bs-target="#exampleModalToggle" data-bs-toggle="modal"> ¿Ya posee una cuenta? Ingrese aquí</a>
                    </div>

                </div>
            </div>
            </div>
        
    
        <!-- ■■■■■■■■ Checking get variable to open Login modal when redirected ■■■■■■■■-->  

            <?php 

                if(isset($_GET['login'])){
                    echo "<script>";
                    echo "let loginLink = document.getElementById('login-link');";
                    echo "loginLink.addEventListener('click',(event)=>{event.preventDefault();});";
                    echo "loginLink.click();";
                    echo "</script>";
                }
            ?>
