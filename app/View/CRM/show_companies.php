<?php
require '../../Controller/session_validation.php';
$title='Listado de Empresas';
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
                        <input type="text" id="nameEdit" name="name" placeholder="Por favor, ingrese el nombre">
                        
                        <!-- Status -->
                        <label for="status">Estado:</label>
                        <input type="text" id="statusEdit" name="status" placeholder="Por favor, ingrese el estado">
                        
                        <!-- Opportunity Level -->
                        <label for="opportunityLevel">Nivel de Oportunidad:</label>
                        <input type="text" id="opportunityLevelEdit" name="opportunityLevel" placeholder="Por favor, ingrese el nivel de oportunidad">
                        
                        <!-- Next Action -->
                        <label for="nextAction">Siguiente Acción:</label>
                        <input type="text" id="nextActionEdit" name="nextAction" placeholder="Por favor, ingrese la siguiente acción">
                        
                        <!-- Industry -->
                        <label for="industry">Industria:</label>
                        <input type="text" id="industryEdit" name="industry" placeholder="Por favor, ingrese la industria">
                        
                        <!-- Services -->
                        <label for="services">Servicios:</label>
                        <input type="text" id="servicesEdit" name="services" placeholder="Por favor, ingrese los servicios">
                    <div>

                    <div class='formColumn'>

                        <!-- Phone -->
                        <label for="phone">Teléfono:</label>
                        <input type="tel" id="phoneEdit" name="phone" pattern="[0-9+-()]" placeholder="Por favor, ingrese el teléfono">
                        
                        <!-- Email -->
                        <label for="email">Correo Electrónico:</label>
                        <input type="email" id="emailEdit" name="email" placeholder="Por favor, ingrese el correo electrónico">
                        
                        <!-- Website -->
                        <label for="website">Sitio Web:</label>
                        <input type="text" id="websiteEdit" name="website" placeholder="Por favor, ingrese el sitio web">
                        
                        <!-- Social Media -->
                        <label for="socialMedia">Redes Sociales:</label>
                        <input type="text" id="socialMediaEdit" name="socialMedia[]" placeholder="Por favor, ingrese las redes sociales">
                        
                        <!-- Responsible -->
                        <label for="responsable">Responsable:</label>
                        <input type="text" id="responsableEdit" name="responsable" placeholder="Por favor, ingrese el responsable">
                        
                        <!-- Phone Responsible -->
                        <label for="phoneResponsable">Teléfono del Responsable:</label>
                        <input type="tel" id="phoneResponsableEdit" name="phoneResponsable" placeholder="Por favor, ingrese el teléfono del responsable">
                        
                        <!-- Email Responsible -->
                        <label for="emailResponsable">Correo Electrónico del Responsable:</label>
                        <input type="email" id="emailResponsableEdit" name="emailResponsable" placeholder="Por favor, ingrese el correo electrónico del responsable">
                    </div>

                    <div class='formColumn'>

                        <!-- Extra Info (Responsable) -->
                        <label for="extraInfoResponsable">Información Adicional (Responsable):</label>
                        <textarea id="extraInfoResponsableEdit" name="extraInfoResponsable" placeholder="Por favor, ingrese información adicional del responsable"></textarea>
                        
                        <!-- Extra Info (Company) -->
                        <label for="extraInfoCompany">Información Adicional (Empresa):</label>
                        <textarea id="extraInfoCompanyEdit" name="extraInfoCompany" placeholder="Por favor, ingrese información adicional de la empresa"></textarea>
                            
                        <!-- Address -->
                        <label for="address">Dirección:</label>
                        <input type="text" id="addressEdit" name="address" placeholder="Por favor, ingrese la dirección">
                        
                        <!-- City -->
                        <label for="city">Ciudad:</label>
                        <input type="text" id="cityEdit" name="city" placeholder="Por favor, ingrese la ciudad">
                        
                        <!-- Country -->
                        <label for="country">País:</label>
                        <input type="text" id="countryEdit" name="country" placeholder="Por favor, ingrese el país">
                        
                        <!-- Comments Sales 1 -->
                        <label for="commentsSales1">Comentarios de Ventas 1:</label>
                        <textarea id="commentsSales1Edit" name="commentsSales1" placeholder="Por favor, ingrese los comentarios de ventas 1"></textarea>
                        
                        <!-- Comments Sales 2 -->
                        <label for="commentsSales2">Comentarios de Ventas 2:</label>
                        <textarea id="commentsSales2Edit" name="commentsSales2" placeholder="Por favor, ingrese los comentarios de ventas 2"></textarea>
                    </div> 
                        
                    <div class='formColumn'>

                        <!-- Opening Date -->
                        <label for="openingDate">Fecha de Apertura:</label>
                        <input type="date" id="openingDateEdit" name="openingDate">
                        
                        <!-- Last Check Date -->
                        <label for="lastCheckDate">Fecha de Última Revisión:</label>
                        <input type="date" id="lastCheckDateEdit" name="lastCheckDate">
                        
                        <!-- Closing Date -->
                        <label for="closingDate">Fecha de Cierre:</label>
                        <input type="date" id="closingDateEdit" name="closingDate">
                        
                        <!-- Next Date for Contact -->
                        <label for="nextDateForContact">Próxima Fecha de Contacto:</label>
                        <input type="date" id="nextDateForContactEdit" name="nextDateForContact">
                        
                        <!-- Next Date for Closing -->
                        <label for="nextDateForClosing">Próxima Fecha de Cierre:</label>
                        <input type="date" id="nextDateForClosingEdit" name="nextDateForClosing">
                        
                        <!-- Is Interested -->
                        <label for="isInterested">¿Está Interesado?:</label>
                        <input type="checkbox" id="isInterestedEdit" name="isInterested" value="1" checked>
                        
                    </div>

                    <div class='formColumn'>
                        
                        <!-- Sales State -->
                        <label for="salesState">Estado de Ventas:</label>
                        <input type="text" id="salesStateEdit" name="salesState"placeholder="Por favor, ingrese el estado de ventas">
                        
                        <!-- Is Client -->
                        <label for="isClient">¿Es Cliente?:</label>
                        <input type="checkbox" id="isClientEdit" name="isClient">
                        
                        <!-- Salesman (Contacter) -->
                        <label for="salesmanContacter">Vendedor (Contacto):</label>
                        <input type="text" id="salesmanContacterEdit" name="salesmanContacter"placeholder="Por favor, ingrese el vendedor de contacto">
                        
                        <!-- Salesman (Closer) -->
                        <label for="salesmanCloser">Vendedor (Cierre):</label>
                        <input type="text" id="salesmanCloserEdit" name="salesmanCloser"placeholder="Por favor, ingrese el vendedor de cierre">
                        
                        <!-- Type of Contract -->
                        <label for="typeOfContract">Tipo de Contrato:</label>
                        <input type="text" id="typeOfContractEdit" name="typeOfContract"placeholder="Por favor, ingrese el tipo de contrato">
                        
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

        <div class="container" id="alerts-container">
            <div class="alerts">
                <div class="alert alert-success" style='display:none;'> Success! </div>
                <div class="alert alert-danger" style='display:none;'> Failed. </div>
            </div>
        </div>

        <table class='table-companies'> 
        </table>

        <!--Check for GET actions-->
            
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

    <!-- ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Funciones API Fetch ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■  -->   

        <script>
        ///////////////■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Show Companies ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■///////////////

            const table= document.querySelector('.table-companies')

            const query = 'showCompanies';

            let urlShowCompanies= `../../Controller/class_ControllerCompany.php?q=${query}`;

            const showCompanies = async (url) => {

                let body='';
                
                try{
                    const res= await fetch(url, {
                        method: 'GET',
                        headers: {
                            'Content-Type': 'application/json'
                        }
                    });

                    const output = await res.json();
                    
                    if(output.empty==='empty'){

                        dangerAlert.style.display = "block";
                        dangerAlert.innerText = 'No se encontró ninguna compañia.';
                        setTimeout(() => {
                        dangerAlert.style.display = "none";
                        dangerAlert.innerText = "";
                        }, 1000)

                        // body+='<Tr><Td colspan="2"> No se encontró ninguna compañia. </Td></Tr>';
                    }else{
                        for (var i in output) {
                            body+=` 
                                <td id='td-outside'>
                                <table>
                                <Tr class='trIntern'>
                                    <Th rowspan ='10'id='th-1'>
                                        <a href='#' id='openCompany' onclick=openFullCompany(${output[i].id})>${output[i].name}</a>
                                    </Th>
                                </Tr>
                                <Tr class='trIntern'>
                                    <th>Industria</Th> <Td id='td-1'> ${output[i].industry} </Td>
                                </Tr>
                                <Tr class='trIntern'>
                                    <Th>Responsable</Th> <Td> ${output[i].responsable} </Td>
                                </Tr>
                                <Tr class='trIntern'>
                                    <Th>Telefono Resp.</Th><Td> ${output[i].phone} </Td>
                                </Tr>
                                <Tr class='trIntern'>
                                    <Th>Email Resp.</Th><Td> ${output[i].emailResponsable} </Td>
                                </Tr>
                                <Tr class='trIntern'>
                                    <Th>Telefono Comp.</Th><Td> ${output[i].phone} </Td>
                                </Tr>
                                <Tr class='trIntern'>
                                    <Th>Email Comp.</Th><Td> ${output[i].email} </Td>
                                </Tr>
                                <Tr class='trIntern'>
                                    <Th>Fecha de Inicio</Th><Td> ${output[i].openingDate} </Td>
                                </Tr>
                                <Tr class='trIntern'>
                                    <Th>Fecha último checkeo</Th><Td> ${output[i].lastCheckDate} </Td>
                                </Tr>
                                <Tr id='tr-last' class='trIntern'>
                                    <Th id='th-last' colspan ='2' >
                                        <a href=# onclick="editCompany(event, ${output[i].id})" ><img src='../../../public/images/icon_edit.png' alt='edit register' style='width:30px; height:30px; margin-right:5%;' id='btn_edit'></a>
                                        <a href=# onclick="deleteCompany(event, ${output[i].id})" ><img id='btn_delete' src='../../../public/images/icon_delete2.png' alt='delete register' style='width:30px; height:30px; margin-right:5%;'></a>
                                        <a href= # onclick="PDFcompany(event, ${output[i].id})" ><img id='btn_delete' src='../../../public/images/download-pdf.png' alt='delete register' style='width:30px; height:30px; margin-right:5%;'></a>
                                        <a href=# onclick="EXCELcompany(event, ${output[i].id})"><img id='btn_delete' src='../../../public/images/excel3.png' alt='delete register' style='width:30px; height:30px; margin-right:5%;'></a>
                                    </Th>
                                </Tr>
                                </table>
                                </td>`;
                                /////■■■■■■■■■ Modify for future feature of number of records per row /////■■■■■■■■■
                                if ((parseInt(i) + 1) % 3 === 0) {
                                    body += '<tr></tr>';
                                }              
                        }

                        table.innerHTML=`<tr class='tr-interTable'>${body}</tr>`;
                    }  
                }catch(error){

                    dangerAlert.style.display = "block";
                    dangerAlert.innerText = 'No se pudo conectar con el servidor.';
                    setTimeout(() => {
                    dangerAlert.style.display = "none";
                    dangerAlert.innerText = "";
                    }, 1000)

                    console.log("Error: " + error)
                }
            }

            document.addEventListener("DOMContentLoaded", showCompanies(urlShowCompanies));


        ///////////////■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Search Companies ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■///////////////
        
            const inputSearch = document.querySelector('#inputSearch');
            const searchFieldSelect= document.querySelector('#searchField');

            const searchCompanies = async (url) => {
                
                try{
                    const table= document.querySelector('.table-companies')

                    let search='';

                    const res= await fetch(url, {
                        method: 'GET',
                        headers: {
                            'Content-Type': 'application/json'
                        }
                    });

                    const output = await res.json();

                    if(output.empty==='empty'){
                        body+='<Tr><Td colspan="2"><Th> No se encontró ninguna compañia.<Th></Td></Tr>';
                    }else{
                        for (var i in output) {
                            search+=` 
                                <td id='td-outside'>
                                <table>
                                <Tr class='trIntern'>
                                    <Th rowspan ='10'id='th-1'>
                                        <a href='#' id='openCompany' onclick=openFullCompany(${output[i].id})>${output[i].name}</a>
                                    </Th>
                                </Tr>
                                <Tr class='trIntern'>
                                    <th>Industria</Th> <Td id='td-1'> ${output[i].industry} </Td>
                                </Tr>
                                <Tr class='trIntern'>
                                    <Th>Responsable</Th> <Td> ${output[i].responsable} </Td>
                                </Tr>
                                <Tr class='trIntern'>
                                    <Th>Telefono Resp.</Th><Td> ${output[i].phone} </Td>
                                </Tr>
                                <Tr class='trIntern'>
                                    <Th>Email Resp.</Th><Td> ${output[i].emailResponsable} </Td>
                                </Tr>
                                <Tr class='trIntern'>
                                    <Th>Telefono Comp.</Th><Td> ${output[i].phone} </Td>
                                </Tr>
                                <Tr class='trIntern'>
                                    <Th>Email Comp.</Th><Td> ${output[i].email} </Td>
                                </Tr>
                                <Tr class='trIntern'>
                                    <Th>Fecha de Inicio</Th><Td> ${output[i].openingDate} </Td>
                                </Tr>
                                <Tr class='trIntern'>
                                    <Th>Fecha último checkeo</Th><Td> ${output[i].lastCheckDate} </Td>
                                </Tr>
                                <Tr id='tr-last' class='trIntern'>
                                    <Th id='th-last' colspan ='2' >
                                        <a href=# onclick="editCompany(event, ${output[i].id})" ><img src='../../../public/images/icon_edit.png' alt='edit register' style='width:30px; height:30px; margin-right:5%;' id='btn_edit'></a>
                                        <a href=# href=# onclick="deleteCompany(event, ${output[i].id})" ><img id='btn_delete' src='../../../public/images/icon_delete2.png' alt='delete register' style='width:30px; height:30px; margin-right:5%;'></a>
                                        <a href= # onclick="PDFcompany(event, ${output[i].id})" ><img id='btn_delete' src='../../../public/images/download-pdf.png' alt='delete register' style='width:30px; height:30px; margin-right:5%;'></a>
                                        <a href=# onclick="EXCELcompany(event, ${output[i].id})"><img id='btn_delete' src='../../../public/images/excel3.png' alt='delete register' style='width:30px; height:30px; margin-right:5%;'></a>
                                    </Th>
                                </Tr>
                                </table>
                                </td>`;

                                     /////■■■■■■■■■ Modify for future feature of number of records per row /////■■■■■■■■■
                                if ((parseInt(i) + 1) % 3 === 0) {
                                    search += '<tr></tr>';
                                }
                            }

                        table.innerHTML=`<tr class='tr-interTable'>${search}</tr>`;
                        }  
                }catch(error){
                        table.innerHTML=`<tr class='tr-interTable'><Th> No se encontraron resultados. </Th></tr>`;
                        console.log("Error: " + error);
                }
            }
                
            inputSearch.addEventListener('keyup', async (event)=>{
                
                let searchField= searchFieldSelect.value;
                let value= inputSearch.value;

                let urlFilterCompanies=`../../Controller/filter_company.php?searchField=${searchField}&value=${value}`;

                let texto= event.target.value;

                await searchCompanies(urlFilterCompanies);
                console.log(texto);
            });

        ///////////////■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Search by ID ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■///////////////

                            /*API fetch return all data from company by Id request */

                            const searchById = async (url, id) => {

                                url=`${url}?id=${id}`;

                                try{
                                    const res= await fetch(url, {
                                        method: 'GET',
                                        headers: {
                                            'Content-Type': 'application/json'
                                        }
                                    });

                                    const output = await res.json();
                                    
                                    if (output.empty==='empty') {
                                        console.log('No se encontró el registro.');
                                    } else {
                                        return output;
                                    }
                                } catch(error){
                                    console.log('Error: ' + error);
                                }
                            }
        
        ///////////////■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Insert Companies ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■///////////////


            let btnInsertCompany= document.getElementById('btnInsertCompany');

            let successAlert= document.querySelector('.alert-success');

            let dangerAlert= document.querySelector('.alert-danger');


            btnInsertCompany.addEventListener('click', async () =>{
                try {
                    let name= document.getElementById('name').value;
                    let status= document.getElementById('status').value;
                    let opportunityLevel= document.getElementById('opportunityLevel').value;
                    let nextAction= document.getElementById('nextAction').value;
                    let industry= document.getElementById('industry').value;
                    let services= document.getElementById('services').value;
                    let phone= document.getElementById('phone').value;
                    let email= document.getElementById('email').value;
                    let website= document.getElementById('website').value;
                    let socialMedia= document.getElementById('socialMedia').value;
                    let responsable= document.getElementById('responsable').value;
                    let phoneResponsable= document.getElementById('phoneResponsable').value;
                    let emailResponsable= document.getElementById('emailResponsable').value;
                    let extraInfoResponsable= document.getElementById('extraInfoResponsable').value;
                    let extraInfoCompany= document.getElementById('extraInfoCompany').value;
                    let address= document.getElementById('address').value;
                    let city= document.getElementById('city').value;
                    let country= document.getElementById('country').value;
                    let commentsSales1= document.getElementById('commentsSales1').value;
                    let commentsSales2= document.getElementById('commentsSales2').value;
                    let openingDate= document.getElementById('openingDate').value;
                    let lastCheckDate= document.getElementById('lastCheckDate').value;
                    let closingDate= document.getElementById('closingDate').value;
                    let nextDateForContact= document.getElementById('nextDateForContact').value;
                    let nextDateForClosing= document.getElementById('nextDateForClosing').value;
                    let isInterested= document.getElementById('isInterested').value;
                    let salesState= document.getElementById('salesState').value;
                    let isClient= document.getElementById('isClient').value;
                    let salesmanContacter= document.getElementById('salesmanContacter').value;
                    let salesmanCloser= document.getElementById('salesmanCloser').value;
                    let typeOfContract= document.getElementById('typeOfContract').value;
                    let companyFiles= document.getElementById('companyFiles').value;


                    //■■■■■■ API fetch POST to Insert ■■■■■//

                    let urlInsert= '../../Controller/insert_company.php';

                    const res= await fetch(urlInsert, {
                            method: 'POST',
                            body: JSON.stringify({
                                "name": name,
                                "status": status,
                                "opportunityLevel": opportunityLevel,
                                "nextAction": nextAction,
                                "industry": industry,
                                "services": services,
                                "phone": phone,
                                "email": email,
                                "website": website,
                                "socialMedia": socialMedia,
                                "responsable": responsable,
                                "phoneResponsable": phoneResponsable,
                                "emailResponsable": emailResponsable,
                                "extraInfoResponsable": extraInfoResponsable,
                                "extraInfoCompany": extraInfoCompany,
                                "address": address,
                                "city": city,
                                "country": country,
                                "commentsSales1": commentsSales1,
                                "commentsSales2": commentsSales2,
                                "openingDate": openingDate,
                                "lastCheckDate": lastCheckDate,
                                "closingDate": closingDate,
                                "nextDateForContact": nextDateForContact,
                                "nextDateForClosing": nextDateForClosing,
                                "isInterested": isInterested,
                                "salesState": salesState,
                                "isClient": isClient,
                                "salesmanContacter": salesmanContacter,
                                "salesmanCloser": salesmanCloser,
                                "typeOfContract": typeOfContract,
                                "companyFiles": companyFiles
                                }),
                            headers: {
                                'Content-Type': 'application/json'
                            }
                            // body: new FormData(formInsertCompany)
                        })

                        const output= await res.json();

                        if (output.success) {

                            Swal.fire({
                            icon: 'success',
                            title: '¡Compañia agregada con éxito!',
                            showConfirmButton: false,
                            timer: 1500
                            });

                            successAlert.style.display = "block";
                            successAlert.innerText = output.message;

                            let form=document.querySelector('#formInsertCompany');
                            form.reset();
                            closeModal(insertCompany);
                            showCompanies(urlShowCompanies);
                            setTimeout(() => {
                                successAlert.style.display = "none";
                                successAlert.innerText = "";

                            }, 1000);

                    } else {

                        console.log(output.message)

                        Swal.fire({
                        icon: 'error',
                        title: '¡No pudo insertarse la compañia!',
                        showConfirmButton: false,
                        timer: 1500
                        });

                        dangerAlert.style.display = "block";
                        dangerAlert.innerText = output.message;
                        setTimeout(() => {
                            dangerAlert.style.display = "none";
                            dangerAlert.innerText = "";

                        }, 1000)
                    }

                }catch (error) {

                    console.log("Error: " + error)

                    Swal.fire({
                    icon: 'error',
                    title: '¡Error comunicandose con el servidor!',
                    showConfirmButton: false,
                    timer: 1500
                    });

                    dangerAlert.style.display = "block";
                    dangerAlert.innerText = error.message;
                    setTimeout(() => {
                    dangerAlert.style.display = "none";
                    dangerAlert.innerText = "";
                    }, 1000)
                }
            });

            // let urlInsert= `../Controller/class_ControllerCompany.php?q=${q}`;

        
        ///////////////■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Edit Company ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■///////////////

            var modalEditCompany=document.getElementById('modalEditCompany');

            var closeEditCompany=document.getElementById('closeEditCompany');
            closeEditCompany.addEventListener('click', function() {
                closeModal(modalEditCompany);
            });
            
            const editCompany = async (event, idE) => {

                event.preventDefault();

                openModal(modalEditCompany);
           
                console.log(idE); /*for DEBUG*/

                let urlFilterCompanies=`../../Controller/filter_company.php`;

                /*Getting the values of the company via its ID*/

                var company= await searchById(urlFilterCompanies,idE);
                
                /*changing the default values of the form into the data from db*/

                document.getElementById('nameEdit').value = company[0].name;
                document.getElementById('statusEdit').value = company[0].status;
                document.getElementById('opportunityLevelEdit').value = company[0].opportunityLevel;
                document.getElementById('nextActionEdit').value = company[0].nextAction;
                document.getElementById('industryEdit').value = company[0].industry;
                document.getElementById('servicesEdit').value = company[0].services;
                document.getElementById('phoneEdit').value = company[0].phone;
                document.getElementById('emailEdit').value = company[0].email;
                document.getElementById('websiteEdit').value = company[0].website;
                document.getElementById('socialMediaEdit').value = company[0].socialMedia;
                document.getElementById('responsableEdit').value = company[0].responsable;
                document.getElementById('phoneResponsableEdit').value = company[0].phoneResponsable;
                document.getElementById('emailResponsableEdit').value = company[0].emailResponsable;
                document.getElementById('extraInfoResponsableEdit').value = company[0].extraInfoResponsable;
                document.getElementById('extraInfoCompanyEdit').value = company[0].extraInfoCompany;
                document.getElementById('addressEdit').value = company[0].address;
                document.getElementById('cityEdit').value = company[0].city;
                document.getElementById('countryEdit').value = company[0].country;
                document.getElementById('commentsSales1Edit').value = company[0].commentsSales1;
                document.getElementById('commentsSales2Edit').value = company[0].commentsSales2;
                document.getElementById('openingDateEdit').value = company[0].openingDate;
                document.getElementById('lastCheckDateEdit').value = company[0].lastCheckDate;
                document.getElementById('closingDateEdit').value = company[0].closingDate;
                document.getElementById('nextDateForContactEdit').value = company[0].nextDateForContact;
                document.getElementById('nextDateForClosingEdit').value = company[0].nextDateForClosing;
                document.getElementById('isInterestedEdit').value = company[0].isInterested;
                document.getElementById('salesStateEdit').value = company[0].salesState;
                document.getElementById('isClientEdit').value = company[0].isClient;
                document.getElementById('salesmanContacterEdit').value = company[0].salesmanContacter;
                document.getElementById('salesmanCloserEdit').value = company[0].salesmanCloser;
                document.getElementById('typeOfContractEdit').value = company[0].typeOfContract;

                //■■■■■■ API fetch PUT request to Edit Data ■■■■■//

                let btnEdit=document.getElementById('btnEditCompany');

                let urlEdit= '../../Controller/edit_company.php';

                btnEdit.addEventListener('click', async (event) =>{

                    event.preventDefault();
     
                    let name= document.getElementById('nameEdit').value;
                    let status= document.getElementById('statusEdit').value;
                    let opportunityLevel= document.getElementById('opportunityLevelEdit').value;
                    let nextAction= document.getElementById('nextActionEdit').value;
                    let industry= document.getElementById('industryEdit').value;
                    let services= document.getElementById('servicesEdit').value;
                    let phone= document.getElementById('phoneEdit').value;
                    let email= document.getElementById('emailEdit').value;
                    let website= document.getElementById('websiteEdit').value;
                    let socialMedia= document.getElementById('socialMediaEdit').value;
                    let responsable= document.getElementById('responsableEdit').value;
                    let phoneResponsable= document.getElementById('phoneResponsableEdit').value;
                    let emailResponsable= document.getElementById('emailResponsableEdit').value;
                    let extraInfoResponsable= document.getElementById('extraInfoResponsableEdit').value;
                    let extraInfoCompany= document.getElementById('extraInfoCompanyEdit').value;
                    let address= document.getElementById('addressEdit').value;
                    let city= document.getElementById('cityEdit').value;
                    let country= document.getElementById('countryEdit').value;
                    let commentsSales1= document.getElementById('commentsSales1Edit').value;
                    let commentsSales2= document.getElementById('commentsSales2Edit').value;
                    let openingDate= document.getElementById('openingDateEdit').value;
                    let lastCheckDate= document.getElementById('lastCheckDateEdit').value;
                    let closingDate= document.getElementById('closingDateEdit').value;
                    let nextDateForContact= document.getElementById('nextDateForContactEdit').value;
                    let nextDateForClosing= document.getElementById('nextDateForClosingEdit').value;
                    let isInterested= document.getElementById('isInterestedEdit').value;
                    let salesState= document.getElementById('salesStateEdit').value;
                    let isClient= document.getElementById('isClientEdit').value;
                    let salesmanContacter= document.getElementById('salesmanContacterEdit').value;
                    let salesmanCloser= document.getElementById('salesmanCloserEdit').value;
                    let typeOfContract= document.getElementById('typeOfContractEdit').value;

                    try {
                        let url= `${urlEdit}`;
                        const res= await fetch(url, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                "id":idE,
                                "name": name,
                                "status": status,
                                "opportunityLevel": opportunityLevel,
                                "nextAction": nextAction,
                                "industry": industry,
                                "services": services,
                                "phone": phone,
                                "email": email,
                                "website": website,
                                "socialMedia": socialMedia,
                                "responsable": responsable,
                                "phoneResponsable": phoneResponsable,
                                "emailResponsable": emailResponsable,
                                "extraInfoResponsable": extraInfoResponsable,
                                "extraInfoCompany": extraInfoCompany,
                                "address": address,
                                "city": city,
                                "country": country,
                                "commentsSales1": commentsSales1,
                                "commentsSales2": commentsSales2,
                                "openingDate": openingDate,
                                "lastCheckDate": lastCheckDate,
                                "closingDate": closingDate,
                                "nextDateForContact": nextDateForContact,
                                "nextDateForClosing": nextDateForClosing,
                                "isInterested": isInterested,
                                "salesState": salesState,
                                "isClient": isClient,
                                "salesmanContacter": salesmanContacter,
                                "salesmanCloser": salesmanCloser,
                                "typeOfContract": typeOfContract,
                                })
                        })
                        console.log(res);
                        const output= await res.json();
                        console.log(output);

                        //displaying the updated companies list*//

                        showCompanies(urlShowCompanies);

                        if (output.success) {

                            Swal.fire({
                            icon: 'success',
                            title: `${output.message}`,
                            showConfirmButton: false,
                            timer: 1500
                            });

                            successAlert.style.display = "block";
                            successAlert.innerText = output.message;

                            /*reseting the form, and closing the modal*/

                            let form=document.getElementById('formEditCompany');

                            form.reset();

                            closeModal(modalEditCompany);

                            setTimeout(() => {
                                successAlert.style.display = "none";
                                successAlert.innerText = "";

                            }, 1000);

                        } else {

                            console.log(output.message)

                            Swal.fire({
                            icon: 'error',
                            title: '¡No pudo editarse la compañia!',
                            showConfirmButton: false,
                            timer: 1500
                            });

                            dangerAlert.style.display = "block";
                            dangerAlert.innerText = output.message;
                            setTimeout(() => {
                                dangerAlert.style.display = "none";
                                dangerAlert.innerText = "";

                            }, 1000)
                        }

                    }catch (error) {

                        console.log("Error: " + error)

                        Swal.fire({
                        icon: 'error',
                        title: '¡Error comunicandose con el servidor!',
                        showConfirmButton: false,
                        timer: 1500
                        });

                        dangerAlert.style.display = "block";
                        dangerAlert.innerText = error.message;
                        setTimeout(() => {
                        dangerAlert.style.display = "none";
                        dangerAlert.innerText = "";
                        }, 1000)
                    }
                });
            }

        ///////////////■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Delete Company ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■///////////////

                
                const deleteCompany = async (event, idEdit) => {

                    event.preventDefault();

                    const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                    })

                    swalWithBootstrapButtons.fire({
                    title: '¿Está seguro que desea borrar este registro?',
                    text: "¡Este cambio no podrá ser revertido!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, borrar',
                    cancelButtonText: 'Cancelar',
                    reverseButtons: true
                    }).then( async (result) => {
                        if (result.isConfirmed) {

                            //■■■■■■ Delete Company API fetch request ■■■■■■//                                
                            const id = idEdit;
                            let urlDeleteCompany= `../../Controller/delete_company.php?id=${id}`;

                            try{
                                const res= await fetch(urlDeleteCompany, {
                                    method: 'DELETE',
                                    headers: {
                                        'Content-Type': 'application/json'
                                    }
                                });

                                const output = await res.json();

                                console.log(output);

                                if (output.success) {

                                    Swal.fire({
                                    icon: 'success',
                                    title: '¡Compañia borrada con éxito!',
                                    text: 'La compañia ha sido borrada del registro.',
                                    showConfirmButton: false,
                                    timer: 1500
                                    });
                                    showCompanies(urlShowCompanies);

                                    successAlert.style.display = "block";
                                    successAlert.innerText = output.message;
                                    setTimeout(() => {
                                        successAlert.style.display = "none";
                                        successAlert.innerText = "";
                                    }, 1000);

                                } else {

                                    console.log(output.message)

                                    Swal.fire({
                                    icon: 'error',
                                    title: '¡No se pudo borrar la compañia!',
                                    showConfirmButton: false,
                                    timer: 1500
                                    });

                                    dangerAlert.style.display = "block";
                                    dangerAlert.innerText = output.message;
                                    setTimeout(() => {
                                    dangerAlert.style.display = "none";
                                    dangerAlert.innerText = "";

                                }, 1000)
                                }
                            } catch (error) {

                                console.log("Error: " + error)

                                Swal.fire({
                                icon: 'error',
                                title: '¡Error comunicandose con el servidor!',
                                showConfirmButton: false,
                                timer: 1500
                                });

                                dangerAlert.style.display = "block";
                                dangerAlert.innerText = error.message;
                                setTimeout(() => {
                                dangerAlert.style.display = "none";
                                dangerAlert.innerText = "";
                                }, 1000)
                            };

                           
                        } else if (result.dismiss === Swal.DismissReason.cancel){
                            swalWithBootstrapButtons.fire(
                            'Cancelado.',
                            'El proceso de borrado se ha cancelado.',
                            'error'
                            )
                        }
                    })
                }


        /////■■■■■■■■■■■■■■■■■■   Open Dialog with single company full info  ■■■■■■■■■■■■■■■■■/////

        
            // var fullCompany=document.getElementById('modalCompany');

            // var openCompany=document.getElementById('openCompany');
            // openCompany.addEventListener('click', function(event) {
            //     event.preventDefault();
            //     openModal(fullCompany);
            // });

            // var closeCompany=document.getElementById('closeCompany');
            // closeCompany.addEventListener('click', function() {
            //     closeModal(fullCompany);
            // });
                        
        
        
    
        </script>

    <!-- ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Includes Js Functions & External CDNs ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■  -->   
                
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type="text/javascript" src="../../../public/js/functions.js"></script>

</body>

</html>