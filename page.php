<?

class page{

	public $titel = '';
	public $resorse = array();
	public function __construct($Page)
	{
	
		switch($page)
		{
			case 'Manager':
				$this->title = $page;
			break;
			case 'Project':
				$this->title = $page;
			break;
			case 'list_Manager':
				$this->title = $page;
			break;
			case 'list_Project':
				$this->title = $page;
			break;
			default:
				$this->title = "Menu";
			break;
		}
	}	
	
	public function add_resourse($type,$path)
	{
		$count = count($this->resorse);
		switch($type)
		{
			case "css":
				$this->resorse[$count] = '<link rel="stylesheet" href="'.$path.'" type="text/css" media="all"/>';
			break;
			case "java":
				$this->resorse[$count] = '<script type="text/javascript" src="'.$path.'"  ></script>';
			break;
			case "javascript":
				$this->resorse[$count] = '<script type="text/javascript" src="'.$path.'"  ></script>';
			break;
		}
	}
	
	public function show()
	{
		require_once('header.php');
	}
}

?>