<?php include 'include/header.php'; ?>
<?php
  $champId=$_POST['editChampId'];

  $sql ="SELECT * FROM champions WHERE champions.champId =".$champId;
  $result = mysqli_query($conn, $sql);
  $champ = mysqli_fetch_assoc($result);
  
  $sql ="SELECT * FROM skills WHERE skillOrder=1 AND champId =".$champId;
  $result = mysqli_query($conn, $sql);
  $skill1 = mysqli_fetch_assoc($result);
  
  $sql ="SELECT * FROM skills WHERE skillOrder=2 AND champId =".$champId;
  $result = mysqli_query($conn, $sql);
  $skill2 = mysqli_fetch_assoc($result);
  
  $sql ="SELECT * FROM skills WHERE skillOrder=3 AND champId =".$champId;
  $result = mysqli_query($conn, $sql);
  $skill3 = mysqli_fetch_assoc($result);
  
  $sql ="SELECT * FROM skills WHERE skillOrder=4 AND champId =".$champId;
  $result = mysqli_query($conn, $sql);
  $skill4 = mysqli_fetch_assoc($result);
  
  $sql ="SELECT * FROM skills WHERE skillOrder=5 AND champId =".$champId;
  $result = mysqli_query($conn, $sql);
  $skill5 = mysqli_fetch_assoc($result);
  
  $sql ="SELECT * FROM stats WHERE champId =".$champId;
  $result = mysqli_query($conn, $sql);
  $stats = mysqli_fetch_assoc($result);
  
  $sql ="SELECT * FROM skillproperties RIGHT JOIN skills ON(skillproperties.skillId = skills.skillId) WHERE skills.skillOrder=1 AND skills.champId =".$champId;
  $result = mysqli_query($conn, $sql);
  $pprops=[];
  $pvals=[];
  $pup=[];
  while($prop1 = mysqli_fetch_assoc($result)){
    array_push($pup,$prop1['skillPropId']);
    array_push($pprops,$prop1['propName']);
    array_push($pvals,$prop1['propValues']);
  }

  $sql ="SELECT * FROM skillproperties RIGHT JOIN skills ON(skillproperties.skillId = skills.skillId) WHERE skills.skillOrder=2 AND skills.champId =".$champId;
  $result = mysqli_query($conn, $sql);
  $qprops=[];
  $qvals=[];
  $qup=[];
  while($prop2 = mysqli_fetch_assoc($result)){
    array_push($qup,$prop2['skillPropId']);
    array_push($qprops,$prop2['propName']);
    array_push($qvals,$prop2['propValues']);
  }

  $sql ="SELECT * FROM skillproperties RIGHT JOIN skills ON(skillproperties.skillId = skills.skillId) WHERE skills.skillOrder=3 AND skills.champId =".$champId;
  $result = mysqli_query($conn, $sql);
  $wprops=[];
  $wvals=[];
  $wup=[];
  while($prop3 = mysqli_fetch_assoc($result)){
    array_push($wup,$prop3['skillPropId']);
    array_push($wprops,$prop3['propName']);
    array_push($wvals,$prop3['propValues']);
  }
  
  $sql ="SELECT * FROM skillproperties RIGHT JOIN skills ON(skillproperties.skillId = skills.skillId) WHERE skills.skillOrder=4 AND skills.champId =".$champId;
  $result = mysqli_query($conn, $sql);
  $eprops=[];
  $evals=[];
  $eup=[];
  while($prop4 = mysqli_fetch_assoc($result)){
    array_push($eup,$prop4['skillPropId']);
    array_push($eprops,$prop4['propName']);
    array_push($evals,$prop4['propValues']);
  }
  
  $sql ="SELECT * FROM skillproperties RIGHT JOIN skills ON(skillproperties.skillId = skills.skillId) WHERE skills.skillOrder=5 AND skills.champId =".$champId;
  $result = mysqli_query($conn, $sql);
  $rprops=[];
  $rvals=[];
  $rup=[];
  while($prop5 = mysqli_fetch_assoc($result)){
    array_push($rup,$prop5['skillPropId']);
    array_push($rprops,$prop5['propName']);
    array_push($rvals,$prop5['propValues']);
  }
?>

