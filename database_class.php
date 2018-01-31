<?
class Database{
	
	private $con = '';
	public function __construct()
	{
		$this->con = mysqli_connect("localhost", "rcygcqrd_Worti", "eAeu*1cc#b%I", "rcygcqrd_MetalColor");
		//mysql_select_db("rcygcqrd_MetalColor", $this->$con);
		if(!$this->con)
		{echo "нет соединения";}
		echo mysqli_connect_error();
	}
	//manager function
	public function add_manager($name,$email,$phone,$comp)
	{
		$result = false;
		$qvery = "SELECT * FROM Manager";
		$result = mysqli_query($this->con, $qvery);
		echo mysqli_error($this->con);
		$new_id = mysqli_num_rows($result);
		$new_id++; 
		$qvery = 'insert into `Manager` ( `id`, `name`, `email`, `phone`, `company`, `photo`) values ( "'.$new_id.'", "'.$name.'", "'.$email.'", "'.$phone.'", "'.$comp.'", " ") ';
		$result = mysqli_query($this->con, $qvery);
		echo mysqli_error($this->con);	
	}
	
	public function get_manager($id_manager)
	{
		$result = false;
		$qvery = 'SELECT `id`, `name`, `email`, `phone`, `company`, `photo` FROM `Manager` WHERE `id` ='.$id_manager;
		$result = mysqli_query($this->con, $qvery);
		echo mysqli_error($this->con);
		return $result;
	}
	
	public function update_manager($id,$name,$email,$phone,$comp)
	{
		$result = false;
		$qvery = 'UPDATE `Manager` SET `id`="'.$id.'",`name`="'.$name.'",`email`="'.$email.'",`phone`="'.$phone.'",`company`="'.$id.'" WHERE `id` ='.$id;
		$result = mysqli_query($this->con, $qvery);
		echo mysqli_error($this->con);	
	}
	
	public function manager_list()
	{
		$result = false;
		$qvery = "SELECT `id`, `name`, `company`, `photo` FROM `Manager`";
		$result = mysqli_query($this->con, $qvery);
		echo mysqli_error($this->con);
		return $result;
	}
	
	public function manger_list_name()
	{
		$result = false;
		$qvery = "SELECT `id`, `name`, FROM `Manager`";
		$result = mysqli_query($this->con, $qvery);
		echo mysqli_error($this->con);
		return $result;
	}
	//project function
	public function off_sql()
	{
		 mysqli_close($this->con);
	}
}
?>