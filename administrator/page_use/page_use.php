<?php

if( isset($_GET['p_use']) ){    
include( __ROOT__.'/administrator/article/all_article.php' );      
}
if( isset($_GET['mod_art']) ){
include(  __ROOT__.'/administrator/article/mod_art.php' );     
}
if ( isset($_GET['profile_use']) ){
include( __ROOT__.'/administrator/utenti/profile_use.php' );     
}
if( isset($_GET['new_article']) ){    
include( __ROOT__.'/administrator/article/new_article.php' );      
}
if( isset($_GET['category']) ){
include( __ROOT__.'/administrator/category/all_category.php' );		
}

if( isset($_GET['mod_category']) ){
include( __ROOT__.'/administrator/category/mod_category.php' );		
}

if( isset($_GET['new_category']) ){
include( __ROOT__.'/administrator/category/new_category.php' );		
}

if( isset($_GET['users']) ){
include( __ROOT__.'/administrator/utenti/all_users.php' );	
	
}

if( isset($_GET['mod_user']) ){
include( __ROOT__.'/administrator/utenti/mod_user.php' );		
}

if( isset($_GET['new_users']) ){
include(  __ROOT__.'/administrator/utenti/new_users.php' );		
}


if( isset($_GET['mod_cat_admin']) ){
include( __ROOT__.'/administrator/utenti/type_cat_admin.php' );		
}

if( isset($_GET['menu']) ){
include(  __ROOT__.'/administrator/menu/all_menu.php' );		
}

if( isset($_GET['mod_menu']) ){
include( __ROOT__.'/administrator/menu/mod_menu.php' );		
}
if( isset($_GET['send_email']) ){
include( __ROOT__.'/administrator/utenti/send_email.php' );		
}

if( isset($_GET['template']) ){
include( __ROOT__.'/administrator/template/option_temp.php' );		
}


if( isset($_GET['setting']) ){
include( __ROOT__.'/administrator/setting/all_config.php' );		
}

if( isset($_GET['comment']) ){
include(  __ROOT__.'/administrator/article/comment/comment.php' );		
}

if( isset($_GET['images']) ){
include(  __ROOT__.'/administrator/cont_images/cont_images.php' );		
}


if( !isset($_GET['p_use']) && 
    !isset($_GET['mod_art']) && 
	!isset($_GET['profile_use']) && 
	!isset($_GET['new_article']) && 
	!isset($_GET['category']) &&
	!isset($_GET['new_category']) &&
	!isset($_GET['mod_category']) &&
	!isset($_GET['users']) &&
	!isset($_GET['mod_user']) &&
	!isset($_GET['new_users']) &&
	!isset($_GET['mod_cat_admin']) &&
	!isset($_GET['menu']) &&
	!isset($_GET['mod_menu']) &&
	!isset($_GET['send_email']) &&
	!isset($_GET['template']) &&
	!isset($_GET['setting']) &&
	!isset($_GET['comment']) &&
	!isset($_GET['images'])
	
	
	
	){
include( __ROOT__.'/administrator/include_home/home.php' );
}


?>
