<?php
if($view=="Si"){

if( isset($_GET['p']) ){
$p= $_GET['p'];

if( isset($_GET['st']) || isset($_GET['ct']) || isset($_GET['dt']) || isset($_GET['search']) || isset($_GET['nm_arch']) ){
	
if( isset($_GET['st']) ){	
$st = 	$_GET['st'];
echo "<a href=\"article/view.php?idut=".$cod_md5."&p_use=".$p_use."&idart=".$id_art."&st=".$st."&p=".$p."\" id=\"view\" class=\"btn btn-mini btn-success\">
<i class=\"icon-eye-open icon-white\"></i> 
</a>";  
}
if( isset($_GET['ct']) ){	
$ct = 	$_GET['ct'];
echo "<a href=\"article/view.php?idut=".$cod_md5."&p_use=".$p_use."&idart=".$id_art."&ct=".$ct."&p=".$p."\" id=\"view\" class=\"btn btn-mini btn-success\">
<i class=\"fa fa-eye\"></i> 
</a>";  
}
if( isset($_GET['dt']) ){	
$ct = 	$_GET['dt'];
echo "<a href=\"article/view.php?idut=".$cod_md5."&p_use=".$p_use."&idart=".$id_art."&dt=".$dt."&p=".$p."\" id=\"view\" class=\"btn btn-mini btn-success\">
<i class=\"fa fa-eye\"></i> 
</a>";  
}
if( isset($_GET['search']) ){
$search = $_GET['search'];
echo "<a href=\"article/view.php?idut=".$cod_md5."&p_use=".$p_use."&idart=".$id_art."&search=".$search."&p=".$p."\" id=\"view\" class=\"btn btn-mini btn-success\">
<i class=\"fa fa-eye\"></i> 
</a>";
}
if( isset($_GET['nm_arch']) ){
$nmarch = $_GET['nm_arch'];
echo "<a href=\"article/view.php?idut=".$cod_md5."&p_use=".$p_use."&idart=".$id_art."&nm_arch=".$nmarch."&p=".$p."\" id=\"view\" class=\"btn btn-mini btn-success\">
<i class=\"fa fa-eye\"></i> 
</a>";
}		
}
else{  	
echo "<a href=\"article/view.php?idut=".$cod_md5."&p_use=".$p_use."&idart=".$id_art."&p=".$p."\" id=\"view\" class=\"btn btn-mini btn-success\">
<i class=\"fa fa-eye\"></i> 
</a>";  
}	
}
else{

if( isset($_GET['st']) || isset($_GET['ct']) || isset($_GET['dt']) || isset($_GET['search']) || isset($_GET['nm_arch'])){

if( isset($_GET['st']) ){	
$st = 	$_GET['st'];
echo "<a href=\"article/view.php?idut=$cod_md5&p_use=".$p_use."&idart=".$id_art."&st=".$st."\" id=\"view\" class=\"btn btn-mini btn-success\">
<i class=\"fa fa-eye\"></i> 
</a>";  
}	

if( isset($_GET['ct']) ){	
$ct = 	$_GET['ct'];
echo "<a href=\"article/view.php?idut=$cod_md5&p_use=".$p_use."&idart=".$id_art."&ct=".$ct."\" id=\"view\" class=\"btn btn-mini btn-success\">
<i class=\"fa fa-eye\"></i> 
</a>";  
}

if( isset($_GET['dt']) ){	
$dt = 	$_GET['dt'];
echo "<a href=\"article/view.php?idut=$cod_md5&p_use=".$p_use."&idart=".$id_art."&dt=".$dt."\" id=\"view\" class=\"btn btn-mini btn-success\">
<i class=\"fa fa-eye\"></i> 
</a>";  
}

if( isset($_GET['search']) ){
$search = $_GET['search'];
echo "<a href=\"article/view.php?idut=".$cod_md5."&p_use=".$p_use."&idart=".$id_art."&search=".$search."\" id=\"view\" class=\"btn btn-mini btn-success\">
<i class=\"fa fa-eye\"></i> 
</a>";
}	

if( isset($_GET['nm_arch']) ){
$nmarch = $_GET['nm_arch'];
echo "<a href=\"article/view.php?idut=".$cod_md5."&p_use=".$p_use."&idart=".$id_art."&nm_arch=".$nmarch."\" id=\"view\" class=\"btn btn-mini btn-success\">
<i class=\"fa fa-eye\"></i> 
</a>";
}
}

else{  	
echo "<a href=\"article/view.php?idut=$cod_md5&p_use=".$p_use."&idart=".$id_art."\" id=\"view\" class=\"btn btn-mini btn-success\">
<i class=\"fa fa-eye\"></i> 
</a>";  
}


}

}
else{
if( isset($_GET['p']) ){
$p= $_GET['p'];

if( isset($_GET['st']) || isset($_GET['ct']) || isset($_GET['dt']) || isset($_GET['search']) || isset($_GET['nm_arch']) ){

if( isset($_GET['st']) ){	
$st = 	$_GET['st'];
echo "<a href=\"article/not_view.php?idut=".$cod_md5."&p_use=".$p_use."&idart=".$id_art."&st=".$st."&p=".$p."\" id=\"not_view\" class=\"btn btn-mini btn-danger\">
    <i class=\"fa fa-eye-slash\"></i> 
    </a>";
}

if( isset($_GET['ct']) ){	
$ct = 	$_GET['ct'];
echo "<a href=\"article/not_view.php?idut=".$cod_md5."&p_use=".$p_use."&idart=".$id_art."&ct=".$ct."&p=".$p."\" id=\"not_view\" class=\"btn btn-mini btn-danger\">
    <i class=\"fa fa-eye-slash\"></i> 
    </a>";
}

if( isset($_GET['dt']) ){	
$dt = $_GET['dt'];
echo "<a href=\"article/not_view.php?idut=".$cod_md5."&p_use=".$p_use."&idart=".$id_art."&dt=".$dt."&p=".$p."\" id=\"not_view\" class=\"btn btn-mini btn-danger\">
    <i class=\"fa fa-eye-slash\"></i> 
    </a>";
}

if( isset($_GET['search']) ){
$search = $_GET['search'];	
echo "<a href=\"article/not_view.php?idut=".$cod_md5."&p_use=".$p_use."&idart=".$id_art."&search=".$search."&p=".$p."\" id=\"not_view\" class=\"btn btn-mini btn-danger\">
    <i class=\"fa fa-eye-slash\"></i> 
    </a>";
}

if( isset($_GET['nm_arch']) ){
$nmarch = $_GET['nm_arch'];	
echo "<a href=\"article/not_view.php?idut=".$cod_md5."&p_use=".$p_use."&idart=".$id_art."&nm_arch=".$nmarch."&p=".$p."\" id=\"not_view\" class=\"btn btn-mini btn-danger\">
    <i class=\"fa fa-eye-slash\"></i> 
    </a>";
}


}

else{
echo "<a href=\"article/not_view.php?idut=".$cod_md5."&p_use=".$p_use."&idart=".$id_art."&p=".$p."\" id=\"not_view\" class=\"btn btn-mini btn-danger\">
<i class=\"fa fa-eye-slash\"></i> 
</a>";
} 


}
else{
if( isset($_GET['st']) || isset($_GET['ct']) || isset($_GET['dt']) || isset($_GET['search']) || isset($_GET['nm_arch']) ){
if( isset($_GET['st']) ){	
$st = 	$_GET['st'];
echo "<a href=\"article/not_view.php?idut=".$cod_md5."&p_use=".$p_use."&idart=".$id_art."&st=".$st."\" id=\"not_view\" class=\"btn btn-mini btn-danger\">
    <i class=\"fa fa-eye-slash\"></i> 
    </a>";
}	
if( isset($_GET['ct']) ){	
$ct = 	$_GET['ct'];
echo "<a href=\"article/not_view.php?idut=".$cod_md5."&p_use=".$p_use."&idart=".$id_art."&ct=".$ct."\" id=\"not_view\" class=\"btn btn-mini btn-danger\">
    <i class=\"fa fa-eye-slash\"></i> 
    </a>";
}

if( isset($_GET['dt']) ){	
$dt = 	$_GET['dt'];
echo "<a href=\"article/not_view.php?idut=".$cod_md5."&p_use=".$p_use."&idart=".$id_art."&dt=".$dt."\" id=\"not_view\" class=\"btn btn-mini btn-danger\">
    <i class=\"fa fa-eye-slash\"></i> 
    </a>";
}

if( isset($_GET['search']) ){
$search = $_GET['search'];
echo "<a href=\"article/not_view.php?idut=".$cod_md5."&p_use=".$p_use."&idart=".$id_art."&search=".$search."\" id=\"not_view\" class=\"btn btn-mini btn-danger\">
    <i class=\"fa fa-eye-slash\"></i> 
    </a>";	
}

if( isset($_GET['nm_arch']) ){
$nmarch = $_GET['nm_arch'];
echo "<a href=\"article/not_view.php?idut=".$cod_md5."&p_use=".$p_use."&idart=".$id_art."&nm_arch=".$nmarch."\" id=\"not_view\" class=\"btn btn-mini btn-danger\">
    <i class=\"fa fa-eye-slash\"></i> 
    </a>";	
}


}

else{
echo "<a href=\"article/not_view.php?idut=".$cod_md5."&p_use=".$p_use."&idart=".$id_art."\" id=\"not_view\" class=\"btn btn-mini btn-danger\">
<i class=\"fa fa-eye-slash\"></i> 
</a>";
}


}
}
?>
