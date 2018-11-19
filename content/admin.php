<?php

 #
 # Newsletter - mail address add and delete
 #
 # info: main folder copyright file
 #
 #


if (file_exists("../public/prepare.php")){
    #include("../public/prepare.php");
}


# files
$datfile=$NL_CFG_DIR.$NL_DATA_FILE;
$infofile=$NL_INFO_FILE;

$passok=false;
$nodata=true;
$pass="";

# check password
if (isset($_POST["userpass"])){
	$nodata=false;
	$pass=$_POST["userpass"];
	$pass=md5($pass);
	if ($pass==$NL_PASS) {
		$passok=true;
	}
}
if (isset($_POST["usermd5pass"])){
	$nodata=false;
	$pass=$_POST["usermd5pass"];
	$pa=explode($NL_SEPCHAR,$pass);
	#echo($pass.' '.$pa[0].'-'.$pa[1]);
	$t=time();
	$at=$t-$pa[1];
	if (($pa[0]==$NL_PASS)and($at<$NL_LOGIN_TIMEOUT)) {
		$passok=true;
	}
}

if (file_exists($NL_HEADER)){
    include("$NL_HEADER");
}

if (file_exists($NL_JS_BEGIN)){
    include("$NL_JS_BEGIN");
}

echo("<h1>$L_ADMINSITE</h1><div class=spaceline></div>");


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



if ((!$passok)and(!$nodata)){
	message($L_ERROR,$L_BADPASS);
}


if (!$passok){
	echo("<div class=card>");
	echo("<div class=card-header>$L_ADMIN_IDENTIFICATION</div>");
	echo("<div class=panel2>");
	echo("<div class=card-body>");
	echo("<div class=spaceline></div>");
	echo("<section id=form1>");
	echo("<form id=1 method=post enctype=multipart/form-data>");
	echo("<div class=spaceline></div>");
	echo("<label for=userpass>$L_PASS : </label>");
	echo("<input name=userpass id=userpass type=password placeholder=\"$L_PASS\"><br /><br />");
	echo("<input type=submit id=submitall name=submitall value=$L_BUTTON_ALL>");
	echo("</form>");
	echo("</section>");
	echo("<div class=spaceline></div>");
	echo("</div>");
	echo("</div>");
	echo("</div>");
}


echo("<div class=spaceline></div>");

if ($passok){

	# load data from file
	if (file_exists($datfile)){
		$sch=file_get_contents($datfile);
	
		echo("<div class=card>");
		echo("<div class=card-header>$L_ADMIN_ADDRESSES</div>");
		echo("<div class=panel2>");
		echo("<div class=card-body>");
		echo("<div class=spaceline></div>");
   		$tfa=explode(PHP_EOL,$sch);
		$db=count($tfa);
		$db2=$db-1;
		echo($L_STORED.": ".$db2);
		$before="<div class=spaceline></div><center><table class=minitable><tr>";
		$after="</tr></table></center><div class=spaceline></div>";
		if ($db2>0){
			$size=100/$NL_TABLE_COL;
			$col=0;
			$line=0;
			$datat=array();
			$datat[$line]="";
			for($i=0;$i<$db;$i++){
				$ki=htmlspecialchars($tfa[$i]);
				if ($ki<>""){
					if ($col==$NL_TABLE_COL){
						$col=0;
						$datat[$line]=$datat[$line]."</tr><tr>";
						$line++;
						$datat[$line]="";
					}
					$datat[$line]=$datat[$line]."<td style=\"width:$size;\">$ki</td>";
					$col++;
				}
			}
		}
		if (isset($PAGER)){
			$p=$NL_PASS.$NL_SEPCHAR.time();
			pager($line,$NL_TABLE_PAGEROW,$datat,$before,$after,"usermd5pass",$p);
		}else{
			echo($before);
			$dsor=count($datat);
			for($i=0;$i<$dsor;$i++){
				echo($datat[$i]);
			}
			echo($after);
		}
		
		echo("<div class=spaceline></div>");
		echo("</div>");
		echo("</div>");
		echo("</div>");
	
		echo("<div class=spaceline></div>");

		echo("<div class=card>");
		echo("<div class=card-header>$L_PRINT</div>");
		echo("<div class=panel2>");
		echo("<div class=card-body>");
		echo("<div class=spaceline></div>");

		echo("<section id=form1>");
		echo("<form action=$NL_PRINT_FILE id=2 method=post>");
		$p=$NL_PASS.$NL_SEPCHAR.time();
		echo("<input name=usermd5pass id=usermd5pass type=hidden value=\"$p\">");
		echo("<input type=submit id=submitall name=submitall value=$L_BUTTON_PRINT>");
		echo("</form>");
		echo("</section>");
		
		echo("<div class=spaceline></div>");
		echo("</div>");
		echo("</div>");
		echo("</div>");

	}else{
		message($L_ERROR,$L_FILENOTFOUND);
	}
}

echo("<div class=spaceline50></div>");
#echo("<div class=spaceline50></div>");



if (file_exists($NL_JS_END)){
    include("$NL_JS_END");
}

if (file_exists($NL_FOOTER)){
    include("$NL_FOOTER");
}

if (file_exists("../public/prepare_end.php")){
    #include("../public/prepare_end.php");
}


?>
