<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>File IO</title>
</head>
<body>

	<h1>File IO</h1>

	<p>Topics: File Open, Write, and Read</p>

	<hr><hr>

	<p>File Open:</p>

	<hr>

	<p>fopen — Opens file or URL</p>

	<p><b>Step 1:</b>
		<ul>
			<li>Declare filename: $filename = "data.txt";</li>
			<li>Declare the mode: $filename = "data.txt";</li>
		</ul>
	</p>

	<?php 
		$filename = "data.txt";
		$mode = "w";
	?>

	<p><b>Step 2:</b>Open file using fopen()
		<ul>
			<li>$handle1 = fopen($filename, $mode);</li>	
		</ul>
	</p>

	<?php 
		$handle1 = fopen($filename, $mode);
		var_dump($handle1);
	?>

	<hr><hr>

	<p>File Write:</p>

	<hr>

	<p>fwrite — Binary-safe file write</p>

	<p><b>Step 1:</b>Write using fwrite():
		<ul>
			<li>$write = fwrite($handle1, "Name = Mir Md. Kawsur");</li>
		</ul>
	</p>

	<?php 
		$write = fwrite($handle1, "Name = Mir Md. Kawsur");

		var_dump($write);
	?>

	<hr><hr>

	<p>File Read:</p>

	<hr>

	<p>fread — Binary-safe file read</p>

	<p><b>Step 1:</b>Define filename, mode, length
		<ul>
			<li>$filename = "data.txt" (already defined)</li>
			<li>$mode = "r"</li>
			<li>$length = filesize($filename);</li>
		</ul>
	</p>

	<?php 
		$mode = "r";
		$length = filesize($filename);
	?>

	<p><b>Step 2:</b>Open file using fopen():
		<ul>
			<li>$handle2 = fopen($filename, $mode);</li>
		</ul>
	</p>
	<?php 
		$handle2 = fopen($filename, $mode);
	?>

	<p><b>Step 3:</b>Read file using fread():
		<ul>
			<li>echo fread($handle2, $length);</li>
		</ul>
	</p>
	<?php 
		echo fread($handle2, $length);
	?>

</body>
</html>