<?
	require_once('class_project.php');
	$content = new Project;
	$content->list_project($this->title);
?>

<div id="multi_data">
</div>
<script type="text/javascript" >
$(document).ready(function() {
$.ajax({
  type: "POST",
  url: 'list_p.php?idm='+<? echo $_GET['idm']; ?>,
  success: function(data) {
             $('#multi_data').html(data);
  }
});
});
</script>