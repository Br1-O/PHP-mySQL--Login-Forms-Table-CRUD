<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="../plugins/toastr/toastr.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login </title>

  <style>
    
    body {
        background: linear-gradient(to bottom, #8d8de3, #a874cd);
        /* background-color: #464546; */
        background-size: cover;
        font-family: Arial, sans-serif;
    }

    h2{
        margin-top: 20%;
        color: #4c2a85;
    }

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .form-container {
        display: flex;
        flex-direction: row;
    }

    .form-container form {
        display: none;
        max-width: 500px;
        margin: 20px auto;
        background-color: #d092f250;
        padding: 20px;
        border-radius: 5% 0% 5% 5%;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        color: #ffffff;
    }

    

    .form-container form.visible {
        display: block;
    }

    .form-container form h2 {
        text-align: center;
    }

    .form-container form input[type="text"],
    .form-container form input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        box-sizing: border-box;
    }

    .form-container form button {
        background-color: #4c2a85;
        color: #ffffff;
        padding: 10px 20px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        margin-top: 20px;
        
    }

    .form-container form button:hover {
        background-color: #693bb2;
    }

    .form-container .toggle-form {
        display:inline-flex;
        justify-content:right;
        align-items:center;
        margin-left: 20px;
       
    }

    .form-container .toggle-form button {
        background-color: #4c2a85;
    }

    .form-container .toggle-form button:hover {
        background-color:  #693bb2;
    }

    .link-empresas {

        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
        margin-left: 20px;
        background-color: #4c2a85;
    }

    .link-empresas {
        max-width: 500px;
        position: relative;
        margin-top: 20%;
        margin: 20px auto;
        background-color: #cd97ea50;
        padding: 20px;
        border-radius: 0% 5% 5% 0% ;
    }

    .link {
        background-color: #4c2a85;
        color: #ffffff;
        padding: 15px;
        border-radius: 5%;

    }

    .link:hover {
        background-color: #693bb2;
    }

    input {
        background-color: #d092f250;
        border: none;
        color: rgb(255, 255, 255);
        margin-top: 10px;
  }

  label{
    color: rgb(255, 255, 255);

  }

  ::placeholder { 
  color: rgb(247, 245, 245, 0.7);
  opacity: 1; 
}
  </style>
</head>

