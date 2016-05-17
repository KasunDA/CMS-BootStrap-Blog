<?php
require_once('../connect.php');
$myconn = @mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME);

if ( mysqli_connect_errno() )
  {
 echo "<p class=\"text-error\"><strong>
         <i class=\"fa fa-exclamation-triangle\"></i>
         Connessione al database rifiutata!
		 </strong> Controlla che 
		 <strong><em>Host</em></strong>, 
		 <strong><em>Database</em></strong>, 
		 <strong><em>Utente</em></strong> e 
		 <strong><em>Password</em></strong> 
		 forniti dal server siano corretti, 
		 <a href=\"../installazione/index.php\">Aggiorna e riprova</a></p>";
   exit;
 
  }
  else{
 

@mysqli_query($myconn," SET names 'UTF8' ");

if( isset($_GET['nuser']) &&  
    isset($_GET['cnuser'])  &&  
	isset($_GET['emailuser']) &&
	isset($_GET['user']) &&
	isset($_GET['pass_user'])
	
	){
		
$name_user = $_GET['nuser'];
$cname_user = $_GET['cnuser'];
$email_user = $_GET['emailuser'];
$user = $_GET['user'];
$pass_user = $_GET['pass_user'];		
$cod_md5 = md5($user);	
$login = "on";	
$tipo_utente = "Amministratore";
	}
	
/* TABLE admin */
$sql_table_admin = "CREATE TABLE IF NOT EXISTS admin (
					   id_admin int(10) unsigned NOT NULL AUTO_INCREMENT,
					   nome varchar(65) DEFAULT NULL,
					   cognome varchar(65) DEFAULT NULL,
					   username varchar(65) DEFAULT NULL,
					   password varchar(65) DEFAULT NULL,
					   email varchar(65) DEFAULT NULL,
					   telefono varchar(65) DEFAULT NULL,
					   note mediumtext,
					   cod_md5 varchar(65) DEFAULT NULL,
					   ult_acc varchar(255) DEFAULT 'Primo Accesso',
					   login varchar(65) DEFAULT NULL,
					   tipo_utente varchar(255) DEFAULT NULL,
				  PRIMARY KEY (id_admin)
                                  )";
								




if($myconn->query($sql_table_admin)==TRUE){


$sqlinsert_admin = " INSERT INTO admin ( 
                                       nome, 
									   cognome, 
									   username, 
									   password, 
									   email, 
									   cod_md5, 
									   login, 
									   tipo_utente
									   ) 
			                  VALUES (
					                  '$name_user', 
									  '$cname_user', 
									  '$user', 
									  '$pass_user', 
									  '$email_user', 
									  '$cod_md5', 
									  '$login', 
									  '$tipo_utente'
									  )";
$rs_insert_admin = @mysqli_query($myconn,$sqlinsert_admin) or die( "Errore....".mysqli_error($myconn) );
}


/* TABLE admin */

/* TABLE articoli */
$sql_article = "CREATE TABLE IF NOT EXISTS `articoli` (
				  `idart` int(5) unsigned NOT NULL AUTO_INCREMENT,
				  `idcategoria` int(4) unsigned NOT NULL,
				  `titart` varchar(265) DEFAULT NULL,
				  `alias` varchar(265) DEFAULT NULL,
				  `metadesc` varchar(265) DEFAULT NULL,
				  `metakey` varchar(265) DEFAULT NULL,
				  `categoria` varchar(265) DEFAULT NULL,
				  `datacreate` varchar(65) DEFAULT NULL,
				  `contart` mediumtext,
				  `visibility` varchar(4) DEFAULT NULL,
				  `ult_mod` varchar(65) DEFAULT NULL,
				  `author` varchar(265) DEFAULT NULL,
				  `profile_author` varchar(265) DEFAULT NULL,
				  `option_article` varchar(265) DEFAULT NULL,
				  `cestinato` varchar(4) DEFAULT NULL,
				  `archiviato` varchar(65) DEFAULT NULL,
				  PRIMARY KEY (`idart`)
													)";							  
								  
							  


							  
