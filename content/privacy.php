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

# files
$infofile=$NL_INFO_FILE;

echo("<div class=spaceline50></div>");
echo("<div class=card>");
echo("<div class=card-header>$L_INFOPANEL</div>");
echo("<div class=spaceline></div>");
echo("<div class=card-body id=cardbody>");

if (file_exists($infofile)){
	$tf=file_get_contents($infofile);
	$tfa=explode(PHP_EOL,$tf);
	$db=count($tfa);
	echo($db);
	for($i=0;$i<$db;$i++){
		$ki=htmlspecialchars($tfa[$i]);
		echo("$ki<br />");
	}
}else{
	echo("$L_FILENOTFOUND");
}

echo("</div>");
echo("<div class=spaceline></div>");
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
