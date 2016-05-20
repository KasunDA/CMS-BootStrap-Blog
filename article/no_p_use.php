<?php
$url = NULL;
$sqlvocimenu = "select * from voci_menu where home='si'";
$rssqlvocimenu = @mysqli_query($myconn,$sqlvocimenu) or die( "Errore....".mysqli_error($myconn) );
$rowsqlvocimenu = mysqli_fetch_array($rssqlvocimenu);
$nome_voce_menu = $rowsqlvocimenu['nome_voce_menu'];

$sqlmenu = "select * from menu ";
$rssqlmenu = @mysqli_query($myconn,$sqlmenu) or die( "Errore....".mysqli_error($myconn) );	
$rowsqlmenu = mysqli_fetch_array($rssqlmenu);	
$voci_menu = unserialize($rowsqlmenu['voci_menu']);
$url_voci_menu = unserialize($rowsqlmenu['url_voci_menu']);

for($i=0;$i<count($voci_menu);$i++){
if( $voci_menu[$i]==$nome_voce_menu ){
$url = 	$url_voci_menu[$i];	
}		
}

/* if url =>all_article */
if($url=="all_article"){	
while($row_art_vis_no_arch  = mysqli_fetch_array( $rs_sql_art_vis_no_arch_p )){	
$idart = $row_art_vis_no_arch['idart'];
$titlearticle = ucwords($row_art_vis_no_arch['titart']);
$aliasarticle = $row_art_vis_no_arch['alias'];
$datacreatearticle = datacreate($row_art_vis_no_arch['datacreate']);
$authorarticle =  ucwords($row_art_vis_no_arch['author']);
$profileauthorarticle = $row_art_vis_no_arch['profile_author'];
$contarticle = html_entity_decode($row_art_vis_no_arch['contart']);	
$option_article = unserialize($row_art_vis_no_arch['option_article']);

include( mypath( PATH_NAME , 'article/str_articolo.php' ) );
}	
include( mypath( PATH_NAME , 'article/pager/pager_all.php' ) );
}
/* if url =>all_article */


$sqlcategorieart = "select * from categorie where alias_categoria='$url'";
$rssqlcategorieart = @mysqli_query($myconn,$sqlcategorieart) or die( "Errore....".mysqli_error($myconn) );	
$numerocat = $rssqlcategorieart->num_rows;

/* if url => categoria */
if($numerocat!=0){
$nomecategoria = explodep_use($url);	

$sqlarticoli = "select * from articoli where categoria='$nomecategoria' and visibility='Si' and archiviato = 'No' ";
$rssqlarticoli = @mysqli_query($myconn,$sqlarticoli) or die( "Errore....".mysqli_error($myconn) );	
$num_rssqlarticoli = $rssqlarticoli->num_rows;

$all_pages_articoli_cat = ceil( $num_rssqlarticoli / $view_art ); 

$sqlarticoli_p = "select * from articoli where categoria='$nomecategoria' and visibility='Si' and archiviato = 'No' ORDER BY datacreate DESC LIMIT $first , $view_art";
$rssqlarticoli_p = @mysqli_query($myconn,$sqlarticoli_p) or die( "Errore....".mysqli_error($myconn) );	

while($rowsqlarticoli  = mysqli_fetch_array( $rssqlarticoli_p )){	
$idart = $rowsqlarticoli['idart'];
$titlearticle = ucwords($rowsqlarticoli['titart']);
$aliasarticle = $rowsqlarticoli['alias'];
$datacreatearticle = datacreate($rowsqlarticoli['datacreate']);
$authorarticle =  ucwords($rowsqlarticoli['author']);
$profileauthorarticle = $rowsqlarticoli['profile_author'];
$contarticle = html_entity_decode($rowsqlarticoli['contart']);	
$option_article = unserialize($rowsqlarticoli['option_article']);

include( mypath( PATH_NAME , 'article/str_articolo.php' ) ) ;
}
include( mypath( PATH_NAME , 'article/pager/pager_all_cat.php' ) );
}

/* if url => categoria */

$sqlaliasarticolo = "select * from articoli where alias = '$url' and visibility='Si' ";
$rsaliasarticolo = @mysqli_query($myconn,$sqlaliasarticolo) or die( "Errore....".mysqli_error($myconn) );	
$numeroartalias = $rsaliasarticolo->num_rows;

if( $numeroartalias!=0 ){

while($rowaliasarticolo  = mysqli_fetch_array( $rsaliasarticolo )){	
$idart = $rowaliasarticolo['idart'];
$titlearticle = ucwords($rowaliasarticolo['titart']);
$aliasarticle = $rowaliasarticolo['alias'];
$datacreatearticle = datacreate($rowaliasarticolo['datacreate']);
$authorarticle =  ucwords($rowaliasarticolo['author']);
$profileauthorarticle = $rowaliasarticolo['profile_author'];
$contarticle = html_entity_decode($rowaliasarticolo['contart']);	
$option_article = unserialize($rowaliasarticolo['option_article']);

include( mypath( PATH_NAME , 'article/str_articolo.php' ) );
}

}
?>
