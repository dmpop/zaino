<?php
// CORS policy to allow the submitted page to read the response
header('Access-Control-Allow-Origin: *');
include("config.php");
?>

<html lang="en" data-theme="<?php echo $theme ?>">

<!--
	Author: Dmitri Popov, dmpop@linux.com
	License: GPLv3 https://www.gnu.org/licenses/gpl-3.0.txt

	javascript:var note = prompt('Note'); location.href='https://127.0.0.1/index.php?note='+escape(note)+'&url='+encodeURIComponent(location.href)+'&password=password'
-->

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
		<div style="margin-top: 1em;">
			<h1 class="text-center" style="display: inline; margin-left: 0.19em; vertical-align: middle; letter-spacing: 3px; margin-top: 0em; color: #e580ffff;"><?php echo $title; ?></h1>
		</div>
		<hr>
		<button style="margin-top: 1.5em;" title="Edit" onclick='window.location.href = "edit.php"'><img style='vertical-align: middle;' src='svg/edit.svg' /></button>
		<?php
		if ($_GET['password'] == $password) {
			$note = $_GET['note'] . "\n";
			$note .= file_get_contents($note_file);
			file_put_contents($note_file, $note);
			header("location:" . $_GET['url'] . "");
		}
		$lines = file($note_file);
		foreach ($lines as $line) {
			echo '<p>' . $line . '</p>';
		}
		?>
		<hr>
		<div style="margin-bottom: 1em; margin-top: 1em;">
			<?php echo $footer; ?>
		</div>
	</div>
</body>

</html>