<?php

$PAGER=true;


# parameters:
# 	$db: all row
#	$dbperpage: line per page
#	$data: lines
#	$beforetags, $aftertags: html tags for page (before and after)
#	$forminputid, $forminputdata: hide form input id and data for password

function pager($db,$dbperpage,$data,$beforetags,$aftertags,$forminputid,$forminputdata){
	global $SYS_PLUGINS_DIR;
	
	$pagename="page";
	$submitname="bsubmit";
	$apage=1;

	if (file_exists($SYS_PLUGINS_DIR."/pager/pager.css")){
		include($SYS_PLUGINS_DIR."/pager/pager.css");
	}

	if (isset($_GET[$pagename])){
		$apage=$_GET[$pagename];
	}
	if (isset($_POST[$pagename])){
		$apage=$_POST[$pagename];
	}

	if (count($data)>0){
		echo($beforetags);
		$firstd=($apage-1)*$dbperpage;
		$lastd=$firstd+$dbperpage;
		for ($i=$firstd;$i<$lastd;$i++){
			echo($data[$i]);
		}
		echo($aftertags);
	}
	
	#echo("Sor: $db, Oldal per sor: $dbperpage, Aktpage: $apage, $firstd-$lastd");
	
	$linkt=explode('?', $_SERVER['REQUEST_URI'],2);
	$link=(isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$linkt[0]";
	$link=$link."?$pagename=";
	$last=round($db/$dbperpage,0);

	echo("<div class=pl-pagination>");
	echo("<form id='privatepager' method=post>");
	echo("<input name=$forminputid id=$forminputid type=hidden value=\"$forminputdata\">");
	echo("<input name=$pagename id=$pagename type=hidden value=\"?\">");
	echo("<button name=$submitname id=$submitname type=submit style='display:none;'></button>");
	echo("</form>");
		if ($last>1){
			$l2=$link."1";
			echo("<a id=1 class=\"pl-first\"");
			echo("onclick=\"document.getElementById('$pagename').value=1;document.getElementById('$submitname').click();return false;\">");
			echo("</a>");
		}
		if ($last>10){
			for ($i=$apage-5;$i<$apage+5;$i++){
				$l2=$link.$i;
				if ($apage==$i){
					$act="active";
				}else{
					$act="";
				}
				echo("<a id=$i class=\"$act pl-alink\" ");
				echo("onclick=\"document.getElementById('$pagename').value=this.id;document.getElementById('$submitname').click();return false;\">");
				echo("$i</a>");
			}
		}else{
			for ($i=1;$i<=$last;$i++){
				$l2=$link.$i;
				if ($apage==$i){
					$act="active";
				}else{
					$act="";
				}
				echo("<a id=$i class=\"$act\" ");
				echo("onclick=\"document.getElementById('$pagename').value=this.id;document.getElementById('$submitname').click();return false;\">");
				echo("$i</a>");
			}
		}
		if ($last>1){
			$l2=$link.$last;
			echo("<a id=$last class=\"pl-last\"");
			echo("onclick=\"document.getElementById('$pagename').value=$last;document.getElementById('$submitname').click();return false;\">");
			echo("</a>");
		}
	echo("</div>");

	if (file_exists($SYS_PLUGINS_DIR."/pager/pager.js")){
		include($SYS_PLUGINS_DIR."/pager/pager.js");
	}
}





function pager_only($aktpage){
	global $SYS_PLUGINS_DIR;
	
	$pagename="page";
	$apage=1;

	if (file_exists($SYS_PLUGINS_DIR."/pager/pager.css")){
		include($SYS_PLUGINS_DIR."/pager/pager.css");
	}

	if (isset($_GET[$pagename])){
		$apage=$_GET[$pagename];
	}
	if (isset($_POST[$pagename])){
		$apage=$_POST[$pagename];
	}

	
	$linkt=explode('?', $_SERVER['REQUEST_URI'],2);
	$link=(isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$linkt[0]";
	$link=$link."?$pagename=";

	echo("<div class=pl-pagination>");
		$l2=$link."1";
		echo("<a href=$l2 id=1>&laquo;</a>");
		if ($last>10){
			for ($i=$apage-5;$i<$apage+5;$i++){
				$l2=$link.$i;
				if ($apage==$i){
					$act="active";
				}else{
					$act="";
				}
				echo("<a href=$l2 class=$act>$i</a>");
			}
		}else{
			for ($i=1;$i<=$last;$i++){
				$l2=$link.$i;
				if ($apage==$i){
					$act="active";
				}else{
					$act="";
				}
				echo("<a href=$l2 class=$act>$i</a>");
			}
		}
		$l2=$link.$last;
		echo("<a href=$l2 id=$last>&raquo;</a>");
	echo("</div>");

	if (file_exists($SYS_PLUGINS_DIR."/pager/pager.js")){
		include($SYS_PLUGINS_DIR."/pager/pager.js");
	}
}


?>
