<?php

$COUNT_FILE = "hitcounter.dat";

if (file_exists($COUNT_FILE)) {
	$fp = fopen("$COUNT_FILE", "r+");
	flock($fp, 1);
	$count = fgets($fp, 4096);
	$count += 1; 
	fseek($fp,0);
	fputs($fp, $count);
	flock($fp, 3);
	fclose($fp);
} else {
	echo "Can't find file, check '\$file'<BR>";
}

?>
<!- Hit Counter - James Crooke � 2002 - http://www.cj-design.com -->
<center><b><font size=3><?php echo $count; ?></font><b><br></center>
