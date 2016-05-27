<?php
if(file_exists("installazione")){ 	header("Location: ../installazione/index.php"); 	exit; }

define( '__ROOT__', dirname(__FILE__) );
require_once(__ROOT__.'/connect.php');

include( __ROOT__."/lib.php") ;
$myconn = @mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME) or die("Errore Connessione: <b>" .mysqli_connect_error()."</b>");
@mysqli_query($myconn," SET names 'UTF8' ");

$view_art = 4;
$sqlsetting = "select * from config";
$rssetting = @mysqli_query($myconn,$sqlsetting) or die( "Errore....".mysqli_error($myconn) );
$rowsetting = mysqli_fetch_array($rssetting);

$menufront =" SELECT * FROM menu ";
$rsmenufront = @mysqli_query($myconn,$menufront) or die( "Errore....".mysqli_error($myconn) );

$sqlvmenufront = "select * from voci_menu where home='si'";
$rssqlvmenufront = @mysqli_query($myconn,$sqlvmenufront) or die( "Errore....".mysqli_error($myconn) );
$rowsqlvmenufront = mysqli_fetch_array($rssqlvmenufront);

$sql_art_vis_no_arch = " SELECT * FROM articoli WHERE visibility = \"Si\" AND archiviato = \"No\" ";
$rs_sql_art_vis_no_arch = @mysqli_query($myconn,$sql_art_vis_no_arch) or die( "Errore....".mysqli_error($myconn) );
$num_art_vis_no_arch = $rs_sql_art_vis_no_arch->num_rows;

$all_pages = ceil($num_art_vis_no_arch / $view_art); 
$p = isset($_GET['p']) ? $_GET['p']:1;
$first = ( ($p - 1) * $view_art );

if($p<0 || !is_numeric($p) || $p==0){
header("Location: /");	
exit;
}

$sql_art_vis_no_arch_p = " SELECT * FROM articoli WHERE visibility = \"Si\" AND archiviato = \"No\" ORDER BY datacreate DESC LIMIT ".$first." , ".$view_art ;
$rs_sql_art_vis_no_arch_p = @mysqli_query($myconn,$sql_art_vis_no_arch_p) or die( "Errore....".mysqli_error($myconn) );



?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include( __ROOT__.'/meta_tag_blog/meta_tag_blog.php' ) ; ?>
<?php include( __ROOT__.'/title_blog/title_blog.php' ) ; ?>

<?php
$frontend = "front-end ";
$sqlactive_theme = "select * from themes where tipo_themes ='$frontend' ";
$rsactive_theme = @mysqli_query($myconn,$sqlactive_theme) or die( "Errore....".mysqli_error($myconn) );	
while($rowactive_theme = mysqli_fetch_array($rsactive_theme)){
$name_themes = $rowactive_theme['name_themes'];
$st_themes = $rowactive_theme['st_themes'];
if( $st_themes=="attivo" ){
?>
<link href="/assets/css/temi/<?php echo $name_themes; ?>/bootstrap.css" rel="stylesheet">
<?php	
}
}
?>
<link href="/assets/css/bootstrap-responsive.css" rel="stylesheet">
<link rel="stylesheet" href="../fontawesome/font-awesome/css/font-awesome.min.css">
<style>
body{margin-bottom:180px;}
 
@media (min-width: 600px) {
  .blog-cont{margin-top:100px;}
}
.blog-title { 
  margin-bottom: 0;
  font-size: 55px;
  font-weight: normal;
  line-height:65px; 
}

.blog-description {
  font-size: 20px;
  line-height:28px;
  color: #999;
}
.blog-post {
  margin-bottom: 60px;
  
  }
.blog-post-title {
  margin-bottom: 5px;
  font-size: 40px;
}
.blog-post-meta {
  margin-bottom: 20px;
  color: #999;
}

.blog-footer {
  padding: 40px 0;
  color: #999;
  text-align: center;
  border-top: 1px solid #e5e5e5;
}
.blog-footer p:last-child {
  margin-bottom: 0;
}

.borderRed{border: 1px solid red}
.cookie_policy{
	position:fixed;
        width:100%;
       height:auto;
       left:0px;
	bottom:-25px;
	
}

.mylike{color:green !important;}


div.table-responsive{overflow-x: auto;}


