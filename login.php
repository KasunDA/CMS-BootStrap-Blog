<?php

if(file_exists("installazione")){
	header("Location: ../installazione/index.php");
	exit;
}

$ncookie = "test";
$vcookie = "ok";
$dcookie = time()+24*3600;
setcookie($ncookie,$vcookie,$dcookie);
?>
<html lang="it">
<head>
<title>CMS Bootstrap Blog - Login</title>
<meta charset="utf-8">    
 <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
<link href="../assets/css/bootstrap.css" rel="stylesheet">   
<link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">	 
   <link rel="stylesheet" href="../fontawesome/font-awesome/css/font-awesome.min.css">
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
		background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
		
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 15px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }
 
    </style>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
<div class="container">

      <form class="form-signin" action="control_login.php" method="post">
        <?php
        if( isset($_GET['error']) && !is_null($_GET['error']) && $_GET['error']=="lg"){
        
        echo "
        <div class=\"alert alert-error\">
        <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
        <strong>Username</strong>&nbsp;e&nbsp;<strong>Password</strong> non&nbsp;corretti.
        </div>  
        ";
        
        }
        if( isset($_GET['error']) && !is_null($_GET['error']) && $_GET['error']=="cook"){
            
        echo "
        <div class=\"alert alert-error\">
        <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
         Hai i <strong>cookie</strong> disabilitati.
        </div>  
        ";   
            
        }
        
           if( isset($_GET['error']) && !is_null($_GET['error']) && $_GET['error']=="not_view"){
            
        echo "
        <div class=\"alert\">
        <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
        <strong>Errore!</strong> Devi effettuare il login.
        </div>  
        ";   
            
        }
        
       if( isset($_GET['error']) && !is_null($_GET['error']) && $_GET['error']=="new_log"){
            
        echo "
        <div class=\"alert alert-success\">
        <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
		<i class=\"fa fa-info-circle\"></i>
         Hai modificato I tuoi <strong>dati di accesso</strong>, pertanto devi rieffettuare il login per continuare.
        </div>  
        ";         		
        }
        
        ?>
        <h4 class="form-signin-heading">CMS&nbsp;Bootstrap&nbsp;Blog&nbsp;<i class="fa fa-lock"></i><br>
		<small>Content Management System&nbsp;</small></h4>
        <input type="text" class="input-block-level" placeholder="Username" name="user">
        <input type="password" class="input-block-level" placeholder="Password" name="password">
        <p><a href="#reclogin" data-toggle="modal" id="rec_login">Hai dimenticato i dati di accesso?</a></p>
        <button class="btn btn-large btn-primary" type="submit">Entra</button>
      </form>

    </div> <!-- /container -->

<div id="reclogin" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h4 id="myModalLabel">Recupera dati di accesso:</h4>
</div>
<div class="modal-body">   
</div>  
</div>



<script src="../assets/js/jquery.js"></script>
<script src="../assets/js/bootstrap.js"></script>
<script src="../assets/js/script.js"></script>


</body>
</html>
