<?php
require_once('../../connect.php');
$myconn = @mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME) or die("Errore Connessione: <b>" .mysqli_connect_error()."</b>");
@mysqli_query($myconn," SET names 'UTF8' ");
include("../../contatori.php");

if($row_images==0){
echo "<p class=\"text-info\">Nessuna immagine</p>";	
}
else{

$view_img = 6 ;
$all_row =  ceil($row_images / $view_img); 

for( $i=1; $i<=$all_row;$i++ ){
$first = ( ($i - 1) * $view_img ) ;
$sqlimg = "select * from images LIMIT ".$first." , ".$view_img;
$rsimg = @mysqli_query($myconn,$sqlimg) or die( "Errore....".mysqli_error($myconn) );

echo "<div class=\"row-fluid\"><div class=\"span12\"><ul class=\"thumbnails\">";

while($rwimg = mysqli_fetch_array($rsimg)){
$id_img = $rwimg['id_img'];
$name_img = $rwimg['name_img'];
$url_img = $rwimg['url_img'];	
echo "<li class=\"span2\">
        <a href=\"#infoIMG\" class=\"thumbnail loadimg\" data-toggle=\"modal\" id=\"".$id_img."\">
        <img src=\"/../images/".$name_img."\" id=\"miniature_img\"> 
		</a>
		<a href=\"../administrator/cont_images/remove_img.php?img=".$name_img."\" class=\"btn btn-mini btn-block btn-info\"  id=\"remove-img\">Elimina Immagine</a>
	    </li>
	   ";		
}
echo "</ul></div></div>";
}	
	
}





?>