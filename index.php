<?php
if(!isset($_GET['step'])) {
	chmod(__FILE__, 0777);
	header("Location: ".basename(__FILE__)."?step");
	die();
}
$files = array(
	".htaccess",
	"Archive_Tar.php",
	"PEAR.php",
	"quick.php",
	"style.css",
);
for($i=0;$i<sizeof($files);$i++) {
	$file = file_get_contents("http://raw.githubusercontent.com/killserver/cardinal-installer/master/".$files[$i]);
	if(file_Exists($files[$i])) {
		unlink($files[$i]);
	}
	file_put_contents($files[$i], $file);
	chmod($files[$i], 0777);
}
header("Location: ".basename(__FILE__));
?>