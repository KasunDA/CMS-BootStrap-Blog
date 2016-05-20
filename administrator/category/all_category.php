<?php
$textfile = fopen("limit/limit_cat.txt","r");
$view_cat = fgets($textfile,1024) ;

$opt_view_cat = array( 4=>4, 10=>10, 20=>20 , 25=>25 , 30=>30 );
$opt_view_cat_status = NULL;

$all_pages_cat = ceil($row_cat/ $view_cat); 
$all_pages_cat_enabled = ceil($row_cat_enabled/$view_cat);
$all_pages_cat_disabled = ceil($row_cat_disabled/$view_cat);

if( isset($_GET['search']) ){
$all_pages_search_cat = ceil($row_search_categ/$view_cat);	
}

if( isset($_GET['datct']) ){
$all_pages_cat_datcat = ceil($row_cat_datct/$view_cat);
}

$p = isset($_GET['p']) ? $_GET['p']:1;
/*
if ( !$p  || $p>$all_pages_cat || !is_numeric($p) || is_null($p) || $p<1 ) {
$p = 1;
header("Location: ../administrator/?idut=".$cod_md5."&category=all&p=".$p);
} 
*/	

$first = ( ($p - 1) * $view_cat );

$categorie =" SELECT * FROM categorie ORDER BY nome_categoria ASC LIMIT $first , $view_cat";
$rs_categorie = @mysqli_query($myconn,$categorie) or die( "Errore....".mysqli_error($myconn) );

$mssgtruedisabled = "<div class=\"row-fluid\"><div class=\"span12\"><div class=\"alert\">
					 <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
					 <i class=\"fa fa-exclamation-circle\"></i>  Avendo disabilitato questa categoria tutti gli articoli con questa categoria sono stati sospesi.
					 </div></div></div>";
			 
$stati_ct = array("Abilitata"=>"enabled","Disabilitata"=>"disabled", "-- Seleziona Stato --"=>"all");
$option_stati_ct = NULL;
			 
			 
if( isset($_GET['search']) ){
$term = addslashes( trim($_GET['search']) );
$array_q = explode(" ",$term);
$count_array_q = count($array_q);

if($count_array_q==1  ){
$categorie =" SELECT * FROM categorie WHERE nome_categoria LIKE '%$term%' ORDER BY nome_categoria ASC LIMIT $first , $view_cat";
$cat_tot = " SELECT * FROM categorie WHERE nome_categoria LIKE '%$term%'";
$rs_cat_tot =  @mysqli_query($myconn,$cat_tot) or die( "Errore....".mysqli_error($myconn) );
$row_cat_tot = $rs_cat_tot->num_rows;
$rs_categorie = @mysqli_query($myconn,$categorie) or die( "Errore....".mysqli_error($myconn) );	
	
}
elseif( $count_array_q>1 ){
$array_query = array();
for( $i=0;$i<count($array_q);$i++ ){
$array_query[$i] = "'%".$array_q[$i]."%'";	
}
$categorie =" SELECT * FROM categorie WHERE nome_categoria LIKE ".implode(" OR nome_categoria LIKE ",$array_query)." ORDER BY nome_categoria ASC LIMIT $first , $view_cat";
$cat_tot = " SELECT * FROM categorie WHERE nome_categoria LIKE ".implode(" OR nome_categoria LIKE ",$array_query);
$rs_cat_tot =  @mysqli_query($myconn,$cat_tot) or die( "Errore....".mysqli_error($myconn) );
$row_cat_tot = $rs_cat_tot->num_rows;
$rs_categorie = @mysqli_query($myconn,$categorie) or die( "Errore....".mysqli_error($myconn) );			
}





}

if( isset($_GET['datct'])  ){
$data_cat = dataIT($_GET['datct']);
$categorie =" SELECT * FROM categorie WHERE data_cat='$data_cat' ORDER BY nome_categoria ASC LIMIT $first , $view_cat";
$rs_categorie = @mysqli_query($myconn,$categorie) or die( "Errore....".mysqli_error($myconn) );
}

if( isset($_GET['stct'])  ){
$stato_catg = 	$_GET['stct'];
$categorie =" SELECT * FROM categorie WHERE stato_cat='$stato_catg' ORDER BY nome_categoria ASC LIMIT $first , $view_cat";
$rs_categorie = @mysqli_query($myconn,$categorie) or die( "Errore....".mysqli_error($myconn) );
}


