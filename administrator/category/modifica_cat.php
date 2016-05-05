<?php 
require_once('../../connect.php');
$myconn = @mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME) or die("Errore Connessione: <b>" .mysqli_connect_error()."</b>");
@mysqli_query($myconn," SET names 'UTF8' ");


$idut = $_GET['idut'];
$idcat = $_GET['idcat'];


$stato_cat = $_POST['stato_cat'];
$datacreate = $_POST['datacreate'];
$desc_cat = addslashes($_POST['desc_cat']);
$meta_key = addslashes($_POST['meta_key']);
$ultimamod = $_POST['ultimamod'];


if($stato_cat=="disabled"){
$no = "No";
$sqlart = " update articoli set
			       visibility = '$no'
			where idcategoria='$idcat' 
			 ";

$rsart = @mysqli_query($myconn,$sqlart) or die( "Errore....".mysqli_error($myconn) );

$sqlmodcat = " update categorie set
			   stato_cat = '$stato_cat',
			   data_cat = '$datacreate',
			   data_mod_cat = '$ultimamod',
			   descr_cat = '$desc_cat',
			   meta_key = '$meta_key'
			   where idcategoria='$idcat' 
			 ";


$rsmodcat = @mysqli_query($myconn,$sqlmodcat) or die( "Errore....".mysqli_error($myconn) );

header("Location: ../../administrator/?idut=".$idut."&mod_category=".$idcat."&status=true&disabled");	
}
else{
	
$sqlmodcat = " update categorie set
			   stato_cat = '$stato_cat',
			   data_cat = '$datacreate',
			   data_mod_cat = '$ultimamod',
			   descr_cat = '$desc_cat',
			   meta_key = '$meta_key'
			   where idcategoria='$idcat' 
			 ";


$rsmodcat = @mysqli_query($myconn,$sqlmodcat) or die( "Errore....".mysqli_error($myconn) );	
header("Location: ../../administrator/?idut=".$idut."&mod_category=".$idcat."&status=true");		
}








?>