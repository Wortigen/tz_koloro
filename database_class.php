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
	
	public function add_manager($name,$email,$phone,$comp,$img)
	{
		$result = false;
		$qvery = "SELECT * FROM Manager";
		$result = mysqli_query($this->con, $qvery); //$result = mysql_query($qvery);
		echo mysqli_error($this->con);

		$new_id = mysqli_num_rows($result);
		$new_id++; 
		echo $new_id.":";
		$qvery1 = 'insert into `Manager` ( `id`, `name`, `email`, `phone`, `company`, `photo`) values ( "'.$new_id.'", "'.$name.'", "'.$email.'", "'.$phone.'", "'.$comp.'", "") ';
		$result = mysqli_query($this->con, $qvery1);
		echo mysqli_error($this->con);

		
	}
	
	public function off_sql()
	{
		 mysqli_close($this->con);
	}
}
?>