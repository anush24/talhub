<?php
if (session_status() == PHP_SESSION_NONE) 
{
    session_start();
	$_SESSION['run'] = '1';
}
$Err = NULL;


$target = 'c:/wamp/www/';

$target = $target . basename( $_FILES['file']['name']); 

move_uploaded_file($_FILES['file']['tmp_name'], $target);


if (empty($_POST['username']))
{
	$Err = "firstname is empty";
}
else if(empty($_POST['lastname']))
{
	$Err = "lastname is empty";
}
else if(empty($_POST['email']))
{
	$Err = "email is empty";
}
else if(empty($_POST['password']))
{
	$Err = "password is empty";
}
else if(empty($_POST['phone']))
{
	$Err = "phone is empty";
}
else if(isset($_POST['username']) and isset($_POST['lastname']))
{
	$name = $_POST["username"];
	if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
  		$Err = "Only letters and white space allowed";
	}
	else if(isset($_POST['email']))
	{
		$email = $_POST['email'];
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  			$Err = "Invalid email format"; 	
		}
		else if(isset($_POST['password']))
		{
			$password = $_POST['password'];
			if(!preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/',$password))
			{
				$Err = "Password consists of atleast 1 capital letter,special character and number";
			}
			else if(isset($_POST['phone']))
			{
				$phone = $_POST['phone'];
				if(!preg_match("/^[0-9]{3}[0-9]{3}[0-9]{4}$/", $phone)) 
				{
    				$Err = "Invalid Phone";
   				}
   			}
		}
	}
}
if($Err == NULL)
{
	$_SESSION['name'] = $_POST['email'];
	for ($i = 0;$i < (count($_POST['sets'])-1);$i++)
	{
		if($i == 0)
			$y =  $_POST['sets'][$i] . ",";
		else
			$y = $y . $_POST['sets'][$i] . ",";
	}
	$y = $y . $_POST['sets'][$i];
	
	include "init.php";
	$str =  mysqli_real_escape_string($link,$y);
	$data3=$link->query("insert into usertable values('".$_POST['username']."','".$_POST['lastname']."','".$_POST['email']."','".$_POST['password']."','".$_POST['phone']."','".$str."')");
						
	include "Main_template.php";
}
else{
		$_SESSION['res'] = $Err; 
		include "seeker.php";
	}
?>