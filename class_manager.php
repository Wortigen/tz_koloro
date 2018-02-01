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
				<input type="text" name='name' width="250px;" required />
				</div>
			</div>
			<div class="form_line">
				<div class="form_name">
					Email:
				</div>
				<div>
				<input type="text" name="mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" width="250px;" required />
				</div>
			</div>
			<div class="form_line">
				<div class="form_name">
					Телефон:
				</div>
				<div>
				<input type="text" name="phone" placeholder="###-##-##" pattern="/^0|[1-9]\d*$/" width="250px;" required />
				</div>
			</div>
			<div class="form_line">
				<div class="form_name">
					Компания:
				</div>
				<div>
				<input type="text" name="company" width="250px;" required />
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
	
	public function photo_setting($idm)
	{
		//$result = $this->db->manager_list();
		//$count = mysqli_num_rows($result);
		//$in_work = $this->db->chekM($idprog);
		?>
		<div class="worker">
		<form enctype="multipart/form-data" action="upload.php?idm=<? echo $_GET['idm'];?>" method="POST">
		<input type="hidden" name="MAX_FILE_SIZE" value="30000" />
		<input type="hidden" name="id" value="<? echo $_GET['idm'];?>"/>
		Отправить это фото: <input name="userfile" type="file" />
		<input type="submit" value="Send File" />
		</form>
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
	
	public function help()
	{
		?><div class="help">
		Примечание:
		Фото менеджера можно поставить в редактирование менеджера.
		</div>
		<?
	}
	
	public function scrits()
	{
		
	}
	
}
?>