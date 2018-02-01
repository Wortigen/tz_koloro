<?
	require_once('database_class.php');
	$db = new Database();
	$project = $db->get_item_propery_m($_GET['idm']);
?>
<div>
	<p>Проэкт </p>
	<? while ($row = mysqli_fetch_row($project)){?>
	Название :<? echo $row[0]; ?><br/>
	Цена :<? echo $row[1]; ?><br/>
	Начало :<? echo $row[2]; ?><br/>
	Окончание :<? echo $row[3]; ?><br/>
	<hr width="100%" style="color:#fff" />
</div>
<? $projects = $db->get_item_project_m($_GET['idm']);
	while($row = mysqli_fetch_row($projects))
	{
	$param = $db->get_projects_m($row[0]);
	for($i = 0; $i < count($param);$i++)
	{
		$p = explode(";",$param[$i]);
		?><div>Менеджера:</div>
		<div class="list_p">
				Имя : <? echo $p[0];?><br/>
				email :<? echo $p[1];?><br/>
				Телефон : <? echo $p[2];?><br/>
				Компания : <? echo $p[3];?><br/>
				<? if(trim($p[4]) == ''){ ?>
					<img width="150px" height="150px" src="photo/default.jpg" />
				<? } else
				{
				?>
					<img width="150px" height="150px" src="<? echo $p[4];?>" />
				<?
				}
	}?>
			<hr width="100%" style="color:#fff" />
			</div>
			<?
	}
	}?>