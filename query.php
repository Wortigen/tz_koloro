<?
	require_once('database_class.php');
	
	$db = new Database;
	$db->add_manager($_GET['name'],$_GET['email'],$_GET['phone'],$_GET['comp'],"");
	
	header("Location: http://metalcolors.com.ua/config.php?page=".$_GET['page']);
?>