?>
<div class="row-fluid">
<div class="span12">


<div class="span3">
<form class="form-search-categ" action="category/search_cat/search_ct.php?idut=<?php echo $_GET['idut'];?>" method="post">
<input type="text" class="input-medium search-query" placeholder="Cerca categoria.." name="q">
<button type="submit" class="btn btn-inverse">Cerca</button>
</form>
</div>

<div class="span3">
<form class="form-inline" id="stct">
<select>
<?php

if( isset($_GET['stct']) ){
$stct = $_GET['stct'];
foreach($stati_ct as $k => $v) {
	
if( $stct==$v ){

$option_stati_ct .= "<option value='$v' selected>$k</option>";	
	
}
else{
$option_stati_ct .= 	"<option value='$v'>$k</option>";	
}	
	
	
}
echo $option_stati_ct;
	
	
}
else{
	
?>
<option selected value="all">-- Seleziona Stato --</option>
<option value="enabled">Abilitata</option>
<option value="disabled">Disabilitata</option>
<?php		
}
?>
</select>
</form>
</div>

<div class="span3">
<form class="form-inline" id="limcat">
<select class="input-mini">
<?php
foreach($opt_view_cat as $chct => $vlct){

if( $view_cat==$vlct ){
$opt_view_cat_status.= "<option value='$vlct' selected>$chct</option>";		
}
else{
$opt_view_cat_status.= "<option value='$vlct'>$chct</option>";	
}	
}
echo $opt_view_cat_status;
?>
</select>
</form>
</div>

</div>
</div>

<div class="row-fluid">

<div class="span12">
<div class="span10">

<?php 
if(isset($_GET['status']) && $_GET['status']=="disabled"){echo $mssgtruedisabled;}

if( isset($_GET['search']) ){	


echo "<div class=\"row-fluid\">
      <div class=\"span12\">
      <p>&nbsp;<strong><em>".$row_cat_tot."</em></strong> risultati  per: 
	  <strong>".htmlentities($_GET['search'])."</strong>
	  </p>
	  </div>
	  </div>";	
}
?>
<div class="row-fluid">
<div class="span12">
<div class="table-responsive">
<table class="table table-bordered table-striped table-hover">
<tr class="info">
<td><b>#</b></td>
<td><b>Nome categoria</b></td>
<td><b>Ultima modifica</b></td>
<td><b>Data di creazione</b></td>
<td><b>Abilitata</b></td>
<td><b>Elimina</b></td>
</tr>
<?php


$indicat = 0;

