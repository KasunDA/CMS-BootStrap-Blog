<?php
define('__ROOT__', dirname( dirname (  dirname ( __FILE__  )  ) ) ); 
require_once(__ROOT__.'/connect.php');

$myconn = @mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME) or die("Errore Connessione: <b>" .mysqli_connect_error()."</b>");
@mysqli_query($myconn," SET names 'UTF8' ");


if( isset($_GET['idut']) && 
     isset($_GET['idmenu']) && 
	   isset($_GET['tmenu']) && 
	     isset($_GET['vmenu']) ){
	
$idut = $_GET['idut'];
$idmenu = $_GET['idmenu'];
$tmenu = $_GET['tmenu'];
$vmenu = $_GET['vmenu'];
$si = "si";
$no = "no";
$enab = "enabled";

$verifhome = "  ";




$sqlchangehome = "update voci_menu set home = '$si' , stato_voce_menu = '$enab' where id_menu = '$idmenu' and nome_voce_menu = '$vmenu' ";
$rschangehome = @mysqli_query($myconn,$sqlchangehome) or die( "Errore....".mysqli_error($myconn) );

$sqlnohome = "update voci_menu set home = '$no' where id_menu = '$idmenu' and nome_voce_menu != '$vmenu' ";
$rsnohome = @mysqli_query($myconn,$sqlnohome) or die( "Errore....".mysqli_error($myconn) );




header("Location: ../../administrator/?idut=".$idut."&menu=".$tmenu);	




	
}
?>