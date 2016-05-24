<?php
$data = date("d/m/Y");   
?>
<div class="span8">
<hr>
<form class="form-horizontal new_article" action="article/nuovo.php?idut=<?php echo $cod_md5;?>" method="post">
    
<div class="control-group">
<label class="control-label" for="Titolo"><b>Titolo Articolo: </b></label>
<div class="controls">
<input type="text" class="input-block-level" id="Titolo" name="titart" value="">
</div>
</div>

<div class="control-group">
<label class="control-label" for="Descrizione"><b>Meta Description: </b></label>
<div class="controls">
<input type="text" class="input-block-level" name="metadesc" id="Descrizione" value="">
</div>
</div>

<div class="control-group">
<label class="control-label" for="Keyword"><b>Meta Keyword: </b></label>
<div class="controls">
<input type="text" class="input-block-level" id="Keyword" name="metakey" value="">
</div>
</div>

<div class="control-group">    
<label class="control-label" for="Categoria"><b>Categoria Articolo: </b></label>
<div class="controls">
<select name="categoria" id="Categoria">
<?php
$sqlcat = "select * from categorie";
$rs_cat = @mysqli_query($myconn,$sqlcat) or die( "Errore....".mysqli_error($myconn) );

while($row_cat = mysqli_fetch_array($rs_cat)){
$n_cat = $row_cat['nome_categoria'];    

if($n_cat=="NESSUNA"){
echo "<option value='$n_cat' selected>$n_cat</option>";	
}
else{echo "<option value='$n_cat'>$n_cat</option>";}

}
?>
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
<label class="control-label" for="author"><b>Autore: </b></label>
<div class="controls">
<span class="input-block-level uneditable-input" id="author">
<?php echo $nomecognomeuser;?>
</span>
</div>
</div>

<div class="control-group">  
<label class="control-label" for="profile_author"><b>Profilo Autore: </b></label>
<div class="controls">
<input type="text" class="input-block-level" id="profile_author" name="profile_author" placeholder="Profilo Facebook o Twitter o ect.." value="">
</div>
</div>

<div class="control-group">  
<label class="control-label" for="option"><b>Opzioni Visualizzazione: </b></label>
<div class="controls">

<label class="checkbox inline">
<input type="checkbox" name="ck[]" value="opt" id="opt"> Facebook,Stampa,Prefetito
</label>

<label class="checkbox inline">
<input type="checkbox" name="ck[]" value="click" id="click"> Visite
</label>
<label class="checkbox inline">
<input type="checkbox" name="ck[]" value="comment" id="comment"> Commenti
</label> 
<label class="checkbox inline">
<input type="checkbox" name="ck[]" value="title" id="title"> Titolo
</label>
<label class="checkbox inline">
<input type="checkbox" name="ck[]" value="author" id="author"> Autore
</label>
<label class="checkbox inline">
<input type="checkbox" name="ck[]" value="date" id="date"> Data di creazione
</label>
<label class="checkbox inline">
<input type="checkbox" name="ck[]" value="link" id="link"> Link "Continua a leggere.."
</label>
<label class="checkbox inline">
<input type="checkbox" name="ck[]" value="hideall" id="hideall"> Tutto Nascosto
</label>

</div>
</div>

<div class="control-group">  
<label class="control-label" for="Contenuto"><b>Contenuto Articolo: </b></label>
<div class="controls">
<textarea rows="15"  class="input-block-level" id="Contenuto" name="contenuto"> 
</textarea>
</div>
</div>

<div class="control-group">    
<label class="control-label" for="Visibile"><b>Pubblicato: </b></label>
<div class="controls">
<select name="visibile" id="Visibile">
<option value="Si">Si</option>
<option value="No">No</option>
</select>
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





