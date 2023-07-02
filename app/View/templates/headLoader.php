
<!DOCTYPE html>
<html lang="en">

    <!-- ■■■■■■■■ Head · Imports and meta tags ■■■■■■■■-->  

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" type="text/css" href="../../../public/css/Batch/styles.css">

            <link rel="stylesheet" href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css'>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
            <!-- <link rel="stylesheet" href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'> -->
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
                        <a href="../CRM/loginNT.php" title="¡Ingrese a su cuenta para un mejor servicio!"> Ingresar </a>
                    </li>
                    </ul>

                </div>
                
                </div>
        
            </nav>
