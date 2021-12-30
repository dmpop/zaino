<?php
// CORS policy to allow the submitted page to read the response
header('Access-Control-Allow-Origin: *');
error_reporting(E_ERROR);
$title = "Zaino";
$theme = "light";
$password = "password";
$footer = "I really 🧡 <a href='https://www.paypal.com/paypalme/dmpop'>coffee</a>";
?>

<html lang="en" data-theme="<?php echo $theme ?>">

<!-- Author: Dmitri Popov, dmpop@linux.com
					License: GPLv3 https://www.gnu.org/licenses/gpl-3.0.txt

javascript:var snippet = prompt('Snippet'); location.href='https://127.0.0.1/index.php?snippet='+escape(snippet)+'&url='+encodeURIComponent(location.href)+'&password=password' -->

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
		<div style="margin-top: 1em; margin-bottom: 1em;">
			<img style="display: inline; height: 2.5em; vertical-align: middle;" src="favicon.svg" alt="logo" />
			<h1 style="display: inline; margin-top: 0em; vertical-align: middle; letter-spacing: 3px;"><?php echo $title; ?></h1>
		</div>
		<hr>
		<button style="margin-top: 1em;" onclick="location.href='edit.php'">Edit</button>
		<?php
		if ($_GET['password'] == $password) {
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
	</div>
	<div class="text-center">
		<?php echo $footer; ?>
	</div>
</body>

</html>