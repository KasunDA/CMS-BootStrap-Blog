<?php
require_once('../../connect.php');
$myconn = @mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME) or die("Errore Connessione: <b>" .mysqli_connect_error()."</b>");
@mysqli_query($myconn," SET names 'UTF8' ");




if( isset($_GET['i']) ){
$i=	$_GET['i'];

$sqlvmenu=" SELECT * FROM menu ";
$rssqlvmenu = @mysqli_query($myconn,$sqlvmenu) or die( "Errore....".mysqli_error($myconn) );
$rowsqlvmenu = mysqli_fetch_array($rssqlvmenu);
$vmenu = unserialize($rowsqlvmenu['voci_menu']);
$urlvmenu = unserialize($rowsqlvmenu['url_voci_menu']);

echo $vmenu[$i]."|".$urlvmenu[$i];





	
	
}




?>