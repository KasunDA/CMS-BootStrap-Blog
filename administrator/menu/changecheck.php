<?php
require_once('../../connect.php');
$myconn = @mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME) or die("Errore Connessione: <b>" .mysqli_connect_error()."</b>");
@mysqli_query($myconn," SET names 'UTF8' ");


if( isset($_GET['idut']) && 
       isset($_GET['tmenu']) && 
	     isset($_GET['vmenu']) ){
	
$idut = $_GET['idut'];
$tmenu = $_GET['tmenu'];
$vmenu = $_GET['vmenu'];
$enab = "enabled";
$disab = "disabled";
$si = "si";

$sql = "select stato_voce_menu, home from voci_menu where nome_voce_menu='$vmenu'";
$rs = @mysqli_query($myconn,$sql) or die( "Errore....".mysqli_error($myconn) );
$row =  mysqli_fetch_array($rs);
$stato = $row['stato_voce_menu'];
$home = $row['home'];

if($stato=="enabled"){
	
if( $home==$si ){
header("Location: ../../administrator/?idut=".$idut."&menu=".$tmenu."&error=_h");		
exit;	
}
	
$sqlchangecheck = "update voci_menu set stato_voce_menu = '$disab' where nome_voce_menu = '$vmenu' ";
$rschangecheck = @mysqli_query($myconn,$sqlchangecheck) or die( "Errore....".mysqli_error($myconn) );	
}

if( $stato == "disabled" ){
	
$sqlchangecheck = "update voci_menu set stato_voce_menu = '$enab' where nome_voce_menu = '$vmenu' ";
$rschangecheck = @mysqli_query($myconn,$sqlchangecheck) or die( "Errore....".mysqli_error($myconn) );		
	
}









header("Location: ../../administrator/?idut=".$idut."&menu=".$tmenu);	




	
}


?>