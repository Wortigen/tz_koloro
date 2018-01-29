<?php
require_once('page.php');
$site = new page($_Get['page']);
$site->add_resourse('css','style/style.css');
$site->show();
?>


