<?php
define('__ROOT__', dirname( dirname (  dirname ( dirname (__FILE__) )  ) ) ); 
require_once(__ROOT__.'/connect.php');
$myconn = @mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME) or die("Errore Connessione: <b>" .mysqli_connect_error()."</b>");
@mysqli_query($myconn," SET names 'UTF8' ");


if( isset($_GET['idut']) && isset($_GET['id_comm']) ){
$id_comm = 	$_GET['id_comm']; 
$idut = $_GET['idut'];
$disab = "disabled";

$sql_active_comm = "update comment set st_comment = '$disab' where id_comment = '$id_comm'";
$rs_active_comm = @mysqli_query($myconn,$sql_active_comm) or die( "Errore....".mysqli_error($myconn) );

header("Location: /administrator/?idut=".$idut."&comment");


	
}

?>