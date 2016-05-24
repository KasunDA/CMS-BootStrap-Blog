<?php
$data = date("d/m/Y");   
$nome_cat = $_GET['new_category'];
$mssg = "<div class=\"alert\">
             <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
             <i class=\"fa fa-exclamation-circle\"></i><b> Operazione non riuscita!</b>. Esiste una categoria con lo stesso nome.</div>";

$mssgver_alias = "<div class=\"alert\">
             <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
             <i class=\"fa fa-exclamation-circle\"></i> Scegli un'altro nome per questa categoria, non usare nomi uguali a quelli degli articoli attualmente esistenti.</div>";
			 			 


?>
<div class="span8">
<?php
if( $_GET['new_category']=="exist" ){
	echo $mssg;
}

if( $_GET['new_category']=="ver_alias" ){
	echo $mssgver_alias;
}
?>
<hr>
<form class="form-horizontal nuovacategoria" action="category/nuova_cat.php?idut=<?php echo $cod_md5;?>" method="post">
    
<div class="control-group">
<label class="control-label" for="Categoria"><b>Nome Categoria: </b></label>
<div class="controls">
<input type="text" class="input-block-level" id="Categoria" name="nome_cat" value="">
</div>
</div>

<div class="control-group">    
<label class="control-label" for=""><b>Stato: </b></label>
<div class="controls">
<select name="stato_cat">
<option value="enabled">Abilitata</option>
<option value="disabled">Disabilitata</option>
</select>
</div>
</div> 

<div class="control-group">  
<label class="control-label" for="Data"><b>Data di Creazione: </b></label>
<div class="controls">
<input type="text" class="input-block-level" id="Data" maxlength="10" name="datacreate" value="<?php echo $data; ?>">
</div>
</div>

<div class="control-group">  
<label class="control-label" for="Desc_Cat"><b>Descrizione: </b></label>
<div class="controls">
<input type="text" class="input-block-level" id="Desc_Cat" name="desc_cat" value="">
</div>
</div>

<div class="control-group">  
<label class="control-label" for="meta_key"><b>Parole Chiave: </b></label>
<div class="controls">
<input type="text" class="input-block-level" id="meta_key" name="meta_key" value="">
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
