<?php
define('__ROOT__', dirname( dirname (  dirname ( __FILE__  )  ) ) ); 
require_once(__ROOT__.'/connect.php');
$myconn = @mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME) or die("Errore Connessione: <b>" .mysqli_connect_error()."</b>");
@mysqli_query($myconn," SET names 'UTF8' ");

if( isset($_GET['idut']) ){
$idut = $_GET['idut'];
if (!isset($_FILES['userfile']) || !is_uploaded_file($_FILES['userfile']['tmp_name'])) {
 header("Location: ../../../administrator/?idut=".$idut."&template=all_themes&theme=_not_file"); 
  exit;    
}
else{

$uploaddir = __ROOT__."/assets/css/temi/";	
$userfile_tmp = $_FILES['userfile']['tmp_name'];
$userfile_name = $_FILES['userfile']['name'];
$name_theme = preg_replace('/.zip/','',$userfile_name);
$target_file = $uploaddir.$name_theme;

if (file_exists($target_file)) {
  header("Location: ../../../administrator/?idut=".$idut."&template=all_themes&theme=_exist_file"); 
  exit;
}

$ext_ok = array('zip');
$temp = explode('.', $_FILES['userfile']['name']);
$ext = end($temp);
if (!in_array($ext, $ext_ok)) {
  header("Location: ../../../administrator/?idut=".$idut."&template=all_themes&theme=_not_extension");
   exit;
}

if ( move_uploaded_file($userfile_tmp, $uploaddir.$userfile_name) ) {

$zip  = new ZipArchive(); 	
$file = $uploaddir.$userfile_name ;	

$zip->open($file); 
$num_file = $zip->numFiles;

if( $num_file > 2 || $num_file == 1 ){
	$zip->close();
    unlink($uploaddir.$userfile_name);
	header("Location: ../../../administrator/?idut=".$idut."&template=all_themes&theme=_error");
	exit;	
}

else{
$cont_zip = array();	

for( $i = 0; $i < $zip->numFiles; $i++ ){
    $stat = $zip->statIndex( $i );
	$cont_zip[$i] = $stat['name'];   
}

if( $cont_zip[0] != $name_theme."/bootstrap.css" ){
	$zip->close();
    unlink($uploaddir.$userfile_name);
	header("Location: ../../../administrator/?idut=".$idut."&template=all_themes&theme=_error");
	exit;	
}

if( $cont_zip[1] != $name_theme."/thumbnail.png" ){
	$zip->close();
    unlink($uploaddir.$userfile_name);
	header("Location: ../../../administrator/?idut=".$idut."&template=all_themes&theme=_error");
	exit;	
}


if($zip->open($file)===TRUE) {
    $zip->extractTo(__ROOT__."/assets/css/temi");
    $zip->close();
	unlink($uploaddir.$userfile_name);
	 
	$insert_theme = " INSERT INTO themes( name_themes , st_themes , tipo_themes  ) VALUES ( '$name_theme' , 'disattivo' , 'front-end' )";
	$rs_insert_theme = @mysqli_query( $myconn , $insert_theme) or die( "Errore....".mysqli_error($myconn) );
	 
	 
     header("Location: ../../../administrator/?idut=".$idut."&template=all_themes&theme=_extract"); 
	
	}

	
}
}	
}
}
?>