<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$s = $_SESSION['sendtest'];
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="Quiz_style.css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript" src="questions.js"></script>
<script>
	var str = "<?php echo $s ?>"; 
	alert(str);
</script>
<title>Tech Challenge</title>
</head>
<body onload="display_date_Topic()">
<div class="Main_Section">	
	<div class="Title_Section">
		<div class="Title_header">
			<span class="heading">TAKE FIRST LEVEL SCREENING TEST</span>
		</div>
	<div class="Title_SideList">
		<span class="heading"><span id="disp_date"></span></span>
	</div>
</div>
<div class="Content_Section">
	<div class="Score_Section">
		<p class="heading">Current Score Status</p>
		<p id="result_text"></p><br/>
		<span id="result">00</span>
		<pre>CORRECT         WRONG</pre>
		<p><span id="correct_no">0</span><span id="wrong_no">0</span></p>   
	</div>

	<div class="Questions_Section">
	<p class="heading">Questions</p><span id="score_wt"></span><span id="timerText"></span>
	<p id="que">Click Start to start the quiz.<br/><br/> You have 5 minutes to complete the quiz!<br/><br/> All the best!!</p>
	<div id="progressbar">
     	<div id="pslide"></div>
    </div>
</div>
</div>
	<div class="Control_Section">
		<button id="start_id" class="action-button shadow animate blue" onclick="start_quiz(str)">Start</button>
		<button id="nq_id" class="action-button shadow animate blue" onclick='checkAnswer()'>Next Question</button>
		<button  id="quit_id" class="action-button shadow animate blue" onclick="quit_quiz()">Quit</button>
	</div>
	<div id="rep">
	</div>
	<div class="Footer_Section">
		<span id='l'>Copywright: </span> TalHub.com <span id='l'>Privacy Policy</div>
	</div>
</body>
</html>