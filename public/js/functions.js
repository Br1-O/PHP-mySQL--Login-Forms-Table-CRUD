//function to redirect to other page when clicking

    function redirectToPage(destination) {
        window.location.href = destination;
        }

//general opening and closing modal functions

    function openModal(modal){modal.showModal();}

    function closeModal(modal){modal.close();}
        
// ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Funciones API Fetch ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ 

    ///////////////■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Show Companies ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■///////////////

        //function showCompanies 
        //('body' is a function with a for loop, that appends an inner structure of a html table made to show the values of the fields 
        //inside each index of the array in the output json)


        const showCompanies = async (url, body) => {
            
            try{
                const res= await fetch(url, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json'
                    }
                });

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

    ///////////////■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Search Companies ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■///////////////

        //function searchCompanies

        const searchCompanies = async (url, searchBody) => {
            
            try{
                const table= document.querySelector('.table-companies')

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
                            showCompanies(urlShowCompanies, body);
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

                    let url= `${urlEdit}`;
                    const res= await fetch(url, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: bodyE
                    })
                    console.log(res);
                    const output= await res.json();
                    console.log(output);

                    //displaying the updated companies list*//

                    showCompanies(urlShowCompanies, body);

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
                }


        //Function asigned to the button edit
        
        const editCompany = async (event, idE, modal, urlFilter, urlEdit) => {

            event.preventDefault();

            openModal(modal);
        
            console.log(idE); /*for DEBUG*/

            /*Getting the values of the company via its ID*/

            var company= await searchById(urlFilter,idE);
            
            /*changing the default values of the form into the data from db*/

            // Select the inputs (example using querySelectorAll)
                // const inputs = document.querySelectorAll('.inputEdit');

            // Assign values to inputs
            
                // jsonData.values.forEach((value, index) => {
                // if (index < inputs.length) {
                //     inputs[index].value = value;
                // }
                // });

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

                const bodyE= JSON.stringify({
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

                editEntity(urlEdit, bodyE);
            });
        }

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
                            showCompanies(urlShowCompanies, body);

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

        // openFullCompany(id)

                    
    
    










