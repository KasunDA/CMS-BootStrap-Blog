<?php
if( $p>0 && $p<=$all_pages ){
if ($all_pages > 1){
if($p==1){
?>
<div class="pagination">
<ul>
<li  class="disabled"><a href="">&laquo;</a></li>
<?php
}
elseif($p > 1){
?>
<div class="pagination">
<ul>
<li><a href="/all_article.html/<?php echo $p-1;?>">&laquo;</a></li>
<?php	
}
for ($n=1; $n<=$all_pages; $n++) {
if ( $n == $p )    
{
?>
<li class="disabled"><a href=""><?php echo $n; ?></a></li>
<?php  
}
else {
?>
<li><a href="/all_article.html/<?php echo $n;?>"><?php echo $n; ?></a></li>
<?php	
}
}
if($all_pages>$p){
?>
<li><a href="/all_article.html/<?php echo $p+1;?>">&raquo;</a></li>
</ul>
</div>
<?php	
}
if($all_pages==$p){
?>
<li class="disabled"><a href="">&raquo;</a></li>
</ul>
</div>
<?php		
}                                         
}
}
else{
?>
<p class="muted">La Pagina Selezionata Non Esiste!</p>
<?php
}

?>
<hr>



