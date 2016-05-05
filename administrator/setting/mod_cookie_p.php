<?php

require_once('../../connect.php');
$myconn = @mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME) or die("Errore Connessione: <b>" .mysqli_connect_error()."</b>");
@mysqli_query($myconn," SET names 'UTF8' ");

if( isset($_GET['idut']) ){
$idut = $_GET['idut'];	

$coopl = htmlentities(addslashes($_POST['coopl']));

$updetecook_pol = " update config set 
                 cookie_policy = '$coopl'
				 ";

$rsupdetecook_pol = @mysqli_query($myconn,$updetecook_pol) or die( "Errore....".mysqli_error($myconn) );
header("Location: ../../administrator/?idut=".$idut."&setting=all_config&mod=ok");	




}


?>