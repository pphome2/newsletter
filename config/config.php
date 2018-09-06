<?php

 #
 # Load local application config file
 #
 # info: main folder copyright file
 #
 #

# configuration - need change it

$cfgfile=$SYS_CONTENT_DIR."config.php";
if (file_exists($cfgfile)){
    include($cfgfile);
}

?>
