<?php
session_start();
unset($_SESSION['kul']);
session_destroy();
header("Location:giris.php");
?>