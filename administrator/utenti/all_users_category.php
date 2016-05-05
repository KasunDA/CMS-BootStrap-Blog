
<div class="row-fluid">
<div class="span8">
<div class="table-responsive">
<table class="table table-bordered table-striped table-hover">
<tr class="info">
<td><b>#</b></td>
<td><b>Categoria Utente</b></td>
<td><b>Stato Categoria</b></td>
</tr>
<?php
while( $row = mysqli_fetch_array($rs_num_categ_admin) ){
$id_cat_admin = $row['id_cat_admin'];	
$nome_cat_admin = $row['nome_cat_admin'];
$stato_cat_admin = $row['stato_cat_admin'];
$note_cat_admin = $row['note_cat_admin'];
$type = alias_type_admin($nome_cat_admin);

echo "<tr>";
echo "<td><b>".$id_cat_admin."</b></td>";
echo "<td><a href=\"../administrator/?idut=".$cod_md5."&mod_cat_admin=".$type."\">".$nome_cat_admin."</a></td>";
echo "<td>".$stato_cat_admin."</td>";	
echo "</tr>";
echo "<tr><td colspan=\"3\"><b>Note Categoria:</b></td></tr>";	
echo "<tr><td colspan=\"3\"><em>".$note_cat_admin."</em></td></tr>";
echo "<tr><td colspan=\"3\"></td></tr>";	
}
?>
</table>
</div>
</div>
</div>