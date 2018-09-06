<?php

 #
 # System load
 #
 # info: main folder copyright file
 #
 #


if (file_exists("../config/sysconfig.php")){
    include("../config/sysconfig.php");
    
    if (file_exists($LOCAL_CONFIG)){
		include($LOCAL_CONFIG);
    }

    if ($SYS_ERROR_LOG){
		#ini_set("log_errors", 1);
		error_reporting(E_ALL);
		ini_set('log_errors', TRUE);
		$file=date('Ymd');
		$file=$SYS_LOG_DIR.$file.$SYS_ERROR_LOG_FILE;
		ini_set("error_log", $file);
		#error_log( "Log init done." );
    }

    
    if (file_exists($LANGUAGE)){
		include($LANGUAGE);
    }

	$db=count($SYS_MAIN_CSS);
	if ($db>0){
		for($i=0;$i<$db;$i++){
			$file=$SYS_INCLUDE_DIR.$SYS_MAIN_CSS[$i];
			if (file_exists($file)){
				include($file);
			}
		}
    }

	$db=count($SYS_MAIN_JS_BEFORE);
	if ($db>0){
		for($i=0;$i<$db;$i++){
			$file=$SYS_INCLUDE_DIR.$SYS_MAIN_JS_BEFORE[$i];
			if (file_exists($file)){
				include($file);
			}
		}
    }
    
    $db=count($SYS_ACTIVE_PLUGINS_BEFORE);
	if ($db>0){
		for($i=0;$i<$db;$i++){
			$file=$SYS_PLUGINS_DIR.$SYS_ACTIVE_PLUGINS_BEFORE[$i]."/".$SYS_ACTIVE_PLUGINS_BEFORE[$i].".php";
			if (file_exists($file)){
				include($file);
			}
		}
    }
    

    $db=count($SYS_MAIN_LIB_FILES);
	if ($db>0){
		for($i=0;$i<$db;$i++){
			$file=$SYS_LIB_DIR.$SYS_MAIN_LIB_FILES[$i];
			if (file_exists($file)){
				include($file);
			}
		}
    }
    
    
    main();
    
    if (file_exists($ADMIN_MAIN_COMMANDER)){
		include($ADMIN_MAIN_COMMANDER);
    }


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
    
    main_end();

}else{
    if (file_exists("../public/error.html")){
	include("../public/error.html");
    }else{
        echo("System error. No files found...");
    }
}

?>
