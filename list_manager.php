<?
require_once('class_manager.php');
$content = new Manager;
echo $content->list_manager($this->title);
?>
<div id="multi_data">
</div>
<script type="text/javascript" >
$(document).ready(function() {
$.ajax({
  type: "POST",
  url: 'list_m.php?idm='+<? echo $_GET['idm']; ?>,
  success: function(data) {
             $('#multi_data').html(data);
  }
});
});
</script>