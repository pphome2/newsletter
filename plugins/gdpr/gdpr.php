<?php

$GDPR=true;


function gdpr(){
	global $SYS_PLUGINS_DIR,$SYS_COOKIES_DATA,$SYS_COOKIES_TIME,$SYS_COOKIES_NAME,$SYS_COOKIES_STORED_DATA,$SYS_PRIVACY_POLICY;
	
	include("$SYS_PLUGINS_DIR/gdpr/gdpr.css");

	$GDPR_LANG_OK="Elfogadom";
	$GDPR_LANG_MESSAGE="Az oldal sütiket használ a felhasználói élmény fokozására. Az oldal használatával elfogadja az ";
	$GDPR_LANG_POLICY="Adatvédelmi szabályzatunkat.";
	
	$i=count($SYS_COOKIES_NAME);
	$SYS_COOKIES_NAME[$i]="gdpr";
	$SYS_COOKIES_DATA[$i]="gdprok";
	$SYS_COOKIES_TIME[$i]="100";	# 100 day
	
if (!isset($_COOKIE[$SYS_COOKIES_NAME[$i]])){
		echo("<div id='cookie-bar' class='fixed'>");
		echo("<div id='cookie-disclaimer'>");
		echo("$GDPR_LANG_MESSAGE <a href=$SYS_PRIVACY_POLICY class='cookie-bar-policy''>$GDPR_LANG_POLICY</a>");
		echo("<a href=# class='cookie-bar-enable' id='cookie-stop' ");
		#echo("onclick=JsetCookie($SYS_COOKIES_NAME[$i],$SYS_COOKIES_DATA[$i],$SYS_COOKIES_TIME[$i])");
		echo("onclick=JsetCookie(\"$SYS_COOKIES_NAME[$i]\",\"$SYS_COOKIES_DATA[$i]\",\"$SYS_COOKIES_TIME[$i]\")");
		echo(">$GDPR_LANG_OK</a>");
		echo("</div>");
		echo("</div>");
	}
	
    include($SYS_PLUGINS_DIR."/gdpr/gdpr.js");
}

?>

