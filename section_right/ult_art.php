<h4>Recenti</h4>
<?php
if($num_art_vis_no_arch ==0){
	echo "Nessun Articolo";	
}
else{

$sqlultart = " SELECT * FROM articoli WHERE visibility = \"Si\" AND archiviato = \"No\" ORDER BY datacreate  DESC LIMIT 0,6" ;
$rsultart = @mysqli_query($myconn,$sqlultart) or die( "Errore....".mysqli_error($myconn) );
	
	
echo "<ol class=\"list-unstyled\">";	
while($ultart = mysqli_fetch_array($rsultart)){
$titultart = ucwords($ultart['titart']);
$aliasultart = $ultart['alias'];
echo "<li><a href=\"/article/go.php?p_use=".$aliasultart."\">".$titultart."</a></li>";

}	

echo "</ol>";

}

?>