if($myconn->query($sql_article)==TRUE){
$option_article =  "a:7:{i:0;s:3:\"opt\";i:1;s:5:\"click\";i:2;s:7:\"comment\";i:3;s:5:\"title\";i:4;s:6:\"author\";i:5;s:4:\"date\";i:6;s:4:\"link\";}";		
$profile_author = "https://twitter.com/_micheledefalco";

$sql_insert_article = " INSERT INTO `articoli` (
                                     `idcategoria`, 
									 `titart`, 
									 `alias`, 
									 `metadesc`, 
									 `metakey`, 
									 `categoria`, 
									 `datacreate`,
									 `contart`, 
									 `visibility`, 
									 `ult_mod`, 
									 `author`, 
									 `profile_author`,
									 `option_article`, 
									 `cestinato`, 
									 `archiviato`
									 ) 
							VALUES (1, 
									'cos''è cms bootstrap blog', 
									'cos-e-cms-bootstrap-blog', 
									'cms bootstrap blog', 
									'cms bootstrap blog', 
									'non categorizzati', 
									'2016-04-24', 
									'&lt;p&gt;&lt;strong&gt;CMS Bootstrap Blog&lt;/strong&gt; &amp;egrave; un &lt;em&gt;Content Management System&lt;/em&gt; (CMS) per creare un Blog ad uso personale.&lt;/p&gt;\r\n\r\n&lt;p&gt;Sia il Front-End che il Back-End hanno un layout responsive basato su Bootstrap 2.&lt;/p&gt;\r\n\r\n&lt;p&gt;Il template del Blog &amp;egrave; quello di esempio disponibile su &lt;a href=&quot;http://getbootstrap.com/examples/blog/&quot; target=&quot;_blank&quot;&gt;GetBootstrap.com&lt;/a&gt;.&lt;/p&gt;\r\n\r\n&lt;p&gt;Nel Back-End di CMS Bootstrap Blog sono disponibili molte funzionalit&amp;agrave; per gestire al meglio il Blog, tra cui:&lt;/p&gt;\r\n\r\n&lt;ol&gt;\r\n	&lt;li&gt;Creare, modificare e gestire gli Articoli e le Categorie Articoli;&lt;/li&gt;\r\n	&lt;li&gt;Gestire gli utenti autorizzati ad accedere al back-end, tra cui creare un nuovo utente,&amp;nbsp; inviare un&amp;#39;e-mail a tutti gli utenti o ad un singolo utente;&lt;/li&gt;\r\n	&lt;li&gt;Gestire il men&amp;ugrave; in alto del Blog, le voci di men&amp;ugrave;, abilitare o disabilitare una voce di men&amp;ugrave;, cambiare l&amp;#39;url di ogni singola voce, ect..;&lt;/li&gt;\r\n	&lt;li&gt;Cambiare il template del Blog con quelli disponibili nella sezione &amp;quot;Template&amp;quot;;&lt;/li&gt;\r\n	&lt;li&gt;Gestire i commenti che utenti inseriscono negli articoli, &lt;strong&gt;bannare &lt;/strong&gt;un&amp;#39; e-mail indesiderata, rispondere direttamente dal back end ad un commento di un utente.&lt;/li&gt;\r\n&lt;/ol&gt;\r\n\r\n&lt;p&gt;CMS Bootstrap Blog usa come pacchetto di icone &lt;a href=&quot;https://fortawesome.github.io/Font-Awesome&quot; target=&quot;_blank&quot;&gt;Font Awesome&lt;/a&gt;, pertanto &amp;egrave; possibile utilizzare tutte le icone disponibili sul sito &lt;a href=&quot;https://fortawesome.github.io/Font-Awesome&quot; target=&quot;_blank&quot;&gt;fortawesome.github.io&lt;/a&gt;, e come detto, poich&amp;egrave; &amp;egrave; basato su BootStrap 2, si possono utilizzare tutte le sue funzionalit&amp;agrave; per la creazione di un articolo o di una pagina.&lt;/p&gt;\r\n', 
									'Si', 
									'2016-04-24', 
									'Dev CMS', 
									'$profile_author',
									'$option_article', 
									'No', 
									'No'
									)";



$rs_insert_article = @mysqli_query($myconn,$sql_insert_article) or die( "Errore....".mysqli_error($myconn) );

									
}
/* TABLE articoli */

/* TABLE categorie */
$sql_categorie = "CREATE TABLE IF NOT EXISTS `categorie` (
						  `idcategoria` int(4) unsigned NOT NULL AUTO_INCREMENT,
						  `nome_categoria` varchar(65) DEFAULT NULL,
						  `alias_categoria` varchar(265) DEFAULT NULL,
						  `data_cat` varchar(65) DEFAULT NULL,
						  `data_mod_cat` varchar(65) DEFAULT NULL,
						  `descr_cat` varchar(255) DEFAULT NULL,
						  `meta_key` varchar(265) DEFAULT NULL,
						  `stato_cat` varchar(65) DEFAULT NULL,
						  PRIMARY KEY (`idcategoria`)
															)";


