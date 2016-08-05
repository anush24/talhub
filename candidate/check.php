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
		$_SESSION['testname'] = $row[$t][0];
		$_SESSION['sendtest'] = $testbutton;
		$result = $link->query("insert into testtaken values('".$_SESSION['name']."','".$_SESSION['testname']."')");
		include "index.php";
	}
}

?>
