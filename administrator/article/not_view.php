<?php
define('__ROOT__', dirname( dirname (  dirname ( __FILE__ )  ) ) ); 
require_once(__ROOT__.'/connect.php');

$myconn = @mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME) or die("Errore Connessione: <b>" .mysqli_connect_error()."</b>");
@mysqli_query($myconn," SET names 'UTF8' ");
$idut = $_GET['idut'];
$p_use = $_GET['p_use'];


if( isset($_GET['idart']) ){
	
$idart =  $_GET['idart'];
$si = "Si";
$no="No";
$enabled="enabled";

$query = " select idcategoria from articoli where idart='$idart' ";
$rs_query = @mysqli_query($myconn,$query) or die( "Errore....".mysqli_error($myconn) );
$row_query = mysqli_fetch_array($rs_query);
$idcategoria = $row_query['idcategoria'];


$sqlview = " update articoli set visibility = '$si' where idart ='$idart' ";
$rs_view = @mysqli_query($myconn,$sqlview) or die( "Errore....".mysqli_error($myconn) );

$sql_not_cest = " update articoli set cestinato = '$no' where idart ='$idart' ";
$rs_not_cest = @mysqli_query($myconn,$sql_not_cest) or die( "Errore....".mysqli_error($myconn) );



$sqlcat = " update categorie set stato_cat = '$enabled' where idcategoria = '$idcategoria' ";
$rscat= @mysqli_query($myconn,$sqlcat) or die( "Errore....".mysqli_error($myconn) );

    
}


if( isset($_GET['p']) ){
$p=$_GET['p'];

if( isset($_GET['st']) || isset($_GET['ct']) || isset($_GET['dt']) || isset($_GET['search']) || isset($_GET['nm_arch']) ){

if( isset($_GET['st']) ){
$st=$_GET['st'];	
header("Location: ../../administrator/?idut=".$idut."&p_use=".$p_use."&st=".$st."&p=".$p);	

}

if( isset($_GET['ct']) ){
$ct=$_GET['ct'];	
header("Location: ../../administrator/?idut=".$idut."&p_use=".$p_use."&ct=".$ct."&p=".$p);	

}

if( isset($_GET['dt']) ){
$dt=$_GET['dt'];	
header("Location: ../../administrator/?idut=".$idut."&p_use=".$p_use."&dt=".$dt."&p=".$p);	

}

if( isset($_GET['search']) ){
$search=$_GET['search'];	
header("Location: ../../administrator/?idut=".$idut."&p_use=".$p_use."&search=".$search."&p=".$p);	
}

if( isset($_GET['nm_arch']) ){
$nm_arch = $_GET['nm_arch'];	
header("Location: ../../administrator/?idut=".$idut."&p_use=".$p_use."&nm_arch=".$nm_arch."&p=".$p);	
}

}
else{
header("Location: ../../administrator/?idut=".$idut."&p_use=".$p_use."&p=".$p);		
}
	
}
else{
if( isset($_GET['st']) || isset($_GET['ct']) || isset($_GET['dt']) || isset($_GET['search']) || isset($_GET['nm_arch']) ){

if( isset($_GET['st']) ){
$st=$_GET['st'];	
header("Location: ../../administrator/?idut=".$idut."&p_use=".$p_use."&st=".$st);	
}

if( isset($_GET['ct']) ){
$ct=$_GET['ct'];	
header("Location: ../../administrator/?idut=".$idut."&p_use=".$p_use."&ct=".$ct);	
}

if( isset($_GET['dt']) ){
$dt=$_GET['dt'];	
header("Location: ../../administrator/?idut=".$idut."&p_use=".$p_use."&dt=".$dt);	
}

if( isset($_GET['search']) ){
$search=$_GET['search'];	
header("Location: ../../administrator/?idut=".$idut."&p_use=".$p_use."&search=".$search);	
}	

if( isset($_GET['nm_arch']) ){
$nm_arch = $_GET['nm_arch'];	
header("Location: ../../administrator/?idut=".$idut."&p_use=".$p_use."&nm_arch=".$nm_arch);	
}

}

else{
header("Location: ../../administrator/?idut=".$idut."&p_use=".$p_use);		
}	
	
}
?>