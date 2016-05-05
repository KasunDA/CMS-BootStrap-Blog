<?php
$num_admin =" SELECT * FROM admin ";
$rs_num_admin = @mysqli_query($myconn,$num_admin) or die( "Errore....".mysqli_error($myconn) );
$row_admin = $rs_num_admin->num_rows;

$num_menu =" SELECT * FROM menu ";
$rs_menu = @mysqli_query($myconn,$num_menu) or die( "Errore....".mysqli_error($myconn) );
$row_menu = $rs_menu->num_rows;

$sqlset = "select * from config";
$rsset = @mysqli_query($myconn,$sqlset) or die( "Errore....".mysqli_error($myconn) );
$rowset = mysqli_fetch_array($rsset);

/*
$num_categ_admin =" SELECT * FROM categ_admin ";
$rs_num_categ_admin = @mysqli_query($myconn,$num_categ_admin) or die( "Errore....".mysqli_error($myconn) );
$row_categ_admin = $rs_num_categ_admin->num_rows;
*/

$sql_images = "select * from images";
$rs_images = @mysqli_query($myconn,$sql_images) or die( "Errore....".mysqli_error($myconn) );
$row_images = $rs_images->num_rows;


$num_admin_login =" SELECT * FROM admin WHERE login=\"on\" ";
$rs_num_admin_login = @mysqli_query($myconn,$num_admin_login) or die( "Errore....".mysqli_error($myconn) );
$row_admin_login = $rs_num_admin_login->num_rows;

$num_art =" SELECT * FROM articoli ";
$rs_num_art = @mysqli_query($myconn,$num_art) or die( "Errore....".mysqli_error($myconn) );
$row_art = $rs_num_art->num_rows;

$num_art_vis = " SELECT * FROM articoli WHERE visibility = \"Si\" ";
$rs_num_art_vis = @mysqli_query($myconn,$num_art_vis) or die( "Errore....".mysqli_error($myconn) );
$row_art_vis = $rs_num_art_vis->num_rows;

$num_art_not_vis = " SELECT * FROM articoli WHERE visibility = \"No\" ";
$rs_num_art_not_vis = @mysqli_query($myconn,$num_art_not_vis) or die( "Errore....".mysqli_error($myconn) );
$row_art_not_vis = $rs_num_art_not_vis->num_rows;

$num_art_cest = " SELECT * FROM articoli WHERE cestinato = \"Si\" ";
$rs_num_art_cest = @mysqli_query($myconn,$num_art_cest) or die( "Errore....".mysqli_error($myconn) );
$row_art_cest = $rs_num_art_cest->num_rows;


$num_art_arch = " SELECT * FROM articoli WHERE archiviato = \"Si\" ";
$rs_num_art_arch = @mysqli_query($myconn,$num_art_arch) or die( "Errore....".mysqli_error($myconn) );
$row_art_arch = $rs_num_art_arch->num_rows;

if( isset($_GET['nm_arch'] ) ){
$dtcrarticoli = $_GET['nm_arch'];	
$num_art_nm_arch = " SELECT * FROM articoli WHERE archiviato = \"Si\" AND datacreate LIKE '$dtcrarticoli%' ";
$rs_num_art_nm_arch = @mysqli_query($myconn,$num_art_nm_arch) or die( "Errore....".mysqli_error($myconn) );
$row_art_nm_arch = $rs_num_art_nm_arch->num_rows;		
}

$num_cat_enabled =" SELECT * FROM categorie WHERE stato_cat= \"enabled\" ";
$rs_num_cat_enabled = @mysqli_query($myconn,$num_cat_enabled) or die( "Errore....".mysqli_error($myconn) );
$row_cat_enabled = $rs_num_cat_enabled->num_rows;

$num_cat_disabled =" SELECT * FROM categorie WHERE stato_cat= \"disabled\" ";
$rs_num_cat_disabled = @mysqli_query($myconn,$num_cat_disabled) or die( "Errore....".mysqli_error($myconn) );
$row_cat_disabled = $rs_num_cat_disabled->num_rows;


if( isset($_GET['category']) &&  $_GET['category']=="all" && isset($_GET['datct']) ){
$datct = dataIT($_GET['datct']);
$num_cat_datct =" SELECT * FROM categorie WHERE data_cat= '$datct' ";
$rs_num_cat_datct = @mysqli_query($myconn,$num_cat_datct) or die( "Errore....".mysqli_error($myconn) );
$row_cat_datct = $rs_num_cat_datct->num_rows;	
}


$num_cat =" SELECT * FROM categorie ";
$rs_num_cat = @mysqli_query($myconn,$num_cat) or die( "Errore....".mysqli_error($myconn) );
$row_cat = $rs_num_cat->num_rows;
$categ = array();


while($rowcateg = mysqli_fetch_array($rs_num_cat)){
$nom_categ = $rowcateg['nome_categoria'];    
$categ[$nom_categ]=strtolower($nom_categ); 
}


foreach($categ as $chiave => $valore) {

if( isset($_GET['p_use']) && $_GET['p_use']=="all_article" && isset($_GET['ct']) && $_GET['ct']==$valore  ){
$num =" SELECT * FROM articoli WHERE categoria='$chiave' ";
$rs = @mysqli_query($myconn,$num) or die( "Errore....".mysqli_error($myconn) );
$rowcategoria = $rs->num_rows;
}
	
}

if( isset($_GET['dt']) ){
$dt=$_GET['dt'];
$sqldt =" SELECT * FROM articoli WHERE datacreate='$dt'";  	
$rsdt = @mysqli_query($myconn,$sqldt) or die( "Errore....".mysqli_error($myconn) );
$rowdt = $rsdt->num_rows;	
}

if( isset($_GET['search']) ){
$term = addslashes($_GET['search']);

if( isset($_GET['p_use']) && $_GET['p_use']=="all_article"){
$num_search =" SELECT * FROM articoli WHERE titart LIKE '%$term%'";  	
$rs_num_search = @mysqli_query($myconn,$num_search) or die( "Errore....".mysqli_error($myconn) );
$row_search = $rs_num_search->num_rows;		
}
if( isset($_GET['category']) && $_GET['category']=="all"){
$num_search_categ =" SELECT * FROM categorie WHERE nome_categoria LIKE '%$term%'";  	
$rs_num_search_categ = @mysqli_query($myconn,$num_search_categ) or die( "Errore....".mysqli_error($myconn) );
$row_search_categ = $rs_num_search_categ->num_rows;		
}

}

?>