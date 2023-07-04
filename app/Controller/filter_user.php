<?php

require_once '../Model/classes/autoload.php';

if (isset($_GET['searchField'])) {
    User::search($conn, $_GET['searchField'], $_GET['value']);
} else if(!isset($_GET['searchField']) && isset($_GET['id'])){
    User::search($conn, 'id', $_GET['id']);
}

?>