<?php

if( isset($_GET['menu']) ){
$menu=$_GET['menu'];

$sqlmenu =" SELECT * FROM menu WHERE alias_menu='$menu'";
$rssqlmenu = @mysqli_query($myconn,$sqlmenu) or die( "Errore....".mysqli_error($myconn) );
$rowsqlmenu = mysqli_fetch_array($rssqlmenu);
$idmenu = $rowsqlmenu['id_menu'];
$nome_menu = $rowsqlmenu['nome_menu'];

$voci_menu = unserialize($rowsqlmenu['voci_menu']);
$url_voci_menu = unserialize( $rowsqlmenu['url_voci_menu'] );

}


?>

<div class="row-fluid">
<div class="span12">
<div class="span9">
<?php
$msgmodmenu = "<div class=\"controls\"><div class=\"alert alert-success\">
             <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
             <i class=\"fa fa-check\"></i>
             <strong>Complimenti!</strong> La modifica é andata a buon fine.
             </div></div>";
			 
$error = "<div class=\"controls\"><div class=\"alert alert-error\">
				 <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
				 <i class=\"fa fa-exclamation-circle\"></i> <b>Ops!</b> Non puoi disabilitare la <b>Home Page</b>..!
				 </div></div>";	

$nomevmenuexist = "<div class=\"controls\"><div class=\"alert alert-error\">
				 <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
				 <i class=\"fa fa-exclamation-circle\"></i> <b>Ops!</b> Hai inserito delle <b><i>Voci</i></b> con lo stesso nome..!
				 </div></div>";		
				 
$addnewvmenu = "<div class=\"controls\"><div class=\"alert alert-success\">
             <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
             <i class=\"fa fa-check\"></i>
             Hai aggiunto una nuova <strong>Voce di menù</strong>.
             </div></div>";				 

				 
if( isset($_GET['error']) && $_GET['error']=="_h" ){echo $error;}
if( isset($_GET['st_mod_menu']) &&   $_GET['st_mod_menu']=="ok" ){echo $msgmodmenu;} 
if( isset($_GET['vmenu_exist']) && $_GET['vmenu_exist']=="true"){echo $nomevmenuexist;}
if( isset($_GET['insert_v_menu']) && $_GET['insert_v_menu']=="ok"){echo $addnewvmenu;}
?>
<div class="row-fluid">
<div class="span12">


<div class="table-responsive">
<table class="table table-bordered table-striped table-hover">
<tr class="info">
<td><b>#</b></td>
<td><b>Menù</b></td>
<td><b>Voci di Menù</b></td>
</tr>
<?php
while( $row_m = mysqli_fetch_array($rs_menu) ){
$id_menu = $row_m['id_menu'];
$nome_menu = $row_m['nome_menu'];
$alias_menu = $row_m['alias_menu'];
$voci_menu = unserialize($row_m['voci_menu']);
$urlvoci_menu = unserialize($row_m['url_voci_menu']);
$count_voci_menu = count($voci_menu);	

echo "<tr>";
echo "<td>".$id_menu."</td>";
echo "<td><p class=\"lead\">".$nome_menu."</p></td>";	
echo "<td>";
for($i=0;$i<$count_voci_menu;$i++){

echo  "<form action=\"menu/modifica_menu.php?idut=".$cod_md5."&indvmenu=".$i."\" class=\"form-inline modificevoce\" method=\"post\" id=\"mod_menu_".$i."\">      
       <span><input type=\"text\" name=\"vocemenu\" value=\"".$voci_menu[$i]."\" id=\"voce\"> 
       <label><b><em>url voce >></em></b>
	   <input type=\"text\" name=\"urlvoce\" value=\"".$urlvoci_menu[$i]."\" id=\"url\"> 
	   </label></span>
	   <div class=\"btn-group\" id=\"mod_menu_".$i."\">
	   <a href=\"#myModal\" data-toggle=\"modal\" class=\"btn btn-inverse  btn-small cambiaurl\" id=\"".$i."\">
	   <i class=\"fa fa-list-alt\"></i> URL</a>
	   <a href=\"menu/loadurl.php?i=".$i."\" class=\"btn btn-info btn-small reset\" id=\"reset_".$i."\">Annulla</a>
	   <button type=\"submit\" class=\"btn btn-primary btn-small\">Salva</button> 
	   </div>	   
	   </form>";

$vocimenu = " SELECT nome_voce_menu FROM voci_menu WHERE id_menu='$idmenu' 
              AND nome_voce_menu='".addslashes($voci_menu[$i])."' 
			  AND stato_voce_menu=\"enabled\"
			";
$rsvocimenu = @mysqli_query($myconn,$vocimenu) or die( "Errore....".mysqli_error($myconn) );  


if($rowvocimenu =  mysqli_fetch_array($rsvocimenu)){
echo " <a href=\"menu/changecheck.php?idut=".$cod_md5."&tmenu=".$menu."&vmenu=".$voci_menu[$i]."\" class=\"btn btn-success  btn-mini optionvmenu\" title=\"disabilita voce menù\"><i class=\"fa fa-eye\"></i></a> ";	
}
else{
echo " <a href=\"menu/changecheck.php?idut=".$cod_md5."&tmenu=".$menu."&vmenu=".$voci_menu[$i]."\" class=\"btn btn-danger btn-mini optionvmenu\" title=\"abilita voce menù\"><i class=\"fa fa-eye-slash\"></i></a> ";		
}	   

$sqlhome = "SELECT * FROM voci_menu WHERE id_menu='$idmenu'";
$rssqlhome = @mysqli_query($myconn,$sqlhome) or die( "Errore....".mysqli_error($myconn) );

while( $rowsqlhome = mysqli_fetch_array($rssqlhome) ){
$home = $rowsqlhome['home'];
$vocem = $rowsqlhome['nome_voce_menu'];

if($home=="si" && $vocem==$voci_menu[$i]){
echo " <a href=\"menu/changehome.php?idut=".$cod_md5."&idmenu=".$idmenu."&tmenu=".$menu."&vmenu=".$voci_menu[$i]."\" class=\"btn btn-success btn-mini optionvmenu\" title=\"Home Page\"><i class=\"fa fa-home\"></i></a>";	
}
if($home=="no" && $vocem==$voci_menu[$i]){
echo " <a href=\"menu/changehome.php?idut=".$cod_md5."&idmenu=".$idmenu."&tmenu=".$menu."&vmenu=".$voci_menu[$i]."\" class=\"btn btn-danger btn-mini optionvmenu\" title=\"Cambia in Home Page\"><i class=\"fa fa-home\"></i></a>";		

}
}

echo " <a href=\"\" class=\"btn btn-danger btn-mini delete_v_menu\" id=\"".$voci_menu[$i]."\" title=\"Elimina\"><i class=\"fa fa-times\"></i></a><hr>";

}

echo "</td>";
echo "</tr>";	
}
?>
</table>
</div>
</div>
</div>
</div>

