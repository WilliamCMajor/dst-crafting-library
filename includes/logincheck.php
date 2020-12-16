<?php
    session_start();
    if(!isset($_SESSION['dwq2as1sa']))
    {
        header("Location: login.php");
    }
?>