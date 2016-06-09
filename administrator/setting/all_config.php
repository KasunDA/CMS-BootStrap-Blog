<?php
$art_rec = fopen("setting/art_rec.txt","r");
$cat_art_rec = fgets($art_rec,1024) ;


$sqlsetting = "SELECT * FROM config ";
$rssetting = @mysqli_query($myconn,$sqlsetting) or die( "Errore....".mysqli_error($myconn) );
while ( $rowsetting = mysqli_fetch_array($rssetting) ){
$logo_blog = html_entity_decode($rowsetting['logo_blog'], ENT_QUOTES, "UTF-8");
$name_blog = html_entity_decode($rowsetting['name_blog'], ENT_QUOTES, "UTF-8");
$title_blog = html_entity_decode($rowsetting['title_blog'], ENT_QUOTES, "UTF-8");	
$st_title_blog = html_entity_decode($rowsetting['st_title_blog'], ENT_QUOTES, "UTF-8");
$section_abaut = html_entity_decode($rowsetting['section_abaut'], ENT_QUOTES, "UTF-8");
$sectionmetadesc = html_entity_decode($rowsetting['sectionmetadesc'], ENT_QUOTES, "UTF-8");
$sectionmetakey = html_entity_decode($rowsetting['sectionmetakey'], ENT_QUOTES, "UTF-8");
$fb = $rowsetting['fb'];
$tw = $rowsetting['tw'];
$gooplus = $rowsetting['gooplus'];
$github = $rowsetting['github'];
$linkem = $rowsetting['linkem'];
$codepen = $rowsetting['codepen'];
$footer_blog = html_entity_decode($rowsetting['footer_blog'], ENT_QUOTES, "UTF-8");
$gooanaly = $rowsetting['gooanaly'];
$cookie_policy = html_entity_decode( $rowsetting['cookie_policy'], ENT_QUOTES, "UTF-8");
}
?>
<div class="row-fluid">
<div class="span12">
<ul class="nav nav-tabs" id="mySetting">
<li class="active"><a href="#setting" data-toggle="tab"><b>Personalizza le Sezioni</b></a></li>
<li><a href="#cookie_policy" data-toggle="tab"><b>Cookie Policy</b></a></li>
<li><a href="#analityc" data-toggle="tab"><b>Google Analitycs</b></a></li>
<li><a href="#robots" data-toggle="tab"><b>robots.txt</b></a></li>
<li><a href="#sitemap" data-toggle="tab"><b>sitemap.xml</b></a></li>

</ul>

</div>
</div>


<div class="tab-content">
<div class="tab-pane active" id="setting">
<div class="row-fluid">
<div class="span12">

<div class="span8">
<?php
$modificato = "<div class=\"alert alert-info\">
             <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
             <i class=\"fa fa-check\"></i>
             <strong>Complimenti!</strong> La modifica é andata a buon fine.
             </div>";


$analytics_code = "<div class=\"alert alert-error\">
             <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
             <i class=\"fa fa-exclamation-circle\"></i>
             <strong>Errore!</strong> L'ID di Monitoreggio non è corretto.
             </div>";			 
			 
if( isset($_GET['mod'])  && $_GET['mod']=="ok"){echo $modificato;}

if( isset($_GET['analyticstracking'])  && $_GET['analyticstracking']=="_not"){echo $analytics_code;}

?>
<hr>
<form class="form-horizontal modarticolo" action="setting/modifica_conf.php?idut=<?php echo $cod_md5; ?>" method="post">

<div class="control-group">
<label class="control-label"><b>Logo Blog: </b><p class="muted"><em>HTML personalizzato</em></p></label>
<div class="controls">
<textarea rows="2" class="input-block-level" name="logoblog">
<?php echo $logo_blog; ?>
</textarea>
</div>
</div>

<div class="control-group">
<label class="control-label"><b>Nome Blog: </b></label>
<div class="controls">
<input type="text" class="input-block-level" name="nameblog" value="<?php echo $name_blog;?>">
</div>
</div>

<div class="control-group">
<label class="control-label"><b>Titolo Blog: </b></label>
<div class="controls">
<input type="text" class="input-block-level" name="titleblog" value="<?php echo $title_blog;?>">
</div>
</div>

<div class="control-group">
<label class="control-label"><b>Sottotitolo Blog: </b></label>
<div class="controls">
<input type="text" class="input-block-level" name="sttitleblog" value="<?php echo $st_title_blog;?>">
</div>
</div>

<div class="control-group">
<label class="control-label"><b>Sezione "About": </b><p class="muted"><em>HTML personalizzato</em></p></label>
<div class="controls">
<textarea rows="10" class="input-block-level" name="sectionabaut">
<?php echo $section_abaut; ?>
</textarea>
</div>
</div>


