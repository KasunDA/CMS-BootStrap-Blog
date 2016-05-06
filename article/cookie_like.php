<?php
if( isset($_GET['al']) && isset($_GET['loc'])){
$al = $_GET['al']; $loc = $_GET['loc'];

if( !isset($_COOKIE['_like']) ){
setcookie ("_like", $al."_".$loc , time() + 24*3600 , "/");		
}
else{
$like =  $_COOKIE['_like'];
$like.="|".$al."_".$loc;
setcookie ("_like", $like , time() + 24*3600 , "/");	
}
echo "<i class=\"fa fa-heart-o fa-lg\"></i>";

}

?>