<?php
define('__ROOT__', dirname( dirname (  dirname ( dirname (__FILE__) )  ) ) ); 
require_once(__ROOT__.'/connect.php');

$myconn = @mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME) or die("Errore Connessione: <b>" .mysqli_connect_error()."</b>");
@mysqli_query($myconn," SET names 'UTF8' ");

$email = $_POST['EMail'];

$sql_ver = "SELECT * FROM email_bann_comm WHERE email_bann = '$email' ";
$rs_ver = @mysqli_query($myconn,$sql_ver) or die( "Errore....".mysqli_error($myconn) );
$row_ver= $rs_ver->num_rows;

if( $row_ver!=0 ){
echo "E-Mail già presente nei bannati";
exit;
	
	
}
else{
$sql_add_bann = "INSERT INTO email_bann_comm (email_bann) VALUES ('$email')";
$rs_add_bann = @mysqli_query($myconn,$sql_add_bann) or die( "Errore....".mysqli_error($myconn) );		
echo "E-Mail aggiunta correttamente";	
	
}
?>