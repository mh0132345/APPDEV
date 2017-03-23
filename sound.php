<?php 
$log_file = 'sound_log.txt';
$data = $_POST['data'];
$str = gmdate("M d Y H:i:s", time()).", ".$data."\n";
if (file_exists($log_file)){
	$fp = fopen($log_file,"a");
	fwrite($fp,$str);
	fclose($fp);
} else{
	$fp = fopen($log_file,"w");
	fwrite($fp,$str);
	fclose($fp);
}

echo "Data is stored\n";
?>