<form action="deleteChamp.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
<div align="right" style="float:right">
   <?php echo'<input type="hidden" name="champId" value="'.$champId.'">'; ?>
  <button type="submit" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-remove" aria-hidden="true" onclick="return confirm('Are you sure?')" ></span>Delete</button>
</div>
</form>

<form action="processChamp.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
  <div align="right" style="float:right">
<button type="submit" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-saved" aria-hidden="true"></span>Save</button>
</div>
<?php echo'<input type="hidden" name="newChampFlag" value="'.$champId.'">'; ?>
<div class="container" style="width: 920px !important;">
  <div class="row">
    <div class="col-xs-12">
        <div class="col-xs-2">
                  <span class="btn btn-default btn-file">
                  
                 <?php echo  "<img class='img-rounded' id='icon' style='width:75px;' src='".$champ['icon']."'>"; ?>
                  Add Icon <input type="file" id="uploadIcon" name="imgIcon">
                </span>
           
        </div>
        
        <div class="col-xs-2">
         <h1 style="padding-top:20px; padding-left:10px;">
          <?php echo '<input type="text" name="champName" value="'.$champ['name'].'" class="form-name">'; ?>
        </div>
        
        <div class="col-xs-1">
          <h1 style="padding-top:40px; padding-left:0px;"><small> the </small></h1>
        </div>
        
        <div class="col-xs-3">
          <?php echo '<h1 style="padding-top:20px;"><input type="text" name="champTitle" value="'.$champ['title'].'" class="form-name" ></h1>'; ?>
        </div>
    
         <div class="col-xs-3">
          <h4 style="padding-top:50px;">Created By: <a href="user?username="><?php echo $userName; ?></a></h4>
         </div>

         <div class="col-xs-12">

        
                
                 <?php echo "<img class ='img-rounded img-responsive' style='width:1015px; height:557px;' id='splash' src='".$champ['splash']."'>" ?>
                  Add Splash <input type="file" id="uploadSplash" name="imgSplash">
                

    </div>
 

    <div class="col-xs-12" >
      <div class="col-xs-6">
        <h3 style="text-align: center;">Skills/Statistics</h3>
        <div class="well">
        
        <table class="table table-condensed">
           <tr>
              <?php /*echo '<td> <a href="#p" data-toggle="modal"><img style="width:100px" id="skillp" data-toggle="popoverSkill" title="Add Passive" class="img-rounded img-responsive" src="'.$skill1['icon'].'" data-toggle="popover" title="Popover title" data-content="Blank"></a></td>
              <td> <a href="#q" data-toggle="modal"><img style="width:100px" id="skillq" data-toggle="popoverSkill" title="Add Q" class="img-rounded img-responsive" src="'.$skill2['icon'].'" data-toggle="popover" title="Popover title" data-content="Blank"></a></td>
              <td> <a href="#w" data-toggle="modal"><img style="width:100px" id="skillw" data-toggle="popoverSkill" title="Add W" class="img-rounded img-responsive" src="'.$skill3['icon'].'" data-toggle="popover" title="Popover title" data-content="Blank"></td>
              <td> <a href="#e" data-toggle="modal"><img style="width:100px" id="skille" data-toggle="popoverSkill" title="Add E" class="img-rounded img-responsive" src="'.$skill4['icon'].'" data-toggle="popover" title="Popover title" data-content="Blank"></td>
              <td> <a href="#r" data-toggle="modal"><img style="width:100px" id="skillr" data-toggle="popoverSkill" title="Add R" class="img-rounded img-responsive" src="'.$skill5['icon'].'" data-toggle="popover" title="Popover title" data-content="Blank"></td>
              '; */?>
                            <?php
                  
                   $sql ="SELECT * FROM skills WHERE champId =".$champId." ORDER BY skillOrder ASC";
                   $i;
                    
                    $result = mysqli_query($conn, $sql);
                    while($skills = mysqli_fetch_assoc($result)) {
                    switch($skills['skillOrder']){
                      case 1:
                        $i="p";
                        break;
                      case 2:
                        $i="q";
                        break;
                      case 3:
                        $i="w";
                        break;
                      case 4:
                        $i="e";
                        break;
                      case 5:
                        $i="r";
                        break;
                    }
                     echo '<td> <a href="#'.$i.'" data-toggle="modal"><img id=skill"'.$skills["active"].'" data-toggle="popoverSkill" title="'.$skills["skillName"].'" class="img-rounded img-responsive" src="'.$skills["icon"].'" data-toggle="popover" title="Popover title" data-content="';
                     
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
                     
                     $sql="SELECT * FROM skillproperties WHERE skillId=".$skills['skillId'];
                     
                     $result2 =mysqli_query($conn, $sql);
                     while($skillProp = mysqli_fetch_assoc($result2)){
                      echo "</br><b>".$skillProp['propName'].":</b> ".$skillProp['propValues']."";
                     }
                     echo'"></a></td>';
                     
                     
                    }
                    
              ?>
            </tr>
          </table>
        </div>
    
        <!-- <form class="form-inline"> -->
        <?php echo '
            <div class="col-xs-3">
                Health <input type="text" class="form-stats" placeholder="Health" value="'.$stats['health'].'" name="health">
            </div>
            
            <div class="col-xs-3">
              + <input type="text" class="form-mainstat" placeholder="+per lvl" value="'.$stats['healthpl'].'" name="healthpl">
            </div>
       
            <div class="col-xs-3">
               Atk Dmg <input type="text" class="form-stats" placeholder="Atk Dmg" value="'.$stats['ad'].'" name="ad">
            </div>
            <div class="col-xs-3">
              + <input type="text" class="form-mainstat" placeholder="+per lvl" value="'.$stats['adpl'].'" name="adpl">
            </div>
         
            <div class="col-xs-3">
               Health Rgn: <input type="text" class="form-stats" placeholder="Health Rgn" value="'.$stats['healthRegen'].'" name="healthregen">
            </div>
            
            <div class="col-xs-3">
             + <input type="text" class="form-mainstat" placeholder="+per lvl" value="'.$stats['healthRegenpl'].'"  name="healthregenpl">
            </div>
       
            <div class="col-xs-3">
              Atk Spd <input type="text" class="form-stats" placeholder="Atk Spd" value="'.$stats['atkspd'].'"  name="atkspd">
            </div>
            <div class="col-xs-3">
              + <input type="text" class="form-mainstat" placeholder="+per lvl"  value="'.$stats['aspl'].'" name="aspl">
            </div>
            
            <div class="col-xs-3">
               Mana <input type="text" class="form-stats" placeholder="Mana" value="'.$stats['mana'].'" name="mana">
            </div>
            
            <div class="col-xs-3">
             +<input type="text" class="form-mainstat" placeholder="+per lvl" value="'.$stats['manapl'].'" name="manapl">
            </div>
       
            <div class="col-xs-3">
               Armor <input type="text" class="form-stats" placeholder="Armor" value="'.$stats['armor'].'" name="armor">
            </div>
            <div class="col-xs-3">
              + <input type="text" class="form-mainstat" placeholder="+per lvl" value="'.$stats['armorpl'].'" name="armorpl">
            </div>
            
            <div class="col-xs-3">
               Mana Rgn<input type="text" class="form-stats" placeholder="Mana Rgn" value="'.$stats['manaRegen'].'" name="manaregen">
            </div>
            
            <div class="col-xs-3">
             + <input type="text" class="form-mainstat" placeholder="+per lvl" value="'.$stats['manaRegenpl'].'" name="manaregenpl">
            </div>
       
            <div class="col-xs-3">
               Magic Res <input type="text" class="form-stats" placeholder="Magic Res" value="'.$stats['mr'].'" name="mr">
            </div>
            <div class="col-xs-3">
             + <input type="text" class="form-mainstat" placeholder="+per lvl" value="'.$stats['mrpl'].'" name="mrpl">
            </div>
            
            <div class="col-xs-3">
               Range <input type="text" class="form-stats" placeholder="Range" value="'.$stats['ranged'].'" name="ranged">
            </div>
            
            <div class="col-xs-3">
             
            </div>
       
            <div class="col-xs-3">
               Mov Spd<input type="text" class="form-stats" placeholder="Mov Spd"  value="'.$stats['ms'].'" name="ms">
            </div>
            <div class="col-xs-3">
              
            </div>
            '; ?>


    </div>
    <div class="col-xs-6">
      <h3 style="text-align: center;">Lore/Background</h3>
    <div class ="well" style="
      height: 35%;
      overflow-y: scroll;
      overflow-x: hidden;">
      <?php echo'<textarea class="form-control" rows="13" name="lore">'.nl2br($champ['lore']).'</textarea>'; ?>
    </div>
    </div>
    </div>
    

          
          
  </div>
