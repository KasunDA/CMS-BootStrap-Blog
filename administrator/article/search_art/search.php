<?php
define('__ROOT__', dirname( dirname (  dirname ( dirname (__FILE__) )  ) ) ); 
require_once(__ROOT__.'/connect.php');
$myconn = @mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME) or die("Errore Connessione: <b>" .mysqli_connect_error()."</b>");
@mysqli_query($myconn," SET names 'UTF8' ");
include("../../../lib.php");

$idut = $_GET['idut'];
$q = trim($_POST['q']);
$lung_query = strlen($q);

if( $lung_query!=0 ){
$arrquery = array_unique(explode(" ", $q));

if( count($arrquery)!=0 ){
$newquery = implode("+",$arrquery);	
header("Location: ../../../administrator/?idut=".$idut."&p_use=all_article&search=".$newquery);

}
else{
header("Location: ../../../administrator/?idut=".$idut."&p_use=all_article&search=".$q);
}
}
else{
header("Location: ../../../administrator/?idut=".$idut."&p_use=all_article");	
	
}









?>