</style>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
<!-- Analytics Tracking
================================================== -->
<?php
$gooanaly = $rowsetting['gooanaly'];	
if( strlen($gooanaly)!=0){
 include_once( __ROOT__."/administrator/setting/analyticstracking.php" ) ;
}
?>
<!-- Analytics Tracking
================================================== --> 


<!-- NAVBAR
================================================== -->
<?php include( __ROOT__.'/menu/menu.php' ) ; ?>
<!-- NAVBAR
================================================== -->

<div class="container blog-cont"><!-- container -->	
<div class="row-fluid">
<div class="span12">
<div class="span8">

<div class="row-fluid">
<div class="span12">
<!-- Breadcrumb
================================================== -->
<?php include( __ROOT__.'/article/breadcrumb/breadcrumb.php' ) ;  ?>
<!-- Breadcrumb
================================================== -->
</div>
</div>

<div class="row-fluid">
<div class="span12">
<!-- Blog Title
================================================== -->  
<?php include( __ROOT__.'/blog_title/blog_title.php' ) ; ?>	  
<!-- Blog Title
================================================== -->
</div>
</div>
<hr>

<div class="row-fluid">
<div class="span12">
<!-- Article
================================================== -->	  
<?php 
include( __ROOT__.'/article/article.php' ) ; 
?>	 	
<!-- Article
================================================== -->	
</div>
</div>

</div>
<div class="span3 offset1">
<div class="row-fluid">
<div class="span12">
<!--search
================================================== -->
<?php include( __ROOT__.'/section_right/search.php' ) ; ?>
<!--search
================================================== -->
</div>
</div>
<hr>

<div class="row-fluid">
<div class="span12">
<!--about
================================================== -->
<div class="well">
<?php include( __ROOT__.'/section_right/about.php' ) ; ?>
</div>
<!--about
================================================== -->
</div>
</div>
<hr>

<div class="row-fluid">
<div class="span12">
<!--Preferiti
================================================== -->
<?php include( __ROOT__.'/section_right/mylike.php') ; ?>
<!--Preferiti
================================================== -->
</div>
</div>
<hr>

<div class="row-fluid">
<div class="span12">
<!--articoli recenti
================================================== -->
<?php include( __ROOT__.'/section_right/ult_art.php') ; ?>
<!--articoli recenti
================================================== -->
</div>
</div>
<hr>


<div class="row-fluid">
<div class="span12">
<!--archivie
================================================== -->	
<?php include( __ROOT__.'/section_right/archivie.php') ; ?>
<!--archivie
================================================== -->	
</div>
</div>
<hr>

<div class="row-fluid">
<div class="span12">
<!--social
================================================== -->
<?php include( __ROOT__.'/section_right/social.php') ; ?>
<!--social
================================================== -->
</div>
</div>
<hr>


</div>

</div>
</div>
</div><!-- container -->	

<!--Footer
================================================== -->
<?php include( __ROOT__.'/footer/footer_blog.php') ; ?>
<!--Footer
================================================== -->


<?php

