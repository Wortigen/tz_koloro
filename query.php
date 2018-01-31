<?
	require_once('database_class.php');
	$db = new Database();
	switch($_GET['page'])
	{
		case "Manager":
		//echo $_FILES['photo']['name'];
		/*$path = 'photo/'; 
		$new_name = $_FILES['photo']['name']; 
		$full_path = $path.$new_name; 
		if (move_uploaded_file($_FILES['userfile']['tmp_name'],$full_path)) {
			print "File is valid, and was successfully uploaded.";
		} else {
			print "There some errors!";
		}*/
		if($_GET['id'] == '')
			$db->add_manager($_GET['name'],$_GET['mail'],$_GET['phone'],$_GET['company']);
		else
			$db->update_manager($_GET['id'],$_GET['name'],$_GET['mail'],$_GET['phone'],$_GET['company']);
		break;
		case "Project":
		if($_GET['id'] == '')
			$db->add_project($_GET['name'],$_GET['price'],$_GET['start'],$_GET['finale']);
		else
			$db->update_manager($_GET['id'],$_GET['name'],$_GET['mail'],$_GET['phone'],$_GET['company']);
		break;
	}
	$db->off_sql();
	header("Location: http://metalcolors.com.ua/config.php?page=".$_GET['page']);
?>