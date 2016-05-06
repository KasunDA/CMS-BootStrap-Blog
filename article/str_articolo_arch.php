<?php
if($numqueryart==0){
echo "<p class=\"muted\">Gli Articoli di questo Archivio sono momentaneamente sospesi.</p>";
	
}

else{
echo "<ol>";
while($rowqueryart = mysqli_fetch_array($rsqueryart)){
$titlearticle = ucwords($rowqueryart['titart']);
$aliasarticle = $rowqueryart['alias'];
$contarticle = html_entity_decode($rowqueryart['contart']);
$t_arch = $_GET['t_arch'];
echo "<li>
      <h4>
	  <a href=\"/article/go.php?p_use=archivie&t_arch=".$t_arch."&art_arch=".$aliasarticle."\">".$titlearticle."</a>
	  </h4>".cont_article_arch($contarticle)."<br><hr>
	  </li>";
}
echo "</ol>";	
}

?>