if( !isset($_COOKIE['_cook']) && !isset($_COOKIE['_not_cook']) ){	
?>
<div class="cookie_policy">
<div class="alert alert-block alert-info fade in">
<p class="text-error">
Questo sito utilizza i cookie. 
Continuando la navigazione del sito ne accetti l'utilizzo. 
Se desideri maggiori informazioni sui cookie e su come modificare le impostazioni del tuo browser, 
leggi la politica in materia di cookie. <strong><a href="/?cookie-policy">Per saperne di più</a></strong>.
</p>
<p class="text-left">
<a class="btn btn-danger" href="" id="no_accept_cook">Non Accetto</a> <a class="btn btn-info" id="accept_cook" href="">Accetto</a>
</p>
</div>
</div>
<?php	
}
?>
<script src="/assets/js/jquery.js"></script>
<script src="/assets/js/bootstrap.js"></script>
<script>
$(document).ready(function(){

var dt = new Date(); 
var d = dt.getDate();
var m = dt.getMonth()+1;
var y = dt.getFullYear()+1;
var h = dt.getHours();
var min = dt.getMinutes();
var sec = dt.getSeconds();
var scad = new Date(m+"/"+d+"/"+y+" "+h+":"+min);

document.cookie = '_test_cook = _1 ; path=/';	


if( document.cookie.length == 0 ){
var test_cook = "<p class=\"text-error text-center\"><strong> <i class=\"fa fa-info-circle\"></i> Hai i cookie disabilitati!</strong> Questo sito utilizza i cookie, per informazioni su come abilitare l'utilizzo dei cookie visita la <strong><a href=\"/?cookie-policy#setting_browser\">cookie policy</a></strong>.</p>";	
$('span#test_cook').html(test_cook);
};


$('ul#option_share li > a').eq(2).click(function(e){
e.preventDefault();	
var classe = $(this).attr('class');
var myurl = $(this).attr('href');
var loc = window.location.pathname;	

if(classe!="mylike"){
var newurl = myurl.replace(/cookie_like/,"nolike");
$.ajax({ //ajax
url: myurl+'&loc='+loc ,
type: 'GET',
dataType:'html',
success: function(dati){
$('ul#option_share li > a').eq(2).addClass('mylike');	
$('ul#option_share li > a').eq(2).attr('href', newurl);	
$('ul#option_share li > a').eq(2).html(dati);
},
}); //ajax 		
}
else{
var newurl = myurl.replace(/nolike/,"cookie_like");

$.ajax({ //ajax
url: myurl+'&loc='+loc ,
type: 'GET',
dataType:'html',
success: function(dati){
$('ul#option_share li > a').eq(2).removeClass('mylike');	
$('ul#option_share li > a').eq(2).attr('href', newurl);	

},
}); //ajax 

	
}


});



$(' a#no_accept_cook ').click(function(e){
e.preventDefault();
document.cookie = '_not_cook = _not_accept ; path=/';	
$('div.cookie_policy').fadeOut();	
});



$(' a#accept_cook ').click(function(e){
e.preventDefault();
document.cookie = '_cook = _accept ; expires='+scad.toUTCString()+' path=/';	
$('div.cookie_policy').fadeOut();
});	
	
	
$('a.add_comm , ul#option_share > li > a > i ').tooltip({placement:'top',trigger:'hover'});	
var id_art = null;	
function scrollWin(anc){  
target = $(anc);
$('html, body').animate({scrollTop: target.offset().top },500); 
};  
$('#top').click(function(e){
e.preventDefault();
scrollWin('html');        
}); 

$('form#send_comm').submit(function(){
var errore =0;
var dati =[]; 
var idart = $(this).attr('class');
id_art = idart;

$('form#send_comm input:text , form#send_comm textarea').each(function(){
dati.push($(this).val());
var val = $(this).val();
var attrname = $(this).attr('name');
var regexptext = /^[a-zA-Z0-9\ ]*$/;
var regexpemail = /^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;	

if(val.length==0){
var texterror = "<em>Devi compilare il campo: <b>"+$(this).attr('name')+"..!!</em></b>";
$('p.messgg').html(texterror);
$(this).focus(); 
errore = 1; 
return false;
}
else{

if(!val.match(regexptext) && attrname=="Nome"){
var texterror = "<em>Il campo: <b>"+$(this).attr('name')+"</b> ha un formato non valido..!!</em>";
$('p.messgg').html(texterror);
$(this).focus(); 
errore = 1; 
return false;
}

if(!val.match(regexpemail) && attrname=="EMail"){
var texterror = "<em>Il campo: <b>"+$(this).attr('name')+"</b> ha un formato non valido..!!</em>";
$('p.messgg').html(texterror);
$(this).focus(); 
errore = 1; 
return false;
}

	
}
	
	
});
if(errore == 1){return false}
inviocomm(dati[0],dati[1],dati[2]);
return false;
	
});


function inviocomm( nome , email , testo ){
/*AJAX*/
$.ajax({
url:'/article/commenti/add_comm.php?idart='+id_art,
type:'POST', 
dataType:'html',
data: {Nome:nome, EMail:email, Testo:testo},
beforeSend: function(){
var htmlinfo = "<p class=\"text-info\"><em>Invio in corso..... <i class=\"fa fa-spinner fa-pulse\"></i></em></p>";
$('p.messgg').html(htmlinfo);
},
success: function(htmlsucc){
setTimeout(function(){
$('p.messgg').html(htmlsucc);
},2000);      
},
complete: function(){
setTimeout(function(){	
$('form#send_comm input:text , form#send_comm textarea').val("");
},3000);  
}	
});
/*AJAX*/	
};
	
$('form#send_comm input.reset').click(function(){
$('p.messgg').html('');	
});	

});
</script>
</body>
</html>
