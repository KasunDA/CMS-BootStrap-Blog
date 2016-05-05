<?php

if( isset($_GET['mod_menu']) ){
$mod_menu=$_GET['mod_menu'];

$menu =" SELECT * FROM menu WHERE alias_menu='$mod_menu'";
$rsmenu = @mysqli_query($myconn,$menu) or die( "Errore....".mysqli_error($myconn) );
$rowmenu = mysqli_fetch_array($rsmenu);

$idmenu = $rowmenu['id_menu'];
$nome_menu = $rowmenu['nome_menu'];
$voci_menu = unserialize( $rowmenu['voci_menu'] );
$url_voci_menu = unserialize( $rowmenu['url_voci_menu'] );

}

?>


<div class="span6">
<hr>
<form class="form-horizontal mod_menu" action="menu/modifica_menu.php?idut=<?php echo $cod_md5; ?>&mod_menu=<?php echo $mod_menu; ?>" method="post">
<?php
$msgmodmenu = "<div class=\"controls\"><div class=\"alert alert-info\">
             <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
             <i class=\"fa fa-check\"></i>
             <strong>Complimenti!</strong> La modifica é andata a buon fine.
             </div></div>";
			 
$nomemenuexist = "<div class=\"controls\"><div class=\"alert alert-error\">
				 <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
				 <i class=\"fa fa-exclamation-circle\"></i> <b>Ops!</b> Esiste un <b><i>Menù</i></b> con lo stesso nome..!
				 </div></div>";		 
 
$nomevmenuexist = "<div class=\"controls\"><div class=\"alert alert-error\">
				 <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
				 <i class=\"fa fa-exclamation-circle\"></i> <b>Ops!</b> Hai inserito delle <b><i>Voci</i></b> con lo stesso nome..!
				 </div></div>";		 
 $nomeurlmenuexist = "<div class=\"controls\"><div class=\"alert alert-error\">
				 <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
				 <i class=\"fa fa-exclamation-circle\"></i> <b>Ops!</b> Hai inserito degli <b><i>URL</i></b> con lo stesso nome..!
				 </div></div>";		
				 
if( isset($_GET['st_mod_menu']) &&   $_GET['st_mod_menu']=="ok" ){
    
echo $msgmodmenu;    
    
    } 

if( isset($_GET['menu_exist']) && $_GET['menu_exist']=="true"){
echo $nomemenuexist;	
}

if( isset($_GET['vmenu_exist']) && $_GET['vmenu_exist']=="true"){
echo $nomevmenuexist;	
}

if( isset($_GET['urlmenu_exist']) && $_GET['urlmenu_exist']=="true"){
echo $nomeurlmenuexist;	
}
?>
<div class="control-group">
<label class="control-label" for="Nome"><b>Nome Menù: </b></label>
<div class="controls">
<input type="text" id="Nome" name="menu" value="<?php echo $nome_menu;?>">
</div>
</div>


