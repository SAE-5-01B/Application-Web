<?php
session_start();
unset($_SESSION['userDetails']);
session_destroy();
header('Location: ./../index.html');
exit();
?>
