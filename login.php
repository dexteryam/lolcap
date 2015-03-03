<?php include 'include/dbTools.php'; 
 include 'include/header.php';
 
$username = $_POST['username'];
$password = $_POST['password'];
$redirect = $_POST['redirect'];

$sql = "SELECT userId,userName FROM users WHERE userName='".$username."' AND password='".$password."'";

$result = mysqli_query($conn, $sql);
$login = mysqli_fetch_assoc($result);

if($login['userId']!== null){
    $_SESSION['userId']=$login['userId'];
    $_SESSION['userName']=$login['userName'];
    echo $_SESSION['userId'];
}else{
    $_SESSION['wrongInfo']=1;
}
$lastPage = $_SESSION['url'];

header('Location: '.$redirect);

?>