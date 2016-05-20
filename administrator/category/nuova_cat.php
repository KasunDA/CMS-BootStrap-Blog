<?php
require_once('../../connect.php');

function mypath ($pathname , $file) {
$file_include =  $pathname."/".$file;
return $file_include;	
};

$myconn = @mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME) or die("Errore Connessione: <b>" .mysqli_connect_error()."</b>");
@mysqli_query($myconn," SET names 'UTF8' ");
include( mypath( PATH_NAME , "lib.php" ) );

$idut =  $_GET['idut'];
$nome_cat = addslashes( strtolower( $_POST['nome_cat'] ) );
$aliascat = alias($nome_cat);
$stato_cat = $_POST['stato_cat'];
$datacreate = $_POST['datacreate'];
$desc_cat = addslashes($_POST['desc_cat']);
$meta_key = addslashes($_POST['meta_key']);
$ultimamod = $_POST['ultimamod'];

if( !ver_alias($aliascat,$myconn) ){
header("Location: ../../administrator/?idut=".$idut."&new_category=ver_alias");
exit;
}

	
$sqlvern = "SELECT nome_categoria FROM categorie ";
$rsvern = @mysqli_query($myconn,$sqlvern) or die( "Errore....".mysqli_error($myconn) );

while($rowvern = mysqli_fetch_array($rsvern)){
$nome_categoria = $rowvern['nome_categoria']	;

if($nome_categoria==$nome_cat){
header("Location: ../../administrator/?idut=".$idut."&new_category=exist");
exit;		
}
}	

$insert = " INSERT INTO categorie (nome_categoria , alias_categoria ,data_cat , data_mod_cat , descr_cat , meta_key , stato_cat)
	        VALUES ('$nome_cat','$aliascat','$datacreate','$ultimamod','$desc_cat', '$meta_key' ,'$stato_cat')
	    ";
$rs = @mysqli_query($myconn,$insert) or die( "Errore....".mysqli_error($myconn) );

header("Location: ../../administrator/?idut=".$idut."&category=all");	
















?>