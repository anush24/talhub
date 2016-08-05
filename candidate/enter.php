<?php
if (session_status() == PHP_SESSION_NONE) 
{
    session_start();
      //$_SESSION['res'] = "";
}
$_SESSION['run'] = '1';
if(isset($_POST['username']))
{
	include "init.php";
	$data=$link->query("select password from usertable where email='".$_POST['username']."'");
	$row = $data->fetch_array();
	if(count($row) != 0)
	{
		
		if($row[0] == $_POST['password'])
		{
    		$_SESSION['name'] = $_POST['username'];
    		include "Main_template.php";
		}
		else
		{
			
			$data = "invalid password";
			$_SESSION['res'] = $data;
			include "Home.php";
		}
	}
	else
	{
		$data = "invalid username and password";
		$_SESSION['res'] = $data;
		include "Home.php";
	}
}
?>
