
<div class="row-fluid">
<div class="span12">   
<div class="alert alert-info">

<?php
if( !isset($_GET['p_use']) && 
    !isset($_GET['mod_art']) && 
	!isset($_GET['profile_use']) && 
	!isset($_GET['new_article']) && 
	!isset($_GET['category']) &&
	!isset($_GET['new_category']) &&
	!isset($_GET['mod_category']) &&
	!isset($_GET['users']) &&
	!isset($_GET['mod_user'])&&
	!isset($_GET['new_users'])	&&
	!isset($_GET['mod_cat_admin']) &&
	!isset($_GET['menu']) &&
	!isset($_GET['mod_menu']) &&
	!isset($_GET['send_email']) &&
	!isset($_GET['setting']) && 
	!isset($_GET['template']) &&
	!isset($_GET['themes']) &&
	!isset($_GET['comment']) && 
	!isset($_GET['images'])
	){
		
		
	echo "<i class=\"fa fa-cog\"></i> <strong>Amministrazione</strong>";	
	}
	
if( isset($_GET['p_use']) && !isset($_GET['st']) && !isset($_GET['ct']) && !isset($_GET['dt'])){

echo "<i class=\"fa fa-file\"></i> <strong>Articoli</strong>";		
	
}
if( isset($_GET['p_use']) && isset($_GET['st']) ){

echo "<i class=\"fa fa-file\"></i> <strong>Articoli: <em>'".ucwords($_GET['st'])."'</em> </strong>";	
}	

if( isset($_GET['p_use']) && isset($_GET['ct']) ){

echo "<i class=\"fa fa-file\"></i> <strong>Articoli: <em>'".ucwords($_GET['ct'])."'</em> </strong>";	
}	

if( isset($_GET['p_use']) && isset($_GET['dt']) ){

echo "<i class=\"fa fa-file\"></i> <strong>Articoli: <em>'".ucwords(dataIT($_GET['dt']))."'</em> </strong>";	
}



if( isset($_GET['template']) ){
	
echo "<i class=\"fa fa-picture-o\"></i> <strong>Gestione Template</strong>";		
	
}	



if( isset($_GET['category'])  ){
	
echo "<i class=\"fa fa-folder-open-o\"></i> <strong>Categorie Articoli</strong>";		
	
}


if( isset($_GET['new_category'])  ){
	
echo "<i class=\"fa fa-folder-open-o\"></i> <strong>Nuova Categoria</strong>";		
	
}

if( isset($_GET['new_article'])  ){
	
echo "<i class=\"fa fa-pencil-square\"></i> <strong>Nuovo Articolo</strong>";		
	
}

if( isset($_GET['profile_use'])  ){
	
echo "<i class=\"fa fa-user\"></i> <strong>Profilo Utente </strong>";		
	
}

if( isset($_GET['mod_art'])  ){
	
echo "<i class=\"fa fa-file-code-o\"></i> <strong>Modifica Articolo</strong>";		
	
}

if( isset($_GET['mod_category'])  ){
	
echo "<i class=\"fa fa-folder-open-o\"></i> <strong>Modifica Categoria</strong>";		
	
}

if( isset($_GET['users']) ){
	
echo "<i class=\"fa fa-users\"></i> <strong>Gestione Utenti</strong>";		
	
}

if( isset($_GET['mod_user']) ){
	
echo "<i class=\"fa fa-user\"></i> <strong>Modifica Utente</strong>";		
	
}


if( isset($_GET['new_users']) ){
	
echo "<i class=\"fa fa-user\"></i> <strong>Nuovo Utente</strong>";		
	
}

if( isset($_GET['mod_cat_admin']) ){
	
echo "<i class=\"fa fa-user\"></i> <strong> Modifica Categoria Utenti</strong>";		
	
}

if( isset($_GET['menu']) ){
	
echo "<i class=\"fa fa-list-ul\"></i> <strong>Gestione Menù</strong>";		
	
}

if( isset($_GET['mod_menu']) ){
	
echo "<i class=\"fa fa-list-ul\"></i> <strong>Modifica Menù</strong>";		
	
}
if(isset($_GET['send_email'])){
echo "<i class=\"fa fa-envelope-o\"></i> <i class=\"fa fa-share\"></i> <strong>Invia E-Mail Utenti</strong>";	
	
}

if( isset($_GET['setting']) ){
	
echo "<i class=\"fa fa-cogs\"></i> <strong>Configurazione</strong>";		
	
}	

if( isset($_GET['comment']) ){
	
echo "<i class=\"fa fa-commenting-o\"></i> <strong>Gestione Commenti</strong>";		
	
}	

if( isset($_GET['images']) ){
	
echo "<i class=\"fa fa-file-image-o\" aria-hidden=\"true\"></i> <strong>Gestione Immagini</strong>";		
	
}

?>


      
</div>
</div>
</div>  