if($myconn->query($sql_categorie)==TRUE){

$sql_insert_cat = " INSERT INTO `categorie` ( 
                                `nome_categoria`, 
								`alias_categoria`, 
								`data_cat`, 
								`data_mod_cat`, 
								`descr_cat`, 
								`meta_key`, 
								`stato_cat`) 
						VALUES (
						        'non categorizzati', 
								'non-categorizzati', 
								'24/04/2016', 
								'24/04/2016', 
								'articoli non categorizzati', 
								'articoli non categorizzati',  
								'enabled'
								)";
								

$rs_insert_cat = @mysqli_query($myconn,$sql_insert_cat) or die( "Errore....".mysqli_error($myconn) );	
}
/* TABLE categorie */



/* TABLE config*/
$sql_config = "CREATE TABLE IF NOT EXISTS `config` (
								  `id_config` int(4) unsigned NOT NULL AUTO_INCREMENT,
								  `logo_blog` varchar(265) DEFAULT NULL,
								  `name_blog` varchar(265) NOT NULL DEFAULT 'PlayBlog - CMS',
								  `title_blog` varchar(265) NOT NULL DEFAULT 'Blog Title Example',
								  `st_title_blog` varchar(265) NOT NULL DEFAULT 'Questo è un blog di esempio che si può gestire e creare con PlayBlog.',
								  `section_abaut` mediumtext,
								  `sectionmetadesc` mediumtext,
								  `sectionmetakey` mediumtext,
								  `fb` varchar(265) DEFAULT NULL,
								  `tw` varchar(265) DEFAULT NULL,
								  `gooplus` varchar(265) DEFAULT NULL,
								  `github` varchar(265) DEFAULT NULL,
								  `linkem` varchar(265) DEFAULT NULL,
								  `codepen` varchar(265) DEFAULT NULL,
								  `footer_blog` varchar(265) NOT NULL DEFAULT '<a href=\"#\">CMS Bootstrap Blog</a> by <a href=\"#\">@micheledefalco</a>',
								  `gooanaly` varchar(265) DEFAULT NULL,
								  `cookie_policy` mediumtext,
								  PRIMARY KEY (`id_config`)
													)";

