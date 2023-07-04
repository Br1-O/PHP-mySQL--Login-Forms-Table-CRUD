<?php 
require_once '../../Model/classes/autoload.php';
include_once '../templates/headLoaderBatch.php';
$title='Login';
require '../templates/headLoaderCRM.php';
$conn->createUsersTable();
?>


<html>

  <body>
    <div class="container">
      <div class="form-container">

        <form id="login-form" class="visible form" action="../../Controller/login.php" method="POST">
          <h2>· Ingrese a su cuenta <?= $_SESSION['name'] ?> ·</h2>
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
          <input type="text" name="user" pattern="[0-9A-Za-Z-_]+" maxlength="20" placeholder="Ingrese un nombre de usuario" required>
          <label for="password">» Contraseña:</label>
          <input type="password" name="password" pattern="[0-9A-Za-Z-_]+" maxlength="25" placeholder="Ingrese una contraseña" required>
          <label for="password2">» Repita su contraseña:</label>
          <input type="password" name="password2" pattern="[0-9A-Za-Z-_]+" maxlength="25" placeholder="Repita la contraseña" required>
          <label for="name">» Nombre:</label>
          <input type="text" name="name"  pattern="[A-Za-Z-_]+" maxlength="50" placeholder="Ingrese su nombre" required>
          <label for="lastN">» Apellido:</label>
          <input type="text" name="lastN"  pattern="[A-Za-Z-_]+" maxlength="50" placeholder="Ingrese su apellido" required>
          <label for="company">» Empresa:</label>
          <input type="text" name="company" pattern="[0-9A-Za-Z-_]+" maxlength="50"  placeholder="Ingrese la empresa a la que pertenece" required>
          <label for="email">» Email:</label>
          <input type="text" name="email" maxlength="100"  placeholder="Ingrese su email" required>
          <label for="email">» Repita su email:</label>
          <input type="text" name="email2" maxlength="100" placeholder="Repita su email" required>
          <label for="phone">» Telefono:</label>
          <input type="text" name="phone"  pattern="[0-9+-]+" maxlength="20" placeholder="Ingrese su telefono" required>
          <label for="city">» Localidad:</label>
          <input type="text" name="city" pattern="[A-Za-Z]+" maxlength="20"  placeholder="Ingrese su ciudad" required>
          <label for="country">» País:</label>
          <input type="text" name="country"  pattern="[A-Za-Z]+" maxlength="20" placeholder="Ingrese su pais" required>
          <label for="gender">» Ingrese su género:</label>
          <input type="text" name="gender" pattern="[A-Za-Z]+" maxlength="20"  placeholder="Ingrese su género" required>
          <label for="birthDate">» Fecha de Nacimiento:</label>
          <input type="date" name="birthDate"  pattern="[0-9-()-]+" maxlength="20" placeholder="Ingrese su fecha de nacimiento" required>
  
          <button type="submit">Registrarse</button>
          
          <div class="toggle-form">
            <button type="button" id="login-btn">Ingresar</button>
          </div>
        </form>  
      </div>
    </div>
 
  <?php
    include_once '../templates/footerLoader.php';
  ?>

</html>