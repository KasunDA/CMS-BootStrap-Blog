<div class="navbar navbar-inverse">
<div class="navbar-inner">
<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>

</button>
<a class="brand" href="../administrator/?idut=<?php echo $cod_md5; ?>">
<i class="fa fa-home"></i>
</a>

<div class="nav-collapse collapse">

<ul class="nav">
<li class="dropdown">

<a href="#" class="dropdown-toggle" data-toggle="dropdown">Contenuti
<b class="caret"></b>
</a>

<ul class="dropdown-menu">
<li><a href="../administrator/?idut=<?php echo $cod_md5; ?>&p_use=all_article">Articoli</a></li>
<li><a href="../administrator/?idut=<?php echo $cod_md5?>&new_article">Nuovo Articolo</a></li>
<li><a href="../administrator/?idut=<?php echo $cod_md5?>&comment">Commenti</a></li>
<li class="divider"></li>
<li><a href="../administrator/?idut=<?php echo $cod_md5; ?>&category=all">Categorie</a></li>
<li><a href="../administrator/?idut=<?php echo $cod_md5; ?>&new_category">Nuova Categoria</a></li>	
</ul>

</li>

<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">Utenti
<b class="caret"></b>
</a>
<ul class="dropdown-menu">
<li><a href="../administrator/?idut=<?php echo $cod_md5; ?>&users=all_users">Gestione Utenti</a></li>
<li><a href="../administrator/?idut=<?php echo $cod_md5; ?>&new_users">Nuovo Utente</a></li>
<li><a href="../administrator/?idut=<?php echo $cod_md5; ?>&send_email">Invia E-Mail Utenti</a></li>

</ul>
</li>


<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">Menù
<b class="caret"></b>
</a>
<ul class="dropdown-menu">
<li><a href="../administrator/?idut=<?php echo $cod_md5; ?>&menu=top-menu">Gestione Menù</a></li>
</ul>
</li>

<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">Template
<b class="caret"></b>
</a>
<ul class="dropdown-menu">
<li><a href="../administrator/?idut=<?php echo $cod_md5; ?>&template=all_themes">Gestione Template</a></li>
</ul>
</li>


<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">Immagini
<b class="caret"></b>
</a>
<ul class="dropdown-menu">
<li><a href="../administrator/?idut=<?php echo $cod_md5; ?>&images">Gestione Immagini</a></li>
</ul>
</li>




<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">Impostazioni
<b class="caret"></b>
</a>
<ul class="dropdown-menu">
<li><a href="../administrator/?idut=<?php echo $cod_md5; ?>&setting=all_config">Configurazione</a></li>
</ul>
</li>

</ul>




<ul class="nav pull-right">
  <li><a href="/" title="Vai al Sito" target="_blank"><i class="fa fa-globe"></i></a></li>
  <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	<i class="fa fa-male"></i>
	<b class="caret"></b>
    </a>
    <ul class="dropdown-menu">
    <li><a href="../administrator/?idut=<?php echo $cod_md5; ?>&profile_use" class="profile_use">Ciao <strong><?php echo $user;?></strong></a></li>	
    <li><a href="../logaut.php?idut=<?php echo $cod_md5; ?>">Esci</a></li>	
    </ul>
  </li>
</ul>


</div><!--/.nav-collapse -->
</div><!-- /.navbar-inner -->
</div><!-- /.navbar -->


