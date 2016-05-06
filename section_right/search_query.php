<?php
require_once('../connect.php');
$myconn = @mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME) or die("Errore Connessione: <b>" .mysqli_connect_error()."</b>");
@mysqli_query($myconn," SET names 'UTF8' ");
$query = trim($_POST['query']);

$lung_query = strlen($query);

if( $lung_query!=0 ){	

$arrquery = array_unique(explode(" ", $query));

if( count($arrquery)!=0 ){
$newquery = implode("+",$arrquery);	
header("Location: /search/".$newquery);
}
else{
header("Location: /search/".$query);	
}
}
else{
header("Location: /");		
	
}

?>