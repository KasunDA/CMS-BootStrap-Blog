<?php
$connect = fopen("../connessione.php", "a");
$dati_riga = "<?php\ndefine('DB_HOST','127.0.0.1');\ndefine('DB_USER','root');\ndefine('DB_PSW','');\ndefine('DB_NAME','micheledef');\n?>";
fwrite($connect,$dati_riga);
fclose($connect);
?>