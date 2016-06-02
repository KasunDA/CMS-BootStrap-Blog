<?php
function check_user($password,$username, $rs) {
 while ( $row = mysqli_fetch_array($rs) ) {
         $pw = $row['password'];
         $us = $row['username'];
      if ( $password == $pw && $username== $us) {
       return 0;
     }
}
return 1;
};

function dataIT ($data){
$data_new = explode("-",$data);
$data_it = $data_new[2]."/".$data_new[1]."/".$data_new[0] ;      
return $data_it;    
};


function dataAm ($data){
$data_new = explode("/",$data);
$data_am = $data_new[2]."-".$data_new[1]."-".$data_new[0] ;
return $data_am;
    
};


function alias($str){
$delimiters = array("'" ,"/", " ", ":" ,"/" ,"|" , ",");
$caratteri_accentati = array('é','è','ì','ò','à','ù','&');
$caratteri_non_accentati = array('e','e','i','o','a','u','e');
$str = str_ireplace($caratteri_accentati,$caratteri_non_accentati,$str);

$ready = str_replace($delimiters, $delimiters[0], $str);
$launch = explode($delimiters[0], $ready);

$num_el = count($launch);
$new_str = NULL;

for($i=0;$i<$num_el;$i++){

if($num_el>=2){
if($i==0 || $i<=($num_el-2) ){

$new_str.=strtolower($launch[$i]."-");    

} else{
$new_str.= strtolower($launch[($num_el-1)]);
} 	
}
else{
$new_str.= strtolower($launch[($num_el-1)]);	
}

}

return $new_str;
};


function ver_alias($alias_cat , $myconn){
$sql = " SELECT * FROM articoli WHERE alias = '$alias_cat' " ;
$rs = @mysqli_query($myconn,$sql) or die( "Errore....".mysqli_error($myconn) );
$row = $rs->num_rows;

if($row != 0){
return false;	
}
else{
return true;	
}	

};

function mark ($str,$term){
$term = $_GET['search'];
	
if( stristr( $str, $term ) ) {
$mark = "<mark>".$term."</mark>";	
	
$str_n = str_ireplace($term,strtolower($mark),$str );	
	
return $str_n;		
}		
};

function ultimo_accesso ( $dname, $mname ){
$dayname = NULL;
$monthname = NULL;


/* Conversione giorno in italiano */	
if( $dname=="Mon" ){ $dayname="Lunedì"; }	
if( $dname=="Tue" ){ $dayname="Martedì"; }	
if( $dname=="Wed" ){ $dayname="Mercoledì"; }	
if( $dname=="Thu" ){ $dayname="Giovedì"; }
if( $dname=="Fri" ){ $dayname="Venerdì"; }
if( $dname=="Sat" ){ $dayname="Sabato"; }
if( $dname=="Sun" ){ $dayname="Domenica"; }

/* Conversione mese in italiano */	
if( $mname=="Jan" ){ $monthname="Gennaio"; }
if( $mname=="Feb" ){ $monthname="Febbraio"; }
if( $mname=="Mar" ){ $monthname="Marzo"; }
if( $mname=="Apr" ){ $monthname="Aprile"; }
if( $mname=="May" ){ $monthname="Maggio"; }
if( $mname=="Jun" ){ $monthname="Giugno"; }
if( $mname=="Jul" ){ $monthname="Luglio"; }
if( $mname=="Aug" ){ $monthname="Agosto"; }
if( $mname=="Sep" ){ $monthname="Settembre"; }
if( $mname=="Oct" ){ $monthname="Ottobre"; }
if( $mname=="Nov" ){ $monthname="Novembre"; }
if( $mname=="Dec" ){ $monthname="Dicembre"; }

$ult_acc = $dayname.",&nbsp;".date("d")."&nbsp;".$monthname."&nbsp;".date("Y")."&nbsp;".date("H:i:s");

return $ult_acc;
};

function alias_type_admin ($text) {
$textmin = strtolower($text);
$alias_type_admin = str_replace(" ","_",$textmin);	
return $alias_type_admin;	
	
}


