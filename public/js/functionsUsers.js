//function to redirect to other page when clicking

    function redirectToPage(destination) {
        window.location.href = destination;
        }

//general opening and closing modal functions

    function openModal(modal){modal.showModal();}

    function closeModal(modal){modal.close();}

//applying opening and closing to the buttons of the modal of insert company
    if(document.getElementById('openInsertUser')){

        var insertUser=document.getElementById('modalInsertUser');

            var openInsertUser=document.getElementById('openInsertUser');
            
                openInsertUser.addEventListener('click', function() {
                    openModal(insertUser);
                });

            var closeInsertUser=document.getElementById('closeInsertUser');
            
                closeInsertUser.addEventListener('click', function() {
                    closeModal(insertUser);
                });
    }

//■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Funciones API Fetch ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■  

    ///////////////■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Show Users ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■///////////////

        let successAlert= document.querySelector('.alert-success');

        let dangerAlert= document.querySelector('.alert-danger');

        const table= document.querySelector('.table-users')

        let urlShowUsers= `../../Controller/show_users.php`;

        const showUsers = async (url) => {

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
                    dangerAlert.innerText = 'No se encontró ningun usuario.';
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
                                    <a href='#' id='openCompany' onclick=openFullUser(${output[i].id})>${output[i].user}</a>
                                </Th>
                            </Tr>
                            <Tr class='trIntern'>
                                <th>Nombre</Th> <Td id='td-1'> ${output[i].name} </Td>
                            </Tr>
                            <Tr class='trIntern'>
                                <Th>Apellido</Th> <Td> ${output[i].lastName} </Td>
                            </Tr>
                            <Tr class='trIntern'>
                                <Th>Compañia</Th><Td> ${output[i].company} </Td>
                            </Tr>
                            <Tr class='trIntern'>
                                <Th>Telefono</Th><Td> ${output[i].phone} </Td>
                            </Tr>
                            <Tr class='trIntern'>
                                <Th>Email</Th><Td> ${output[i].email} </Td>
                            </Tr>
                            <Tr class='trIntern'>
                                <Th>Ciudad</Th><Td> ${output[i].city} </Td>
                            </Tr>
                            <Tr class='trIntern'>
                                <Th>País</Th><Td> ${output[i].country} </Td>
                            </Tr>
                            <Tr class='trIntern'>
                                <Th>Fecha de registro</Th><Td> ${output[i].registrationDate} </Td>
                            </Tr>
                            <Tr id='tr-last' class='trIntern'>
                                <Th id='th-last' colspan ='2' >
                                    <a href=# onclick="editUser(event, ${output[i].id})" ><img src='../../../public/images/icon_edit.png' alt='edit register' style='width:30px; height:30px; margin-right:5%;' id='btn_edit'></a>
                                    <a href=# onclick="deleteUser(event, ${output[i].id})" ><img id='btn_delete' src='../../../public/images/icon_delete2.png' alt='delete register' style='width:30px; height:30px; margin-right:5%;'></a>
                                    <a href= # onclick="PDFuser(event, ${output[i].id})" ><img id='btn_delete' src='../../../public/images/download-pdf.png' alt='delete register' style='width:30px; height:30px; margin-right:5%;'></a>
                                    <a href=# onclick="EXCELuser(event, ${output[i].id})"><img id='btn_delete' src='../../../public/images/excel3.png' alt='delete register' style='width:30px; height:30px; margin-right:5%;'></a>
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

        document.addEventListener("DOMContentLoaded", showUsers(urlShowUsers));


    ///////////////■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Search Users ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■///////////////
    
        const inputSearch = document.querySelector('#inputSearch');
        const searchFieldSelect= document.querySelector('#searchField');

        const searchUsers = async (url) => {
            
            try{
                const table= document.querySelector('.table-users')

                let search='';

                const res= await fetch(url, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json'
                    }
                });

                const output = await res.json();

                if(output.empty==='empty'){
                    body+='<Tr><Td colspan="2"><Th> No se encontró ningun usuario.<Th></Td></Tr>';
                }else{
                    for (var i in output) {

                        search+=` 
                            <td id='td-outside'>
                            <table>
                            <Tr class='trIntern'>
                                <Th rowspan ='10'id='th-1'>
                                    <a href='#' id='openCompany' onclick=openFullUser(${output[i].id})>${output[i].user}</a>
                                </Th>
                            </Tr>
                            <Tr class='trIntern'>
                                <th>Nombre</Th> <Td id='td-1'> ${output[i].name} </Td>
                            </Tr>
                            <Tr class='trIntern'>
                                <Th>Apellido</Th> <Td> ${output[i].lastName} </Td>
                            </Tr>
                            <Tr class='trIntern'>
                                <Th>Compañia</Th><Td> ${output[i].company} </Td>
                            </Tr>
                            <Tr class='trIntern'>
                                <Th>Telefono</Th><Td> ${output[i].phone} </Td>
                            </Tr>
                            <Tr class='trIntern'>
                                <Th>Email</Th><Td> ${output[i].email} </Td>
                            </Tr>
                            <Tr class='trIntern'>
                                <Th>Ciudad</Th><Td> ${output[i].city} </Td>
                            </Tr>
                            <Tr class='trIntern'>
                                <Th>País</Th><Td> ${output[i].country} </Td>
                            </Tr>
                            <Tr class='trIntern'>
                                <Th>Fecha de registro</Th><Td> ${output[i].registrationDate} </Td>
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

            let urlFilterUsers=`../../Controller/filter_user.php?searchField=${searchField}&value=${value}`;

            let texto= event.target.value;

            await searchUsers(urlFilterUsers);
            console.log(texto);
        });

    ///////////////■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Search by ID ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■///////////////

        /*API fetch return all data from user by Id request */

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

    ///////////////■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Insert Users ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■///////////////


        let btnInsertUser= document.getElementById('btnInsertUser');

        btnInsertUser.addEventListener('click', async (event) =>{

            event.preventDefault();

            try {
                let user= document.getElementById('user').value;
                let password= document.getElementById('password').value;
                let role= document.getElementById('role').value;
                let name= document.getElementById('name').value;
                let lastN= document.getElementById('lastN').value;
                let birthDate= document.getElementById('birthDate').value;
                let gender= document.getElementById('gender').value;
                let company= document.getElementById('company').value;
                let phone= document.getElementById('phone').value;
                let email= document.getElementById('email').value;
                let country= document.getElementById('country').value;
                let city= document.getElementById('city').value;

                //■■■■■■ API fetch POST to Insert ■■■■■//

                let urlInsert= '../../Controller/insert_user.php';

                const res= await fetch(urlInsert, {
                        method: 'POST',
                        body: JSON.stringify({
                            "user": user,
                            "password": password,
                            "role": role,
                            "name": name,
                            "lastN": lastN,
                            "birthDate": birthDate,
                            "gender": gender,
                            "company": company,
                            "phone": phone,
                            "email": email,
                            "country": country,
                            "city": city,
                            }),
                        headers: {
                            'Content-Type': 'application/json'
                        }

                    })
                    console.log(res);
                    const output= await res.json();
                    console.log(output);

                    if (output.success) {

                        Swal.fire({
                        icon: 'success',
                        title: output.message,
                        showConfirmButton: false,
                        timer: 1500
                        });

                        successAlert.style.display = "block";
                        successAlert.innerText = output.message;

                        let form=document.querySelector('#formInsertUser');
                        form.reset();
                        closeModal(insertUser);
                        showUsers(urlShowUsers);
                        setTimeout(() => {
                            successAlert.style.display = "none";
                            successAlert.innerText = "";

                        }, 1000);

                } else {

                    console.log(output.message)

                    closeModal(insertUser);

                    Swal.fire({
                    icon: 'error',
                    title: '¡No pudo crearse el usuario!',
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

                closeModal(insertUser);

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

    
    ///////////////■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Edit User ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■///////////////

        var modalEditUser=document.getElementById('modalEditUser');

        var closeEditUser=document.getElementById('closeEditUser');
        closeEditUser.addEventListener('click', function() {
            closeModal(modalEditUser);
        });
        
        const editUser = async (event, idE) => {

            event.preventDefault();

            openModal(modalEditUser);
        
            console.log(idE); /*for DEBUG*/

            let urlFilterUser=`../../Controller/filter_user.php`;

            /*Getting the values of the user via its ID*/

            var user= await searchById(urlFilterUser,idE);
            
            /*changing the default values of the form into the data from db*/

            document.getElementById('userEdit').value = user[0].user;
            document.getElementById('passwordEdit').value = user[0].password;
            document.getElementById('roleEdit').value = user[0].role;
            document.getElementById('nameEdit').value = user[0].name;
            document.getElementById('lastNEdit').value = user[0].lastName;
            document.getElementById('birthDateEdit').value = user[0].birthDate;
            document.getElementById('genderEdit').value = user[0].gender;
            document.getElementById('companyEdit').value = user[0].company;
            document.getElementById('emailEdit').value = user[0].email;
            document.getElementById('phoneEdit').value = user[0].phone;
            document.getElementById('countryEdit').value = user[0].country;
            document.getElementById('cityEdit').value = user[0].city;
            
            //checkbox value handler
                let checkbox= document.getElementById('validatedEmailEdit');

                checkbox.checked = (user[0].validatedEmail == 1);

            //■■■■■■ API fetch PUT request to Edit Data ■■■■■//

            let btnEdit=document.getElementById('btnEditUser');

            let urlEdit= '../../Controller/edit_user.php';

            btnEdit.addEventListener('click', async (event) =>{

                event.preventDefault();

                var checkboxValue = checkbox.checked ? 1 : 0;
    
                let user= document.getElementById('userEdit').value;
                let password= document.getElementById('passwordEdit').value;
                let role= document.getElementById('roleEdit').value;
                let name= document.getElementById('nameEdit').value;
                let lastName= document.getElementById('lastNEdit').value;
                let birthDate= document.getElementById('birthDateEdit').value;
                let gender= document.getElementById('genderEdit').value;
                let company= document.getElementById('companyEdit').value;
                let email= document.getElementById('emailEdit').value;
                let phone= document.getElementById('phoneEdit').value;
                let country= document.getElementById('countryEdit').value;
                let city= document.getElementById('cityEdit').value;
                let validatedEmail= checkboxValue;
                                    
                try {
                    let url= `${urlEdit}`;
                    const res= await fetch(url, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            "id":idE,
                            "user": user,
                            "password": password,
                            "role": role,
                            "name": name,
                            "lastN": lastName,
                            "birthDate": birthDate,
                            "gender": gender,
                            "company": company,
                            "email": email,
                            "phone": phone,
                            "country": country,
                            "city": city,
                            "validatedEmail": validatedEmail,
                            })
                    })

                    const output= await res.json();

                    //displaying the updated users list*//

                    showUsers(urlShowUsers);

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

                        let form=document.getElementById('formEditUser');

                        form.reset();

                        closeModal(modalEditUser);

                        setTimeout(() => {
                            successAlert.style.display = "none";
                            successAlert.innerText = "";

                        }, 1000);

                    } else {

                        console.log(output.message)

                        Swal.fire({
                        icon: 'error',
                        title: '¡No pudo editarse el usuario!',
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

    ///////////////■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Delete User ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■///////////////

            
            const deleteUser = async (event, idEdit) => {

                event.preventDefault();

                const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                title: '¿Está seguro que desea borrar este usuario?',
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
                        let urlDeleteUser= `../../Controller/delete_user.php?id=${id}`;

                        try{
                            const res= await fetch(urlDeleteUser, {
                                method: 'DELETE',
                                headers: {
                                    'Content-Type': 'application/json'
                                }
                            });

                            const output = await res.json();

                            if (output.success) {

                                Swal.fire({
                                icon: 'success',
                                title: '¡Usuario borrado con éxito!',
                                text: 'El usuario ha sido borrado del registro.',
                                showConfirmButton: false,
                                timer: 1500
                                });

                                showUsers(urlShowUsers);

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
                                title: '¡No se pudo borrar al usuario!',
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
