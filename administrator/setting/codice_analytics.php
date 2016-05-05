<?php
require_once('../../connect.php');
$myconn = @mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME) or die("Errore Connessione: <b>" .mysqli_connect_error()."</b>");
@mysqli_query($myconn," SET names 'UTF8' ");

if( isset($_GET['idut']) ){
$idut = $_GET['idut'];	

$analytics = htmlentities( addslashes($_POST['analytics']) );


if( strlen($analytics)==0 ){

$updeteanaly = " update config set 
                 gooanaly = '$analytics'
				 ";

$rsupdeteanaly = @mysqli_query($myconn,$updeteanaly) or die( "Errore....".mysqli_error($myconn) );
header("Location: ../../administrator/?idut=".$idut."&setting=all_config&mod=ok");		


	
}
else{
	
if( !preg_match("/[A-Z]{2}\-[0-9]{8}\-[0-9]{1}$/",$analytics)  ){


header("Location: ../../administrator/?idut=".$idut."&setting=all_config&analyticstracking=_not");		
exit;
}

else{
$updeteanaly = " update config set 
                 gooanaly = '$analytics'
				 ";

$rsupdeteanaly = @mysqli_query($myconn,$updeteanaly) or die( "Errore....".mysqli_error($myconn) );
header("Location: ../../administrator/?idut=".$idut."&setting=all_config&mod=ok");		

}	
	
}











}




?>