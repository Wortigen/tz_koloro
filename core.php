<?php
class Core
{
	var $pb;
	function Page($page)
	{
		switch($page)
		{
			case "Manager":
			break;
			case "Project":
			break;
			case "list_Manager":
			break;
			case "list_Project":
			break;
			default:
			$this->pb->New_Page('Меню');
			$this->pb->Add_Resourse('css','style/style.css');
			$this->pb->Show();
			break;
		}
	}
}

?>