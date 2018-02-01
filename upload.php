<?

require_once('database_class.php');
$db = new Database();
$uploaddir = 'photo/';
$uploadfile = $uploaddir.basename($_FILES['userfile']['name']);

if (copy($_FILES['userfile']['tmp_name'], $uploadfile))
{
	$db->set_photo($_POST['id'],$uploadfile);
}
header("Location: http://metalcolors.com.ua/config.php?page=Manager&idm=".$_POST['id']);
?>