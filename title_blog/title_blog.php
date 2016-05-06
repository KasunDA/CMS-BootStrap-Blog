<title>
<?php
$name_blog = $rowsetting['name_blog'];
$title_comp = NULL;

if( !isset($_GET['cookie-policy']) ){	

if( !isset($_GET['p_use']) ){	
if( !isset($_GET['ref']) ){
	
$title_comp =  $name_blog." - Home";		
}	
else{
$title_comp = $name_blog." - Errore";		
}	

}
else{
$p_use = $_GET['p_use'];

if( $p_use=="search"  && isset($_GET['q']) ){
$q = $_GET['q'];
$title_comp = $name_blog." - Risultati Ricerca per : \"".$q."\"";	
}



if($p_use=="all_article"){
if(!isset($_GET['alias_art'])){
$title_comp = $name_blog." - Articoli di tutte le Categorie";	
}
else{
$alias_art = $_GET['alias_art'];
$art_all_title_blog = "select * from articoli where alias = '$alias_art'";
$rs_art_all_title_blog  = @mysqli_query($myconn,$art_all_title_blog) or die( "Errore....".mysqli_error($myconn) );	
$nm_art_all_title_blog = $rs_art_all_title_blog ->num_rows;	
if( $nm_art_all_title_blog!=0 ){
while($row_art_all_title_blog = mysqli_fetch_array($rs_art_all_title_blog)){
$tt_art_all_title_blog= ucwords($row_art_all_title_blog['titart']);	
}	
$title_comp = $name_blog." - Articoli di tutte le Categorie - ".$tt_art_all_title_blog;	
}
}			
}

if( $p_use=="archivie" ){

if( isset($_GET['t_arch']) ){
$t_arch = $_GET['t_arch'];
$arr_t_arch = explode("-", $t_arch);
$nome_arch = ucwords($arr_t_arch[0])." ".$arr_t_arch[1];

if( !isset($_GET['art_arch']) ){
$title_comp =  $name_blog." - ".$nome_arch;	
}
else{
$art_arch = $_GET['art_arch'];
$art_arch_title_blog = "select * from articoli where alias = '$art_arch' and archiviato = 'Si'";
$rs_art_arch_title_blog  = @mysqli_query($myconn,$art_arch_title_blog) or die( "Errore....".mysqli_error($myconn) );	
$nm_art_arch_title_blog = $rs_art_arch_title_blog ->num_rows;

if( $nm_art_arch_title_blog!=0 ){
while($row_art_arch_title_blog = mysqli_fetch_array($rs_art_arch_title_blog)){
$tt_art_arch_title_blog= ucwords($row_art_arch_title_blog['titart']);	
}	

$title_comp = $name_blog." - ".$nome_arch." - ".$tt_art_arch_title_blog;

}


}


	
}

	
}


$art_title_blog = "select * from articoli where alias = '$p_use'";
$rs_art_title_blog  = @mysqli_query($myconn,$art_title_blog) or die( "Errore....".mysqli_error($myconn) );	
$nm_art_title_blog = $rs_art_title_blog ->num_rows;

if( $nm_art_title_blog!=0 ){
while($row_art_title_blog = mysqli_fetch_array($rs_art_title_blog)){
$tt_art_title_blog= ucwords($row_art_title_blog['titart']);	
}
$title_comp = $name_blog." - ".$tt_art_title_blog;		
}

$cat_title_blog = "select * from categorie where alias_categoria = '$p_use'";
$rs_cat_title_blog  = @mysqli_query($myconn,$cat_title_blog) or die( "Errore....".mysqli_error($myconn) );	
$nm_cat_title_blog = $rs_cat_title_blog ->num_rows;

if( $nm_cat_title_blog!=0 ){
while($row_cat_title_blog = mysqli_fetch_array($rs_cat_title_blog)){
$name_cat_title_blog= ucwords($row_cat_title_blog['nome_categoria']);	
}
if(!isset($_GET['alias_art'])){
$title_comp = $name_blog." - ".$name_cat_title_blog;		
}
else{
$alias_art = $_GET['alias_art'];
$art_cat_title_blog = "select * from articoli where alias = '$alias_art'";
$rs_art_cat_title_blog  = @mysqli_query($myconn,$art_cat_title_blog) or die( "Errore....".mysqli_error($myconn) );	
$nm_art_cat_title_blog = $rs_art_cat_title_blog ->num_rows;	
if( $nm_art_cat_title_blog!=0 ){
while($row_art_cat_title_blog = mysqli_fetch_array($rs_art_cat_title_blog)){
$tt_art_cat_title_blog= ucwords($row_art_cat_title_blog['titart']);	
}	
$title_comp = $name_blog." - ".$name_cat_title_blog." - ".$tt_art_cat_title_blog;	
}
}	
}

}
}
else{
$title_comp = $name_blog." - Cookie Policy";		
	
	
}

echo $title_comp;

?>
</title>
