<?
class Database{
	
	private $con
	public function __construct()
	{
		$this->con = mysql_connect("localhost", "rcygcqrd_Worti", "eAeu*1cc#b%I");
		mysql_select_db("rcygcqrd_MetalColor",$con);
	}
	
	public function add_manager($name,$email,$phone,$comp,$img)
	{
		$result = false;
		$qvery = "SELECT * FROM `Manager` ";
		$result = mysql_query($qvery);
		$new_id = mysql_num_rows($result);
		$new_id++;
		$qvery = "INSERT INTO `Manager`(`id`, `name`, `email`, `phone`, `company`)";
		$qvery = $qvery." VALUES ('".$new_id."','".$name."','".$email."','".$phone."','".$comp.")";
		$result = mysql_query($qvery);
		
	}
	
	public function off_sql()
	{
		 mysql_close($this->con);
	}
}
?>