<div class="row-fluid">
<div class="span12">  

<?php

if( $p>=1 && $p<=$all_pages ){
	

if( $p_use=="all_article" && !isset($_GET['st']) && !isset($_GET['dt']) && !isset($_GET['ct']) && !isset($_GET['search']) && !isset($_GET['nm_arch']) ){
include( mypath( PATH_NAME , 'administrator/article/pagin/pagin_all.php' ) );
}

if( $p_use=="all_article" && isset($_GET['st']) && $_GET['st']=="pubblicato" ){
include( mypath( PATH_NAME , 'administrator/article/pagin/pagin_filter_pubbl.php' ) );	
}

if( $p_use=="all_article" && isset($_GET['st']) && $_GET['st']=="sospeso" ){
include( mypath( PATH_NAME , 'administrator/article/pagin/pagin_filter_sosp.php' ) );	
}

if( $p_use=="all_article" && isset($_GET['st']) && $_GET['st']=="cestinato" ){
include( mypath( PATH_NAME , 'administrator/article/pagin/pagin_filter_cest.php' ) );		
}

if( $p_use=="all_article" && isset($_GET['st']) && $_GET['st']=="archiviato" ){
include( mypath( PATH_NAME , 'administrator/article/pagin/pagin_filter_arch.php' ) );		
}


if( $p_use=="all_article" && isset($_GET['dt']) ){
include( mypath( PATH_NAME , 'administrator/article/pagin/pagin_filter_data.php' ) );		
}



if( $p_use=="all_article" && isset($_GET['search']) ){
include( mypath( PATH_NAME , 'administrator/article/pagin/pagin_search.php' ) );	
}

if( $p_use=="all_article" && isset($_GET['nm_arch']) ){
include( mypath( PATH_NAME , 'administrator/article/pagin/pagin_filter_nm_arch.php' ) );	
}


foreach($cat as $chiave => $valore) {
	
if( isset($_GET['p_use']) && $_GET['p_use']=="all_article" && isset($_GET['ct']) && $_GET['ct']==$valore ){
include( mypath( PATH_NAME , 'administrator/article/pagin/pagin_categ.php' ) );
}	
}

}
?>
	
</div>
</div>