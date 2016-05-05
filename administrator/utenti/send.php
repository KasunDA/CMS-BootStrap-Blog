<?php
require_once('../../connect.php');
$myconn = @mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME) or die("Errore Connessione: <b>" .mysqli_connect_error()."</b>");
@mysqli_query($myconn," SET names 'UTF8' ");
$tipo_email = "MIME-Version: 1.0\nContent-type: text/html; charset=iso-8859-1";

if( isset($_GET['ut']) && isset($_GET['idut']) ){
$ut = $_GET['ut'];
$idut = $_GET['idut'];

$query =" SELECT * FROM admin WHERE username='$ut' ";
$result = @mysqli_query($myconn,$query) or die( "Errore....".mysqli_error($myconn) );
$row = mysqli_fetch_array($result);
$nome = $row['nome'];
$cognome = $row['cognome'];
$email = $row['email'];

$nomecognome = ucwords($nome." ".$cognome);
	
}

$ck = serialize($_POST['ck']);
$destinatari = unserialize($ck);
$ccdest = NULL;

for($i=0;$i<count($destinatari);$i++){	
if( $i==0 && $i<count($destinatari)-1 ){
$ccdest.=$destinatari[$i].",";
}
else{
$ccdest.=$destinatari[$i];		
}
}

$mittente = "From: $nomecognome <$email>\r\n$tipo_email";
$object = ucwords($_POST['object']);
$msg = ucwords($_POST['msg']);


mail($ccdest,$object,$msg,$mittente);



header("Location: ../../administrator/?idut=".$idut."&send_email=_ok");




?>