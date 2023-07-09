<?php 
require_once '../../Model/classes/autoload.php';
$tittle='Batch · Login';
require_once '../templates/headLoaderBatch.php';
require '../templates/headLoaderCRM.php';
$conn->createUsersTable();
?>


<html>

  <body>
    <div class="container">
      <div class="form-container">

        <form id="login-form" class="visible form" action="../../Controller/login.php" method="POST">
          <h2>· Ingrese a su cuenta ·</h2>
          <label for="user_login">» Usuario:</label>
          <input type="text" name="user_login" placeholder="Ingrese su Usuario" required>
          <label for="password_login">» Contraseña:</label>
          <input type="password" name="password_login" placeholder="Ingrese su Contraseña" required>
          <button type="submit">Ingresar</button>
          
          <div class="toggle-form">
            <button type="button" id="register-btn">Registrarse</button>
          </div>
        </form>
          

        <form id="register-form" class='form' action="../../Controller/insert_user.php" method="POST">

          <h2>· Cree su cuenta · </h2>

          <label for="user">» Usuario:</label>
          <input type="text" name="user" id="user" pattern="[0-9A-Za-Z-_]+" maxlength="20" placeholder="Ingrese un nombre de usuario" required>
          <label for="password">» Contraseña:</label>
          <input type="password" name="password" id="password" pattern="[0-9A-Za-Z-_]+" maxlength="25" placeholder="Ingrese una contraseña" required>
          <label for="password2">» Repita su contraseña:</label>
          <input type="password" name="password2" id="password2" pattern="[0-9A-Za-Z-_]+" maxlength="25" placeholder="Repita la contraseña" required>
          <label for="name">» Nombre:</label>
          <input type="text" name="name"  id="name" pattern="[A-Za-Z-_]+" maxlength="50" placeholder="Ingrese su nombre" required>
          <label for="lastN">» Apellido:</label>
          <input type="text" name="lastN"  id="lastN" pattern="[A-Za-Z-_]+" maxlength="50" placeholder="Ingrese su apellido" required>
          <label for="company">» Empresa:</label>
          <input type="text" name="company" id="company" pattern="[0-9A-Za-Z-_]+" maxlength="50"  placeholder="Ingrese la empresa a la que pertenece" required>
          <label for="email">» Email:</label>
          <input type="text" name="email" id="email" maxlength="100"  placeholder="Ingrese su email" required>
          <label for="email">» Repita su email:</label>
          <input type="text" name="email2" id="email2" maxlength="100" placeholder="Repita su email" required>
          <label for="phone">» Telefono:</label>
          <input type="text" name="phone"  id="phone" pattern="[0-9+-]+" maxlength="20" placeholder="Ingrese su telefono" required>
          <label for="city">» Localidad:</label>
          <input type="text" name="city" id="city" pattern="[A-Za-Z]+" maxlength="20"  placeholder="Ingrese su ciudad" required>
          <label for="country">» País:</label>
          <input type="text" name="country"  id="country" pattern="[A-Za-Z]+" maxlength="20" placeholder="Ingrese su pais" required>
          <label for="gender">» Ingrese su género:</label>
          <input type="text" name="gender" id="gender" pattern="[A-Za-Z]+" maxlength="20"  placeholder="Ingrese su género" required>
          <label for="birthDate">» Fecha de Nacimiento:</label>
          <input type="date" name="birthDate"  id="birthDate" pattern="[0-9-()-]+" maxlength="20" placeholder="Ingrese su fecha de nacimiento" required>
  
          <button type="submit" id='btnInsertFormUser'>Registrarse</button>
          
          <div class="toggle-form">
            <button type="button" id="login-btn">Ingresar</button>
          </div>
        </form>  
      </div>
    </div>
  
  <!--■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Js Imports and instantiation ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■-->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="../../../public/js/login.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
 
  <?php
    include_once '../templates/footerLoader.php';
  ?>

</html>