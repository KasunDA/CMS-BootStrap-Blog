<?php
require_once('../../../connect.php');
$myconn = @mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME) or die("Errore Connessione: <b>" .mysqli_connect_error()."</b>");
@mysqli_query($myconn," SET names 'UTF8' ");


if(isset($_GET['idut']) && isset($_GET['idart']) ){
$idut = $_GET['idut'];
$idart = $_GET['idart'];

$sql_admin = " SELECT email FROM admin WHERE cod_md5='$idut' ";
$rs_admin  = @mysqli_query($myconn,$sql_admin) or die( "Errore....".mysqli_error($myconn) );
$row_admin = mysqli_fetch_array($rs_admin);


$nome = $_POST['Nome'];
$testo = htmlentities(addslashes($_POST['Testo']));
$data_ora = date("d/m/Y - H:i:s");
$enabled= "enabled";
$email = $row_admin['email'];


$insert_comm = " INSERT INTO comment
                        ( idart , cont_comment , data_ora ,email_utente , nome_utente , st_comment  )
	             VALUES ('$idart' , '$testo', '$data_ora' ,'$email','$nome','$enabled')";
$rs_insert_comm = @mysqli_query($myconn,$insert_comm) or die( "Errore....".mysqli_error($myconn) );


echo "Il commento é stato aggiunto correttamente.";


	
	
}




?>