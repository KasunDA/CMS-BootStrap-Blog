<div class="row-fluid">
<div class="span12">  

<?php 
if( $p>=1 && $p<=$all_pages_cat ){

if( isset($_GET['category']) && $_GET['category']=="all" && !isset($_GET['stct']) && !isset($_GET['datct']) && !isset($_GET['search']) ){
include( __ROOT__.'/administrator/category/pagin_cat/pagin_all_cat.php' );	
}
if( isset($_GET['category']) && $_GET['category']=="all" && isset($_GET['stct']) && $_GET['stct']=="enabled" ){
include( __ROOT__.'/administrator/category/pagin_cat/pagin_all_cat_enabled.php' );	
}
if( isset($_GET['category']) && $_GET['category']=="all" && isset($_GET['stct']) && $_GET['stct']=="disabled" ){
include( __ROOT__.'/administrator/category/pagin_cat/pagin_all_cat_disabled.php' );	
}
if( isset($_GET['category']) && $_GET['category']=="all" && isset($_GET['search']) ){
include( __ROOT__.'/administrator/category/pagin_cat/pagin_all_cat_search.php' );	
}
if( isset($_GET['category']) && $_GET['category']=="all" && isset($_GET['datct']) ){
include( __ROOT__.'/administrator/category/pagin_cat/pagin_all_cat_datct.php' );	
}

	


}
?>
</div>
</div>