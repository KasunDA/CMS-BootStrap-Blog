<?php
require_once('../../connect.php');

function mypath ($pathname , $file) {
$file_include =  $pathname."/".$file;
return $file_include;	
};

$myconn = @mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME) or die("Errore Connessione: <b>" .mysqli_connect_error()."</b>");
@mysqli_query($myconn," SET names 'UTF8' ");
include( mypath( PATH_NAME , "lib.php" ) );

if( isset($_GET['idut']) ){
$idut = $_GET['idut'];

$query =" SELECT * FROM admin WHERE cod_md5='$idut' ";
$result = @mysqli_query($myconn,$query) or die( "Errore....".mysqli_error($myconn) );
$row = mysqli_fetch_array($result);
$nomeuser = $row['nome'];
$cognomeuser = $row['cognome'];
$nomecognomeuser = $nomeuser." ".$cognomeuser;

	
}


$tit_art = addslashes( strtolower( $_POST['titart'] ) );
$alias = alias($tit_art);
$metadesc = addslashes($_POST['metadesc']);
$metakey = addslashes($_POST['metakey']);
$categoria = $_POST['categoria'];
$profile_author = addslashes($_POST['profile_author']);

$sqlcategoria = "select idcategoria from categorie where nome_categoria='$categoria'";
$rscategoria = @mysqli_query($myconn,$sqlcategoria) or die( "Errore....".mysqli_error($myconn) );
$rowcategoria = mysqli_fetch_array($rscategoria);
$idcategoria = $rowcategoria['idcategoria'];

$datacreate = dataAm($_POST['datacreate']);
$author = $nomecognomeuser;

if( !isset($_POST['ck']) ){
$option_article =  "a:7:{i:0;s:3:\"opt\";i:1;s:5:\"click\";i:2;s:7:\"comment\";i:3;s:5:\"title\";i:4;s:6:\"author\";i:5;s:4:\"date\";i:6;s:4:\"link\";}";		
}
else{
$option_article = serialize($_POST['ck']);		
}

$contenuto = addslashes($_POST['contenuto']) ;
$htmlcont = htmlentities($contenuto);
$visibile = $_POST['visibile'];
$data_mod = dataAm($_POST['ultimamod']);
$no = "No";



$insert = " INSERT INTO articoli (
          idcategoria , titart , alias , metadesc , metakey , categoria, datacreate , contart,  visibility, ult_mod , author , profile_author , option_article ,  cestinato , archiviato
	    )
	    VALUES ('$idcategoria' , '$tit_art','$alias','$metadesc','$metakey','$categoria','$datacreate','$htmlcont' , '$visibile' , '$data_mod', '$author', '$profile_author' ,'$option_article', '$no' , '$no')
	    ";
$rs = @mysqli_query($myconn,$insert) or die( "Errore....".mysqli_error($myconn) );



header("Location: ../../administrator/?idut=".$idut."&p_use=all_article");

?>