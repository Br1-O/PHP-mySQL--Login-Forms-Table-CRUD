<?php
  $tittle= 'Batch · Nuestros servicios';
  $favicon='../../../public/images/Batch/Logotipo solo.jpg';
  require '../templates/headLoaderBatch.php';
?>

<html>
<body>

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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script type="text/javascript" src="../../../public/js/login.js"></script>

  <?php
    require '../templates/footerLoader.php';
  ?>
 
</html>