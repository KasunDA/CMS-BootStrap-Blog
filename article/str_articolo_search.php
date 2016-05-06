<?php
echo "<ol>";
while($rowsearch = mysqli_fetch_array($rssearchquery)){
$titlearticle = ucwords($rowsearch['titart']);
$aliasarticle = $rowsearch['alias'];
$arch = $rowsearch['archiviato'];
$datacr = datacreate($rowsearch['datacreate']);
$arrdcr = explode(" ",$datacr);
$aliasarch = strtolower($arrdcr[0]."-".$arrdcr[1]);

$contarticle = strip_tags(html_entity_decode($rowsearch['contart']));
$caratteri_speciali = array('&agrave;','&egrave;','&igrave;','&amp;','&euro;','&ugrave;');
$caratteri_sostitutivi = array('à','è','ì','&','€','ù');
$contarticle = str_replace($caratteri_speciali,$caratteri_sostitutivi,$contarticle);

$arraytit = explode(" ",$titlearticle);
$arraycont = explode(" ", $contarticle);

$array_q = explode(" ",$q);
$count_array_q = count(array_unique($array_q));


if($count_array_q==1  ){
$newtit = array(); $newcont = array();

for($i=0;$i<count($arraytit);$i++){
$newtit[$i] = search_query($arraytit[$i],$q);	
}	

for($i=0;$i<count($arraycont);$i++){
$newcont[$i] = search_query($arraycont[$i],$q);	
}
echo "<li>";
echo "<h4><a href=\"/article/go.php?p_use=".$aliasarticle."\">".implode(" ",$newtit)."</a></h4>";	
echo "".cont_article_search(implode(" ",$newcont))."<br><hr></li>";	
	
}

elseif( $count_array_q>1 ){
$regexp = "/<mark>/i";
for($i=0;$i<count($arraytit);$i++){
	
for( $j=0;$j<$count_array_q;$j++ ){
if( !preg_match($regexp,$arraytit[$i]) ){
$arraytit[$i] = search_query($arraytit[$i],$array_q[$j]);	
}	
}
	
}

for($i=0;$i<count($arraycont);$i++){
	
for( $j=0;$j<$count_array_q;$j++ ){
if( !preg_match($regexp,$arraycont[$i]) ){
$arraycont[$i] = search_query($arraycont[$i],$array_q[$j]);	
}	
}
	
}

echo "<li>
      <h4>
	  <a href=\"/article/go.php?p_use=".$aliasarticle."\">".implode(" ",$arraytit)."</a>
	  </h4>".cont_article_search(implode(" ",$arraycont))."<br><hr>
	  </li>";
	  
	  
}

}
echo "</ol>";

?>