<div class="control-group">
<label class="control-label"><b>Descrizione Blog: <i class="fa fa-info-circle" title="La descrizione aiuta a indicizzare il blog sui motori di ricerca, inserisci più descrizioni separate da una virgola" id="iconinfo"></i></b></label>
<div class="controls">
<textarea rows="4" class="input-block-level" name="sectionmetadesc">
<?php echo $sectionmetadesc; ?>
</textarea>
</div>
</div>

<div class="control-group">
<label class="control-label"><b>Parole Chiave: <i class="fa fa-info-circle" title="La parole chiave aiutano la ricerca del blog sui motori di ricerca, inserisci tante parole chiave separate da una virgola" id="iconinfo"></i></b></label>
<div class="controls">
<textarea rows="4" class="input-block-level" name="sectionmetakey">
<?php echo $sectionmetakey; ?>
</textarea>
</div>
</div>


<div class="control-group">
<label class="control-label"><b>Profili Social: </b> </label>
<br>
<div class="controls">
<p><i class="fa fa-facebook"></i> Facebook: <input type="text" class="input-block-level" name="fb" placeholder="https://www.facebook.com/Username" value="<?php echo $fb;?>"></p>
<p><i class="fa fa-twitter"></i> Twitter: <input type="text" class="input-block-level" name="tw" placeholder="https://twitter.com/Username" value="<?php echo $tw;?>"></p>
<p><i class="fa fa-google-plus"></i> Google Plus: <input type="text" class="input-block-level" name="gooplus" placeholder="https://plus.google.com/Username" value="<?php echo $gooplus;?>"></p>
<p><i class="fa fa-github"></i> GitHub: <input type="text" class="input-block-level" name="github" placeholder="https://github.com/Username" value="<?php echo $github;?>"></p>
<p><i class="fa fa-linkedin-square"></i> Linkedin: <input type="text" class="input-block-level" name="linkem" placeholder="http://it.linkedin.com/Username" value="<?php echo $linkem;?>"></p>
<p><i class="fa fa-codepen"></i> CodePen: <input type="text" class="input-block-level" name="codepen" placeholder="http://codepen.io/Username" value="<?php echo $codepen;?>"></p>
</div>
</div>
<hr>
<div class="control-group">
<label class="control-label"><b>Footer Blog: </b><p class="muted"><em>HTML personalizzato</em></p></label>
<div class="controls">
<textarea rows="5" class="input-block-level" name="footer">
<?php echo $footer_blog;?>
</textarea>
</div>
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
<hr>
<div class="table-responsive">
<table class="table table-bordered table-striped table-hover">
<tr class="info"><td><b>Altre Opzioni</b></td></tr>
<tr><td>
<label><i class="fa fa-file"></i> <b>Sezione " Recenti "</b></label>
<p class="muted">Nel del front-end del sito c'è la sezione degli articoli recenti, puoi scegliere la categoria.</p>
<p><em>Categoria attualmente in uso:</em></p>
<form class="form-inline" id="art_rec">
<select>
<?php
if($cat_art_rec=="all"){
?>
<option value="all" selected>-- Articoli di Tutte le Categorie--</option>
<?php		
}
else{
?>
<option value="all">-- Articoli di Tutte le Categorie--</option>	
<?php
}
?>

<?php

$qcat = "select * from categorie";
$rcat = @mysqli_query($myconn,$qcat) or die( "Errore....".mysqli_error($myconn) );


while($rowc = mysqli_fetch_array($rcat)){
$n_cat = $rowc['nome_categoria'];  

if($cat_art_rec==$n_cat){
echo "<option value=\"".$n_cat."\" selected>-- ".ucwords($n_cat)." --</option>";
}
else{
echo "<option value=\"".$n_cat."\">-- ".ucwords($n_cat)." --</option>";	
}


}


?>
</select>
</form>
</td></tr>


</table>
</div>

</div>
</div>
</div>
</div>
<div class="tab-pane" id="cookie_policy">
<div class="row-fluid">
<div class="span10">
<div class="alert alert-success">
<strong>NB.</strong><em> Questa è la cookie policy del <a href="../?cookie-policy" target="_blank">front end del sito</a> in base a quelle che sono 
le impostazioni di default del sito, pertanto qualora tali impostazioni vengano modificate da terzi,
cioè vengano settati altri cookie oltre a quelli settati di default dal sito, conviene modificare questa
cookie policy.
</em>
</div>
<hr>
<form method="post" action="setting/mod_cookie_p.php?idut=<?php echo $cod_md5; ?>">
<fieldset>
<legend>Modifica Cookie Policy</legend>
<textarea rows="20" class="span12" name="coopl">
<?php  echo $cookie_policy; ?>
</textarea>
<p><input type="submit"  class="btn btn-primary" value="Salva"></p>
</fieldset>
</form>


