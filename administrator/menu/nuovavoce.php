<?php
define('__ROOT__', dirname( dirname (  dirname ( __FILE__  )  ) ) ); 
require_once(__ROOT__.'/connect.php');

$myconn = @mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME) or die("Errore Connessione: <b>" .mysqli_connect_error()."</b>");
@mysqli_query($myconn," SET names 'UTF8' ");


if( isset($_GET['idut']) && isset($_GET['menu']) ){
$idut = $_GET['idut'];
$menu = $_GET['menu'];		
	
$nuovavoce = $_POST['newvoce'];
$nuovourlvoce =$_POST['newurlvoce'];

$sqlvmenu = "SELECT * FROM voci_menu";
$rsvmenu = @mysqli_query($myconn,$sqlvmenu) or die( "Errore....".mysqli_error($myconn) );

while( $rowvmenu= mysqli_fetch_array($rsvmenu) ){
$vocemenu = $rowvmenu['nome_voce_menu'];
if( $vocemenu==$nuovavoce ){	
header("Location: ../../administrator/?idut=".$idut."&menu=".$menu."&v_menu=exist");		
exit;	
}
}	


$enabled = "enabled";$no = "no";$idmenu = 1;
$insertnewvmenu = "INSERT INTO voci_menu (id_menu , nome_voce_menu , stato_voce_menu , home) VALUES ( '$idmenu' , '".addslashes($nuovavoce)."' , '$enabled' , '$no')";
$rsinsertnewvmenu = @mysqli_query($myconn,$insertnewvmenu) or die( "Errore....".mysqli_error($myconn) );	


$sqlmenu = "SELECT * FROM menu";
$rsmenu = @mysqli_query($myconn,$sqlmenu) or die( "Errore....".mysqli_error($myconn) );
$rowmenu = mysqli_fetch_array($rsmenu);

$aliasmenu = $rowmenu['alias_menu'];
$vmenu = unserialize($rowmenu['voci_menu']);
$urlvmenu = unserialize($rowmenu['url_voci_menu']);
/*
$newvmenu = array();
$newurlvmenu = array();
*/

$vmenu[count($vmenu)]=$nuovavoce;
$urlvmenu[count($urlvmenu)]=$nuovourlvoce;


$unsernewvmenu = addslashes(serialize($vmenu));
$unsernewurlvmenu = addslashes(serialize($urlvmenu));
	

$updatemenu = "UPDATE menu SET voci_menu = '$unsernewvmenu' , url_voci_menu = '$unsernewurlvmenu '";
$rsupdatemenu = @mysqli_query($myconn,$updatemenu) or die( "Errore....".mysqli_error($myconn) );



header("Location: ../../administrator/?idut=".$idut."&menu=".$menu."&insert_v_menu=ok");
	
	

}






?>