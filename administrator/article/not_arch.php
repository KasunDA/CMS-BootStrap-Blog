<?php
require_once('../../connect.php');

function mypath ($pathname , $file) {
$file_include =  $pathname."/".$file;
return $file_include;	
};

$myconn = @mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME) or die("Errore Connessione: <b>" .mysqli_connect_error()."</b>");
@mysqli_query($myconn," SET names 'UTF8' ");
include( mypath( PATH_NAME , "lib.php" ) );

$idut = $_GET['idut'];
$p_use = $_GET['p_use'];

if( isset($_GET['idart']) ){
$idart =  $_GET['idart'];
$no = "No";

$sqlarch = " update articoli set archiviato = '$no' where idart ='$idart' ";
$rs_arch = @mysqli_query($myconn,$sqlarch) or die( "Errore....".mysqli_error($myconn) );

$sqlcreaarch = "select * from articoli where idart='$idart'";
$rscreaarch =  @mysqli_query($myconn,$sqlcreaarch) or die( "Errore....".mysqli_error($myconn) );
$rowcreaarch = mysqli_fetch_array($rscreaarch);
$idarticolo = $rowcreaarch['idart'];
$datacreate = $rowcreaarch['datacreate'];
$arraydata = explode("-",$datacreate);
$mese = $arraydata[1];$anno = $arraydata[0];
$nome_archivio = arch($mese,$anno);

$scrollarch = "select * from archivio";
$rsscrollarch = @mysqli_query($myconn,$scrollarch) or die( "Errore....".mysqli_error($myconn) );
$num_arch = $rsscrollarch->num_rows;

if($num_arch!=0){

$selectarch = "select * from archivio where nome_archivio='$nome_archivio'";
$rsselectarch = @mysqli_query($myconn,$selectarch) or die( "Errore....".mysqli_error($myconn) );
$num_row_archivio = $rsselectarch->num_rows;

if( $num_row_archivio!=0 ){
	
$rowselectarch = mysqli_fetch_array($rsselectarch);
$artarchiviati = unserialize($rowselectarch['art_archiviati']);


for( $j=0;$j<count($artarchiviati);$j++){
if($artarchiviati[$j]==$idart){
unset($artarchiviati[$j]);	
}		
}

if( count($artarchiviati)!=0 ){
rsort($artarchiviati);	
$new_artarchiviati=NULL;
foreach($artarchiviati as $chiave => $valore){
$new_artarchiviati[$chiave]=$valore;
}
	
$serarticoli_arch = serialize($new_artarchiviati);
$updateidart = "update archivio set art_archiviati='$serarticoli_arch' where nome_archivio='$nome_archivio'";
$rsupdateidart = @mysqli_query($myconn,$updateidart) or die( "Errore....".mysqli_error($myconn) );	
}
elseif( count($artarchiviati)==0 ){	
$delarch = " DELETE FROM archivio WHERE nome_archivio='$nome_archivio' ";
$rsdelarch = @mysqli_query($myconn,$delarch) or die( "Errore....".mysqli_error($myconn) );	

$narch =" SELECT * FROM archivio ";
$rsnarch = @mysqli_query($myconn,$narch) or die( "Errore....".mysqli_error($myconn) );
$rwnarch = $rsnarch->num_rows;

if($rwnarch==0){
$sqltruncatearch = "TRUNCATE TABLE archivio";
$rstruncatearch = @mysqli_query($myconn,$sqltruncatearch) or die( "Errore....".mysqli_error($myconn) );
}

}

}		
}
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
$search = $_GET['search'];
header("Location: ../../administrator/?idut=".$idut."&p_use=".$p_use."&search=".$search."&p=".$p);		
}

if( isset($_GET['nm_arch']) ){
$nm_arch = $_GET['nm_arch'];

$queryarch = "select * from archivio where nome_archivio='$nome_archivio'";
$rsqueryarch = @mysqli_query($myconn,$queryarch) or die( "Errore....".mysqli_error($myconn) );
$rowqueryarch = $rsqueryarch->num_rows;

if($rowqueryarch!=0){
header("Location: ../../administrator/?idut=".$idut."&p_use=".$p_use."&nm_arch=".$nm_arch."&p=".$p);		
}
else{
header("Location: ../../administrator/?idut=".$idut."&p_use=".$p_use);		
}
	
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
$search = $_GET['search'];
header("Location: ../../administrator/?idut=".$idut."&p_use=".$p_use."&search=".$search);		
}

if( isset($_GET['nm_arch']) ){
$nm_arch = $_GET['nm_arch'];
$queryarch = "select * from archivio where nome_archivio='$nome_archivio'";
$rsqueryarch = @mysqli_query($myconn,$queryarch) or die( "Errore....".mysqli_error($myconn) );
$rowqueryarch = $rsqueryarch->num_rows;

if($rowqueryarch!=0){
header("Location: ../../administrator/?idut=".$idut."&p_use=".$p_use."&nm_arch=".$nm_arch);		
}
else{
header("Location: ../../administrator/?idut=".$idut."&p_use=".$p_use);		
}
}

}	

else{
header("Location: ../../administrator/?idut=".$idut."&p_use=".$p_use);		
}	
	
}


?>