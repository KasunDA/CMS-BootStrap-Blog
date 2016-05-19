<?php
require_once('connect.php');
$myconn = @mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME) or die("Errore: <b>" .mysqli_connect_error()."</b>");
@mysqli_query($myconn," SET names 'UTF8' ");
$tipo_email = "MIME-Version: 1.0\nContent-type: text/html; charset=iso-8859-1";

if( isset($_GET['email']) ){
$email = $_GET['email']	;

$sqlrecup = "select * from admin where email='$email'";
$rsrecup = @mysqli_query($myconn,$sqlrecup) or die( "Errore....".mysqli_error($myconn) );
$rowrecup = $rsrecup->num_rows;

if($rowrecup==0){
	
echo "<p class=\"text-error\">
      <em><i class=\"fa fa-exclamation-triangle\"></i> Errore..La tua e-mail non è presente nel database, 
	  <a href=\"\" data-dismiss=\"modal\" aria-hidden=\"true\">chiudi</a></em></p>";
		
	
	
}

else{
	
$row_recup = mysqli_fetch_array($rsrecup);
$user = $row_recup['username'];
$pw = $row_recup['password'];
	
$mittente = "From: CMS BootStrap Blog\r\n$tipo_email";
$object = "Recupero Dati di Accesso";
$msg = "<p>Non rispondere a questa E-Mail, messaggio generato in automatico.</p>
        <p>I tuoi dati di accesso al pannello di amministrazione di CMS BootStrap Blog sono:</p>
		<p>UserName: <b>".$user."</b></p>
		<p>PassWord: <b>".$pw."</b></p>
        ";


mail($email,$object,$msg,$mittente);

echo "<p class=\"text-success\">
      <em><i class=\"fa fa-check\"></i> Ti è stata inviata una E-Mail al tuo indirizzo con i dati di accesso, 
	  <a href=\"\" data-dismiss=\"modal\" aria-hidden=\"true\">chiudi</a></em></p>";


}

}

?>
