<?php
define('__ROOT__', dirname( dirname (  dirname ( __FILE__  )  ) ) ); 
require_once(__ROOT__.'/connect.php');

$myconn = @mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME) or die("Errore Connessione: <b>" .mysqli_connect_error()."</b>");
@mysqli_query($myconn," SET names 'UTF8' ");

if(isset($_GET['img'])){
$img = 	$_GET['img'];
$uploaddir = __ROOT__."/images/";


$delimg = " DELETE FROM images WHERE name_img='$img' ";
$rsdelimg = @mysqli_query($myconn,$delimg) or die( "Errore....".mysqli_error($myconn) );	

if( file_exists($uploaddir.$img) ){
      unlink($uploaddir.$img);		
}




$nimg =" SELECT * FROM images ";
$rsnimg = @mysqli_query($myconn,$nimg) or die( "Errore....".mysqli_error($myconn) );
$rwnimg = $rsnimg->num_rows;

if($rwnimg==0){
$sqltruncate = "TRUNCATE TABLE images";
$rstruncate = @mysqli_query($myconn,$sqltruncate) or die( "Errore....".mysqli_error($myconn) );
}



echo "<span class=\"text-success\"><i class=\"fa fa-check\" aria-hidden=\"true\"></i> Immagine rimossa con successo.</span>";

}

?>