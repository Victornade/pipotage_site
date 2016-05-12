<?php

$id = $_GET["id"];
$value= $_GET["value"];
$filename = '../config.cfg';
$link= explode('?', $_SERVER['HTTP_REFERER'] );

echo "<script>alert(\"la variable est nulle\")</script>"; 
// Assurons nous que le fichier est accessible en écriture
if (is_writable($filename)) {
    $reading = fopen('../config.cfg', 'r');
	$writing = fopen('../config.cfg.tmp', 'w');
	$replaced = false;

	while (!feof($reading)) {
	  $line = fgets($reading);
	  if (stristr($line,$id)) {
		$line = "$id = $value\n";
		$replaced = true;
	  }
	  fputs($writing, $line);
	}
	fclose($reading); 
	fclose($writing);
	if ($replaced) 
	{
	  rename('../config.cfg.tmp', '../config.cfg');
	 header('Location: ' .$link[0]  . '?' .$id.'=changed' );
	} else {
	  unlink('../config.cfg.tmp');
	 header('Location: ' .$link[0]  . '?' .$id.'=false' );
	}
} else {
    echo "Le fichier $filename n'est pas accessible en écriture.";
   header('Location: ' . $_SERVER['HTTP_REFERER'] . '?' .$id.'=false' );
}


?>
