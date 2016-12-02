<?php
session_start();

$_SESSION["isAuth"]=0;	

header('Location: login.php');
?>