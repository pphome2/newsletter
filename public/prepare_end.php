<?php

 #
 # System load
 #
 # info: main folder copyright file
 #
 #



main_end();

$db=count($SYS_ACTIVE_PLUGINS_AFTER);
if ($db>0){
    for($i=0;$i<$db;$i++){
	$file=$SYS_PLUGINS_DIR.$SYS_ACTIVE_PLUGINS_AFTER[$i]."/".$SYS_ACTIVE_PLUGINS_AFTER[$i].".php";
        if (file_exists($file)){
    	include($file);
	}
    }
}


$db=count($SYS_MAIN_JS_AFTER);
if ($db>0){
	for($i=0;$i<$db;$i++){
		$file=$SYS_INCLUDE_DIR.$SYS_MAIN_JS_AFTER[$i];
		if (file_exists($file)){
			include($file);
		}
	}
}

?>
