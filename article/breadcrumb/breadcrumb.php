<?php
if( !isset($_GET['cookie-policy']) ){

if(!isset($_GET['p_use'])){
if( !isset($_GET['ref']) ){
?>
<ul class="breadcrumb">
<li>Sei qui: </li>
<li><b><a href="/">Home</a></b> <span class="divider">/</span></li>
</ul>
<?php	
}
else{
?>
<ul class="breadcrumb">
<li>Sei qui: </li>
<li><b><a href="/">Home</a></b> <span class="divider">/</span></li>
<li><b>Page Errore</b></li>
</ul>
<?php		
}	
	
}
else{
$p_use = $_GET['p_use'];
if( !isset($_GET['t_arch']) && $p_use!="archivie"){	

$breadcrumb =" SELECT * FROM articoli WHERE alias = '$p_use'";
$rsbreadcrumb = @mysqli_query($myconn,$breadcrumb) or die( "Errore....".mysqli_error($myconn) );
$rowbreadcrumb = $rsbreadcrumb->num_rows;
if( $rowbreadcrumb!=0 ){	
while($rowbreadcrumb = mysqli_fetch_array($rsbreadcrumb)){
$aliasbreadcrumb = $rowbreadcrumb['alias'];
$titbreadcrumb = ucwords($rowbreadcrumb['titart']);
}
?>
<ul class="breadcrumb">
<li>Sei qui: </li>
<li><a href="/">Home</a> <span class="divider">/</span></li>
<li><b><a href="/<?php echo  $aliasbreadcrumb.".html"; ?>"><?php echo $titbreadcrumb; ?></a></b> <span class="divider">/</span></li>
</ul>
<?php		
}

$breadcrumb =" SELECT * FROM categorie WHERE alias_categoria = '$p_use'";
$rsbreadcrumb = @mysqli_query($myconn,$breadcrumb) or die( "Errore....".mysqli_error($myconn) );
$rowbreadcrumb = $rsbreadcrumb->num_rows;
if( $rowbreadcrumb!=0 ){
while($rowbreadcrumb = mysqli_fetch_array($rsbreadcrumb)){
$titbreadcrumb = $rowbreadcrumb['nome_categoria'];
}
?>
<ul class="breadcrumb">
<li>Sei qui: </li>
<li><a href="/">Home</a> <span class="divider">/</span></li>
<li><b><a href="/<?php echo  $p_use.".html"; ?>"><?php echo ucwords($titbreadcrumb); ?></a></b> <span class="divider">/</span></li>
<?php
if(isset($_GET['alias_art'])){
$alias_art = $_GET['alias_art'];
$sqlalias_art = "SELECT * FROM articoli WHERE alias = '$alias_art'";
$rsalias_art = @mysqli_query($myconn,$sqlalias_art) or die( "Errore....".mysqli_error($myconn) );
$rwalias_art =  mysqli_fetch_array($rsalias_art);
$titalias_art = $rwalias_art['titart'];
?>
<li><a href="/<?php echo  $p_use.".html"; ?>"><?php echo ucwords($titbreadcrumb); ?></a> <span class="divider">/</span></li>
<li><b><a href=""><?php echo ucwords($titalias_art); ?></a></b> <span class="divider">/</span></li>
<?php
}
else{
?>
<li><b><a href="/<?php echo  $p_use.".html"; ?>"><?php echo ucwords($titbreadcrumb); ?></a></b> <span class="divider">/</span></li>
<?php	
}
?>

</ul>
<?php		
}

if($p_use=="all_article"){

?>

<ul class="breadcrumb">
<li>Sei qui: </li>
<li><a href="/">Home</a> <span class="divider">/</span></li>
<li><b><a href="/<?php echo  $p_use.".html";?>"> Tutte le Categoria</a></b> <span class="divider">/</span></li>
<?php
if(isset($_GET['alias_art'])){
$alias_art = $_GET['alias_art'];
$sqlalias_art = "SELECT * FROM articoli WHERE alias = '$alias_art'";
$rsalias_art = @mysqli_query($myconn,$sqlalias_art) or die( "Errore....".mysqli_error($myconn) );
$rwalias_art =  mysqli_fetch_array($rsalias_art);
$titalias_art = $rwalias_art['titart'];
?>
<li><b><a href=""><?php echo ucwords($titalias_art); ?></a></b> <span class="divider">/</span></li>
<?php
}
?>
</ul>

<?php	
	
}


if( $p_use=="search" && isset($_GET['q']) ){
$q = $_GET['q'];
?>
<ul class="breadcrumb">
<li>Sei qui: </li>
<li><a href="/">Home</a> <span class="divider">/</span></li>
<li><a href="" onclick="window.location"> <b>Ricerca:</b> <i>" <?php echo htmlentities($q); ?> " </i></a> <span class="divider">/</span></li>
</ul>


<?php	
	
	
}


}


else{

if( $p_use=="archivie" ){
if( isset($_GET['t_arch']) && !isset($_GET['art_arch']) ){
$t_arch = $_GET['t_arch'];	
$arrayt_arch = explode("-",$t_arch);
$newt_arch = ucwords($arrayt_arch[0])." ".$arrayt_arch[1];
?>
<ul class="breadcrumb">
<li>Sei qui: </li>
<li><a href="/">Home</a> <span class="divider">/</span></li>
<li><b><a href="/archivie/<?php echo $t_arch.".htm"; ?>"><?php echo $newt_arch; ?></a></b> <span class="divider">/</span></li>
</ul>
<?php	

	
}
if( isset($_GET['t_arch']) && isset($_GET['art_arch']) ){
$t_arch = $_GET['t_arch'];	
$arrayt_arch = explode("-",$t_arch);
$newt_arch = ucwords($arrayt_arch[0])." ".$arrayt_arch[1];
$art_arch = $_GET['art_arch'];

$breadcrumb =" SELECT * FROM articoli WHERE alias = '$art_arch'";
$rsbreadcrumb = @mysqli_query($myconn,$breadcrumb) or die( "Errore....".mysqli_error($myconn) );
$rowbreadcrumb = $rsbreadcrumb->num_rows;

if( $rowbreadcrumb!=0 ){	
while($rowbreadcrumb = mysqli_fetch_array($rsbreadcrumb)){
$aliasbreadcrumb = $rowbreadcrumb['alias'];
$titbreadcrumb = ucwords($rowbreadcrumb['titart']);
}

?>

<ul class="breadcrumb">
<li>Sei qui: </li>
<li><a href="/">Home</a> <span class="divider">/</span></li>
<li><a href="/archivie/<?php echo $t_arch.".htm"; ?>"><?php echo $newt_arch; ?></a> <span class="divider">/</span></li>
<li><b><a href="/archivie/<?php echo $t_arch; ?>/<?php echo $aliasbreadcrumb.".htm"; ?>"><?php echo $titbreadcrumb; ?> </a></b></li>
</ul>

<?php

}






}	
}


	
}
?>
<?php	
}

}
else{
	
?>
<ul class="breadcrumb">
<li>Sei qui: </li>
<li><b><a href="/">Home</a></b> <span class="divider">/</span></li>
<li><b><a href="/?cookie-policy">Cookie Policy</a></b></li>
</ul>
<?php	
	
	
}




?>

