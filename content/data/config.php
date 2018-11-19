<?php

 #
 # Newsletter - mail adress add and delete
 #
 # info: main folder copyright file
 #
 #

# configuration - need change it

$COPYRIGHT="© 2018. <a href=https://github.com/pphome2/newsletter>NewsLetter</a>";

# need md5 passcode: password
$NL_PASS="5f4dcc3b5aa765d61d8327deb882cf99";

$NL_SITENAME="NewsLetter - example.com";
$NL_SITE_HOME="http://www.example.com";

$NL_PARAM_DATA="mail";

$NL_CFG_DIR=$SYS_CONTENT_DIR;
$NL_CSS_DIR=$SYS_CONTENT_DIR;
$NL_BIN_DIR=$SYS_CONTENT_DIR;
$NL_IMG_DIR=$SYS_CONTENT_DIR;

$NL_CSS=$NL_CSS_DIR."site.css";
$NL_CSS2=$NL_CSS_DIR."site2.css";
$NL_JS_BEGIN="";
$NL_JS_END=$NL_BIN_DIR."js_end.js";
$NL_HEADER=$NL_BIN_DIR."header.php";
$NL_FOOTER=$NL_BIN_DIR."footer.php";

$NL_ADMIN_FILE=$NL_BIN_DIR."admin.php";
$NL_ENTER_FILE=$NL_BIN_DIR."index.php";
$NL_EDIT_FILE=$NL_BIN_DIR."edit.php";
$NL_SELFEDIT_FILE=$NL_BIN_DIR."editx.php";
$NL_PRINT_FILE=$NL_BIN_DIR."print.php";
$NL_SEARCH_FILE=$NL_BIN_DIR."enter.php";
$NL_DATA_FILE=$NL_CFG_DIR."data/nl";
$NL_INFO_FILE=$NL_BIN_DIR."info.html";

$NL_SEPARATE_CHAR="|";
$NL_NEW_CHAR="+";
$NL_DEL_CHAR="-";
$NL_PARAM_DEL="del";
$NL_PARAM_DATA="dat";

$NL_TABLE_COL=3;
$NL_TABLE_PAGEROW=20;

$NL_SEPCHAR="¤";

# sec
$NL_LOGIN_TIMEOUT=600;

# re-decralated from sysconfig.sys
$LANGUAGE=$SYS_CONTENT_DIR."data/lang.hu";
$SYS_PRIVACY_POLICY=$SYS_CONTENT_DIR."privacy.php";


$SYS_META=array("<!DOCTYPE html>",
				"<html lang=\"hu\">",
				"<head>",
				"<meta charset=\"utf-8\">",
				"<meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\">",
				"<title>$NL_SITENAME</title>",
				"<meta name=\"viewport\" content=\"initial-scale=1.0\">",
				"<link rel=\"shortcut icon\" href=\"$SYS_IMG_FAVICON\">",
				"</head>",
				"");


?>
