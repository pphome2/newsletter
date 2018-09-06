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
$datfile=$NL_DATA_FILE;
$infofile=$NL_INFO_FILE;

$email="";
$action="";

# post data
if (isset($_POST["submitall"])){
	if (isset($_POST["usersignup"])){
		$email=$_POST["usersignup"];
		$action=$_POST["useraction"];
	}
}

# get param
if (isset($_GET["$NL_PARAM_DATA"])){
	$email=$_GET["$NL_PARAM_DATA"];
}else{
}

if ($email==""){
	message($L_MESSAGE,$L_NODATA);
}

# load data from file
if (file_exists($datfile)){
	$cont=file_get_contents($datfile);
	$tnl=explode(PHP_EOL,$cont);
	echo("<div class=card>");
	echo("<div class=card-header>$L_SIGN");
	echo("</div>");
	echo("<div class=card-body>");
	echo("<div class=spaceline50></div>");
	if (($action=="")and($email<>"")){
		echo("$email: $action ");
		if (in_array($email,$tnl)){
			echo("$L_SIGNED");
			$signed=true;
			$butt=$L_SIGNED_OUT;
			$action=$NL_DEL_CHAR;
		}else{
			echo("$L_NOSIGNED");
			$signed=false;
			$butt=$L_SIGNED_IN;
			$action=$NL_NEW_CHAR;
		}
		echo("<form action=$NL_SELFEDIT_FILE id=1 method=post enctype=multipart/form-data>");
		echo("<div class=spaceline50></div>");
		echo("<input name=usersignup id=usersignup type=hidden value=\"$email\">");
		echo("<input name=useraction id=useraction type=hidden value=\"$action\">");
		if (!$signed){
			echo("<input name=usercheck id=usercheck type=checkbox value=\"$action\" onclick=buttonactivate(usercheck,submitall)>");
			echo("$L_CHECK_DATAPROTECTION");
			echo("<div class=spaceline50></div>");
			echo("<input type=submit id=submitall name=submitall value=\"$butt\" disabled>");
		}else{
			echo("<input type=submit id=submitall name=submitall value=\"$butt\">");
		}
		echo("</form>");
	}else{
		if (($action==$NL_NEW_CHAR)and(!in_array($email,$tnl))){
			$email=strip_tags($email);
			$db=count($tnl);
			$tnl[$db]=$email;
		}
		if (($action==$NL_DEL_CHAR)and(in_array($email,$tnl))){
			$db=count($tnl);
			$k=0;
			while(($k<$db)and($tnl[$k]<>$email)){
				$k++;
			}
			if ($tnl[$k]==$email){
				$tnl[$k]="";
			}
		}
		$db=count($tnl);
		$tnl2="";
		$k=0;
		for($i=0;$i<$db;$i++){
			if ($tnl[$i]<>""){
				$tnl2=$tnl2.$tnl[$i].PHP_EOL;
			}
			$k++;
		}
		#echo($tnl2);
		file_put_contents($datfile,$tnl2);
		#echo("$action $datfile $db $email $db<br />");
		echo("<a href=$NL_SITE_HOME><input type=submit id=submitall name=submitall value=\"$L_OK\"></a>");
	}
	echo("<div class=spaceline50></div>");
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
	echo($db);
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
