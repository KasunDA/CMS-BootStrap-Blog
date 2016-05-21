<?php
define('__ROOT__', dirname( dirname (  dirname ( __FILE__ )  ) ) ); 
require_once(__ROOT__.'/connect.php');

$myconn = @mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME) or die("Errore Connessione: <b>" .mysqli_connect_error()."</b>");
@mysqli_query($myconn," SET names 'UTF8' ");

$idut = $_GET['idut'];
$idcat = $_GET['idcat'];
$enable = "enabled";

$sqlcat = " update categorie set
			       stato_cat = '$enable'
			where  idcategoria='$idcat' 
			";
$rscat = @mysqli_query($myconn,$sqlcat) or die( "Errore....".mysqli_error($myconn) );


if( isset($_GET['p']) ){
$p= $_GET['p'];

if( isset($_GET['stct']) || isset($_GET['search']) || isset($_GET['datct']) ){
if( isset($_GET['stct']) ){	
$stct = $_GET['stct'];
header("Location: ../../administrator/?idut=".$idut."&category=all&stct=".$stct."&p=".$p);		
}
if( isset($_GET['search']) ){
$search = 	$_GET['search'];
header("Location: ../../administrator/?idut=".$idut."&category=all&search=".$search."&p=".$p);		
}
if( isset($_GET['datct']) ){
$datct = $_GET['datct'];
header("Location: ../../administrator/?idut=".$idut."&category=all&datct=".$datct."&p=".$p);		
}
}

else{
header("Location: ../../administrator/?idut=".$idut."&category=all&p=".$p);		
}

}
else{
	
if( isset($_GET['stct']) || isset($_GET['search']) || isset($_GET['datct']) ){
if( isset($_GET['stct']) ){	
$stct = $_GET['stct'];
header("Location: ../../administrator/?idut=".$idut."&category=all&stct=".$stct);		
}
if( isset($_GET['search']) ){
$search = 	$_GET['search'];
header("Location: ../../administrator/?idut=".$idut."&category=all&search=".$search);		
}
if( isset($_GET['datct']) ){
$datct = $_GET['datct'];
header("Location: ../../administrator/?idut=".$idut."&category=all&datct=".$datct);		
}
}

else{
header("Location: ../../administrator/?idut=".$idut."&category=all");		
}	
	
}









?>