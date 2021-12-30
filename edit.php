<?php
error_reporting(E_ERROR);
$title = "Zaino";
$theme = "light";
$password = "secret";
$footer = "I really 🧡 <a href='https://www.paypal.com/paypalme/dmpop'>coffee</a>";
?>

<html lang="en" data-theme="<?php echo $theme ?>">
<!-- Author: Dmitri Popov, dmpop@linux.com
					License: GPLv3 https://www.gnu.org/licenses/gpl-3.0.txt -->

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
			margin-top: 2em;
		}
	</style>
</head>

<body>
	<div class="card text-center">
		<div style="margin-top: 1em; margin-bottom: 1em;">
			<img style="display: inline; height: 2.5em; vertical-align: middle;" src="favicon.svg" alt="logo" />
			<h1 style="display: inline; margin-top: 0em; vertical-align: middle; letter-spacing: 3px;"><?php echo $title; ?></h1>
		</div>
		<hr>
		<button style="margin-top: 1em;" onclick="location.href='index.php'">Back</button>
		<?php
		function Read()
		{
			$f = "zaino.txt";
			echo file_get_contents($f);
		}
		function Write()
		{
			$f = "zaino.txt";
			$fp = fopen($f, "w");
			$data = $_POST["text"];
			fwrite($fp, $data);
			fclose($fp);
		}
		if (isset($_POST["save"])) {
			if ($_POST['password'] != $password) {
				print '<p>Wrong password</p>';
				exit();
			}
			Write();
			header('Location:index.php');
		};
		?>
		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
			<textarea name="text"><?php Read(); ?></textarea><br /><br />
			<input type="password" name="password">
			<button type="submit" name="save">Save</button>
		</form>
		<hr />
		<p><?php echo $footer; ?></p>
	</div>
</body>

</html>