<div class="row-fluid">
<div class="span12">
<?php
if( isset($_GET['theme']) && $_GET['theme']=="_not_file" ){
?>
<div class="alert">
<button type="button" class="close" data-dismiss="alert">&times;</button>
<strong><i class="fa fa-info-circle" aria-hidden="true"></i> Nessun file selezionato...</strong> .
</div>
<?php	
}
if( isset($_GET['theme']) && $_GET['theme']=="_exist_file" ){
?>
<div class="alert alert-info">
<button type="button" class="close" data-dismiss="alert">&times;</button>
<strong><i class="fa fa-info-circle" aria-hidden="true"></i> Esiste già un tema con lo stesso nome.!</strong> .
</div>
<?php	
}
if( isset($_GET['theme']) && $_GET['theme']=="_extract" ){
?>
<div class="alert alert-success">
<button type="button" class="close" data-dismiss="alert">&times;</button>
<strong><i class="fa fa-check" aria-hidden="true"></i> Nuovo tema installato con successo.</strong> .
</div>

<?php	
}
if( isset($_GET['theme']) && $_GET['theme']=="_not_extension" ){
?>
<div class="alert alert-error">
<button type="button" class="close" data-dismiss="alert">&times;</button>
<strong><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Il file ha un estensione non ammessa!</strong> .
</div>
<?php
}
if( isset($_GET['theme']) && $_GET['theme']=="_error" ){
?>
<div class="alert alert-error">
<button type="button" class="close" data-dismiss="alert">&times;</button>
<strong><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Tema non valido!</strong> .
</div>

<?php	
}
?>
<form  action="../administrator/template/extract.php?idut=<?php echo $cod_md5; ?>" method="post" enctype="multipart/form-data" class="form-inline" id="">
<fieldset>
<legend>Installa&nbsp;Nuovo&nbsp;Tema (<em>&nbsp;Scarica&nbsp;<a href>Nuovi</a>&nbsp;Temi&nbsp;</em>)</legend>
<input name="userfile" type="file">
<input type="submit" value="Installa" class="btn btn-info">

</fieldset>
</form>
<hr>
</div>
</div>

<div class="row-fluid">
<div class="span12">

<div class="span2">
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
<input type="checkbox" <?php echo $checked_fend; ?> id="front-end"> <b>Sito</b>
</label>
</td></tr>
<tr><td>
<label class="checkbox">
<input type="checkbox" <?php echo $checked_bend; ?> id="back-end"> <b>Amministrazione</b>
</label>
</td></tr>


</table>
</div>
</div>

<div class="span10">

<div class="table-responsive">
<table class="table table-bordered table-striped table-hover">
<tr class="info">
<td><b>#</b></td>
<td><b>Tema</b></td>
<td><b>Anteprima</b></td>
<td><b>Tipo</b></td>
<td><b>Stato</b></td>
<td><b>Versione</b></td>

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
echo "<td>".ucfirst($name_themes)."</td>";
echo "<td><img src=\"../../assets/css/temi/".$name_themes."/thumbnail.png\" class=\"img-polaroid anteprima\"></td>";

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
echo "<td><a href=\"http://getbootstrap.com/2.3.2/\" target=\"_blank\">Bootstrap 2</a></td>";

echo "</tr>";
	
}



?>




</table>
</div>

	
 
</div>



</div>

</div>




