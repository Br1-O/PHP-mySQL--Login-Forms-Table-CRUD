//■■■■■■ Autofocus eventlistener for modal ■■■■■//

    //insertCompany

    let insertCompany=document.getElementById('modalInsertCompany');

    insertCompany.addEventListener('shown.bs.modal', () => {

        let firstInput = document.getElementById('name');
        firstInput.focus();
    });

//EditCompany

    let modalEditCompany=document.getElementById('modalEditCompany');

    modalEditCompany.addEventListener('shown.bs.modal', () => {

        let firstInput = document.getElementById('nameEdit');
        firstInput.focus();
    });

// ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Funciones API Fetch ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ 

    ///////////////■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Delete Company ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■///////////////


        //■■■■■■ Delete Company API fetch URL request ■■■■■■// 

            let urlDeleteCompany= '../../Controller/delete_company.php';

    ///////////////■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Edit Company ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■///////////////

        //URL edit data

            let urlFilterCompanies=`../../Controller/filter_company.php`;

            let urlEdit= '../../Controller/edit_company.php';

    ///////////////■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Advance search offcanvas ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■///////////////

        /*switch function for full info and resume info table of show companies*/

        let checkSwitchView=document.querySelector(".switchView");

        checkSwitchView.addEventListener('change', ()=>{
            console.log(checkSwitchView.value);
        })
        
        let resumeTable=document.querySelector('.table-companies');
        let fullTable=document.querySelector('.table-companies-full');

        function switchView() {

            if (checkSwitchView.matches(':checked')) {
                resumeTable.style.display='none';
                fullTable.style.display='block';

                showCompanies(urlShowCompanies, fullBody, fullTable);

            } else {
                resumeTable.style.display='block';
                fullTable.style.display='none';
            }
        }

        checkSwitchView.addEventListener('click', switchView());
                            
                    let fullBody = (output) => {

                        let body= '';
                        let flag=0;
                        let flag2=0;

                        //loop to access to the keys and to all values once
                    
                        for (let i in output) {
                            
                            //basically we will print all the keys first
                            if(flag==0){
                                    for (const key of Object.keys(output[i])){
                                        //here I want to avoid printing some keys, just because I personally think it is best those doesn't show in table
                                        if(key!='id'&&key!='Comentarios de Ventas 1'&&key!='Comentarios de Ventas 2'&&key!='Interesado'&&key!='Redes Sociales'&&key!='Archivos de la Compañía'&&key!='Extra info del Responsable'&&key!='Extra info de la Compañía'&&key!='Es Cliente'&&key!='Dirección'){

                                            body+=`
                                            <th>${key}</th>
                                            `;
                                            flag2++;
                                        }
                                        //I'm checking the flag2 to put "options" key in second place
                                        if(flag2==1){
                                            body+=`
                                            <td colspan=2>Options</td>
                                            `;
                                        }
                                    }
                            
                                flag++;  //will iterate only once, so the keys are printed in the head and then the values

                            }
                                //will be the full table's body
                                body+=` <tr>
                                <td><a href="#" title="Click para abrir información completa de ${output[i].Nombre}" id='openFullCompany' class="btn btn-primary" onclick="openFullCompany(event,${output[i].id})">${output[i].Nombre}</a></td>
                                <td><a href=# title="Editar" onclick="editCompany(event, ${output[i].id}, urlFilterCompanies, urlEdit)" ><img src='../../../public/images/icon_edit.png' alt='edit register' style='width:30px; height:30px; margin-right:5%;' id='btn_edit'></a></td>
                                <td><a href=# title="Borrar" onclick="deleteCompany(event, ${output[i].id}, urlDeleteCompany)" ><img id='btn_delete' src='../../../public/images/icon_delete2.png' alt='delete register' style='width:30px; height:30px; margin-right:5%;'></a></td>
                                <td>${output[i].Estado}</td>
                                <td>${output[i]['Nivel de Oportunidad']}</td>
                                <td>${output[i]['Próxima Acción']}</td>
                                <td>${output[i]['Industria']}</td>
                                <td>${output[i]['Servicios']}</td>
                                <td>${output[i]['Teléfono']}</td>
                                <td>${output[i]['Email']}</td>
                                <td>${output[i]['Sitio Web']}</td>
                                <td>${output[i]['Responsable']}</td>
                                <td>${output[i]['Teléfono del Responsable']}</td>
                                <td>${output[i]['Email del Responsable']}</td>
                                <td>${output[i]['Ciudad']}</td>
                                <td>${output[i]['País']}</td>
                                <td>${output[i]['Fecha de Apertura']}</td>
                                <td>${output[i]['Fecha de último contacto']}</td>
                                <td>${output[i]['Fecha cierre de 1er contacto']}</td>
                                <td>${output[i]['Fecha de Cierre']}</td>
                                <td>${output[i]['Próxima Fecha para 1er contacto']}</td>
                                <td>${output[i]['Próxima Fecha para cierre']}</td>
                                <td>${output[i]['Estado de Ventas']}</td>
                                <td>${output[i]['Añadida por']}</td>
                                <td>${output[i]['Asignado para 1er contacto']}</td>
                                <td>${output[i]['Asignado para cierre']}</td>
                                <td>${output[i]['Tipo de Contrato']}</td>
                                </tr>
                                `;
                             
                        }
                        return body;
                    }

        ///////////////■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Show Companies ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■///////////////

            const query = 'showCompanies';

            let urlShowCompanies= `../../Controller/class_ControllerCompany.php?q=${query}`;


            //■■■■■■■■■ body function to show the inner table formated for Company ■■■■■■■■■//

                let body = (output) => {

                    let body= '';

                    for (var i in output) {
                        body+=` 
                            <td id='td-outside'>
                                <table>
                                    <Tr class='trIntern'>
                                        <Th rowspan ='10'id='th-1'>
                                            <a href="#" title="Click para abrir información completa de ${output[i].Nombre}" id='openFullCompany' class="btn btn-primary" onclick="openFullCompany(event,${output[i].id})">${output[i].Nombre}</a>
                                        </Th>
                                    </Tr>
                                        <Tr class='trIntern'>
                                            <th>Industria</Th> <Td id='td-1'> ${output[i]['Industria']} </Td>
                                        </Tr>
                                        <Tr class='trIntern'>
                                            <Th>Responsable</Th> <Td> ${output[i]['Responsable']} </Td>
                                        </Tr>
                                        <Tr class='trIntern'>
                                            <Th>Telefono Resp.</Th><Td> ${output[i]['Teléfono del Responsable']} </Td>
                                        </Tr>
                                        <Tr class='trIntern'>
                                            <Th>Email Resp.</Th><Td> ${output[i]['Email del Responsable']} </Td>
                                        </Tr>
                                        <Tr class='trIntern'>
                                            <Th>Telefono Comp.</Th><Td> ${output[i]['Teléfono']} </Td>
                                        </Tr>
                                        <Tr class='trIntern'>
                                            <Th>Email Comp.</Th><Td> ${output[i]['Email']} </Td>
                                        </Tr>
                                        <Tr class='trIntern'>
                                            <Th>Fecha de Inicio</Th><Td> ${output[i]['Fecha de Apertura']} </Td>
                                        </Tr>
                                        <Tr class='trIntern'>
                                            <Th>Fecha último checkeo</Th><Td> ${output[i]['Fecha de último contacto']} </Td>
                                        </Tr>
                                        <Tr id='tr-last' class='trIntern'>
                                            <Th id='th-last' colspan ='2' >
                                                <a href=#  title="Editar" onclick="editCompany(event, ${output[i].id}, urlFilterCompanies, urlEdit)" ><img src='../../../public/images/icon_edit.png' alt='edit register' style='width:30px; height:30px; margin-right:5%;' id='btn_edit'></a>
                                                <a href=#  title="Borrar" onclick="deleteCompany(event, ${output[i].id}, urlDeleteCompany)" ><img id='btn_delete' src='../../../public/images/icon_delete2.png' alt='delete register' style='width:30px; height:30px; margin-right:5%;'></a>
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
                    return body;
                }

                if (checkSwitchView.matches(':checked')) {
                    document.addEventListener("DOMContentLoaded", showCompanies(urlShowCompanies, fullBody, fullTable));
                } else {
                    document.addEventListener("DOMContentLoaded", showCompanies(urlShowCompanies, body, resumeTable));
                }


    ///////////////■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Search Companies ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■///////////////
    
        const inputSearch = document.querySelector('#inputSearch');
        const searchFieldSelect= document.querySelector('#searchField');

        //assigning searchCompanies to input search
            
            inputSearch.addEventListener('keyup', async (event)=>{
                
                let searchField= searchFieldSelect.value;
                let value= inputSearch.value;

                let urlFilterCompanies=`../../Controller/filter_company.php?searchField=${searchField}&value=${value}`;

                let texto= event.target.value;

                if(checkSwitchView.matches(':checked')){
                    await searchCompanies(urlFilterCompanies, fullBody, fullTable);
                    console.log(texto);
                }else{
                    await searchCompanies(urlFilterCompanies, body, resumeTable);
                    console.log(texto);
                };
            });
    
    ///////////////■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Insert Companies ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■///////////////


        let btnInsertCompany= document.getElementById('btnInsertCompany');

        let successAlert= document.querySelector('.alert-success');

        let dangerAlert= document.querySelector('.alert-danger');

        let urlInsert= '../../Controller/insert_company.php';

        btnInsertCompany.addEventListener('click', function() {

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
    
            let requestBody= JSON.stringify({
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
                "companyFiles": companyFiles});
    
            inserCompany(urlInsert,requestBody);
            
        });

    ///////////////■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ MODAL · Display Full Info of Company ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■///////////////

            
    let tableContact=document.getElementById('tableFullCompanyTab1');
    let fullCompanyTittle=document.getElementById('fullCompanyLabel');


    async function openFullCompany(event, id) {

        event.preventDefault();

        $('#modalFullCompany').modal('show');
        
        let fullCompany= await searchById(urlFilterCompanies, id);

        console.log(fullCompany[0]);
        
        let body='';

        Object.keys(fullCompany[0]).forEach(key => {
            const value = fullCompany[0][key];

            body+=`<tr><th><strong>${key}</strong></th><td>${value}</td></tr>`;
        });

        tableContact.innerHTML=`${body}`;
        fullCompanyTittle.innerHTML=`Datos de la empresa: <strong>${fullCompany[0].Nombre}</strong>`;
    };



            

















 







    