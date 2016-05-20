<?php


if( isset($_GET['p_use']) ){    
include( mypath( PATH_NAME , 'administrator/article/all_article.php' ) );      
}
if( isset($_GET['mod_art']) ){
include(  mypath( PATH_NAME , 'administrator/article/mod_art.php' ) );     
}
if ( isset($_GET['profile_use']) ){
include( mypath( PATH_NAME , 'administrator/utenti/profile_use.php' ) );     
}
if( isset($_GET['new_article']) ){    
include( mypath( PATH_NAME , 'administrator/article/new_article.php' ) );      
}
if( isset($_GET['category']) ){
include( mypath( PATH_NAME , 'administrator/category/all_category.php' ) );		
}

if( isset($_GET['mod_category']) ){
include( mypath( PATH_NAME , 'administrator/category/mod_category.php' ) );		
}

if( isset($_GET['new_category']) ){
include( mypath( PATH_NAME , 'administrator/category/new_category.php' ) );		
}

if( isset($_GET['users']) ){
include( mypath( PATH_NAME , 'administrator/utenti/all_users.php' ) );	
	
}

if( isset($_GET['mod_user']) ){
include( mypath( PATH_NAME , 'administrator/utenti/mod_user.php' ) );		
}

if( isset($_GET['new_users']) ){
include(  mypath( PATH_NAME , 'administrator/utenti/new_users.php' ) );		
}


if( isset($_GET['mod_cat_admin']) ){
include( mypath( PATH_NAME , 'administrator/utenti/type_cat_admin.php' ) );		
}

if( isset($_GET['menu']) ){
include(  mypath( PATH_NAME , 'administrator/menu/all_menu.php' ) );		
}

if( isset($_GET['mod_menu']) ){
include( mypath( PATH_NAME , 'administrator/menu/mod_menu.php' ) );		
}
if( isset($_GET['send_email']) ){
include( mypath( PATH_NAME , 'administrator/utenti/send_email.php' ) );		
}

if( isset($_GET['template']) ){
include( mypath( PATH_NAME , 'administrator/template/option_temp.php' ) );		
}


if( isset($_GET['setting']) ){
include( mypath( PATH_NAME , 'administrator/setting/all_config.php' ) );		
}

if( isset($_GET['comment']) ){
include(  mypath( PATH_NAME , 'administrator/article/comment/comment.php' ) );		
}

if( isset($_GET['images']) ){
include(  mypath( PATH_NAME , 'administrator/cont_images/cont_images.php' ) );		
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
include( mypath( PATH_NAME , 'administrator/include_home/home.php' ) );
}


?>
