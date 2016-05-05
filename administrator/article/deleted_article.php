<?php
require_once('../../connect.php');
$myconn = @mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME) or die("Errore Connessione: <b>" .mysqli_connect_error()."</b>");
@mysqli_query($myconn," SET names 'UTF8' ");
include("../../lib.php");


if(isset($_GET['idart']) && isset($_GET['idut'])){
$idart = $_GET['idart'];	
$idut = $_GET['idut'];	

$sqlarticolo = "SELECT * FROM articoli WHERE idart='$idart' ";
$rsarticolo = @mysqli_query($myconn,$sqlarticolo) or die( "Errore....".mysqli_error($myconn) );
$rowarticolo = mysqli_fetch_array($rsarticolo);
$archiviato = $rowarticolo['archiviato'];
$datacreate = $rowarticolo['datacreate'];
$arraydata = explode("-",$datacreate);
$mese = $arraydata[1];$anno = $arraydata[0];
$nome_archivio = arch($mese,$anno);

if($archiviato=="Si"){
$sqlarchivio = "SELECT * FROM archivio WHERE nome_archivio = '$nome_archivio' ";
$rsarchivio = @mysqli_query($myconn,$sqlarchivio) or die( "Errore....".mysqli_error($myconn) );
$rowarchivio= mysqli_fetch_array($rsarchivio);
$art_archiviati = unserialize($rowarchivio['art_archiviati']);

for( $j=0;$j<count($art_archiviati);$j++){
if($art_archiviati[$j]==$idart){
unset($art_archiviati[$j]);	
}		
}


if(count($art_archiviati)!=0){
rsort($art_archiviati);	
$new_artarchiviati=NULL;
foreach($art_archiviati as $chiave => $valore){
$new_artarchiviati[$chiave]=$valore;
}	

$serarticoli_arch = serialize($new_artarchiviati);
$updateidart = "update archivio set art_archiviati='$serarticoli_arch' where nome_archivio='$nome_archivio'";
$rsupdateidart = @mysqli_query($myconn,$updateidart) or die( "Errore....".mysqli_error($myconn) );	

$delart = " DELETE FROM articoli WHERE idart='$idart' ";
$rsdelart = @mysqli_query($myconn,$delart) or die( "Errore....".mysqli_error($myconn) );	

echo "<p>Articolo Eliminato</p>
      <p class=\"text-right\">
	  <button class=\"btn btn-default conf reload\" style=\"font-size:12px;\">Chiudi</button>
	  </p>";

}
elseif(count($art_archiviati)==0){
$delarch = " DELETE FROM archivio WHERE nome_archivio='$nome_archivio' ";
$rsdelarch = @mysqli_query($myconn,$delarch) or die( "Errore....".mysqli_error($myconn) );		

$delart = " DELETE FROM articoli WHERE idart='$idart' ";
$rsdelart = @mysqli_query($myconn,$delart) or die( "Errore....".mysqli_error($myconn) );	

$nart =" SELECT * FROM articoli ";
$rsnart = @mysqli_query($myconn,$nart) or die( "Errore....".mysqli_error($myconn) );
$rwnart = $rsnart->num_rows;

if($rwnart==0){
$sqltruncate = "TRUNCATE TABLE articoli";
$rstruncate = @mysqli_query($myconn,$sqltruncate) or die( "Errore....".mysqli_error($myconn) );
}

echo "<p>Articolo Eliminato</p>
      <p class=\"text-right\">
	  <button class=\"btn btn-default conf reload\" style=\"font-size:12px;\">Chiudi</button>
	  </p>";
}	

	
}
else{
$delart = " DELETE FROM articoli WHERE idart='$idart' ";
$rsdelart = @mysqli_query($myconn,$delart) or die( "Errore....".mysqli_error($myconn) );	

$nart =" SELECT * FROM articoli ";
$rsnart = @mysqli_query($myconn,$nart) or die( "Errore....".mysqli_error($myconn) );
$rwnart = $rsnart->num_rows;

if($rwnart==0){
$sqltruncate = "TRUNCATE TABLE articoli";
$rstruncate = @mysqli_query($myconn,$sqltruncate) or die( "Errore....".mysqli_error($myconn) );
}


echo "<p>Articolo Eliminato</p>
      <p class=\"text-right\">
	  <button class=\"btn btn-default conf reload\" style=\"font-size:12px;\">Chiudi</button>
	  </p>";
	
}

}



?>