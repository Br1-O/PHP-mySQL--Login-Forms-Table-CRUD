<?php
  $tittle= "Batch · Trámites y Procesos";
  require 'headLoader.php';
?>

<html>
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
            <a aria-current="page" href="Index.php"> Inicio </a>
          </li>
          <li class="nav-item1">
            <a aria-current="page" href="#about-us"> Quienes somos </a>
          </li>
          <li class="nav-item1">
            <a href="#"> Servicios </a>
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

<!-- ■■■■■■■■ Hero Section ■■■■■■■■-->  
  
  <main>

    <!-- ■■■■■■■■ Header ■■■■■■■■-->  
  
      <section class="intro-services d-flex">
        <div class="intro d-flex flex-column">

          <h1 class='tittle-services'> ¿Te resulta agobiante el proceso de gestión de trámites? </h1>
          <p class='subp-services align-self-center'>Conoce las soluciones que hemos diseñado para hacer tu vida más fácil:</p>
        
        </div>
      </section>

    

    <!-- ■■■■■■■■ Carrousel ■■■■■■■■-->  

      <section class='nav-tabs-section'>

        <nav>
          <div class="nav nav-underline d-flex justify-content-center" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-anteproyecto" aria-selected="true">
              Anteproyecto
            </button>
            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-planos constructivos" aria-selected="false">
              Planos constructivos
            </button>
            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-permisos de construcción" aria-selected="false">
              Permisos de construcción
            </button>
            <button class="nav-link" id="nav-disabled-tab" data-bs-toggle="tab" data-bs-target="#nav-disabled" type="button" role="tab" aria-controls="nav-permisos de ocupación" aria-selected="false">
              Permisos de ocupación
            </button>
            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-Trámites post-ocupación" aria-selected="false">
              Trámites post-ocupación
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
                
                <h2><u>Anteproyecto</u></h2>

                <p>
                Revisión de plano de anteproyecto y documentación de acuerdo a las normas vigentes y requerimientos de las distintas entidades.
                </p>

                <ul>
                  <li>Revisión del plano </li>
                  <li>Documentación acorde a las normas vigentes</li>
                  <li>Ajustado a los requerimientos de las entidades</li>
                </ul>

                <div>
                  <img class="tab1-img2" src="../../../public/images/Batch/batch stadistics.png" alt="Batch estadisticas, 500% más rápido que los demás">
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


      <!-- ■■■■■■■■ Form ■■■■■■■■-->  

        <section class="form-container1">

          <h2>Solicita más información</h2>

          <form class='row form1' action="../Controller/insert_consultation" method='POST'>

            <div class="form-col1 col-xl-6 col-lg-9 col-md-8 col-sm-8 col-8">
            
              <label class='form-label1' for="name">*Nombre de la empresa</label>
              <input class='form-input1' type="text" name='name' placeholder="Escribe aquí el nombre de tu empresa">

              <label class='form-label1' for="nameResponsible">*Nombre completo</label>
              <input class='form-input1' type="text" name='nameResponsible' placeholder="Escribe aquí tu nombre completo">

              <label class='form-label1' for="positionResponsible">*Cargo</label>
              <input class='form-input1' type="text" name='positionResponsible' placeholder="Escribe aquí tu cargo">

              <label class='form-label1' for="phoneResponsible">*Teléfono</label>
              <input class='form-input1' type="text" name='phoneResponsible' placeholder="Escribe aquí tu teléfono">

              <label class='form-label1' for="emailResponsible">*Correo electrónico</label>
              <input class='form-input1' type="text" name='emailResponsible' placeholder="Escribe aquí tu correo">
            
            </div>

            <div class="form-col2 col-xl-5 col-lg-9 col-md-8 col-sm-8 col-8">
              
              <div class='radio-container1'>
                <input class='form-radio1' type="radio" name='request'>
                <label class='form-label1 radio-label1' >Quiero pedir un presupuesto</label>
              </div>

              <div class='radio-container1'>
                <input class='form-radio1' type="radio" name='request'>
                <label class='form-label1 radio-label' >Quiero hacer una consulta</label>
              </div>

              <label class='form-label1 text-area-label1' for="">*Favor indicar...</label>
              <textarea name="message" id='text-area' class='form-input1' cols="50" rows="40" placeholder="Por favor, escribe aquí tu consulta..."></textarea>

              <button>Enviar <i class="bi bi-send"></i></button>

            </div>
            
          </form>
        </section>

    </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <!-- ■■■■■■■■ Wavy-div ■■■■■■■■--> 
      <div class='wavy-div'>
        <svg width="100%" height="10rem" viewBox="0 0 1000 1000" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" overflow="auto" shape-rendering="auto">
          <rect width="100%" height="100%" fill="#F6F6F6" />
          <defs>
            <path id="wavepath" d="M 0 1000 0 400 Q 150 106 300 500 t 300 0 300 0 300 500 300 0 300 0  v1000 z" /> 
          </defs>
          <g>
            <use xlink:href="#wavepath" y="243" fill="#00329d"></use>
          </g>
        </svg>
      </div>
</body>

  <!-- ■■■■■■■■ Footer ■■■■■■■■-->  

    <footer class='footer1' aria-label="Contacto y Ubicación">

      <div class="footer-container1 even-columns1 row">
        <div class='col-xl-3 col-lg-4 col-md-8 col-sm-8 col-8'>
          <h3> <i class="bi bi-info-circle"></i>Nuestra empresa</h3>
          <ul>
            <li><a href="#">Sobre nosotros</a></li>
            <li><a href="#">Términos y condiciones</a></li>
            <li><a href="#">Preguntas frecuentes</a></li>
          </ul>
        </div>
          
        <div id='contact' class='col-xl-3 col-lg-4 col-md-8 col-sm-8 col-8' aria-label="Telefono y Email">
          <h3> <i class="bi bi-telephone"></i>Contáctanos</h3>
          <ul>
            <li><p>Tel: 4000-4000</p></li>
            <li><a href="mailto:info@batchpanama.com" target="_blank" rel="noopener noreferrer">
                <p>Mail: info@batchpanama.com</p></a>
            </li>
          </ul>
        </div>

        <div class='col-xl-4 col-lg-4 col-md-8 col-sm-8 col-8' aria-label="Dirección Fisica">
          <h3><i class="bi bi-geo-alt"></i>Nuestras oficinas</h3>
          <ul>
            <li><p>Plaza Ramos, 300 mts oeste de la Sabana, Monterrico, Papá Noel</p></li>
            <li><a href="#">Ver en el mapa</a></li>
          <ul>
        </div>
      </div>

    </footer>

</html>