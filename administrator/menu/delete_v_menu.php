<?php
define('__ROOT__', dirname( dirname (  dirname ( __FILE__  )  ) ) ); 
require_once(__ROOT__.'/connect.php');

$myconn = @mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME) or die("Errore Connessione: <b>" .mysqli_connect_error()."</b>");
@mysqli_query($myconn," SET names 'UTF8' ");


if( isset($_GET['v_menu']) && isset($_GET['idut']) ){
$v_menu = $_GET['v_menu'];
$idut = $_GET['idut'];

$sql = "select stato_voce_menu, home from voci_menu where nome_voce_menu='$v_menu'";
$rs = @mysqli_query($myconn,$sql) or die( "Errore....".mysqli_error($myconn) );
$row =  mysqli_fetch_array($rs);
$stato = $row['stato_voce_menu'];
$home = $row['home'];
$si = "si";


if( $home==$si ){
echo "<p>Non puoi Eliminare la <strong>Home Page</strong></p>
      <p class=\"text-right\">
	  <button class=\"btn btn-info conf\" style=\"font-size:12px;\">Chiudi</button>
	  </p>";
exit;	
}
else{

$sql_menu = "select * from menu ";
$rs_menu = @mysqli_query($myconn,$sql_menu) or die( "Errore....".mysqli_error($myconn) );
$row_menu =  mysqli_fetch_array($rs_menu);
$voci_menu = unserialize($row_menu['voci_menu']);
$url_voci_menu = unserialize($row_menu['url_voci_menu']);
$indice = NULL;
$new_voci_menu = array();
$new_url_voci_menu = array();

for($i=0;$i<count($voci_menu);$i++){	
if( $voci_menu[$i]==$v_menu ){
$indice = $i;	
unset($voci_menu[$i]);
}	
}

for($j=0;$j<count($url_voci_menu);$j++){	
if( $j==$indice ){
unset($url_voci_menu[$j]);
}	
}

rsort($voci_menu);
sort($url_voci_menu);

foreach($voci_menu as $chiave => $valore){
$new_voci_menu[$chiave]=$valore;
}
foreach($url_voci_menu as $chiave => $valore){
$new_url_voci_menu[$chiave]=$valore;
}



$newvoci_menu = serialize($new_voci_menu);
$newurl_voci_menu = serialize($new_url_voci_menu);

$updatemenu = "UPDATE menu SET voci_menu = '$newvoci_menu' , url_voci_menu = '$newurl_voci_menu'";
$rsupdatemenu = @mysqli_query($myconn,$updatemenu) or die( "Errore....".mysqli_error($myconn) );

$delvmenu = " DELETE FROM voci_menu WHERE nome_voce_menu='$v_menu' ";
$rsdelvmenu = @mysqli_query($myconn,$delvmenu) or die( "Errore....".mysqli_error($myconn) );


echo "<p>Voce di Menù Eliminata</p>
      <p class=\"text-right\">
	  <button class=\"btn btn-info conf reload\">Chiudi</button>
	  </p>";

}


	


	
	
}



?>