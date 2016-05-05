
<div class="row-fluid">
<div class="span12">
<div class="span9">

<div class="table-responsive">
<table class="table table-bordered table-striped table-hover">
<tr class="info">
<td><b>#</b></td>
<td><b>Tema</b></td>
<td><b>Anteprima</b></td>
<td><b>Tipo</b></td>
<td><b>Stato</b></td>
<td><b>Autore</b></td>

</tr>

<?php

if( isset($_GET['template']) && $_GET['template']=="all_themes" ){
	
$sqlthemes = "select * from themes";
$rsthemes = @mysqli_query($myconn,$sqlthemes) or die( "Errore....".mysqli_error($myconn) );	
	
	
}
if( isset($_GET['template']) && $_GET['template']=="all_themes" && isset($_GET['t_themes']) ){
$t_themes = $_GET['t_themes'];

$sqlthemes = "select * from themes where tipo_themes='$t_themes'";
$rsthemes = @mysqli_query($myconn,$sqlthemes) or die( "Errore....".mysqli_error($myconn) );	
	
	
}


while( $rowthemes = mysqli_fetch_array($rsthemes) ){
$id_themes = $rowthemes['id_themes'];
$name_themes = $rowthemes['name_themes'];
$tipo_themes = $rowthemes['tipo_themes'];
$st_themes = $rowthemes['st_themes'];	


echo "<tr>";
echo "<td>".$id_themes."</td>";
echo "<td><a href=\"https://bootswatch.com/2/".$name_themes."\" target=\"_blank\">".ucfirst($name_themes)."</a></td>";
echo "<td><img src=\"https://bootswatch.com/2/".$name_themes."/thumbnail.png\" class=\"img-polaroid anteprima\"></td>";

echo "<td><a href=\"../administrator/?idut=".$cod_md5."&template=all_themes&t_themes=".strtolower($tipo_themes)."\">".strtoupper($tipo_themes)."</a></td>";

if( $st_themes=="attivo" ){
echo "<td><a class=\"btn btn-success btn-small\" id=\"active_th\">".$st_themes."</a></td>";	
}
else{
if( isset($_GET['t_themes']) ){
$t_themes = $_GET['t_themes'];	
echo "<td><a href=\"template/attiva_themes.php?idut=".$cod_md5."&theme=".$name_themes."&t_themes=".$t_themes."\" class=\"btn btn-info btn-small\" id=\"noactive_th\">".$st_themes."</a></td>";	
}	
else{
echo "<td><a href=\"template/attiva_themes.php?idut=".$cod_md5."&theme=".$name_themes."\" class=\"btn btn-info btn-small\" id=\"noactive_th\">".$st_themes."</a></td>";	
	
}
}
echo "<td><a href=\"https://bootswatch.com/2/\" target=\"_blank\">Bootswatch</a></td>";

echo "</tr>";
	
}



?>




</table>
</div>

	
 
</div>

<div class="span3">
<?php
$checked_all=NULL;
$checked_fend=NULL;
$checked_bend=NULL;
if(!isset($_GET['t_themes'])){
$checked_all="checked";
}
elseif( isset($_GET['t_themes']) && $_GET['t_themes']=="front-end" ){
$checked_fend="checked";	
}
elseif( isset($_GET['t_themes']) && $_GET['t_themes']=="back-end" ){
$checked_bend="checked";	
}

?>
<div class="table-responsive filter_temi">
<table class="table table-bordered table-striped table-hover">
<tr class="info">
<td><b><i class="fa fa-filter"></i> Filtri</b></td></tr>
<tr><td>
<label class="checkbox">
<input type="checkbox" <?php echo $checked_all; ?> id="all_themes"> <b>Tutti i Temi</b>
</label>
</td></tr>
<tr><td>
<label class="checkbox">
<input type="checkbox" <?php echo $checked_fend; ?> id="front-end"> <b>Sito (Front-End)</b>
</label>
</td></tr>
<tr><td>
<label class="checkbox">
<input type="checkbox" <?php echo $checked_bend; ?> id="back-end"> <b>Amministrazione (Back-End)</b>
</label>
</td></tr>


</table>
</div>


</div>

</div>

</div>




