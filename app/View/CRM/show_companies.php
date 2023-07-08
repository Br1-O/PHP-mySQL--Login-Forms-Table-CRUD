<?php
require_once '../../Controller/session_validation.php';
$tittle='Listado de Empresas';
require '../templates/headLoaderCRM.php';
?>

<body>

    <?php
        require_once "../templates/navBarCRM.php";
    ?>

    <!-- ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Modals | Insert Company · Show Full Company ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■  -->
       
        <!--·■■■ Insert Modal ■■■-->

            <dialog class='modal' id='modalInsertCompany'>

                <div class="div-modal">
                <button name="btn-close-Modal" id='closeInsertCompany'>Cerrar</button>
                
                <div id="titulo">
                    <h1 class='titulo-modal'> · Ingrese los datos de la Empresa, <?php echo $_SESSION['name']; ?>. · </h1>
                </div>

                <form id='formInsertCompany' class= 'form evenColumns'>

                    <div class='formColumn'>
                
                        <!-- Name -->
                        <label for="name">Nombre:</label>
                        <input type="text" id="name" name="name" value="PLACEHOLDER" onfocus="this.value=''" required placeholder="Por favor, ingrese el nombre">
                        
                        <!-- Status -->
                        <label for="status">Estado:</label>
                        <input type="text" id="status" name="status" value="No iniciado" onfocus="this.value=''" placeholder="Por favor, ingrese el estado">
                        
                        <!-- Opportunity Level -->
                        <label for="opportunityLevel">Nivel de Oportunidad:</label>
                        <input type="text" id="opportunityLevel" name="opportunityLevel" value="Desconocido" onfocus="this.value=''" placeholder="Por favor, ingrese el nivel de oportunidad">
                        
                        <!-- Next Action -->
                        <label for="nextAction">Siguiente Acción:</label>
                        <input type="text" id="nextAction" name="nextAction" value="Primer contacto" onfocus="this.value=''" placeholder="Por favor, ingrese la siguiente acción">
                        
                        <!-- Industry -->
                        <label for="industry">Industria:</label>
                        <input type="text" id="industry" name="industry" value="PLACEHOLDER" onfocus="this.value=''" required placeholder="Por favor, ingrese la industria">
                        
                        <!-- Services -->
                        <label for="services">Servicios:</label>
                        <input type="text" id="services" name="services" value="N/A" onfocus="this.value=''" placeholder="Por favor, ingrese los servicios">
                    <div>

                    <div class='formColumn'>

                        <!-- Phone -->
                        <label for="phone">Teléfono:</label>
                        <input type="tel" id="phone" name="phone" pattern="[0-9+-()]" onfocus="this.value=''" required placeholder="Por favor, ingrese el teléfono">
                        
                        <!-- Email -->
                        <label for="email">Correo Electrónico:</label>
                        <input type="email" id="email" name="email" value="PLACE@HOLDER.com" onfocus="this.value=''" required placeholder="Por favor, ingrese el correo electrónico">
                        
                        <!-- Website -->
                        <label for="website">Sitio Web:</label>
                        <input type="text" id="website" name="website" value="N/A" onfocus="this.value=''" laceholder="Por favor, ingrese el sitio web">
                        
                        <!-- Social Media -->
                        <label for="socialMedia">Redes Sociales:</label>
                        <input type="text" id="socialMedia" name="socialMedia[]" multiple placeholder="Por favor, ingrese las redes sociales">
                        
                        <!-- Responsible -->
                        <label for="responsable">Responsable:</label>
                        <input type="text" id="responsable" name="responsable" onfocus="this.value=''" value="N/A" placeholder="Por favor, ingrese el responsable">
                        
                        <!-- Phone Responsible -->
                        <label for="phoneResponsable">Teléfono del Responsable:</label>
                        <input type="tel" id="phoneResponsable" name="phoneResponsable" onfocus="this.value=''" pattern="[0-9+-()]" value="N/A" placeholder="Por favor, ingrese el teléfono del responsable">
                        
                        <!-- Email Responsible -->
                        <label for="emailResponsable">Correo Electrónico del Responsable:</label>
                        <input type="email" id="emailResponsable" name="emailResponsable" value="PLACE@HOLDER.com"  onfocus="this.value=''" placeholder="Por favor, ingrese el correo electrónico del responsable">
                    </div>

                    <div class='formColumn'>

                        <!-- Extra Info (Responsable) -->
                        <label for="extraInfoResponsable">Información Adicional (Responsable):</label>
                        <textarea id="extraInfoResponsable" name="extraInfoResponsable" value="N/A" placeholder="Por favor, ingrese información adicional del responsable"></textarea>
                        
                        <!-- Extra Info (Company) -->
                        <label for="extraInfoCompany">Información Adicional (Empresa):</label>
                        <textarea id="extraInfoCompany" name="extraInfoCompany" value="N/A" onfocus="this.value=''" placeholder="Por favor, ingrese información adicional de la empresa"></textarea>
                            
                        <!-- Address -->
                        <label for="address">Dirección:</label>
                        <input type="text" id="address" name="address" value="N/A" onfocus="this.value=''" placeholder="Por favor, ingrese la dirección">
                        
                        <!-- City -->
                        <label for="city">Ciudad:</label>
                        <input type="text" id="city" name="city" value="PLACEHOLDER" onfocus="this.value=''" required placeholder="Por favor, ingrese la ciudad">
                        
                        <!-- Country -->
                        <label for="country">País:</label>
                        <input type="text" id="country" name="country" value="PLACEHOLDER" onfocus="this.value=''" required placeholder="Por favor, ingrese el país">
                        
                        <!-- Comments Sales 1 -->
                        <label for="commentsSales1">Comentarios de Ventas 1:</label>
                        <textarea id="commentsSales1" name="commentsSales1" value="N/A" onfocus="this.value=''" placeholder="Por favor, ingrese los comentarios de ventas 1"></textarea>
                        
                        <!-- Comments Sales 2 -->
                        <label for="commentsSales2">Comentarios de Ventas 2:</label>
                        <textarea id="commentsSales2" name="commentsSales2" value="N/A" onfocus="this.value=''" placeholder="Por favor, ingrese los comentarios de ventas 2"></textarea>
                    </div> 
                        
                    <div class='formColumn'>

                        <!-- Opening Date -->
                        <label for="openingDate">Fecha de Apertura:</label>
                        <input type="date" id="openingDate" name="openingDate" value="<?php echo date('Y-m-d'); ?>" />>
                        
                        <!-- Last Check Date -->
                        <label for="lastCheckDate">Fecha de Última Revisión:</label>
                        <input type="date" id="lastCheckDate" name="lastCheckDate">
                        
                        <!-- Closing Date -->
                        <label for="closingDate">Fecha de Cierre:</label>
                        <input type="date" id="closingDate" name="closingDate">
                        
                        <!-- Next Date for Contact -->
                        <label for="nextDateForContact">Próxima Fecha de Contacto:</label>
                        <input type="date" id="nextDateForContact" name="nextDateForContact">
                        
                        <!-- Next Date for Closing -->
                        <label for="nextDateForClosing">Próxima Fecha de Cierre:</label>
                        <input type="date" id="nextDateForClosing" name="nextDateForClosing">
                        
                        <!-- Is Interested -->
                        <label for="isInterested">¿Está Interesado?:</label>
                        <input type="checkbox" id="isInterested" name="isInterested" value="1" checked>
                        
                    </div>

                    <div class='formColumn'>
                        
                        <!-- Sales State -->
                        <label for="salesState">Estado de Ventas:</label>
                        <input type="text" id="salesState" name="salesState" value="No contactado"  onfocus="this.value=''" placeholder="Por favor, ingrese el estado de ventas">
                        
                        <!-- Is Client -->
                        <label for="isClient">¿Es Cliente?:</label>
                        <input type="checkbox" id="isClient" name="isClient" value="0">
                        
                        <!-- Salesman (Contacter) -->
                        <label for="salesmanContacter">Vendedor (Contacto):</label>
                        <input type="text" id="salesmanContacter" name="salesmanContacter" value="N/A" onfocus="this.value=''" placeholder="Por favor, ingrese el vendedor de contacto">
                        
                        <!-- Salesman (Closer) -->
                        <label for="salesmanCloser">Vendedor (Cierre):</label>
                        <input type="text" id="salesmanCloser" name="salesmanCloser" value="N/A" onfocus="this.value=''" placeholder="Por favor, ingrese el vendedor de cierre">
                        
                        <!-- Type of Contract -->
                        <label for="typeOfContract">Tipo de Contrato:</label>
                        <input type="text" id="typeOfContract" name="typeOfContract" value="N/A" onfocus="this.value=''" placeholder="Por favor, ingrese el tipo de contrato">
                        
                        <!-- Company Files -->
                        <label for="companyFiles">Archivos de la Empresa:</label>
                        <input type="file" id="companyFiles" name="companyFiles[]" multiple>
                        
                        <!-- Submit Button -->
                        <button id='btnInsertCompany' type="submit">Cargar registro</button>

                    <div>
                </form>
            </dialog>

        <!--·■■■ PUT Modal ■■■-->

            <dialog class='modal' id='modalEditCompany'>

                <div class="div-modal">
                <button name="btn-close-Modal" id='closeEditCompany'>Cerrar</button>

                <div id="titulo">
                    <h1 class='titulo-modal'> · Modifique los datos de la Empresa, <?php echo $_SESSION['name']; ?>. · </h1>
                </div>

                <form id='formEditCompany' class= 'form evenColumns'>

                    <div class='formColumn'>

                        <!-- Name -->
                        <label for="name">Nombre:</label>
                        <input type="text" id="nameEdit" name="name" class='inputEdit' placeholder="Por favor, ingrese el nombre">
                        
                        <!-- Status -->
                        <label for="status">Estado:</label>
                        <input type="text" id="statusEdit" name="status" class='inputEdit' placeholder="Por favor, ingrese el estado">
                        
                        <!-- Opportunity Level -->
                        <label for="opportunityLevel">Nivel de Oportunidad:</label>
                        <input type="text" id="opportunityLevelEdit" name="opportunityLevel" class='inputEdit' placeholder="Por favor, ingrese el nivel de oportunidad">
                        
                        <!-- Next Action -->
                        <label for="nextAction">Siguiente Acción:</label>
                        <input type="text" id="nextActionEdit" name="nextAction" class='inputEdit' placeholder="Por favor, ingrese la siguiente acción">
                        
                        <!-- Industry -->
                        <label for="industry">Industria:</label>
                        <input type="text" id="industryEdit" name="industry" class='inputEdit' placeholder="Por favor, ingrese la industria">
                        
                        <!-- Services -->
                        <label for="services">Servicios:</label>
                        <input type="text" id="servicesEdit" name="services" class='inputEdit' placeholder="Por favor, ingrese los servicios">
                    <div>

                    <div class='formColumn'>

                        <!-- Phone -->
                        <label for="phone">Teléfono:</label>
                        <input type="tel" id="phoneEdit" name="phone" class='inputEdit' pattern="[0-9+-()]" placeholder="Por favor, ingrese el teléfono">
                        
                        <!-- Email -->
                        <label for="email">Correo Electrónico:</label>
                        <input type="email" id="emailEdit" name="email" class='inputEdit' placeholder="Por favor, ingrese el correo electrónico">
                        
                        <!-- Website -->
                        <label for="website">Sitio Web:</label>
                        <input type="text" id="websiteEdit" name="website" class='inputEdit' placeholder="Por favor, ingrese el sitio web">
                        
                        <!-- Social Media -->
                        <label for="socialMedia">Redes Sociales:</label>
                        <input type="text" id="socialMediaEdit" name="socialMedia[]" class='inputEdit' placeholder="Por favor, ingrese las redes sociales">
                        
                        <!-- Responsible -->
                        <label for="responsable">Responsable:</label>
                        <input type="text" id="responsableEdit" name="responsable" class='inputEdit' placeholder="Por favor, ingrese el responsable">
                        
                        <!-- Phone Responsible -->
                        <label for="phoneResponsable">Teléfono del Responsable:</label>
                        <input type="tel" id="phoneResponsableEdit" name="phoneResponsable" class='inputEdit' placeholder="Por favor, ingrese el teléfono del responsable">
                        
                        <!-- Email Responsible -->
                        <label for="emailResponsable">Correo Electrónico del Responsable:</label>
                        <input type="email" id="emailResponsableEdit" name="emailResponsable" class='inputEdit' placeholder="Por favor, ingrese el correo electrónico del responsable">
                    </div>

                    <div class='formColumn'>

                        <!-- Extra Info (Responsable) -->
                        <label for="extraInfoResponsable">Información Adicional (Responsable):</label>
                        <textarea id="extraInfoResponsableEdit" name="extraInfoResponsable" class='inputEdit' placeholder="Por favor, ingrese información adicional del responsable"></textarea>
                        
                        <!-- Extra Info (Company) -->
                        <label for="extraInfoCompany">Información Adicional (Empresa):</label>
                        <textarea id="extraInfoCompanyEdit" name="extraInfoCompany" class='inputEdit' placeholder="Por favor, ingrese información adicional de la empresa"></textarea>
                            
                        <!-- Address -->
                        <label for="address">Dirección:</label>
                        <input type="text" id="addressEdit" name="address" class='inputEdit' placeholder="Por favor, ingrese la dirección">
                        
                        <!-- City -->
                        <label for="city">Ciudad:</label>
                        <input type="text" id="cityEdit" name="city" class='inputEdit' placeholder="Por favor, ingrese la ciudad">
                        
                        <!-- Country -->
                        <label for="country">País:</label>
                        <input type="text" id="countryEdit" name="country" class='inputEdit' placeholder="Por favor, ingrese el país">
                        
                        <!-- Comments Sales 1 -->
                        <label for="commentsSales1">Comentarios de Ventas 1:</label>
                        <textarea id="commentsSales1Edit" name="commentsSales1" class='inputEdit' placeholder="Por favor, ingrese los comentarios de ventas 1"></textarea>
                        
                        <!-- Comments Sales 2 -->
                        <label for="commentsSales2">Comentarios de Ventas 2:</label>
                        <textarea id="commentsSales2Edit" name="commentsSales2" class='inputEdit' placeholder="Por favor, ingrese los comentarios de ventas 2"></textarea>
                    </div> 
                        
                    <div class='formColumn'>

                        <!-- Opening Date -->
                        <label for="openingDate">Fecha de Apertura:</label>
                        <input type="date" id="openingDateEdit" name="openingDate" class='inputEdit'>
                        
                        <!-- Last Check Date -->
                        <label for="lastCheckDate">Fecha de Última Revisión:</label>
                        <input type="date" id="lastCheckDateEdit" name="lastCheckDate" class='inputEdit'>
                        
                        <!-- Closing Date -->
                        <label for="closingDate">Fecha de Cierre:</label>
                        <input type="date" id="closingDateEdit" name="closingDate" class='inputEdit'>
                        
                        <!-- Next Date for Contact -->
                        <label for="nextDateForContact">Próxima Fecha de Contacto:</label>
                        <input type="date" id="nextDateForContactEdit" name="nextDateForContact" class='inputEdit'>
                        
                        <!-- Next Date for Closing -->
                        <label for="nextDateForClosing">Próxima Fecha de Cierre:</label>
                        <input type="date" id="nextDateForClosingEdit" name="nextDateForClosing" class='inputEdit'>
                        
                        <!-- Is Interested -->
                        <label for="isInterested">¿Está Interesado?:</label>
                        <input type="checkbox" id="isInterestedEdit" name="isInterested" value="1" checked>
                        
                    </div>

                    <div class='formColumn'>
                        
                        <!-- Sales State -->
                        <label for="salesState">Estado de Ventas:</label>
                        <input type="text" id="salesStateEdit" name="salesState" class='inputEdit' placeholder="Por favor, ingrese el estado de ventas">
                        
                        <!-- Is Client -->
                        <label for="isClient">¿Es Cliente?:</label>
                        <input type="checkbox" id="isClientEdit" name="isClient" class='inputEdit'>
                        
                        <!-- Salesman (Contacter) -->
                        <label for="salesmanContacter">Vendedor (Contacto):</label>
                        <input type="text" id="salesmanContacterEdit" name="salesmanContacter" class='inputEdit' placeholder="Por favor, ingrese el vendedor de contacto">
                        
                        <!-- Salesman (Closer) -->
                        <label for="salesmanCloser">Vendedor (Cierre):</label>
                        <input type="text" id="salesmanCloserEdit" name="salesmanCloser" class='inputEdit' placeholder="Por favor, ingrese el vendedor de cierre">
                        
                        <!-- Type of Contract -->
                        <label for="typeOfContract">Tipo de Contrato:</label>
                        <input type="text" id="typeOfContractEdit" name="typeOfContract" class='inputEdit' placeholder="Por favor, ingrese el tipo de contrato">
                        
                        <!-- Submit Button -->
                        <button id='btnEditCompany' type="submit">Modificar registro</button>

                    <div>
                </form>
            </dialog>


        <!--·■■■ Full data Modal ■■■-->

            <dialog class='modal' id='modalCompany'>
                <div class="div-modal">
                    <button name="btn-close-Modal" id='closeCompany' >Cerrar</button>
                </div>

                
            </dialog>

    <!-- ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Alerts in page | Table of Companies | Check for Get Actions ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■  -->

        <!--Optional in window alerts (will change display property based on events)-->

            <div class="container" id="alerts-container">
                <div class="alerts">
                    <div class="alert alert-success" style='display:none;'> Success! </div>
                    <div class="alert alert-danger" style='display:none;'> Failed. </div>
                </div>
            </div>

        <!--main table where all the registers will be appended-->

            <table class='table-companies'> 
            </table>

    <!-- ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Includes Js Functions & External CDNs ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■  -->   
                
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type="text/javascript" src="../../../public/js/functions.js"></script>
        <script type="text/javascript" src="../../../public/js/companies.js"></script>

    <!-- ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Check for GET actions ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■  -->   

        <?php

            if(isset($_GET['action']) && $_GET['action']=='insert'){
                ?>
                    <script>
                        let modalInsertCompany=document.getElementById('modalInsertCompany');
                        openModal(modalInsertCompany);
                    </script>
                <?php
            }
        ?>

</body>

</html>