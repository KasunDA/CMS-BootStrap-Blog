<?php
require_once('connect.php');
$myconn = @mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME) or die("Errore Connessione: <b>" .mysqli_connect_error()."</b>");
@mysqli_query($myconn," SET names 'UTF8' ");

if( isset($_GET['print_art']) ){
$print_art = $_GET['print_art'];

$sql_print = "SELECT * FROM articoli WHERE alias='$print_art'";
$rs_print = @mysqli_query($myconn,$sql_print) or die( "Errore....".mysqli_error($myconn) );	
$row_print = mysqli_fetch_array($rs_print);
$titart = $row_print['titart'];
$contart = html_entity_decode($row_print['contart']);
	
}


?>

<html lang="en">
<head>
<meta charset="utf-8">
<title><?php echo "Stampa Articolo ". ucwords($titart); ?></title>

<style>

body{
background: #FFFFFF !important;	
font-size: 12pt !important;
color: #000000 !important;
font-family: "Times New Roman" , Times , serif !important;
}

div.cont_print , div.prin_back{
margin:auto;
width:750px;
height:auto;
}

div.cont_print a:link,
div.cont_print a:visited , 
div.prin_back a:link , 
div.prin_back a:visited{
    background: none repeat scroll 0 0 transparent;
    color: #000000 ;
    font-weight: bold;
    text-decoration: underline;
}



</style>

</head>
<body>
<div class="prin_back"><p><a href="javascript:window.print();">Stampa</a> <a href="javascript:history.back()">Annulla</a></p></div>
<div class="cont_print">
<?php  echo "<h1>"
            .ucwords($titart)."</h1><hr>"
			.$contart; 
?>
</div>

</body>
</html>
