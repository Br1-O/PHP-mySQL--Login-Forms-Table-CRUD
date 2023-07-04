    function redirectToPage(destination) {
        window.location.href = destination;
        }

    function openModal(modal){modal.showModal();}

    function closeModal(modal){modal.close();}
    
    var insertCompany=document.getElementById('modalInsertCompany');

        var openInsertCompany=document.getElementById('openInsertCompany');
        openInsertCompany.addEventListener('click', function() {
            openModal(insertCompany);
        });

        var closeInsertCompany=document.getElementById('closeInsertCompany');
        closeInsertCompany.addEventListener('click', function() {
            closeModal(insertCompany);
        });




    

