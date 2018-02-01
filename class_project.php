<?
require_once('database_class.php');
class Project
{	
	private $db;
	public $error;
	public function __construct()
	{
		$this->db = new Database(); 
	}
	
	public function form($page_return)
	{
		?>
		<div class="right_column">
		<div class="header_column"> Новый проект </div>
		<form id="form" enctype="multipart/form-data" action="query.php">
			<div class="form_line">
				<div class="form_name">
					Название:
				</div>
				<div>
				<input type="text" name='name' width="250px;" required />
				</div>
			</div>
			<div class="form_line">
				<div class="form_name">
					цена:
				</div>
				<div>
				<input type="text" name="price" placeholder="$$$$$.$$" pattern="\d+(\.\d{2})?" width="250px;" required />
				</div>
			</div>
			<div class="form_line">
				<div class="form_name">
					Начало:
				</div>
				<div>
				<input type="text" id="s" name="start" onchange="check()" placeholder="dd.mm.yyyy" required pattern="^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$" width="250px;" required />
				</div>
			</div>
			<div class="form_line">
				<div class="form_name">
					Окончание:
				</div>
				<div>
				<input type="text" name="finale" id="e" onchange="check()" placeholder="dd.mm.yyyy" required pattern="^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$" width="250px;" required />
				</div>
			</div>
			<div class="end_line">
				<input type="hidden" name="page" value="<? echo $page_return; ?>"/>
				<input type="submit" value="Добавить"/>
			</div>
		</form>
		</div>
		<?
	}
	
	public function list_project($page)
	{
		?>
		<div class="left_column">
		<div class="header_column"> Список проектов </div>
		<div class="list_conteiner">
		<? $project = $this->db->project_list();?>
		<?			
				while($row = mysqli_fetch_row($project))
				{
					?>
					<a href="http://metalcolors.com.ua/config.php?page=<? echo $page."&idm=".$row[0];?>" >
					<div class="Item">
					<div class="Item_text">
					<p>
					<? echo "Название:  ".$row[1]; ?></br>
					<? echo "Цена:  ".$row[2]; ?></br>
					<? echo "Начало:  ".$row[4]; ?></br>
					<? echo "Окончание:  ".$row[5]; ?>
					</p>
					</div>
					</div>
					</a>
					<?
				}
				
		?>
		</div>
		</div>
		<?
	}
	
	public function show_project($project)
	{
		$project = $this->db->get_project($project);
		$row = mysqli_fetch_row($project);
		?>
		<div class="content">
		<div class="header_column"> Редактирование проекта </div>
		<form id="form" enctype="multipart/form-data" action="query.php">
			<div class="form_line">
				<div class="form_name">
					Название:
				</div>
				<div>
				<input type="text" name='name' width="250px;" value="<? echo $row[1];?>" />
				</div>
			</div>
			<div class="form_line">
				<div class="form_name">
					Цена:
				</div>
				<div>
				<input type="text" name="price" width="250px;" value="<? echo $row[2];?>" />
				</div>
			</div>
			<div class="form_line">
				<div class="form_name">
					начало:
				</div>
				<div>
				<input type="text" name="start" width="250px;" value="<? echo $row[4];?>" />
				</div>
			</div>
			<div class="form_line">
				<div class="form_name">
					Окончание:
				</div>
				<div>
				<input type="text" name="end" width="250px;" value="<? echo $row[5];?>" />
				</div>
			</div>
			<div class="end_line">
				<input type="hidden" name="page" value="Project"/>
				<input type="hidden" name="manag" value="<? echo $row[3];?>"/>
				<input type="hidden" name="id" value="<? echo $row[0];?>"/>
				<input type="submit" value="Обновить"/>
			</div>
		</form>
		</div>
		<?
	}
	
	public function work_managers($idprog)
	{
		$result = $this->db->manager_list();
		$count = mysqli_num_rows($result);
		$in_work = $this->db->chekM($idprog);
		?>
		<div class="worker">
		<form enctype="multipart/form-data" action="multiplu.php">
			<? for($j = 0;$j<$count;$j++){ 
				$row = mysqli_fetch_row($result);
			 ?>
			<div class="list">
			<input name="<? echo "id".$row[0]; ?>" type="hidden" value="<? echo $row[0];?>" />
			<? echo $row[1]."\t".$row[2].":"; ?>
			<select width="150px;" name="<? echo "ch".$row[0]; ?>" >
				<? if(count($in_work) == 0){ ?>
					<option selected value="0">Не в проекте</option>
					<option value="1">в проекте</option>
				<? }else{
					for($i = 0;$i<count($in_work);$i++)
					{
						if($row[0] == $in_work[$i]){?>
							<option value="0">Не в проекте</option>
							<option selected value="1">в проекте</option>
						<? }else{?>
							<option selected value="0">Не в проекте</option>
							<option value="1">в проекте</option>
				<?}}}?>
			</select>
			</div><br />
			<? } ?>
			<input type="hidden" name="id" value="<?echo $idprog;?>" />
			<input type="hidden" name='count' value="<?echo $count;?>"/>
			<br />
			<input type="submit" value="Обновить" />
		</form>
		</div>
		<?
	}
	
	public function help()
	{
		?><div class="help">
		Примечание:
		Менеджера поставить на проэкт можно после добавления самого проекта.
		</div>
		<?
	}
	
	public function scrits()
	{
		?>
		<script type="text/javascript">
		function check(){

			var start = $('#s').val().split(".");
			var end = $('#e').val().split(".");
			
			var date1= new Date(start[2],start[1],start[0]);
			var date2= new Date(end[2], end[1], end[0]);
			if(date1 > date2)	
				$('#e').val("");


		}

</script>

		<?
	}
}
?>