<br>
<a name="all_comm"></a>
<h5>Commenti&nbsp;(<?php echo $num_tot_comment; ?>) - <a href="#add_comm">Scrivi&nbsp;un&nbsp;Commento&nbsp;<i class="fa fa-comment"></i></a></h5> 
<hr>
<?php 
if( $num_tot_comment==0 ){
echo "<p>Nessun Commento</p>";
}
else{
echo "<ol>";
while( $row_totcomment  = mysqli_fetch_array($rstot_comment) ){		
$nome_utente = $row_totcomment['nome_utente'];
$cont_comment = $row_totcomment['cont_comment'];
$data_ora = $row_totcomment['data_ora'];
?>
<li>
<ul class="unstyled inline">
<li><span class="text-success"><?php echo $nome_utente; ?></span></li><li><span class="muted"><?php echo $data_ora; ?></span></li>
</ul>
<br>
<p><em>
<?php echo $cont_comment; ?>
</em></p>
</li>
<?php	
}	
echo "</ol>";	
}
?>
<a name="add_comm"></a>
<hr>
<form action="/article/commenti/add_comm.php" class="<?php echo $idart; ?>" method="post" id="send_comm">
<fieldset>
<legend>Scrivi un Commento</legend>
<p class="text-info messgg"></p>
<p> <input type="text" placeholder="Tuo Nome" class="input-xxlarge" name="Nome"></p>
<p> <input type="text" placeholder="Tua E-Mail" class="input-xxlarge" name="EMail"></p>
<p> <textarea rows="5" class="input-xxlarge" placeholder="Testo del Commento" name="Testo"></textarea>   </p> 
<p> <input type="submit" class="btn btn-primary" value="Invia Commento"> <input type="reset" class="btn btn-success reset" value="Annulla"></p>
</fieldset>
</form>



