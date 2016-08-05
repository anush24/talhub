
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include "init.php";	
$data = $link->query("select test_id from test");
$row = $data->fetch_all();
for($t=0;$t<count($row);$t++)
{
	$testbutton = 'test'.$row[$t][0];

	if( isset($_POST[$testbutton]))
	{
		$testid = $row[$t][0];
		$result = $link->query("insert into qui_register values('".$_SESSION['name']."','".$testid."')");
	}
}
include "Main_template.php";
?>
