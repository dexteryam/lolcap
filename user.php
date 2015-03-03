<?php include 'include/header.php'; ?>
<?php
  $userId= $_GET['user'];
  $sql= 'SELECT userName from users WHERE userId='.$userId;
  $result = mysqli_query($conn, $sql);
  $user=mysqli_fetch_assoc($result);
  $sql ="SELECT *,
  (SELECT COUNT(*) FROM ratinghistory WHERE champions.champId=ratinghistory.champId AND liked=1) as likes,
  (SELECT COUNT(*) FROM ratinghistory WHERE champions.champId=ratinghistory.champId AND liked=0) as dislikes
  FROM champions  WHERE champions.userId =".$userId;
  $result = mysqli_query($conn, $sql);
  $sql= 'SELECT userName from users WHERE userId='.$userId;
  

?>
<div class="container" style="width: 920px !important;">
  <div class="row">
    <div class="col-xs-10">
      
         <table class="table table-striped table-hover table-condensed">
          <tr>
            <thead>
              <h1><?php echo $user['userName']; ?>'s Champions </h1>
            </thead>
          </tr>
          <?php
            while($champ = mysqli_fetch_assoc($result)){
              echo'
                <tr>
                  <td>
                  <a href="champion.php?id='.$champ["champId"].'"><img src="'.$champ["icon"].'"></a>    
                  </td>
                  <td><h1>'.
                    $champ["name"].'<small> the '.$champ['title'].'</small></h1>
                  </td>
                  <td>
                    <h1>Score</h1>
                    <div class="col-xs-6">
                      '.$champ['likes'].'
                    </div>
                    <div class="col-xs-6">
                      '.$champ['dislikes'].'
                    </div>
                  </td>
                </tr>
              ';
              
            }

          ?>
        </table>
    </div>
    <div class="col-xs-2">
      <div class="well">
        Sort Options
      </div>
    </div>
  </div>
</div>

	  

<?php include 'include/footer.php'; ?>