<?php
if( isset($_GET['cat_art_rec']) ){
$art_rec  = fopen("art_rec.txt","w");	
$cat_art_rec = $_GET['cat_art_rec'];
fwrite($art_rec,$cat_art_rec);
fclose($art_rec);
}


?>