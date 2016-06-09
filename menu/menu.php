<?php
$logo = html_entity_decode($rowsetting['logo_blog'], ENT_QUOTES, "UTF-8");
?>
<div class="navbar navbar-fixed-top">
<span id="test_cook"></span>
<div class="navbar-inner">
<div class="container">

<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="brand" href="/"><?php echo $logo;?></a>
<!--/.nav-collapse -->
<div class="nav-collapse collapse">
<ul class="nav">
<?php
while( $rowmenufront = mysqli_fetch_array($rsmenufront) ){
$id_menu = $rowmenufront['id_menu'];
$voci_menu = unserialize($rowmenufront['voci_menu']);
$url_voci_menu = unserialize($rowmenufront['url_voci_menu']);

for($i=0;$i<count($voci_menu );$i++){

$voicemenu =" SELECT * FROM voci_menu WHERE nome_voce_menu='$voci_menu[$i]'";
$rsvoicemenu = @mysqli_query($myconn,$voicemenu) or die( "Errore....".mysqli_error($myconn) );
$rowvoicemenu = mysqli_fetch_array($rsvoicemenu);
$stato_voce_menu = $rowvoicemenu['stato_voce_menu'];
$home = $rowvoicemenu['home'];

if($home=="si"){
echo "<li><a href=\"/\">".$voci_menu[$i]."</a></li>";		
}
else{
if($stato_voce_menu=="enabled"){
echo "<li><a href=\"/".$url_voci_menu[$i].".html\">".$voci_menu[$i]."</a></li>";			
}		
}
	
}

}
?>
</ul>
</div>
<!--/.nav-collapse -->

</div>
</div>
</div>
