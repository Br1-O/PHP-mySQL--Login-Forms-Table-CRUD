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
            <a aria-current="page" href="#"> Inicio </a>
          </li>
          <li class="nav-item1">
            <a aria-current="page" href="#about-us"  title="Sepa más sobre quiénes somos y cómo podemos ayudarlo"> Quienes somos </a>
          </li>
          <li class="nav-item1">
            <a href="services.php" title="Descubra nuestros servicios"> Servicios </a>
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
  
      <section class="blueprint-container1">
        <div class="blueprint1">

          <h1 class='tittle1'> Tus trámites y procesos, de manera simple </h1>
          <p class='subp1'>Occaecat est ipsum reprehenderit reprehenderit veniam anim laborum est esse duis occaecat reprehenderit pariatur.</p>
          <button class='btn-blueprint1'> Empieza ahora </button>
          <a href="#">Conoce más</a>
        
        </div>
      </section>

    <!-- ■■■■■■■■ Main ■■■■■■■■-->  

      <section class="solutions-container1">       
        <!--■■■■■■ First part · Splash Image and cards 2x2 with hover overlay effect ■■■■■■-->
          
          <article>

            <h2> 4 soluciones diseñadas para <u>simplificar tus procesos</u> </h2>

            <div class="even-columns1 row">
              
              <div class='split-image1 col-xl-5 col-lg-9 col-md-8 col-sm-8 col-8' >
                <img src="../../../public/images/Batch/splash-solutions.png" alt="splash de edificio visto desde abajo" aria-label="imagen splash de edificio visto desde abajo">
              </div>
              
              <div id="valores" class="valores seccion-clara d-flex flex-column col-12 col-md-12 col-lg-12 col-xl-6">
                <div class="container text-center valores-contenedor">
                  <div class="row row-cols-1 row-cols-md-2 g-4 d-flex">
                    <!-- Valor 1 -->
                    <div class="col-12 col-md-6 col-lg-6">
                      <div class="valor">
                        <img src="../../../public/images/Batch/batch_logo.png" alt="valor 1">
                        <div class="overlay">
                          <p>Proyecto 1</p>
                          <div class="iconos-contenedor">
                          <p class="">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin rutrum rhonelibero tellus. Don ornare magna. Aenean nisi ante, finibus non faucibus a, volutpat vel lorem. Morbi nec commodo tortor. Duis vulputate tempor mauris sed ultrices. </p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Valor 2 -->
                    <div class="col-12 col-md-6 col-lg-6">
                      <div class="valor">
                        <img src="../../../public/images/Batch/batch_logo.png" alt="valor 2">
                        <div class="overlay">
                          <p>Proyecto 2</p>
                          <div class="iconos-contenedor">
                            <p class="">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin rutrum rhonelibero tellus. Don ornare magna. Aenean nisi ante, finibus non faucibus a, volutpat vel lorem. Morbi nec commodo tortor. Duis vulputate tempor mauris sed ultrices. </p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Valor 3 -->
                    <div class="col-12 col-md-6 col-lg-6">
                      <div class="valor">
                        <img src="../../../public/images/Batch/batch_logo.png" alt="valor 3">
                        <div class="overlay">
                          <p>Proyecto 3</p>
                          <div class="iconos-contenedor">
                          <p class="">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin rutrum rhonelibero tellus. Don ornare magna. Aenean nisi ante, finibus non faucibus a, volutpat vel lorem. Morbi nec commodo tortor. Duis vulputate tempor mauris sed ultrices. </p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- valor 4 -->
                    <div class="col-12 col-md-6 col-lg-6">
                      <div class="valor">
                        <img src="../../../public/images/Batch/batch_logo.png" alt="valor 4">
                        <div class="overlay">
                          <p>Proyecto 4</p>
                          <div class="iconos-contenedor">
                            <p class="">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin rutrum rhonelibero tellus. Don ornare magna. Aenean nisi ante, finibus non faucibus a, volutpat vel lorem. Morbi nec commodo tortor. Duis vulputate tempor mauris sed ultrices. </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          </article>

        <!--■■■■■■ Second part · Flame&Wave/Companies GRID ■■■■■■-->

          <article class='flame-wave-container1 overlay-container1'>

            <h2 class='flame-h2'> Empresas que <u>nos respaldan</u> </h2>

            <div class="flameWave row row-cols-1 row-cols-md-2 g-4 d-flex">
            
              <div class='grid-icons1 col-6'>
                <span class="icon-circle1">
                  <a href="#" class="circle-anchor1"></a>
                </span>
                <span class="icon-circle1">
                  <a href="#" class="circle-anchor1"></a>
                </span>
                <span class="icon-circle2">
                  <a href="#" class="circle-anchor1"></a>
                </span>
                <span class="icon-circle3">
                  <a href="#" class="circle-anchor1"></a>
                </span>
              </div>

              <div class="wave">

                <h2> Tus trámites y procesos, de manera simple </h1>
                <button> Empieza ahora </button>

              </div>

            </div>

          </article>

      </section>

    <!-- ■■■■■■■■ Carrousel ■■■■■■■■-->  

      <section class='opinions-section'>

        <h2> Lo que dicen de nosotros </h2>

        <div class="carrousel1">
            
          <div id="testimonios-carousel" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-inner">

              <div class="carousel-item active">
                <div class="container">
                  <img class="testimonio-imagen rounded-circle" src="../../../public/images/Batch/Recomendación ejemplo.png" alt="foto de cliente 1">
                  <p class="testimonio-texto english">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin rutrum rhonelibero tellus. Don ornare magna. Aenean nisi ante, finibus non faucibus a, volutpat vel lorem. Morbi nec commodo tortor. Duis vulputate tempor mauris sed ultrices. </p>
                  <div class="testimonio-info">
                    <p class="nombre_cliente">Gino</p>
                    <p class="cargo_cliente english">Manager of Constructora S.A. 1</p>
                  </div>
                </div>
              </div>

              <div class="carousel-item">
                <div class="container">
                  <img class="testimonio-imagen rounded-circle" src="../../../public/images/Batch/Recomendación ejemplo.png" alt="foto de cliente 2">
                  <p class="testimonio-texto english">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin rutrum rhonelibero tellus. Don ornare magna. Aenean nisi ante, finibus non faucibus a, volutpat vel lorem. Morbi nec commodo tortor. Duis vulputate tempor mauris sed ultrices. </p>
                  <div class="testimonio-info">
                    <p class="nombre_cliente">Nora</p>
                    <p class="cargo_cliente english">Manager of Constructora S.A. 2</p>
                  </div>
                </div>
              </div>

              <div class="carousel-item">
                <div class="container">
                  <img class="testimonio-imagen rounded-circle" src="../../../public/images/Batch/Recomendación ejemplo.png" alt="foto de cliente 3">
                  <p class="testimonio-texto">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin rutrum rhonelibero tellus. Don ornare magna. Aenean nisi ante, finibus non faucibus a, volutpat vel lorem. Morbi nec commodo tortor. Duis vulputate tempor mauris sed ultrices. </p>
                  <div class="testimonio-info">
                    <p class="nombre_cliente">Leonardo</p>
                    <p class="cargo_cliente">Director of Constructora S.A. 3</p>
                  </div>
                </div>
              </div>            
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#testimonios-carousel" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#testimonios-carousel" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>

          </div>
        </div>
      </section>

    <!-- ■■■■■■■■ Form ■■■■■■■■-->  

      <section class="form-container1">

        <h2>Solicita más información</h2>

        <form class='row form1' action="../../Controller/insert_consultation" method='POST'>

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