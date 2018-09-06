<?php

 #
 # System config
 #
 # info: main folder copyright file
 #
 #


# directory structure
$SYS_CFG_DIR="../config/";
$SYS_CSS_DIR="../css/";
$SYS_LIB_DIR="../lib/";
$SYS_IMG_DIR="../images/";
$SYS_PLUGINS_DIR="../plugins/";
$SYS_CONTENT_DIR="../content/";
$SYS_INCLUDE_DIR="../include/";
$SYS_LOG_DIR="../log/";

$SYS_IMG_FAVICON=$SYS_IMG_DIR."favicon.png";

# meta page parameters (need reconfigured in local config file)
$SYS_META=array("<!DOCTYPE html>",
				"<html lang=\"hu\">",
				"<head>",
				"<meta charset=\"utf-8\">",
				"<meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\">",
				"<title>MiniCMS</title>",
				"<meta name=\"viewport\" content=\"initial-scale=1.0\">",
				"<link rel=\"shortcut icon\" href=\"$SYS_IMG_FAVICON\">",
				"</head>",
				"");



# starter files
$SYS_LOADER_FILE="../public/index.php";
$SYS_PREPARE_FILE="../public/prepare.php";
$SYS_PREPARE_END_FILE="../public/prepare_end.php";


# paramter to start instead of index.php
$SYS_PARAM_FILE="file";


# local system config
$LOCAL_CONFIG=$SYS_CFG_DIR."config.php";
$MAIN_COMMANDER=$SYS_CONTENT_DIR."index.php";
$ADMIN_MAIN_COMMANDER=$SYS_CONTENT_DIR."admin.php";


# system components
$SYS_MAIN_CSS=array();
$SYS_MAIN_JS_BEFORE=array();
$SYS_MAIN_JS_AFTER=array();
$SYS_MAIN_LIB_FILES=array("main.php");


# plugins to load
$SYS_ACTIVE_PLUGINS_BEFORE=array("gdpr","pager","imgslider");
$SYS_ACTIVE_PLUGINS_AFTER=array("");


# log
$SYS_ERROR_LOG=true;
$SYS_ERROR_LOG_FILE="php.log";


# cookies
$SYS_COOKIES_NAME=array();
$SYS_COOKIES_DATA=array();
$SYS_COOKIES_STORED_DATA=array();
$SYS_COOKIES_TIME=array(); 
# seconds ! 1 day = 3600000*24


# mysql connect
$MYSQL_SERVER="localhost";
$MYSQL_PORT="";
$MYSQL_DATABASE="";
$MYSQL_USER="";
$MYSQL_PASSWORD="";


# smtp connect
$SMTP_HOST="ssl://smtp.gmail.com";
$SMTP_SECURE="ssl";
$SMTP_PORT="465";
$SMTP_PORT2="587";
$SMTP_USER="";
$SMTP_PASSWORD="";
$SMTP_FROM="";
$SMTP_DOMAIN="";
$SMTP_TO="";
$PHPMAIL=FALSE;


# site privacy policy (need redecralate in local config file)
$SYS_PRIVACY_POLICY="";


# language (need redecralate in local config file)
$LANGUAGE="";

?>
