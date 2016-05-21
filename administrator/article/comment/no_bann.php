<?php
define('__ROOT__', dirname( dirname (  dirname ( dirname (__FILE__) )  ) ) ); 
require_once(__ROOT__.'/connect.php');
$myconn = @mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME) or die("Errore Connessione: <b>" .mysqli_connect_error()."</b>");
@mysqli_query($myconn," SET names 'UTF8' ");



if( isset($_GET['bann_mail']) && isset($_GET['idut'])){
$idut = $_GET['idut'];
$email_bann = $_GET['bann_mail'];


$sql_no_bann_mail = " DELETE FROM email_bann_comm WHERE email_bann='$email_bann' ";
$rs_no_bann_mail = @mysqli_query($myconn,$sql_no_bann_mail) or die( "Errore....".mysqli_error($myconn) );


$sql_num_email_bann = "select * from email_bann_comm ";
$rs_num_email_bann = @mysqli_query($myconn,$sql_num_email_bann) or die( "Errore....".mysqli_error($myconn) );
$row_num_email_bann = $rs_num_email_bann->num_rows;

if( $row_num_email_bann==0 ){
$sqltruncate_mail_bann = "TRUNCATE TABLE email_bann_comm ";
$rstruncate_mail_bann = @mysqli_query($myconn,$sqltruncate_mail_bann) or die( "Errore....".mysqli_error($myconn) );	
	
}

header("Location: /administrator/?idut=".$idut."&comment");


}




?>