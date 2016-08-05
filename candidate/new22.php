<?php
	$startdate = $_POST['start'];
	$enddate = $_POST['end'];
	if (session_status() == PHP_SESSION_NONE) {
    		session_start();
    }
	include "init.php";
	$data=$link->query("SELECT skillset FROM usertable where email='".$_SESSION['name']."'");
	$rows = $data->fetch_array();
	$userskill = $rows[0];
	$skillsplit = explode (",", $userskill); 
	
	for($t=0;$t<count($skillsplit);$t++)
	{
		if($t == (count($skillsplit) - 1))
			$d1 = "'" .$skillsplit[$t].  "'";
		else{
			$d1 = "'" .$skillsplit[$t].  "'".",";
		}
		if($t == 0)
			$d2 = $d1;
		else{
			$d2 = $d2 . $d1;
		}
	}

	$data=$link->query("select job_id from jobs where job_skills in (".$d2.")");
	$jobs = $data->fetch_all();
	
	for($i=0;$i<count($jobs);$i++)
	{
		$data1=$link->query("SELECT * FROM test join tal_comp on test.c_id=tal_comp.comp_id join jobs on jobs.job_id=test.job_id where jobs.job_status!='closed' and jobs.job_id='".$jobs[$i][0]."'and (test.start_date between '".$startdate."' and '".$enddate."')");
		$tests = $data1->fetch_all();
		$_SESSION['num'] = count($tests);
		for($x=0;$x<count($tests);$x++)
		{
			echo "<div class='testdata1'>\n";
			echo "<span>".$tests[$x][18]." test on ".$tests[$x][1]." </span>\n";
			echo "</div>\n";
	 		echo "<div class='testinfo1'>\n";
	  		echo "<span>This test is conducted by ".$tests[$x][9]. ". It is scheduled after ".$tests[$x][2]." </span>\n";
			$testname = 'test'.$tests[$x][0];
			$data2=$link->query("SELECT * FROM qui_register where test_id='".$tests[$x][0]."' and s_email='".$_SESSION['name']."'");
			$testdetail = $data2->fetch_all();
			if(!$testdetail)
			{
				echo "<form method='post' action='register.php'>\n";
				echo "<input type='submit' name='".$testname."' value='Register' id='testing1'>\n";
				echo "</form>\n";
			}
			else{
				date_default_timezone_set('America/Los_Angeles');
				$current_date = date('Y-m-d');
				$current_time = date('H:i:s');
				$time = strtotime($tests[0][2]);
				$tu = date("H:i", strtotime('+1 minutes', $time));
				if($current_date >= $tests[0][1]){
				
					$data3=$link->query("select * from testtaken where s_email='".$_SESSION['name']."' and test_id='".$tests[$x][0]."'");
					$teststatus = $data3->fetch_all();
					if(count($teststatus)==0)
					{
						echo "<form method='post' action='check.php'>\n";
						echo "<input type='submit' name='".$testname."' value='taketest' id='testing1'>\n";
						echo "</form>\n";
					}
					else{
						echo "<form method='post' action='check.php'>\n";
						echo "<input type='submit' name='".$testname."' value='taketest' id='testing1'  disabled='disabled'>\n";
						echo "</form>\n";
					}

				}
				else{
					echo "<form method='post' action='register.php'>\n";
					echo "<input type='submit' name='".$testname."' value='Registered' id='testing1' disabled='disabled'>\n";
					echo "</form>\n";
				}
			}
	  		echo "</div>\n";
	  	}	
	}
?>
