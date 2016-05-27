<?php
if(file_exists("../installazione")){ 	header("Location: ../installazione/index.php"); 	exit; }

define('__ROOT__', dirname( dirname (  __FILE__ ) ) ); 
require_once(__ROOT__.'/connect.php');

$myconn = @mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME) or die("Errore Connessione: <b>" .mysqli_connect_error()."</b>");
@mysqli_query($myconn," SET names 'UTF8' ");
include( __ROOT__."/lib.php" );
include( __ROOT__."/contatori.php" );

$cod_md5 = $_GET["idut"];
$query =" SELECT * FROM admin WHERE cod_md5='$cod_md5' ";
$result = @mysqli_query($myconn,$query) or die( "Errore....".mysqli_error($myconn) );
$row = mysqli_fetch_array($result);
$nomeuser = $row['nome'];
$cognomeuser = $row['cognome'];
$nomecognomeuser = $nomeuser." ".$cognomeuser;
$user = $row['username'];
$tipo_utente = $row['tipo_utente'];
$nomecookie = "_ut";
$valore_cookie = $cod_md5;
if (!isset($_COOKIE[$nomecookie]) || (isset($_COOKIE[$nomecookie]) && $_COOKIE[$nomecookie]!=$cod_md5)) {
    header("Location: ../login.php?error=not_view");
  exit;
}

?>

<!DOCTYPE html>
<html lang="it">
<head>

<meta charset="utf-8">
<title>CMS&nbsp;Bootstrap&nbsp;Blog</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
$backend = "back-end";
$sqlactive_theme = "select * from themes where tipo_themes ='$backend' ";
$rsactive_theme = @mysqli_query($myconn,$sqlactive_theme) or die( "Errore....".mysqli_error($myconn) );	
while($rowactive_theme = mysqli_fetch_array($rsactive_theme)){
$name_themes = $rowactive_theme['name_themes'];
$st_themes = $rowactive_theme['st_themes'];
if( $st_themes=="attivo" ){
?>
<link href="../assets/css/temi/<?php echo $name_themes; ?>/bootstrap.css" rel="stylesheet">
<?php	
}
}
?>
<link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">
<link href="../assets/css/bootstrap-datepicker.min.css" rel="stylesheet">
<link rel="stylesheet" href="../fontawesome/font-awesome/css/font-awesome.min.css">
<link href="../assets/css/style.css" rel="stylesheet">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>


<div class="container-fluid"><!-- container fluid-->

<!-- Header-->
<?php include( __ROOT__.'/administrator/header/header_admin.php' )?>
<!-- Header--> 

<div class="row-fluid"><!-- row1 fluid-->
<div class="span12">
<?php include(  __ROOT__."/administrator/menu/menu.php" )?>
</div>
</div><!-- row1 fluid-->

<!-- Header Page-->
<?php include( __ROOT__.'/administrator/header/header_page.php' )?>
<!-- Header Page--> 

<div class="row-fluid"><!-- row2 fluid-->
<div class="span12">  
<?php include( __ROOT__.'/administrator/page_use/page_use.php' ); ?> 
</div>
</div><!-- row2 fluid-->
</div><!-- container fluid-->

<?php include( __ROOT__.'/administrator/footer/footer.php' );?>

<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-body"></div> 
</div>

<script src="../assets/js/jquery.js"></script>
<script src="../assets/js/jquery.easing.1.3.js"></script>
<script src="../assets/js/bootstrap.js"></script>
<script src="../assets/js/bootstrap-datepicker.min.js"></script>
<script src="../assets/js/bootstrap-datepicker.it-CH.min.js"></script>
<script src="../ckeditor/ckeditor.js"></script>
<script>CKEDITOR.replace('contenuto', { 
                                        contentsCss: [CKEDITOR.basePath + 'bootstrap.css', '../assert/css/bootstrap.css'], 
										allowedContent: true 
										}
						);
</script>

<script src="../assets/js/script.js"></script>
</body>
</html>
