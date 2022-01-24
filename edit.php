<?php
include("config.php");
?>

<html lang="en" data-theme="<?php echo $theme ?>">

<!--
	Author: Dmitri Popov, dmpop@linux.com
	License: GPLv3 https://www.gnu.org/licenses/gpl-3.0.txt
-->

<head>
	<meta charset="utf-8">
	<title><?php echo $title ?></title>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="favicon.png" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/classless.css" />
	<link rel="stylesheet" href="css/themes.css" />
	<style>
		textarea {
			font-size: 15px;
			width: 100%;
			height: 55%;
			line-height: 1.9;
			margin-top: 1em;
		}
	</style>
</head>

<body>
	<div class="card text-center">
		<div style="margin-top: 1em;">
			<h1 class="text-center" style="display: inline; margin-left: 0.19em; vertical-align: middle; letter-spacing: 3px; margin-top: 0em; color: #e580ffff;"><?php echo $title; ?></h1>
		</div>
		<hr>
		<button title="Back" style="margin-top: 1.5em;" onclick="location.href='index.php'"><img style='vertical-align: middle;' src='svg/back.svg' /></button>
		<?php
		function Read()
		{
			global $note_file;
			echo file_get_contents($note_file);
		}
		function Write($text)
		{
			global $note_file;
			file_put_contents($note_file, $text);
		}
		if (isset($_POST["save"])) {
			if ($_POST['password'] != $password) {
				print '<p>Wrong password</p>';
				exit();
			}
			Write($_POST["text"]);
			header('Location:index.php');
		};
		?>
		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
			<textarea name="text"><?php Read(); ?></textarea>
			<div>
				<label for='password'>Password:</label>
			</div>
			<div>
				<input type="password" name="password">
			</div>
			<button title="Save" type="submit" name="save"><img style='vertical-align: middle;' src='svg/save.svg' /></button>
		</form>
		<hr>
		<div style="margin-bottom: 1em; margin-top: 1em;">
			<?php echo $footer; ?>
		</div>
	</div>
</body>

</html>