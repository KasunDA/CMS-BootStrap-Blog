<?php
define('__ROOT__', dirname( dirname (  dirname ( __FILE__ )  ) ) ); 
require_once(__ROOT__.'/connect.php');
$myconn = @mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME) or die("Errore Connessione: <b>" .mysqli_connect_error()."</b>");
@mysqli_query($myconn," SET names 'UTF8' ");

if(isset($_GET['idcat']) && isset($_GET['idut'])){
$idcat = $_GET['idcat'];	
$idut = $_GET['idut'];	


$delcat = " DELETE FROM categorie WHERE idcategoria='$idcat' ";
$rsdelcat = @mysqli_query($myconn,$delcat) or die( "Errore....".mysqli_error($myconn) );

$ncat =" SELECT * FROM categorie ";
$rsncat = @mysqli_query($myconn,$ncat) or die( "Errore....".mysqli_error($myconn) );
$rwncat = $rsncat->num_rows;

if($rwncat==0){
$sqltruncatecat = "TRUNCATE TABLE categorie";
$rstruncatecat = @mysqli_query($myconn,$sqltruncatecat) or die( "Errore....".mysqli_error($myconn) );
}

		


echo "<p>Categoria Eliminata</p>
      <p class=\"text-right\">
	  <button class=\"btn btn-default conf reload \" style=\"font-size:12px;\">Chiudi</button>
	  </p>";


}



?>