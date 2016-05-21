<?php
define('__ROOT__', dirname( dirname (  dirname ( __FILE__  )  ) ) ); 
require_once(__ROOT__.'/connect.php');

$myconn = @mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME) or die("Errore Connessione: <b>" .mysqli_connect_error()."</b>");
@mysqli_query($myconn," SET names 'UTF8' ");

if( isset($_GET['idut']) && isset($_GET['indvmenu']) ){

$special_char = array('é','è','ì','ò','à','ù','&','$','€');
$char = array('e','e','i','o','a','u','e','dollaro','euro');
	
$idut = $_GET['idut'];
$indvmenu = $_GET['indvmenu'];		
$vocemenu = $_POST['vocemenu'];
$vocemenu = str_ireplace($special_char,$char,$vocemenu);
$urlvoce = $_POST['urlvoce'];


$sqlmenu = "SELECT * FROM menu";
$rsmenu = @mysqli_query($myconn,$sqlmenu) or die( "Errore....".mysqli_error($myconn) );

$rowmenu = mysqli_fetch_array($rsmenu);
$aliasmenu = $rowmenu['alias_menu'];
$vmenu = unserialize($rowmenu['voci_menu']);
$urlvmenu = unserialize($rowmenu['url_voci_menu']);
$newvmenu = array();
$newurlvmenu = array();

for($i=0;$i<count($vmenu );$i++){
if($i==$indvmenu){	
$newvmenu[$i]=$vocemenu;		
}	
else{
	
if( $vmenu[$i]==$vocemenu ){
header("Location: ../../administrator/?idut=".$idut."&menu=".$aliasmenu."&vmenu_exist=true");	
exit;
}	
	
$newvmenu[$i]=$vmenu[$i];	
}		
}

for($j=0;$j<count($urlvmenu);$j++){
if($j==$indvmenu){	
$newurlvmenu[$j]=$urlvoce;		
}	
else{
$newurlvmenu[$j]=$urlvmenu[$j];	
}		
}

$newv = addslashes(serialize($newvmenu));
$newurlv = addslashes(serialize($newurlvmenu));


$updatemenu = "UPDATE menu SET voci_menu = '$newv' , url_voci_menu = '$newurlv'";
$rsupdatemenu = @mysqli_query($myconn,$updatemenu) or die( "Errore....".mysqli_error($myconn) );


$sqlvmenu = "SELECT id_voce_menu FROM voci_menu ";
$rsvmenu =  @mysqli_query($myconn,$sqlvmenu) or die( "Errore....".mysqli_error($myconn) );
$indvmenu = -1;

while( $rowvmenu = mysqli_fetch_array($rsvmenu) ){
$id_voce_menu = $rowvmenu['id_voce_menu'];
$indvmenu = $indvmenu+1;

$updatevmenu = "UPDATE voci_menu SET nome_voce_menu = '".addslashes($newvmenu[$indvmenu])."' WHERE id_voce_menu = '$id_voce_menu'";
$rsupdatevmenu = @mysqli_query($myconn,$updatevmenu) or die( "Errore....".mysqli_error($myconn) );
}
header("Location: ../../administrator/?idut=".$idut."&menu=".$aliasmenu."&st_mod_menu=ok");	
}
?>