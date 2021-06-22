<?php
error_reporting(E_ERROR);
include('config.php');
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
	<link rel="stylesheet" href="classless.css" />
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
		<div class="uk-card uk-card-default uk-card-body">
			<h1 style="margin-left: 0.19em; vertical-align: middle; letter-spacing: 3px; margin-top: 0em; margin-bottom: 0.7em; color: #f6a159ff;"><span><?php echo $title ?></span></h1>
			<button onclick="location.href='index.php'">Back</button>
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
				if ($_POST['password']!=$key) { print '<p>Wrong password</p>'; exit(); }
				Write();
				echo "<script>";
				echo 'alert("Changes saved")';
				echo "</script>";
			};
			?>
			<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
				<textarea class="uk-textarea" name="text"><?php Read(); ?></textarea><br /><br />
				<input type="password" name="password">
				<button type="submit" name="save">Save</button>
			</form>
			<hr />
			<p><?php echo $footer; ?></p>
		</div>
	</div>
</body>

</html>