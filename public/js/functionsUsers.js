function redirectToPage(destination) {
    window.location.href = destination;
    }

function openModal(modal){modal.showModal();}

function closeModal(modal){modal.close();}

var insertUser=document.getElementById('modalInsertUser');

    var openInsertUser=document.getElementById('openInsertUser');
    openInsertUser.addEventListener('click', function() {
        openModal(insertUser);
    });

    var closeInsertUser=document.getElementById('closeInsertUser');
    closeInsertUser.addEventListener('click', function() {
        closeModal(insertUser);
    });
