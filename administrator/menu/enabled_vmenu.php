<?php
require_once('../../connect.php');
$myconn = @mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME) or die("Errore Connessione: <b>" .mysqli_connect_error()."</b>");
@mysqli_query($myconn," SET names 'UTF8' ");


if( isset($_GET['id_vmenu']) ){
$id_vmenu =	$_GET['id_vmenu'];
$enabled = "enabled";

$updatevmenu = " update voci_menu set  
                 stato_voce_menu = '$enabled'
				 where id_voce_menu = '$id_vmenu'
                 ";

$rsupdatevmenu = @mysqli_query($myconn,$updatevmenu) or die( "Errore....".mysqli_error($myconn) );
	

}



?>