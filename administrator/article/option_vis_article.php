<?php
define('__ROOT__', dirname( dirname (  dirname ( __FILE__ )  ) ) ); 
require_once(__ROOT__.'/connect.php');

$myconn = @mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME) or die("Errore Connessione: <b>" .mysqli_connect_error()."</b>");
@mysqli_query($myconn," SET names 'UTF8' ");

if( isset($_GET['opt_art']) && isset($_GET['idut']) ){
$opt_art = 	$_GET['opt_art']; $idut=$_GET['idut'];

if( !isset($_POST['ck']) ){
$ck = "a:7:{i:0;s:3:\"opt\";i:1;s:5:\"click\";i:2;s:7:\"comment\";i:3;s:5:\"title\";i:4;s:6:\"author\";i:5;s:4:\"date\";i:6;s:4:\"link\";}";	
$sqloptart = " update articoli set option_article='$ck' where idart='$opt_art' ";
$rsoptart = @mysqli_query($myconn,$sqloptart) or die( "Errore....".mysqli_error($myconn) );
header("Location: ../../administrator/?idut=".$idut."&mod_art=".$opt_art);
	
}
else{
	
$ck = serialize($_POST['ck']);
$sqloptart = " update articoli set option_article='$ck' where idart='$opt_art' ";
$rsoptart = @mysqli_query($myconn,$sqloptart) or die( "Errore....".mysqli_error($myconn) );
header("Location: ../../administrator/?idut=".$idut."&mod_art=".$opt_art);	
	
}











	
}



?>