<body>
  <div class="container">
    <div class="form-container">

      <form id="login-form" class="visible" action="../Controller/login.php" method="POST">
        <h2>· Ingrese a su cuenta ·</h2>
        <label for="usuario_login">» Usuario:</label>
        <input type="text" name="usuario_login" placeholder="Ingrese su Usuario" required>
        <label for="password_login">» Contraseña:</label>
        <input type="password" name="password_login" placeholder="Ingrese su Contraseña" required>
        <button type="submit">Ingresar</button>
        
        <div class="toggle-form">
          <button type="button" id="register-btn">Registrarse</button>
        </div>
      </form>
        

      <form id="register-form" action="../Controller/insert_user.php" method="POST">

        <h2>· Cree su cuenta · </h2>

        <label for="usuario">» Usuario:</label>
        <input type="text" name="usuario" pattern="[0-9A-Za-Z-_]+" maxlength="20" placeholder="Ingrese un nombre de usuario" required>
        <label for="contraseña">» Contraseña:</label>
        <input type="password" name="contraseña" pattern="[0-9A-Za-Z-_]+" maxlength="25" placeholder="Ingrese una contraseña" required>
        <label for="password2">» Repita su contraseña:</label>
        <input type="password" name="password2" pattern="[0-9A-Za-Z-_]+" maxlength="25" placeholder="Repita la contraseña" required>
        <label for="nombre">» Nombre:</label>
        <input type="text" name="nombre"  pattern="[A-Za-Z-_]+" maxlength="50" placeholder="Ingrese su nombre" required>
        <label for="apellido">» Apellido:</label>
        <input type="text" name="apellido"  pattern="[A-Za-Z-_]+" maxlength="50" placeholder="Ingrese su apellido" required>
        <label for="empresa">» Empresa:</label>
        <input type="text" name="empresa" pattern="[0-9A-Za-Z-_]+" maxlength="50"  placeholder="Ingrese la empresa a la que pertenece" required>
        <label for="email">» Email:</label>
        <input type="text" name="email" maxlength="100"  placeholder="Ingrese su email" required>
        <label for="email">» Repita su email:</label>
        <input type="text" name="email" maxlength="100" placeholder="Repita su email" required>
        <label for="telefono">» Telefono:</label>
        <input type="text" name="telefono"  pattern="[0-9+-]+" maxlength="20" placeholder="Ingrese su telefono" required>
        <label for="pais">» País:</label>
        <input type="text" name="pais"  pattern="[A-Za-Z]+" maxlength="20" placeholder="Ingrese su pais" required>
        <label for="localidad">» Localidad:</label>
        <input type="text" name="localidad" pattern="[A-Za-Z]+" maxlength="20"  placeholder="Ingrese su ciudad" required>
         <!-- ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ EL QUE ESTOY USANDO ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ -->
        <button type="submit" class="btn btn-success swalDefaultSuccess">Registrarse</button>
        
        <div class="toggle-form">
          <button type="button" id="login-btn">Ingresar</button>
        </div>
      </form>  
    </div>
  </div>

    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="../plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="../plugins/toastr/toastr.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
    <!-- Page specific script -->

  <script>
    const loginForm = document.getElementById('login-form');
    const registerForm = document.getElementById('register-form');
    const loginBtn = document.getElementById('login-btn');
    const registerBtn = document.getElementById('register-btn');

    loginBtn.addEventListener('click', () => {
      loginForm.classList.add('visible');
      registerForm.classList.remove('visible');
    });

    registerBtn.addEventListener('click', () => {
      loginForm.classList.remove('visible');
      registerForm.classList.add('visible');
    });

    $(function() {
      var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });

      
      // ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ EL QUE ESTOY USANDO ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■

      $('.swalDefaultSuccess').click(function() {
        Toast.fire({
          icon: 'success',
          title: 'Usuario agregado correctamente!'
        })
      });

      // ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ EL QUE ESTOY USANDO ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■


      $('.swalDefaultInfo').click(function() {
        Toast.fire({
          icon: 'info',
          title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
      $('.swalDefaultError').click(function() {
        Toast.fire({
          icon: 'error',
          title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
      $('.swalDefaultWarning').click(function() {
        Toast.fire({
          icon: 'warning',
          title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
      $('.swalDefaultQuestion').click(function() {
        Toast.fire({
          icon: 'question',
          title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });

      $('.toastrDefaultSuccess').click(function() {
        toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
      });
      $('.toastrDefaultInfo').click(function() {
        toastr.info('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
      });
      $('.toastrDefaultError').click(function() {
        toastr.error('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
      });
      $('.toastrDefaultWarning').click(function() {
        toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
      });

      $('.toastsDefaultDefault').click(function() {
        $(document).Toasts('create', {
          title: 'Toast Title',
          body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
      $('.toastsDefaultTopLeft').click(function() {
        $(document).Toasts('create', {
          title: 'Toast Title',
          position: 'topLeft',
          body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
      $('.toastsDefaultBottomRight').click(function() {
        $(document).Toasts('create', {
          title: 'Toast Title',
          position: 'bottomRight',
          body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
      $('.toastsDefaultBottomLeft').click(function() {
        $(document).Toasts('create', {
          title: 'Toast Title',
          position: 'bottomLeft',
          body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
      $('.toastsDefaultAutohide').click(function() {
        $(document).Toasts('create', {
          title: 'Toast Title',
          autohide: true,
          delay: 750,
          body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
      $('.toastsDefaultNotFixed').click(function() {
        $(document).Toasts('create', {
          title: 'Toast Title',
          fixed: false,
          body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
      $('.toastsDefaultFull').click(function() {
        $(document).Toasts('create', {
          body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
          title: 'Toast Title',
          subtitle: 'Subtitle',
          icon: 'fas fa-envelope fa-lg',
        })
      });
      $('.toastsDefaultFullImage').click(function() {
        $(document).Toasts('create', {
          body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
          title: 'Toast Title',
          subtitle: 'Subtitle',
          image: '../../dist/img/user3-128x128.jpg',
          imageAlt: 'User Picture',
        })
      });
      $('.toastsDefaultSuccess').click(function() {
        $(document).Toasts('create', {
          class: 'bg-success',
          title: 'Toast Title',
          subtitle: 'Subtitle',
          body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
      $('.toastsDefaultInfo').click(function() {
        $(document).Toasts('create', {
          class: 'bg-info',
          title: 'Toast Title',
          subtitle: 'Subtitle',
          body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
      $('.toastsDefaultWarning').click(function() {
        $(document).Toasts('create', {
          class: 'bg-warning',
          title: 'Toast Title',
          subtitle: 'Subtitle',
          body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
      $('.toastsDefaultDanger').click(function() {
        $(document).Toasts('create', {
          class: 'bg-danger',
          title: 'Toast Title',
          subtitle: 'Subtitle',
          body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
      $('.toastsDefaultMaroon').click(function() {
        $(document).Toasts('create', {
          class: 'bg-maroon',
          title: 'Toast Title',
          subtitle: 'Subtitle',
          body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
  });

  </script>

</body>
</html>