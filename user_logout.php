
<!-- <link rel=stylesheet type="text/css" href="test.css"> -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	session_start();
	unset($_SESSION['session_Email']);
	echo '登出中......';
	echo '<meta http-equiv=REFRESH CONTENT=1;url=home.php>';

?>