while($rowcate = mysqli_fetch_array($rs_categorie)){
$indicat = $indicat +1;
$idcategoria = $rowcate['idcategoria'];
$nome_cat = $rowcate['nome_categoria'];
$data_cat = $rowcate['data_cat'];
$data_mod_cat = $rowcate['data_mod_cat'];
$stato_cat = $rowcate['stato_cat'];


?>

<tr>
<td><?php echo $indicat; ?></td> 
<?php


if( isset($_GET['search']) && !is_null($_GET['search']) ){
$q = $_GET['search'];
$nome_cat = strip_tags(html_entity_decode($nome_cat));
$caratteri_speciali = array('&agrave;','&egrave;','&igrave;','&amp;','&euro;','&ugrave;');
$caratteri_sostitutivi = array('à','è','ì','&','€','ù');
$nome_cat = str_replace($caratteri_speciali,$caratteri_sostitutivi,$nome_cat);
$arraynome_cat = explode(" ",$nome_cat);
$array_q = explode(" ",$q);
$count_array_q = count(array_unique($array_q));

if($count_array_q==1  ){
$newnome_cat = array();	

for($i=0;$i<count($arraynome_cat);$i++){
$newnome_cat[$i] = search_query($arraynome_cat[$i],$q);	
}

echo "<td><a href=\"../administrator/?idut=".$cod_md5."&mod_category=".$idcategoria."\">".implode(" ",$newnome_cat)."</a></td>";	
}
elseif( $count_array_q>1 ){
$regexp = "/<mark>/i";

for($i=0;$i<count($arraynome_cat);$i++){	
for( $j=0;$j<$count_array_q;$j++ ){
if( !preg_match($regexp,$arraynome_cat[$i]) ){
$arraynome_cat[$i] = search_query($arraynome_cat[$i],$array_q[$j]);	
}	
}	
}	
echo "<td><a href=\"../administrator/?idut=".$cod_md5."&mod_category=".$idcategoria."\">".implode(" ",$arraynome_cat)."</a></td>";
	
	
}
	
}

else{
echo "<td><a href=\"../administrator/?idut=".$cod_md5."&mod_category=".$idcategoria."\">".$nome_cat."</a></td>";
}
?>
<td><?php echo $data_mod_cat; ?></td>
<td><a href="../administrator/?idut=<?php echo $cod_md5;?>&category=all&datct=<?php echo dataAm($data_cat); ?>"><?php echo $data_cat; ?></a></td>
<td>
<?php 



if($stato_cat=="enabled"){
if( isset($_GET['p']) ){
$p= $_GET['p'];

if( isset($_GET['stct']) || isset($_GET['search']) || isset($_GET['datct']) ){
	
if( isset($_GET['stct']) ){
$stct = $_GET['stct'];
echo "<a href=\"category/disable.php?idut=".$cod_md5."&stct=".$stct."&idcat=".$idcategoria."&p=".$p."\" class=\"btn btn-success btn-mini thumbs_up\" type=\"button\">
      <i class=\"fa fa-check\"></i> </a>";	
}	
if( isset($_GET['search']) ){
$search = $_GET['search'];
echo "<a href=\"category/disable.php?idut=".$cod_md5."&search=".$search."&idcat=".$idcategoria."&p=".$p."\" class=\"btn btn-success btn-mini thumbs_up\" type=\"button\">
      <i class=\"fa fa-check\"></i></a>";	
}
if( isset($_GET['datct']) ){
$datct = $_GET['datct'];
echo "<a href=\"category/disable.php?idut=".$cod_md5."&datct=".$datct."&idcat=".$idcategoria."&p=".$p."\" class=\"btn btn-success btn-mini thumbs_up\" type=\"button\">
       <i class=\"fa fa-check\"></i></a>";	
}	
}
else{
echo "<a href=\"category/disable.php?idut=".$cod_md5."&idcat=".$idcategoria."&p=".$p."\" class=\"btn btn-success btn-mini thumbs_up\" type=\"button\">
           <i class=\"fa fa-check\"></i></a>";	
}	
}
else{
if( isset($_GET['stct']) || isset($_GET['search']) || isset($_GET['datct']) ){
	
if( isset($_GET['stct']) ){
$stct = $_GET['stct'];
echo "<a href=\"category/disable.php?idut=".$cod_md5."&stct=".$stct."&idcat=".$idcategoria."\" class=\"btn btn-success btn-mini thumbs_up\" type=\"button\">
         <i class=\"fa fa-check\"></i></a>";	
}	
if( isset($_GET['search']) ){
$search = $_GET['search'];
echo "<a href=\"category/disable.php?idut=".$cod_md5."&search=".$search."&idcat=".$idcategoria."\" class=\"btn btn-success btn-mini thumbs_up\" type=\"button\">
      <i class=\"fa fa-check\"></i></a>";	
}
if( isset($_GET['datct']) ){
$datct = $_GET['datct'];
echo "<a href=\"category/disable.php?idut=".$cod_md5."&datct=".$datct."&idcat=".$idcategoria."\" class=\"btn btn-success btn-mini thumbs_up\" type=\"button\">
       <i class=\"fa fa-check\"></i></a>";	
}	
}
else{
echo "<a href=\"category/disable.php?idut=".$cod_md5."&idcat=".$idcategoria."\" class=\"btn btn-success btn-mini thumbs_up\" type=\"button\">
      <i class=\"fa fa-check\"></i></a>";	
}
}
}
else{	
if( isset($_GET['p']) ){
$p= $_GET['p'];


if( isset($_GET['stct']) || isset($_GET['search']) || isset($_GET['datct']) ){

if( isset($_GET['stct']) ){
$stct = $_GET['stct'];
echo "<a href=\"category/enable.php?idut=".$cod_md5."&stct=".$stct."&idcat=".$idcategoria."&p=".$p."\" class=\"btn btn-danger btn-mini thumbs_down\" type=\"button\">
   <i class=\"fa fa-minus-circle\"></i></a>";	
}
if( isset($_GET['search']) ){
$search = $_GET['search'];	
echo "<a href=\"category/enable.php?idut=".$cod_md5."&search=".$search."&idcat=".$idcategoria."&p=".$p."\" class=\"btn btn-danger btn-mini thumbs_down\" type=\"button\">
     <i class=\"fa fa-minus-circle\"></i></a>";	
}
if( isset($_GET['datct']) ){
$datct = $_GET['datct'];
echo "<a href=\"category/enable.php?idut=".$cod_md5."&datct=".$datct."&idcat=".$idcategoria."&p=".$p."\" class=\"btn btn-danger btn-mini thumbs_down\" type=\"button\">
      <i class=\"fa fa-minus-circle\"></i></a>";	
}
	
}

else{
echo "<a href=\"category/enable.php?idut=".$cod_md5."&idcat=".$idcategoria."&p=".$p."\" class=\"btn btn-danger btn-mini thumbs_down\" type=\"button\">
      <i class=\"fa fa-minus-circle\"></i></a>";	
	
}


}
else{
if( isset($_GET['stct']) || isset($_GET['search']) || isset($_GET['datct']) ){

if( isset($_GET['stct']) ){
$stct = $_GET['stct'];
echo "<a href=\"category/enable.php?idut=".$cod_md5."&stct=".$stct."&idcat=".$idcategoria."\" class=\"btn btn-danger btn-mini thumbs_down\" type=\"button\">
       <i class=\"fa fa-minus-circle\"></i></a>";	
}
if( isset($_GET['search']) ){
$search = $_GET['search'];	
echo "<a href=\"category/enable.php?idut=".$cod_md5."&search=".$search."&idcat=".$idcategoria."\" class=\"btn btn-danger btn-mini thumbs_down\" type=\"button\">
       <i class=\"fa fa-minus-circle\"></i></a>";	
}
if( isset($_GET['datct']) ){
$datct = $_GET['datct'];
echo "<a href=\"category/enable.php?idut=".$cod_md5."&datct=".$datct."&idcat=".$idcategoria."\" class=\"btn btn-danger btn-mini thumbs_down\" type=\"button\">
       <i class=\"fa fa-minus-circle\"></i></a>";	
}
	
}
else{
echo "<a href=\"category/enable.php?idut=".$cod_md5."&idcat=".$idcategoria."\" class=\"btn btn-danger btn-mini thumbs_down\" type=\"button\">
       <i class=\"fa fa-minus-circle\"></i></a>";	
}	
	
}
}

?>
</td>
<td><a href="" class="btn btn-danger btn-mini del_cat" id="<?php echo $idcategoria; ?>"  type="button"><i class="fa fa-times"></i></a></td>
</tr>
<?php
}

