<?php
require_once '../../Controller/session_validation.php';
$tittle='Listado de Usuarios';
require '../templates/headLoaderCRM.php';
?>

<body>

    <?php
        require_once "../templates/navBarCRM.php";
    ?>

    <!-- ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Modals | Insert User · Show Full User ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■  -->
       
        <!--·■■■ Insert Modal ■■■-->

            <dialog class='modal' id='modalInsertUser'>

                <div class="div-modal">
                <button name="btn-close-Modal" id='closeInsertUser'>Cerrar</button>
                
                <div id="titulo">
                    <h1 class='titulo-modal'> · Ingrese los datos del Usuario, <?php echo $_SESSION['name']; ?>. · </h1>
                </div>

                <form id='formInsertUser' class= 'form evenColumns'>

                    <div class='formColumn'>

                        <!-- User -->
                        <label for="user">Usuario:</label>
                        <input type="text" id="user" name="user" required placeholder="Por favor, ingrese el usuario">
                
                        <!-- Password -->
                        <label for="password">Password:</label>
                        <input type="text" id="password" name="password" required placeholder="Por favor, ingrese la contraseña">
                        
                        <!-- role -->
                        <label for="role"> Rol:</label>
                        <select name="role" id='role'>
                            <option value="option" selected disabled>Selecciona el Rol: </option>
                            <option value=999>Admin</option>
                            <option value=0>Cliente</option>
                            <option value=1>Scrum Master</option>
                            <option value=2>First Contact</option>
                            <option value=3>Vendedor</option>
                        </select>

                        <!-- name -->
                        <label for="name">Nombre:</label>
                        <input type="text" id="name" name="name" placeholder="Por favor, ingrese el nombre">
                        
                        <!-- Industry -->
                        <label for="lastN">Apellido:</label>
                        <input type="text" id="lastN" name="lastN" placeholder="Por favor, ingrese el apellido">
                        
                        <!-- Services -->
                        <label for="birthDate">Fecha de Nacimiento:</label>
                        <input type="date" id="birthDate" name="birthDate" placeholder="Por favor, ingrese la fecha de nacimiento">
                    <div>

                    <div class='formColumn'>

                        <!-- Gender -->
                        <label for="gender">Genero:</label>
                        <input type="text" id="gender" name="gender"  placeholder="Por favor, ingrese el genero">

                        <!-- Company -->
                        <label for="company">Compañia:</label>
                        <input type="text" id="company" name="company" placeholder="Por favor, ingrese la compañia">

                        <!-- Email -->
                        <label for="email">Correo Electrónico:</label>
                        <input type="email" id="email" name="email" placeholder="Por favor, ingrese el correo electrónico">

                        <!-- Phone -->
                        <label for="phone">Teléfono:</label>
                        <input type="tel" id="phone" name="phone" placeholder="Por favor, ingrese el teléfono">
                        
                        <!-- Country -->
                        <label for="country">País:</label>
                        <input type="text" id="country" name="country" placeholder="Por favor, ingrese el país">
                        
                        <!-- City -->
                        <label for="city">Ciudad:</label>
                        <input type="text" id="city" name="city" placeholder="Por favor, ingrese la ciudad">

                        <!-- Submit Button -->
                        <button id='btnInsertUser' type="submit">Cargar usuario</button>

                    </div>

                </form>
            </dialog>

        <!--·■■■ PUT Modal ■■■-->

            <dialog class='modal' id='modalEditUser'>

                <div class="div-modal">
                <button name="btn-close-Modal" id='closeEditUser'>Cerrar</button>

                <div id="titulo">
                    <h1 class='titulo-modal'> · Modifique los datos del Usuario, <?php echo $_SESSION['name']; ?>. · </h1>
                </div>

                <form id='formEditUser' class= 'form evenColumns'>

                    <div class='formColumn'>

                        <!-- User -->
                        <label for="user">Usuario:</label>
                        <input type="text" id="userEdit" name="user" required placeholder="Por favor, ingrese el usuario">

                        <!-- Password -->
                        <label for="password">Password:</label>
                        <input type="text" id="passwordEdit" name="password" required placeholder="Por favor, ingrese la contraseña">
                        
                        <!-- role -->
                        <label for="role"> Rol:</label>
                        <select name="role" id='roleEdit'>
                            <option value="option" selected disabled>Selecciona el nuevo Rol: </option>
                            <option value=999>Admin</option>
                            <option value=0>Cliente</option>
                            <option value=1>Scrum Master</option>
                            <option value=2>First Contact</option>
                            <option value=3>Vendedor</option>
                        </select>

                        <!-- name -->
                        <label for="name">Nombre:</label>
                        <input type="text" id="nameEdit" name="name" placeholder="Por favor, ingrese el nombre">
                        
                        <!-- Industry -->
                        <label for="lastN">Apellido:</label>
                        <input type="text" id="lastNEdit" name="lastN" placeholder="Por favor, ingrese el apellido">
                        
                        <!-- Services -->
                        <label for="birthDate">Fecha de Nacimiento:</label>
                        <input type="date" id="birthDateEdit" name="birthDate" placeholder="Por favor, ingrese la fecha de nacimiento">
                    <div>

                    <div class='formColumn'>

                        <!-- Gender -->
                        <label for="gender">Genero:</label>
                        <input type="text" id="genderEdit" name="gender"  placeholder="Por favor, ingrese el genero">

                        <!-- Company -->
                        <label for="company">Compañia:</label>
                        <input type="text" id="companyEdit" name="company" placeholder="Por favor, ingrese la compañia">

                        <!-- Email -->
                        <label for="email">Correo Electrónico:</label>
                        <input type="email" id="emailEdit" name="email" placeholder="Por favor, ingrese el correo electrónico">

                        <!-- Phone -->
                        <label for="phone">Teléfono:</label>
                        <input type="tel" id="phoneEdit" name="phone" placeholder="Por favor, ingrese el teléfono">
                        
                        <!-- Country -->
                        <label for="country">País:</label>
                        <input type="text" id="countryEdit" name="country" placeholder="Por favor, ingrese el país">
                        
                        <!-- City -->
                        <label for="city">Ciudad:</label>
                        <input type="text" id="cityEdit" name="city" placeholder="Por favor, ingrese la ciudad">

                        <!-- City -->
                        <label for="photo">Foto:</label>
                        <input type="text" id="photo" name="photo" placeholder="Por favor, ingrese la foto del usuario">

                        <!-- City -->
                        <label for="validatedEmail">Email Validado:</label>
                        <input type="checkbox" id="validatedEmailEdit" name="validatedEmail" value=1 placeholder="Por favor, ingrese si el email está validado">

                        <!-- Submit Button -->
                        <button id='btnEditUser' type="submit">Cargar usuario</button>

                    </div>

                </form>
                </dialog>



        <!--·■■■ Full data Modal ■■■-->

            <!-- <dialog class='modal' id='modalCompany'>
                <div class="div-modal">
                    <button name="btn-close-Modal" id='closeCompany' >Cerrar</button>
                </div>
            </dialog> -->

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

    <!-- ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Check for GET actions ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■  -->   
            
        <?php

            if(isset($_GET['action']) && $_GET['action']=='insert'){
                ?>
                    <script>
                        openModal(insertUser);
                    </script>
                <?php
            }
        ?>

</body>

</html>