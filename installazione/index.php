<!DOCTYPE html>
<html lang="en">
<head>
<title>Installazione CMS Bootstrap Blog</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/bootstrap.css" rel="stylesheet">   
<link href="css/bootstrap-responsive.css" rel="stylesheet">	 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"> 
 <style type="text/css">
      body {
		 background-color: #f5f5f5;  
        padding-top: 20px;
        padding-bottom: 40px;
      }
	
</style>	  
	  
</head>
<body>

<div class="container">
<div class="row">
<div class="span10 offset1">
<div class="page-header">
<h1>Installazione <small>CMS Bootstrap Blog</small></h1>
</div>
</div>
</div>

<div class="row">
<div class="span10 offset1">
<span id="msg"></span>
<form class="form-horizontal" action="step_1.php" method="post" id="install">

<fieldset>
<legend>Dati Hosting</legend>
<p class="muted"><i class="fa fa-info-circle"></i> <b><em>Nome Host</em></b>, <b><em>Nome Database</em></b>, <b><em>Nome Utente</em></b>, <b><em>Password Utente</em></b> sono forniti dal Server al momento della registazione di un dominio.</p>
<p class="text-info">* Campo Obbligatorio</p>
<hr>

<?php
$alert_input = NULL;$arror = NULL;
if( isset($_GET['name_user'])  ){
$alert_input= "<div class=\"alert alert-error\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button><strong>Nome</strong> non valido!</div>";
}
if( isset($_GET['cname_user'])  ){
$alert_input= "<div class=\"alert alert-error\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button><strong>Cognome</strong> non valido!</div>";
}
if( isset($_GET['email_user'])  ){
$alert_input= "<div class=\"alert alert-error\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button><strong>E-Mail</strong> non valida!</div>";
}
if( isset($_GET['user'])  ){
$alert_input= "<div class=\"alert alert-error\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button><strong>Username Amministratore</strong> non valida!</div>";
}
if( isset($_GET['pass_user'])  ){
$alert_input= "<div class=\"alert alert-error\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button><strong>Password Amministratore</strong> non valida!</div>";
}

echo $alert_input;

?>

<div class="control-group">
<label class="control-label" for="host">Nome Host *</label>
<div class="controls">
<input type="text" id="host" placeholder="es. localhost" name="hostname">
</div>
</div>

<div class="control-group">
<label class="control-label" for="database">Nome Database *</label>
<div class="controls">
<input type="text" id="database" placeholder="" name="dtname">
</div>
</div>



<div class="control-group">
<label class="control-label" for="utente">Nome Utente *</label>
<div class="controls">
<input type="text" id="utente" placeholder="" name="nut">
</div>
</div>

<div class="control-group">
<label class="control-label" for="password">Password Utente</label>
<div class="controls">
<input type="text" id="password" placeholder="Facoltativa" name="passut">
</div>
</div>

</fieldset>
<hr>
<legend>Dati Utente ( Amministratore )</legend>

<div class="control-group <?php if(isset($_GET['name_user'])) {$arror = "error"; echo $arror; }?>">
<label class="control-label" for="name_user">Nome *
<i class="fa fa-info-circle" title="Non usare caratteri speciali tipo &,%,$,£, ect.., usa solo lettere." id="iconinfo"></i>
</label>
<div class="controls">
<input type="text" id="name_user" placeholder="Tuo Nome" name="nuser">
</div>
</div>


<div class="control-group <?php if(isset($_GET['cname_user'])) {$arror = "error"; echo $arror; }?>">
<label class="control-label" for="cname_user">Cognome *
<i class="fa fa-info-circle" title="Non usare caratteri speciali tipo &,%,$,£, ect.., usa solo lettere." id="iconinfo"></i>
</label>
<div class="controls">
<input type="text" id="cname_user" placeholder="Tuo Cognome" name="cnuser">
</div>
</div>

<div class="control-group <?php if(isset($_GET['email_user'])) {$arror = "error"; echo $arror; }?>">
<label class="control-label" for="email_user">E-Mail *
<i class="fa fa-info-circle" title="Formato e-mail valida" id="iconinfo"></i>
</label>
<div class="controls">
<input type="text" id="email_user" placeholder="Tua E-Mail" name="emailuser">
</div>
</div>


