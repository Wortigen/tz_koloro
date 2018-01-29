<?php
include('config.php');

$site = new Core;
$site->pb = new PageBuild;
$site->Page($_GET['page']);

?>