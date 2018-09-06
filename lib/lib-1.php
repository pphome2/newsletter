<?php

 #
 # MiniCMS
 #
 # info: main folder copyright file
 #
 #



function id(){
	$idcode="";

	$idcode=date('YmdHis').strval(rand(1000,9999));
	return($idcode);
}


function date_id(){
	$idcode="";

	$idcode=date('Ymd');
	return($idcode);
}


function date_time_id(){
	$idcode="";

	$idcode=date('Y.m.d H.i');
	return($idcode);
}


function id_to_date($d){
	if ($d<>""){
		$out=substr($d,0,4).".".substr($d,4,2).".".substr($d,6,2).". ";
		$out=$out.substr($d,8,2).":".substr($d,10,2).".".substr($d,12,2)." - ";
		$out=$out.substr($d,14,4);
	}else{
		$out="";
	}
	return($out);
}


function id_to_onlydate($d){
	if ($d<>""){
		$out=substr($d,0,4).".".substr($d,4,2).".".substr($d,6,2).". ";
		$out=$out.substr($d,8,2).":".substr($d,10,2);
	}else{
		$out="";
	}
	return($out);
}



function valid_input($data) {
  $data=trim($data);
  $data=stripslashes($data);
  $data=htmlspecialchars($data);
  return($data);
}



function form_protect(&$a1,&$a2,&$a3){
	$ret=FALSE;
	if (($a1+$a2)==$a3){
		$ret=TRUE;
	}
	$a1=rand(0,20);
	$a2=rand(0,20);
	$a3=$a1+$a2;
	return($ret);
}




function save_file($name,$data){
	$ret=FALSE;
	if ($name<>""){
		if (file_exists($name)){
			rename($name,$name.".old");
		}
        $file=fopen($name,"x+");
        if (is_array($data)){
			$db=count($data);
			for($i=0;$i<$db;$i++){
				fwrite($file, $data[$i]);
				fwrite($file, "\n");
			}
		}else{
			fwrite($file, $data);
		}
        fclose($file);
        $ret=TRUE;
	}
	return($ret);
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
