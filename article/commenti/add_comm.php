<?php
define('__ROOT__', dirname( dirname ( dirname( __FILE__) ) ) ); 
require_once(__ROOT__.'/connect.php');

$myconn = @mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME) or die("Errore Connessione: <b>" .mysqli_connect_error()."</b>");
@mysqli_query($myconn," SET names 'UTF8' ");

if( isset($_GET['idart']) ){

$idart= $_GET['idart'];
$nome = $_POST['Nome'];
$email = $_POST['EMail'];
$testo = htmlentities(addslashes($_POST['Testo']),ENT_QUOTES, "UTF-8");
$data_ora = date("d/m/Y - H:i:s");
$disabled = "disabled";


$sql_ver_emailbann = "select email_bann from email_bann_comm where email_bann='$email' ";
$rs_ver_emailbann = @mysqli_query($myconn,$sql_ver_emailbann) or die( "Errore....".mysqli_error($myconn) );
$rw_ver_emailbann = $rs_ver_emailbann->num_rows;

if( $rw_ver_emailbann!=0 ){
	
echo "<i class=\"fa fa-exclamation-circle\"></i> L'indirizzo e-mail fornito non è autorizzato a inserire commenti.";	
exit;
}



$insert_comm = " INSERT INTO comment
                        ( idart , cont_comment , data_ora ,email_utente , nome_utente , st_comment  )
	             VALUES ('$idart' , '$testo', '$data_ora' ,'$email','$nome','$disabled')";
$rs_insert_comm = @mysqli_query($myconn,$insert_comm) or die( "Errore....".mysqli_error($myconn) );


echo "Il commento sarà visionato dall'amministratore del sito,<br> sarà pubblicato solo in caso di esito positivo.";




}
?>
