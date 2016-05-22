<?php
define('__ROOT__', dirname( dirname (  dirname ( __FILE__  )  ) ) ); 
require_once(__ROOT__.'/connect.php');

if( isset($_GET['idut']) ){
$idut = $_GET['idut'];

$myconn = @mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME) or die("Errore Connessione: <b>" .mysqli_connect_error()."</b>");
@mysqli_query($myconn," SET names 'UTF8' ");

if (!isset($_FILES['userfile']) || !is_uploaded_file($_FILES['userfile']['tmp_name'])) {
  header("Location: ../../../administrator/?idut=".$idut."&images=_not_file"); 
  exit;    
}

else{

$uploaddir = __ROOT__."/images/";
$userfile_tmp = $_FILES['userfile']['tmp_name'];
$userfile_name = $_FILES['userfile']['name'];
$url_image = "/../images/".$userfile_name;

$target_file = $uploaddir.$_FILES['userfile']['name'];
if (file_exists($target_file)) {
  header("Location: ../../../administrator/?idut=".$idut."&images=_exist_file");
  exit;
}

$ext_ok = array('jpg', 'gif', 'png');
$temp = explode('.', $_FILES['userfile']['name']);
$ext = end($temp);
if (!in_array($ext, $ext_ok)) {
  header("Location: ../../../administrator/?idut=".$idut."&images=_not_extension");
   exit;
}


$is_img = getimagesize($_FILES['userfile']['tmp_name']);
if (!$is_img) {
header("Location: ../../../administrator/?idut=".$idut."&images=_not_image");
exit;    
}


if ( move_uploaded_file($userfile_tmp, $uploaddir.$userfile_name) ) {

$sql_insert_img = "INSERT INTO images ( name_img, url_img ) VALUES ('$userfile_name', '$url_image') ";
$rs_insert_img = @mysqli_query($myconn,$sql_insert_img) or die( "Errore....".mysqli_error($myconn) );
header("Location: ../../../administrator/?idut=".$idut."&images=_success");
}
else{
header("Location: ../../../administrator/?idut=".$idut."&images=_error");


}	
	
	
}

}
?>
