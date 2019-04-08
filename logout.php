<?php
session_start();

session_unset();
session_destroy();
setcookie('PHPSESSID',0, time() - 3600);

header("Location: index.php");
exit;
?>
