<?php
require_once('connect.php');
$myconn = @mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME) or die("Errore Connessione: <b>" .mysqli_connect_error()."</b>");
@mysqli_query($myconn," SET names 'UTF8' ");

$dcookie = (time())-3600;
$cod_md5 = $_GET["idut"];
$logaut = "off";

$query =" SELECT username FROM admin WHERE cod_md5='$cod_md5' ";
$result = @mysqli_query($myconn,$query) or die( "Errore....".mysqli_error($myconn) );

$q_up = " UPDATE admin SET login='$logaut' WHERE cod_md5='$cod_md5' ";
$rs_q_up = @mysqli_query($myconn,$q_up) or die( "Errore....".mysqli_error($myconn) );

$row = mysqli_fetch_array($result);

$user = $row['username'];
$nomecookie = "ut_".$user;
$ncookie = "test";


if( isset($_COOKIE[$ncookie]) ){    
setcookie($ncookie,null, $dcookie );   
}
if( isset($_COOKIE[$nomecookie]) ){    
setcookie($nomecookie, null , $dcookie );  
}




header("Location: login.php");
?>