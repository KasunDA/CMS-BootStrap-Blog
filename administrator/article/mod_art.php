
<div class="span8">    
<?php
$mssgtrue = "<div class=\"alert alert-info\">
             <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
             <i class=\"fa fa-check\"></i>
             <strong>Complimenti!</strong> La modifica ".utf8_encode("é")." andata a buon fine.
             </div>";
             
$data_mod = date("d/m/Y");        
$idut = $_GET['idut'];



if( isset($_GET['mod_art']) && !is_null($_GET['mod_art']) ){
$mod_art =   $_GET['mod_art'];



$sqlcat = "select * from categorie";
$rs_cat = @mysqli_query($myconn,$sqlcat) or die( "Errore....".mysqli_error($myconn) );
$cat = array();

while($row_cat = mysqli_fetch_array($rs_cat)){
$n_cat = $row_cat['nome_categoria'];    
$cat[$n_cat]=$n_cat;  
}
$option_cat = NULL;


$vis = array('Si'=>'Si','No'=>'No');
$option_vis = NULL;


$query =" SELECT * FROM articoli WHERE idart='$mod_art' ";
$result = @mysqli_query($myconn,$query) or die( "Errore....".mysqli_error($myconn) );
    
    
    
while($row = mysqli_fetch_array($result)){
$id_art = $row['idart'];
$tit_art = $row['titart'];
$alias = $row['alias'];
$metadesc = $row['metadesc'];
$metakey = $row['metakey'];
$cat_art = $row['categoria'];
$data_cr = $row['datacreate'];
$author = $row['author'];
$profileauthor = $row['profile_author'];
$contart = $row['contart'];
$view = $row['visibility'];


    
}    
if( isset($_GET['status']) && $_GET['status']=="true" ){
    
 echo $mssgtrue;   
}
    

?>

<hr>
<form class="form-horizontal modarticolo" action="article/modifica.php?idut=<?php echo $idut;?>&mod_art=<?php echo $mod_art?>" method="post">
    
<div class="control-group">
<label class="control-label" for="Titolo"><b>Titolo Articolo: </b></label>
<div class="controls">
<input type="text" class="input-block-level" id="Titolo" name="titart" value="<?php echo $tit_art;?>">
</div>
</div>

<div class="control-group">
<label class="control-label" for="Alias"><b>Alias Articolo: <i class="fa fa-info-circle" title="Alias indica l'url della pagina che visualizza l'articolo, viene generato in automatico." id="iconinfo"></i> </b></label>
<div class="controls">
<span  
       class="input-block-level uneditable-input"
       id="Alias">
    <?php echo $alias;?>
</span>
</div>
</div>

<div class="control-group">
<label class="control-label" for="Descrizione"><b>Descrizione: </b></label>
<div class="controls">
<input type="text" class="input-block-level" name="metadesc" id="Descrizione" value="<?php echo $metadesc;?>">
</div>
</div>

<div class="control-group">
<label class="control-label" for="Keyword"><b>Parole Chiave: </b></label>
<div class="controls">
<input type="text" class="input-block-level" id="Keyword" name="metakey" value="<?php echo $metakey;?>">
</div>
</div>   
    
<div class="control-group">    
<label class="control-label" for="Categoria"><b>Categoria Articolo: </b></label>
<div class="controls">
<select name="categoria" id="Categoria">
<?php
if( isset($cat_art) ){    
foreach($cat as $chiave => $valore) {    
if($cat_art==$chiave){
$option_cat .=  "<option value='$chiave' selected>$valore</option>";
}
else{
$option_cat .=  "<option value='$chiave'>$valore</option>";    
}
}        
}
echo $option_cat;
?>
</select>
</div>
</div>   


<div class="control-group">  
<label class="control-label" for="Data"><b>Data di Creazione: <i class="fa fa-info-circle" title="Formato data gg/mm/aaaa" id="iconinfo"></i></b></label>
<div class="controls">
<input type="text" class="input-block-level" id="Data" maxlength="10" name="datacreate" value="<?php echo dataIT($data_cr);?>">
</div>
</div>   

<div class="control-group">  
<label class="control-label" for="author"><b>Autore: </b></label>
<div class="controls">
<input type="text" class="input-block-level" id="author" name="author" value="<?php echo $author ?>">
</div>
</div>

<div class="control-group">  
<label class="control-label" for="profile_author"><b>Profilo Autore: </b></label>
<div class="controls">
<input type="text" class="input-block-level" id="profile_author"  name="profile_author" placeholder="Profilo Facebook o Twitter o ect.." value="<?php echo $profileauthor; ?>">
</div>
</div>


<div class="control-group">  
<label class="control-label" for="Contenuto"><b>Contenuto Articolo: </b></label>
<div class="controls">
<textarea rows="15"  class="input-block-level" id="Contenuto" name="contenuto">
<?php echo $contart; ?>   
</textarea>
</div>
</div> 


<div class="control-group">    
<label class="control-label" for="Visibile"><b>Pubblicato: </b></label>
<div class="controls">
<select name="visibile" id="Visibile">
<?php
if( isset($view) ){
    
foreach($vis as $chiave => $valore) {
    
if($view==$chiave){
    
$option_vis .=  "<option value='$chiave' selected>$valore</option>";

    
    }
else{
    
 $option_vis.=  "<option value='$chiave'>$valore</option>";   
 
}
}    
    
}
echo $option_vis;
?>
</select>
</div>
</div>

<div class="control-group">  
<div class="controls">
<input type="hidden" class="input-block-level" name="ultimamod" value="<?php echo $data_mod;?>">
</div>
</div>

<hr>
    
<div class="control-group">
<div class="controls">
<input type="submit" class="btn btn-primary" value="Salva">        
</div>
</div>
</form>
<?php    
}
?>
</div>

