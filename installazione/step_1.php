<?php
/* Server Dati  */
$hostname = addslashes( trim($_POST['hostname']) );
$dtname = addslashes( trim($_POST['dtname']) );
$name_utente = addslashes( trim($_POST['nut']) );
$pass_utente= addslashes( trim($_POST['passut']) );
/* Server Dati  */

/* Dati Utente Reg. */
$name_user = addslashes( trim($_POST['nuser']) );
$cname_user = addslashes( trim($_POST['cnuser']) );
$email_user = addslashes( trim($_POST['emailuser']) );
$user = addslashes( trim($_POST['user']) );
$pass_user = addslashes( trim($_POST['passuser']) );

if (!preg_match("/[a-z]+[\ \'a-z]/i", $name_user) ) {
header("Location: ../installazione/index.php?name_user=_invalid");
exit;	
}

if (!preg_match("/[a-z]+[\ \'a-z]/i", $cname_user) ) {
header("Location: ../installazione/index.php?cname_user=_invalid");
exit;	
}

if (!preg_match("/([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)/i", $email_user) ) {
header("Location: ../installazione/index.php?email_user=_invalid");
exit;	
}

if (!preg_match("/[a-z0-9]{8}/i", $user) ) {
header("Location: ../installazione/index.php?user=_invalid");
exit;	
}

if (!preg_match("/[a-zA-Z0-9]{8}/i", $pass_user) ) {
header("Location: ../installazione/index.php?pass_user=_invalid");
exit;	
}
/* Dati Utente Reg. */

$path = getcwd();
$exp = explode('\\', $path);
$count_exp = count($exp);
$ult = $count_exp-1;
unset($exp[$ult]);
$newpath = implode('\\', $exp);

if(!file_exists("../connect.php")){

$connect = fopen("../connect.php", "a");
$dati_riga = "<?php\ndefine('DB_HOST','".$hostname."');\ndefine('DB_USER','".$name_utente."');\ndefine('DB_PSW','".$pass_utente."');\ndefine('DB_NAME','".$dtname."');\ndefine('PATH_NAME','".$newpath."');\n?>";
fwrite($connect,$dati_riga);
fclose($connect);

}
else{	
unlink("../connect.php");	
$connect = fopen("../connect.php", "a");
$dati_riga = "<?php\ndefine('DB_HOST','".$hostname."');\ndefine('DB_USER','".$name_utente."');\ndefine('DB_PSW','".$pass_utente."');\ndefine('DB_NAME','".$dtname."');\ndefine('PATH_NAME','".$newpath."');\n?>";
fwrite($connect,$dati_riga);
fclose($connect);	
}



echo "<hr><ul class=\"inline unstyled\"><li><a href=\"../installazione/step_2.php?nuser=".$name_user."&cnuser=".$cname_user."&emailuser=".$email_user."&user=".$user."&pass_user=".$pass_user."\" class=\"btn btn-large btn-primary\" id=\"gostep_2\">Connessione database creata, Continua >></a></li><li>&nbsp;</li><li><a href=\"../installazione/index.php\" class=\"btn btn-large btn-primary\"><< Torna Indietro</a></li></ul>";

?>

