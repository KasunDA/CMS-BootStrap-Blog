<?php
require_once('../../../connect.php');
function mypath ($pathname , $file) {
$file_include =  $pathname."/".$file;
return $file_include;	
};

$myconn = @mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME) or die("Errore Connessione: <b>" .mysqli_connect_error()."</b>");
@mysqli_query($myconn," SET names 'UTF8' ");

include( mypath( PATH_NAME , "lib.php" ) );

$idut = $_GET['idut'];
$q = $_POST['q'];

$idut = $_GET['idut'];
$q = trim($_POST['q']);
$lung_query = strlen($q);

if( $lung_query!=0 ){
$arrquery = array_unique(explode(" ", $q));

if( count($arrquery)!=0 ){
$newquery = implode("+",$arrquery);	
header("Location: ../../../administrator/?idut=".$idut."&category=all&search=".$newquery);

}
else{
header("Location: ../../../administrator/?idut=".$idut."&category=all&search=".$q);
}
}
else{
header("Location: ../../../administrator/?idut=".$idut."&category=all");	
	
}




?>
