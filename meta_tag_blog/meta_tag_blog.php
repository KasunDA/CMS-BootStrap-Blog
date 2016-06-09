<?php
$sectionmetadesc = html_entity_decode($rowsetting['sectionmetadesc'], ENT_QUOTES, "UTF-8");
$sectionmetakey= html_entity_decode($rowsetting['sectionmetakey'], ENT_QUOTES, "UTF-8");
$metadesc = NULL;
$metakey = NULL;



if( !isset($_GET['cookie-policy']) ){
if( !isset($_GET['p_use']) ){	
if( !isset($_GET['ref']) ){
$metadesc = $sectionmetadesc;
$metakey = $sectionmetakey;	
}
else{
$metadesc = $sectionmetadesc." , Pagina di Errore..";
$metakey = $sectionmetakey." , Pagina di Errore..";		
}

}
else{
$p_use = addslashes($_GET['p_use']);

/* isValidUrl */
if( !isValidUrl($p_use,$myconn) ){
header("Location: /?ref=p_error"); 
exit;	
}
/* isValidUrl */


if( $p_use=="search"  && isset($_GET['q']) ){
$q=$_GET['q'];
$metadesc = $sectionmetadesc.", Risultati per ricerca ".$q;
$metakey = $sectionmetakey.", Risultati per ricerca ".$q;	
}


if( $p_use=="all_article" ){
	
if( !isset($_GET['alias_art']) ){
$metadesc = $sectionmetadesc.", Articoli di tutte le Categorie";
$metakey = $sectionmetakey.", Tutti gli Articoli";		
}
else{
$alias_art = $_GET['alias_art'];

$art_all_meta_blog = "select * from articoli where alias = '$alias_art'";
$rs_art_all_meta_blog  = @mysqli_query($myconn,$art_all_meta_blog) or die( "Errore....".mysqli_error($myconn) );	
$nm_art_all_meta_blog = $rs_art_all_meta_blog ->num_rows;
if( $nm_art_all_meta_blog!=0 ){
while($row_art_all_meta_blog = mysqli_fetch_array($rs_art_all_meta_blog)){
$metadesc_art_blog = $row_art_all_meta_blog['metadesc'];	
$metakey_art_blog = $row_art_all_meta_blog['metakey'];
}	
$metadesc = $sectionmetadesc.", Articoli di tutte le Categorie".", ".$metadesc_art_blog ;
$metakey = $sectionmetakey.", Tutti gli Articoli".", ".$metakey_art_blog;
}	
}
	
}

if( $p_use=="archivie" ){
if( isset($_GET['t_arch']) ){
$t_arch = addslashes($_GET['t_arch']);	

/* isValidUrl */
if( !isValidUrl(explodep_use($t_arch),$myconn) ){
header("Location: /?ref=p_error"); 
exit;	
}
/* isValidUrl */


if( !isset($_GET['art_arch']) ){

$metadesc = $sectionmetadesc.", Articoli ".explodep_use($t_arch);
$metakey = $sectionmetakey.", Articoli ".explodep_use($t_arch);
}
else{
$art_arch = addslashes($_GET['art_arch']);

/* isValidUrl */
if( !isValidUrl($art_arch , $myconn) ){
header("Location: /?ref=p_error"); 
exit;	
}
/* isValidUrl */

$meta_art_arch_blog = "select * from articoli where alias = '$art_arch'";
$rs_meta_art_arch_blog  = @mysqli_query($myconn,$meta_art_arch_blog) or die( "Errore....".mysqli_error($myconn) );	
$nm_meta_art_arch_blog = $rs_meta_art_arch_blog ->num_rows;	

if( $nm_meta_art_arch_blog!=0 ){
while($row_meta_art_arch_blog = mysqli_fetch_array($rs_meta_art_arch_blog )){
$metadesc_art_arch_blog = $row_meta_art_arch_blog['metadesc'];	
$metakey_art_arch_blog = $row_meta_art_arch_blog['metakey'];	
}
$metadesc = $sectionmetadesc.", Articoli ".explodep_use($t_arch).", ".$metadesc_art_arch_blog;
$metakey = $sectionmetakey.", Articoli ".explodep_use($t_arch).", ".$metakey_art_arch_blog;
}
	
}



}	
}

$meta_art_blog = "select * from articoli where alias = '$p_use'";
$rs_meta_art_blog  = @mysqli_query($myconn,$meta_art_blog) or die( "Errore....".mysqli_error($myconn) );	
$nm_meta_art_blog = $rs_meta_art_blog ->num_rows;	

if( $nm_meta_art_blog !=0){
while($row_meta_art_blog = mysqli_fetch_array($rs_meta_art_blog)){
$metadesc_art_blog = $row_meta_art_blog['metadesc'];	
$metakey_art_blog = $row_meta_art_blog['metakey'];	
}	
$metadesc = $sectionmetadesc.", ".$metadesc_art_blog;
$metakey = $sectionmetakey.", ".$metakey_art_blog;	
}

$cat_meta_blog = "select * from categorie where alias_categoria = '$p_use'";
$rs_cat_meta_blog  = @mysqli_query($myconn,$cat_meta_blog) or die( "Errore....".mysqli_error($myconn) );	
$nm_cat_meta_blog = $rs_cat_meta_blog ->num_rows;

if( $nm_cat_meta_blog!=0 ){
while($row_cat_meta_blog = mysqli_fetch_array($rs_cat_meta_blog)){
$metades_cat_blog = $row_cat_meta_blog['descr_cat'];
$metakey_cat_blog = $row_cat_meta_blog['meta_key'];
}

if( !isset($_GET['alias_art']) ){
$metadesc = $sectionmetadesc.", ".$metades_cat_blog;
$metakey = $sectionmetakey.", ".$metakey_cat_blog;	
}
else{
$alias_art = addslashes($_GET['alias_art']);	

/* isValidUrl */
if( !isValidUrl($alias_art,$myconn) ){
header("Location: /?ref=p_error"); 
exit;	
}
/* isValidUrl */



$cat_art_meta_blog = "select * from articoli where alias = '$alias_art'";
$rs_cat_art_meta_blog  = @mysqli_query($myconn,$cat_art_meta_blog) or die( "Errore....".mysqli_error($myconn) );	
$nm_cat_art_meta_blog = $rs_cat_art_meta_blog ->num_rows;
if( $nm_cat_art_meta_blog!=0 ){

while($row_cat_art_meta_blog = mysqli_fetch_array($rs_cat_art_meta_blog)){
$metadesc_art_blog = $row_cat_art_meta_blog['metadesc'];	
$metakey_art_blog = $row_cat_art_meta_blog['metakey'];
}
$metadesc = $sectionmetadesc.", ".$metades_cat_blog.", ".$metadesc_art_blog;
$metakey = $sectionmetakey.", ".$metakey_cat_blog.", ".$metakey_art_blog;
}
}		
}	
}
}
else{
$metadesc = $sectionmetadesc." , Cookie Policy";
$metakey = $sectionmetakey." , Cookie Policy";		
	
}
?>
<meta name="description" content="<?php echo $metadesc; ?>">
<meta name="keywords" content="<?php echo $metakey; ?>">
