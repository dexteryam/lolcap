<?php include 'include/header.php'; ?>
<?php
  $sql ="SELECT *,
  (SELECT COUNT(*) FROM ratinghistory WHERE champions.champId=ratinghistory.champId AND liked=1) as likes,
  (SELECT COUNT(*) FROM ratinghistory WHERE champions.champId=ratinghistory.champId AND liked=0) as dislikes
  FROM champions";
  $result = mysqli_query($conn, $sql);

?>
<div class="container" style="width: 920px !important;">
  <div class="row">
    <div class="col-xs-10">
      
         <table class="table table-striped table-hover table-condensed">
          <tr>
            <thead>
              <h1>Champions</h1>
            </thead>
          </tr>
          <?php
            while($champ = mysqli_fetch_assoc($result)){
              echo'
                <tr>
                  <td>
                  <a href="champion.php?id='.$champ["champId"].'"><img style="width:120px" src="'.$champ["icon"].'"></a>    
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