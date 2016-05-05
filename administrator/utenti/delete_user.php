<?php
require_once('../../connect.php');
$myconn = @mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME) or die("Errore Connessione: <b>" .mysqli_connect_error()."</b>");
@mysqli_query($myconn," SET names 'UTF8' ");


if(isset($_GET['id']) && isset($_GET['idut'])){
$id = $_GET['id'];	$idut = $_GET['idut'];	


$deluser = " DELETE FROM admin WHERE id_admin='$id' ";
$rsdeluser = @mysqli_query($myconn,$deluser) or die( "Errore....".mysqli_error($myconn) );

		


echo "<p>Utente Eliminato</p>
      <p class=\"text-right\">
	  <button class=\"btn btn-default conf reload\">Chiudi</button>
	  </p>";


}



?>