
<div class="span8">
<hr>
	<?php
if($_GET['send_email']=="_ok"){

$msginviato = "<div class=\"alert alert-success\">
             <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
             <i class=\"fa fa-check\"></i>&nbsp;Messaggio&nbsp;Inviato Correttamente.</div>";	

echo $msginviato;
}

?>
    <form class="form-horizontal send_email" action="utenti/send.php?ut=<?php echo $user; ?>&idut=<?php echo $cod_md5; ?>" method="post">

      <div class="control-group">
	 <label class="control-label" for="">Destinatari:</label>
	 <div class="controls">	 
	  <?php
		$sqlemailadmin = "SELECT email FROM admin";
		$rsemailadmin = @mysqli_query($myconn,$sqlemailadmin) or die( "Errore....".mysqli_error($myconn) );	
		while( $rowemailadmin = mysqli_fetch_array($rsemailadmin) ){
		$emailadmin = $rowemailadmin['email'];	
		echo "<label class=\"checkbox inline\">";
		if($_GET['send_email']==$emailadmin){
		echo "<input type=\"checkbox\" name=\"ck[]\" checked value=\"".$emailadmin."\">".$emailadmin;	
		}
		else{
		echo "<input type=\"checkbox\" name=\"ck[]\"  value=\"".$emailadmin."\">".$emailadmin;	
		}
		
		echo "</label>";
		}	
		?>		
	</div>
	</div>
	 
	  
	  <div class="control-group">
        <label class="control-label" for="">Oggetto:</label>
        <div class="controls">
          <input type="text" id="" placeholder="Oggetto del Messaggio" class="span8" name="object">
		 
        </div>
      </div>
	  
      <div class="control-group">
        <label class="control-label" for="inputPassword">Messaggio:</label>
        <div class="controls">
          <textarea rows="8"  placeholder="Testo del Messaggio" class="span8" name="msg"></textarea>
        </div>
      </div>
      <div class="control-group">
        <div class="controls">
        <input type="submit" class="btn btn-primary btn-small" value="Invia">
		<input type="reset" class="btn btn-info btn-small" value="Annulla">
        </div>
      </div>
    </form>

</div>

