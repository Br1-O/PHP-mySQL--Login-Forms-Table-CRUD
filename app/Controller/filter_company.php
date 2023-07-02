<?php

require_once '../Model/classes/autoload.php';

if (isset($_GET['searchField'])) {
    Company::search($conn, $_GET['searchField'], $_GET['value']);
} else if(!isset($_GET['searchField']) && isset($_GET['id'])){
    Company::search($conn, 'id', $_GET['id']);
}

?>