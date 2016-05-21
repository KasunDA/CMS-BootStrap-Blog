<?php
define('__ROOT__', dirname( dirname (  dirname ( __FILE__  )  ) ) ); 
require_once(__ROOT__.'/connect.php');

$myconn = @mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME) or die("Errore Connessione: <b>" .mysqli_connect_error()."</b>");
@mysqli_query($myconn," SET names 'UTF8' ");

if( isset($_GET["idut"]) ){	
$cod_md5 = $_GET["idut"];
$nome = addslashes($_POST['nome']);
$cognome = addslashes($_POST['cognome']);
$username = $_POST['username'];
$password = $_POST['password'];
$md5 = md5($username);
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$note = addslashes($_POST['note']);

$query =" SELECT * FROM admin WHERE cod_md5='$cod_md5' ";
$result = @mysqli_query($myconn,$query) or die( "Errore....".mysqli_error($myconn) );
$row = mysqli_fetch_array($result);
$id_admin = $row['id_admin'];
$user = $row['username'];
$pass = $row['password'];


if($username!=$user || $password!=$pass){	
$sqlpf = " update admin set
           cod_md5 = '$md5',
           nome = '$nome',
           cognome = '$cognome',
           username = '$username',
           password = '$password',
           email = '$email',
           telefono = '$telefono',
           note = '$note'
           where id_admin = '$id_admin'
		   ";           
$rspf = @mysqli_query($myconn,$sqlpf) or die( "Errore....".mysqli_error($myconn) );
header("Location: ../../login.php?error=new_log");	
}
else{
$sqlpf = " update admin set
           nome = '$nome',
           cognome = '$cognome',
           username = '$username',
           password = '$password',
           email = '$email',
           telefono = '$telefono',
           note = '$note'           
           where id_admin ='$id_admin' ";           
$rspf = @mysqli_query($myconn,$sqlpf) or die( "Errore....".mysqli_error($myconn) );
header("Location: ../../administrator/?idut=".$cod_md5."&profile_use=mod_ok");	
}
}
?>