<h4>Preferiti <i class="fa fa-heart-o"></i></h4>
<?php
$sqlmylike = "SELECT * FROM articoli";
$rsmylike = @mysqli_query($myconn,$sqlmylike) or die( "Errore....".mysqli_error($myconn) );

if( !isset($_COOKIE['_like']) ){
	echo "<em class=\"muted\">Nessun Preferito, per aggiungere un articolo ai preferiti clicca su <i class=\"fa fa-heart-o\"></i></em>";	
}
else{
$cookie_like = urldecode($_COOKIE['_like']);
$array_like = explode("|",$cookie_like);
$array_art_like = array();
echo "<ol class=\"list-unstyled\">";

while($rowmylike = mysqli_fetch_array( $rsmylike )){
$titart = $rowmylike['titart'];
$alias = $rowmylike['alias'];

for( $i=0;$i<count($array_like);$i++ ){
$array_art = explode("_", $array_like[$i]);
for($j=0;$j<count($array_art);$j++){

if( $alias== $array_art[0]){
$array_art_like[$i] =  "<li><a href=\"".$array_art[1]."\">".ucwords($titart)."</a></li>";		
}
}	
}

}

array_unique($array_art_like);
for( $i=0;$i<count($array_art_like);$i++ ){
echo $array_art_like[$i];	

}
echo "</ol>";
	
}

?>