<div class="row-fluid">
<div class="span9">
<?php
$mssgdel = "<div class=\"alert alert-info\">
             <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
             <i class=\"fa fa-check\"></i>
             <strong>Utente eliminato</strong> con successo.</div>";

if(isset($_GET['del']) && $_GET['del']=="ok"){echo $mssgdel;}
?>


<div class="table-responsive">
<table class="table table-bordered table-striped table-hover">
<tr class="info">
<td><b>#</b></td>
<td><b>Utente</b></td>
<td><b>Nome</b></td>
<td><b>Cognome</b></td>
<td><b>Tipo Utente</b></td>
<td><b>E-Mail</b></td>
<td></td>
</tr>

<?php

while($row = mysqli_fetch_array($rs_num_admin) ){
$id_utente = $row['id_admin'];
$cod_md5_user = $row['cod_md5'];
$nomeuser = $row['nome'];
$cognuser = $row['cognome'];
$username = $row['username'];
$tipo_utente = $row['tipo_utente'];
$type = alias_type_admin($row['tipo_utente']);
$email_utente = $row['email'];
$noteuser = $row['note'];

echo "<tr>";
echo "<td>".$id_utente."</td>";
echo "<td><a href=\"../administrator/?idut=".$cod_md5."&mod_user=".$cod_md5_user."\">".$username."</a></td>";
echo "<td>".$nomeuser."</td>";
echo "<td>".$cognuser."</td>";
echo "<td>".$tipo_utente."</td>";
echo "<td><a href=\"../administrator/?idut=".$cod_md5."&send_email=".$email_utente."\" class=\"sendemail\" data-toggle=\"tooltip\" title=\"Invia un'email a ".$username."\">".$email_utente."</a></td>";
if( $tipo_utente!="Amministratore" ){
echo "<td><a class=\"btn btn btn-danger btn-mini delete_user\" href=\"#\" id=\"".$id_utente."\" title=\"Elimina\"><i class=\"fa fa-trash\"></i></a></td>";
}
echo "</tr>";
echo "<tr><td colspan=\"7\"><b>Note Utente:</b></td></tr>";	
echo "<tr><td colspan=\"7\"><em>".$noteuser."</em></td></tr>";	
echo "<tr><td colspan=\"7\"></td></tr>";
}


?>



</table>
</div>


</div>
<div class="span2"> 
<div class="table-responsive optuser">
<table class="table table-bordered table-striped table-hover">
<tr class="info"><td><b>Opzioni Utenti</b></td></tr>
<tr><td><a href="../administrator/?idut=<?php echo $cod_md5; ?>&new_users"><i class="fa fa-user"></i> Nuovo Utente</a></td></tr>
<tr><td><a href="../administrator/?idut=<?php echo $cod_md5;?>&send_email"><i class="fa fa-envelope-o"></i> <i class="fa fa-share"></i> Invia E-Mail Utenti</a></td></tr>
</table>
</div>
 
</div>
</div>



