<ul class="nav nav-tabs" id="myTab">
  <li class="active"><a href="#commenti"><b>Commenti</b></a></li>
  <li><a href="#bann"><b>E-Mail Bannate</b></a></li>
 </ul>

<div class="tab-content">
<div class="tab-pane active" id="commenti">
  
<div class="row-fluid">
<div class="span12">
<div class="table-responsive">
<table class="table table-bordered table-striped table-hover">
<?php
$sql_comment = " SELECT idart FROM comment ";			   
$rs_comment = @mysqli_query($myconn,$sql_comment) or die( "Errore....".mysqli_error($myconn) );
$rw_comment = $rs_comment->num_rows;

if( $rw_comment==0 ){
echo "<tr><td><p>Nessun Commento</p></td></tr>";	
}
else{
	
$array_idart = array();

while($row_comment = mysqli_fetch_array($rs_comment)){
$idart = 	$row_comment['idart'];
array_push($array_idart,"'".$idart."'");
}
$sql_art_comm ="select * from articoli where idart = ".implode(" or idart = ", $array_idart);
$rs_art_comm =  @mysqli_query($myconn,$sql_art_comm) or die( "Errore....".mysqli_error($myconn) );

while($row_art_comm = mysqli_fetch_array($rs_art_comm)){
$titart = $row_art_comm['titart'];
$idart = $row_art_comm['idart'];

echo "<tr><td colspan=\"9\"><h4>=> <a href=\"/administrator/?idut=".$cod_md5."&mod_art=".$idart."\">".ucwords($titart)."</a></h4></td></tr>";
echo "<tr class=\"success\">
      <td><b>n°</b></td>
      <td style=\"width:40%;\"><b>Commenti</b></td>
	  <td><b>Data e Ora</b></td>
	  <td><b>E-Mail</b></td>
	  <td style=\"text-align:center\"><b>Banna</b></td>
	  <td><b>Username</b></td>
	  <td><b>Stato</b></td>
	  <td><b>Elimina</b></td>	
      </tr>";

$sql_comment_art = " SELECT * FROM comment WHERE idart = '$idart' ";
$rs_comment_art = @mysqli_query($myconn,$sql_comment_art) or die( "Errore....".mysqli_error($myconn) );
$n = 0;
while($row_comment_art = mysqli_fetch_array($rs_comment_art)){
$n = $n +1;	
$id_comment = $row_comment_art['id_comment'];	
$cont_comment = $row_comment_art['cont_comment'];
$data_ora = $row_comment_art['data_ora'];
$email_utente = $row_comment_art['email_utente'];
$nome_utente = $row_comment_art['nome_utente'];
$st_comment = $row_comment_art['st_comment'];

$sql_email_bann = "select * from email_bann_comm where email_bann = '$email_utente'";
$rs_email_bann = @mysqli_query($myconn,$sql_email_bann) or die( "Errore....".mysqli_error($myconn) );
$row_email_bann = $rs_email_bann->num_rows;

echo "<tr><td><b>".$n."</b></td>
       <td>".$cont_comment."</td>
	   <td>".$data_ora."</td>
       <td>".$email_utente."</td>";

if($row_email_bann==0){
echo  "<td style=\"text-align:center\"><a href=\"/administrator/article/comment/bann.php?bann_mail=".$email_utente."&idut=".$cod_md5."\" style=\"color:green;\"><i class=\"fa fa-unlock\"></i></a></td>";
}	
else{
echo  "<td style=\"text-align:center\"><a href=\"/administrator/article/comment/no_bann.php?bann_mail=".$email_utente."&idut=".$cod_md5."\" style=\"color:red;\"><i class=\"fa fa-lock\"></i></a></td>";
}   
echo  "<td>".$nome_utente."</td>
	   <td style=\"text-align:center\">".act($st_comment,$cod_md5,$id_comment)."</td>
	   <td style=\"text-align:center\"><a href=\"\" class=\"del_comment\" id=\"".$id_comment."\"><i class=\"fa fa-trash\"></i></a></td>
	   </tr>";
}	
echo "<tr><td colspan=\"9\"><a href=\"#reply\" id=\"reply_comm\" class=\"".$idart."\" data-toggle=\"modal\"><i class=\"fa fa-share\"></i> Rispondi</a></td></tr>";
echo "<tr><td colspan=\"9\"></td></tr>";
}	
	
}



?>
</table>
</div>
</div>
</div>
  
  
</div>
<div class="tab-pane" id="bann">
<div class="row-fluid">
<div class="span6">

<div class="table-responsive">
<table class="table table-bordered table-striped table-hover">
<?php
$sql_all_email_bann = "select * from email_bann_comm ";
$rs_all_email_bann = @mysqli_query($myconn,$sql_all_email_bann) or die( "Errore....".mysqli_error($myconn) );
$row_all_email_bann = $rs_all_email_bann->num_rows;

if( $row_all_email_bann==0 ){
echo "<tr><td colspan=\"3\"><a href=\"#add_mail\" data-toggle=\"modal\" id=\"addmail\"><i class=\"fa fa-plus-square-o\"></i> Aggiungi</a></td></tr>";	
echo "<tr><td colspan=\"3\"><p class=\"text-info\">Non ci sono e-mail bannate.</p></td></tr>";	


}
else{
?>
<tr><td colspan="3"><a href="#add_mail" data-toggle="modal" id="addmail"><i class="fa fa-plus-square-o"></i> Aggiungi</a></td></tr>
<tr class="success"><td><b>#</b></td><td><b>E-Mail</b></td><td><b>Stato</b></td></tr>
<?php

$num_emal_bann = 0;	
while( $row_mail_bann = mysqli_fetch_array($rs_all_email_bann) ){
$num_emal_bann = $num_emal_bann + 1;	
$mail_bann = $row_mail_bann['email_bann'];
echo "<tr><td>".$num_emal_bann."</td><td>".$mail_bann."</td><td><a href=\"/administrator/article/comment/no_bann.php?bann_mail=".$mail_bann."&idut=".$cod_md5."\" style=\"color:red;\"><i class=\"fa fa-lock\"></i></a></td></tr>";
}	
}
?>
</table>
</div>
</div>
</div> 
</div>
</div>

<!-- Modal Reply -->
<div id="reply" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h3 id="myModalLabel"><i class="fa fa-share"></i> Rispondi</h3>
</div>
<div class="modal-body">
<p></p>
</div>
</div>
<!-- Modal Reply-->



<!-- Modal ADD E-Mail -->
<div id="add_mail" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h3 id="myModalLabel">Aggiungi E-Mail a Bannati</h3>
</div>
<div class="modal-body">
<p></p>
</div>
</div>
<!-- Modal ADD E-Mail -->


