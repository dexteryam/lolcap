<?php include 'include/header.php'; ?>
<?php
  $sql ="SELECT * FROM champions JOIN users ON(champions.userId = users.userId) WHERE champions.champId =".$_GET['id'];
  //echo $sql;
  $result = mysqli_query($conn, $sql);
  $champ = mysqli_fetch_assoc($result);
?>
<?php

  $skills = mysqli_fetch_assoc($result);
  $champId= $_GET['id'];
?>
<?php if($champ['userId']==$userId || $userId == 1){echo '<div align="right" style="float:right"><form method="POST" action="editChamp.php">    <button type="submit" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</button></div>';} ?>
  
<div class="container" style="width: 920px !important;">
  <div class="row">
    <div class="col-xs-12">
        <div class="col-xs-1"> 
           <img class='img-rounded' style="width:75px; height:75px" <?php echo 'src=\''.$champ['icon'].'\'>'; ?>
        </div>
        <div class="col-xs-6">
         <h1 style="padding-top:20px; padding-left:10px;"><?php echo $champ["name"]; ?><small> the <?php echo $champ['title']; ?></small></h1>
        </div>
         <div class="col-xs-3">
          <h4 style="padding-top:50px;">Created By: <?php echo  '<a href="user?username='.$champ['userName'].'">'.$champ['userName'];?></a></h4>
          
            <?php echo '<input type="hidden" name="editChampId" value='.$champId.'>'; ?>
          </form>
          
        </div>
          <div class="col-xs-1" style="padding-top:20px;">
          
          
            
           <?php
           if($userId != null){
             echo "<img id='rateup' rating=1 userId=".$userId." champId=".$champId." class='img-rounded img-responsive center-block' src='images/misc/thumbsup.png'>";
            }
            else{
              echo "<img id='login' rating=1 userId=".$userId." champId=".$champId." class='img-rounded img-responsive center-block' src='images/misc/thumbsup.png'>";
            }
             ?>
          <!-- <button class="btn btn-success" id="thumbsup" rating="1">Like!</button>-->
           <center><?php
             $sql ="SELECT COUNT(*) as totalLikes FROM ratinghistory WHERE champId =".$_GET['id']." AND liked = 1";
            //echo $sql;
            $result = mysqli_query($conn, $sql);
            $rating = mysqli_fetch_assoc($result);
            echo "<h5 id='likes'>".$rating['totalLikes']."</h5>";

           ?></center>

        </div>
          <div class="col-xs-1" style="padding-top:20px;">
            <?php
            if($userId != null){
              echo "<img id='ratedown' rating=0 userId=".$userId." champId=".$champId." class='img-rounded img-responsive center-block' src='images/misc/thumbsdown.png'>";
            }
            else{
              echo "<img id='login' rating=0 userId=".$userId." champId=".$champId." class='img-rounded img-responsive center-block' src='images/misc/thumbsdown.png'>";
            }
              ?>
           <!--<button class="btn btn-danger"> Meh</button>-->
           <center>
            <?php
             $sql ="SELECT COUNT(*) as totalLikes FROM ratinghistory WHERE champId =".$_GET['id']." AND liked = 0";
            //echo $sql;
            $result = mysqli_query($conn, $sql);
            $rating = mysqli_fetch_assoc($result);
            echo "<h5 id='dislikes'>".$rating['totalLikes']."</h5>";

           ?>
            
           </center>

        </div>

        <img class ='img-rounded img-responsive' style='width:1015px; height:557px;' <?php echo 'src=\''.$champ['splash'].'\'>'; ?>


    </div>
 

    <div class="col-xs-12" >
      <div class="col-xs-6">
        <h3 style="text-align: center;">Skills/Statistics</h3>
        <div class="well">
        
        <table class="table">
           <tr>
              <?php
                  
                   $sql ="SELECT * FROM skills WHERE champId =".$champId." ORDER BY skillOrder ASC";
                    
                    $result = mysqli_query($conn, $sql);
                    while($skills = mysqli_fetch_assoc($result)) {
                     echo '<td> <img style="width:100px" id=skill"'.$skills["active"].'" data-toggle="popoverSkill" title="'.$skills["skillName"].'" class="img-rounded img-responsive" src="'.$skills["icon"].'" data-toggle="popover" title="Popover title" data-content="';
                     
                     if($skills["active"]!=NULL){
                      if($skills["skillOrder"]==1){
                        echo nl2br($skills["active"])."</br>";
                      }else{
                      echo '<b>Active:</b>'.nl2br($skills["active"])."</br>";
                      }
                     }
                     if($skills["passive"]!=NULL){
                      echo '<b>Passive:</b>'.$skills["passive"]."</br>";
                     }
                     if($skills["misc"]!=NULL){
                      echo $skills["misc"]."</br>";
                     }
                     
                     $sql="SELECT * FROM skillproperties WHERE skillId=".$skills['skillId']." ORDER BY skillPropId ASC";
                     
                     $result2 =mysqli_query($conn, $sql);
                     while($skillProp = mysqli_fetch_assoc($result2)){
                      echo "</br><b>".$skillProp['propName'].":</b> ".$skillProp['propValues']."";
                     }
                     echo'"></td>';
                     
                     
                    }
                    
              ?>
 
            </tr>
          </table>
        </div>
    
    
        <table class="table">
        <?php
        $sql ="SELECT * FROM stats WHERE champId =".$champId;
        //echo $sql;
        $result = mysqli_query($conn, $sql);
        $stat = mysqli_fetch_assoc($result);
        
          echo'
          <tr>
            <td>
              <b>Health:</b> '.(float)$stat["health"].' (+'.(float)$stat["healthpl"].')
            </td>
             <td>
              <b>Atk Dmg:</b> '.(float)$stat["ad"].' (+'.(float)$stat["adpl"].')
            </td>
          </tr>  
                <tr>
            <td>
              <b>Health Rgn:</b> '.(float)$stat["healthRegen"].' (+'.(float)$stat["healthRegenpl"].')
            </td>
             <td>
              <b>Atk Spd:</b> '.(float)$stat["atkspd"].' (+'.(float)$stat["aspl"].'%)
            </td>
          </tr>
          <tr>
            <td>
              <b>Mana:</b> '.(float)$stat["mana"].' (+'.(float)$stat["manapl"].')
            </td>
             <td>
             <b> Armor:</b> '.(float)$stat["armor"].' (+'.(float)$stat["armor"].')
            </td>
          </tr>
          <tr>
            <td>
              <b>Mana Rgn:</b> '.(float)$stat["manaRegen"].' (+'.(float)$stat["manaRegenpl"].')
            </td>
             <td>
              <b>Magic Res:</b> '.(float)$stat["mr"].' (+'.(float)$stat["mrpl"].')
            </td>
          </tr>
                  <tr>
            <td>
              <b>Range:</b> '.(float)$stat["ranged"].'
            </td>
             <td>
              <b>Mov Spd:</b> '.(float)$stat["ms"].'
            </td>
          </tr>  
        </table>';
        ?>

    </div>
    <div class="col-xs-6">
      <h3 style="text-align: center;">Lore/Background</h3>
    <div class ="well" style="
      height: 35%;
      overflow-y: scroll;
      overflow-x: hidden;">
      <?php echo nl2br($champ['lore']); ?>
    </div>
    </div>
    </div>
    

          
          
  </div>
</div>

	  

<?php include 'include/footer.php'; ?>