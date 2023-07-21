//function to redirect to other page when clicking

    function redirectToPage(destination) {
        window.location.href = destination;
        }

//■■■■■■ Autofocus eventlistener for modal ■■■■■//

    //insertCompany

    let insertUserFocus=document.getElementById('modalInsertUser');

    insertUserFocus.addEventListener('shown.bs.modal', () => {

        let firstInput = document.getElementById('user');
        firstInput.focus();
    });

//EditCompany

    let editUserFocus=document.getElementById('modalEditUser');

    editUserFocus.addEventListener('shown.bs.modal', () => {

        let firstInput = document.getElementById('userEdit');
        firstInput.focus();
    });


//■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Funciones API Fetch ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■  

    ///////////////■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Advance search offcanvas ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■///////////////

    /*switch function for full info and resume info table of show companies*/

        let checkSwitchView=document.querySelector(".switchView");

        checkSwitchView.addEventListener('change', ()=>{
            console.log(checkSwitchView.value);
        })
        
        let resumeTable=document.querySelector('.table-users');
        let fullTable=document.querySelector('.table-users-full');

        function switchView() {

            if (checkSwitchView.matches(':checked')) {
                resumeTable.style.display='none';
                fullTable.style.display='block';

                showUsers(urlShowUsers, fullBody, fullTable);

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
                                if(key!='id'&&key!='Contraseña'){

                                    body+=`
                                    <th>${key}</th>
                                    `;
                                    flag2++;
                                }else if(key=='Contraseña'){
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
                        <td><a href="#" title="Click para abrir información completa de ${output[i].Usuario}" id='openFullUser' class="btn btn-primary" onclick="openFullUser(event,${output[i].id})">${output[i].Usuario}</a></td>
                        <td><a href=# title="Editar" onclick="editUser(event, ${output[i].id})" ><img src='../../../public/images/icon_edit.png' alt='edit register' style='width:30px; height:30px; margin-right:5%;' id='btn_edit'></a></td>
                        <td><a href=# title="Borrar" onclick="deleteUser(event, ${output[i].id})" ><img id='btn_delete' src='../../../public/images/icon_delete2.png' alt='delete register' style='width:30px; height:30px; margin-right:5%;'></a></td>
                        <td>${output[i]['Rol']}</td>
                        <td>${output[i]['Nombre']}</td>
                        <td>${output[i]['Apellido']}</td>
                        <td>${output[i]['Fecha de Nacimiento']}</td>
                        <td>${output[i]['Género']}</td>
                        <td>${output[i]['Empresa']}</td>
                        <td>${output[i]['Email']}</td>
                        <td>${output[i]['Teléfono']}</td>
                        <td>${output[i]['País']}</td>
                        <td>${output[i]['Ciudad']}</td>
                        <td>${output[i]['Foto']}</td>
                        <td>${output[i]['Email Validado']}</td>
                        <td>${output[i]['Fecha de Registro']}</td>
                        <td>${output[i]['Último Inicio de Sesión']}</td>
                        <td>${output[i]['Conectado']}</td>
                        <td>${output[i]['Token de Activación']}</td>
                        <td>${output[i]['Token de restablecimiento de Contraseña']}</td>
                        <td>${output[i]['Última Actualización por']}</td>
                        </tr>
                        `;
                      
                }
                return body;
            }

    ///////////////■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Show Users ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■///////////////

        let successAlert= document.querySelector('.alert-success');

        let dangerAlert= document.querySelector('.alert-danger');

        const table= document.querySelector('.table-users')

        let urlShowUsers= `../../Controller/show_users.php`;

        
        const showUsers = async (url, body, innerTable) => {
            
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
                    dangerAlert.innerText = 'No se encontró ningún usuario.';
                    setTimeout(() => {
                    dangerAlert.style.display = "none";
                    dangerAlert.innerText = "";
                    }, 1000)

                    // body+='<Tr><Td colspan="2"> No se encontró ningún usuario. </Td></Tr>';

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

        //■■■■■■■■■ body function to show the inner table formated for User ■■■■■■■■■//

        let body = (output) => {

            let body= '';

            for (var i in output) {
                body+=` 
                <td id='td-outside'>
                <table>
                <Tr class='trIntern'>
                    <Th rowspan ='10'id='th-1'>
                        <a href='#' id='openFullUser' class="btn btn-primary" onclick="openFullUser(event, ${output[i].id})">${output[i].Usuario}</a>
                    </Th>
                </Tr>
                <Tr class='trIntern'>
                    <th>Nombre</Th> <Td id='td-1'> ${output[i].Nombre} </Td>
                </Tr>
                <Tr class='trIntern'>
                    <Th>Apellido</Th> <Td> ${output[i].Apellido} </Td>
                </Tr>
                <Tr class='trIntern'>
                    <Th>Compañia</Th><Td> ${output[i]['Empresa']} </Td>
                </Tr>
                <Tr class='trIntern'>
                    <Th>Telefono</Th><Td> ${output[i]['Teléfono']} </Td>
                </Tr>
                <Tr class='trIntern'>
                    <Th>Email</Th><Td> ${output[i]['Email']} </Td>
                </Tr>
                <Tr class='trIntern'>
                    <Th>Ciudad</Th><Td> ${output[i]['Ciudad']} </Td>
                </Tr>
                <Tr class='trIntern'>
                    <Th>País</Th><Td> ${output[i]['País']} </Td>
                </Tr>
                <Tr class='trIntern'>
                    <Th>Fecha de registro</Th><Td> ${output[i]['Fecha de Registro']} </Td>
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
            return body;
        }

        if (checkSwitchView.matches(':checked')) {
            document.addEventListener("DOMContentLoaded", showUsers(urlShowUsers, fullBody, fullTable));
        } else {
            document.addEventListener("DOMContentLoaded", showUsers(urlShowUsers, body, resumeTable));
        }

    ///////////////■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Search Users ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■///////////////
    
        const inputSearch = document.querySelector('#inputSearch');
        const searchFieldSelect= document.querySelector('#searchField');
        
        //definition of function
            const searchUsers = async (url, searchBody, table) => {
                
                try{
                    const res= await fetch(url, {
                        method: 'GET',
                        headers: {
                            'Content-Type': 'application/json'
                        }
                    });
    
                    const output = await res.json();
    
                    if(output.empty==='empty'){
                        search+='<Tr><Td colspan="2"><Th> No se encontró ningún usuario.<Th></Td></Tr>';
                    }else{
                        search=searchBody(output);
    
                        table.innerHTML=`<tr class='tr-interTable'>${search}</tr>`;
                        }  
                }catch(error){
                        table.innerHTML=`<tr class='tr-interTable'><Th> No se encontraron resultados. </Th></tr>`;
                        console.log("Error: " + error);
                }
            }

        //definition of event input
            inputSearch.addEventListener('keyup', async (event)=>{
                
                let searchField= searchFieldSelect.value;
                let value= inputSearch.value;

                let urlFilterUsers=`../../Controller/filter_user.php?searchField=${searchField}&value=${value}`;

                let texto= event.target.value;

                if(checkSwitchView.matches(':checked')){
                    await searchUsers(urlFilterUsers, fullBody, fullTable);
                    console.log(texto);
                }else{
                    await searchUsers(urlFilterUsers, body, resumeTable);
                    console.log(texto);
                };
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

                        document.getElementById('closeModalInsertUser').click();
                        

                        if(checkSwitchView.matches(':checked')){
                            await showUsers(urlShowUsers, fullBody, fullTable);
                        }else{
                            await showUsers(urlShowUsers, body, resumeTable);
                        };

                        setTimeout(() => {
                            successAlert.style.display = "none";
                            successAlert.innerText = "";

                        }, 1000);

                } else {

                    console.log(output.message)

                    document.getElementById('closeModalInsertUser').click();

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

                document.getElementById('closeModalInsertUser').click();

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

        let userEditId;

        let checkbox= document.getElementById('validatedEmailEdit');
        
        const editUser = async (event, idE) => {

            event.preventDefault();

            $('#modalEditUser').modal('show');

            userEditId=idE;
        
            let urlFilterUser=`../../Controller/filter_user.php`;

            /*Getting the values of the user via its ID*/

            var user= await searchById(urlFilterUser,idE);
            
            /*changing the default values of the form into the data from db*/

            document.getElementById('userEdit').value = user[0].Usuario;
            document.getElementById('passwordEdit').value = user[0]['Contraseña'];
            document.getElementById('roleEdit').value = user[0].Rol;
            document.getElementById('nameEdit').value = user[0].Nombre;
            document.getElementById('lastNEdit').value = user[0].Apellido;
            document.getElementById('birthDateEdit').value = user[0]['Fecha de Nacimiento'];
            document.getElementById('genderEdit').value = user[0]['Género'];
            document.getElementById('companyEdit').value = user[0].Empresa;
            document.getElementById('emailEdit').value = user[0].Email;
            document.getElementById('phoneEdit').value = user[0]['Télefono'];
            document.getElementById('countryEdit').value = user[0]['País'];
            document.getElementById('cityEdit').value = user[0].Ciudad;
            
            //checkbox value handler
                checkbox.checked = (user[0].validatedEmail == 1);
        };

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
                        "id":userEditId,
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
                console.log(output);

                //displaying the updated users list*//

                
                if(checkSwitchView.matches(':checked')){
                    await showUsers(urlShowUsers, fullBody, fullTable);
                }else{
                    await showUsers(urlShowUsers, body, resumeTable);
                };

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

                    document.getElementById('closeModalEditUser').click();

                    setTimeout(() => {
                        successAlert.style.display = "none";
                        successAlert.innerText = "";

                    }, 1000);

                } else {

                    console.log(output.message)

                    document.getElementById('closeModalEditUser').click();

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

                document.getElementById('closeModalEditUser').click();

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
                                      
                                if(checkSwitchView.matches(':checked')){
                                    await showUsers(urlShowUsers, fullBody, fullTable);
                                }else{
                                    await showUsers(urlShowUsers, body, resumeTable);
                                };

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

    ///////////////■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ MODAL · Display Full Info of Company ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■///////////////

            
    let tableContact=document.getElementById('tableFullUserTab1');
    let fullUserTittle=document.getElementById('fullUserLabel');


    async function openFullUser(event, id) {

        event.preventDefault();

        $('#modalFullUser').modal('show');

        let urlFilterUser=`../../Controller/filter_user.php`;
        
        let fullUser= await searchById(urlFilterUser, id);

        console.log(fullUser[0]);
        
        let body='';

        Object.keys(fullUser[0]).forEach(key => {
            const value = fullUser[0][key];

            body+=`<tr><th><strong>${key}</strong></th><td>${value}</td></tr>`;
        });

        tableContact.innerHTML=`${body}`;
        fullUserTittle.innerHTML=`Datos del usuario: <strong>${fullUser[0].Usuario}</strong>`;

    };

    
