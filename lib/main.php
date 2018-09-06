<?php

 #
 # System main prebuild
 #
 # info: main folder copyright file
 #
 #



# build site

$db=count($SYS_COOKIES_NAME);
for ($i=0;$i<$db;$i++){
	$SYS_COOKIES_STORED_DATA[$i]=get_cookie($SYS_COOKIES_NAME[$i]);
}








# end of build site
# ---------------------------------------


function main(){
	global $SYS_META;
	
	$db=count($SYS_META);
	for ($i=0;$i<$db;$i++){
		echo($SYS_META[$i]."\n");
	}
	echo("<html><body>\n");
}

function main_end(){
	echo("</body></html>");
}



# cookie support

function set_all_cookie(){
	global $SYS_COOKIES_DATA,$SYS_COOKIES_NAME,$SYS_COOKIES_TIME;
	
	$db=count($SYS_COOKIES_NAME);
	for ($i=0;$i<$db;$i++){
		if ($SYS_COOKIES_DATA[$i]<>""){
			set_cookie($SYS_COOKIES_NAME[$i],$SYS_COOKIES_DATA[$i],$SYS_COOKIES_TIME[$i]);
		}else{
			del_cookie($SYS_COOKIES_NAME[$i]);
		}
	}
}



function set_cookie($name,$data,$min){
	setcookie($name,$data,time()+$min,"/");
}



function get_cookie($name){
	$ret="";
	if (isset($_COOKIE[$name])){
		$ret=$_COOKIE[$name];
	}
	return($ret);
}



function del_cookie($name){
	if (isset($_COOKIE[$name])){
		unset($_COOKIE[$name]);
	}
	setcookie($name,"",time()-10,"/");
}



?>
