
//■■■■■■ Login insert form logic ■■■■■//

    let btnInsertFormUser= document.getElementById('btnInsertFormUser');
    let btnToggleLogin2= document.getElementById('toggleLogin2');

    btnInsertFormUser.addEventListener('click', async (event) =>{

        event.preventDefault();

        let user= document.getElementById('user').value;
        let password= document.getElementById('password').value;
        let name= document.getElementById('name').value;
        let lastN= document.getElementById('lastN').value;
        let birthDate= document.getElementById('birthDate').value;
        let gender= document.getElementById('gender').value;
        let company= document.getElementById('company').value;
        let phone= document.getElementById('phone').value;
        let email= document.getElementById('email').value;
        let country= document.getElementById('country').value;
        let city= document.getElementById('city').value;

        try {

            //■■■■■■ API fetch POST to Insert ■■■■■//

            let urlInsert= '../../Controller/insert_user.php';

            const res= await fetch(urlInsert, {
                    method: 'POST',
                    body: JSON.stringify({
                        "user": user,
                        "password": password,
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

                    // successAlert.style.display = "block";
                    // successAlert.innerText = "¡Usuario creado!";

                    let form=document.querySelector('#register-form');

                    form.reset();

                    btnToggleLogin2.click();

                    // setTimeout(() => {
                    //     successAlert.style.display = "none";
                    //     successAlert.innerText = "";

                    // }, 1000);

            } else {

                console.log(output.message)

                Swal.fire({
                icon: 'error',
                title: '¡No pudo crearse el usuario!',
                showConfirmButton: false,
                timer: 1500
                });

                // dangerAlert.style.display = "block";
                // dangerAlert.innerText = output.message;
                // setTimeout(() => {
                //     dangerAlert.style.display = "none";
                //     dangerAlert.innerText = "";

                // }, 1000)
            }

        }catch (error) {

            console.log("Error: " + error)

            Swal.fire({
            icon: 'error',
            title: '¡Error comunicandose con el servidor!',
            showConfirmButton: false,
            timer: 1500
            });

            // dangerAlert.style.display = "block";
            // dangerAlert.innerText = error.message;
            // setTimeout(() => {
            // dangerAlert.style.display = "none";
            // dangerAlert.innerText = "";
            // }, 1000)
        }
    });

//■■■■■■ Autofocus eventlistener for modal ■■■■■//

    //login

        let modalLogin=document.getElementById('LoginToggle');

        modalLogin.addEventListener('shown.bs.modal', () => {

            let firstInput = document.getElementById('user_login');
            firstInput.focus();
        });

    //register

        let modalRegister=document.getElementById('LoginToggle2');

        modalRegister.addEventListener('shown.bs.modal', () => {

            let firstInput = document.getElementById('name');
            firstInput.focus();
        });