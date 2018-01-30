<?
class Manager
{	
	private $db;
	public $error;
	public function __construct()
	{
		/*$host = 'localhost'; 
		$database = 'rcygcqrd_MetalColor'; 
		$user = 'rcygcqrd'; 
		$password = '';
		$db = mysqli_connect($host, $user, $password, $database);*/
	}
	
	public function form($page_return)
	{
		?>
		<div class="right_column">
		<div class="header_column"> Новый менеджер </div>
		<form id="form" action="query.php">
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
			<div class="form_line">
				<div class="form_name">
					Фото:
				</div>
				<div>
				<input type="file" name="photo" width="250px" accept="image/*,image/jpeg" />
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
	
	public function list_manager()
	{
		?>
		<div class="left_column">
		<div class="header_column"> Список Менеджеров </div>
		<div>
		</div>
		</div>
		<?
	}
	
	public function show_manager($manager)
	{
		
	}
	
	public function scrits()
	{
		
	}
	
}
?>