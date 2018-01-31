<?php
class core
{
	public $title = '';
	private $content ='';
	public function __construct($page)
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
	
	public function content()
	{
		switch($this->title)
		{
			case 'Manager':
				require_once('class_manager.php');
				$this->content = new Manager;
				$this->content->form($this->title);
				$this->content->list_manager($this->title);
				if($_GET['idm'] != '')
				{
					$this->content->show_manager($_GET['idm']);
					$this->content->photo_setting($_GET['idm']);
				}
			break;
			case 'Project':
				require_once('class_project.php');
				$this->content = new Project;
				$this->content->form($this->title);
				$this->content->list_project($this->title);
				if($_GET['idm'] != '')
				{
					$this->content->show_project($_GET['idm']);
					$this->content->work_managers($_GET['idm']);
				}
			break;
			case 'list_Manager':
				require_once('list_manager.php');
			break;
			case 'list_Project':
				require_once('list_project.php');
			break;
			default:
				require_once('default.php');
			break;
		}
	}
}
?>
<html lang="ru">
<head>
<?php

$site = new core($_GET['page']);

?>
<title><?php echo $site->title; ?></title>
<meta charset="utf-8" />
<link rel="stylesheet" href="style/style.css" type="text/css" media="all"/>
<script type="text/javascript" src="actions/jquery-3.3.1.min.js" ></script>
	</head>	
	<body>
	 <? $site->content(); ?>
	 

<? require_once('footer.php'); ?>