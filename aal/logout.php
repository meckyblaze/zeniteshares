<?php
session_start();
unset($_SESSION['email']);
session_destroy();
sleep(2);
header('Location: ../index.php');
?>