<?php
$url_page ="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
?>

<br>
<ul class="inline" id="option_share">
<li><a href="http://www.facebook.com/sharer.php?u=<?php echo $url_page;?>&amp;t=<?php echo $title_comp;?>"  target="_self"><i class="fa fa-facebook fa-lg" data-toggle="tooltip" title="Condividi su Facebook"></i></a></li>
<li><a href="/print/<?php echo $aliasarticle.".htm"; ?>" target="_self"><i class="fa fa-print fa-lg" data-toggle="tooltip" title="Stampa l'Articolo"></i></a></li>
<li>
<?php
$mylike = NULL;	
$tooltip = "Aggiungi ai preferiti";
$file = "cookie_like";
if( isset($_COOKIE['_like']) ){
$cookie_like = urldecode($_COOKIE['_like']);
$array_like = explode("|",$cookie_like);

for( $i=0;$i<count($array_like);$i++ ){
$array_art = explode("_", $array_like[$i]);
for($j=0;$j<count($array_art);$j++){
if( $array_art[0]==$aliasarticle ){
$mylike = "mylike";	
$tooltip = "Rimuovi dai preferiti";
$file = "nolike";
}
}	
}
}
?>
<a href="/article/<?php echo $file; ?>.php?al=<?php echo $aliasarticle; ?>" class="<?php echo $mylike; ?>" id="add_pet">
<i class="fa fa-heart-o fa-lg" data-toggle="tooltip" title="<?php echo $tooltip; ?>"></i>
</a>
</li>
</ul>
<br>




