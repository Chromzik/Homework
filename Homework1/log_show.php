<?php
$info 	= $_POST['info'];
$trace 	= $_POST['trace'];
$warning 	= $_POST['warning'];
$event 	= $_POST['event'];
$proterr 	= $_POST['proterr'];
$sorted	= $_POST['sorted'];

$file = "logfile.log";
$hFile = fopen($file, "r") or die("Unable to open file!");
$rows = explode(PHP_EOL, fread($hFile,filesize($file)));
fclose($hFile);

$count 		= 0;
$stats 		= array();
$texts	 	= array();

foreach($rows as $row){
	if(preg_match("/\w+/",substr($row, 15),$matches)){
		$key = strtolower($matches[0]);
		if($info != $key && $trace != $key && $warning != $key && $event != $key && $proterr != $key)
			continue;
		else{
			array_key_exists($key, $stats) ?  $stats[$key]++ :  $stats[$key] = 1;
			$texts[$key][$stats[$key] - 1] = $row;
			$count++;
		}		
	}
}
if($sorted)
	ksort($texts);

foreach($texts as $text_index => $text_value){
	$max = sizeof($text_value);
	for($z = 0; $z < $max; $z++)
		echo "<p>$text_value[$z]</p>";
}

echo '<div class = "summary"><table><tr>';
foreach($stats as $stat => $val){
	echo "<td>$stat: $val</td>";
}
echo "<td>Results: $count</td></tr></table></div>";