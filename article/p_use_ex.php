<?php
$p_use = $_GET['p_use'];

if( !isset($_GET['t_arch']) && $p_use!="archivie"){
$implodep_use = explodep_use($p_use);

/* if p_use =>all_article */
if($p_use=="all_article"  ){
	
if( !isset($_GET['alias_art']) ){
	
while($row_art_vis_no_arch  = mysqli_fetch_array( $rs_sql_art_vis_no_arch_p )){	
$idart = $row_art_vis_no_arch['idart'];
$titlearticle = ucwords($row_art_vis_no_arch['titart']);
$aliasarticle = $row_art_vis_no_arch['alias'];
$datacreatearticle = datacreate($row_art_vis_no_arch['datacreate']);
$authorarticle =  ucwords($row_art_vis_no_arch['author']);
$profileauthorarticle = $row_art_vis_no_arch['profile_author'];
$contarticle = html_entity_decode($row_art_vis_no_arch['contart']);	
$option_article = unserialize($row_art_vis_no_arch['option_article']);
include('/article/str_articolo.php');
}	
include('/article/pager/pager_all_p_use.php');	
}
else{
$alias_art= $_GET['alias_art'];
$sqlaliasarticolo = "select * from articoli where alias = '$alias_art'";
$rsaliasarticolo = @mysqli_query($myconn,$sqlaliasarticolo) or die( "Errore....".mysqli_error($myconn) );	
$numeroartalias = $rsaliasarticolo->num_rows;

if( $numeroartalias!=0 ){	
while($rowarticolivis = mysqli_fetch_array($rsaliasarticolo)){
$idart = $rowarticolivis['idart'];
$titlearticle = ucwords($rowarticolivis['titart']);
$aliasarticle = $rowarticolivis['alias'];
$datacreatearticle = datacreate($rowarticolivis['datacreate']);
$authorarticle =  ucwords($rowarticolivis['author']);
$profileauthorarticle = $rowarticolivis['profile_author'];
$contarticle = html_entity_decode($rowarticolivis['contart']);	
$option_article = unserialize($rowarticolivis['option_article']);
include('/article/str_articolo.php');
}	
}	
	
	
	
}
}
/* if p_use =>all_article */


/* if p_use =>search */
if( $p_use=="search" && isset($_GET['q']) ){
	
$q = addslashes(trim($_GET['q']));
$array_q = explode(" ",$q);
$count_array_q = count($array_q);


if($count_array_q==1  ){	
$sqlsearch = "select * from articoli where (visibility=\"Si\" and archiviato=\"No\" ) and (titart like '%$q%' or contart like '%$q%')";	
}
elseif( $count_array_q>1 ){
$array_query = array();
for( $i=0;$i<count($array_q);$i++ ){
$array_query[$i] = "'%".$array_q[$i]."%'";	
}
$sqlsearch = "select * from articoli where ( visibility=\"Si\" and archiviato=\"No\" ) and ( titart LIKE ".implode(" OR titart LIKE ",$array_query)." OR contart LIKE ".implode("OR contart LIKE ",$array_query).")" ;

}

$rssearch = @mysqli_query($myconn,$sqlsearch) or die( "Errore....".mysqli_error($myconn) );	
$nsearch = $rssearch->num_rows;
$all_pages_search = ceil( $nsearch / $view_art );


if($count_array_q==1  ){	
$sqlsearchquery = "select * from articoli where (visibility=\"Si\" and archiviato=\"No\" ) and (titart like '%$q%' or contart like '%$q%') limit ".$first.",".$view_art;	
}
elseif( $count_array_q>1 ){
$array_query = array();
for( $i=0;$i<count($array_q);$i++ ){
$array_query[$i] = "'%".$array_q[$i]."%'";	
}
$sqlsearchquery = "select * from articoli where ( visibility=\"Si\" and archiviato=\"No\" ) and ( titart LIKE ".implode(" OR titart LIKE ",$array_query)." OR contart LIKE ".implode("OR contart LIKE ",$array_query)." ) LIMIT ".$first." , ".$view_art;

}

$rssearchquery = @mysqli_query($myconn,$sqlsearchquery) or die( "Errore....".mysqli_error($myconn) );	

echo "Totale risultati: <strong class=\"text-info\">".$nsearch."</strong> <hr>";

include('/article/str_articolo_search.php');

include('/article/pager/pager_all_search.php');	


}
/* if p_use =>search */


$sqlarticoli = "select * from articoli where categoria='$implodep_use' and visibility='Si' and archiviato = 'No' ";
$rssqlarticoli = @mysqli_query($myconn,$sqlarticoli) or die( "Errore....".mysqli_error($myconn) );	
$narticoli = $rssqlarticoli->num_rows;

if( $narticoli!=0  ){
	
if( !isset($_GET['alias_art']) ){
$all_pages_p_use_articoli_cat = ceil( $narticoli / $view_art ); 
$sqlarticoli_p = "select * from articoli where categoria='$implodep_use' and visibility='Si' and archiviato = 'No' ORDER BY datacreate DESC LIMIT $first , $view_art ";
$rssqlarticoli_p = @mysqli_query($myconn,$sqlarticoli_p) or die( "Errore....".mysqli_error($myconn) );	

while($rowarticolivis = mysqli_fetch_array($rssqlarticoli_p)){
$idart = $rowarticolivis['idart'];
$titlearticle = ucwords($rowarticolivis['titart']);
$aliasarticle = $rowarticolivis['alias'];
$datacreatearticle = datacreate($rowarticolivis['datacreate']);
$authorarticle =  ucwords($rowarticolivis['author']);
$profileauthorarticle = $rowarticolivis['profile_author'];
$contarticle = html_entity_decode($rowarticolivis['contart']);	
$option_article = unserialize($rowarticolivis['option_article']);
include('/article/str_articolo.php');

}	
include('/article/pager/pager_all_p_use_cat.php');		
}
else{
$sqlaliasarticolo = "select * from articoli where alias = '$alias_art'";
$rsaliasarticolo = @mysqli_query($myconn,$sqlaliasarticolo) or die( "Errore....".mysqli_error($myconn) );	
$numeroartalias = $rsaliasarticolo->num_rows;

if( $numeroartalias!=0 ){	
while($rowarticolivis = mysqli_fetch_array($rsaliasarticolo)){
$idart = $rowarticolivis['idart'];
$titlearticle = ucwords($rowarticolivis['titart']);
$aliasarticle = $rowarticolivis['alias'];
$datacreatearticle = datacreate($rowarticolivis['datacreate']);
$authorarticle =  ucwords($rowarticolivis['author']);
$profileauthorarticle = $rowarticolivis['profile_author'];
$contarticle = html_entity_decode($rowarticolivis['contart']);	
$option_article = unserialize($rowarticolivis['option_article']);
include('/article/str_articolo.php');
}	
}	
}


}




$sqlaliasarticolo = "select * from articoli where alias = '$p_use'";
$rsaliasarticolo = @mysqli_query($myconn,$sqlaliasarticolo) or die( "Errore....".mysqli_error($myconn) );	
$numeroartalias = $rsaliasarticolo->num_rows;

if( $numeroartalias!=0 ){	
while($rowarticolivis = mysqli_fetch_array($rsaliasarticolo)){
$idart = $rowarticolivis['idart'];
$titlearticle = ucwords($rowarticolivis['titart']);
$aliasarticle = $rowarticolivis['alias'];
$datacreatearticle = datacreate($rowarticolivis['datacreate']);
$authorarticle =  ucwords($rowarticolivis['author']);
$profileauthorarticle = $rowarticolivis['profile_author'];
$contarticle = html_entity_decode($rowarticolivis['contart']);	
$option_article = unserialize($rowarticolivis['option_article']);
include('/article/str_articolo.php');
}	
}


	
}
else{
if( $p_use=="archivie" ){

if( isset($_GET['t_arch']) && !isset($_GET['art_arch']) ){
$tarch = $_GET['t_arch'];
$arraytarch = explode("-",$tarch);
$newtarch = ucwords($arraytarch[0])." ".$arraytarch[1];

$sqltarch = "select * from archivio where nome_archivio = '$newtarch'";
$rstarch = @mysqli_query($myconn,$sqltarch) or die( "Errore....".mysqli_error($myconn) );
$rowtarch =  mysqli_fetch_array($rstarch);
$idartarch = unserialize($rowtarch['art_archiviati']);
$query = "(";
for( $i=0;$i<count($idartarch);$i++ ){
if( $i==0 && $i<count($idartarch)-1 ){
$query = $query.$idartarch[$i].",";	
}
else{
$query= $query.$idartarch[$i];		
}	
}
$query = $query.")";
	
	
$sqlqueryart = "SELECT * FROM articoli WHERE visibility=\"Si\" AND idart IN $query ";	
$rsqueryart = @mysqli_query($myconn,$sqlqueryart) or die( "Errore....".mysqli_error($myconn) );
$numqueryart= $rsqueryart->num_rows;
include('article/str_articolo_arch.php');
	
	
	
}
if( isset($_GET['art_arch']) && isset($_GET['art_arch'])){
$sqlaliasarticolo = "select * from articoli where alias = '$art_arch'";
$rsaliasarticolo = @mysqli_query($myconn,$sqlaliasarticolo) or die( "Errore....".mysqli_error($myconn) );	
$numeroartalias = $rsaliasarticolo->num_rows;

if( $numeroartalias!=0 ){	
while($rowarticolivis = mysqli_fetch_array($rsaliasarticolo)){
$idart = $rowarticolivis['idart'];
$titlearticle = ucwords($rowarticolivis['titart']);
$aliasarticle = $rowarticolivis['alias'];
$datacreatearticle = datacreate($rowarticolivis['datacreate']);
$authorarticle =  ucwords($rowarticolivis['author']);
$profileauthorarticle = $rowarticolivis['profile_author'];
$contarticle = html_entity_decode($rowarticolivis['contart']);	
$option_article = unserialize($rowarticolivis['option_article']);
include('/article/str_articolo.php');
}	
}




}
	
}	



	
	
}

?>
