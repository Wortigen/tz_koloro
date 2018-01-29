<?
class PageBuild
{
	private $Start_page = "";
	private $Page_Resourse = array();
	private $title = "";
	private $Page_Body = array();
	private $Add_script = array();
	private $End_page = "";
	function create_Page($name)
	{
		$this->Start_page = "<!DOCTYPE html><html lang='ru'><head><meta charset='utf-8' />";
		$this->title = "<title>".$name."</title>";
		$this->Page_Body[0] = "</head><body>";
		$this->End_page = "</body></html>";
	}
	
	function Add_Resourse($name, $path)
	{
		$count = count($this->Page_Resourse);
		switch($name)
		{
			case "css":
				$this->Page_Resourse[$count++] = "<link rel='stylesheet' href='".$path."' type='text/css' media='all'/>";
			break;
			case "javascript":
				$this->Page_Resourse[$count++] = "<script type='text/javascript' src='".$path."'  ></script>";
			break;
			case "java":
				$this->Page_Resourse[$count++] = "<script type='text/javascript' src='".$path."'  ></script>";;
			break;
			case "script":
				$this->Page_Resourse[$count++] = "<script type='text/javascript' src='".$path."'  ></script>";;
			break;
			case "ico":
				$this->Page_Resourse[$count++] = "<link rel='shortcut icon' href='".$path."' type='image/ico'>";
			break;
		}
	}
	
	function Show()
	{
		echo $this->Start_page;
		for($i = 0; $i < count($this->Page_Resourse);$i++)
		{
			echo $this->Page_Resourse[$i];
		}
		echo $this->title;
		for($i = 0; $i < count($this->Page_Body);$i++)
		{
			echo $this->Page_Body[$i];
		}
		for($i = 0; $i < count($this->Add_script);$i++)
		{
			echo $this->Add_script[$i];
		}
		echo $this->End_page;
	}
}
?>