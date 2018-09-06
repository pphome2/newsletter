<?php


$IMGSLIDER=true;

function imgsliderload(){
	global $SYS_PLUGINS_DIR;
	
	include("$SYS_PLUGINS_DIR"."imgslider/imgslider.css");
}

function imgsliderend(){
	global $SYS_PLUGINS_DIR;
	
    include($SYS_PLUGINS_DIR."/imgslider/imgslider.js");
}



function imgautoslider($img){
	echo("<div class=im-box>");
	$db=count($img);
	for($i=0;$i<$db;$i++){
		echo("<img class=im-myAutoSlides src=\"$img[$i]\">");
	}
	echo("</div>");
}




function imgslider($img){
	echo("<div class=im-littlebox>");
	$db=count($img);
	for($i=0;$i<$db;$i++){
		echo("<img class=im-mySlides src=\"$img[$i]\">");
	}
    echo("<div class=\"im-bottomleft\" onclick=\"plusDivs(-1)\"><span class=\"im-bottomleftmenu\"></span></div>");
    echo("<div class=\"im-bottomright\" onclick=\"plusDivs(1)\"><span class=\"im-bottomrightmenu\"></span></div>");
    echo("<div class=\"im-bottomcenter\">");
    
	for($i=0;$i<$db;$i++){
		$k=$i+1;
		echo("<span class=\"im-badge im-badge-nolight\" onclick=\"currentDiv($k)\">|</span>");
	}
	echo("</div>");
	echo("</div>");
}


?>
