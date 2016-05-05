<div class="span12">
<div class="span4 offset2">
<h4>Modifica Profilo</h4>
<hr>
</div>
</div>


<div class="span8">

<?php
            
if( isset($_GET["idut"]) ){
    
$cod_md5 = $_GET["idut"];
$query =" SELECT * FROM admin WHERE cod_md5='$cod_md5' ";
$result = @mysqli_query($myconn,$query) or die( "Errore....".mysqli_error($myconn) );


while($row = mysqli_fetch_array($result)){
$nome =   $row['nome'];
$cognome = $row['cognome'];
$username = $row['username'];
$password = $row['password'];
$email = $row['email'];
$telefono = $row['telefono'];
$note = $row['note'];   
    
    
}
?>

<form class="form-horizontal mod_profilo" action="utenti/mod_profile.php?idut=<?php echo $cod_md5;?>" method="post">


<?php
$mssgtrue = "<div class=\"controls\"><div class=\"alert alert-info\">
             <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
             <i class=\"fa fa-check\"></i>
             <strong>Complimenti!</strong> La modifica ".utf8_encode("é")." andata a buon fine.
             </div></div>";
             
if( $_GET['profile_use']=="mod_ok" ){
    
echo $mssgtrue;    
    
    } 


?>


<div class="control-group">
<label class="control-label" for="Nome"><b>Nome: </b></label>
<div class="controls">
<input type="text" class="input-block-level" id="Nome" name="nome" value="<?php echo $nome; ?>">
</div>
</div>

<div class="control-group">
<label class="control-label" for="Cognome"><b>Cognome: </b></label>
<div class="controls">
<input type="text" class="input-block-level" id="Cognome" name="cognome" value="<?php echo $cognome; ?>">
</div>
</div>

<div class="control-group">
<label class="control-label" for="Username"><b>Username: <i class="icon-info-sign" title="La Username deve essere alfanumerica massimo 8 caratteri senza spazi" id="iconinfo"></i></b></label>
<div class="controls">
<input type="text" class="input-block-level" id="Username" maxlength="8" name="username" value="<?php echo $username; ?>">
</div>
</div>


<div class="control-group">
<label class="control-label" for="Password"><b>Password: <i class="icon-info-sign" title="La Password deve essere alfanumerica massimo 8 caratteri senza spazi" id="iconinfo"></i></b></label>
<div class="controls">
<p class="text-info" id="view_pass"><em>Password Nascosta..!</em></p>
<input type="text" class="input-block-level" id="Password" maxlength="8" name="password" value="<?php echo $password; ?>">
</div>
</div>


<div class="control-group">
<label class="control-label" for="E-Mail"><b>E-Mail: </b></label>
<div class="controls">
<input type="text" class="input-block-level" id="E-Mail" name="email" value="<?php echo $email; ?>">
</div>
</div>

<div class="control-group">
<label class="control-label" for="Telefono"><b>Telefono: </b></label>
<div class="controls">
<input type="text" class="input-block-level" id="Telefono" maxlength="10" name="telefono" value="<?php echo $telefono; ?>">
</div>
</div>

<div class="control-group">  
<label class="control-label" for="Note"><b>Note: </b></label>
<div class="controls">
<textarea class="input-block-level" name="note">
<?php echo $note; ?>
</textarea>
</div>
</div> 

<div class="control-group">
<div class="controls">
<input type="submit" class="btn btn-primary" value="Salva">        
</div>
</div>

</form> 


<?php



}


?>
</div>



