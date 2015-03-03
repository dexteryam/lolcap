<?php
include 'include/dbTools.php'; 
include 'include/header.php';

unset($_SESSION['userId']);
$lastPage = $_SESSION['url'];
header('Location: index.php');

?>