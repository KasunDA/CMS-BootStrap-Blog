<?php
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PSW);
$sql_ult =" SELECT * FROM `articoli` ORDER BY `idart` DESC LIMIT 4 ";
$rs_ult = @mysqli_query($myconn,$sql_ult) or die( "Errore....".mysqli_error($myconn) );
?>

<div class="span3">
<div class="span12">
<ul class="nav nav-list">
<li class="nav-header"><h6>Articoli&nbsp;&&nbsp;Categorie</h6></li>
<li><a href="../administrator/?idut=<?php echo $cod_md5; ?>&new_article"><i class="fa fa-pencil-square"></i> Nuovo Articolo</a></li>
<li><a href="../administrator/?idut=<?php echo $cod_md5; ?>&p_use=all_article"><i class="fa fa-file"></i> Articoli</a></li>
<li><a href="../administrator/?idut=<?php echo $cod_md5?>&comment"><i class="fa fa-commenting-o"></i> Commenti</a></li>
<li><a href="../administrator/?idut=<?php echo $cod_md5; ?>&category=all"><i class="fa fa-folder-open-o"></i> Categorie</a></li>
<li class="nav-header"><h6>Menù&nbsp;&&nbsp;Template</h6></li>
<li><a href="../administrator/?idut=<?php echo $cod_md5; ?>&menu=top-menu"><i class="fa fa-list-ul"></i> Menù</a></li>
<li><a href="../administrator/?idut=<?php echo $cod_md5; ?>&template=all_themes"><i class="fa fa-picture-o"></i> Template</a></li>
<li class="nav-header"><h6>Immagini</h6></li>
<li><a href="../administrator/?idut=<?php echo $cod_md5; ?>&images"><i class="fa fa-file-image-o" aria-hidden="true"></i> Gestione Immagini</a></li>
<li class="nav-header"><h6>Utenti</h6></li>
<li><a href="../administrator/?idut=<?php echo $cod_md5; ?>&users=all_users"><i class="fa fa-users"></i> Gestione Utenti</a></li>
<li><a href="../administrator/?idut=<?php echo $cod_md5; ?>&new_users"><i class="fa fa-user-plus"></i> Nuovo Utente</a></li>
<li class="nav-header"><h6>Impostazioni</h6></li>
<li><a href="../administrator/?idut=<?php echo $cod_md5; ?>&setting=all_config"><i class="fa fa-cogs"></i> Configurazione</a></li>
<li class="nav-header"><h6>Logaut</h6></li>
<li><a href="../logaut.php?idut=<?php echo $cod_md5; ?>"><i class="fa fa-sign-out"></i> Esci</a></li>
</ul>
</div>
</div>

<div class="span9">
<div class="row-fluid">
<div class="span12">
<div class="table-responsive">
<table class="table table-striped">
<tr><td class="nav-header"><h6>Numero&nbsp;Utenti&nbsp;Connessi</h6></td><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr><td>n°&nbsp;Utenti&nbsp;Connessi:&nbsp;<?php echo $row_admin_login;?></td><td>&nbsp;</td><td>&nbsp;</td></tr>
<?php 


?>
<tr>
<td>Utente:&nbsp;<?php echo "<em>".$user."</em>";?></td>
<td>Ultimo Accesso: <?php if ( isset($_COOKIE["ultimoaccesso"]) ) {echo $_COOKIE["ultimoaccesso"];}else{echo "Primo Accesso";} ?></td>
<td>Tipo&nbsp;Utente: <?php echo $tipo_utente; ?></td>
</tr>

</table>
</div>
</div>
</div>




<div class="row-fluid">
<div class="span12">
<div class="table-responsive">
<table class="table table-striped">
<tr><td class="nav-header"><h6>Informazioni di Sistema</h6></td></tr>
<tr><td><i class="fa fa-desktop"></i> S.O.: <?php echo PHP_OS; ?></td></tr>
<tr><td><i class="fa fa-server"></i> PHP Version: <?php echo phpversion();?></td></tr>
<tr><td><i class="fa fa-database"></i> MySQLi Version: <?php echo $mysqli->server_version;?></td></tr>
<tr><td><i class="fa fa-user"></i> Utenti Registrati: <?php echo "<b>".$row_admin."</b>"; ?></td></tr>
<tr><td><i class="fa fa-file"></i> Articoli: <b><?php echo $row_art; ?></b></td></tr>
<tr><td><i class="fa fa-folder-open-o"></i> Categorie Articoli: <b><?php echo $row_cat; ?></b></td></tr>
</table>
</div>
</div>
</div>

<div class="row-fluid">
<div class="span12">
<table class="table table-striped">
<tr><td class="nav-header"><h6>Articoli Recenti</h6></td></tr>
<?php
while($row_ult=mysqli_fetch_array($rs_ult)){
$titart = $row_ult['titart'];
$id_art = $row_ult['idart'];
echo "<tr><td><a href=\"../administrator/?idut=".$cod_md5."&mod_art=".$id_art."\">".$titart."</a></td></tr>";
}	
?>

</table>

</div>
</div>


</div>
