<?php
// CORS policy to allow the submitted page to read the response
header('Access-Control-Allow-Origin: *');
error_reporting(E_ERROR);
include('config.php');
?>

<html lang="en" data-theme="<?php echo $theme ?>">

<!-- Author: Dmitri Popov, dmpop@linux.com
					License: GPLv3 https://www.gnu.org/licenses/gpl-3.0.txt

javascript:var snippet = prompt('Snippet'); location.href='https://127.0.0.1/index.php?snippet='+escape(snippet)+'&url='+encodeURIComponent(location.href)+'&key=secret' -->

<head>
	<meta charset="utf-8">
	<title><?php echo $title ?></title>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="favicon.png" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/classless.css" />
	<link rel="stylesheet" href="css/themes.css" />
</head>

<body>
	<div class="card text-center">
		<h1 style="margin-left: 0.19em; margin-bottom: 0.5em; vertical-align: middle; letter-spacing: 3px; margin-top: 0.5em; color: #f6a159ff; text-transform: uppercase;"><span><?php echo $title ?></span></h1>
		<button style="margin-bottom: 2em;" onclick="location.href='edit.php'">Edit</button>
		<hr>
		<?php
		if ($_GET['key'] == $key) {
			$snippet = $_GET['snippet'] . "\n";
			$snippet .= file_get_contents('zaino.txt');
			file_put_contents('zaino.txt', $snippet);
			header("location:" . $_GET['url'] . "");
		}
		$f = fopen("zaino.txt", "r");
		if ($f) {
			while (($line = fgets($f)) !== false) {
				echo '<p>' . $line . '</p>';
			}
			fclose($f);
		} else {
			echo "<script>";
			echo 'alert("Nothing found.")';
			echo "</script>";
		}
		?>
		<hr>
		<p style="margin-right: 0.5em;"><?php echo $footer; ?>
			<select style="font-size: 90%;" id="theme" onchange="switchTheme(this)">
				<option value="light">Light</option>
				<option value="dark">Dark</option>
				<option value="sepia">Sepia</option>
				<option value="milligram">Milligram</option>
				<option value="pure">Pure</option>
				<option value="sakura">Sakura</option>
				<option value="skeleton">Skeleton</option>
				<option value="bootstrap">Bootstrap</option>
				<option value="medium">Medium</option>
				<option value="tufte">Tufte</option>
			</select>
		</p>
		<script>
			function switchTheme(el) {
				document.documentElement.setAttribute('data-theme', el.value)
			}
		</script>
	</div>
	</div>
</body>

</html>