<div class="span3">
<?php

$vmenuexist = "<div class=\"controls\"><div class=\"alert alert-error\">
				 <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
				 <i class=\"fa fa-exclamation-circle\"></i> <b>Ops!</b> Esiste una <b><i>Voce</i></b> con lo stesso nome..!
				 </div></div>";	

if( isset($_GET['v_menu']) && $_GET['v_menu']=="exist"){echo $vmenuexist;}
?>
<div class="table-responsive addvoce">
<table class="table table-bordered table-striped table-hover">
<tr class="info">
<td><b>Aggiungi voce di menù</b></td>
</tr>

<tr><td>
<form method="post" id="aggiungivoce" class="modificevoce" action="menu/nuovavoce.php?idut=<?php echo $cod_md5;?>&menu=<?php echo $menu;?>">
<span>
<p><input type="text" placeholder="Nome Voce" name="newvoce" value="" id="voce"></p>
<p><input type="text" placeholder="Nome URL" id="url" name="newurlvoce" value=""></p>
</span>
<p><a href="#addVoice" data-toggle="modal" class="btn btn-inverse btn-mini">Scegli URl da elenco</a></p>
<p><a href="" class="btn btn-info btn-small resetadd">Annulla</a>
<button type="submit" class="btn btn-primary btn-small">Salva</button></p>
</form>
</td></tr>
</table>
</div>

</div>
</div>
</div>





<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Scegli tra gli articoli</h3>
  </div>
  <div class="modal-body">
 	
  </div>
  <div class="modal-footer">
    <button class="btn btn-info" data-dismiss="modal" aria-hidden="true">Annulla</button>
    <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true" id="changeurl">Cambia e Chiudi</button>
  </div>
</div>



<div id="addVoice" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Scegli tra gli articoli</h3>
  </div>
  <div class="modal-body">
    <p><label class="radio"><input type="radio" name="optionsRadios" value="all_article"> ARTICOLI DI TUTTE LE CATEGORIE</label></p>
	<hr>
	<p><b><em>ARTICOLI DI UNA SINGOLA CATEGORIA</b></em></p>
	<p>		
	<?php
	$sqlcat =" SELECT * FROM categorie ";
    $rssqlcat = @mysqli_query($myconn,$sqlcat) or die( "Errore....".mysqli_error($myconn) );	
	$rowsqlcat = $rssqlcat->num_rows;
	if( $rowsqlcat!=0 ){
	while( $rowsqlcat = mysqli_fetch_array($rssqlcat) ){
	$nomecategoria = $rowsqlcat['nome_categoria'];	
	$aliascategoria = $rowsqlcat['alias_categoria'];
    $mincat = strtolower($aliascategoria);	
	echo "<label class=\"radio\"><input type=\"radio\" name=\"optionsRadios\"  value=\"".$mincat."\">".$nomecategoria."</label>";		
	}	
	}
	else{
	echo "<p>Nessuna Categoria</p>";	
	}
		
	?>		
	</p>
	<hr>
	<p><b><em>SINGOLO ARTICOLO</b></em></p>
	<?php	
	if($row_art!=0){
	while( $rowarticoli = mysqli_fetch_array($rs_num_art) ){
	$titarticolo = $rowarticoli['titart'];	
	$aliasarticolo = $rowarticoli['alias'];
	echo "<p><label class=\"radio\"><input type=\"radio\" name=\"optionsRadios\" value=\"".$aliasarticolo."\"> ".$titarticolo."</label></p>";	
	}	
	}
	else{
	echo "<p>Nessun Articolo</p>";		
	}	
	?>		
  </div>
  <div class="modal-footer">
    <button class="btn btn-info" data-dismiss="modal" aria-hidden="true">Annulla</button>
    <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true" id="newurl">Cambia e Chiudi</button>
  </div>
</div>