</div>

<!-- Modals -->
<!-- P -->
<?php echo'
<div class="modal fade" id="p" role="dialogue">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      </div>
      <div class="modal-body">
          <table class="table" id="myTablep">
            <tr>
              <input type="text" class="form-control" placeholder="Skill Name" name="pname" value="'.$skill1['skillName'].'">
            </tr>
            <tr>
              <textarea class="form-control" rows="4" placeholder="Description" name="pdesc">'.$skill1['active'].'</textarea>
            </tr>
            <tr>
              <td>
                <input class="btn btn-default" type="button" value="Add Property" onClick="addRow(\'p\')">
                </td>
              <td>
                <span class="btn btn-primary btn-file">
                  
                <img id="modalp" class="img-rounded img-responsive" src="'.$skill1['icon'].'" >
                  Add Icon <input type="file" id="uploadP" name="imgp">
                </span>
              </td>
            </tr>
           ';
            for($i=0;$i<count($pprops);$i++){
              echo'
               <tr id="p'.$i.'">
               <td>
                <input id="pup'.$i.'" type="hidden" name="pup[]" value="'.$pup[$i].'">
                <input type="text" class="form-control" name="pprops[]" value="'.$pprops[$i].'" placeholder="Type eg(Active, Slow, etc)">
              </td>
              <td>
                <input type="text" class="form-control" name="pvals[]" value="'.$pvals[$i].'" placeholder="Values eg(10/30/50)+20% AP">
              </td>
              <td>
                <span class="btn btn-danger" onclick="removeProp('.$i.',\'p\')">'.$i.'</span>
              </td>
              </tr>
              ';
            }
             echo '
            
          </table>
      </div>
    </div>
  </div>
