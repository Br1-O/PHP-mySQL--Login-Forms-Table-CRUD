<?php
require_once '../../Controller/session_validation.php';
$tittle='Listado de Empresas';
$favicon='../../../public/images/icon_edit.png';
require '../templates/headLoaderCRM.php';
?>

<body>

    <?php
        require_once "../templates/navBarCRM.php";
    ?>

    <!-- ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Modals | Insert Company · Show Full Company ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■  -->

        <!--·■■■ Modal Insert Company■■■-->
            <div class="modal fade" id="modalInsertCompany" tabindex="-1" role="dialog" aria-labelledby="modalInsertCompany" aria-hidden="true">
                <div class="modal-dialog modal-fullscreen" role="document">
                    <div class="modal-content">
                            
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalInsertCompanyLabel">Ingrese los datos de la Empresa, <?php echo $_SESSION['name']; ?>.</h5>
                            <button type="button" class="close" id='closeModalInsertCompany' data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form id="formInsertCompany" class="form evenColumns">

                            <div class="modal-body row">

                                <div class="formColumn col-2">
                                    <div class="form-group">
                                    <label for="name">Nombre:</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Por favor, ingrese el nombre" required>
                                    </div>

                                    <div class="form-group">
                                    <label for="status">Estado:</label>
                                    <select class="form-control" id="status" name="status" placeholder="Por favor, ingrese el estado">
                                        <option selected value="No iniciado">No iniciado</option>
                                        <option value="Primer contacto iniciado">Primer contacto iniciado</option>
                                        <option value="Primer contacto finalizado">Primer contacto finalizado</option>
                                        <option value="Venta finalizada">Venta finalizada</option>
                                    </select>
                                    </div>

                                    <div class="form-group">
                                    <label for="opportunityLevel">Nivel de Oportunidad:</label>
                                    <input type="text" class="form-control" id="opportunityLevel" name="opportunityLevel" placeholder="Por favor, ingrese el nivel de oportunidad">
                                    </div>

                                    <div class="form-group">
                                    <label for="nextAction">Siguiente Acción:</label>
                                    <input type="text" class="form-control" id="nextAction" name="nextAction" placeholder="Por favor, ingrese la siguiente acción">
                                    </div>

                                    <div class="form-group">
                                    <label for="industry">Industria:</label>
                                    <input type="text" class="form-control" id="industry" name="industry" placeholder="Por favor, ingrese la industria" required>
                                    </div>

                                    <div class="form-group">
                                    <label for="services">Servicios:</label>
                                    <input type="text" class="form-control" id="services" name="services" placeholder="Por favor, ingrese los servicios">
                                    </div>
                                </div>

                                <div class="formColumn col-3">
                                    <div class="form-group">
                                    <label for="phone">Teléfono:</label>
                                    <input type="tel" class="form-control" id="phone" name="phone" pattern="[0-9+-()]" placeholder="Por favor, ingrese el teléfono" required>
                                    </div>

                                    <div class="form-group">
                                    <label for="email">Correo Electrónico:</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Por favor, ingrese el correo electrónico" required>
                                    </div>

                                    <div class="form-group">
                                    <label for="website">Sitio Web:</label>
                                    <input type="text" class="form-control" id="website" name="website" placeholder="Por favor, ingrese el sitio web">
                                    </div>

                                    <div class="form-group">
                                    <label for="socialMedia">Redes Sociales:</label>
                                    <input type="text" class="form-control" id="socialMedia" name="socialMedia[]" placeholder="Por favor, ingrese las redes sociales">
                                    </div>

                                    <div class="form-group">
                                    <label for="responsable">Responsable:</label>
                                    <input type="text" class="form-control" id="responsable" name="responsable" placeholder="Por favor, ingrese el responsable">
                                    </div>

                                    <div class="form-group">
                                    <label for="phoneResponsable">Teléfono del Responsable:</label>
                                    <input type="tel" class="form-control" id="phoneResponsable" name="phoneResponsable" pattern="[0-9+-()]" placeholder="Por favor, ingrese el teléfono del responsable">
                                    </div>

                                    <div class="form-group">
                                    <label for="emailResponsable">Correo Electrónico del Responsable:</label>
                                    <input type="email" class="form-control" id="emailResponsable" name="emailResponsable" placeholder="Por favor, ingrese el correo electrónico del responsable">
                                    </div>
                                </div>

                                <div class="formColumn col-3">
                                    <div class="form-group">
                                    <label for="extraInfoResponsable">Información Adicional (Responsable):</label>
                                    <textarea class="form-control" id="extraInfoResponsable" name="extraInfoResponsable" placeholder="Por favor, ingrese información adicional del responsable"></textarea>
                                    </div>

                                    <div class="form-group">
                                    <label for="extraInfoCompany">Información Adicional (Empresa):</label>
                                    <textarea class="form-control" id="extraInfoCompany" name="extraInfoCompany" placeholder="Por favor, ingrese información adicional de la empresa"></textarea>
                                    </div>

                                    <div class="form-group">
                                    <label for="address">Dirección:</label>
                                    <input type="text" class="form-control" id="address" name="address" placeholder="Por favor, ingrese la dirección">
                                    </div>

                                    <div class="form-group">
                                    <label for="city">Ciudad:</label>
                                    <input type="text" class="form-control" id="city" name="city" placeholder="Por favor, ingrese la ciudad" required>
                                    </div>

                                    <div class="form-group">
                                    <label for="country">País:</label>
                                    <input type="text" class="form-control" id="country" name="country" placeholder="Por favor, ingrese el país" required>
                                    </div>

                                    <div class="form-group">
                                    <label for="commentsSales1">Comentarios de Ventas 1:</label>
                                    <textarea class="form-control" id="commentsSales1" name="commentsSales1" placeholder="Por favor, ingrese los comentarios de ventas 1"></textarea>
                                    </div>

                                    <div class="form-group">
                                    <label for="commentsSales2">Comentarios de Ventas 2:</label>
                                    <textarea class="form-control" id="commentsSales2" name="commentsSales2" placeholder="Por favor, ingrese los comentarios de ventas 2"></textarea>
                                    </div>
                                </div>

                                <div class="formColumn col-2">
                                    <div class="form-group">
                                    <label for="openingDate">Fecha de Apertura:</label>
                                    <input type="date" class="form-control" id="openingDate" name="openingDate" value="<?php echo date('Y-m-d'); ?>">
                                    </div>
                                                
                                    <!-- Last Check Date -->
                                    <div class="form-group">
                                    <label for="lastCheckDate">Fecha de Última Revisión:</label>
                                    <input type="date" class="form-control" id="lastCheckDate" name="lastCheckDate">
                                    </div>

                                    <!-- Closing Contact Date -->
                                    <div class="form-group">
                                    <label for="closingContactDate">Fecha de cierre de 1er contacto (pase a ventas):</label>
                                    <input type="date" class="form-control" id="closingContactDate" name="closingContactDate">
                                    </div>

                                    <!-- Closing Date -->
                                    <div class="form-group">
                                    <label for="closingDate">Fecha de Cierre:</label>
                                    <input type="date" class="form-control" id="closingDate" name="closingDate">
                                    </div>

                                    <!-- Next Date for Contact -->
                                    <div class="form-group">
                                    <label for="nextDateForContact">Próxima Fecha de Contacto:</label>
                                    <input type="date" id="nextDateForContact" class="form-control" name="nextDateForContact">
                                    </div>

                                    <!-- Next Date for Closing -->
                                    <div class="form-group">
                                    <label for="nextDateForClosing">Próxima Fecha de Cierre:</label>
                                    <input type="date" class="form-control" id="nextDateForClosing" name="nextDateForClosing">
                                    </div>

                                    <!-- Is Interested -->
                                    <div class="form-group">
                                    <label for="isInterested">¿Está Interesado?:</label>
                                    <input type="checkbox" id="isInterested" name="isInterested" value="1" checked>
                                    </div>

                                </div>

                                <div class='formColumn col-2'>
                                    
                                    <!-- Sales State -->
                                    <div class="form-group">
                                    <label for="salesState">Estado de Ventas:</label>
                                    <input type="text" class="form-control" id="salesState" name="salesState" value="No contactado"  onfocus="this.value=''" placeholder="Por favor, ingrese el estado de ventas">
                                    </div>

                                    <!-- Is Client -->
                                    <div class="form-group">
                                    <label for="isClient">¿Es Cliente?:</label>
                                    <input type="checkbox" id="isClient" name="isClient" value="0">
                                    </div>

                                    <!-- Salesman (Contacter) -->
                                    <div class="form-group">
                                    <label for="salesmanContacter">Vendedor (Contacto):</label>
                                    <input type="text" class="form-control" id="salesmanContacter" name="salesmanContacter" value="N/A" onfocus="this.value=''" placeholder="Por favor, ingrese el vendedor de contacto">
                                    </div>

                                    <!-- Salesman (Closer) -->
                                    <div class="form-group">
                                    <label for="salesmanCloser">Vendedor (Cierre):</label>
                                    <input type="text" class="form-control" id="salesmanCloser" name="salesmanCloser" value="N/A" onfocus="this.value=''" placeholder="Por favor, ingrese el vendedor de cierre">
                                    </div>

                                    <!-- Type of Contract -->
                                    <div class="form-group">
                                    <label for="typeOfContract">Tipo de Contrato:</label>
                                    <input type="text" class="form-control" id="typeOfContract" name="typeOfContract" value="N/A" onfocus="this.value=''" placeholder="Por favor, ingrese el tipo de contrato">
                                    </div>

                                    <!-- Company Files -->
                                    <div class="form-group">
                                    <label for="companyFiles">Archivos de la Empresa:</label>
                                    <input type="file" class="form-control" id="companyFiles" name="companyFiles[]" multiple>
                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button id="btnInsertCompany" type="submit" class="btn btn-primary">Cargar registro</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>

        <!--·■■■ PUT Modal ■■■-->

            <div class="modal fade modalCompany modal-xl" id="modalEditCompany" tabindex="-1" role="dialog" aria-labelledby="modalEditCompanyLabel" aria-hidden="true">
                <div class="modal-dialog modal-fullscreen" role="document">
                    <div class="modal-content">
                        
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalEditCompanyLabel">· Modifique los datos de la Empresa, <?php echo $_SESSION['name']; ?>. ·</h5>
                            <button type="button" id='closeModalEditCompany' class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form id="formEditCompany" class="form evenColumns">
                            
                            <div class="modal-body d-flex row">

                                <div class="formColumn col-xl-3">

                                    <!-- Name -->
                                    <div class="form-group">
                                        <label for="name">Nombre:</label>
                                        <input type="text" id="nameEdit" name="name" class="form-control" placeholder="Por favor, ingrese el nombre">
                                    </div>

                                    <!-- Status -->
                                    <div class="form-group">
                                    <label for="status">Estado:</label>
                                    <select class="form-control" id="statusEdit" name="status" placeholder="Por favor, ingrese el estado">
                                        <option selected value="No iniciado">No iniciado</option>
                                        <option value="Primer contacto iniciado">Primer contacto iniciado</option>
                                        <option value="Primer contacto finalizado">Primer contacto finalizado</option>
                                        <option value="Venta finalizada">Venta finalizada</option>
                                    </select>
                                    </div>

                                    <!-- Opportunity Level -->
                                    <div class="form-group">
                                        <label for="opportunityLevel">Nivel de Oportunidad:</label>
                                        <input type="text" id="opportunityLevelEdit" name="opportunityLevel" class="form-control" placeholder="Por favor, ingrese el nivel de oportunidad">
                                    </div>

                                    <!-- Next Action -->
                                    <div class="form-group">
                                        <label for="nextAction">Siguiente Acción:</label>
                                        <input type="text" id="nextActionEdit" name="nextAction" class="form-control" placeholder="Por favor, ingrese la siguiente acción">
                                    </div>

                                    <!-- Industry -->
                                    <div class="form-group">
                                        <label for="industry">Industria:</label>
                                        <input type="text" id="industryEdit" name="industry" class="form-control" placeholder="Por favor, ingrese la industria">
                                    </div>

                                    <!-- Services -->
                                    <div class="form-group">
                                        <label for="services">Servicios:</label>
                                        <input type="text" id="servicesEdit" name="services" class="form-control" placeholder="Por favor, ingrese los servicios">
                                    </div>
                                </div>

                                <div class="formColumn col-xl-3">

                                    <!-- Phone -->
                                    <div class="form-group">
                                        <label for="phone">Teléfono:</label>
                                        <input type="tel" id="phoneEdit" name="phone" class="form-control" pattern="[0-9+-()]" placeholder="Por favor, ingrese el teléfono">
                                    </div>

                                    <!-- Email -->
                                    <div class="form-group">
                                        <label for="email">Correo Electrónico:</label>
                                        <input type="email" id="emailEdit" name="email" class="form-control" placeholder="Por favor, ingrese el correo electrónico">
                                    </div>

                                    <!-- Website -->
                                    <div class="form-group">
                                        <label for="website">Sitio Web:</label>
                                        <input type="text" id="websiteEdit" name="website" class="form-control" placeholder="Por favor, ingrese el sitio web">
                                    </div>

                                    <!-- Social Media -->
                                    <div class="form-group">
                                        <label for="socialMedia">Redes Sociales:</label>
                                        <input type="text" id="socialMediaEdit" name="socialMedia[]" class="form-control" placeholder="Por favor, ingrese las redes sociales">
                                    </div>

                                    <!-- Responsible -->
                                    <div class="form-group">
                                        <label for="responsable">Responsable:</label>
                                        <input type="text" id="responsableEdit" name="responsable" class="form-control" placeholder="Por favor, ingrese el responsable">
                                    </div>

                                    <!-- Phone Responsible -->
                                    <div class="form-group">
                                        <label for="phoneResponsable">Teléfono del Responsable:</label>
                                        <input type="tel" id="phoneResponsableEdit" name="phoneResponsable" class="form-control" placeholder="Por favor, ingrese el teléfono del responsable">
                                    </div>

                                    <!-- Email Responsible -->
                                    <div class="form-group">
                                        <label for="emailResponsable">Correo Electrónico del Responsable:</label>
                                        <input type="email" id="emailResponsableEdit" name="emailResponsable" class="form-control" placeholder="Por favor, ingrese el correo electrónico del responsable">
                                    </div>
                                </div>

                                <div class="formColumn col-xl-2">

                                    <!-- Extra Info (Responsable) -->
                                    <div class="form-group">
                                        <label for="extraInfoResponsable">Información Adicional (Responsable):</label>
                                        <textarea id="extraInfoResponsableEdit" name="extraInfoResponsable" class="form-control" placeholder="Por favor, ingrese información adicional del responsable"></textarea>
                                    </div>

                                    <!-- Extra Info (Company) -->
                                    <div class="form-group">
                                        <label for="extraInfoCompany">Información Adicional (Empresa):</label>
                                        <textarea id="extraInfoCompanyEdit" name="extraInfoCompany" class="form-control" placeholder="Por favor, ingrese información adicional de la empresa"></textarea>
                                    </div>

                                    <!-- Address -->
                                    <div class="form-group">
                                        <label for="address">Dirección:</label>
                                        <input type="text" id="addressEdit" name="address" class="form-control" placeholder="Por favor, ingrese la dirección">
                                    </div>

                                    <!-- City -->
                                    <div class="form-group">
                                        <label for="city">Ciudad:</label>
                                        <input type="text" id="cityEdit" name="city" class="form-control" placeholder="Por favor, ingrese la ciudad">
                                    </div>

                                    <!-- Country -->
                                    <div class="form-group">
                                        <label for="country">País:</label>
                                        <input type="text" id="countryEdit" name="country" class="form-control" placeholder="Por favor, ingrese el país">
                                    </div>

                                    <!-- Comments Sales 1 -->
                                    <div class="form-group">
                                        <label for="commentsSales1">Comentarios de Ventas 1:</label>
                                        <textarea id="commentsSales1Edit" name="commentsSales1" class="form-control" placeholder="Por favor, ingrese los comentarios de ventas 1"></textarea>
                                    </div>

                                    <!-- Comments Sales 2 -->
                                    <div class="form-group">
                                        <label for="commentsSales2">Comentarios de Ventas 2:</label>
                                        <textarea id="commentsSales2Edit" name="commentsSales2" class="form-control" placeholder="Por favor, ingrese los comentarios de ventas 2"></textarea>
                                    </div> 
                                </div> 


                                <div class="formColumn col-xl-2">

                                    <!-- Opening Date -->
                                    <div class="form-group">
                                        <label for="openingDate">Fecha de Apertura:</label>
                                        <input type="date" id="openingDateEdit" name="openingDate" class="form-control">
                                    </div>

                                    <!-- Last Check Date -->
                                    <div class="form-group">
                                        <label for="lastCheckDate">Fecha de Última Revisión:</label>
                                        <input type="date" id="lastCheckDateEdit" name="lastCheckDate" class="form-control">
                                    </div>

                                    <!-- Closing Date -->
                                    <div class="form-group">
                                        <label for="closingDate">Fecha de Cierre:</label>
                                        <input type="date" id="closingDateEdit" name="closingDate" class="form-control">
                                    </div>

                                    <!-- Next Date for Contact -->
                                    <div class="form-group">
                                        <label for="nextDateForContact">Próxima Fecha de Contacto:</label>
                                        <input type="date" id="nextDateForContactEdit" name="nextDateForContact" class="form-control">
                                    </div>

                                    <!-- Next Date for Closing -->
                                    <div class="form-group">
                                        <label for="nextDateForClosing">Próxima Fecha de Cierre:</label>
                                        <input type="date" id="nextDateForClosingEdit" name="nextDateForClosing" class="form-control">
                                    </div>

                                    <!-- Is Interested -->
                                    <div class="form-group">
                                        <label for="isInterested">¿Está Interesado?:</label>
                                        <div class="form-check">
                                            <input type="checkbox" id="isInterestedEdit" name="isInterested" class="form-check-input" value="1" checked>
                                        </div>
                                    </div>
                                </div>

                                <div class="formColumn col-xl-2">

                                    <!-- Sales State -->
                                    <div class="form-group">
                                        <label for="salesState">Estado de Ventas:</label>
                                        <input type="text" id="salesStateEdit" name="salesState" class="form-control" placeholder="Por favor, ingrese el estado de ventas">
                                    </div>

                                    <!-- Is Client -->
                                    <div class="form-group">
                                        <label for="isClient">¿Es Cliente?:</label>
                                        <div class="form-check">
                                            <input type="checkbox" id="isClientEdit" name="isClient" class="form-check-input">
                                        </div>
                                    </div>

                                    <!-- Salesman (Contacter) -->
                                    <div class="form-group">
                                        <label for="salesmanContacter">Vendedor (Contacto):</label>
                                        <input type="text" id="salesmanContacterEdit" name="salesmanContacter" class="form-control" placeholder="Por favor, ingrese el vendedor de contacto">
                                    </div>

                                    <!-- Salesman (Closer) -->
                                    <div class="form-group">
                                        <label for="salesmanCloser">Vendedor (Cierre):</label>
                                        <input type="text" id="salesmanCloserEdit" name="salesmanCloser" class="form-control" placeholder="Por favor, ingrese el vendedor de cierre">
                                    </div>

                                    <!-- Type of Contract -->
                                    <div class="form-group">
                                        <label for="typeOfContract">Tipo de Contrato:</label>
                                        <input type="text" id="typeOfContractEdit" name="typeOfContract" class="form-control" placeholder="Por favor, ingrese el tipo de contrato">
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button id="btnEditCompany" type="submit" class="btn btn-primary">Modificar registro</button>                                
                                </div>
                                
                            </div>
 
                        </form>
                    </div>
                </div>
            </div>


        <!--·■■■ Full data Modal ■■■-->

            <!-- Modal -->
        
                    <div class="modal fade" id="modalFullCompany" tabindex="-1" aria-labelledby="fullCompanyModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-fullscreen">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="fullCompanyLabel"></h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">

                            <section class='nav-tabs-section'>

                                <nav>
                                    <div class="nav nav-underline d-flex justify-content-center" id="nav-tab" role="tablist">
                                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-anteproyecto" aria-selected="true">
                                        Contacto
                                        </button>
                                        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-planos constructivos" aria-selected="false">
                                        Responsable
                                        </button>
                                        <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-permisos de construcción" aria-selected="false">
                                        Datos del registro
                                        </button>
                                        <button class="nav-link" id="nav-disabled-tab" data-bs-toggle="tab" data-bs-target="#nav-disabled" type="button" role="tab" aria-controls="nav-permisos de ocupación" aria-selected="false">
                                        Finanzas
                                        </button>
                                        <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-Trámites post-ocupación" aria-selected="false">
                                        Documentos
                                        </button>
                                    </div>
                                </nav>

                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                                        <div class="even-columns1 row tab-content">
                                        
                                            <div class='split-image1 tab1-img col-xl-5 col-lg-9 col-md-8 col-sm-8 col-8' >
                                            </div>   
                                            
                                            <div class='tab-text col-xl-6 col-lg-9 col-md-8 col-sm-8 col-8' >
                                                                                                
                                                <table class="table table-success table-striped table-hover" id='tableFullCompanyTab1'>

                                                </table>

                                                <div>
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

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>            
                        </div>

                    </div>
                </div>
                </div>


    
    <!-- ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Alerts in page | Table of Companies | Check for Get Actions ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■  -->

        <!-- offcanvas for advance filter & search options -->

            <div class="offcanvas offcanvas-bottom" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasScrollingLabel"> Seleccione los parametros de la busqueda: </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>

                <div class="offcanvas-body">
                    
                    <li>
                        <span class="resume">Vista resumida</span>
                        <input type="checkbox" class="switchView" value='true' onclick='switchView()'>
                        <span class="full">Vista Completa</span>
                    </li>

                </div>
            </div>
    
    
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

            <table class='table-companies-full table table-primary table-striped table-hover table-bordered'>
            </table>

    <!-- ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Includes Js Functions & External CDNs ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■  -->   
                
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type="text/javascript" src="../../../public/js/functions.js"></script>
        <script type="text/javascript" src="../../../public/js/companies.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>


    <!-- ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Check for GET actions ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■  -->   

        <?php

            if(isset($_GET['action']) && $_GET['action']=='insert'){
                ?>
                    <script>
                        document.getElementById('btnOpenInsertCompany').click();
                    </script>
                <?php
            }
        ?>

</body>

</html>