<?php include 'include/dbTools.php'; 
session_start();
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
if(isset($_SESSION['userId'])){
    $userId=$_SESSION['userId'];
    $userName=$_SESSION['userName'];
}
else{
    $userId=null;
}

if(isset($_SESSION['wrongInfo'])){
    $wrongInfo=1;
}else{
    $wrongInfo=0;
}
unset($_SESSION['wrongInfo']);
?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LOLCAP - Create a Champion</title>
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
</head>

<body>
<nav class="navbar navbar-inverse ">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">LoLCaP</a>
    </div>
    <div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home</a></li>
        <li><a href="champlist.php">Champions</a></li>
        <li><a href="#">Collaborate (WIP)</a></li>
        <li><a href="#">Team Builder (WIP)</a></li>
      </ul>
      <?php
        if($userId == null){
            echo'
           
            <form class="navbar-form navbar-right" role="search" method="post" action="login.php">
            <div class="form-group">
              <input name="username" type="text" class="form-control" placeholder="Username">
              <input name="password" type="password" class="form-control" placeholder="Password">
              <input type="hidden" name="redirect" value="'.$_SERVER['REQUEST_URI'].'" />
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Log In</button>
            </form>
             <p class="navbar-text navbar-right"><a href="register.php" class="navbar-link">Register</a></p>
            ';
        }
        else{
            echo '
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                    <li><a href="user.php?user='.$userId.'">My Champions</a></li>
                    <li><a href="addChamp.php">Add Champion</a></li>
                    <li><a href="logout.php">Log Out</a></li>
                    </ul>
                </li>
            </ul>';
        }
      
      
      ?>
      
      
      
       
       
    </div>
  </div>
</nav>
<?php
if($wrongInfo==1){
   echo' <p class="bg-danger" style="text-align: center; font-weight: bold">Incorrect Login Info</p> ';
}
$wrongInfo=0;
?>