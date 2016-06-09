<?php
define('__ROOT__', dirname( dirname (  dirname ( __FILE__  )  ) ) ); 
require_once(__ROOT__.'/connect.php');

$myconn = @mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME) or die("Errore Connessione: <b>" .mysqli_connect_error()."</b>");
@mysqli_query($myconn," SET names 'UTF8' ");

if( isset($_GET['idut']) ){
$idut = $_GET['idut'];	
$logo_blog = htmlentities(addslashes($_POST['logoblog']));
$nameblog = addslashes($_POST['nameblog']);
$titleblog = addslashes($_POST['titleblog']);
$sttitleblog = addslashes($_POST['sttitleblog']);
$sectionabaut = addslashes($_POST['sectionabaut']);
$sectionmetadesc = addslashes( $_POST['sectionmetadesc']) ;
$sectionmetakey= addslashes( $_POST['sectionmetakey']) ;
$fb = addslashes($_POST['fb']);
$tw = addslashes($_POST['tw']);
$gooplus = addslashes($_POST['gooplus']);
$github = addslashes($_POST['github']);
$linkem = addslashes($_POST['linkem']);
$codepen = addslashes($_POST['codepen']);
$footer = addslashes($_POST['footer']);


$updetesetting = " update config set 
                 logo_blog = '$logo_blog',
                 name_blog = '$nameblog',
				 title_blog = '$titleblog',
				 st_title_blog = '$sttitleblog',
				 section_abaut = '$sectionabaut',
				 sectionmetadesc = '$sectionmetadesc',
				 sectionmetakey = '$sectionmetakey',
				 fb = '$fb',
				 tw = '$tw',
				 gooplus = '$gooplus',
				 github = '$github',
				 linkem = '$linkem',
				 codepen = '$codepen',
				 footer_blog = '$footer'
				 ";

$rsupdetesetting = @mysqli_query($myconn,$updetesetting) or die( "Errore....".mysqli_error($myconn) );
header("Location: ../../administrator/?idut=".$idut."&setting=all_config&mod=ok");	
	
	
}





?>
