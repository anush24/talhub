<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
	$myval = $_GET["score"];
	$ques = $_GET["tot"];
	$ss = "sol" . $_SESSION['testname'] . ".txt";

	$myfile = fopen($ss, "a+") or die("Unable to open file!");

	include "init.php";

	$data = $link->query("select * from test join qui_register on qui_register.test_id=test.test_id where test.test_id='".$_SESSION['testname']."'");
	$row = $data->fetch_array();

	$totmarks = $ques * 5;
	$cutoff = ($myval/$totmarks) * 100;
	if($cutoff > $row[5]){
		fwrite($myfile,$_SESSION['name']);
		fwrite($myfile,"\t");
		fwrite($myfile, $myval);
		fwrite($myfile,"\n");
	}
	fwrite($myfile,"\n");
	fclose($myfile);
	include "Main_template.php";
?>
</body>
</html>