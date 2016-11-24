<?php
	require 'connect.php';

	$LOGIN_INFORMATION = array(
		$adminLogin => $adminPass
	);

	define('USE_USERNAME', true);
	define('LOGOUT_URL', '/');
	define('TIMEOUT_MINUTES', 15);
	define('TIMEOUT_CHECK_ACTIVITY', true);

	$timeout = (TIMEOUT_MINUTES == 0 ? 0 : time() + TIMEOUT_MINUTES * 60);

	if(isset($_GET['logout'])) {
		setcookie("verify", '', $timeout, '/');
		header('Location: ' . LOGOUT_URL);
		exit();
	}

	if(!function_exists('showLoginPasswordProtect')) {
		function showLoginPasswordProtect($error_msg) {
?>

<html>
	<head>
		<title>ამ გვერდის სანახავად გაიარეთ ავტორიზაცია</title>
		<link rel="stylesheet" href="/css/stylesheet.css" type="text/css" media="screen" />
		<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
		<META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
	</head>
	<body>
		<div style="width:500px; margin-left:auto; margin-right:auto; text-align:center">
			<form method="post">
				<h3>შეიყვანეთ მომხმარებლის სახელი და პაროლი:</h3>
				<br /><span style="color: red;"><?php echo $error_msg; ?></span><br /><br />
				<?php if (USE_USERNAME) echo 'მომხმარებლის სახელი:<br /><input type="input" name="access_login" /><br />პაროლი:<br />'; ?>
				<input type="password" name="access_password" /> <br /> <br /><p></p><input type="submit" id="add_comm" name="Submit" value="შესვლა" />
			</form>
		</div>
	</body>
</html>

<?php
	die();
	}
	}

	if (isset($_POST['access_password'])) {
		$login = isset($_POST['access_login']) ? $_POST['access_login'] : '';
		$pass = $_POST['access_password'];
		if (!USE_USERNAME && !in_array($pass, $LOGIN_INFORMATION) || (USE_USERNAME && ( !array_key_exists($login, $LOGIN_INFORMATION) || $LOGIN_INFORMATION[$login] != $pass ) )) {
			showLoginPasswordProtect("არასწორი პაროლი.");
		}else {
			setcookie("verify", md5($login.'%'.$pass), $timeout, '/');
			unset($_POST['access_login']);
			unset($_POST['access_password']);
			unset($_POST['Submit']);
		 }
	}else {
		if (!isset($_COOKIE['verify'])) {
			showLoginPasswordProtect("");
		}
		$found = false;
		foreach($LOGIN_INFORMATION as $key=>$val) {
			$lp = (USE_USERNAME ? $key : '') .'%'.$val;
			if ($_COOKIE['verify'] == md5($lp)) {
				$found = true;
				if (TIMEOUT_CHECK_ACTIVITY) {
					setcookie("verify", md5($lp), $timeout, '/');
				}
				break;
			}
		}
		if (!$found) {
			showLoginPasswordProtect("");
		}
	}
?>
