<?php
define('__ROOT__', dirname( dirname (  dirname ( __FILE__  )  ) ) ); 
require_once(__ROOT__.'/connect.php');

$myconn = @mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME) or die("Errore Connessione: <b>" .mysqli_connect_error()."</b>");
@mysqli_query($myconn," SET names 'UTF8' ");

$idut =  $_GET['idut'];
$nome_user = addslashes($_POST['nome_user']);
$md5 = md5($nome_user);
$cognome_user = addslashes($_POST['cognome_user']);
$username_user = $_POST['username_user'];
$password_user = $_POST['password_user'];
$categoria_utente = "Utente Registrato";
$login="off";
$email_user = $_POST['email_user'];
$tel_user = $_POST['tel_user'];
$note_user = addslashes($_POST['note_user']);


$sqlvern = "SELECT username , email FROM admin ";
$rsvern = @mysqli_query($myconn,$sqlvern) or die( "Errore....".mysqli_error($myconn) );

while($rowvern = mysqli_fetch_array($rsvern)){
$username = $rowvern['username'];
$email = $rowvern['email'];

if($username==$username_user || $email==$email_user){
	
if( $username==$username_user ){
header("Location: ../../administrator/?idut=".$idut."&new_users=exist_user");
exit;	
}
if( $email==$email_user ){
header("Location: ../../administrator/?idut=".$idut."&new_users=exist_email");
exit;		
}		
}	
}

$insert = " INSERT INTO admin (
                               nome , cognome , 
							   username , password , 
							   email , telefono , login ,
							   note , cod_md5 , tipo_utente
							   )
	                  VALUES (
			                  '$nome_user' , '$cognome_user', 
							  '$username_user','$password_user',
							  '$email_user', '$tel_user' , '$login',
							  '$note_user' , '$md5' , '$categoria_utente'
							  ) ";
	    
$rs = @mysqli_query($myconn,$insert) or die( "Errore....".mysqli_error($myconn) );

header("Location: ../../administrator/?idut=".$idut."&users=all_users");	

	
?>