if($myconn->query($sql_config)==TRUE){


$sql_insert_config = "INSERT INTO `config` (
						   `logo_blog`, 
						   `name_blog`, 
						   `title_blog`, 
						   `st_title_blog`, 
						   `section_abaut`, 
						   `sectionmetadesc`, 
						   `sectionmetakey`, 
						   `fb`, 
						   `tw`, 
						   `gooplus`, 
						   `github`, 
						   `linkem`, 
						   `codepen`, 
						   `footer_blog`, 
						   `gooanaly`, 
						   `cookie_policy`
						   )
					VALUES (
						    '&lt;i class=&quot;fa fa-play-circle&quot;&gt;&lt;/i&gt;&amp;nbsp;CMS&amp;nbsp;Bootstrap&amp;nbsp;Blog', 
							'CMS Bootstrap Blog', 
							'CMS Bootstrap Blog', 
							'Questo è un blog di esempio che si può gestire e creare con CMS Bootstrap Blog.', 
							'&lt;h4&gt;About&lt;/h4&gt;\r\n&lt;p&gt;&lt;em&gt;Hi, I am Developer\r\nCMS Bootstrap Blog, you have the ability to create your personal blog.. :-) :-)&lt;/em&gt;&lt;/p&gt;\r\n', 
							'CMS Bootstrap Blog &eacute; un Content Management System (CMS) per creare un Blog ad uso personale,  Front-End che il Back-End hanno un layout responsive basato su Bootstrap 2',
							'CMS Bootstrap Blog, Crea Blog con CMS Bootstrap Blog', 
							'https://www.facebook.com/defalcomic', 
							'https://twitter.com/_micheledefalco', 
							'https://plus.google.com/106920259998112107300', 
							'https://github.com/MicheleDeF', 
							'', 
							'http://codepen.io/MicheleDeF', 
							'CMS Bootstrap Blog by &lt;a href=&quot;https://twitter.com/_micheledefalco&quot; target=&quot;_blank&quot;&gt;@micheledefalco&lt;/a&gt;', 
							'', 
							'&lt;div class=&quot;row-fluid&quot;&gt;\r\n&lt;div class=&quot;span12&quot;&gt;\r\n&lt;h4&gt;&lt;i class=&quot;fa fa-lock&quot;&gt;&lt;/i&gt; Cookie Policy&lt;/h4&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n\r\n&lt;div class=&quot;row-fluid&quot;&gt;\r\n&lt;div class=&quot;span12&quot;&gt;		\r\n&lt;hr&gt;\r\n&lt;h2&gt;Uso dei cookie&lt;/h2&gt;\r\n&lt;p&gt;Il &quot;Sito&quot; utilizza i Cookie per rendere i propri servizi semplici e efficienti\r\nper l&rsquo;utenza che visiona le pagine. \r\nGli utenti che visionano il Sito, vedranno inserite delle quantit&agrave; minime di informazioni \r\nnei dispositivi in uso, che siano computer e periferiche mobili, in piccoli file di testo \r\ndenominati &ldquo;cookie&rdquo; salvati nelle directory utilizzate dal browser web dell&rsquo;Utente. Vi sono vari tipi \r\ndi cookie, alcuni per rendere pi&ugrave; efficace l&rsquo;uso del Sito, altri per abilitare determinate funzionalit&agrave;.\r\n&lt;/p&gt;\r\n&lt;hr&gt;\r\n&lt;p&gt;Analizzandoli in maniera particolareggiata i nostri cookie permettono di:&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n&lt;hr&gt;\r\n&lt;li&gt;memorizzare le preferenze inserite;&lt;/li&gt;\r\n&lt;li&gt;evitare di reinserire le stesse informazioni pi&ugrave; volte durante la visita quali ad esempio nome utente e password;&lt;/li&gt;\r\n&lt;li&gt;analizzare l&rsquo;utilizzo dei servizi e dei contenuti forniti dal sito.\r\nper ottimizzarne l&rsquo;esperienza di navigazione e i servizi offerti.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;hr&gt;\r\n&lt;h2&gt;Tipologie di Cookie&lt;/h2&gt;\r\n&lt;hr&gt;\r\n&lt;h4&gt;1.) Cookie tecnici&lt;/h4&gt;\r\n&lt;p&gt;Questa tipologia di cookie permette il corretto funzionamento di alcune sezioni del Sito. Sono di due categorie: persistenti e di sessione:\r\n&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;persistenti: una volta chiuso il browser non vengono distrutti ma rimangono fino ad una data di scadenza preimpostata&lt;/li&gt;\r\n&lt;li&gt;di sessione: vengono distrutti ogni volta che il browser viene chiuso&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p&gt;Questi cookie, inviati sempre dal nostro dominio, sono necessari a visualizzare correttamente il sito e in relazione ai servizi \r\ntecnici offerti, verranno quindi sempre utilizzati e inviati, a meno che l&rsquo;utenza non modifichi le impostazioni nel proprio browser \r\n(inficiando cos&igrave; la visualizzazione delle pagine del sito).\r\n&lt;/p&gt;\r\n&lt;hr&gt;\r\n&lt;h4&gt;2.) Cookie analitici&lt;/h4&gt;\r\n&lt;p&gt;I cookie in questa categoria vengono utilizzati per collezionare informazioni sull&rsquo;uso del sito, user&agrave; \r\nqueste informazioni in merito ad analisi statistiche anonime al fine di migliorare l&rsquo;utilizzo del Sito e per rendere i contenuti pi&ugrave; \r\ninteressanti e attinenti ai desideri dell&rsquo;utenza. Questa tipologia di cookie raccoglie dati in forma anonima sull&rsquo;attivit&agrave; dell&rsquo;utenza e\r\n su come &egrave; arrivata sul Sito. I cookie analitici sono inviati dal Sito Stesso o da domini di terze parti.\r\n&lt;/p&gt;\r\n&lt;hr&gt;\r\n&lt;h4&gt;3.) Cookie di analisi di servizi di terze parti&lt;/h4&gt;\r\n&lt;p&gt;Questi cookie sono utilizzati al fine di raccogliere informazioni sull&rsquo;uso del Sito da parte degli utenti in forma anonima quali: \r\npagine visitate, tempo di permanenza, origini del traffico di provenienza, provenienza geografica, et&agrave;, genere e interessi ai fini di \r\ncampagne di marketing. Questi cookie sono inviati da domini di terze parti esterni al Sito.\r\n&lt;/p&gt;\r\n&lt;hr&gt;\r\n&lt;h4&gt;4.) Cookie per integrare prodotti e funzioni di software di terze parti&lt;/h4&gt;\r\n&lt;p&gt;Questa tipologia di cookie integra funzionalit&agrave; sviluppate da terzi all&rsquo;interno delle\r\n pagine del Sito come le icone e le preferenze espresse nei social network al fine di condivisione dei\r\n contenuti del sito o per l&rsquo;uso di servizi software di terze parti (come i software per generare le mappe \r\n e ulteriori software che offrono servizi aggiuntivi). Questi cookie sono inviati da domini di terze parti e da siti partner \r\n che offrono le loro funzionalit&agrave; tra le pagine del Sito.\r\n&lt;/p&gt;\r\n&lt;hr&gt;\r\n&lt;h4&gt;5.) Cookie di profilazione&lt;/h4&gt;\r\n&lt;p&gt;Sono quei cookie necessari a creare profili utenti al fine di inviare messaggi pubblicitari in \r\nlinea con le preferenze manifestate dall&rsquo;utente all&rsquo;interno delle pagine del Sito.\r\n&lt;/p&gt;\r\n&lt;hr&gt;\r\n&lt;p&gt;Questo sito, secondo la normativa vigente, non &egrave; tenuto a chiedere consenso per i cookie \r\ntecnici e di analytics, in quanto necessari a fornire i servizi richiesti.\r\n&lt;/p&gt;\r\n&lt;p&gt;Per tutte le altre tipologie di cookie il consenso pu&ograve; essere espresso dall&rsquo;Utente con una o pi&ugrave; di una delle seguenti modalit&agrave;:\r\n&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;Mediante specifiche configurazioni del browser utilizzato o dei relativi programmi informatici utilizzati \r\nper navigare le pagine che compongono il Sito.&lt;/li&gt;\r\n&lt;li&gt;Mediante modifica delle impostazioni nell&rsquo;uso dei servizi di terze parti&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p&gt;&lt;strong&gt;Entrambe queste soluzioni potrebbero impedire all&rsquo;utente di utilizzare o visualizzare parti del Sito.&lt;/strong&gt;\r\n&lt;/p&gt;\r\n&lt;hr&gt;\r\n&lt;h4&gt;5.) Siti Web e servizi di terze parti&lt;/h4&gt;\r\n&lt;p&gt;Il Sito potrebbe contenere collegamenti ad altri siti Web che dispongono di una propria informativa \r\nsulla privacy che pu&ograve; essere diverse da quella adottata da questo sito e che che quindi non risponde di questi siti.\r\n&lt;/p&gt;\r\n	\r\n&lt;hr&gt;\r\n&lt;h2&gt;Elenco dei cookie di questo sito&lt;/h2&gt;\r\n&lt;div class=&quot;table-responsive&quot;&gt;&lt;table class=&quot;table table-striped&quot;&gt;\r\n&lt;tr&gt;&lt;td style=&quot;width:20%;&quot;&gt;&lt;b&gt;Tipo&lt;/b&gt;&lt;/td&gt;&lt;td&gt;&lt;b&gt;Descrizione&lt;/b&gt;&lt;/td&gt;&lt;/tr&gt;\r\n&lt;tr&gt;&lt;td&gt;Cookie Tecnici&lt;/td&gt;\r\n&lt;td&gt;\r\n _cook&lt;br&gt;\r\nQuesto cookie viene utilizzato per memorizzare che l''utente \r\nha eccettato i cookie cliccando sul pulsante &quot;Accetto&quot;;&lt;br&gt;&lt;br&gt;\r\n _not_cook&lt;br&gt;\r\nMemorizza che l''utente non ha eccettato i cookie cliccando sul pulsante  &quot; Non Accetto&quot;;&lt;br&gt;&lt;br&gt;\r\n_test_cook&lt;br&gt;\r\nAvvisa l''utente tramite un messaggio testuale posto in alto nel caso in cui stia usando un browser con i cookie disabilitati.&lt;br&gt;&lt;br&gt;\r\n_like&lt;br&gt;\r\nMemorizza informazioni riguardo a gli articoli Preferiti.\r\n&lt;/td&gt;\r\n\r\n&lt;/tr&gt;\r\n&lt;tr&gt;&lt;td&gt;Cookie Analitici&lt;/td&gt;\r\n&lt;td&gt;Google Analitycs&lt;br&gt;\r\nGoogle Analytics &egrave; lo strumento di analisi di \r\nGoogle che aiuta i proprietari di siti web e app a capire come i \r\nvisitatori interagiscono con i contenuti di loro propriet&agrave;. \r\nQuesto servizio potrebbe utilizzare un insieme di cookie per \r\nraccogliere informazioni e generare statistiche sull''utilizzo dei \r\nsiti web senza fornire informazioni personali sui singoli visitatori \r\na Google. Il cookie principale utilizzato da Google Analytics &egrave; &quot;__ga&quot;.\r\nOltre a generare statistiche sull''utilizzo dei siti web, \r\nGoogle Analytics consente, insieme ad alcuni cookie per la pubblicit&agrave; \r\ndescritti sopra, di mostrare annunci pi&ugrave; pertinenti nelle propriet&agrave; di \r\nGoogle (come in Ricerca Google) e in tutto il Web. \r\nPer ulteriori &lt;a href=&quot;https://developers.google.com/analytics/resources/concepts/gaConceptsCookies&quot;&gt;info&lt;/a&gt;.\r\n&lt;/td&gt;&lt;/tr&gt;\r\n&lt;tr&gt;&lt;td&gt;Cookie Terze Parti&lt;/td&gt;\r\n&lt;td&gt;Facebook&lt;br&gt;\r\nVisitando un sito web si possono ricevere cookie sia dal sito visitato (&ldquo;proprietari&rdquo;),\r\nsia da siti gestiti da altre organizzazioni (&ldquo;terze parti&rdquo;). \r\nUn esempio notevole &egrave; rappresentato dalla presenza dei &ldquo;social plugin&rdquo; per Facebook, Twitter, Google+ e LinkedIn. \r\nSi tratta di parti della pagina visitata generate direttamente dai suddetti siti ed integrati nella pagina del sito \r\nospitante. L''utilizzo pi&ugrave; comune dei social plugin &egrave; finalizzato alla condivisione dei contenuti sui social network.\r\nLa presenza di questi plugin comporta la trasmissione di cookie da e verso tutti i siti gestiti da terze parti. \r\nLa gestione delle informazioni raccolte da &ldquo;terze parti&rdquo; &egrave;  disciplinata dalle relative informative cui si prega di fare riferimento. \r\nPer garantire una maggiore trasparenza e comodit&agrave;, si riportano qui di seguito  gli indirizzi \r\nweb delle diverse informative e delle modalit&agrave; per la gestione dei cookie.\r\n&lt;br&gt;\r\n&lt;a href=&quot;https://www.facebook.com/help/cookies/&quot;&gt;Facebook informativa&lt;/a&gt;.\r\n\r\n&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/table&gt;&lt;/div&gt;\r\n&lt;hr&gt;\r\n\r\n&lt;h4&gt;Come gestire i cookie mediante configurazione del browser&lt;/h4&gt;\r\n&lt;hr&gt;\r\n&lt;p&gt;Se desideri \r\napprofondire le modalit&agrave; con cui il tuo browser memorizza i cookies durante la tua navigazione, \r\nti invitiamo a seguire questi link sui siti dei rispettivi fornitori.&lt;/p&gt;\r\n&lt;div class=&quot;table-responsive&quot;&gt;&lt;table class=&quot;table table-striped&quot;&gt;&lt;tbody&gt;&lt;tr&gt;&lt;td&gt;&lt;a href=&quot;https://support.mozilla.org/it/kb/Gestione%20dei%20cookie&quot; target=&quot;_blank&quot;&gt;Mozilla Firefox&lt;/a&gt;&lt;/td&gt;\r\n&lt;td&gt;https://support.mozilla.org/it/kb/Gestione%20dei%20cookie&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;tr&gt;&lt;td&gt;&lt;a href=&quot;https://support.google.com/chrome/answer/95647?hl=it&quot; target=&quot;_blank&quot;&gt;Google Chrome&lt;/a&gt;&lt;/td&gt;\r\n&lt;td&gt;https://support.google.com/chrome/answer/95647?hl=it&lt;/td&gt;&lt;/tr&gt;\r\n&lt;tr&gt;&lt;td&gt;&lt;a href=&quot;http://windows.microsoft.com/it-it/windows-vista/block-or-allow-cookies&quot; target=&quot;_blank&quot;&gt;Internet Explorer&lt;/a&gt;&lt;/td&gt;\r\n&lt;td&gt;http://windows.microsoft.com/it-it/windows-vista/block-or-allow-cookies&lt;/td&gt;&lt;/tr&gt;\r\n&lt;tr&gt;&lt;td&gt;&lt;a href=&quot;https://support.apple.com/kb/PH17191?viewlocale=it_IT&amp;locale=en_US&quot; target=&quot;_blank&quot;&gt;Safari 6/7 Mavericks&lt;/a&gt;&lt;/td&gt;\r\n&lt;td&gt;https://support.apple.com/kb/PH17191?viewlocale=it_IT&amp;locale=it_IT&lt;/td&gt;&lt;/tr&gt;\r\n&lt;tr&gt;&lt;td&gt;&lt;a href=&quot;https://support.apple.com/kb/PH19214?viewlocale=it_IT&amp;locale=en_US&quot; target=&quot;_blank&quot;&gt;Safari 8 Yosemite&lt;/a&gt;&lt;/td&gt;\r\n&lt;td&gt;https://support.apple.com/kb/PH19214?viewlocale=it_IT&amp;locale=it_IT&lt;/td&gt;\r\n&lt;tr&gt;&lt;td&gt;&lt;a href=&quot;https://support.apple.com/it-it/HT201265&quot; target=&quot;_blank&quot;&gt;Safari su iPhone, iPad, o iPod touch&lt;/a&gt;&lt;/td&gt;\r\n&lt;td&gt;https://support.apple.com/it-it/HT201265&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;\r\n&lt;/table&gt;&lt;/div&gt;	\r\n&lt;/div&gt;\r\n&lt;/div&gt;'
					)";
					   
											
 
	
	$rs_insert_config = @mysqli_query($myconn,$sql_insert_config) or die( "Errore....".mysqli_error($myconn) );
	
}
/* TABLE config*/