function arch ( $val1, $val2 ) {
$archivio = NULL;
if( $val1=="01" ){
$archivio = "Gennaio ".$val2;	
}	
if( $val1=="02" ){
$archivio = "Febbraio ".$val2;	
}	
if( $val1=="03" ){
$archivio = "Marzo ".$val2;	
}
if( $val1=="04" ){
$archivio = "Aprile ".$val2;	
}	
if( $val1=="05" ){
$archivio = "Maggio ".$val2;	
}
if( $val1=="06" ){
$archivio = "Giugno ".$val2;	
}
if( $val1=="07" ){
$archivio = "Luglio ".$val2;	
}
if( $val1=="08" ){
$archivio = "Agosto ".$val2;	
}
if( $val1=="09" ){
$archivio = "Settembre ".$val2;	
}
if( $val1=="10" ){
$archivio = "Ottobre ".$val2;	
}
if( $val1=="11" ){
$archivio = "Novembre ".$val2;	
}	
if( $val1=="12" ){
$archivio = "Dicembre ".$val2;	
}

return $archivio;
};

function control_arch ($obj1,$obj2,$obj3) {	
while( $obj2 ){
$obj4 = $obj2[$obj3];
if( $obj1==$obj4 ){	
	return true;
}
else{ return false; }
}		
};


function datacreate ( $data ) {
$datacreate=NULL;
$array = explode("-",$data);
$gg = $array[2];$mm=$array[1];$aaaa=$array[0];

if( $mm=="01" ){
$datacreate = $gg." Gennaio ".$aaaa;	
}	
if( $mm=="02" ){
$datacreate = $gg." Febbraio ".$aaaa;
}	
if( $mm=="03" ){
$datacreate = $gg." Marzo ".$aaaa;
}
if( $mm=="04" ){
$datacreate = $gg." Aprile ".$aaaa;
}	
if( $mm=="05" ){
$datacreate = $gg." Maggio ".$aaaa;	
}
if( $mm=="06" ){
$datacreate = $gg." Giugno ".$aaaa;	
}
if( $mm=="07" ){
$datacreate = $gg." Luglio ".$aaaa;	
}
if( $mm=="08" ){
$datacreate = $gg." Agosto ".$aaaa;	
}
if( $mm=="09" ){
$datacreate = $gg." Settembre ".$aaaa;	
}
if( $mm=="10" ){
$datacreate = $gg." Ottobre ".$aaaa;		
}
if( $mm=="11" ){
$datacreate = $gg." Novembre ".$aaaa;	
}	
if( $mm=="12" ){
$datacreate = $gg." Dicembre ".$aaaa;	
}

return $datacreate;

};

function cont_article ($cont_article,$alias_article) {
$arraycont_article = explode(" ", strip_tags($cont_article,"<img><p>")  );
$arraycont_article = preg_replace('/class=".*?"/', '', $arraycont_article );
$arraynewcont_article = array();	
	
if( count($arraycont_article)>80 ){
for( $i=0;$i<=80;$i++ ){	
$arraynewcont_article[$i]=$arraycont_article[$i];	
}

$cont_article =  implode(" ",$arraynewcont_article);
$p_open = substr_count($cont_article , "<p>");
$p_open_s = substr_count($cont_article , "<p >");

$p_closed = substr_count( $cont_article, "</p>");
$diff = ($p_open+$p_open_s)-$p_closed;


if( !isset($_GET['p_use']) ){
if( $diff==0 ){
$arraynewcont_article[81]="[...]<div class=\"row-fluid\"><div class=\"span12\"><ul class=\"inline\"><li><a href=\"/article/go.php?p_use=".$alias_article."\">Continua a leggere..</a></li></ul></div></div>";
}
else{
$arraynewcont_article[81]="[...]</p><div class=\"row-fluid\"><div class=\"span12\"><ul class=\"inline\"><li><a href=\"/article/go.php?p_use=".$alias_article."\">Continua a leggere..</a></li></ul></div></div>";
}
}
else{
$p_use = $_GET['p_use'];
if( $diff==0 ){
$arraynewcont_article[81]="[...]<div class=\"row-fluid\"><div class=\"span12\"><ul class=\"inline\"><li><a href=\"/article/go.php?p_use=".$p_use."&alias_art=".$alias_article."\">Continua a leggere..</a></li></ul></div></div>";
}
else{
$arraynewcont_article[81]="[...]</p><div class=\"row-fluid\"><div class=\"span12\"><ul class=\"inline\"><li><a href=\"/article/go.php?p_use=".$p_use."&alias_art=".$alias_article."\">Continua a leggere..</a></li></ul></div></div>";
}	
}
$newcont_article =  implode(" ",$arraynewcont_article);
return $newcont_article;
		
}
else{
for( $i=0;$i<count($arraycont_article);$i++ ){	
$arraynewcont_article[$i] = $arraycont_article[$i];	
}
$newcont_article =  implode(" ",$arraynewcont_article);
return $newcont_article;	
}	
};

