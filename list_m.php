<?
	require_once('database_class.php');
	$db = new Database();
	$project = $db->get_item_propery($_GET['idm']);
?>
<div>
	<p>Менеджер </p>
	<? while ($row = mysqli_fetch_row($project)){?>
	Имя :<? echo $row[1]; ?><br/>
	email :<? echo $row[2]; ?><br/>
	Телефон :<? echo $row[3]; ?><br/>
	Компания :<? echo $row[4]; ?><br/>
	<? if(trim($row[5]) == ''){ ?>
		<img width="150px" height="150px" src="photo/default.jpg" />
	<? } else
	{
		?>
			<img width="150px" height="150px" src="<? echo $row[5];?>" />
		<?
	}
	
	}?>
</div>
<hr width="100%" style="color:#fff" />
<? $projects = $db->get_item_project($_GET['idm']);
	while($row = mysqli_fetch_row($projects))
	{
		$param = $db->get_projects($row[0]);
		for($i = 0; $i < 1;$i++)
		{
			$p = explode(";",$param[$i]);
			?><div>Проект:</div>
			<div class="list_m">
				id : <? echo $p[0];?><br/>
				Название : <? echo $p[1];?><br/>
				Цена : <? echo $p[2];?><br/>
				Начало : <? echo $p[3];?><br/>
				Окончание : <? echo $p[4];?><br/>
				<hr width="100%" style="color:#fff" />
			</div>
			<?
		}
	/*while($p = mysqli_fetch_row($param))
	{
			?><div class="list_p">
				Название : <? echo $p[1];?><br/>
				Цена : <? echo $p[2];?><br/>
				Начало : <? echo $p[3];?><br/>
				Окончание : <? echo $p[4];?><br/>
			</div><?
	}*/
		/*for($i = 0;$i < count($project);$i++)
		{
		while($row = mysqli_fetch_row($project)){
			?>
			<div class="list_p">
				Название : <? echo $row[1];?><br/>
				Цена : <? echo $row[2];?><br/>
				Начало : <? echo $row[3];?><br/>
				Окончание : <? echo $row[4];?><br/>
			</div><?
	}}}
	else
	{
	for($i = 0;$i < count($project);$i++)
	{
		while($row = mysqli_fetch_row($project[$i])){
			?>
			<div class="list_p">
				Название : <? echo $row[1];?><br/>
				Цена : <? echo $row[2];?><br/>
				Начало : <? echo $row[4];?><br/>
				Окончание : <? echo $row[5];?><br/>
			</div>
	<? }}*/}?>