<?php
include 'include/dbTools.php';
include 'include/header.php';

$champId= $_POST['champId'];
$sql="DELETE FROM champions WHERE champId ='".$champId."'";

mysqli_query($conn, $sql);
if(file_exists('images/splash/'.$champId.'_splash.jpg')){
    unlink('images/splash/'.$champId.'_splash.jpg');
}
if(file_exists('images/icons/champions/'.$champId.'square.jpg')){
    unlink('images/icons/champions/'.$champId.'square.jpg');
}
if(file_exists('images/skills/'.$champId.'/skill1.jpg')){
    unlink('images/skills/'.$champId.'/skill1.jpg');
}
if(file_exists('images/skills/'.$champId.'/skill2.jpg')){
    unlink('images/skills/'.$champId.'/skill2.jpg');
}
if(file_exists('images/skills/'.$champId.'/skill3.jpg')){
    unlink('images/skills/'.$champId.'/skill3.jpg');
}
if(file_exists('images/skills/'.$champId.'/skill4.jpg')){
    unlink('images/skills/'.$champId.'/skill4.jpg');
}
if(file_exists('images/skills/'.$champId.'/skill5.jpg')){
    unlink('images/skills/'.$champId.'/skill5.jpg');
}
if(is_dir('images/skills/'.$champId)){
    rmdir('images/skills/'.$champId);
}
header('Location: index.php');

?>