<?php


if( isset($_GET['p_use']) ){    
include('/article/all_article.php');      
}
if( isset($_GET['mod_art']) ){
include('/article/mod_art.php');     
}
if ( isset($_GET['profile_use']) ){
include('/utenti/profile_use.php');     
}
if( isset($_GET['new_article']) ){    
include('/article/new_article.php');      
}
if( isset($_GET['category']) ){
include('/category/all_category.php');		
}

if( isset($_GET['mod_category']) ){
include('/category/mod_category.php');		
}

if( isset($_GET['new_category']) ){
include('/category/new_category.php');		
}

if( isset($_GET['users']) ){
include('/utenti/all_users.php');	
	
}

if( isset($_GET['mod_user']) ){
include('/utenti/mod_user.php');		
}

if( isset($_GET['new_users']) ){
include('/utenti/new_users.php');		
}


if( isset($_GET['mod_cat_admin']) ){
include('/utenti/type_cat_admin.php');		
}

if( isset($_GET['menu']) ){
include('/menu/all_menu.php');		
}

if( isset($_GET['mod_menu']) ){
include('/menu/mod_menu.php');		
}
if( isset($_GET['send_email']) ){
include('/utenti/send_email.php');		
}

if( isset($_GET['template']) ){
include('/template/option_temp.php');		
}


if( isset($_GET['setting']) ){
include('/setting/all_config.php');		
}

if( isset($_GET['comment']) ){
include('/article/comment/comment.php');		
}

if( isset($_GET['images']) ){
include('/cont_images/cont_images.php');		
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
include('/include_home/home.php');
}


?>
