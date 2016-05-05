<?php

if( isset($_GET['ch']) ){
$textfile = fopen("limit.txt","w");	
$ch = $_GET['ch'];
fwrite($textfile,$ch);
fclose($textfile);



}
?>