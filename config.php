<?php
class core
{
	public $title = '';
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
				//$this->title = $page;
			break;
			case 'Project':
				//$this->title = $page;
			break;
			case 'list_Manager':
				//$this->title = $page;
			break;
			case 'list_Project':
				//$this->title = $page;
			break;
			default:
				include('default.php');
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
<!--<script type="text/javascript" src="jquery-3.2.1.min.js"  ></script> -->
	</head>	
	<body>
	 <? $site->content(); ?>
<? require_once('footer.php'); ?>