function cont_article_arch ($cont_article) {
$arraycont_article = explode(" ",strip_tags($cont_article,"<p>"));
$arraycont_article = preg_replace('/class=".*?"/', '', $arraycont_article );
$arraynewcont_article = array();
	
if( count($arraycont_article)>40 ){

for( $i=0;$i<=40;$i++ ){	
$arraynewcont_article[$i]=$arraycont_article[$i];	
}

$cont_article =  implode(" ",$arraynewcont_article);
$p_open = substr_count($cont_article , "<p>");
$p_open_s = substr_count($cont_article , "<p >");
$p_closed = substr_count( $cont_article, "</p>");
$diff = ($p_open+$p_open_s)-$p_closed;

if( $diff==0 ){
$arraynewcont_article[41]=" [.....]";	
}
else{
$arraynewcont_article[41]=" [.....]</p>";		
}

$newcont_article =  implode(" ",$arraynewcont_article);
return $newcont_article;
		
}
else{
for( $i=0;$i<count($arraycont_article);$i++ ){	
$arraynewcont_article[$i] = $arraycont_article[$i];	
}
$newcont_article =  implode(" ",$arraynewcont_article);
return $newcont_article;	
}	
};



function dtcr($val1,$val2){
$dtcrarch = NULL;

if( $val1=="Gennaio" ){
$dtcrarch = $val2."-01";	
}	
if( $val1=="Febbraio" ){
$dtcrarch = $val2."-02";	
}	
if( $val1=="Marzo" ){
$dtcrarch = $val2."-03";	
}
if( $val1=="Aprile" ){
$dtcrarch = $val2."-04";	
}	
if( $val1=="Maggio" ){
$dtcrarch = $val2."-05";	
}
if( $val1=="Giugno" ){
$dtcrarch = $val2."-06";	
}
if( $val1=="Luglio" ){
$dtcrarch = $val2."-07";	
}
if( $val1=="Agosto" ){
$dtcrarch = $val2."-08";	
}
if( $val1=="Settembre" ){
$dtcrarch = $val2."-09";	
}
if( $val1=="Ottobre" ){
$dtcrarch = $val2."-10";	
}
if( $val1=="Novembre" ){
$dtcrarch = $val2."-11";	
}	
if( $val1=="Dicembre" ){
$dtcrarch = $val2."-12";	
}	
	
return $dtcrarch;		
};


function explodep_use($obj){
$explodep_use = NULL;
$arrayexplodep_use = explode("-",$obj);
$explodep_use = implode(" ",$arrayexplodep_use);	
return $explodep_use;		
};

function search_query($str,$query){
$strlen_query = strlen($query);
$pos = stripos($str,$query);
if( strlen($pos)!=0 ){		
$newstr = NULL;		
$query_str = substr($str,$pos,$strlen_query);
$query_str_b =  "<mark>".substr($str,$pos,$strlen_query)."</mark>";
$newstr = str_ireplace($query_str , $query_str_b , $str);
return $newstr;		
}
else{
return $str;
}	
};



