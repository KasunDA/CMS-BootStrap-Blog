<?php
define('__ROOT__', dirname( dirname (  dirname ( __FILE__  )  ) ) ); 
require_once(__ROOT__.'/connect.php');

$myconn = @mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME) or die("Errore Connessione: <b>" .mysqli_connect_error()."</b>");
@mysqli_query($myconn," SET names 'UTF8' ");


if( isset($_GET['mod_cat_admin']) ){
$idut = $_GET['idut'];
$mod_cat_admin = $_GET['mod_cat_admin'];
$ck = serialize($_POST['ck']);


$sqlrestr = " update categ_admin set restrizioni='$ck' where alias_nome_cat='$mod_cat_admin' ";
$rsrestr = @mysqli_query($myconn,$sqlrestr) or die( "Errore....".mysqli_error($myconn) );
header("Location: ../../administrator/?idut=".$idut."&mod_cat_admin=".$mod_cat_admin."&st_mod=ok");	


}





?>