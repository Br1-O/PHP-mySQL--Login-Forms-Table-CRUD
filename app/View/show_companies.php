<?php
require '../Controller/session_validation.php';

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../public/css/styles.css">
    <title>Listado de Empresas</title>
</head>

<body background: "linear-gradient(to bottom, #8d8de3, #a874cd)"  bgcolor="#2C62D4">

    <div class="info-bar">
        <div class='search'>
            <form class='search' action="../Controller/filter_company.php" method="get">
            <select name="searchField" id='searchField'>
                <option value="option" selected disabled>Categoria: </option>
                <option value="name">Nombre</option>
                <option value="services">Servicios</option>
                <option value="responsable">Responsable</option>
                <option value="phone">Telefono</option>
                <option value="website">Pagina</option>
                <option value="city">Ciudad</option>
                <option value="openingDate">Fecha_inicio</option>
                <option value="closingDate">Fecha_cierre</option>
            </select>
        
            <input type="text" id='inputSearch' placeholder="Ingrese su busqueda">  
            <button name="search" id='searchBtn'> Buscar </button>
            </form>
        </div>

        <div id='optionsNav'>

        <button name="mostrarDatos" onclick="redirectToPage('show_companies.php')"> Mostrar todos </button>

        <button name="form-company" id='openInsertCompany'> Insertar Compañia</button>

        <button name="mostrarUsuarios" onclick="redirectToPage('show_users.php')"> Mostrar Usuarios</button>

        <button><a href='../Controller/PDF_companies.php' style="color:#FFF; display:inline; width:100px"> Exportar PDF </a></button>
       
        <button><a href='../Controller/PDF_company.php?id=".$fila['id']."' style="color:#FFF; display:inline; width:100px"> Exportar Excel </a></button>

        <form class="form-logout" action="<?php $_SERVER['PHP_SELF']; ?>" method="get">
            <input type="hidden" name="logout" value="true">
            <input type="submit" class='link closeSesion' value='Cerrar Sesión'>
        </form>

        </div>
 
    </div>


    <dialog class='modal' id='modalCompany'>

        <div class="div-modal">
            <button name="btn-close-Modal" id='closeCompany'>Cerrar</button>


        </div>

    </dialog>

    <!-- ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Modal Insert Company ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■  -->
    <dialog class='modal' id='modalInsertCompany'>

        <div class="div-modal">
        <button name="btn-close-Modal" id='closeInsertCompany'>Cerrar</button>
        
        <div id="titulo">
            <h1 class='titulo-modal'> · Ingrese los datos de la Empresa, <?php echo $_SESSION['name']; ?>. · </h1>
        </div>

            <form id='formInsertCompany' class= 'form'>
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
            
            </form>
        </div>

    </dialog>

        <div class="container" id="alerts-container">
            <div class="alerts">
                <div class="alert alert-success" style='display:none;'> Success! </div>
                <div class="alert alert-danger" style='display:none;'> Failed. </div>
            </div>
        </div>

        <table class='table-companies'> 
        </table>

    <!-- ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Funciones API Fetch ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■  -->   

        <script>


        ///////////////■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Show Companies ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■///////////////


            const query = 'showCompanies';

            let urlShowCompanies= `../Controller/class_ControllerCompany.php?q=${query}`;

            
            const showCompanies = async (url) => {
                
                try{
                    const table= document.querySelector('.table-companies')

                    let body='';

                    const res= await fetch(url, {
                        method: 'GET',
                        headers: {
                            'Content-Type': 'application/json'
                        }
                    });

                    const output = await res.json();
                    
                    if(output.empty==='empty'){

                        body+='<Tr><Td colspan="2"> No se encontró ninguna compañia. </Td></Tr>';
                    }else{
                        for (var i in output) {
                            console.log(output);
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
                                        <a href=# onclick="editCompany(event, ${output[i].id})" ><img src='../../public/images/icon_edit.png' alt='edit register' style='width:30px; height:30px; margin-right:5%;' id='btn_edit'></a>
                                        <a href=# href=# onclick="deleteCompany(event, ${output[i].id})" ><img id='btn_delete' src='../../public/images/icon_delete2.png' alt='delete register' style='width:30px; height:30px; margin-right:5%;'></a>
                                        <a href= # onclick="PDFcompany(event, ${output[i].id})" ><img id='btn_delete' src='../../public/images/download-pdf.png' alt='delete register' style='width:30px; height:30px; margin-right:5%;'></a>
                                        <a href=# onclick="EXCELcompany(event, ${output[i].id})"><img id='btn_delete' src='../../public/images/excel3.png' alt='delete register' style='width:30px; height:30px; margin-right:5%;'></a>
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
                    console.log("error " + error)
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

                    console.log(res); //FOR DEBUG
                    const output = await res.json();
                    console.log(output); //FOR DEBUG
                    console.log(output.empty); //FOR DEBUG

                    if(output.empty==='empty'){
                        console.log(output.empty);
                        body+='<Tr><Td colspan="2"> No se encontró ninguna compañia. </Td></Tr>';
                    }else{
                        for (var i in output) {
                            console.log(output);
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
                                        <a href=# onclick="editCompany(event, ${output[i].id})" ><img src='../../public/images/icon_edit.png' alt='edit register' style='width:30px; height:30px; margin-right:5%;' id='btn_edit'></a>
                                        <a href=# href=# onclick="deleteCompany(event, ${output[i].id})" ><img id='btn_delete' src='../../public/images/icon_delete2.png' alt='delete register' style='width:30px; height:30px; margin-right:5%;'></a>
                                        <a href= # onclick="PDFcompany(event, ${output[i].id})" ><img id='btn_delete' src='../../public/images/download-pdf.png' alt='delete register' style='width:30px; height:30px; margin-right:5%;'></a>
                                        <a href=# onclick="EXCELcompany(event, ${output[i].id})"><img id='btn_delete' src='../../public/images/excel3.png' alt='delete register' style='width:30px; height:30px; margin-right:5%;'></a>
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
                        console.log("error " + error)
                }
            }
                
            inputSearch.addEventListener('keyup', async (event)=>{
                
                let searchField= searchFieldSelect.value;
                let value= inputSearch.value;

                let urlFilterCompanies=`../Controller/filter_company.php?searchField=${searchField}&value=${value}`;

                let texto= event.target.value;

                await searchCompanies(urlFilterCompanies);
                console.log(texto);
            });

    

        
        ///////////////■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Insert Companies ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■///////////////


            let btnInsertCompany= document.getElementById('btnInsertCompany');

            let successAlert= document.querySelector('.alert-success');

            let dangerAlert= document.querySelector('.alert-danger');

            // const q = 'insertCompany';

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

                    let urlInsert= '../Controller/insert_company.php';

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
                            showCompanies();
                            setTimeout(() => {
                                successAlert.style.display = "none";
                                successAlert.innerText = "";

                            }, 1000);

                    } else {
                        dangerAlert.style.display = "block";
                        dangerAlert.innerText = output.message;
                        setTimeout(() => {
                            dangerAlert.style.display = "none";
                            dangerAlert.innerText = "";

                        }, 1000)
                    }
                } catch (error) {
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

        const editCompany= async (event, companyId) => {
            event.preventDefault();
            openModal(insertCompany);
            document.querySelector('#titulo').innerHTML= "<h1 class='titulo-modal'> · Modifique los datos de la Empresa: </h1>";



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




    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript" src="../../public/js/functions.js"></script>

</body>
</html>

<?php

// <Tr id='tr-last' ><Th id='th-last' colspan ='2' >
// <a href='edit_company.php?assoc=".$fila['id']."' ><img src='../../public/images/icon_edit.png' alt='edit register' style='width:30px; height:30px; margin-right:5%;' id='btn_edit'></a>
// <a href='../Controller/delete_company.php?get=deleteCompany&idborrar=".$fila['id']."'><img id='btn_delete' src='../../public/images/icon_delete2.png' alt='delete register' style='width:30px; height:30px; margin-right:5%;'></a>
// <a href='../Controller/PDF_company.php?id=".$fila['id']."'><img id='btn_delete' src='../../public/images/download-pdf.png' alt='delete register' style='width:30px; height:30px; margin-right:5%;'></a>
// <a href='../Controller/EXCEL_company.php?id=".$fila['id']."'><img id='btn_delete' src='../../public/images/excel3.png' alt='delete register' style='width:30px; height:30px; margin-right:5%;'></a>
// </Tr>

// error_reporting(0);
// if($_GET['data']){

//     $results=$_GET['data'];

//     echo "<table class='table-companies'>";

//     foreach ($results as $fila){
//         //imprimir datos en cada fila
     
//         echo "<Tr><Th rowspan ='8'id='th-1'><a href='show_company.php?id=".$fila['id']."'>".$fila["nombre"]."</a></Th></Tr>";
//         echo "<Tr><th>Servicios</Th><Td id='td-1'>".$fila["servicios"]."</Td></Tr>";
//         echo "<Tr><Th>Responsable</Th><Td>".$fila["responsable"]."</Td></Tr>";
//         echo "<Tr><Th>Telefono</Th><Td>".$fila["telefono"]."</Td></Tr>";
//         echo "<Tr><Th>Pagina</Th><Td>".$fila["pagina"]."</Td></Tr>";
//         // echo"<Tr><Th>Comentarios</Th><Td>".$fila["comentarios"]."</Td></Tr>";
//         echo "<Tr><Th>Fecha de Inicio</Th><Td>".$fila["fecha_inicio"]."</Td></Tr>";
//         echo "<Tr><Th>Fecha de Cierre</Th><Td>".$fila["fecha_cierre"]."</Td></Tr>";
//         echo "<Tr id='tr-last' ><Th id='th-last' colspan ='2' >
//         <a href='edit_company.php?assoc=".$fila['id']."' ><img src='../../public/images/icon_edit.png' alt='edit register' style='width:30px; height:30px; margin-right:5%;' id='btn_edit'></a>
//         <a href='../Controller/delete_company.php?idborrar=".$fila['id']."'><img id='btn_delete' src='../../public/images/icon_delete2.png' alt='delete register' style='width:30px; height:30px; margin-right:5%;'></a>
//         <a href='../Controller/PDF_company.php?id=".$fila['id']."'><img id='btn_delete' src='../../public/images/download-pdf.png' alt='delete register' style='width:30px; height:30px; margin-right:5%;'></a>
//         <a href='../Controller/EXCEL_company.php?id=".$fila['id']."'><img id='btn_delete' src='../../public/images/excel3.png' alt='delete register' style='width:30px; height:30px; margin-right:5%;'></a>
//         </Th></Tr>";
// }

//     echo "</table>";

// }else{

//     require_once '../Model/classes/autoload.php';
    
//     $fil=Company::showData($conn);

//     echo "<table class='table-companies'>";

//     while($fila=$fil->fetch_assoc()){
//         //imprimir datos en cada fila
    
//         echo "<Tr><Th rowspan ='8'id='th-1'><a href='show_company.php?id=".$fila['id']."'>".$fila["nombre"]."</a></Th></Tr>";
//         echo "<Tr><th>Servicios</Th><Td id='td-1'>".$fila["servicios"]."</Td></Tr>";
//         echo "<Tr><Th>Responsable</Th><Td>".$fila["responsable"]."</Td></Tr>";
//         echo "<Tr><Th>Telefono</Th><Td>".$fila["telefono"]."</Td></Tr>";
//         echo "<Tr><Th>Pagina</Th><Td>".$fila["pagina"]."</Td></Tr>";
//         // echo"<Tr><Th>Comentarios</Th><Td>".$fila["comentarios"]."</Td></Tr>";
//         echo "<Tr><Th>Fecha de Inicio</Th><Td>".$fila["fecha_inicio"]."</Td></Tr>";
//         echo "<Tr><Th>Fecha de Cierre</Th><Td>".$fila["fecha_cierre"]."</Td></Tr>";
//         echo "<Tr id='tr-last' ><Th id='th-last' colspan ='2' >
//         <a title='Editar' class='tableIcon' href='edit_company.php?assoc=".$fila['id']."' ><img src='../../public/images/icon_edit.png' alt='edit register' style='width:30px; height:30px; margin-right:5%;' id='btn_edit'></a>
//         <a title='Borrar' href='../Controller/delete_company.php?idborrar=".$fila['id']."'><img id='btn_delete' src='../../public/images/icon_delete2.png' alt='delete register' style='width:30px; height:30px; margin-right:5%;'></a>
//         <a title='Exportar PDF' href='../Controller/PDF_company.php?id=".$fila['id']."'><img id='btn_delete' src='../../public/images/download-pdf.png' alt='delete register' style='width:30px; height:30px; margin-right:5%;'></a>
//         <a title='Exportar Excel' href='../Controller/EXCEL_company.php?id=".$fila['id']."'><img id='btn_delete' src='../../public/images/excel3.png' alt='delete register' style='width:30px; height:30px; margin-right:5%;'></a>
//         </Th></Tr>";
// }

//     echo "</table>";    

// }



?>