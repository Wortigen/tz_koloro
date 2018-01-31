<?
	require_once('database_class.php');
	$db = new Database();
	$get_index = $db->get_project_user_index($_GET['id']);
	if($get_index == 0)
	{
		
		$count = $db->get_project_count_workers();
		if($count == 0)
		{
			$get_index++;
		}
		else
		{
			$get_index = $count;
		}
		$count = $_GET['count'];
		//echo $count;
		echo $get_index;
		$temp = 0;$i=0;
		for($i = 0; $i < 25;$i++)
		{
			if($_GET['ch'.$i] == 1 )
			{
				echo $get_index.";";
				$db->set_worker_on_Project($get_index,$_GET['id'.$i]);
			}
			if($_GET['id'.$i] != '')
			{
				$temp++;
			}
			if($temp == $count)
				break;
		}
	}
	else
	{
		$db->clear_proj_worker($get_index);
		$count = $_GET['count'];
		$temp = 0;
		echo $get_index.";";
		for($i = 0; $i < 25;$i++)
		{
			if($_GET['ch'.$i] == 1 )
			{
				echo $get_index.";";
				$db->set_worker_on_Project($get_index,$_GET['id'.$i]);
			}
			if($_GET['id'.$i] != '')
			{
				$temp++;
			}
			if($temp == $count)
				break;
		}
	}
	header("Location: http://metalcolors.com.ua/config.php?page=Project&idm=".$_GET['id']);
?>