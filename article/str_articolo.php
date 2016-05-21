<?php
$sqltot_comment = " select * from comment where idart='$idart' and st_comment='enabled'";
$rstot_comment = @mysqli_query($myconn,$sqltot_comment) or die( "Errore....".mysqli_error($myconn) );
$num_tot_comment = $rstot_comment->num_rows;
?>


<div class="blog-post">
<?php
if( isset($_GET['art_arch']) ){
?>
<h2 class="blog-post-title"><a href="" onclick="window.location"><?php echo $titlearticle; ?></a></h2>
<?php
}	
elseif( !isset($_GET['art_arch'])){
for($i=0;$i<count($option_article);$i++){	
if( $option_article[$i]=="title" ){	
if( isset($_GET['p_use']) && $_GET['p_use']!=$aliasarticle){
$p_use = $_GET['p_use'];
?>
<h2 class="blog-post-title"><a href="/article/go.php?p_use=<?php echo $p_use; ?>&alias_art=<?php echo $aliasarticle; ?>"><?php echo $titlearticle; ?></a></h2>

<?php	
	
}
else{
?>

<h2 class="blog-post-title"><a href="/article/go.php?p_use=<?php echo $aliasarticle; ?>"><?php echo $titlearticle; ?></a></h2>
<?php
	
}
?>

<?php	
}	
}
}



?>
<p class="blog-post-meta">
<?php 
for( $i=0;$i<count($option_article);$i++ ){
if( $option_article[$i]=="date" ){	
echo $datacreatearticle; 
}		
}
?>
<?php 
for( $i=0;$i<count($option_article);$i++ ){
if( $option_article[$i]=="author" ){	
if( strlen($profileauthorarticle)==0 ){
echo " by ".$authorarticle; 		
}
else{
echo " by <a href=\"".$profileauthorarticle."\" target=\"_blank\">".$authorarticle."</a>";		
} 
}		
}

for( $i=0;$i<count($option_article);$i++ ){	
if( $option_article[$i]=="click" ){
$textfile = fopen("article/click.txt", "r");
$numclick = 0;
while ( $riga = fgets($textfile,1024) ) {
$campiriga = explode("|", $riga);
$clickalias = $campiriga[0];
if( $clickalias == $aliasarticle ){
$numclick = $numclick + 1;	
}
}
fclose($textfile);	
echo " , <i class=\"fa fa-eye\"></i> (<b>".$numclick."</b>)";	
}		
}


for( $i=0;$i<count($option_article);$i++ ){
if( $option_article[$i]=="comment" ){
$url_comm = NULL;	
echo " , <i class=\"fa fa-commenting-o\"></i> (<a href=\"".url_comm($url_comm,$aliasarticle)."\" class=\"add_comm\"  data-toggle=\"tooltip\" title=\"Commenti\">".$num_tot_comment."</a>)";	
}		
}


?>

</p>
<?php 
if( !isset($_GET['p_use']) ){	
$articolo = NULL;

for( $i=0;$i<count($option_article);$i++ ){	
if( $option_article[$i]=="link" ){	
$articolo = cont_article($contarticle,$aliasarticle);	
}
else{
$articolo = $contarticle;
}
}
echo $articolo;
}
else{
$p_use = $_GET['p_use'];

if( $_GET['p_use']=="all_article" ){
$articolo = NULL;
if( !isset($_GET['alias_art']) ){
for( $i=0;$i<count($option_article);$i++ ){
	
if( $option_article[$i]=="link" ){	
$articolo = cont_article($contarticle,$aliasarticle);	
}
else{
$articolo = $contarticle;
}
}

echo $articolo;		
}
else{
echo $contarticle;
for( $i=0;$i<count($option_article);$i++ ){
if( $option_article[$i]=="comment" ){
include( __ROOT__.'/article/commenti/commenti.php' );	
}
}
}

}

$sqlp_use_cat = "select * from categorie where alias_categoria = '$p_use' ";
$rsp_use_cat = @mysqli_query($myconn,$sqlp_use_cat) or die( "Errore....".mysqli_error($myconn) );
$num_rsp_use_cat = $rsp_use_cat->num_rows;

if( $num_rsp_use_cat!=0   ){
if( !isset($_GET['alias_art']) ){

$articolo = NULL;

for( $i=0;$i<count($option_article);$i++ ){
	
if( $option_article[$i]=="link" ){	
$articolo = cont_article($contarticle,$aliasarticle);	
}
else{
$articolo = $contarticle;
}
}

echo $articolo;		
}
else{
echo $contarticle;

for( $i=0;$i<count($option_article);$i++ ){
if( $option_article[$i]=="opt" ){
include( __ROOT__.'/article/option.php' );	
}
}



for( $i=0;$i<count($option_article);$i++ ){
if( $option_article[$i]=="comment" ){
include( __ROOT__.'/article/commenti/commenti.php' );	
}
}
}
	
}

if(isset($_GET['art_arch'])){
$art_arch = $_GET['art_arch'];	
$sqlp_use_s_art = "select * from articoli where alias = '$art_arch'";
$rsp_use_s_art = @mysqli_query($myconn,$sqlp_use_s_art) or die( "Errore....".mysqli_error($myconn) );
$num_rsp_use_s_art = $rsp_use_s_art->num_rows;
}
else{
$sqlp_use_s_art = "select * from articoli where alias = '$p_use'";
$rsp_use_s_art = @mysqli_query($myconn,$sqlp_use_s_art) or die( "Errore....".mysqli_error($myconn) );
$num_rsp_use_s_art = $rsp_use_s_art->num_rows;
}


if( $num_rsp_use_s_art!=0 ){
echo $contarticle;

for( $i=0;$i<count($option_article);$i++ ){
if( $option_article[$i]=="opt" ){
include( __ROOT__.'/article/option.php' );	
}
}

for( $i=0;$i<count($option_article);$i++ ){
if( $option_article[$i]=="comment" ){
include( __ROOT__.'/article/commenti/commenti.php' );	
}
}
}
}
?>

</div>
