<?php
define('__ROOT__', dirname( dirname (  dirname ( __FILE__  )  ) ) ); 
require_once(__ROOT__.'/connect.php');
$myconn = @mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME) or die("Errore Connessione: <b>" .mysqli_connect_error()."</b>");
@mysqli_query($myconn," SET names 'UTF8' ");
include(__ROOT__.'/lib.php');

if( isset($_GET['theme']) && isset($_GET['idut']) ){
$theme = $_GET['theme'];
$idut = $_GET['idut'];


$sql = " select * from themes where name_themes = '$theme' ";
$rs = @mysqli_query($myconn,$sql) or die( "Errore....".mysqli_error($myconn) );
$row =  mysqli_fetch_array($rs);
$st_themes = $row['st_themes'];
$actve = "attivo";
$disactive = "disattivo";


if( $st_themes == $actve ){
	
echo "<p><strong>Tema attivo</strong>, non puoi eliminare un tema attivo!</p>
      <p class=\"text-right\">
	  <button class=\"btn btn-info conf\" style=\"font-size:12px;\">Chiudi</button>
	  </p>";
exit;		
	
}
else{
$directory = __ROOT__."/assets/css/temi/".$theme;
deleteDirectory($directory);


$remove_temp = " DELETE FROM themes WHERE name_themes = '$theme' ";	
$rs_remove_temp = @mysqli_query($myconn,$remove_temp) or die( "Errore....".mysqli_error($myconn) );

echo "<p>Tema Eliminato.</p>
      <p class=\"text-right\">
	  <button class=\"btn btn-info conf reload\">Chiudi</button>
	  </p>";
	
}

	
}
?>