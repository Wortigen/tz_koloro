<?
require_once('database_class.php');
class Manager
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
		<div class="header_column"> Новый менеджер </div>
		<form id="form" enctype="multipart/form-data" action="query.php">
			<div class="form_line">
				<div class="form_name">
					Имя:
				</div>
				<div>
				<input type="text" name='name' width="250px;" />
				</div>
			</div>
			<div class="form_line">
				<div class="form_name">
					Email:
				</div>
				<div>
				<input type="text" name="mail" width="250px;" />
				</div>
			</div>
			<div class="form_line">
				<div class="form_name">
					Телефон:
				</div>
				<div>
				<input type="text" name="phone" width="250px;" />
				</div>
			</div>
			<div class="form_line">
				<div class="form_name">
					Компания:
				</div>
				<div>
				<input type="text" name="company" width="250px;" />
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
	
	public function list_manager($page)
	{
		?>
		<div class="left_column">
		<div class="header_column"> Список Менеджеров </div>
		<div class="list_conteiner">
		<? $managers = $this->db->manager_list();?>
		<?
			if(count($managers) == 0){
				echo "Не Добавлен менеджер";
			}
			else
			{
				while($row = mysqli_fetch_row($managers))
				{
					?>
					<a href="http://metalcolors.com.ua/config.php?page=<? echo $page."&idm=".$row[0];?>" >
					<div class="Item">
					<div class="Item_text">
					<p>
					<? echo "Имя:  ".$row[1]; ?></br>
					<? echo "Компания:  ".$row[2]; ?></p>
					<? if(trim($row[3]) == ""){ ?>
						<img height="150px" width="150px" src="photo/default.jpg" />
					<? }else {?>
						<img height="150px" width="150px" src="<? echo trim($row[3]); ?>" />
					<? }?>
					</div>
					</div>
					</a>
					<?
				}
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