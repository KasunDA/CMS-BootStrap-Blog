<?php
require_once('../../connect.php');
$myconn = @mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME) or die("Errore Connessione: <b>" .mysqli_connect_error()."</b>");
@mysqli_query($myconn," SET names 'UTF8' ");


if( isset($_GET['theme']) && isset($_GET['idut']) ){
$theme = $_GET['theme'];$idut = $_GET['idut'];

$sqltheme = " select tipo_themes from themes where name_themes='$theme'";	
$rstheme = @mysqli_query($myconn,$sqltheme) or die( "Errore....".mysqli_error($myconn) );	
$rowtheme =  mysqli_fetch_array($rstheme);
$tipo_themes = 	$rowtheme['tipo_themes'];
$attivo = "attivo";
$disattivo = "disattivo";

$updactivetheme = " update themes set  
                   st_themes = '$attivo'
				   where name_themes = '$theme'
                 ";
$rsupdactivetheme = @mysqli_query($myconn,$updactivetheme) or die( "Errore....".mysqli_error($myconn) );

$upddisactivetheme = " update themes set  
                   st_themes = '$disattivo'
				   where name_themes != '$theme' and tipo_themes ='$tipo_themes'
                 ";


$rsupddisactivetheme = @mysqli_query($myconn,$upddisactivetheme) or die( "Errore....".mysqli_error($myconn) );


if( isset($_GET['t_themes']) ){
$t_themes = $_GET['t_themes'];
header("Location: ../../administrator/?idut=".$idut."&template=all_themes&t_themes=".$t_themes);	
}
else{
header("Location: ../../administrator/?idut=".$idut."&template=all_themes");		
	
}




}


?>