/* TABLE images*/
$sql_images = " CREATE TABLE IF NOT EXISTS `images` (
				`id_img` int(10) unsigned NOT NULL AUTO_INCREMENT,
				`name_img` varchar(265) DEFAULT NULL,
				`url_img` varchar(265) DEFAULT NULL,
				PRIMARY KEY (`id_img`)
				) ";
				
				

$rs_images = @mysqli_query($myconn,$sql_images) or die( "Errore....".mysqli_error($myconn) );		
/* TABLE images*/




/* TABLE menu */	

$sql_menu = " CREATE TABLE IF NOT EXISTS `menu` (
					  `id_menu` int(10) unsigned NOT NULL AUTO_INCREMENT,
					  `alias_menu` varchar(255) DEFAULT NULL,
					  `nome_menu` varchar(255) DEFAULT NULL,
					  `voci_menu` varchar(255) DEFAULT NULL,
					  `url_voci_menu` varchar(255) DEFAULT NULL,
					  PRIMARY KEY (`id_menu`)
					                              ) ";






if($myconn->query($sql_menu)==TRUE){

$sql_insert_menu = " INSERT INTO `menu` (
                                
								 `alias_menu`, 
								 `nome_menu`, 
								 `voci_menu`, 
								 `url_voci_menu`
								 )
 								 VALUES 
								 (
								 'top-menu', 
								 'Top Menu', 
								 'a:1:{i:0;s:4:\"Home\";}', 'a:1:{i:0;s:11:\"all_article\";}'
								 )";
	
	
