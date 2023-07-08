//applying opening and closing to the buttons of the modal of insert company

    if(document.getElementById('openInsertCompany')){

        let insertCompany=document.getElementById('modalInsertCompany');

        let openInsertCompany=document.getElementById('openInsertCompany');

            openInsertCompany.addEventListener('click', function() {
                openModal(insertCompany);
            });

        let closeInsertCompany=document.getElementById('closeInsertCompany');
        
            closeInsertCompany.addEventListener('click', function() {
                closeModal(insertCompany);
            });
    }

// ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Funciones API Fetch ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ 

    ///////////////■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Delete Company ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■///////////////


        //■■■■■■ Delete Company API fetch URL request ■■■■■■// 

            let urlDeleteCompany= '../../Controller/delete_company.php';

    ///////////////■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Edit Company ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■///////////////

        var modalEditCompany=document.getElementById('modalEditCompany');

            var closeEditCompany=document.getElementById('closeEditCompany');
            
                closeEditCompany.addEventListener('click', function() {
                    closeModal(modalEditCompany);
                });

        //URL edit data

            let urlFilterCompanies=`../../Controller/filter_company.php`;

            let urlEdit= '../../Controller/edit_company.php';

    ///////////////■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Show Companies ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■///////////////

        const table= document.querySelector('.table-companies');

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
                                <a href=# onclick="editCompany(event, ${output[i].id}, modalEditCompany, urlFilterCompanies, urlEdit)" ><img src='../../../public/images/icon_edit.png' alt='edit register' style='width:30px; height:30px; margin-right:5%;' id='btn_edit'></a>
                                <a href=# onclick="deleteCompany(event, ${output[i].id}, urlDeleteCompany)" ><img id='btn_delete' src='../../../public/images/icon_delete2.png' alt='delete register' style='width:30px; height:30px; margin-right:5%;'></a>
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

        document.addEventListener("DOMContentLoaded", showCompanies(urlShowCompanies, body));

    ///////////////■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Search Companies ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■///////////////
    
        const inputSearch = document.querySelector('#inputSearch');
        const searchFieldSelect= document.querySelector('#searchField');

        //assigning searchCompanies to input search
            
            inputSearch.addEventListener('keyup', async (event)=>{
                
                let searchField= searchFieldSelect.value;
                let value= inputSearch.value;

                let urlFilterCompanies=`../../Controller/filter_company.php?searchField=${searchField}&value=${value}`;

                let texto= event.target.value;

                await searchCompanies(urlFilterCompanies, body);
                console.log(texto);
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


















 







    