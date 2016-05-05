<?php

if( isset($_GET['mod_cat_admin']) ){
$mod_cat_admin = $_GET['mod_cat_admin'];

$categ_admin =" SELECT * FROM categ_admin WHERE alias_nome_cat='$mod_cat_admin'";
$rs_categ_admin = @mysqli_query($myconn,$categ_admin) or die( "Errore....".mysqli_error($myconn) );
while($row = mysqli_fetch_array($rs_categ_admin) ){
$nome_cat = $row['nome_cat_admin'];	
$restrizioni = $row['restrizioni'];
$ck = unserialize($restrizioni);
}

$nr=NULL;
$cont1 = NULL;
$cont2=NULL;
$cont3=NULL;
$cont4=NULL;
$cont5=NULL;
$user1 = NULL;
$user2=NULL;
$user3=NULL;
$user4=NULL;
$main1=NULL;
$main2=NULL;
$temp1=NULL;
$temp2=NULL;
$conf1=NULL;



if( isset($ck) ){

for($i=0; $i<count($ck);$i++){
if($ck[$i]=="nr"){$nr="checked";}
elseif($ck[$i]=="user1"){$user1="checked";}
elseif($ck[$i]=="user2"){$user2="checked";}
elseif($ck[$i]=="user3"){$user3="checked";}
elseif($ck[$i]=="user4"){$user4="checked";}
elseif($ck[$i]=="cont1"){$cont1="checked";}
elseif($ck[$i]=="cont2"){$cont2="checked";}
elseif($ck[$i]=="cont3"){$cont3="checked";}
elseif($ck[$i]=="cont4"){$cont4="checked";}
elseif($ck[$i]=="cont5"){$cont5="checked";}
elseif($ck[$i]=="main1"){$main1="checked";}	
elseif($ck[$i]=="main2"){$main2="checked";}	
elseif($ck[$i]=="temp1"){$temp1="checked";}	
elseif($ck[$i]=="temp2"){$temp2="checked";}	
elseif($ck[$i]=="conf1"){$conf1="checked";}	
}	
	
	
}
	


?>

<div class="span6 offset1">
<?php
$mssgtrue = "<div class=\"controls\"><div class=\"alert alert-info\">
             <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
             <i class=\"fa fa-check\"></i>
             <strong>Complimenti!</strong> La modifica é andata a buon fine.
             </div></div>";
             
if( isset($_GET['st_mod']) &&   $_GET['st_mod']=="ok" ){
    
echo $mssgtrue;    
    
    } 


?>

<form class="form-horizontal" action="utenti/restrizioni.php?idut=<?php echo $cod_md5; ?>&mod_cat_admin=<?php echo $mod_cat_admin; ?>" method="post">

<legend>Utente: <em><?php echo $nome_cat;?> </em> <em class="muted"><small>(*I campi selezionati indicano una restrizione.)</small></em></legend>

<div class="control-group">
<label class="checkbox">
<div class="controls">
<input type="checkbox" name="ck[]" value="nr" <?php echo $nr; ?> id="nr"> Nessuna Restrizione
</div>
</label>
</div>
<hr>
<label><h5>Contenuti</h5></label>
<div class="control-group">
<label class="checkbox">
<div class="controls">
<input type="checkbox" name="ck[]" value="cont1" <?php echo $cont1; ?> id="cont1"> Modifica Articoli</div>
</label>
</div>

<div class="control-group">
<label class="checkbox">
<div class="controls">
<input type="checkbox" name="ck[]" value="cont2" <?php echo $cont2; ?> id="cont2"> Nuovo Articolo</div>
</label>
</div>

<div class="control-group">
<label class="checkbox">
<div class="controls">
<input type="checkbox" name="ck[]" value="cont3" <?php echo $cont3; ?> id="cont3"> Modifica Categoria Articoli</div>
</label>
</div>

<div class="control-group">
<label class="checkbox">
<div class="controls">
<input type="checkbox" name="ck[]" value="cont4" <?php echo $cont4; ?> id="cont4"> Nuova Categoria Articoli</div>
</label>
</div>

<div class="control-group">
<label class="checkbox">
<div class="controls">
<input type="checkbox" name="ck[]" value="cont5" <?php echo $cont5; ?> id="cont4"> Modifica Stato Categoria Articoli</div>
</label>
</div>



<hr>
<label><h5>Utenti</h5></label>
<div class="control-group">
<label class="checkbox">
<div class="controls">
<input type="checkbox" name="ck[]" value="user1" <?php echo $user1; ?> id="user1"> Modifica Utenti</div>
</label>
</div>
<div class="control-group">
<label class="checkbox">
<div class="controls">
<input type="checkbox" name="ck[]" value="user2" <?php echo $user2; ?> id="user2"> Nuovo Utente</div>
</label>
</div>
<div class="control-group">
<label class="checkbox">
<div class="controls">
<input type="checkbox" name="ck[]" value="user3" <?php echo $user3; ?> id="user3"> Modifica Categoria Utenti</div>
</label>
</div>

<div class="control-group">
<label class="checkbox">
<div class="controls">
<input type="checkbox" name="ck[]" value="user4" <?php echo $user4; ?> id="user4"> Invia E-Mail Utenti</div>
</label>
</div>

<label><h5>Menù Sito</h5></label>
<div class="control-group">
<label class="checkbox">
<div class="controls">
<input type="checkbox" name="ck[]" value="main1" <?php echo $main1; ?> id="main1"> Modifica Voce Menù</div>
</label>
</div>

<div class="control-group">
<label class="checkbox">
<div class="controls">
<input type="checkbox" name="ck[]" value="main2" <?php echo $main2; ?> id="main2"> Aggiungi Voce Menù</div>
</label>
</div>

<label><h5>Template</h5></label>
<div class="control-group">
<label class="checkbox">
<div class="controls">
<input type="checkbox" name="ck[]" value="temp1" <?php echo $temp1; ?> id="temp1"> Cambia Template Sito</div>
</label>
</div>
<div class="control-group">
<label class="checkbox">
<div class="controls">
<input type="checkbox" name="ck[]" value="temp2" <?php echo $temp2; ?> id="temp2"> Cambia Template Amministrazione</div>
</label>
</div>

<label><h5>Gestisci Impostazioni</h5></label>
<div class="control-group">
<label class="checkbox">
<div class="controls">
<input type="checkbox" name="ck[]" value="conf1" <?php echo $conf1; ?> id="conf1"> Modifica Configurazioni Sito</div>
</label>
</div>

<hr>
<div class="control-group">
<div class="controls">
<input type="submit" class="btn btn-primary" value="Salva">        
</div>
</div>

</form>
</div>
<div class="span3 offset1">
<div class="table-responsive">
<table class="table table-bordered table-striped table-hover">
<tr class="info">
<td><b>Altre Categorie Utenti</b></td>
</tr>
<?php
$altre_categ =" SELECT * FROM categ_admin WHERE alias_nome_cat!='$mod_cat_admin'";
$rsaltre_categ = @mysqli_query($myconn,$altre_categ) or die( "Errore....".mysqli_error($myconn) );
while($rowaltre_categ = mysqli_fetch_array($rsaltre_categ) ){
$nome_altre_categ= $rowaltre_categ['nome_cat_admin'];	
$alias_altre_categ = $rowaltre_categ['alias_nome_cat'];
echo "<tr><td><a href=\"../administrator/?idut=".$cod_md5."&mod_cat_admin=".$alias_altre_categ."\">".$nome_altre_categ."</a></td></tr>";	
}
?>

</table>
</div>


</div>
<?php } ?>



