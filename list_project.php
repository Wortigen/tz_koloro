<?
	require_once('class_project.php');
	$content = new Project;
	$content->list_project($this->title);
?>