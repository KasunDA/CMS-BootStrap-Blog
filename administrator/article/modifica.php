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

if( isset($_GET['mod_art']) ){
$mod_art = $_GET['mod_art'];

$queryarticle = "select * from articoli where idart='$mod_art'";
$rsqueryarticle = @mysqli_query($myconn,$queryarticle) or die( "Errore....".mysqli_error($myconn) );
$rowqueryarticle = mysqli_fetch_array($rsqueryarticle);
$archiviato = $rowqueryarticle['archiviato'];
$dtcr = $rowqueryarticle['datacreate'];

$tit_art = addslashes( strtolower($_POST['titart']) );
$alias = alias($tit_art);
$metadesc = addslashes($_POST['metadesc']);
$metakey = addslashes($_POST['metakey']);
$categoria = $_POST['categoria'];
$datacreate = dataAm($_POST['datacreate']);
$author = addslashes($_POST['author']);
$profile_author = addslashes($_POST['profile_author']);
$contenuto = addslashes(trim($_POST['contenuto'])) ;
$htmlcont = htmlentities($contenuto);
$visibile = $_POST['visibile'];
$data_mod = dataAm($_POST['ultimamod']);
$enabled = "enabled";


/*IF*/
if( $archiviato=="Si" && $dtcr!=$datacreate ){

$arraydtcr = explode("-",$dtcr);
$nmarch = arch($arraydtcr[1],$arraydtcr[0]);	

$selectarch = "select * from archivio where nome_archivio='$nmarch'";
$rsselectarch = @mysqli_query($myconn,$selectarch) or die( "Errore....".mysqli_error($myconn) );
$rowselectarch = mysqli_fetch_array($rsselectarch);
$artarchiviati = unserialize($rowselectarch['art_archiviati']);

for( $j=0;$j<count($artarchiviati);$j++){
if($artarchiviati[$j]==$mod_art){
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
$updateidart = "update archivio set art_archiviati='$serarticoli_arch' where nome_archivio='$nmarch'";
$rsupdateidart = @mysqli_query($myconn,$updateidart) or die( "Errore....".mysqli_error($myconn) );	
}
elseif( count($artarchiviati)==0 ){	
$delarch = " DELETE FROM archivio WHERE nome_archivio='$nmarch' ";
$rsdelarch = @mysqli_query($myconn,$delarch) or die( "Errore....".mysqli_error($myconn) );	

$narch =" SELECT * FROM archivio ";
$rsnarch = @mysqli_query($myconn,$narch) or die( "Errore....".mysqli_error($myconn) );
$rwnarch = $rsnarch->num_rows;

if($rwnarch==0){
$sqltruncatearch = "TRUNCATE TABLE archivio";
$rstruncatearch = @mysqli_query($myconn,$sqltruncatearch) or die( "Errore....".mysqli_error($myconn) );
}

}	

$sqlnoarch = "update articoli set archiviato='No' where idart='$mod_art'";
$rssqlnoarch =  @mysqli_query($myconn,$sqlnoarch) or die( "Errore....".mysqli_error($myconn) );

}
/*IF*/
$sqlcat = "select idcategoria from categorie where nome_categoria='$categoria'";
$rscat = @mysqli_query($myconn,$sqlcat) or die( "Errore....".mysqli_error($myconn) );
$rowcat = mysqli_fetch_array($rscat);
$idcategoria = $rowcat['idcategoria'];

if($visibile=="Si"){	
$sqlmod = "update articoli set
           idcategoria = '$idcategoria',
           titart = '$tit_art',
           alias = '$alias',
           metadesc = '$metadesc',
           metakey = '$metakey',
           categoria = '$categoria',
           datacreate = '$datacreate',
		   author = '$author',
		   profile_author = '$profile_author',
           contart = '$htmlcont',
           visibility = '$visibile',
           ult_mod = '$data_mod'
           where idart='$mod_art'";
           
$rsmod = @mysqli_query($myconn,$sqlmod) or die( "Errore....".mysqli_error($myconn) );

$sqlcaten = " update categorie set stato_cat = '$enabled' where idcategoria = '$idcategoria' ";
$rscaten= @mysqli_query($myconn,$sqlcaten) or die( "Errore....".mysqli_error($myconn) );

header("Location: ../../administrator/?idut=".$idut."&mod_art=".$mod_art."&status=true");		
}
else{
$sqlmod = "update articoli set
           idcategoria = '$idcategoria',
           titart = '$tit_art',
           alias = '$alias',
           metadesc = '$metadesc',
           metakey = '$metakey',
           categoria = '$categoria',
           datacreate = '$datacreate',
		   author = '$author',
		   profile_author = '$profile_author',
           contart = '$htmlcont',
           visibility = '$visibile',
           ult_mod = '$data_mod'
           where idart='$mod_art'";
           
$rsmod = @mysqli_query($myconn,$sqlmod) or die( "Errore....".mysqli_error($myconn) );
header("Location: ../../administrator/?idut=".$idut."&mod_art=".$mod_art."&status=true");	
}





    
    
}






?>