$rs_insert_menu = @mysqli_query($myconn,$sql_insert_menu) or die( "Errore....".mysqli_error($myconn) );	
}
/* TABLE menu */



/* TABLE voci_menu */

$sql_vmenu = " CREATE TABLE IF NOT EXISTS `voci_menu` (
										  `id_voce_menu` int(10) unsigned NOT NULL AUTO_INCREMENT,
										  `id_menu` int(10) NOT NULL,
										  `nome_voce_menu` varchar(255) DEFAULT NULL,
										  `stato_voce_menu` varchar(255) DEFAULT NULL,
										  `home` varchar(65) DEFAULT NULL,
										  PRIMARY KEY (`id_voce_menu`)
										               )  ";


													   
													   
if($myconn->query($sql_vmenu)==TRUE){

$sql_insert_vmenu = " INSERT INTO `voci_menu` (
                                      `id_menu`, 
									  `nome_voce_menu`, 
									  `stato_voce_menu`, 
									  `home`
									  ) 
									  VALUES (
									   1, 
									  'Home', 
									  'enabled', 
									  'si'
									  )";
	
	
$rs_insert_vmenu = @mysqli_query($myconn,$sql_insert_vmenu) or die( "Errore....".mysqli_error($myconn) );
	}
/* TABLE voci_menu */



