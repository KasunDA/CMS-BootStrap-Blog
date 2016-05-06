<?php
$fb = $rowsetting['fb'];
$tw = $rowsetting['tw'];
$gooplus = $rowsetting['gooplus'];
$github = $rowsetting['github'];
$linkem = $rowsetting['linkem'];
$codepen = $rowsetting['codepen'];

echo "<h4>Social Profile</h4>";

if( strlen($fb)==0 && 
    strlen($tw)==0 && 
	strlen($gooplus)==0 && 
	strlen($github)==0 && 
	strlen($linkem)==0 && 
	strlen($codepen)==0){
		
		
	echo "Nessun Profilo";	
}
else{	
echo "<ol>";
if(strlen($fb)!=0){	echo "<li><a href=\"".$fb."\" target=\"_blank\"><i class=\"fa fa-facebook\"></i>&nbsp;Facebook</a></li>";}	
if( strlen($tw)!=0 ){echo "<li><a href=\"".$tw."\" target=\"_blank\"><i class=\"fa fa-twitter\"></i>&nbsp;Twitter</a></li>";}
if( strlen($gooplus)!=0 ){echo "<li><a href=\"".$gooplus."\" target=\"_blank\"><i class=\"fa fa-google-plus\"></i>&nbsp;Google+</a></li>";}
if( strlen($github)!=0 ){echo "<li><a href=\"".$github."\" target=\"_blank\"><i class=\"fa fa-github\"></i>&nbsp;GitHub</a></li>";}
if( strlen($linkem)!=0 ){echo "<li><a href=\"".$linkem."\" target=\"_blank\"><i class=\"fa fa-linkedin-square\"></i>&nbsp;Linkedin</a></li>";}	
if( strlen($codepen)!=0 ){echo "<li><a href=\"".$codepen."\" target=\"_blank\"><i class=\"fa fa-codepen\"></i>&nbsp;CodePen</a></li>";}
echo "</ol>";	
}
?>
	
	
	
