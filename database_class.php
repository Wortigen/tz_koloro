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
	public function add_project($name,$price,$start,$end)
	{
		$result = false;
		$qvery = "SELECT * FROM `Projects`";
		$result = mysqli_query($this->con, $qvery);
		echo mysqli_error($this->con);		
		$new_id = mysqli_num_rows($result);
		$new_id++;
		$qvery = "SELECT * FROM `manproj`";
		$result = mysqli_query($this->con, $qvery);
		echo mysqli_error($this->con);
		$idp = 0;
		$qvery = 'insert into `Projects` (`id`, `name`, `price`, `idmanag`, `datestart`, `dateend`) values ( "'.$new_id.'", "'.$name.'", "'.$price.'", "'.$idp.'", "'.$start.'", "'.$end.'") ';
		$result = mysqli_query($this->con, $qvery);
		echo mysqli_error($this->con);	
	}
	
	public function get_project_user_index($id)
	{
		$result = false;
		$qvery = "SELECT  `idmanag` FROM `Projects` WHERE `id` =".$id;
		$result = mysqli_query($this->con, $qvery);
		echo mysqli_error($this->con);
		$res = mysqli_fetch_row($result);
		return $res[0];
	}
	
	public function get_project_count_workers()
	{
		$result = false;
		$qvery = "SELECT * FROM `manproj` ";
		$result = mysqli_query($this->con, $qvery);
		echo mysqli_error($this->con);
		$res = mysqli_num_rows($result);
		return $res;
	}
	
	public function clear_proj_worker($id)
	{
		$result = false;
		$qvery = "DELETE FROM `manproj` WHERE `id_project`=".$id;
		$result = mysqli_query($this->con, $qvery);
		echo mysqli_error($this->con);
	}
	
	public function set_worker_on_Project($id_proj,$id_man)
	{
		$result = false;
		$qvery = 'INSERT INTO `manproj`(`id_project`, `id_manager`) VALUES ("'.$id_proj.'","'.$id_man.'")';
		$result = mysqli_query($this->con, $qvery);
		echo mysqli_error($this->con);
	}
	
	public function chekM($idproj)
	{
		$result = false;
		$qvery = "SELECT `id_manager` FROM `manproj` WHERE `id_project` =".$idproj;
		$result = mysqli_query($this->con, $qvery);		
		echo mysqli_error($this->con);
		$res = array();$i = 0;
		while($row = mysqli_fetch_row($result))
		{
			$res[$i] = $row;
			$i++;
		}
		return $res;
	}
	
	public function project_list()
	{
		$result = false;
		$qvery = "SELECT `id`, `name`, `price`, `idmanag`, `datestart`, `dateend` FROM `Projects`";
		$result = mysqli_query($this->con, $qvery);
		echo mysqli_error($this->con);
		return $result;
	}
	
	public function get_project($id_project)
	{
		$result = false;
		$qvery = 'SELECT `id`, `name`, `price`, `idmanag`, `datestart`, `dateend` FROM `Projects` WHERE `id` ='.$id_project;
		$result = mysqli_query($this->con, $qvery);
		echo mysqli_error($this->con);
		return $result;
	}
	
	public function update_project($id,$name,$price,$man,$start,$end)
	{
		$result = false;
		$qvery = 'UPDATE `Projects` SET `id`="'.$id.'",`name`="'.$name.'",`price`="'.$price.'", `idmanag`="'.$man.'" ,`datestart`="'.$start.'",`dateend`= "'.$end.'" WHERE `id` = '.$id;
		$result = mysqli_query($this->con, $qvery);
		echo mysqli_error($this->con);	
	}
	
	//end class
	public function off_sql()
	{
		 mysqli_close($this->con);
	}
}
?>