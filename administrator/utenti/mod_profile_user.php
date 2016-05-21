<?php
define('__ROOT__', dirname( dirname (  dirname ( __FILE__  )  ) ) ); 
require_once(__ROOT__.'/connect.php');

$myconn = @mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME) or die("Errore Connessione: <b>" .mysqli_connect_error()."</b>");
@mysqli_query($myconn," SET names 'UTF8' ");

if( isset($_GET["idut"]) && isset($_GET["idut_user"]) ){	
$idut = $_GET["idut"]; 
$idut_user = $_GET["idut_user"];

$nome = addslashes($_POST['nome']);
$cognome = addslashes($_POST['cognome']);
$username = $_POST['username'];
$password = $_POST['password'];
$md5 = md5($username);
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$note_utente = addslashes($_POST['note_user']);


if( $idut==$idut_user ){	

$query =" SELECT * FROM admin WHERE cod_md5='$idut' ";
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
           note = '$note_utente'
		   where id_admin='$id_admin'";  
		   
$rspf = @mysqli_query($myconn,$sqlpf) or die( "Errore....".mysqli_error($myconn) );
header("Location: ../../login.php?error=new_log");	
}
else{
$sqlpf = " update admin set
           cod_md5 = '$md5',
           nome = '$nome',
           cognome = '$cognome',
           username = '$username',
           password = '$password',
           email = '$email',
           telefono = '$telefono',
           note = '$note_utente'           
           where id_admin ='$id_admin' ";           
$rspf = @mysqli_query($myconn,$sqlpf) or die( "Errore....".mysqli_error($myconn) );
header("Location: ../../administrator/?idut=".$idut."&mod_user=".$idut_user."&st_mod_user=ok");	
}	
}
else{
$query =" SELECT * FROM admin WHERE cod_md5='$idut_user' ";
$result = @mysqli_query($myconn,$query) or die( "Errore....".mysqli_error($myconn) );
$row = mysqli_fetch_array($result);
$id_admin = $row['id_admin'];
$user = $row['username'];
$pass = $row['password'];	

$sqlpf = " update admin set
           cod_md5 = '$md5',
           nome = '$nome',
           cognome = '$cognome',
           username = '$username',
           password = '$password',
           email = '$email',
           telefono = '$telefono',
           note = '$note_utente'           
           where id_admin ='$id_admin' ";           
$rspf = @mysqli_query($myconn,$sqlpf) or die( "Errore....".mysqli_error($myconn) );
header("Location: ../../administrator/?idut=".$idut."&mod_user=".$md5."&st_mod_user=ok");		
}
}
?>