if($row_cat==0){
echo "<tr><td colspan=\"6\"><em>";
echo "<p class=\"text-info\">Nessuna Categoria. Inserisci una <a href=\"../administrator/?idut=".$cod_md5."&new_category\">nuova</a> categoria.</p>";
echo "</td></tr>";
}

?>
</table>
</div> 
</div>
</div>
<?php include( mypath( PATH_NAME , 'administrator/category/pagin_cat/pagination_cat.php' ) ); ?>
</div>

<div class="span2">
<table class="table table-bordered table-striped">
<tr class="info"><td><b>Articoli per Categoria</b></td></tr>
<?php

if($row_art==0){
echo "<tr><td>Nessun Articolo<br><a href=\"../administrator/?idut=".$cod_md5."&new_article\" class=\"\">Aggiungi Articolo</a></td></tr>";		
}

foreach($categ as $chiave => $valore) {
$numc =" SELECT * FROM articoli WHERE categoria='$chiave' ";
$rsc = @mysqli_query($myconn,$numc) or die( "Errore....".mysqli_error($myconn) );
$rowc = $rsc->num_rows;	
echo "<tr><td>";
if( $rowc!=0 ){
echo "<a href=\"../administrator/?idut=$cod_md5&p_use=all_article&ct=".$valore."\">Articoli ".$chiave." (<strong>".$rowc."</strong>)</a>";
}
elseif($rowc==0){
echo "<a class=\"not-active\" onclick=\"return false;\">Articoli ".$chiave." (<strong>".$rowc."</strong>)</a>";
}
echo "</td></tr>";
}
?>
</table>
</div>
</div>
</div>

