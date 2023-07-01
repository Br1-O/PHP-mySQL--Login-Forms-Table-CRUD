<?php
require_once 'templates/autoload.php';

$templateEngine=new TemplateEngine('templates/login.php');
$templateEngine->assign(['name',', Anon'],['tittle','Login']);
$html=$templateEngine->render();

?>

<!DOCTYPE html>
<html lang="en">

<body>
<script type="text/javascript" src="../../../public/js/functions.js"></script>
<script type="text/javascript" src="../../../public/js/login.js"></script>
</body>
</html>