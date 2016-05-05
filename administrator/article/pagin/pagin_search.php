<?php
$search = $_GET['search'];
if ($all_pages_search > 1){
if($p == 1){

?>
<div class="pagination">
<ul>
<li  class="disabled"><a href="#">&laquo;</a></li>
<?php
}
elseif($p > 1){
?>
<div class="pagination">
<ul>
<li><a href="/administrator/?idut=<?php echo $cod_md5; ?>&p_use=all_article&search=<?php echo $search;?>&p=<?php echo $p-1;?>">&laquo;</a></li>
<?php	

}

for ($n=1; $n<=$all_pages_search; $n++) {
if ($n == $p )    
{
?>
<li class="disabled"><a href=""><?php echo $n; ?></a></li>
<?php  
}
else {
?>
<li><a href="/administrator/?idut=<?php echo $cod_md5;?>&p_use=all_article&search=<?php echo $search;?>&p=<?php echo $n;?>"><?php echo $n; ?></a></li>
<?php	
}
}
if($all_pages_search>$p){
?>
<li><a href="/administrator/?idut=<?php echo $cod_md5;?>&p_use=all_article&search=<?php echo $search;?>&p=<?php echo $p+1;?>">&raquo;</a></li>
</ul>
</div>
<?php	
}

if($all_pages_search==$p){
?>
<li class="disabled"><a href="">&raquo;</a></li>
</ul>
</div>
<?php		
}

                                         
}



?>