<?php
if( $num_art_vis_no_arch==0 && !( isset($_GET['p_use']) &&  $_GET['p_use']=="archivie") ){
if(!isset($_GET['cookie-policy'])){
?>
<div class="row-fluid">
<div class="span12">
<div class="blog-post">
<p class="lead">Nessun Articolo</p>
</div>  
</div>
</div>
<?php	
}
else{	
include( __ROOT__. "/article/cookie-policy.php" ) ;		
}	
}
else{	

if(!isset($_GET['cookie-policy'])){	
if( !isset($_GET['ref'])  ){	
if( !isset($_GET['p_use']) ){
include( __ROOT__.'/article/no_p_use.php' ) ;
}
else{	
include( __ROOT__.'/article/p_use_ex.php' ) ;		
}	
}
else{
?>
<div class="row-fluid">
<div class="span12">
<div class="blog-post">
<div class="alert alert-error">
<strong><i class="fa fa-exclamation-triangle"></i> Errore!</strong> La pagina richesta non esiste.<br>
Torna alla <a href="/">Home Page</a>.
</div>
</div>  
</div>
</div>
<?php		
}	
}
else{
include( __ROOT__."/article/cookie-policy.php" ) ;
}
}
?>	