/* TABLE themes */

$sql_themes = " CREATE TABLE IF NOT EXISTS `themes` (
				  `id_themes` int(10) unsigned NOT NULL AUTO_INCREMENT,
				  `name_themes` varchar(265) DEFAULT NULL,
				  `st_themes` varchar(65) DEFAULT NULL,
				  `tipo_themes` varchar(65) DEFAULT NULL,
				  PRIMARY KEY (`id_themes`)
													) ";




if($myconn->query($sql_themes)==TRUE){

$sql_insert_themes = " INSERT INTO `themes` (
                                           `id_themes`, 
										   `name_themes`, 
										   `st_themes`, 
										   `tipo_themes`
										   ) 
									VALUES
											(1, 'cerulean', 'disattivo', 'front-end'),
											(2, 'journal', 'disattivo', 'front-end'),
											(3, 'cosmo', 'disattivo', 'front-end'),
											(4, 'united', 'disattivo', 'front-end'),
											(5, 'readable', 'attivo', 'front-end'),
											(6, 'slate', 'disattivo', 'back-end'),
											(7, 'amelia', 'disattivo', 'front-end'),
											(8, 'cyborg', 'disattivo', 'front-end'),
											(9, 'flatly', 'disattivo', 'front-end'),
											(10, 'simplex', 'attivo', 'back-end'),
											(11, 'spacelab', 'disattivo', 'front-end'),
											(12, 'superhero', 'disattivo', 'front-end')
						";

	
