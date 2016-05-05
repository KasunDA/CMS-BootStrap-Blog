<div class="span8">
<hr>
<?php            
if( isset($_GET["mod_user"]) ){    
$mod_user = $_GET["mod_user"];

$query =" SELECT * FROM admin WHERE cod_md5='$mod_user' ";
$result = @mysqli_query($myconn,$query) or die( "Errore....".mysqli_error($myconn) );

while($row = mysqli_fetch_array($result)){
$nome =   $row['nome'];
$cognome = $row['cognome'];
$username = $row['username'];
$password = $row['password'];
$email = $row['email'];
$telefono = $row['telefono'];
$tipo_utente = $row['tipo_utente'];
$note = $row['note'];      
}

?>
<form class="form-horizontal mod_profilo" action="utenti/mod_profile_user.php?idut=<?php echo $cod_md5;?>&idut_user=<?php echo $mod_user; ?>" method="post">
<?php
$mssgtrue = "<div class=\"controls\"><div class=\"alert alert-info\">
             <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
             <i class=\"fa fa-check\"></i>
             <strong>Complimenti!</strong> La modifica é andata a buon fine.
             </div></div>";
             
if( isset($_GET['st_mod_user']) &&   $_GET['st_mod_user']=="ok" ){
    
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
<label class="control-label" for="Username"><b>Username: <i class="fa fa-info-circle" title="La Username deve essere alfanumerica massimo 8 caratteri senza spazi" id="iconinfo"></i></b></label>
<div class="controls">
<input type="text" class="input-block-level" id="Username" maxlength="8" name="username" value="<?php echo $username; ?>">
</div>
</div>


<div class="control-group">
<label class="control-label" for="Password"><b>Password: <i class="fa fa-info-circle" title="La Password deve essere alfanumerica massimo 8 caratteri senza spazi" id="iconinfo"></i></b></label>
<div class="controls">
<p class="text-info" id="view_pass"><em>Password Nascosta..!</em></p>
<input type="text" class="input-block-level" id="Password" maxlength="8" name="password" value="<?php echo $password; ?>">
</div>
</div>

<div class="control-group">
<label class="control-label" for="tipo_utente"><b>Tipo Utente: </b></label>
<div class="controls">
<span class="input-block-level uneditable-input" id="">
<?php echo $tipo_utente; ?>
</span>

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
<textarea class="input-block-level" name="note_user">
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