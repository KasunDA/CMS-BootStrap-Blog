<?php
require_once('../../connect.php');
$myconn = @mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME) or die("Errore Connessione: <b>" .mysqli_connect_error()."</b>");
@mysqli_query($myconn," SET names 'UTF8' ");

if (!isset($_FILES['userfile']) || !is_uploaded_file($_FILES['userfile']['tmp_name'])) {
  echo "<span class=\"text-info\"><i class=\"fa fa-info-circle\" aria-hidden=\"true\"></i> Non hai inviato nessun file...</span>";
  exit;    
}

else{
	
$path = getcwd();
$exp = explode('/', $path);
$count_exp = count($exp);
$ult = $count_exp-1;
$pen_ult = $count_exp-2;
unset($exp[$ult]);
unset($exp[$pen_ult]);
$newpath = implode('/', $exp);
$uploaddir = $newpath."/images/";
$userfile_tmp = $_FILES['userfile']['tmp_name'];
$userfile_name = $_FILES['userfile']['name'];
$url_image = "/../images/".$userfile_name;

$target_file = $uploaddir.$_FILES['userfile']['name'];
if (file_exists($target_file)) {
  echo "<span class=\"text-info\"><i class=\"fa fa-info-circle\" aria-hidden=\"true\"></i> Il file esiste già.!</span>";
  exit;
}

$ext_ok = array('jpg', 'gif', 'png');
$temp = explode('.', $_FILES['userfile']['name']);
$ext = end($temp);
if (!in_array($ext, $ext_ok)) {
  echo "<span class=\"text-error\"><i class=\"fa fa-exclamation-circle\" aria-hidden=\"true\"></i> Il file ha un estensione non ammessa! Usa solo immagini <em>.gif</em>, <em>.jpg</em> e <em>.png</em>.</span>";
  exit;
}


$is_img = getimagesize($_FILES['userfile']['tmp_name']);
if (!$is_img) {
  echo "<span class=\"text-error\"><i class=\"fa fa-exclamation-circle\" aria-hidden=\"true\"></i> Puoi inviare solo immagini.</span>";
  exit;    
}


if ( move_uploaded_file($userfile_tmp, $uploaddir.$userfile_name) ) {

$sql_insert_img = "INSERT INTO images ( name_img, url_img ) VALUES ('$userfile_name', '$url_image') ";
$rs_insert_img = @mysqli_query($myconn,$sql_insert_img) or die( "Errore....".mysqli_error($myconn) );

echo "<span class=\"text-success\"><i class=\"fa fa-check\" aria-hidden=\"true\"></i> Immagine caricata con successo</span>";
}
else{
echo "<span class=\"text-error\"><i class=\"fa fa-exclamation-circle\" aria-hidden=\"true\"></i> Si è verificato un errore durante l'upload dell'immagine, riprova!</span>"; 
}	
	
	
}




?>
