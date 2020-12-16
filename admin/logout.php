<?php
session_start();
unset($_SESSION["dwq2as1sa"]);
session_destroy(); //remove all sessions
header("Location: login.php");
?>