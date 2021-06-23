<?php
// CORS policy to allow the submitted page to read the response
header('Access-Control-Allow-Origin: *');
error_reporting(E_ERROR);
include('config.php');
?>

<html lang="en" data-theme="<?php echo $theme ?>">

<!-- javascript:var def = prompt('Definition'); var%20entry=window.getSelection();location.href='http://localhost:8000/index.php?entry='+escape(entry)+'&def='+escape(def)+'&key=secret' -->

<!-- Author: Dmitri Popov, dmpop@linux.com
         License: GPLv3 https://www.gnu.org/licenses/gpl-3.0.txt -->

<head>
	<meta charset="utf-8">
	<title><?php echo $title ?></title>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="favicon.png" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="classless.css" />
</head>

<body>
	<div class="card text-center">
		<h1 style="margin-left: 0.19em; margin-bottom: 0.7em; vertical-align: middle; letter-spacing: 3px; margin-top: 0em; color: #f6a159ff; text-transform: uppercase;"><span><?php echo $title ?></span></h1>
		<button style="margin-bottom: 2em;" onclick="location.href='edit.php'">Edit list</button>
		<hr>
		<?php
		if ($_GET['key'] == $key) {
			$snippet = '<p>' . $_GET['snippet'] . '</p>' . "\n";
			$snippet .= file_get_contents('zaino.txt');
			file_put_contents('zaino.txt', $snippet);
		}
		$f = fopen("zaino.txt", "r");
		if ($f) {
			while (($line = fgets($f)) !== false) {
				echo $line;
			}
			fclose($f);
		} else {
			echo "<script>";
			echo 'alert("No entires found.")';
			echo "</script>";
		}
		?>
		<hr>
		<p><?php echo $footer; ?></p>
	</div>
	</div>
</body>

</html>