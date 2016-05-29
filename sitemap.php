<?php header('Content-Type: text/xml');
echo '<?xml version="1.0" encoding="UTF-8" ?> 
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
define('__ROOT__',dirname(__FILE__));
require_once(__ROOT__.'/connect.php');
?>
<?php
$myconn = @mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME) or die("Errore Connessione: <b>" .mysqli_connect_error()."</b>");
include( __ROOT__."/lib.php");
$sqlart = "SELECT * FROM articoli WHERE visibility = \"Si\"";
$rs_sqlart = @mysqli_query($myconn,$sqlart) or die( "Errore....".mysqli_error($myconn) );
$num_art= $rs_sqlart->num_rows;
if(!$rs_sqlart){
exit ('<p> Errore ..' . mysql_error() . '</p>');
}
else{
if($num_art ==0){
echo "<p>Nessun Articolo</p>";	
}
else{
while($row_art  = mysqli_fetch_array( $rs_sqlart)){	
$alias = $row_art['alias'];
$categoria = $row_art['categoria'];
$archiviato = $row_art['archiviato'];
$cestinato = $row_art['cestinato'];
$ult_mod = $row_art['ult_mod'];
$datacreate = $row_art['datacreate'];

$arraydata = explode("-",$datacreate);
$mese = $arraydata[1];$anno = $arraydata[0];
$nome_archivio = arch($mese,$anno);
$arraynome_archivio = explode(" ",$nome_archivio);
$newnome_archivio = strtolower($arraynome_archivio[0])."-".$arraynome_archivio[1];
if( $archiviato=="Si" ){
$url_art_arch = "http://".$_SERVER['HTTP_HOST']."/archivie/".$newnome_archivio."/".$alias.".html";
echo "<url>";
echo "<loc>".$url_art_arch;
echo "</loc>";
echo "<lastmod>".$ult_mod."</lastmod>";
echo "</url>";	
}
else{
$url_art = "http://".$_SERVER['HTTP_HOST']."/".$alias.".html";
echo "<url>";
echo "<loc>".$url_art;
echo "</loc>";
echo "<lastmod>".$ult_mod."</lastmod>";
echo "</url>";
$art_cat =" SELECT * FROM categorie  WHERE nome_categoria = '$categoria'";
$rs_art_cat = @mysqli_query($myconn,$art_cat) or die( "Errore....".mysqli_error($myconn) );
while($row_art_cat  = mysqli_fetch_array( $rs_art_cat )){
$alias_categoria = $row_art_cat['alias_categoria'];
$url_art_cat = "http://".$_SERVER['HTTP_HOST']."/".$alias_categoria."/".$alias.".html";
echo "<url>";
echo "<loc>".$url_art_cat;
echo "</loc>";
echo "<lastmod>".$ult_mod."</lastmod>";
echo "</url>";
}
}
}
}
}
echo "<url>
  <loc>http://cmsbootstrapblog.altervista.org/</loc>
</url>";

echo "<url>
  <loc>http://cmsbootstrapblog.altervista.org/?cookie-policy</loc>
</url>";

echo "</urlset>"
?>