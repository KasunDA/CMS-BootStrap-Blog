<?php
define('__ROOT__', dirname( dirname (  dirname ( __FILE__  )  ) ) ); 
require_once(__ROOT__.'/connect.php');

$myconn = @mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME) or die("Errore Connessione: <b>" .mysqli_connect_error()."</b>");
@mysqli_query($myconn," SET names 'UTF8' ");



if( isset($_GET['q'])){
$q=$_GET['q'];	


$artvis = " SELECT * FROM articoli WHERE visibility='Si' AND archiviato = 'No' ORDER BY titart ASC";
$rsartvis = @mysqli_query($myconn,$artvis) or die( "Errore....".mysqli_error($myconn) );
$rowartvis = $rsartvis->num_rows;

$catenabled =" SELECT * FROM categorie ";
$rscatenabled = @mysqli_query($myconn,$catenabled) or die( "Errore....".mysqli_error($myconn) );
$categenabled = array();

    echo "<p><label class=\"radio\">";
	echo "<input type=\"radio\" ";
	if( $q=="all_article" ){echo "checked";}
	echo " value=\"all_article\" name=\"optionsRadios\"> ARTICOLI DI TUTTE LE CATEGORIE";
	echo "</label></p>";		
	echo "<hr>";
	echo "<p><b><em>ARTICOLI DI UNA SINGOLA CATEGORIA</b></em></p>";
	
	$sqlcat =" SELECT * FROM categorie WHERE stato_cat='enabled'";
    $rssqlcat = @mysqli_query($myconn,$sqlcat) or die( "Errore....".mysqli_error($myconn) );	
	$rowsqlcat = $rssqlcat->num_rows;
	
	if($rowsqlcat!=0){
		
	while( $rowsqlcat = mysqli_fetch_array($rssqlcat) ){
	$nomecategoria = $rowsqlcat['nome_categoria'];	
	$aliascategoria = $rowsqlcat['alias_categoria'];	
    $mincat = strtolower($aliascategoria);	
	
	if( $mincat==$q ){
	echo "<p><label class=\"radio\"><input type=\"radio\" name=\"optionsRadios\"  value=\"".$mincat."\" checked>".$nomecategoria."</label></p>";		
	}else{
	echo "<p><label class=\"radio\"><input type=\"radio\" name=\"optionsRadios\"  value=\"".$mincat."\">".$nomecategoria."</label></p>";		
	}
	
	}	
	
	}
	else{
	echo "<p>Nessuna Categoria</p>";	
	}
		
	echo "<hr>";
	echo "<p><b><em>SINGOLO ARTICOLO</b></em></p>";
	
	if($rowartvis!=0){
		while( $rowarticoli = mysqli_fetch_array($rsartvis) ){
	$titarticolo = $rowarticoli['titart'];	
	$aliasarticolo = $rowarticoli['alias'];
	
	if( $q==$aliasarticolo ){
	echo "<p><label class=\"radio\"><input type=\"radio\" name=\"optionsRadios\" value=\"".$aliasarticolo."\" checked> ".$titarticolo."</label></p>";	
		
	}
	else{
	echo "<p><label class=\"radio\"><input type=\"radio\" name=\"optionsRadios\" value=\"".$aliasarticolo."\"> ".$titarticolo."</label></p>";	
		
	}
	
	
	}	
	}
	else{
		echo "<p>Nessun Articolo</p>";
	}
	

		
}

?>