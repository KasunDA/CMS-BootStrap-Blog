<?php
$new_users = $_GET['new_users'];
$msgexistusers = "<div class=\"alert\">
             <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
             <i class=\"fa fa-exclamation-circle\"></i><b> Operazione non riuscita!</b>. Esiste un Utente con la stessa <b>UserName</b>.</div>";

$msgexistemail = "<div class=\"alert\">
             <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
             <i class=\"fa fa-exclamation-circle\"></i><b> Operazione non riuscita!</b>. Esiste un Utente con la stessa <b>E-Mail</b> .</div>";

?>



<div class="span8">
<?php
if( $_GET['new_users']=="exist_user" ){
	echo $msgexistusers;
}
if( $_GET['new_users']=="exist_email" ){
	echo $msgexistemail;
}

?>
<hr>
<form class="form-horizontal mod_profilo" action="utenti/insert_new_user.php?idut=<?php echo $cod_md5;?>" method="post">

<div class="control-group">
<label class="control-label" for="Nome"><b>Nome: </b></label>
<div class="controls">
<input type="text" class="input-block-level" id="Nome" name="nome_user" value="">
</div>
</div>

<div class="control-group">
<label class="control-label" for="Cognome"><b>Cognome: </b></label>
<div class="controls">
<input type="text" class="input-block-level" id="Cognome" name="cognome_user" value="">
</div>
</div>

<div class="control-group">
<label class="control-label" for="Username"><b>Username: <i class="fa fa-info-circle" title="La Username deve essere alfanumerica massimo 8 caratteri senza spazi" id="iconinfo"></i></b></label>
<div class="controls">
<input type="text" class="input-block-level" id="Username" name="username_user"  maxlength="8" value="">
</div>
</div>

<div class="control-group">
<label class="control-label" for="PassWord"><b>Password: <i class="fa fa-info-circle" title="La Password deve essere alfanumerica massimo 8 caratteri senza spazi" id="iconinfo"></i></b></label>
<div class="controls">
<input type="text" class="input-block-level" id="PassWord" maxlength="8" name="password_user" value="">
</div>
</div>

<div class="control-group">
<label class="control-label" for="Categoria_Utente"><b>Tipo Utente: </b></label>
<div class="controls">
<span class="input-block-level uneditable-input">
Utente Registrato
</span>
</div>
</div>

<div class="control-group">
<label class="control-label" for="E-Mail"><b>E-Mail: </b></label>
<div class="controls">
<input type="text" class="input-block-level" id="E-Mail" name="email_user" value="">
</div>
</div>

<div class="control-group">
<label class="control-label" for="Telefono"><b>Telefono: </b></label>
<div class="controls">
<input type="text" class="input-block-level" maxlength="10" id="Telefono" name="tel_user" value="">
</div>
</div>

<div class="control-group">  
<label class="control-label" for="Note_User"><b>Note: </b></label>
<div class="controls">
<textarea class="input-block-level" name="note_user">

</textarea>

</div>
</div> 

<div class="control-group">
<div class="controls">
<input type="submit" class="btn btn-primary" value="Salva">        
</div>
</div>

</form>



</div>