//function to redirect to other page when clicking

    function redirectToPage(destination) {
        window.location.href = destination;
        }

// ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Funciones API Fetch ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ 

    ///////////////■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Show Companies ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■///////////////

        //function showCompanies 
        //('body' is a function with a for loop, that appends an inner structure of a html table made to show the values of the fields 
        //inside each index of the array in the output json)


        const showCompanies = async (url, body, innerTable) => {
            
            try{
                const res= await fetch(url, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json'
                    }
                });

                console.log(res);
                const output = await res.json();
                console.log(output);

                if(output.empty==='empty'){

                    dangerAlert.style.display = "block";
                    dangerAlert.innerText = 'No se encontró ninguna compañia.';
                    setTimeout(() => {
                    dangerAlert.style.display = "none";
                    dangerAlert.innerText = "";
                    }, 1000)

                    // body+='<Tr><Td colspan="2"> No se encontró ninguna compañia. </Td></Tr>';

                }else{
                    body=body(output);

                    innerTable.innerHTML=`<tr class='tr-interTable'>${body}</tr>`;
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

    ///////////////■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Search Companies ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■///////////////

        //function searchCompanies

        const searchCompanies = async (url, searchBody, table) => {
            
            try{
                const res= await fetch(url, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json'
                    }
                });

                const output = await res.json();
                

                if(output.empty==='empty'){
                    search+='<Tr><Td colspan="2"><Th> No se encontró ninguna compañia.<Th></Td></Tr>';
                }else{
                    search=searchBody(output);

                    table.innerHTML=`<tr class='tr-interTable'>${search}</tr>`;
                    }  
            }catch(error){
                    table.innerHTML=`<tr class='tr-interTable'><Th> No se encontraron resultados. </Th></tr>`;
                    console.log("Error: " + error);
            }
        }

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

        //■■■■■■ API fetch POST to Insert ■■■■■//
            
            const inserCompany = async (url, insertBody) => {

                try {

                    const res= await fetch(url, {
                            method: 'POST',
                            body: insertBody,
                            headers: {
                                'Content-Type': 'application/json'
                            }
                            // body: new FormData(formInsertCompany)
                        });

                        console.log(res);
                        const output= await res.json();
                        console.log(output);

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
                            document.getElementById('closeModalInsertCompany').click();
                            
                            //if fullTable is checked it shows that one, otherwise just the resume one
                            if (checkSwitchView.matches(':checked')) {
                                showCompanies(urlShowCompanies, fullBody, fullTable);
                            } else {
                                showCompanies(urlShowCompanies, body, resumeTable);
                            }

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
        };

        // let urlInsert= `../Controller/class_ControllerCompany.php?q=${q}`;

    
    ///////////////■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Edit Company ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■///////////////
        
        //Generic function to Edit an entity

            const editEntity= async (urlEdit, bodyE)=>{

                try {

                    let url= urlEdit;
                    const res= await fetch(url, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: bodyE
                    })
                    const output= await res.json();

                    //displaying the updated companies list*//
                    //if fullTable is checked it shows that one, otherwise just the resume one
                    if (checkSwitchView.matches(':checked')) {
                        showCompanies(urlShowCompanies, fullBody, fullTable);
                    } else {
                        showCompanies(urlShowCompanies, body, resumeTable);
                    }

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

                        bodyE=null;

                        document.getElementById('closeModalEditCompany').click();

                        setTimeout(() => {
                            successAlert.style.display = "none";
                            successAlert.innerText = "";

                        }, 1000);

                    } else {

                        console.log(output.message)

                        document.getElementById('closeModalEditCompany').click();

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

                    document.getElementById('closeModalEditCompany').click();

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
                }


        //Function asigned to the button edit

        let companyEditId;
        
        const editCompany = async (event, idE, urlFilter) => {

            event.preventDefault();

            $('#modalEditCompany').modal('show');

            companyEditId=idE;
        
            /*Getting the values of the company via its ID*/

            var company= await searchById(urlFilter,idE);

            document.getElementById('nameEdit').value = company[0].Nombre;
            document.getElementById('statusEdit').value = company[0].Estado;
            document.getElementById('opportunityLevelEdit').value = company[0]['Nivel de Oportunidad'];
            document.getElementById('nextActionEdit').value = company[0]['Próxima Acción'];
            document.getElementById('industryEdit').value = company[0]['Industria'];
            document.getElementById('servicesEdit').value = company[0]['Servicios'];
            document.getElementById('phoneEdit').value = company[0]['Teléfono'];
            document.getElementById('emailEdit').value = company[0]['Email'];
            document.getElementById('websiteEdit').value = company[0]['Sitio Web'];
            document.getElementById('socialMediaEdit').value = company[0]['Redes Sociales'];
            document.getElementById('responsableEdit').value = company[0]['Responsable'];
            document.getElementById('phoneResponsableEdit').value = company[0]['Teléfono del Responsable'];
            document.getElementById('emailResponsableEdit').value = company[0]['Email del Responsable'];
            document.getElementById('extraInfoResponsableEdit').value = company[0]['Extra info del Responsable'];
            document.getElementById('extraInfoCompanyEdit').value = company[0]['Extra info de la Compañía'];
            document.getElementById('addressEdit').value = company[0]['Dirección'];
            document.getElementById('cityEdit').value = company[0]['Ciudad'];
            document.getElementById('countryEdit').value = company[0]['País'];
            document.getElementById('commentsSales1Edit').value = company[0]['Comentarios de Ventas 1'];
            document.getElementById('commentsSales2Edit').value = company[0]['Comentarios de Ventas 2'];
            document.getElementById('openingDateEdit').value = company[0]['Fecha de Apertura'];
            document.getElementById('lastCheckDateEdit').value = company[0]['Fecha de último contacto'];
            document.getElementById('closingDateEdit').value = company[0]['Fecha de Cierre'];
            document.getElementById('nextDateForContactEdit').value = company[0]['Próxima Fecha para 1er contacto'];
            document.getElementById('nextDateForClosingEdit').value = company[0]['Próxima Fecha para cierre'];
            document.getElementById('isInterestedEdit').value = company[0]['Interesado'];
            document.getElementById('salesStateEdit').value = company[0]['Estado de Ventas'];
            document.getElementById('isClientEdit').value = company[0]['Es Cliente'];
            document.getElementById('salesmanAdderEdit').value = company[0]['Añadida por'];
            document.getElementById('salesmanContacterEdit').value = company[0]['Asignado para 1er contacto'];
            document.getElementById('salesmanCloserEdit').value = company[0]['Asignado para cierre'];
            document.getElementById('typeOfContractEdit').value = company[0]['Tipo de Contrato'];

        };

            //■■■■■■ API fetch PUT request to Edit Data ■■■■■//

            let btnEdit=document.getElementById('btnEditCompany');

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
                let closingContactDate= document.getElementById('closingContactDateEdit').value;
                let closingDate= document.getElementById('closingDateEdit').value;
                let nextDateForContact= document.getElementById('nextDateForContactEdit').value;
                let nextDateForClosing= document.getElementById('nextDateForClosingEdit').value;
                let isInterested= document.getElementById('isInterestedEdit').value;
                let salesState= document.getElementById('salesStateEdit').value;
                let isClient= document.getElementById('isClientEdit').value;
                let salesmanAdder= document.getElementById('salesmanAdderEdit').value;
                let salesmanContacter= document.getElementById('salesmanContacterEdit').value;
                let salesmanCloser= document.getElementById('salesmanCloserEdit').value;
                let typeOfContract= document.getElementById('typeOfContractEdit').value;

                let bodyE= JSON.stringify({
                    "id":companyEditId,
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
                    "closingContactDate": closingContactDate,
                    "closingDate": closingDate,
                    "nextDateForContact": nextDateForContact,
                    "nextDateForClosing": nextDateForClosing,
                    "isInterested": isInterested,
                    "salesState": salesState,
                    "isClient": isClient,
                    "salesmanAdder": salesmanAdder,
                    "salesmanContacter": salesmanContacter,
                    "salesmanCloser": salesmanCloser,
                    "typeOfContract": typeOfContract,
                    });

                editEntity(urlEdit, bodyE);

            });

    ///////////////■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Delete Company ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■///////////////

             //deleteRequest WITHOUT confirmation pop-up

                const deleteEntity= async (idE, url) =>{

                    requestURL=`${url}?id=${idE}`;

                    try{
                        const res= await fetch(requestURL, {
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

                            //if fullTable is checked it shows that one, otherwise just the resume one
                            if (checkSwitchView.matches(':checked')) {
                                showCompanies(urlShowCompanies, fullBody, fullTable);
                            } else {
                                showCompanies(urlShowCompanies, body, resumeTable);
                            }

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
                };

            
            const deleteCompany = async (event, idEdit, url) => {

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

                }).then(async (result) => {
                    
                    if (result.isConfirmed) {

                        deleteEntity(idEdit, url);


                    } else if (result.dismiss === Swal.DismissReason.cancel){
                        swalWithBootstrapButtons.fire(
                        'Cancelado.',
                        'El proceso de borrado se ha cancelado.',
                        'error'
                        )
                    }
                })
            }





            
    
    










