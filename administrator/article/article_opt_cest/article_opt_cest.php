<?php
if($cest=="No"){

if( isset($_GET['p']) ){
$p = $_GET['p'];

if( isset($_GET['st']) || isset($_GET['ct']) || isset($_GET['dt']) || isset($_GET['search']) || isset($_GET['nm_arch']) ){

if( isset($_GET['st']) ){
$st = 	$_GET['st'];
echo "<a  href=\"article/not_cest.php?idut=".$cod_md5."&p_use=".$p_use."&idart=".$id_art."&st=".$st."&p=".$p."\" class=\"btn btn-success  btn-mini\" id=\"cest\">
       <i class=\"fa fa-trash\"></i> No</a>";	

}	

if( isset($_GET['ct']) ){
$ct = 	$_GET['ct'];
echo "<a  href=\"article/not_cest.php?idut=".$cod_md5."&p_use=".$p_use."&idart=".$id_art."&ct=".$ct."&p=".$p."\" class=\"btn btn-success  btn-mini\" id=\"cest\">
      <i class=\"fa fa-trash\"></i> No</a>";	

}

if( isset($_GET['dt']) ){
$dt = 	$_GET['dt'];
echo "<a  href=\"article/not_cest.php?idut=".$cod_md5."&p_use=".$p_use."&idart=".$id_art."&dt=".$dt."&p=".$p."\" class=\"btn btn-success  btn-mini\" id=\"cest\">
       <i class=\"fa fa-trash\"></i> No</a>";	

}

if( isset($_GET['search']) ){
$search=$_GET['search'];
echo "<a  href=\"article/not_cest.php?idut=".$cod_md5."&p_use=".$p_use."&idart=".$id_art."&search=".$search."&p=".$p."\" class=\"btn btn-success  btn-mini\" id=\"cest\">
       <i class=\"fa fa-trash\"></i> No</a>";	
}

if( isset($_GET['nm_arch']) ){
$nmarch = $_GET['nm_arch'];
echo "<a  href=\"article/not_cest.php?idut=".$cod_md5."&p_use=".$p_use."&idart=".$id_art."&nm_arch=".$nmarch."&p=".$p."\" class=\"btn btn-success  btn-mini\" id=\"cest\">
       <i class=\"fa fa-trash\"></i> No</a>";	
}


}
else{
echo "<a  href=\"article/not_cest.php?idut=".$cod_md5."&p_use=".$p_use."&idart=".$id_art."&p=".$p."\" class=\"btn btn-success  btn-mini\" id=\"cest\">
       <i class=\"fa fa-trash\"></i> No</a>";	
}	
}
else{
if( isset($_GET['st']) || isset($_GET['ct']) || isset($_GET['dt']) || isset($_GET['search']) || isset($_GET['nm_arch']) ){

if( isset($_GET['st']) ){
$st = 	$_GET['st'];
echo "<a  href=\"article/not_cest.php?idut=".$cod_md5."&p_use=".$p_use."&idart=".$id_art."&st=".$st."\" class=\"btn btn-success  btn-mini\" id=\"cest\">
        <i class=\"fa fa-trash\"></i> No</a>";	
}

if( isset($_GET['ct']) ){
$ct = 	$_GET['ct'];
echo "<a  href=\"article/not_cest.php?idut=".$cod_md5."&p_use=".$p_use."&idart=".$id_art."&ct=".$ct."\" class=\"btn btn-success  btn-mini\" id=\"cest\">
         <i class=\"fa fa-trash\"></i> No</a>";	
}

if( isset($_GET['dt']) ){
$dt = 	$_GET['dt'];
echo "<a  href=\"article/not_cest.php?idut=".$cod_md5."&p_use=".$p_use."&idart=".$id_art."&dt=".$dt."\" class=\"btn btn-success  btn-mini\" id=\"cest\">
        <i class=\"fa fa-trash\"></i> No</a>";	
}

if( isset($_GET['search']) ){
$search=$_GET['search'];
echo "<a  href=\"article/not_cest.php?idut=".$cod_md5."&p_use=".$p_use."&idart=".$id_art."&search=".$search."\" class=\"btn btn-success  btn-mini\" id=\"cest\">
        <i class=\"fa fa-trash\"></i> No</a>";	

}

if( isset($_GET['nm_arch']) ){
$nmarch = $_GET['nm_arch'];
echo "<a  href=\"article/not_cest.php?idut=".$cod_md5."&p_use=".$p_use."&idart=".$id_art."&nm_arch=".$nmarch."\" class=\"btn btn-success  btn-mini\" id=\"cest\">
        <i class=\"fa fa-trash\"></i> No</a>";	

}



}

else{
echo "<a  href=\"article/not_cest.php?idut=".$cod_md5."&p_use=".$p_use."&idart=".$id_art."\" class=\"btn btn-success  btn-mini\" id=\"cest\">
       <i class=\"fa fa-trash\"></i> No</a>";	
	
}
}	

}
else{

if( isset($_GET['p']) ){
$p = $_GET['p'];

if( isset($_GET['st']) || isset($_GET['ct']) || isset($_GET['dt']) || isset($_GET['search']) || isset($_GET['nm_arch']) ){

if( isset($_GET['st']) ){
$st = $_GET['st'];		
echo "<a href=\"article/cest.php?idut=".$cod_md5."&p_use=".$p_use."&idart=".$id_art."&st=".$st."&p=".$p."\" class=\"btn btn-danger btn-mini\" id=\"no_cest\">
       <i class=\"fa fa-trash\" ></i> Si</a>";		
}

if( isset($_GET['ct']) ){
$ct = $_GET['ct'];		
echo "<a href=\"article/cest.php?idut=".$cod_md5."&p_use=".$p_use."&idart=".$id_art."&ct=".$ct."&p=".$p."\" class=\"btn btn-danger btn-mini\" id=\"no_cest\">
       <i class=\"fa fa-trash\" ></i> Si</a>";		
}

if( isset($_GET['dt']) ){
$dt = $_GET['dt'];		
echo "<a href=\"article/cest.php?idut=".$cod_md5."&p_use=".$p_use."&idart=".$id_art."&dt=".$dt."&p=".$p."\" class=\"btn btn-danger btn-mini\" id=\"no_cest\">
      <i class=\"fa fa-trash\" ></i> Si</a>";		
}

if( isset($_GET['search']) ){
$search=$_GET['search'];
echo "<a href=\"article/cest.php?idut=".$cod_md5."&p_use=".$p_use."&idart=".$id_art."&search=".$search."&p=".$p."\" class=\"btn btn-danger btn-mini\" id=\"no_cest\">
        <i class=\"fa fa-trash\" ></i> Si</a>";		
	
}

if( isset($_GET['nm_arch']) ){
$nmarch = $_GET['nm_arch'];
echo "<a href=\"article/cest.php?idut=".$cod_md5."&p_use=".$p_use."&idart=".$id_art."&nm_arch=".$nmarch."&p=".$p."\" class=\"btn btn-danger btn-mini\" id=\"no_cest\">
        <i class=\"fa fa-trash\" ></i> Si</a>";		
	
}



}
else{
echo "<a href=\"article/cest.php?idut=".$cod_md5."&p_use=".$p_use."&idart=".$id_art."&p=".$p."\" class=\"btn btn-danger btn-mini\" id=\"no_cest\">
      <i class=\"fa fa-trash\" ></i> Si</a>";		
	
}
}
else{
if( isset($_GET['st']) || isset($_GET['ct']) || isset($_GET['dt']) || isset($_GET['search']) || isset($_GET['nm_arch']) ){

if( isset($_GET['st']) ){
$st = 	$_GET['st'];		
echo "<a href=\"article/cest.php?idut=".$cod_md5."&p_use=".$p_use."&idart=".$id_art."&st=".$st."\" class=\"btn btn-danger btn-mini\" id=\"no_cest\">
       <i class=\"fa fa-trash\" ></i> Si</a>";		
}

if( isset($_GET['ct']) ){
$ct = 	$_GET['ct'];		
echo "<a href=\"article/cest.php?idut=".$cod_md5."&p_use=".$p_use."&idart=".$id_art."&ct=".$ct."\" class=\"btn btn-danger btn-mini\" id=\"no_cest\">
       <i class=\"fa fa-trash\" ></i> Si</a>";		
}

if( isset($_GET['dt']) ){
$dt = $_GET['dt'];		
echo "<a href=\"article/cest.php?idut=".$cod_md5."&p_use=".$p_use."&idart=".$id_art."&dt=".$dt."\" class=\"btn btn-danger btn-mini\" id=\"no_cest\">
        <i class=\"fa fa-trash\" ></i> Si</a>";		
}

if( isset($_GET['search']) ){
$search=$_GET['search'];
echo "<a href=\"article/cest.php?idut=".$cod_md5."&p_use=".$p_use."&idart=".$id_art."&search=".$search."\" class=\"btn btn-danger btn-mini\" id=\"no_cest\">
       <i class=\"fa fa-trash\" ></i> Si</a>";		
	
}

if( isset($_GET['nm_arch']) ){
$nmarch = $_GET['nm_arch'];
echo "<a href=\"article/cest.php?idut=".$cod_md5."&p_use=".$p_use."&idart=".$id_art."&nm_arch=".$nmarch."\" class=\"btn btn-danger btn-mini\" id=\"no_cest\">
       <i class=\"fa fa-trash\" ></i> Si</a>";		
	
}


}

else{
echo "<a href=\"article/cest.php?idut=".$cod_md5."&p_use=".$p_use."&idart=".$id_art."\" class=\"btn btn-danger btn-mini\" id=\"no_cest\">
        <i class=\"fa fa-trash\" ></i> Si</a>";			
}
}
}





?>
