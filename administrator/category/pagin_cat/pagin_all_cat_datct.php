<?php
$datcat = $_GET['datct'];
if ($all_pages_cat_datcat > 1){
	
if($p==1){ 
?>
<div class="pagination">
<ul>
<li class="disabled"><a href="#">&laquo;</a></li>
<?php
}
elseif($p > 1){	
?>
<div class="pagination">
<ul>
<li><a href="/administrator/?idut=<?php echo $cod_md5; ?>&category=all&datct=<?php echo $datcat; ?>&p=<?php echo $p-1;?>">&laquo;</a></li>
<?php
}
for ($n=1; $n<=$all_pages_cat_datcat; $n++) {
if ( $n == $p ) {	
?>
<li class="disabled"><a href=""><?php echo $n; ?></a></li>
<?php	
}	
else {
?>
<li><a href="/administrator/?idut=<?php echo $cod_md5;?>&category=all&datct=<?php echo $datcat; ?>&p=<?php echo $n;?>"><?php echo $n; ?></a></li>
<?php
}
}
if($all_pages_cat_datcat>$p){	
?>
<li><a href="/administrator/?idut=<?php echo $cod_md5;?>&category=all&datct=<?php echo $datcat; ?>&p=<?php echo $p+1;?>">&raquo;</a></li>
</ul>
</div>
<?php	
}
if($all_pages_cat_datcat==$p){
?>
<li class="disabled"><a href="">&raquo;</a></li>
</ul>
</div>
<?php		
}
}
?>