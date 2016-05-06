<?php
$data = date("d/m/Y");
$ora = date("H:i:s");
$ip = $_SERVER['REMOTE_ADDR'];

if( isset($_GET['p_use']) ){
$p_use = $_GET['p_use'];

if($p_use!="archivie"){
	
if( !isset($_GET['alias_art']) ){
	
$textfile = fopen("click.txt", "a");
$dati_riga = "$p_use|$data|$ora|$ip\n";
fwrite($textfile,$dati_riga);
fclose($textfile);
	
header("Location: /".$p_use.".html");
	
}	
else{
$alias_art = $_GET['alias_art'];

$textfile = fopen("click.txt", "a");
$dati_riga = "$alias_art|$data|$ora|$ip\n";
fwrite($textfile,$dati_riga);
fclose($textfile);

header("Location: /".$p_use."/".$alias_art.".html");	
	
}	
	
}
else{
if( isset($_GET['t_arch']) && isset($_GET['art_arch']) ){
$t_arch = $_GET['t_arch'];		
$art_arch = $_GET['art_arch'];
}

$textfile = fopen("click.txt", "a");
$dati_riga = "$art_arch|$data|$ora|$ip\n";
fwrite($textfile,$dati_riga);
fclose($textfile);


header("Location: /".$p_use."/".$t_arch."/".$art_arch.".htm");	
	
}	



}




?>