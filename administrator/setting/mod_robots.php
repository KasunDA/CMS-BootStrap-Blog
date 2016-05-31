<?php
if( isset($_GET['idut']) ){
	
$idut = $_GET['idut'];
$robots  = fopen("../../robots.txt","w");	
$mod_robots = $_POST['roob'];
fwrite($robots,$mod_robots);
fclose($robots);
header("Location: ../../administrator/?idut=".$idut."&setting=all_config&mod=ok");		
	
}



?>