</div>
<!-- Q -->
<div class="modal fade" id="q" role="dialogue">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      </div>
      <div class="modal-body">
          <table class="table" id="myTableq">
            <tr>
              <input type="text" class="form-control" placeholder="Skill Name" name="qname" value="'.$skill2['skillName'].'">
            </tr>
            <tr>
              <textarea class="form-control" rows="4" placeholder="Description" name="qdesc">'.$skill2['active'].'</textarea>
            </tr>
            <tr>
              <td>
                <input class="btn btn-default" type="button" value="Add Property" onClick="addRow(\'q\')">
                </td>
              <td>
                <span class="btn btn-primary btn-file">
                  
                  <img id="modalq" class="img-rounded img-responsive" src="'.$skill2['icon'].'" >
                  Add Icon <input type="file" id="uploadQ" name="imgq">
                </span>
              </td>
            </tr>
            ';
            for($i=0;$i<count($qprops);$i++){
              echo'<tr id="q'.$i.'">
               <td>
               <input id="qup'.$i.'" type="hidden" name="qup[]" value="'.$qup[$i].'">
                <input type="text" class="form-control" name="qprops[]" value="'.$qprops[$i].'" placeholder="Type eg(Active, Slow, etc)">
              </td>
              <td>
                <input type="text" class="form-control" name="qvals[]" value="'.$qvals[$i].'" placeholder="Values eg(10/30/50)+20% AP">
              </td>
              <td>
                <span class="btn btn-danger" onclick="removeProp('.$i.',\'q\')">x</span>
              </td>
              </tr>
              ';
            }
            echo'
            
          </table>
      </div>
    </div>
  </div>
