<?php include 'include/header.php'; ?>
<?php
if(isset($_SESSION['userExists'])){
    $userExists=1;
}else{
    $userExists=0;
}
unset($_SESSION['userExists']);
if($userExists==1){
   echo' <p class="bg-danger" style="text-align: center; font-weight: bold">User with those credentials already exists</p> ';
}
$wrongInfo=0;
?>
<div class="container" style="width: 920px !important;">
    <div class="row">
        <div class="col-xs-12">
            <div class="well">
                <form action="registerUser.php" method="POST">
                    <div class="form-group">
                        <label for="username">Username</label>
                      <input type="text" class="form-control" name="username" id="username" placeholder="Enter username">
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
                    </div>
 
                    <div class="checkbox">
                      <label>
                        <input type="checkbox">I agree that this is a wonderful website!
                      </label>
                    </div>
                    <button type="submit" class="btn btn-default">Register</button>
                  </form>
                
            </div>
        </div>
    </div>
</div>