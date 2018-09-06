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

$passok=false;
$nodata=true;
$pass="";

# check password
if (isset($_POST["submitall"])){
	$nodata=false;
	if (isset($_POST["usermd5pass"])){
		$pass=$_POST["usermd5pass"];
		if ($pass==$NL_PASS) {
			$passok=true;
		}
	}
}

echo("<br /><br /><br /><center>");
echo("<h1>$L_ADMIN_ADDRESSES - $L_PRINT</h1>");
echo("<br /><br /><br />");

if ($passok){
	# load data from file
	if (file_exists($datfile)){
		$sch=file_get_contents($datfile);
	
   		$tfa=explode(PHP_EOL,$sch);
		$db=count($tfa);
		$db2=$db-1;
		echo($L_STORED.": ".$db2);
		if ($db2>0){
			echo("<br /><br />");
			echo("<br /><br /><br />");
			echo("<center><table style=\"width:90%;\"><tr>");
			$col=0;
			$size=100/$NL_TABLE_COL;
			for($i=0;$i<$db;$i++){
				$ki=htmlspecialchars($tfa[$i]);
				if ($ki<>""){
					if ($col==$NL_TABLE_COL){
						$col=0;
						echo("</tr><tr>");
					}
					echo("<td style=\"border:1px solid;padding:5px;width:$size%;text-align:center;\">$ki</td>");
					$col++;
				}
			}
			echo("</tr></table></center>");
		}
	}else{
		echo("<br />$L_FILENOTFOUND<br />");
	}
}
echo("</center><br /><br />");
echo("<br /><br />");
echo($COPYRIGHT);


?>