$rs_insert_themes = @mysqli_query($myconn,$sql_insert_themes) or die( "Errore....".mysqli_error($myconn) );
	}

/* TABLE themes */


/* TABLE comment*/
$sql_comment = "CREATE TABLE IF NOT EXISTS `comment` (
									  `id_comment` int(10) unsigned NOT NULL AUTO_INCREMENT,
									  `idart` int(4) NOT NULL,
									  `cont_comment` mediumtext,
									  `data_ora` varchar(265) DEFAULT NULL,
									  `email_utente` varchar(265) DEFAULT NULL,
									  `nome_utente` varchar(265) DEFAULT NULL,
									  `st_comment` varchar(65) DEFAULT NULL,
									  PRIMARY KEY (`id_comment`)
									)";


									

$rs_comment = @mysqli_query($myconn,$sql_comment) or die( "Errore....".mysqli_error($myconn) );									
/* TABLE comment*/



/* TABLE email_bann_comm */
$sql_email_bann = "CREATE TABLE IF NOT EXISTS `email_bann_comm` (
													  `id_email_bann_comm` int(65) unsigned NOT NULL AUTO_INCREMENT,
													  `email_bann` varchar(265) DEFAULT NULL,
													  PRIMARY KEY (`id_email_bann_comm`)
													)";

													
													
													
$rs_email_bann= @mysqli_query($myconn,$sql_email_bann) or die( "Errore....".mysqli_error($myconn) );															
/* TABLE email_bann_comm */



/* TABLE archivio */
								  
$sql_archivie = "CREATE TABLE IF NOT EXISTS `archivio` (
						  `id_archivio` int(80) unsigned NOT NULL AUTO_INCREMENT,
						  `nome_archivio` varchar(265) DEFAULT NULL,
						  `art_archiviati` text,
						  PRIMARY KEY (`id_archivio`)
														)";		




													
$rs_archivie = @mysqli_query($myconn,$sql_archivie) or die( "Errore....".mysqli_error($myconn) );					  
/* TABLE archivio */

 
	  
  	  

  echo "
        <strong>
       <p class=\"text-success\"><i class=\"fa fa-check\" aria-hidden=\"true\"></i> Database aggiornato con successo</p>
	   </strong>
	   <p class=\"text-info\">Per continuare devi eliminare la cartella d'instalazione.</p>
	   <a href=\"../unlink_inst.php\" class=\"btn btn-primary\" id=\"del_installation\">Elimina</button>
	   
	   ";
  
  
  }














?>
