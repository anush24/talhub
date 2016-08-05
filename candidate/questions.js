var sc=0,n_q=0,wrong=0,right=0,prog=0,t_score=0;
var mins = 30;  //Set the number of minutes you need
var secs = mins * 60;
var currentSeconds = 0;
var currentMinutes = 0;
var tim;
var aq;
var tagObj;
var xmlDoc;
var k=0;
var inc;

function display_date_Topic()
{
	$('#progressbar').hide();
	$('#nq_id').hide();
	$('#quit_id').hide();
	var dat=new Date();
	document.getElementById("disp_date").innerHTML=dat.toDateString();
}
	//Updates the progress bar
function progress() 
{
	var r=$('#progressbar').width();
    var div = prog*(r/100);
    div=div+"px";
    $('#pslide').animate({width: div, opacity: '0.8'}, "slow");
    document.getElementById("pslide").innerHTML=prog+"%";
}

//Starts the timer and calls to display the question
function start_quiz (x) 
{
	y = x + ".xml";
	$('#start_id').hide();
	$('#nq_id').show();
	$('#quit_id').show();
	$('#progressbar').show();
	setTimeout('Decrement()',1000);
	if(typeof window.DOMParser != "undefined") {
  	  	xmlhttp=new XMLHttpRequest();
   	 	xmlhttp.open("GET",y,false);
    	if (xmlhttp.overrideMimeType){
        	xmlhttp.overrideMimeType('text/xml');
    	}
   		xmlhttp.send();
    	xmlDoc=xmlhttp.responseXML;
	}
	else{
    	xmlDoc = new ActiveXObject("Microsoft.XMLDOM");
    	xmlDoc.async="false";
    	xmlDoc.load(y);
	}
	tagObj=xmlDoc.getElementsByTagName("questions");
	inc = 100 / tagObj.length;
	t_score=tagObj.length * 5;
	display_question();
}
//Displays 2 types of questions. Checks for question type and displays accordingly
function display_question() 
{
	var quesValue = tagObj[k].getElementsByTagName("quesno")[0].childNodes[0].nodeValue;
	document.getElementById("que").innerHTML=quesValue+"<br/>";
	
	var choiceaValue = tagObj[k].getElementsByTagName("choicea")[0].childNodes[0].nodeValue;
	var radioBtn = $('<label for="c1"><input type="radio" id="choice1" name="radgrp" value="'+choiceaValue+'"/>'+choiceaValue+'</label><br/>');
    radioBtn.appendTo('#que');
   
    var choicebValue = tagObj[k].getElementsByTagName("choiceb")[0].childNodes[0].nodeValue;
	var radioBtn = $('<label for="c1"><input type="radio" id="choice1" name="radgrp" value="'+choicebValue+'"/>'+choicebValue+'</label><br/>');
    radioBtn.appendTo('#que');
 
    var choicecValue = tagObj[k].getElementsByTagName("choicec")[0].childNodes[0].nodeValue;
	var radioBtn = $('<label for="c1"><input type="radio" id="choice1" name="radgrp" value="'+choicecValue+'"/>'+choicecValue+'</label><br/>');
    radioBtn.appendTo('#que');
    var choicedValue = tagObj[k].getElementsByTagName("choiced")[0].childNodes[0].nodeValue;
	var radioBtn = $('<label for="c1"><input type="radio" id="choice1" name="radgrp" value="'+choicedValue+'"/>'+choicedValue+'</label><br/>');
    radioBtn.appendTo('#que');
}

function checkAnswer()
 {
 	var result="Wrong";

 	var answer = tagObj[k].getElementsByTagName("ans")[0].childNodes[0].nodeValue;
 	answer = answer.toLowerCase();
 	if (!$("input[name='radgrp']:checked").val()) 
 	{
 		ans="null";
 	}
 	else
 	{
		ans= (($("input:radio[name='radgrp']:checked").val()).toString()).toLowerCase();
 	}

 	if(answer==ans)
 	{
 		sc=sc+5;
 		right+=1;
 		result="<b>Correct!</b><br/>";
 	}
 	else
 	{
 		wrong+=1;
 		result="Wrong Answer!<br/></b>";
 	}
 	
 	prog+=inc;
 	progress(prog);
 	k = k + 1;
 	document.getElementById("result_text").innerHTML=result+"<br/>";
 	document.getElementById("result").innerHTML="Current Score: "+sc;
 	document.getElementById("correct_no").innerHTML=right;
 	document.getElementById("wrong_no").innerHTML=wrong;
 	if(k<tagObj.length)	
 		display_question();	
 	else
 		end_quiz();		 	
 }
//Timer function decrements the timer
function Decrement() 
{
	currentMinutes = Math.floor(secs / 60);
    currentSeconds = secs % 60;
    if(currentSeconds <= 9) currentSeconds = "0" + currentSeconds;
    secs--;
    document.getElementById("timerText").innerHTML = currentMinutes + ":" + currentSeconds; //Set the element id you need the time put into.
    if(secs !== -1) 
    	tim=setTimeout('Decrement()',1000);  
    else
    {
    	alert("Timeout!"); 
    	end_quiz();    
    }
}
//Is invoked when the user voluntarily quits the quiz
function quit_quiz()
{
	var con=confirm("Are you sure you want to quit the quiz?");
	if (con==true)
	{
		$('#progressbar').hide();
		end_quiz();
	}
}
/*Invoked when the timeout occurs or when user clicks quit or after the 10 questions are displayed.
Displays the final result*/
function end_quiz()
{
	$('#start_id').hide();
	$('#nq_id').hide();
	$('#quit_id').hide();
	$('#score_wt').hide();
	document.getElementById("que").innerHTML="Quiz ended!<br/>Your final score is "+sc+"/"+t_score+"<br/>Number of correct answers:"+right+"<br/>Number of wrong answers:"+wrong+"<br/>Number of questions not viewed:"+(tagObj.length-right-wrong);
	document.getElementById("result").innerHTML="Your final score is "+sc;
	document.getElementById("wrong_no").innerHTML=tagObj.length-right;
	document.getElementById("timerText").innerHTML="";
	clearTimeout(tim);
	tot = tagObj.length;
	window.location.href="report.php?score="+sc+"&tot="+tagObj.length;
}


