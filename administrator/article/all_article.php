<?php
$textfile = fopen("limit/limit.txt","r");
$view_art = fgets($textfile,1024) ;

$opt_view = array(2=>2 , 4=>4, 10=>10, 20=>20 , 25=>25 , 30=>30 );
$opt_view_status = NULL;


$all_pages = ceil($row_art/ $view_art); 
$all_pages_vis = ceil($row_art_vis/$view_art);
$all_pages_not_vis = ceil($row_art_not_vis/$view_art);
$all_pages_cest = ceil($row_art_cest/$view_art);
$all_pages_arch = ceil($row_art_arch/$view_art);

if( isset($_GET['nm_arch'] ) ){
$all_pages_nm_arch = ceil($row_art_nm_arch/$view_art);	
}



if( isset($_GET['search']) ){
$all_pages_search = ceil($row_search/$view_art);	

}


if( isset($_GET['dt']) ){
$all_pages_dt = ceil($rowdt/$view_art);	
}

foreach($categ as $chiave => $valore) {
	
if( isset($_GET['p_use'])  && $_GET['p_use']=="all_article" && isset($_GET['ct']) && $_GET['ct']==$valore ){
$all_pages_categoria = ceil($rowcategoria/$view_art);	
}	

}

$p = isset($_GET['p']) ? $_GET['p']:1;
$first = ( ($p - 1) * $view_art );



$idut = $_GET['idut'];
$status = array('seleziona'=>'-- Seleziona Stato --','pubblicato'=>'Pubblicato','sospeso'=>'Sospeso','cestinato'=>'Cestinato','archiviato'=>'Archiviato');
$option_status = NULL;


