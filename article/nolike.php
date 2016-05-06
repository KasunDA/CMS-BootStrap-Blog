<?php
if( isset($_GET['al']) && isset($_GET['loc']) ){	
$al = $_GET['al'];
$loc = $_GET['loc'];
$valorecookie = $al."_".$loc;
$array = array();
$like = urldecode($_COOKIE['_like']);	
$array_like = explode("|",$like);

for( $i=0;$i<count($array_like);$i++ ){
	
if( $valorecookie != $array_like[$i]  ){
$array[$i]=$array_like[$i]	;
	
}	
	
}

$valcooki =  implode("|" , $array);

setcookie("_like", $valcooki ,  time() + 24*3600 , "/");
	
}
?>