<?php
if($arch=="Si"){

if( isset($_GET['p']) ){
$p = $_GET['p'];

if( isset($_GET['st']) || isset($_GET['ct']) || isset($_GET['dt']) || isset($_GET['search']) || isset($_GET['nm_arch']) ){
	
if( isset($_GET['st']) ){
$st = 	$_GET['st'];
echo "<a  href=\"article/not_arch.php?idut=".$cod_md5."&p_use=".$p_use."&idart=".$id_art."&st=".$st."&p=".$p."\" class=\"btn btn-warning  btn-mini\" id=\"archivio\">
       <i class=\"fa fa-archive\" ></i> Si</a>";	

}

if( isset($_GET['ct']) ){
$ct = 	$_GET['ct'];
echo "<a  href=\"article/not_arch.php?idut=".$cod_md5."&p_use=".$p_use."&idart=".$id_art."&ct=".$ct."&p=".$p."\" class=\"btn btn-warning  btn-mini\" id=\"archivio\">
      <i class=\"fa fa-archive\"></i> Si</a>";	

}

if( isset($_GET['dt']) ){
$dt = 	$_GET['dt'];
echo "<a  href=\"article/not_arch.php?idut=".$cod_md5."&p_use=".$p_use."&idart=".$id_art."&dt=".$dt."&p=".$p."\" class=\"btn btn-warning  btn-mini\" id=\"archivio\">
       <i class=\"fa fa-archive\"></i> Si</a>";	

}

if( isset($_GET['search']) ){
$search=$_GET['search'];
echo "<a  href=\"article/not_arch.php?idut=".$cod_md5."&p_use=".$p_use."&idart=".$id_art."&search=".$search."&p=".$p."\" class=\"btn btn-warning  btn-mini\" id=\"archivio\">
       <i class=\"fa fa-archive\"></i> Si</a>";	
}

if( isset($_GET['nm_arch']) ){
$nmarch = $_GET['nm_arch'];
echo "<a  href=\"article/not_arch.php?idut=".$cod_md5."&p_use=".$p_use."&idart=".$id_art."&nm_arch=".$nmarch."&p=".$p."\" class=\"btn btn-warning  btn-mini\" id=\"archivio\">
       <i class=\"fa fa-archive\"></i> Si</a>";	
}
	
	
}
else{
echo "<a  href=\"article/not_arch.php?idut=".$cod_md5."&p_use=".$p_use."&idart=".$id_art."&p=".$p."\" class=\"btn btn-warning  btn-mini\" id=\"archivio\">
       <i class=\"fa fa-archive\"></i> Si</a>";		
}
}
else{
if( isset($_GET['st']) || isset($_GET['ct']) || isset($_GET['dt']) || isset($_GET['search']) || isset($_GET['nm_arch']) ){

if( isset($_GET['st']) ){
$st = 	$_GET['st'];
echo "<a  href=\"article/not_arch.php?idut=".$cod_md5."&p_use=".$p_use."&idart=".$id_art."&st=".$st."\" class=\"btn btn-warning  btn-mini\" id=\"archivio\">
        <i class=\"fa fa-archive\"></i> Si</a>";	
}
if( isset($_GET['ct']) ){
$ct = 	$_GET['ct'];
echo "<a  href=\"article/not_arch.php?idut=".$cod_md5."&p_use=".$p_use."&idart=".$id_art."&ct=".$ct."\" class=\"btn btn-warning  btn-mini\" id=\"archivio\">
         <i class=\"fa fa-archive\"></i> Si</a>";	
}
if( isset($_GET['dt']) ){
$dt = 	$_GET['dt'];
echo "<a  href=\"article/not_arch.php?idut=".$cod_md5."&p_use=".$p_use."&idart=".$id_art."&dt=".$dt."\" class=\"btn btn-warning  btn-mini\" id=\"archivio\">
        <i class=\"fa fa-archive\"></i> Si</a>";	
}
if( isset($_GET['search']) ){
$search=$_GET['search'];
echo "<a  href=\"article/not_arch.php?idut=".$cod_md5."&p_use=".$p_use."&idart=".$id_art."&search=".$search."\" class=\"btn btn-warning  btn-mini\" id=\"archivio\">
        <i class=\"fa fa-archive\"></i> Si</a>";	

}

if( isset($_GET['nm_arch']) ){
$nmarch=$_GET['nm_arch'];
echo "<a  href=\"article/not_arch.php?idut=".$cod_md5."&p_use=".$p_use."&idart=".$id_art."&nm_arch=".$nmarch."\" class=\"btn btn-warning  btn-mini\" id=\"archivio\">
        <i class=\"fa fa-archive\"></i> Si</a>";	

}

}
else{
echo "<a  href=\"article/not_arch.php?idut=".$cod_md5."&p_use=".$p_use."&idart=".$id_art."\" class=\"btn btn-warning  btn-mini\" id=\"archivio\">
       <i class=\"fa fa-archive\"></i> Si</a>";		
}	
}
}
else{
if( isset($_GET['p']) ){
$p = $_GET['p'];

if( isset($_GET['st']) || isset($_GET['ct']) || isset($_GET['dt']) || isset($_GET['search']) || isset($_GET['nm_arch']) ){
	
if( isset($_GET['st']) ){
$st = $_GET['st'];		
echo "<a href=\"article/arch.php?idut=".$cod_md5."&p_use=".$p_use."&idart=".$id_art."&st=".$st."&p=".$p."\" class=\"btn btn-success btn-mini\" id=\"archivio\">
       <i class=\"fa fa-archive\" ></i> No</a>";		
}
if( isset($_GET['ct']) ){
$ct = $_GET['ct'];		
echo "<a href=\"article/arch.php?idut=".$cod_md5."&p_use=".$p_use."&idart=".$id_art."&ct=".$ct."&p=".$p."\" class=\"btn btn-success btn-mini\" id=\"archivio\">
       <i class=\"fa fa-archive\" ></i> No</a>";		
}
if( isset($_GET['dt']) ){
$dt = $_GET['dt'];		
echo "<a href=\"article/arch.php?idut=".$cod_md5."&p_use=".$p_use."&idart=".$id_art."&dt=".$dt."&p=".$p."\" class=\"btn btn-success btn-mini\" id=\"archivio\">
      <i class=\"fa fa-archive\" ></i> No</a>";		
}
if( isset($_GET['search']) ){
$search=$_GET['search'];
echo "<a href=\"article/arch.php?idut=".$cod_md5."&p_use=".$p_use."&idart=".$id_art."&search=".$search."&p=".$p."\" class=\"btn btn-success btn-mini\" id=\"archivio\">
        <i class=\"fa fa-archive\" ></i> No</a>";		
	
}

if( isset($_GET['nm_arch']) ){
$nmarch = $_GET['nm_arch'];
echo "<a href=\"article/arch.php?idut=".$cod_md5."&p_use=".$p_use."&idart=".$id_art."&nm_arch=".$nmarch."&p=".$p."\" class=\"btn btn-success btn-mini\" id=\"archivio\">
        <i class=\"fa fa-archive\" ></i> No</a>";		
	
}

	
}
else{
echo "<a href=\"article/arch.php?idut=".$cod_md5."&p_use=".$p_use."&idart=".$id_art."&p=".$p."\" class=\"btn btn-success btn-mini\" id=\"archivio\">
      <i class=\"fa fa-archive\" ></i> No</a>";		
}


}
else{
if( isset($_GET['st']) || isset($_GET['ct']) || isset($_GET['dt']) || isset($_GET['search']) || isset($_GET['nm_arch']) ){

if( isset($_GET['st']) ){
$st = 	$_GET['st'];		
echo "<a href=\"article/arch.php?idut=".$cod_md5."&p_use=".$p_use."&idart=".$id_art."&st=".$st."\" class=\"btn btn-success btn-mini\" id=\"archivio\">
       <i class=\"fa fa-archive\" ></i> No</a>";		
}
if( isset($_GET['ct']) ){
$ct = 	$_GET['ct'];		
echo "<a href=\"article/arch.php?idut=".$cod_md5."&p_use=".$p_use."&idart=".$id_art."&ct=".$ct."\" class=\"btn btn-success btn-mini\" id=\"archivio\">
       <i class=\"fa fa-archive\" ></i> No</a>";		
}

if( isset($_GET['dt']) ){
$dt = $_GET['dt'];		
echo "<a href=\"article/arch.php?idut=".$cod_md5."&p_use=".$p_use."&idart=".$id_art."&dt=".$dt."\" class=\"btn btn-success btn-mini\" id=\"archivio\">
        <i class=\"fa fa-archive\" ></i> No</a>";		
}
if( isset($_GET['search']) ){
$search=$_GET['search'];
echo "<a href=\"article/arch.php?idut=".$cod_md5."&p_use=".$p_use."&idart=".$id_art."&search=".$search."\" class=\"btn btn-success btn-mini\" id=\"archivio\">
       <i class=\"fa fa-archive\" ></i> No</a>";		
	
}

if( isset($_GET['nm_arch']) ){
$nmarch=$_GET['nm_arch'];
echo "<a href=\"article/arch.php?idut=".$cod_md5."&p_use=".$p_use."&idart=".$id_art."&nm_arch=".$nmarch."\" class=\"btn btn-success btn-mini\" id=\"archivio\">
       <i class=\"fa fa-archive\" ></i> No</a>";		
	
}


}
else{
echo "<a href=\"article/arch.php?idut=".$cod_md5."&p_use=".$p_use."&idart=".$id_art."\" class=\"btn btn-success btn-mini\" id=\"archivio\">
        <i class=\"fa fa-archive\" ></i> No</a>";	
}	
	
	
}	
}

?>
