<?php
define('__ROOT__', dirname( dirname (  dirname ( __FILE__  )  ) ) ); 
require_once(__ROOT__.'/connect.php');

$myconn = @mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME) or die("Errore Connessione: <b>" .mysqli_connect_error()."</b>");
@mysqli_query($myconn," SET names 'UTF8' ");

if( isset($_GET['idimg']) ){
$idimg = $_GET['idimg'];

$sql_images = "select * from images where id_img='$idimg'";
$rs_images = @mysqli_query($myconn,$sql_images) or die( "Errore....".mysqli_error($myconn) );	

while($row_imgaes = mysqli_fetch_array($rs_images)){
$id_img = $row_imgaes['id_img'];
$name_img = $row_imgaes['name_img'];
$url_img = $row_imgaes['url_img'];

echo "<p><img src=\"".$url_img."\"></p>";
echo "<p class=\"text-success\">* URL Immagine: <em><strong>".$url_img."</strong></em></p>";
echo "<p class=\"text-info\"><em>* utilizza l'<strong>url </strong>immagine per inserire l'immagine in un articolo.</em></p>";	
}
	
	
}

?>