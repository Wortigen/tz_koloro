<?
	require_once('database_class.php');
	$db = new Database();
	$db->add_manager($_GET['name'],$_GET['mail'],$_GET['phone'],$_GET['company'],"");
	$db->off_sql();
	//header("Location: http://metalcolors.com.ua/config.php?page=".$_GET['page']);
?>