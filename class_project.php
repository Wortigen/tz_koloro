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
		<div class="header_column"> Новый проэкт </div>
		<form id="form" enctype="multipart/form-data" action="query.php">
			<div class="form_line">
				<div class="form_name">
					Название:
				</div>
				<div>
				<input type="text" name='name' width="250px;" />
				</div>
			</div>
			<div class="form_line">
				<div class="form_name">
					цена:
				</div>
				<div>
				<input type="text" name="price" width="250px;" />
				</div>
			</div>
			<div class="form_line">
				<div class="form_name">
					Начало:
				</div>
				<div>
				<input type="text" name="start" width="250px;" />
				</div>
			</div>
			<div class="form_line">
				<div class="form_name">
					Окончание:
				</div>
				<div>
				<input type="text" name="finale" width="250px;" />
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
		<div class="header_column"> Список проэктов </div>
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
	
	public function show_manager($manager)
	{
		$managers = $this->db->get_manager($manager);
		$row = mysqli_fetch_row($managers);
		?>
		<div class="content">
		<div class="header_column"> Редактирование менеджер </div>
		<form id="form" enctype="multipart/form-data" action="query.php">
			<div class="form_line">
				<div class="form_name">
					Имя:
				</div>
				<div>
				<input type="text" name='name' width="250px;" value="<? echo $row[1];?>" />
				</div>
			</div>
			<div class="form_line">
				<div class="form_name">
					Email:
				</div>
				<div>
				<input type="text" name="mail" width="250px;" value="<? echo $row[2];?>" />
				</div>
			</div>
			<div class="form_line">
				<div class="form_name">
					Телефон:
				</div>
				<div>
				<input type="text" name="phone" width="250px;" value="<? echo $row[3];?>" />
				</div>
			</div>
			<div class="form_line">
				<div class="form_name">
					Компания:
				</div>
				<div>
				<input type="text" name="company" width="250px;" value="<? echo $row[4];?>" />
				</div>
			</div>
			<div class="end_line">
				<input type="hidden" name="page" value="Manager"/>
				<input type="hidden" name="id" value="<? echo $row[0];?>"/>
				<input type="submit" value="Обновить"/>
			</div>
		</form>
		</div>
		<?
	}
	
	public function scrits()
	{
		
	}
}
?>