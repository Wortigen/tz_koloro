<html lang="ru">
	<head>
	<title><?php echo $this->title; ?></title>
	<meta charset="utf-8" />
	<?php 
		for($i = 0;$i < count($this->resorse);$i++)
		{
			echo $this->resorse[$i];
		}
	?>
	</head>	
	<body>
		
	
<? require_once('footer.php'); ?>