</div>
<!-- W -->
<div class="modal fade" id="w" role="dialogue">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      </div>
      <div class="modal-body">
          <table class="table" id="myTablew">
            <tr>
              <input type="text" class="form-control" placeholder="Skill Name" name="wname" value="'.$skill3['skillName'].'">
            </tr>
            <tr>
              <textarea class="form-control" rows="4" placeholder="Description" name="wdesc">'.$skill3['active'].'</textarea>
            </tr>
            <tr>
              <td>
                <input class="btn btn-default" type="button" value="Add Property" onClick="addRow(\'w\')">
                </td>
              <td>
                <span class="btn btn-primary btn-file">
                  
                <img id="modalw" class="img-rounded img-responsive" src="'.$skill3['icon'].'" >
                  Add Icon <input type="file" id="uploadW" name="imgw">
                </span>
              </td>
            </tr>
            ';
            for($i=0;$i<count($wprops);$i++){
              echo'
            <tr id="w'.$i.'">
              <td>
                <input id="wup'.$i.'" type="hidden" name="wup[]" value="'.$wup[$i].'">
                <input type="text" class="form-control" name="wprops[]"  value="'.$wprops[$i].'" placeholder="Type eg(Active, Slow, etc)">
              </td>
              <td>
                <input type="text" class="form-control" name="wvals[]"  value="'.$wvals[$i].'" placeholder="Values eg(10/30/50)+20% AP">
              </td>
              <td>
                <span class="btn btn-danger" onclick="removeProp('.$i.',\'w\')">x</span>
              </td>
            </tr>
            ';
            }
            echo'
          </table>
      </div>
    </div>
  </div>
</div>
<!-- e -->
<div class="modal fade" id="e" role="dialogue">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      </div>
      <div class="modal-body">
          <table class="table" id="myTablee">
            <tr>
              <input type="text" class="form-control" placeholder="Skill Name" name="ename" value="'.$skill4['skillName'].'">
            </tr>
            <tr>
              <textarea class="form-control" rows="4" placeholder="Description" name="edesc">'.$skill4['active'].'</textarea>
            </tr>
            <tr>
              <td>
                <input class="btn btn-default" type="button" value="Add Property" onClick="addRow(\'e\')">
                </td>
              <td>
                <span class="btn btn-primary btn-file">
                  
                <img id="modale" class="img-rounded img-responsive" src="'.$skill4['icon'].'" >
                  Add Icon <input type="file" id="uploadE" name="imge">
                </span>
              </td>
            </tr>
            ';
            for($i=0;$i<count($eprops);$i++){
              echo'
            <tr id="e'.$i.'">
              <td>
                <input id="eup'.$i.'" type="hidden" name="eup[]" value="'.$eup[$i].'">
                <input type="text" class="form-control" name="eprops[]"  value="'.$eprops[$i].'" placeholder="Type eg(Active, Slow, etc)">
              </td>
              <td>
                <input type="text" class="form-control" name="evals[]"  value="'.$evals[$i].'" placeholder="Values eg(10/30/50)+20% AP">
              </td>
              <td>
                <span class="btn btn-danger" onclick="removeProp('.$i.',\'e\')">x</span>
              </td>
            </tr>
            ';
            }
            echo'
          </table>
      </div>
    </div>
  </div>
</div>
<!-- R -->
<div class="modal fade" id="r" role="dialogue">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      </div>
      <div class="modal-body">
          <table class="table" id="myTabler">
            <tr>
              <input type="text" class="form-control" placeholder="Skill Name" name="rname" value="'.$skill5['skillName'].'">
            </tr>
            <tr>
              <textarea class="form-control" rows="4" placeholder="Description" name="rdesc">'.$skill5['active'].'</textarea>
            </tr>
    
            <tr>
              <td>
                <input class="btn btn-default" type="button" value="Add Property" onClick="addRow(\'r\')">
                </td>
              <td>
                <span class="btn btn-primary btn-file">
                  
                <img id="modalr" class="img-rounded img-responsive" src="'.$skill5['icon'].'" >
                  Add Icon <input type="file" id="uploadR" name="imgr">
                </span>
              </td>
            </tr>
                    ';
            for($i=0;$i<count($rprops);$i++){
              echo'
            <tr id="r'.$i.'">
              <td>
                <input id="rup'.$i.'" type="hidden" name="rup[]" value="'.$rup[$i].'">
                <input type="text" class="form-control" name="rprops[]"  value="'.$rprops[$i].'" placeholder="Type eg(Active, Slow, etc)">
              </td>
              <td>
                <input type="text" class="form-control" name="rvals[]"  value="'.$rvals[$i].'" placeholder="Values eg(10/30/50)+20% AP">
              </td>
              <td>
                <span class="btn btn-danger" onclick="removeProp('.$i.',\'r\')">x</span>
              </td>
            </tr>
            ';
            }
            echo'
          </table>
      </div>
    </div>
</div>
  ';
  ?>
  
</form>
<?php include 'include/footer.php'; ?>