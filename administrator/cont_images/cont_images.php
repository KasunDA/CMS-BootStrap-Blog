<div class="row-fluid">
<div class="span12">
<p id="infoupload"></p>
<form  action="../administrator/cont_images/upload_image.php" method="post" enctype="multipart/form-data" class="form-inline" id="form_upload">
<input name="userfile" type="file">
<input type="submit" value="Upload Immagine" class="btn btn-info">
</form>
<hr>
<?php

if( $row_images==0 ){	
echo "<div class=\"container-img\">";
?>
<p class="text-info">Nessuna immagine</p>
<?php	
echo "</div>";
}
else{
echo "<div class=\"container-img\">";

$view_img = 6 ;
$all_row =  ceil($row_images / $view_img); 

for( $i=1; $i<=$all_row;$i++ ){
$first = ( ($i - 1) * $view_img ) ;
$sqlimg = "select * from images LIMIT ".$first." , ".$view_img;
$rsimg = @mysqli_query($myconn,$sqlimg) or die( "Errore....".mysqli_error($myconn) );

echo "<div class=\"row-fluid\"><div class=\"span12\"><ul class=\"thumbnails\">";

while($rwimg = mysqli_fetch_array($rsimg)){
$id_img = $rwimg['id_img'];
$name_img = $rwimg['name_img'];
$url_img = $rwimg['url_img'];	
echo "<li class=\"span2\">
        <a href=\"#infoIMG\" class=\"thumbnail loadimg\" data-toggle=\"modal\" id=\"".$id_img."\">
        <img src=\"/../images/".$name_img."\" id=\"miniature_img\"> 
		</a>
		<a href=\"../administrator/cont_images/remove_img.php?img=".$name_img."\" class=\"btn btn-mini btn-block btn-info\" id=\"remove-img\">Elimina Immagine</a>
	    </li>
	   ";		
}
echo "</ul></div></div>";
}

echo "</div>";
}
?>
</div>
</div>


<div id="infoIMG" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Info & Anteprima Immagine</h3>
  </div>
  <div class="modal-body">
   </div>
  <div class="modal-footer">
    <button class="btn btn-info" data-dismiss="modal" aria-hidden="true">Chiudi</button>
  </div>
</div>











