<h4>Archivio</h4>
<?php
$sqlarchivio = "select * from archivio";
$rsarchivio = @mysqli_query($myconn,$sqlarchivio) or die( "Errore....".mysqli_error($myconn) );
$row_archivio = $rsarchivio->num_rows;
if($row_archivio==0){
echo "Nessun Archivio";	
}
else{
echo "<ol class=\"list-unstyled\">";	

while( $rowarchivio =  mysqli_fetch_array($rsarchivio) ){
$nome_archivio = $rowarchivio['nome_archivio'];
$arraynome_archivio = explode(" ",$nome_archivio);
$newnome_archivio = strtolower($arraynome_archivio[0])."-".$arraynome_archivio[1];
echo "<li><a href=\"/archivie/".$newnome_archivio.".htm\">".$nome_archivio."</a></li>";
}	
echo "</ol>";
}
?>
