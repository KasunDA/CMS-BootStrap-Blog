<?php
$ncookie = "test";
$vcookie = "ok";
$dcookie = time()+24*3600;
if( !isset($_COOKIE[$ncookie]) ){
header("Location: ../login.php?error=cook");  
exit; 
}
else{  
require_once('connect.php');

function mypath ($pathname , $file) {
$file_include =  $pathname."/".$file;
return $file_include;	
};

include( mypath( PATH_NAME , "lib.php" ) );
$myconn = @mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME) or die("Errore: <b>" .mysqli_connect_error()."</b>");
@mysqli_query($myconn," SET names 'UTF8' ");

$user = $_POST['user'];
$password = $_POST['password'];

$sql =" SELECT username , password FROM admin ";
$rs = @mysqli_query($myconn,$sql) or die( "Errore....".mysqli_error($myconn) );

if ( check_user($password,$user,$rs) ) {
header("Location: login.php?error=lg");
exit;
}
else{
$dname = date("D"); $mname = date("M");$login = "on";
$access = ultimo_accesso($dname,$mname);	

$query =" SELECT * FROM admin WHERE username='$user'";
$result = @mysqli_query($myconn,$query) or die( "Errore....".mysqli_error($myconn) );

$q_up = " UPDATE admin SET login='$login' WHERE username='$user'";
$rs_q_up = @mysqli_query($myconn,$q_up) or die( "Errore....".mysqli_error($myconn) );

$row = mysqli_fetch_array($result);
$cod_md5 = $row['cod_md5'];
$ult_acc= $row['ult_acc'];



/*Set Cookie Login*/
$nomecookie = "_ut";
$valore_cookie = $cod_md5;
$time = time()+(24*3600)*365;
/*Set Cookie Login*/

if ( !isset($_COOKIE["ultimoaccesso"]) ) {
setcookie ("ultimoaccesso", $ult_acc , time() + 365 *24*3600);	
$q_ult_acc= "update admin set ult_acc='$access' where username='$user'"	;
$result_ult_acc = @mysqli_query($myconn,$q_ult_acc) or die( "Errore....".mysqli_error($myconn) );	
} 
else{
setcookie ("ultimoaccesso", $ult_acc , time() + 365 *24*3600);	
$q_ult_acc= "update admin set ult_acc='$access' where username='$user'"	;
$result_ult_acc = @mysqli_query($myconn,$q_ult_acc) or die( "Errore....".mysqli_error($myconn) );		
}

if (!isset($_COOKIE[$nomecookie])) {
setcookie($nomecookie,$valore_cookie,$time );
}

header("Location: administrator/?idut=".$cod_md5);    
  
}  
  
  
}
?>