</div>
</div>


</div>

<div class="tab-pane" id="analityc">
<div class="row-fluid">
<div class="span10">
<form method="post" action="setting/codice_analytics.php?idut=<?php echo $cod_md5; ?>">
<label><i class="fa fa-area-chart"></i> Google Analitycs (ID monitoraggio):</label>
<textarea class="span6" rows="1"  placeholder="Incolla qui il tuo ID monitoraggio, es UA-11111111-1" name="analytics">
<?php echo $gooanaly;?>
</textarea>
<p><a href="https://support.google.com/analytics/answer/1032385?hl=it" target="_blank">Genera ID monitoraggio</a></p>
<button type="submit" class="btn btn-primary btn-small">Salva</button>
</form>
</div>
</div>
</div>

<div class="tab-pane" id="robots">
<div class="row-fluid">
<div class="span10">
<div class="alert alert-success">
<em>Il file <strong>robots.txt</strong> é un file di testo memorizzato nella directory principale del sito e indica quali parti di tale sito 
non sono accessibili ai crawler dei motori di ricerca. Il file utilizza il <a href="https://support.google.com/webmasters/answer/6062608?hl=it" target="_blank">protocollo di esclusione robot</a>, un protocollo con un piccolo insieme di comandi che puoi 
utilizzare per indicare l'accesso al sito in base alla sezione e a specifici tipi di crawler web (come i crawler dei dispositivi mobili o quelli dei computer desktop).
</em>
</div>
<hr>
<form method="post" action="setting/mod_robots.php?idut=<?php echo $cod_md5; ?>">
<fieldset>
<legend>Modifica robots.txt</legend>
<textarea rows="20" class="span12" name="roob">
<?php  include(__ROOT__.'/robots.txt'); ?>
</textarea>
<p><input type="submit"  class="btn btn-primary" value="Salva"></p>
</fieldset>
</form>
</div>
</div>
</div>



<div class="tab-pane" id="sitemap">
<div class="row-fluid">
<div class="span10">
<div class="alert alert-success">
<em>Il file <strong>sitemap.xml</strong> é un file dove vengono memorizzati tutti i link delle pagine web del sito, tale file viene aggiornato automaticamente.
Il file è accessibile dal seguente link <a href="<?php echo "http://".$_SERVER['HTTP_HOST']."/sitemap.xml" ; ?>" target="_blank"><?php echo "http://".$_SERVER['HTTP_HOST']."/sitemap.xml" ; ?></a>.
</em>
</div>
<hr>
    <ol>
      <li><a href="<?php echo "http://".$_SERVER['HTTP_HOST']."/" ; ?>" target="_blank"><?php echo "http://".$_SERVER['HTTP_HOST']."/" ; ?></a></li>
	  <li><a href="<?php echo "http://".$_SERVER['HTTP_HOST']."/?cookie-policy"; ?>" target="_blank"><?php echo "http://".$_SERVER['HTTP_HOST']."/?cookie-policy"; ?></a></li>
      <?php
	  $sqlart = "SELECT * FROM articoli WHERE visibility = \"Si\"";
     $rs_sqlart = @mysqli_query($myconn,$sqlart) or die( "Errore....".mysqli_error($myconn) );
     $num_art= $rs_sqlart->num_rows;
	 while($row_art  = mysqli_fetch_array( $rs_sqlart)){	
$alias = $row_art['alias'];
$categoria = $row_art['categoria'];
$archiviato = $row_art['archiviato'];
$cestinato = $row_art['cestinato'];
$ult_mod = $row_art['ult_mod'];
$datacreate = $row_art['datacreate'];

$arraydata = explode("-",$datacreate);
$mese = $arraydata[1];$anno = $arraydata[0];
$nome_archivio = arch($mese,$anno);
$arraynome_archivio = explode(" ",$nome_archivio);
$newnome_archivio = strtolower($arraynome_archivio[0])."-".$arraynome_archivio[1];
if( $archiviato=="Si" ){
$url_art_arch = "http://".$_SERVER['HTTP_HOST']."/archivie/".$newnome_archivio."/".$alias.".htm";
echo "<li><a href=\"".$url_art_arch."\" target=\"_blank\">".$url_art_arch."</a></li>";
}
else{

$url_art = "http://".$_SERVER['HTTP_HOST']."/".$alias.".html";
echo "<li><a href=\"".$url_art."\" target=\"_blank\">".$url_art."</a></li>";

}
}
	  
?>
</ol>


</div>
</div>
</div>

</div>