if( isset($_GET['p_use']) ){
	
$p_use = $_GET['p_use'];
$q = strtoupper(substr($p_use,4));	

$sql_search = "select titart from articoli";
$rs_search = @mysqli_query($myconn,$sql_search) or die( "Errore articoli...".mysqli_error($myconn) );

$sqlcat = "select * from categorie";
$rs_cat = @mysqli_query($myconn,$sqlcat) or die( "Errore categorie...".mysqli_error($myconn) );

$sqldt = "select datacreate from articoli";
$rs_dt = @mysqli_query($myconn,$sqldt) or die( "Errore datacreate articoli....".mysqli_error($myconn) );

$sqlvis = "select visibility from articoli";
$rs_vis = @mysqli_query($myconn,$sqlvis) or die( "Errore visibility articoli....".mysqli_error($myconn) );

$sqlcest = "select cestinato from articoli";
$rs_cest = @mysqli_query($myconn,$sqlcest) or die( "Errore cestinato articoli....".mysqli_error($myconn) );

$sqlarch = "select archiviato from articoli";
$rs_arch = @mysqli_query($myconn,$sqlarch) or die( "Errore archiviato articoli....".mysqli_error($myconn) );;

$sqlnm_arch = "select * from archivio";
$rsnm_arch = @mysqli_query($myconn,$sqlnm_arch) or die( "Errore archiviato articoli....".mysqli_error($myconn) );;



if( $p_use==NULL || $p_use=="all_article" || is_numeric($p_use) || $p_use!="all_article"){

$query =" SELECT * FROM articoli ORDER BY titart ASC LIMIT $first , $view_art"; 

}


while($row_cat = mysqli_fetch_array($rs_cat)){
$nome_categoria = $row_cat['nome_categoria'];

if( $p_use=="all_article" &&  isset($_GET['ct']) ){
	$ct=$_GET['ct'];
	if( $ct==strtolower($nome_categoria) ){
	$query =" SELECT * FROM articoli WHERE categoria='$nome_categoria' ORDER BY titart ASC LIMIT $first , $view_art"; 	
	}
     
}
}

while($row_dt = mysqli_fetch_array($rs_dt)){
$datacreate = $row_dt['datacreate'];

if( $p_use=="all_article" && isset($_GET['dt']) && $_GET['dt']==$datacreate){
	
$query =" SELECT * FROM articoli WHERE datacreate='$datacreate' ORDER BY titart ASC LIMIT $first , $view_art";      
}

}

while($row_search = mysqli_fetch_array($rs_search)){
$titart = $row_search['titart'];
}


if( $p_use=="all_article" && isset($_GET['search']) ){
$term = addslashes( trim($_GET['search']) );
$array_q = explode(" ",$term);
$count_array_q = count($array_q);

if($count_array_q==1  ){	

$query = "SELECT * FROM articoli WHERE titart LIKE '%".$term."%'  ORDER BY titart ASC LIMIT ".$first." , ".$view_art;
$query_tot = "SELECT * FROM articoli WHERE titart LIKE '%$term%'";
$rs_querytot = @mysqli_query($myconn,$query_tot) or die( "Errore..".mysqli_error($myconn) );
$row_querytot = $rs_querytot->num_rows;
	
}
elseif( $count_array_q>1 ){
$array_query = array();
for( $i=0;$i<count($array_q);$i++ ){
$array_query[$i] = "'%".$array_q[$i]."%'";	
}
$query = "SELECT * FROM articoli WHERE titart LIKE ".implode(" OR titart LIKE ",$array_query)." ORDER BY titart ASC LIMIT $first , $view_art";
$query_tot = "SELECT * FROM articoli WHERE titart LIKE ".implode(" OR titart LIKE ",$array_query);
$rs_querytot = @mysqli_query($myconn,$query_tot) or die( "Errore..".mysqli_error($myconn) );
$row_querytot = $rs_querytot->num_rows;

}

}	



while($row_vis = mysqli_fetch_array($rs_vis)){
$visibility = $row_vis['visibility'];

if( $p_use=="all_article" &&  isset($_GET['st']) ){
$si = "Si"; $no="No"; $st=$_GET['st'];

if($st=="pubblicato"){
	
$query =" SELECT * FROM articoli WHERE visibility='$si' ORDER BY titart ASC LIMIT $first , $view_art";  		
}
if($st=="sospeso"){
	
$query =" SELECT * FROM articoli WHERE visibility='$no' ORDER BY titart ASC LIMIT $first , $view_art";  		
}
	
}	
}


while($row_cest = mysqli_fetch_array($rs_cest)){
$cestinato = $row_cest['cestinato'];

if( $p_use=="all_article" &&  isset($_GET['st']) ){
$si = "Si";$st=$_GET['st'];

if($st=="cestinato"){
	
$query =" SELECT * FROM articoli WHERE cestinato='$si' ORDER BY titart ASC LIMIT $first , $view_art";  		
}

	
}	
}

while($row_arch = mysqli_fetch_array($rs_arch)){
$archiviato = $row_arch['archiviato'];

if( $p_use=="all_article" &&  isset($_GET['st']) ){
$si = "Si";
$st=$_GET['st'];

if($st=="archiviato"){
	
$query =" SELECT * FROM articoli WHERE archiviato='$si' ORDER BY titart ASC LIMIT $first , $view_art";  		
}
	
}	
}


while($rownm_arch = mysqli_fetch_array($rsnm_arch)){
$narchivio = $rownm_arch['nome_archivio'];
$arrynmarch = explode(" ",$narchivio);
$dtcr = dtcr($arrynmarch[0],$arrynmarch[1]);

if( $p_use=="all_article" &&  isset($_GET['nm_arch']) ){
$si = "Si";
$nm_arch=$_GET['nm_arch'];

if($nm_arch==$dtcr){
	
$query =" SELECT * FROM articoli WHERE archiviato='$si' AND datacreate LIKE '$dtcr%' ORDER BY titart ASC LIMIT $first , $view_art";  		
}

	
}

}

$result = @mysqli_query($myconn,$query) or die( "Errore...".mysqli_error($myconn) );
$row = $result->num_rows;
?>
<div class="row-fluid">
<div class="span12">

<div class="span3">
<form class="form-search" action="article/search_art/search.php?idut=<?php echo $idut?>" method="post">
<input type="text" class="input-medium search-query" placeholder="Cerca per titolo.." name="q">
<input type="submit" class="btn btn-inverse" value="Cerca">
</form>
</div>

<div class="span3">
<form class="form-inline" id="st">
<select>
<?php 
if( isset($_GET['st']) ){
$st = $_GET['st'];

foreach($status as $key => $val) {
	
if( $st==$key ){

$option_status.=  "<option value='$key' selected>$val</option>";
}
else{
    
 $option_status.=  "<option value='$key'>$val</option>";   
 
}
	
}
	
echo $option_status;	
	
}
else{
	
?>
<option value="seleziona">-- Seleziona Stato --</option>
<option value="pubblicato">Pubblicato</option>
<option value="sospeso">Sospeso</option>
<option value="cestinato">Cestinato</option>
<option value="archiviato">Archiviato</option>
<?php	
	
}

?>
 
</select>

</form>
</div>

<div class="span3">
<form class="form-inline" id="ct">
<select>
<?php

$qcat = "select * from categorie";
$rcat = @mysqli_query($myconn,$qcat) or die( "Errore....".mysqli_error($myconn) );
$cat = array();

while($rowc = mysqli_fetch_array($rcat)){
$n_cat = $rowc['nome_categoria'];    
$cat[$n_cat]=strtolower($n_cat);  
}
$cat['-- Seleziona Categoria --']="tutte";
$option_cat = NULL;

if( isset($_GET['ct']) ){
$ct = $_GET['ct'];

foreach($cat as $keys => $valor) {
	
if( $ct==$valor ){

$option_cat.=  "<option value='$valor' selected>$keys</option>";
}
else{
    
 $option_cat.=  "<option value='$valor'>$keys</option>";   
 
}	
}

echo $option_cat;
}
else{
	
foreach($cat as $keys => $valor) {
	
if( $valor=="tutte" ){
	
$option_cat.=  "<option value='$valor' selected>$keys</option>";	
}	
else{
 $option_cat.=  "<option value='$valor'>$keys</option>";  	
	
}
	
}	
	
echo $option_cat;	
}
?>

</select> 
</form>

</div>

<div class="span3">
<form class="form-inline" id="lim">
<select class="input-mini">
<?php
foreach($opt_view as $ch => $vl){

if( $view_art==$vl ){
$opt_view_status.= "<option value='$vl' selected>$ch</option>";		
}
else{
$opt_view_status.= "<option value='$vl'>$ch</option>";	
}	
}
echo $opt_view_status;
?>
</select>
</form>
</div>

</div>
</div>

<?php

if( isset($_GET['search']) ){	

if($row_querytot==0){
echo "<div class=\"row-fluid\">
      <div class=\"span12\">
	  <p>&nbsp;<em>nessun risultato </em></p>
	  </div>
	  </div>";	
	
}
else{
echo "<div class=\"row-fluid\">
      <div class=\"span12\">
	  <p>&nbsp;<strong><em>".$row_querytot."</em></strong> risultati  per: 
	  <strong>".htmlentities(stripslashes( $_GET['search'] ))."</strong>
	  </p>
	  </div>
	  </div>";		
}

}

?>
<div class="row-fluid">
<div class="span10">
<div class="table-responsive">
<table class="table table-bordered table-striped table-hover">
<tr class="info">
<td><b>#</b></td>
<td><b>Titolo</b></td>
<td><b>Ultima Modifica</b></td>
<td><b>Categoria</b></td>
<td><b>Data di creazione</b></td>
<td><b>Pubblicato</b></td>
<td><b>Cestinato</b></td>
<td><b>Archiviato</b></td>
<td><b>Elimina</b></td>
</tr>
<?php	
$indi = 0;	


while($row = mysqli_fetch_array($result)){
$indi = $indi + 1;
$id_art = $row['idart'];
$tit_art = $row['titart'];
$cat_art = strtolower( $row['categoria'] );
$data_cr = $row['datacreate'];
$view = $row['visibility'];
$ult_mod = $row['ult_mod'];    
$cest = $row['cestinato'];
$arch = $row['archiviato'];
   
/* ID Title Article */  
echo "<tr><td>".$indi."</td>";
/* ID Title Article 
====================*/ 

/* if Search Title Article and Title Article */
if( isset($_GET['search']) && !is_null($_GET['search']) ){
$q = $_GET['search'];

$tit_art = strip_tags(html_entity_decode($tit_art));
$caratteri_speciali = array('&agrave;','&egrave;','&igrave;','&amp;','&euro;','&ugrave;');
$caratteri_sostitutivi = array('à','è','ì','&','€','ù');
$tit_art = str_replace($caratteri_speciali,$caratteri_sostitutivi,$tit_art);
$arraytit_art = explode(" ",$tit_art);
$array_q = explode(" ",$q);
$count_array_q = count(array_unique($array_q));

if($count_array_q==1  ){
$newtit = array();	

for($i=0;$i<count($arraytit_art);$i++){
$newtit[$i] = search_query($arraytit_art[$i],$q);	
}	

echo "<td><a href=\"../administrator/?idut=".$cod_md5."&mod_art=".$id_art."\">".implode(" ",$newtit)."</a></td>";		
	
}
elseif( $count_array_q>1 ){
$regexp = "/<mark>/i";
for($i=0;$i<count($arraytit_art);$i++){	
for( $j=0;$j<$count_array_q;$j++ ){
if( !preg_match($regexp,$arraytit_art[$i]) ){
$arraytit_art[$i] = search_query($arraytit_art[$i],$array_q[$j]);	
}	
}
	
}	
	
echo "<td><a href=\"../administrator/?idut=".$cod_md5."&mod_art=".$id_art."\">".implode(" ",$arraytit_art)."</a></td>";		
}
	
}

else{
echo "<td><a href=\"../administrator/?idut=".$cod_md5."&mod_art=".$id_art."\">".$tit_art."</a></td>";	
}
/* if Search Title Article and Title Article
==============================================*/

/* Ultima modifica Article*/
echo "<td>".dataIT($ult_mod)."</td>";
/* Ultima modifica Article
===========================*/

/* Categoria Article*/
echo "<td><a href=\"../administrator/?idut=".$cod_md5."&p_use=all_article&ct=".$cat_art."\" id=\"cat_art\">".$cat_art."</a></td>";
/* Categoria Article
=====================*/

/* Data di Creazione Article*/
echo "<td><a href=\"../administrator/?idut=".$cod_md5."&p_use=all_article&dt=".$data_cr."\">".dataIT($data_cr)."</a></td>";
/* Data di Creazione Article
=============================*/


/* Option View Article*/
echo "<td style=\"text-align:center;\">";
include(  mypath( PATH_NAME , 'administrator/article/article_opt_view/article_opt_view.php' ) );
echo  "</td>";
/* Option View Article
=======================*/

/* Option Cest Article*/
echo "<td style=\"text-align:center;\">";
include(  mypath( PATH_NAME , 'administrator/article/article_opt_cest/article_opt_cest.php' ) );
echo  "</td>";
/* Option Cest Article
=======================*/

/* Option Arch Article*/
echo "<td style=\"text-align:center;\">";
include(  mypath( PATH_NAME , 'administrator/article/article_opt_arch/article_opt_arch.php' ) );
echo "</td>";
/* Option Arch Article
=======================*/

/* Option Delete Article*/
echo "<td style=\"text-align:center;\">
      <a href=\"\" class=\"btn btn-danger btn-mini del_article\" id=\"".$id_art."\">
	  <i class=\"fa fa-times\"></i>
	  </a>
	  </td>";
/* Option Delete Article
=========================*/

echo  "</tr>";     

}

if($row_art==0){
echo "<tr><td colspan=\"8\"><em>";
echo "<p class=\"text-info\">Nessun Articolo. Inserisci un <a href=\"../administrator/?idut=".$idut."&new_article\">nuovo</a> articolo.</p>";
echo "</td></tr>";
}
?>
</table>
</div>
</div>
<div class="span2">
<div class="table-responsive archivio">
<table class="table table-bordered table-striped table-hover">
<tr class="info">
<td><b><i class="fa fa-archive"></i> Archivio</b></td>
</tr>
<?php
$sqlarchivio = "select * from archivio";
$rsarchivio = @mysqli_query($myconn,$sqlarchivio) or die( "Errore....".mysqli_error($myconn) );
$row_archivio = $rsarchivio->num_rows;
if($row_archivio==0){
echo "<tr><td>Nessun Archivio</td></tr>";	
}
else{
while( $rowarchivio =  mysqli_fetch_array($rsarchivio) ){
$nome_archivio = $rowarchivio['nome_archivio'];
$arraynomearch = explode(" ",$nome_archivio);
$newnome_archivio = dtcr($arraynomearch[0],$arraynomearch[1]);

echo "<tr><td><a href=\"../administrator/?idut=".$cod_md5."&p_use=all_article&nm_arch=".$newnome_archivio."\">".$nome_archivio."</a></td></tr>";	
}	
}
?>
</table>
</div>
</div>
</div>
<?php
}
?>
<?php include(  mypath( PATH_NAME , 'administrator/article/pagin/pagination.php' ) ); ?>
