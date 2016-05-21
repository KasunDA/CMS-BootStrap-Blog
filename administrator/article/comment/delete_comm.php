<?php
define('__ROOT__', dirname( dirname (  dirname ( dirname (__FILE__) )  ) ) ); 
require_once(__ROOT__.'/connect.php');
$myconn = @mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME) or die("Errore Connessione: <b>" .mysqli_connect_error()."</b>");
@mysqli_query($myconn," SET names 'UTF8' ");

if( isset($_GET['idcomm']) ){
$idcomm = $_GET['idcomm'];


$delcomm = " DELETE FROM comment WHERE id_comment='$idcomm' ";
$rsdelcomm = @mysqli_query($myconn,$delcomm) or die( "Errore....".mysqli_error($myconn) );	

$sql_comment= "select * from comment ";
$rs_comment = @mysqli_query($myconn,$sql_comment) or die( "Errore....".mysqli_error($myconn) );
$row_comment = $rs_comment->num_rows;

if( $row_comment == 0 ){
$sqltruncate_comm = "TRUNCATE TABLE comment ";
$rstruncate_comm = @mysqli_query($myconn,$sqltruncate_comm) or die( "Errore....".mysqli_error($myconn) );	
}
echo "<p>Commento Eliminato</p>
      <p class=\"text-right\">
	  <button class=\"btn btn-default conf reload\" style=\"font-size:12px;\">Chiudi</button>
	  </p>";
}
?>