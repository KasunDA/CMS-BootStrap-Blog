<?php 
require_once('../../../connect.php');
$myconn = @mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME) or die("Errore Connessione: <b>" .mysqli_connect_error()."</b>");
@mysqli_query($myconn," SET names 'UTF8' ");



if( isset($_GET['bann_mail']) && isset($_GET['idut'])){
$idut = $_GET['idut'];
$email_bann = $_GET['bann_mail'];





$sql_insert_email_bann = "INSERT INTO email_bann_comm (email_bann) VALUES  ('$email_bann')  ";
$rs_insert_email_bann = @mysqli_query($myconn,$sql_insert_email_bann) or die( "Errore....".mysqli_error($myconn) );	

header("Location: /administrator/?idut=".$idut."&comment");


}



?>