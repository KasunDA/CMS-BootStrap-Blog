
<div class="span8">
<?php

$mssgtruedisabled = "<div class=\"alert\">
             <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
             <i class=\"fa fa-exclamation-circle\"></i>  Avendo disabilitato questa categoria tutti gli articoli con questa categoria sono stati sospesi.
             </div>";
			 
$mssgtrue = "<div class=\"alert alert-info\">
             <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
             <i class=\"fa fa-check\"></i>
             <strong>Complimenti!</strong> La modifica é andata a buon fine.</div>";
			 
if(isset($_GET['status']) && $_GET['status']=="true"){
	
 echo $mssgtrue;  	
	
}
if( isset($_GET['status']) && $_GET['status']=="true" && isset($_GET['disabled']) ){
    
 echo $mssgtruedisabled;   
}



$data = date("d/m/Y");   
$idut = $_GET['idut'];
$mod_category = $_GET['mod_category'];

$statocat = array("enabled"=>"Abilitata","disabled"=>"Disabilitata");
$option_stato_cat = NULL;

$sqlcat = " SELECT * FROM categorie WHERE idcategoria='$mod_category' ";
$rscat = @mysqli_query($myconn,$sqlcat) or die( "Errore....".mysqli_error($myconn) );

while($rowcat = mysqli_fetch_array($rscat)){
$idcategoria = $rowcat['idcategoria'];
$nome_cat = $rowcat['nome_categoria'];
$data_cat = $rowcat['data_cat'];
$data_mod_cat = $rowcat['data_mod_cat'];
$stato_cat = $rowcat['stato_cat'];
$descr_cat = $rowcat['descr_cat'];
$meta_key = $rowcat['meta_key'];

?>


<hr>
<form class="form-horizontal modcategoria" action="category/modifica_cat.php?idut=<?php echo $idut; ?>&idcat=<?php echo $idcategoria; ?>" method="post">
    
<div class="control-group">
<label class="control-label" for="Nome_Cat"><b>Nome Categoria: <i class="fa fa-info-circle" title="Il nome della categoria non puo' essere modificato, ma puoi crearne una nuova." id="iconinfo"></i></b></label>
<div class="controls">
<span class="input-block-level uneditable-input"  id="Nome_Cat"><?php echo $nome_cat;?></span>
</div>
</div>

<div class="control-group">    
<label class="control-label" for=""><b>Stato: </b></label>
<div class="controls">
<select name="stato_cat" id="Stato_Cat">
<?php
if( isset($stato_cat) ){
	
foreach($statocat as $chiave => $valore) {

if($stato_cat==$chiave){
$option_stato_cat .=  "<option value='$chiave' selected>$valore</option>";	
}	
else{    
$option_stato_cat .=  "<option value='$chiave'>$valore</option>";    
}	
}		
}
echo $option_stato_cat;
?>
</select>
</div>
</div> 

<div class="control-group">  
<label class="control-label" for="Data"><b>Data di Creazione: </b></label>
<div class="controls">
<input type="text" class="input-block-level" id="Data" maxlength="10" name="datacreate" value="<?php echo $data_cat; ?>">
</div>
</div>

<div class="control-group">  
<label class="control-label" for="Desc_Cat"><b>Descrizione: </b></label>
<div class="controls">
<input type="text" class="input-block-level" id="Desc_Cat" name="desc_cat" value="<?php echo $descr_cat; ?>">
</div>
</div>


<div class="control-group">  
<label class="control-label" for="meta_key"><b>Parole Chiave: </b></label>
<div class="controls">
<input type="text" class="input-block-level" id="meta_key" name="meta_key" value="<?php echo $meta_key; ?>">
</div>
</div>


<input type="hidden" class="input-block-level" name="ultimamod" value="<?php echo $data;?>">
<hr>    
<div class="control-group">
<div class="controls">
<input type="submit" class="btn btn-primary" value="Salva">        
</div>
</div>


</form>
   
</div>

<?php } ?>
<div class="span3 offset1">
<div class="span12">
<div class="table-responsive">
<table class="table table-bordered table-striped table-hover">
<tr class="info">
<td><b>Altre Categorie</b></td>
</tr>
<?php 
$sql = " SELECT * FROM categorie WHERE idcategoria!='$mod_category' ";
$rs = @mysqli_query($myconn,$sql) or die( "Errore....".mysqli_error($myconn) );
$count = $rs->num_rows;

if($count==0){echo "<tr><td>nessun altra categoria.</td></tr>";}
else{
	
while($row = mysqli_fetch_array($rs)){
$ncat = $row['nome_categoria'];	
$idc = $row['idcategoria'];
echo "<tr><td><a href=\"../administrator/?idut=".$idut."&mod_category=".$idc."\">".$ncat."</a></td></tr>>";
}		
}
?>
<tr>
<td>
<a href="../administrator/?idut=<?php echo $idut;?>&new_category" class="btn btn-small btn-success" type="button">
<i class="fa fa-folder-o"></i> 
Crea Categoria
</a>
</td>
</tr>
</table>
</div>
</div>
</div>