<div class="span3 offset1">
<div class="table-responsive">
<table class="table table-bordered table-striped table-hover">
<tr class="info"><td><b>Opzioni Articolo</b></td></tr>
<tr><td>
<form action="article/option_vis_article.php?idut=<?php echo $idut;?>&opt_art=<?php echo $mod_art; ?>" method="post">
<fieldset>
 <legend><h5>Visualizza:</h5></legend>
<?php
$sqlopt_article = "select option_article from articoli where idart='$mod_art'";
$rsopt_article = @mysqli_query($myconn,$sqlopt_article) or die( "Errore....".mysqli_error($myconn) );
$rowopt_article =  mysqli_fetch_array($rsopt_article);
$option_article = $rowopt_article['option_article'];
$uns_option_article = unserialize($option_article);

$title=NULL;$author=NULL;$date=NULL;$link=NULL;$hideall=NULL;$view=NULL;$click=NULL;$comment=NULL;$opt=NULL;

for($i=0; $i<count($uns_option_article);$i++){
if( $uns_option_article[$i]=="hideall" ){$hideall="checked";}	
if( $uns_option_article[$i]=="title" ){$title="checked";}	
if( $uns_option_article[$i]=="author" ){$author="checked";}		
if( $uns_option_article[$i]=="date" ){$date="checked";}	
if( $uns_option_article[$i]=="link" ){$link="checked";}		
if( $uns_option_article[$i]=="click" ){$click="checked";}	
if( $uns_option_article[$i]=="comment" ){$comment="checked";}
if( $uns_option_article[$i]=="opt" ){$opt="checked";}
}



?> 
<label class="checkbox">
<input type="checkbox" name="ck[]" value="opt" id="opt" <?php echo $opt; ?>>Facebook,Stampa,Prefetito
</label>
<label class="checkbox">
<input type="checkbox" name="ck[]" value="click" id="click" <?php echo $click; ?>>Visite 
</label>
<label class="checkbox">
<input type="checkbox" name="ck[]" value="comment" id="comment" <?php echo $comment; ?>>Commenti
</label>

<label class="checkbox">
<input type="checkbox" name="ck[]" value="title" id="title" <?php echo $title; ?>> Titolo
</label>
<label class="checkbox">
<input type="checkbox" name="ck[]" value="author" id="author" <?php echo $author; ?>> Autore
</label>
<label class="checkbox">
<input type="checkbox" name="ck[]" value="date" id="date" <?php echo $date; ?>> Data di creazione
</label>
<label class="checkbox">
<input type="checkbox" name="ck[]" value="link" id="link" <?php echo $link; ?>> Link "Continua a leggere.."
</label>

<br>
<p class="muted"><em>Questa opzione indica che verranno nascosti il Titolo, Autore, Data e il Link "Continua a leggere.."</em></p>
<label class="checkbox">
<input type="checkbox" name="ck[]" value="hideall" id="hideall" <?php echo $hideall; ?>> Tutto Nascosto
</label>



<hr>
<input type="submit" class=" btn-primary btn-small" value="Salva"> 
</fieldset>

</form>


</td></tr>
</table>
</div>

</div>