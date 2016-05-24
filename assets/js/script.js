$(document).ready(function(){

$('#myTab a').click(function (e) {
e.preventDefault();
$(this).tab('show');
})
$('a#rec_login').click(function(){
$('div#reclogin div.modal-body').load('form_rec.php');
});

$('body').on('keyup','form#rec_login input:text',function(){
var value = $(this).val();
var regexp = /^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
var classdivv = $('form#rec_login div#cont_input').attr('class');
var arrclassdivv = classdivv.split(' ');
if(value.match(regexp)){
if(arrclassdivv[1]=="warning"){
$('form#rec_login div#cont_input').removeClass('warning');
$('form#rec_login div#cont_input').addClass('success');
}
if(arrclassdivv[1]=="error"){
$('form#rec_login div#cont_input').removeClass('error');
$('form#rec_login div#cont_input').addClass('success');
}
else{
$('form#rec_login div#cont_input').addClass('success');
}
}
});

$('body').on('submit','form#rec_login', function(){
var errore =0;
var dati =[]; 
$('form#rec_login input:text ').each(function(){
var valore = $(this).val();
dati.push(valore);
if(valore.length==0){
var classdiv = $('form#rec_login div#cont_input').attr('class');
var arrclasse = classdiv.split(' ');
if( arrclasse[1] ){ 
if(arrclasse[1]=="warning"){
$('form#rec_login div#cont_input').removeClass('warning');
$('form#rec_login div#cont_input').addClass('error');
}
if(arrclasse[1]=="success"){
$('form#rec_login div#cont_input').removeClass('success');
$('form#rec_login div#cont_input').addClass('error');
}
}
else{
$('form#rec_login div#cont_input').addClass('error'); 
}
$(this).focus();
errore = 1; 
return false;
}
else{
var regexp = /^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

if(!valore.match(regexp)){

var classdiv = $('form#rec_login div#cont_input').attr('class');
var arrclasse = classdiv.split(' ');
if( arrclasse[1] ){ 
if(arrclasse[1]=="error"){
$('form#rec_login div#cont_input').removeClass('error');
$('form#rec_login div#cont_input').addClass('warning');
}
if(arrclasse[1]=="success"){
$('form#rec_login div#cont_input').removeClass('success');
$('form#rec_login div#cont_input').addClass('warning');
}
}
else{
$('form#rec_login div#cont_input').addClass('warning');
}
$('form#rec_login input:text').focus();
errore = 1; 
return false;
}
}

});
if(errore == 1){return false}
inviodati(dati[0]);
return false;
});

function inviodati(email){

$.ajax({

url:'rec_login.php?email='+email,
type: 'GET',
dataType:'html',
beforeSend: function(){
var htmlinfo = "<p class=\"text-info\"><em>Invio in corso..... <i class=\"fa fa-spinner fa-pulse\"></i></em></p>";
$('div.msgg').html(htmlinfo);
},
success: function(htmlsucc){

setTimeout(function(){
$('div.msgg').html(htmlsucc);
},2000);      
}



});


};



$('#Data').datepicker({language: 'it-CH'});
$('span#Alias').tooltip({placement:'right'});	
$('i#iconinfo , a.optionvmenu , a.delete_v_menu').tooltip({placement:'top',trigger:'hover'});
$('i#modurl').tooltip({placement:'right'});
$('a.sendemail').tooltip({placement:'bottom',trigger:'hover'});
$('i#annulla , i#addurl').tooltip({placement:'right'});
$('a#linkhome , a.delete_user').tooltip({placement:'right',trigger:'hover'});

$('em.showpw').click(function(){
$(this).hide();
$('em.hidepw').fadeIn();

})

function primaMaiusc(stringa){
var prima = stringa.slice(0,1);
var restostr = stringa.slice(1);
var primaMaiusc = prima.toUpperCase();
var testoCompl = primaMaiusc+restostr;	
return 	testoCompl;	
};

var valurl = null;
var valid = null;
var artvisibile = false;
 

/* Submit form.mod_profilo */
$('form.mod_profilo').submit(function(){
var errore = 0;

$('form.mod_profilo input').each(function(){
var val = $(this).val();
var id = $(this).attr('id');

if(id=="Nome"){
var regexp = /^[a-z]+[\ a-z]*$/;		
}
if(id=="Cognome"){
var regexp = /^[a-z]+[\ a-z]*$/;		
}
if(id=="Username"){
var regexp = /^[a-z0-9]+$/;		
}
if(id=="Password"){
var regexp = /^[a-zA-Z0-9]{8}$/;	
}
if(id=="PassWord"){
var regexp = /^[a-zA-Z0-9]{8}$/;	
}

if(id=="E-Mail"){
var regexp = /^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;	
}
if(id=="Telefono"){
var regexp = /[0-9]+$/;	
}

if( val.length==0 ){ 
var testo = "<p>Devi compilare il campo:<b>" + " " +id+"</b></p><p class=\"text-right\"><button class=\"btn btn-info conf\" id=\""+id+"\">OK</button></p>";

if(artvisibile==false){	
$('#myModal').modal( { backdrop : 'static' , show: true } );
$('#myModal div.modal-body').html(testo);		
}

$('body').on('click','button.conf',function(){
var idinput = $('button.conf').attr('id');
$('#myModal').modal('hide');
setTimeout(function(){
$( 'form input#'+idinput ).focus();
},1000);
artvisibile = false;
});

errore = 1;
artvisibile=true;
return false;
}
if(val.length!=0 && !val.match(regexp)){
var testo = "<p>Campo<b>" + " " +id+"</b> non valido!</p><p class=\"text-right\"><button class=\"btn btn-info conf\" id=\""+id+"\">OK</button></p>";
if(artvisibile==false){	
$('#myModal').modal( { backdrop : 'static' , show: true } );
$('#myModal div.modal-body').html(testo);	
}

$('body').on('click','button.conf',function(){
var idinput = $('button.conf').attr('id');
$('#myModal').modal('hide');
setTimeout(function(){
$( 'form input#'+idinput ).focus();
},1000);
artvisibile = false;
});	
	
errore = 1;
artvisibile=true;
return false;	
}

});	

if(errore >= 1){return false}
if(errore == 0){return true}
});
/* Submit form.mod_profilo */

/* Submit form.new_article */
$('form.modarticolo , form.new_article , form.nuovacategoria , form.modcategoria ').submit(function(){
var errore =0;
$('form.modarticolo input , form.new_article input , form.nuovacategoria input , form.modcategoria input').each(function(){
var valore = $(this).val();
var id = $(this).attr('id');
var regexpdata = /^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/;

if( valore.length==0 && ( $(this).attr('id')=="Titolo" || $(this).attr('id')=="Categoria" ) ){ 
var testo = "<p>Devi compilare il campo:<b>" + " " + $(this).attr('id')+"</b></p><p class=\"text-right\"><button class=\"btn btn-info conf\">OK</button></p>";

if(artvisibile==false){	
$('#myModal').modal( { backdrop : 'static' , show: true } );
$('#myModal div.modal-body').html(testo);	
}

$('body').on('click','button.conf',function(){
$('#myModal').modal('hide');
setTimeout(function(){
$( 'form input#Titolo , form input#Categoria' ).focus();
},1000); 
artvisibile = false;
});

errore = 1;
artvisibile=true;
return false;
}
if( ( valore.length==0 ||  valore.length!=0 ) &&  $(this).attr('id')=="Data" && !valore.match(regexpdata) ){
var testo = "<p>Campo<b>" + " " +id+"</b> non valido!</p><p class=\"text-right\"><button class=\"btn btn-info conf\" id=\""+id+"\">OK</button></p>";

if(artvisibile==false){	
$('#myModal').modal( { backdrop : 'static' , show: true } );
$('#myModal div.modal-body').html(testo);	
}

$('body').on('click','button.conf',function(){
var idinput = $('button.conf').attr('id');
$('#myModal').modal('hide');
setTimeout(function(){
$( 'form input#'+idinput ).focus();
},1000);
artvisibile = false;
});

errore = 1;
artvisibile=true;
return false;
}
});
if(errore >= 1){return false}
if(errore == 0){return true}
});
/* Submit form.new_article */

$('p#view_pass').click(function(e){
	e.preventDefault();
	$(this).hide();
	$('input#Password').fadeIn();
});
 
$('form#st > select').change(function(){
var val_option = $(this).val();
var url =window.location.search;
var idut = url.split("?");
idut = idut[1].split("&");
idut = idut[0].substring(5);

if(val_option!="seleziona"){
	
$(location).attr( 'href',"/administrator/?idut="+idut+"&p_use=all_article&st="+val_option );	
	
}
else{

$(location).attr( 'href',"/administrator/?idut="+idut+"&p_use=all_article" );	
	
}

	
	
}); 


$('form#stct > select').change(function(){
var val_option = $(this).val();
var url =window.location.search;
var idut = url.split("?");
idut = idut[1].split("&");
idut = idut[0].substring(5);

if(val_option=="all"){
	
$(location).attr( 'href',"/administrator/?idut="+idut+"&category=all");	
	
}
else{
$(location).attr( 'href',"/administrator/?idut="+idut+"&category=all&stct="+val_option);		
}	

});




$('form#ct > select').change(function(){
var val_option = $(this).val();
var url =window.location.search;
var idut = url.split("?");
idut = idut[1].split("&");
idut = idut[0].substring(5);

if(val_option=="tutte"){
	
$(location).attr( 'href',"/administrator/?idut="+idut+"&p_use=all_article" );	
	
}
else{
$(location).attr( 'href',"/administrator/?idut="+idut+"&p_use=all_article&ct="+val_option);		
}	
	
});

$('form#lim > select').change(function(){
var val_option = $(this).val();
var url =window.location.search;

var idut = url.split("?");
idut = idut[1].split("&");
idut = idut[0].substring(5);

var p_use = url.split("?");
p_use = p_use[1].split("&");
p_use = p_use[1].substring(6);


$.ajax({ //ajax
url:'../administrator/limit/change.php?ch='+val_option,
type: 'GET',
dataType:'html',
success: function(){
$(location).attr( 'href',"/administrator/"+url);		        
},
}); //ajax  

});


$('form#limcat > select').change(function(){
var val_option = $(this).val();
var url =window.location.search;

var idut = url.split("?");
idut = idut[1].split("&");
idut = idut[0].substring(5);

var p_use = url.split("?");
p_use = p_use[1].split("&");
p_use = p_use[1].substring(6);

$.ajax({ //ajax
url:'../administrator/limit/change_cat.php?ch='+val_option,
type: 'GET',
dataType:'html',
success: function(){
$(location).attr( 'href',"/administrator/"+url);		        
},
}); //ajax  

});


$('input#cont1,input#cont2,input#cont3,input#cont4,input#cont5,input#user1,input#user2,input#user3,input#user4,input#main1,input#main2,input#temp1,input#temp2,input#conf1').click(function(){
var $nr = $('input#nr');

if($nr.is(':checked')){
$nr.removeAttr('checked');
}

});

$('input#nr').click(function(){
$('input#cont1,input#cont2,input#cont3,input#cont4,input#cont5,input#user1,input#user2,input#user3,input#user4,input#main1,input#main2,input#temp1,input#temp2,input#conf1').removeAttr('checked');
});

$('input#title,input#author,input#date,input#link,input#click,input#comment,input#opt').click(function(){
var $hideall = $('input#hideall');

if($hideall.is(':checked')){
$hideall.removeAttr('checked');
}


});


$('input#hideall').click(function(){
$('input#title,input#author,input#date,input#link,input#click,input#comment,input#opt').removeAttr('checked');
});



$('a.cambiaurl').click(function(){
var id = $(this).attr('id');
var patern = $(this).parent().attr('id');
var q = $('form#'+patern+' input#url').attr('value');
$('div#myURL > div.modal-body').load('../administrator/menu/caricamodal.php?q='+q);
valid = id;
});


$('div#myURL button#changeurl').click(function(){

$('div#myURL input:radio').each(function(){

if($(this).is(':checked')){
var newvalue = $(this).attr('value');

$('form#mod_menu_'+valid+' input#url').attr('value',newvalue);

}
});
});



$('div#addVoice button#newurl').click(function(){
var idbutt = $(this).attr('id');
$('div#addVoice input:radio').each(function(){
if($(this).is(':checked')){
var newvalue = $(this).attr('value');
$('form#aggiungivoce input#url').attr('value',newvalue);
}
});
});


$('a.reset').click(function(e){
e.preventDefault();
var idreset = $(this).attr('id');
var indice = idreset.substring(6,7);

$.ajax({ //ajax
url:'../administrator/menu/loadurl.php?i='+indice,
type: 'GET',
dataType:'html',
success: function(dati){
var aa = dati.split('|');
var aazero = aa[0];
var aauno = aa[1];
var html = "<input type=\"text\" name=\"vocemenu\" value=\""+aazero+"\" id=\"voce\"> <label><b><em>url voce >> </em></b><input type=\"text\" name=\"urlvoce\" value=\""+aauno+"\" id=\"url\"></label> ";
$('form#mod_menu_'+indice+' span').html(html);	        
},
}); //ajax  
});


$('a.resetadd').click(function(e){
e.preventDefault();
var html = "<p><input type=\"text\" placeholder=\"Nome Voce\" name=\"newvoce\" value=\"\" id=\"voce\"></p><p><input type=\"text\" placeholder=\"Nome URL\" name=\"newurlvoce\" value=\"\" id=\"url\"></p> ";
$('form#aggiungivoce span').html(html);	
});

/* form.modificevoce */
$('form.modificevoce').submit(function(){
var errore = 0;
var id = $(this).attr('id');

$('form#'+id+' input:text').each(function(){
var $inputfocus = $(this);
var valinput = $(this).val();
var idinput = $(this).attr('id');

if( valinput.length==0 ){ 
var testo = "<p>Devi compilare il campo:<b>" + " " +primaMaiusc(idinput)+"</b></p><p class=\"text-right\"><button class=\"btn btn-info conf\" id=\""+idinput+"\">OK</button></p>";

if(artvisibile==false){	
$('#myModal').modal( { backdrop : 'static' , show: true } );
$('#myModal div.modal-body').html(testo);		
}

$('body').on('click','button.conf',function(){
var idi = $('button.conf').attr('id');
$('#myModal').modal('hide');
setTimeout(function(){
$inputfocus.focus();
},2000)
artvisibile = false;
});

errore = 1;
artvisibile=true;
return false;
}
});
if(errore >= 1){return false}
if(errore == 0){return true}
});

/* form.modificevoce */


/* form.send_email */
$('form.send_email').submit(function(){
var errore = 0;
var inputcheck = 0;

$('form.send_email input:checkbox').each(function(){
if( ($(this).is(':checked')) ){ inputcheck = inputcheck+1; }

if(inputcheck==0){
var testo = "<p>Devi indicare almeno un destinatario!!</p><p class=\"text-right\"><button class=\"btn btn-info conf\">OK</button></p>";
if(artvisibile==false){	
$('#myModal').modal( { backdrop : 'static' , show: true } );
$('#myModal div.modal-body').html(testo);		
}

$('body').on('click','button.conf',function(){
$('#myModal').modal('hide');
artvisibile = false;
});

errore = 1;
artvisibile=true;
return false;
}

});

if(errore >= 1){return false}
if(errore == 0){return true}
});
/* form.send_email */

var id_adelete_user = null;
var id_adelete_art = null;
var id_del_cat = null;
var id_del_v_menu = null;
var id_delete_comm = null;

/* a.delete_user */
$('a.delete_user').click(function(e){
var $delete_user = $('a.delete_user');
var $del_article = $('a.del_article');
e.preventDefault();
id_adelete_user = $(this).attr('id');
var errore = 0;
var testo = "<p>Vuoi Eliminare Questo Utente?</p><p class=\"text-right\"><button class=\"btn btn-info del\">Si</button>&nbsp;<button class=\"btn btn-info conf\">No</button></p>";
if(artvisibile==false){	
$('#myModal').modal( { backdrop : 'static' , show: true } );
$('#myModal div.modal-body').html(testo);	
}
$('body').on('click','button.conf',function(){
$('#myModal').modal('hide');
artvisibile = false;
});
errore = 1;
artvisibile=true;
});
/* a.delete_user */

/* a.del_comment */
$('a.del_comment').click(function(e){
e.preventDefault();
id_delete_comm  = $(this).attr('id');
var errore = 0;
var testo = "<p>Vuoi Eliminare Questo Commento?</p><p class=\"text-right\"><button class=\"btn btn-info delcomment\">Si</button>&nbsp;<button class=\"btn btn-info conf\">No</button></p>";
if(artvisibile==false){	
$('#myModal').modal( { backdrop : 'static' , show: true } );
$('#myModal div.modal-body').html(testo);		
}
$('body').on('click','button.conf',function(){
$('#myModal').modal('hide');
artvisibile = false;
});
errore = 1;
artvisibile=true;

});
/* a.del_comment */



/* a.del_article */
$('a.del_article').click(function(e){
e.preventDefault();
id_adelete_art = $(this).attr('id');
var errore = 0;
var testo = "<p>Vuoi Eliminare Questo Articolo?</p><p class=\"text-right\"><button class=\"btn btn-info delarticle\">Si</button>&nbsp;<button class=\"btn btn-info conf\">No</button></p>";
if(artvisibile==false){	
$('#myModal').modal( { backdrop : 'static' , show: true } );
$('#myModal div.modal-body').html(testo);		
}
$('body').on('click','button.conf',function(){
$('#myModal').modal('hide');
artvisibile = false;
});
errore = 1;
artvisibile=true;
});
/* a.del_article */


/* a.del_cat */
$('a.del_cat').click(function(e){
e.preventDefault();
id_del_cat = $(this).attr('id');
var errore = 0;
var testo = "<p>Vuoi Eliminare Questa Categoria?</p><p class=\"text-right\"><button class=\"btn btn-info delcat\">Si</button>&nbsp;<button class=\"btn btn-info conf\">No</button></p>";
if(artvisibile==false){	
$('#myModal').modal( { backdrop : 'static' , show: true } );
$('#myModal div.modal-body').html(testo);		
}
$('body').on('click','button.conf',function(){
$('#myModal').modal('hide');
artvisibile = false;
});
errore = 1;
artvisibile=true;
});
/* a.del_cat */


/* a.delete_v_menu */
$('a.delete_v_menu').click(function(e){
e.preventDefault();
id_del_v_menu = $(this).attr('id');
var errore = 0;
var testo = "<p>Vuoi Eliminare Questa Voce di Menù?</p><p class=\"text-right\"><button class=\"btn btn-info delvmenu\">Si</button>&nbsp;<button class=\"btn btn-info conf\">No</button></p>";
if(artvisibile==false){	
$('#myModal').modal( { backdrop : 'static' , show: true } );
$('#myModal div.modal-body').html(testo);
}
$('body').on('click','button.conf',function(){
$('#myModal').modal('hide');
artvisibile = false;
});
errore = 1;
artvisibile=true;
});
/* a.delete_v_menu */


$('body').on('click','button.delvmenu',function(){
var url =window.location.search;
var idut = url.split("?");
idut = idut[1].split("&");
idut = idut[0].substring(5);

$.ajax({ //ajax
url:'../administrator/menu/delete_v_menu.php?v_menu='+id_del_v_menu+"&idut="+idut,
type: 'GET',
dataType:'html',

beforeSend: function(){
var testo = "<p>Attendere... <i class=\"fa fa-spinner fa-pulse\"></i></p>";
$('#myModal').modal( { backdrop : 'static' , show: true } );
$('#myModal div.modal-body').html(testo);	
},

success: function(dati){
setTimeout(function(){
$('#myModal div.modal-body').html(dati); 
},2000);      
}

}); //ajax  
});



$('body').on('click','button.del',function(){
var url =window.location.search;
var idut = url.split("?");
idut = idut[1].split("&");
idut = idut[0].substring(5);

$.ajax({ //ajax
url:'../administrator/utenti/delete_user.php?id='+id_adelete_user+"&idut="+idut,
type: 'GET',
dataType:'html',

beforeSend: function(){
var testo = "<p>Attendere... <i class=\"fa fa-spinner fa-pulse\"></i></p>";
$('#myModal').modal( { backdrop : 'static' , show: true } );
$('#myModal div.modal-body').html(testo);	
},

success: function(dati){
setTimeout(function(){
$('#myModal div.modal-body').html(dati); 
},2000);      
}

}); //ajax  
});



$('body').on('click','button.delcomment',function(){

$.ajax({ //ajax
url:'../administrator/article/comment/delete_comm.php?idcomm='+id_delete_comm,
type: 'GET',
dataType:'html',

beforeSend: function(){
var testo = "<p>Attendere... <i class=\"fa fa-spinner fa-pulse\"></i></p>";
$('#myModal div.modal-body').html(testo);	
},

success: function(dati){
setTimeout(function(){
$('#myModal div.modal-body').html(dati); 
},2000);      
}

}); //ajax  
});




$('body').on('click','button.delarticle',function(){
var url =window.location.search;
var idut = url.split("?");
idut = idut[1].split("&");
idut = idut[0].substring(5);


$.ajax({ //ajax
url:'../administrator/article/deleted_article.php?idart='+id_adelete_art+"&idut="+idut,
type: 'GET',
dataType:'html',

beforeSend: function(){
var testo = "<p>Attendere... <i class=\"fa fa-spinner fa-pulse\"></i></p>";
$('#myModal div.modal-body').html(testo);	
},

success: function(dati){
setTimeout(function(){
$('#myModal div.modal-body').html(dati);	
},2000);      
}

}); //ajax  
});


$('body').on('click','button.delcat',function(){
var url =window.location.search;
var idut = url.split("?");
idut = idut[1].split("&");
idut = idut[0].substring(5);

$.ajax({ //ajax
url:'../administrator/category/deleted_cat.php?idcat='+id_del_cat+"&idut="+idut,
type: 'GET',
dataType:'html',

beforeSend: function(){
var testo = "<p>Attendere... <i class=\"fa fa-spinner fa-pulse\"></i></p>";
$('#myModal div.modal-body').html(testo);	
},

success: function(dati){
setTimeout(function(){
$('#myModal div.modal-body').html(dati);
},2000);      
}

}); //ajax  
});


$('body').on('click','button.reload',function(){
location.reload();

});


$('input#all_themes , input#front-end, input#back-end').click(function(e){
e.preventDefault();
var idinp = $(this).attr('id');
var url =window.location.search;
var idut = url.split("?");
idut = idut[1].split("&");
idut = idut[0].substring(5);

if(idinp=="all_themes"){
$(location).attr( 'href',"/administrator/?idut="+idut+"&template="+idinp);	

}

if(idinp=="front-end"){
$(location).attr( 'href',"/administrator/?idut="+idut+"&template=all_themes&t_themes="+idinp);	

}

if(idinp=="back-end"){
$(location).attr( 'href',"/administrator/?idut="+idut+"&template=all_themes&t_themes="+idinp);	

}

});

var idarticolo =  null;
$('a#reply_comm').click(function(){
idarticolo = $(this).attr('class');
$('div#reply > div.modal-body > p').load('/administrator/article/comment/form_reply.php');	
});	

$('a#addmail').click(function(){
$('div#add_mail > div.modal-body > p').load('/administrator/article/comment/form_bann.php');	
});	


$('body').on('submit','form#form_add_bann',function(){
var errore =0;
var dati =[]; 
$('form#form_add_bann input').each(function(){
dati.push($(this).val());
var val = $(this).val();
var name = $(this).attr("name");
var regexpemail = /^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
var html_reply = "<em>Compila il campo <strong>"+name+".</strong>!!</em>";
var html_reply_m = "<em>Campo <strong>"+name+"</strong> non valido.!!</em>";

if( val.length==0 ){
$('form#form_add_bann p.add_mail_bannata').html(html_reply);
$(this).focus();
errore = 1; 
return false;
}
else{
if(!val.match(regexpemail) && name=="EMail"){
$('form#form_add_bann p.add_mail_bannata').html(html_reply_m);
$(this).focus();
errore = 1; 
return false;
}
}

});
if(errore == 1){return false}
add_mail_at_bann(dati[0]);
return false;

});

$('body').on('submit','form#form_reply',function(){
var errore =0;
var dati =[]; 
$('form#form_reply input , form#form_reply textarea').each(function(){
dati.push($(this).val());
var val = $(this).val();
var name = $(this).attr("name");
var regexpname = /^[a-zA-Z0-9\ ]*$/ ;
var html_reply = "<em>Compila il campo <strong>"+name+".</strong>!!</em>";
var html_reply_m = "<em>Campo <strong>"+name+"</strong> non valido.!!</em>";

if( val.length==0 ){
$('form#form_reply p.mess_reply').html(html_reply);
$(this).focus();
errore = 1; 
return false;
}
else{
if(!val.match(regexpname) && name=="Nome"){
$('form#form_reply p.mess_reply').html(html_reply_m);
$(this).focus();
errore = 1; 
return false;
}
}

});
if(errore == 1){return false}
invioreply(dati[0],dati[1]);
return false;

});


function invioreply(nome,testo){
var url =window.location.search;
var idut = url.split("?");
idut = idut[1].split("&");
idut = idut[0].substring(5);

/*AJAX*/
$.ajax({
url:'/administrator/article/comment/add_reply.php?idut='+idut+"&idart="+idarticolo,
type:'POST', 
dataType:'html',
data: {Nome:nome, Testo:testo},
beforeSend: function(){
var htmlinfo = "<p class=\"text-info\"><em>Invio in corso..... <i class=\"fa fa-spinner fa-pulse\"></i></em></p>";
$('p.mess_reply').html(htmlinfo);
},
success: function(htmlsucc){
setTimeout(function(){
$('p.mess_reply').html(htmlsucc);
},2000);      
},
complete: function(){
setTimeout(function(){	
$('form#form_reply textarea').val("");
},3000);

setTimeout(function(){	
$('div#reply').modal('hide');
location.reload();
},4000);

}	
});
/*AJAX*/	
};


function add_mail_at_bann (email){

$.ajax({
url:'/administrator/article/comment/add_bann.php',
type:'POST', 
dataType:'html',
data: { EMail:email },
beforeSend: function(){
var htmlinfo = "<p class=\"text-info\"><em>Invio in corso..... <i class=\"fa fa-spinner fa-pulse\"></i></em></p>";
$('p.add_mail_bannata').html(htmlinfo);
},
success: function(htmlsucc){
setTimeout(function(){
$('p.add_mail_bannata').html(htmlsucc);
},2000);      
},
complete: function(){
setTimeout(function(){	
$('form#form_add_bann input:text').val("");
},3000);

setTimeout(function(){	
$('div#add_mail').modal('hide');
location.reload();
},4000);

}

});
	

};



$('a.loadimg').click(function(){
var attrid = $(this).attr('id');
$('div#infoIMG > div.modal-body').load('/administrator/cont_images/loadimages.php?idimg='+attrid);
});





});
