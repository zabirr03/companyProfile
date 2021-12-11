<?php 
session_start();
$_SESSION = [];
session_unset();
session_destroy();

setcookie('rare', '', time() - 3600);
setcookie('uncommon', '', time() - 3600);

header("Location: login.php");
exit;
?>