<div class="control-group">
<label class="control-label">
<b>Voci di Menù:</b> 
<i class="fa fa-info-circle" title="Le Voci spuntate sono abilitate, per disabilitare una voce di menù togliere il segno di spunta e la voce verrà automaticamente disabilitata e viceversa." id="iconinfo"></i> 
</label>
<?php
for($i=0; $i<count( $voci_menu ) && $i<count($url_voci_menu) ;$i++ ){
$classe=$url_voci_menu[$i];

$vocimenu = " SELECT nome_voce_menu FROM voci_menu WHERE id_menu='$idmenu' 
              AND nome_voce_menu='$voci_menu[$i]' 
			  AND stato_voce_menu=\"enabled\"
			";
$rsvocimenu = @mysqli_query($myconn,$vocimenu) or die( "Errore....".mysqli_error($myconn) );


echo "<div class=\"controls\">";
echo "<label class=\"checkbox\" for=\"\">";

$vocimenu_id = " SELECT id_voce_menu FROM voci_menu WHERE id_menu='$idmenu' 
                 AND nome_voce_menu='$voci_menu[$i]' 
			   ";
$rsvocimenu_id = @mysqli_query($myconn,$vocimenu_id) or die( "Errore....".mysqli_error($myconn) );
$rowvocimenu_id =  mysqli_fetch_array($rsvocimenu_id);
echo "<img src=\"../images/ajax-loader.gif\" id=\"img-load\" class=\"".$rowvocimenu_id['id_voce_menu']."\">
      <input type=\"checkbox\" name=\"enabled".$i."\" id=\"".$rowvocimenu_id['id_voce_menu']."\" ";
if($rowvocimenu =  mysqli_fetch_array($rsvocimenu)){echo "checked";}
echo ">";
echo "<input type=\"text\" value=\"".$voci_menu[$i]."\" name=\"vocemenu".$i."\" id=\"Voce_".$i."\">";

$sqlhome = "SELECT * FROM voci_menu WHERE id_menu='$idmenu'";
$rssqlhome = @mysqli_query($myconn,$sqlhome) or die( "Errore....".mysqli_error($myconn) );
while( $rowsqlhome = mysqli_fetch_array($rssqlhome) ){
$home = $rowsqlhome['home'];
$vocem = $rowsqlhome['nome_voce_menu'];

if($home=="si" && $vocem==$voci_menu[$i]){
echo "&nbsp;<a class=\"btn btn-success btn-mini\" href=\"menu/changehome.php?idut=".$cod_md5."&idmenu=".$idmenu."&tmenu=".$mod_menu."&vmenu=".$voci_menu[$i]."\" title=\"Home Page\" id=\"linkhome\"><i class=\"fa fa-home\"></i></a>";	
}
if($home=="no" && $vocem==$voci_menu[$i]){
echo "&nbsp;<a class=\"btn btn-mini\" href=\"menu/changehome.php?idut=".$cod_md5."&idmenu=".$idmenu."&tmenu=".$mod_menu."&vmenu=".$voci_menu[$i]."\" title=\"Cambia in Home Page\" id=\"linkhome\"><i class=\"fa fa-home\"></i></a>";		
}
}

echo "</label>";
echo "</div>";	
echo "<div class=\"controls\">";
echo "<label><em>url:</em> ";
echo "<input type=\"text\" value=\"".$url_voci_menu[$i]."\" name=\"urlvoce".$i."\" class=\"".$url_voci_menu[$i]."\" id=\"Url_".$i."\">" ;
echo "&nbsp;<a href=\"#myModal\" data-toggle=\"modal\" class=\"".$url_voci_menu[$i]."\" id=\"activemodal\""; 
echo ">"; 
echo "<i class=\"fa fa-list-alt\" title=\"Modifica Url\" id=\"modurl\"></i>";
echo "</a>";
echo "</label>";
echo "</div>";
?>

<?php
}
?>

<div class="remove">

<div class="controls">
<label class="checkbox" for="">
<input type="checkbox">
<input type="text" placeholder="Nome Voce di menù" name="newvoce" class="newvoce">&nbsp;<a href="" id="removevoce"><i class="fa fa-close" id="annulla" title="Annulla"></i></a>
</label>
</div>

<div class="controls">
<label><em>url:</em>
<input type="text" placeholder="URL Voce di menù" name="newurlvoce" class="newurlvoce">
<a href="#myModal" data-toggle="modal" id="activemodalnewurl" class="newurlvoce">
<i class="fa fa-list-alt" id="addurl" title="Aggiungi Url"></i>
</a>
</label>
</div>

</div>

<div class="controls add_voce">
<a href="#" id="add_voce">Aggiungi una Voce a Questo menù.</a>
</div>

</div>


<div class="control-group">
<div class="controls">
<input type="submit" class="btn btn-primary" value="Salva">        
</div>
</div>
</form>
</div>





<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 id="myModalLabel">Articoli Disponibili</h4>
  </div>
  <div class="modal-body">    
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Chiudi</button>
	<button class="btn btn-primary" data-dismiss="modal" aria-hidden="true" id="changeurl">Cambia Url</button>
  </div>
</div>