<div class="control-group <?php if(isset($_GET['user'])) {$arror = "error"; echo $arror; }?>">
<label class="control-label" for="user">Username *
<i class="fa fa-info-circle" title="La Username deve essere alfanumerica massimo 8 caratteri senza spazi" id="iconinfo"></i>
</label>
<div class="controls">
<input type="text" id="user" maxlength="8" placeholder="massimo 8 caratteri senza spazi e alfanumerica" maxlength="8" name="user">
</div>
</div>

<div class="control-group <?php if(isset($_GET['pass_user'])) {$arror = "error"; echo $arror; }?>">
<label class="control-label" for="pass_user">Password *
<i class="fa fa-info-circle" title="La Password deve essere alfanumerica massimo 8 caratteri senza spazi" id="iconinfo"></i>
</label>
<div class="controls">
<input type="text" id="pass_user" placeholder="massimo 8 caratteri senza spazi e alfanumerica" maxlength="8" name="passuser">
</div>
</div>

<hr>
<div class="span10 offset1">

<input type="submit" class="btn btn-large btn-primary" value="Continua >>" id="gosteps">

</div>



</form>
	
</div>
</div>


</div>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script>
$(document).ready(function(){
$('i#iconinfo').tooltip({placement:'top',trigger:'hover'});	

$('form#install').submit(function(){
var errore =0;
var dati =[]; 	

$('form#install input:text').each(function(){

dati.push($(this).val());
var idinput = $(this).attr('id');
if($(this).val().length==0 && idinput!="password"){
$(this).closest('.control-group').addClass('error'); 
$(this).focus(); 
errore = 1; 
return false;
}
if( $(this).val().length!=0 ){
var val = $(this).val();
var iddi = $(this).attr('id');
var regexpnec = /^[a-z]+[\ \'a-z]*$/;	
var regexpuser = /^[a-z0-9]{8}$/;
var regexppass = /^[a-zA-Z0-9]{8}$/;
var regexpmail = /^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

if( 
   val.length!=0 && !val.match(regexpnec) && iddi=="name_user" ||  
   val.length!=0 && !val.match(regexpnec) && iddi=="cname_user" ||  
   val.length!=0 && !val.match(regexpuser) && iddi=="user" || 
   val.length!=0 && !val.match(regexppass) && iddi=="pass_user" || 
   val.length!=0 && !val.match(regexpmail) && iddi=="email_user" 
   ){
$(this).closest('.control-group').addClass('error'); 
$(this).focus(); 
errore = 1; 
return false;
}
else{
$(this).closest('.control-group').removeClass('error');	
}
}

 	
});

if(errore == 1){return false}
func_install(dati[0],dati[1],dati[2],dati[3],dati[4],dati[5],dati[6],dati[7],dati[8]);
return false;
	
});


function func_install(host,dt,nameut,pasut,nome,cnome,email,us,pass){

$.ajax({
	
url:'step_1.php', 	
type:'POST', 
dataType:'html',
data: {hostname:host , dtname:dt , nut:nameut , passut:pasut , nuser:nome , cnuser:cnome , emailuser:email , user:us , passuser:pass},	
beforeSend: function(){
$('form#install').hide();	
var htmlinfo = "<p class=\"text-info\"><em>Attendere..... <i class=\"fa fa-spinner fa-pulse\"></i></em></p>";
$('span#msg').html(htmlinfo);
},
success: function(dati){ 
setTimeout(function(){
$('span#msg').html(dati);
},4000); 
}

	
});
	
};

$('body').on('click','a#gostep_2', function(e){
e.preventDefault();
var urlstep = $(this).attr('href');

$.ajax({
url:urlstep, 	
type:'POST', 
dataType:'html',	
beforeSend: function(){
$('span#msg').html('<strong><p class=\"text-info\">Attendere aggiornamento database in corso..... <i class=\"fa fa-refresh fa-spin fa-fw margin-bottom\"></i></p></strong>');	
},
success: function(dati){

setTimeout(function(){	
$('span#msg').html(dati);
},2000); 

}
	
});



});

$('body').on('click','a#del_installation', function(e){
e.preventDefault();
var urldelinst = $(this).attr('href');

$.ajax({
url:urldelinst , 	
dataType:'html',	
beforeSend: function(){
$('span#msg').html('<strong><p class=\"text-info\">Attendere..... <i class=\"fa fa-refresh fa-spin fa-fw margin-bottom\"></i></p></strong>');	

},
success: function(dati){ 
setTimeout(function(){
$('span#msg').html(dati);
},2000); 
}	
	
});



});


});
</script>
</body>
</html>