function cont_article_search ($cont_article) {
$arraycont_article = explode(" ",$cont_article);
$arraynewcont_article = array();	
	
if( count($arraycont_article)>35 ){
for( $i=0;$i<=35;$i++ ){	
$arraynewcont_article[$i]=$arraycont_article[$i];	
}
$arraynewcont_article[36]=" <strong>[.....]</strong>";
$newcont_article =  implode(" ",$arraynewcont_article);
return $newcont_article;
		
}
else{
for( $i=0;$i<count($arraycont_article);$i++ ){	
$arraynewcont_article[$i] = $arraycont_article[$i];	
}
$newcont_article =  implode(" ",$arraynewcont_article);
return $newcont_article;	
}	
};


function isValidUrl ($p_use , $myconn){	

$sql_alias_art_vis_arch = "select alias from articoli where alias ='$p_use' and visibility = \"Si\" and archiviato = \"Si\"";
$rs_alias_art_vis_arch = @mysqli_query($myconn,$sql_alias_art_vis_arch) or die( "Errore....".mysqli_error($myconn) );
$num_alias_art_vis_arch = $rs_alias_art_vis_arch->num_rows;

$sql_alias_art_vis_no_arch = "select alias from articoli where alias ='$p_use' and visibility = \"Si\" and archiviato = \"No\"";
$rs_alias_art_vis_no_arch = @mysqli_query($myconn,$sql_alias_art_vis_no_arch) or die( "Errore....".mysqli_error($myconn) );
$num_alias_art_vis_no_arch = $rs_alias_art_vis_no_arch->num_rows;

$sql_alias_categoria = " SELECT alias_categoria FROM categorie WHERE alias_categoria='$p_use' ";
$rs_alias_categoria = @mysqli_query($myconn,$sql_alias_categoria) or die( "Errore....".mysqli_error($myconn) );
$num_alias_categoria = $rs_alias_categoria->num_rows;

$sql_archivio = " select nome_archivio from archivio where nome_archivio='$p_use' ";
$rs_archivio = 	@mysqli_query($myconn,$sql_archivio) or die( "Errore....".mysqli_error($myconn) );
$num_archivio = $rs_archivio->num_rows;


	
if( $num_alias_art_vis_no_arch!=0 || 
    $num_archivio ||  
	$num_alias_categoria!=0 || 
	$num_alias_art_vis_arch!=0 ||
	$p_use=="all_article" || 
	$p_use=="archivie" || 
	$p_use=="search"){
return true;
}
else{
return false;
}	



};


function url_comm ( $url , $alias ){
$url = NULL;
if( !isset($_GET['p_use']) && !isset($_GET['alias_art'])  && !isset($_GET['t_arch'])  && !isset($_GET['art_arch']) ){
$url = "/".$alias.".html#all_comm";	
}
else{
if( isset($_GET['p_use']) && !isset($_GET['alias_art'])  && !isset($_GET['t_arch'])  && !isset($_GET['art_arch']) ){
if( $_GET['p_use'] == $alias ){
$url = "/".$alias.".html#all_comm";		
}
else{
$url = "/".$_GET['p_use']."/".$alias.".html#all_comm";	
}	
}
if( isset($_GET['p_use']) &&   isset($_GET['alias_art']) ){
$url = "/".$_GET['p_use']."/".$_GET['alias_art'].".html#all_comm";		
}	

if( isset($_GET['p_use'])  && isset($_GET['t_arch']) && isset($_GET['art_arch']) ){
$url = "/".$_GET['p_use']."/".$_GET['t_arch']."/".$_GET['art_arch'].".htm#all_comm";	
}	
}

return $url;	
	
};

function act ($str,$cod_md5,$id_comm){
$newstr = NULL;	
if( $str == "enabled" ){
$newstr = "<a href=\"/administrator/article/comment/no_active_comm.php?idut=".$cod_md5."&id_comm=".$id_comm."\" style=\"color:green\"><i class=\"fa fa-eye\"></i></a>";	
}
else{
$newstr = "<a href=\"/administrator/article/comment/active_comm.php?idut=".$cod_md5."&id_comm=".$id_comm."\" style=\"color:red\"><i class=\"fa fa-eye-slash\"></i></a>";	
}
return $newstr;	
};





?>