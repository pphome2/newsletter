<?php

 #
 # Newsletter - mail address add and delete
 #
 # info: main folder copyright file
 #
 #


if (file_exists("../public/prepare.php")){
    include("../public/prepare.php");
}



# files
$datfile=$NL_DATA_FILE;
$infofile=$NL_INFO_FILE;

$badmail=false;
$email="";
$nodata=true;

# check mail address
if (isset($_POST["submitall"])){
	$nodata=false;
	if (isset($_POST["usermail"])){
		$email=$_POST["usermail"];
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$badmail=true;
		}else{
			header("Refresh:0; url=$NL_SELFEDIT_FILE?$NL_PARAM_DATA=$email");
		}
	}
}


if (file_exists($NL_HEADER)){
    include("$NL_HEADER");
}

if (file_exists($NL_JS_BEGIN)){
    include("$NL_JS_BEGIN");
}


function message($head,$message){
	echo("<div>");
	echo("<div class=card style='display:block;'>");
	echo("<div class=card-header>");
	echo("<div onclick=\"this.parentElement.parentElement.parentElement.style.display='none';\" class='toprightclose'> </div>");
	echo("<span class=topleftmenu1 onclick=cardopenclose(cardbodyhide2)></span>$head");
	echo("</div>");
	echo("<div class=card-body-hide id=cardbodyhide2 style='display:block;'>");
	echo("<div class=spaceline></div>");
	echo("$message");
	echo("<div class=spaceline></div>");
	echo("</div>");
	echo("</div>");
	echo("<div class=spaceline50></div>");
	echo("</div>");
}




if (($badmail)and($email<>"")){
	message($L_MESSAGE,$L_BADMAIL);
}

if ((!$nodata)and($email=="")){
	message($L_ERROR,$L_NODATA);
}



# load data from file

if (file_exists($datfile)){
	$sch=file_get_contents($datfile);
	echo("<div class=card>");
	echo("<div class=card-header>$L_MAILADDRESS</div>");
	echo("<div class=panel2>");
	echo("<section id=form1>");
	echo("<form action=$NL_ENTER_FILE id=1 method=post enctype=multipart/form-data>");
	echo("<div class=spaceline></div>");
	echo("<label for=userpass>$L_EMAIL : </label>");
	echo("<input name=usermail id=usermail type=text placeholder=\"$L_EMAIL\"><br /><br />");
	echo("<input type=submit id=submitall name=submitall value=$L_BUTTON_ALL>");
	echo("</form>");
	echo("</section>");
	echo("<div class=spaceline></div>");
	echo("</div>");
	echo("</div>");


}else{
	message($L_ERROR,$L_FILENOTFOUND);
}

echo("<div class=spaceline50></div>");
echo("<div class=card>");
echo("<div class=card-header onclick=cardopenclose(cardbodyhide)>");
echo("<span class=topleftmenu1></span>$L_INFOPANEL");
echo("</div>");
echo("<div class=card-body-hide id=cardbodyhide style='display:none;'>");
echo("<div class=spaceline></div>");

if (file_exists($infofile)){
	$tf=file_get_contents($infofile);
	$tfa=explode(PHP_EOL,$tf);
	$db=count($tfa);
	#echo($db);
	for($i=0;$i<$db;$i++){
		$ki=htmlspecialchars($tfa[$i]);
		echo("$ki<br />");
	}
}else{
	echo("$L_FILENOTFOUND");
}

echo("<div class=spaceline></div>");
echo("</div>");
echo("</div>");
echo("<div class=spaceline50></div>");


if (file_exists($NL_JS_END)){
    include("$NL_JS_END");
}

if (file_exists($NL_FOOTER)){
    include("$NL_FOOTER");
}

if (file_exists("../public/prepare_end.php")){
    include("../public/prepare_end.php");
}


?>
