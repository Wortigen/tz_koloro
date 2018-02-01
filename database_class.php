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
	
	public function set_photo($id,$path)
	{
		$result = false;
		echo $id.":".$path;
		$qvery = 'UPDATE `Manager` SET `photo` ="'.$path.'" WHERE `id`="'.$id.'"';
		$result = mysqli_query($this->con, $qvery);
		echo mysqli_error($this->con);
		return $result;
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
		$idp = $new_id;
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
	
	// multiply page
	public function get_item_propery($id)
	{
		$result = false;
		$qvery = 'SELECT `id`, `name`, `email`, `phone`, `company`, `photo` FROM `Manager` WHERE `id` ='.$id;
		$result = mysqli_query($this->con, $qvery);
		echo mysqli_error($this->con);
		return $result;
	}
	
	public function get_projects($idp)
	{
		$qvery = 'SELECT `id`, `name`, `price`, `datestart`, `dateend` FROM `Projects` WHERE `idmanag` ='.$idp;
		$result2 = mysqli_query($this->con, $qvery);
		echo mysqli_error($this->con);
		$res = array();$temp = 0;
		while($r = mysqli_fetch_row($result2))
		{
				$res[$temp] = $r[1].";".$r[2].";".$r[3].";".$r[4];
				$temp++;
		}
		return $res;
	}
	
	public function get_item_project($id)
	{
		$result = false;
		$qvery = "SELECT `id_project` FROM `manproj` WHERE `id_manager` =".$id;
		$result = mysqli_query($this->con, $qvery);
		echo mysqli_error($this->con);
		/*$tmp = 0;
		while($res = mysqli_fetch_row($result))
		{
				$temp = $res[0];		
		}
		$qvery = 'SELECT `id`, `name`, `price`, `datestart`, `dateend` FROM `Projects` WHERE `idmanag` ="'.$tmp.'"';
		$result2 = mysqli_query($this->con, $qvery);
		echo mysqli_error($this->con);
		*/
		return $result;
	}
	
	public function get_item_propery_m($id)
	{
		$result = false;
		$qvery = 'SELECT `name`, `price`, `datestart`, `dateend` FROM `Projects` WHERE `id`='.$id;
		$result = mysqli_query($this->con, $qvery);
		echo mysqli_error($this->con);
		return $result;
	}
	
	public function get_item_project_m($id)
	{
		$result = false;
		$qvery = "SELECT `id_manager` FROM `manproj` WHERE  `id_project` =".$id;
		$result = mysqli_query($this->con, $qvery);
		echo mysqli_error($this->con);
		/*$tmp = 0;
		while($res = mysqli_fetch_row($result))
		{
				$temp = $res[0];		
		}
		$qvery = 'SELECT `id`, `name`, `price`, `datestart`, `dateend` FROM `Projects` WHERE `idmanag` ="'.$tmp.'"';
		$result2 = mysqli_query($this->con, $qvery);
		echo mysqli_error($this->con);
		*/
		return $result;
	}
	
	public function get_projects_m($idp)
	{
		$qvery = 'SELECT `name`, `email`, `phone`, `company`, `photo` FROM `Manager` WHERE `id`='.$idp;
		$result2 = mysqli_query($this->con, $qvery);
		echo mysqli_error($this->con);
		$res = array();$temp = 0;
		while($r = mysqli_fetch_row($result2))
		{
				$res[$temp] = $r[0].";".$r[1].";".$r[2].";".$r[3].";".$r[4];
				$temp++;
		}		
		return $res;
	}
	//end class
	public function off_sql()
	{
		 mysqli_close($this->con);
	}
}
?>