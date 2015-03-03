<?php include 'include/dbTools.php'; 
 include 'include/header.php';
 
$username = $_POST['username'];
$password = $_POST['password'];
$email= $_POST['email'];

$sql = "SELECT userId,userName FROM users WHERE userName='".$username."' AND password='".$password."' AND email='".$email."'";
$result = mysqli_query($conn, $sql);
$login = mysqli_fetch_assoc($result);

if($login['userId']== null){
    $sql = "INSERT INTO users(username, password, email) VALUES('".$username."','".$password."','".$email."')";
    $result = mysqli_query($conn, $sql);

    
    $sql = "SELECT userId,userName FROM users WHERE userName='".$username."' AND password='".$password."' AND email='".$email."'";
    $result = mysqli_query($conn, $sql);
    $login = mysqli_fetch_assoc($result);
    
    $_SESSION['userId'] = $login['userId'];
    $_SESSION['userName'] = $login['userName'];

    
}else{
    $_SESSION['userExists']=1;
    header('Location: register.php');
}
$lastPage = $_SESSION['url'];

header('Location: index.php');

?>