<?php include 'include/header.php'; ?>
<?php
  //$sql ="SELECT * FROM champions JOIN users ON(champions.userId = users.userId) WHERE champions.champId =".$_GET['id'];
  //echo $sql;
  //$result = mysqli_query($conn, $sql);
//$champ = mysqli_fetch_assoc($result);
?>
<?php

  //$skills = mysqli_fetch_assoc($result);
  //$champId= $_GET['id'];
?>
<form action="processChamp.php" method="POST" enctype="multipart/form-data">
    <div align="right" style="float:right">
<button type="submit" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-saved" aria-hidden="true"></span>Save</button>
</div>
<input type="hidden" name="newChampFlag" value="0">
<div class="container" style="width: 920px !important;">
  <div class="row">
    <div class="col-xs-12">
        <div class="col-xs-2">
                  <span class="btn btn-default btn-file">
                  
                  <img class='img-rounded' id='icon' style="width:75px;" src="images/icons/champions/blanksquare.png">
                  Add Icon <input type="file" id="uploadIcon" name="imgIcon">
                </span>
           
        </div>
        
        <div class="col-xs-2">
         <h1 style="padding-top:20px; padding-left:10px;">
          <input type="text" name="champName" placeholder="Name" class="form-name">
        </div>
        
        <div class="col-xs-1">
          <h1 style="padding-top:40px; padding-left:0px;"><small> the </small></h1>
        </div>
        
        <div class="col-xs-3">
          <h1 style="padding-top:20px;"><input type="text" name="champTitle" placeholder="Title" class="form-name" ></h1>
        </div>
    
         <div class="col-xs-3">
          <h4 style="padding-top:50px;">Created By: <a href="user?username="><?php echo $userName; ?></a></h4>
         </div>

         <div class="col-xs-12">

        
                
                  <img class ='img-rounded img-responsive' style='width:1015px; height:557px;' id="splash" src="images/splash/blanksplash.png">
                  Add Splash <input type="file" id="uploadSplash" name="imgSplash">
                

    </div>
 

    <div class="col-xs-12" >
      <div class="col-xs-6">
        <h3 style="text-align: center;">Skills/Statistics</h3>
        <div class="well">
        
        <table class="table table-condensed">
           <tr>
              <td> <a href="#p" data-toggle="modal"><img style="width:100px" id="skillp" data-toggle="popoverSkill" title="Add Passive" class="img-rounded img-responsive" src="images/skills/blankP.jpg" data-toggle="popover" title="Popover title" data-content="Blank"></a></td>
              <td> <a href="#q" data-toggle="modal"><img style="width:100px" id="skillq" data-toggle="popoverSkill" title="Add Q" class="img-rounded img-responsive" src="images/skills/blankQ.jpg" data-toggle="popover" title="Popover title" data-content="Blank"></a></td>
              <td> <a href="#w" data-toggle="modal"><img style="width:100px" id="skillw" data-toggle="popoverSkill" title="Add W" class="img-rounded img-responsive" src="images/skills/blankW.jpg" data-toggle="popover" title="Popover title" data-content="Blank"></td>
              <td> <a href="#e" data-toggle="modal"><img style="width:100px" id="skille" data-toggle="popoverSkill" title="Add E" class="img-rounded img-responsive" src="images/skills/blankE.jpg" data-toggle="popover" title="Popover title" data-content="Blank"></td>
              <td> <a href="#r" data-toggle="modal"><img style="width:100px" id="skillr" data-toggle="popoverSkill" title="Add R" class="img-rounded img-responsive" src="images/skills/blankR.jpg" data-toggle="popover" title="Popover title" data-content="Blank"></td>
            </tr>
          </table>
        </div>
    
        <!-- <form class="form-inline"> -->
            <div class="col-xs-3">
               Health<input type="text" class="form-stats" placeholder="Health" value="0" name="health">
            </div>
            
            <div class="col-xs-3">
              +<input type="text" class="form-mainstat" placeholder="+per lvl" value="0" name="healthpl">
            </div>
       
            <div class="col-xs-3">
               Atk Dmg<input type="text" class="form-stats" placeholder="Atk Dmg" value="0" name="ad">
            </div>
            <div class="col-xs-3">
              +<input type="text" class="form-mainstat" placeholder="+per lvl" value="0" name="adpl">
            </div>
         
            <div class="col-xs-3">
               Health Rgn<input type="text" class="form-stats" placeholder="Health Rgn" value="0" name="healthregen">
            </div>
            
            <div class="col-xs-3">
             +<input type="text" class="form-mainstat" placeholder="+per lvl"  value="0" name="healthregenpl">
            </div>
       
            <div class="col-xs-3">
              Atk Spd <input type="text" class="form-stats" placeholder="Atk Spd"  value="0" name="atkspd">
            </div>
            <div class="col-xs-3">
              +<input type="text" class="form-mainstat" placeholder="+per lvl"  value="0" name="aspl">
            </div>
            
            <div class="col-xs-3">
               Mana<input type="text" class="form-stats" placeholder="Mana" value="0" name="mana">
            </div>
            
            <div class="col-xs-3">
             +<input type="text" class="form-mainstat" placeholder="+per lvl" value="0" name="manapl">
            </div>
       
            <div class="col-xs-3">
              Armor <input type="text" class="form-stats" placeholder="Armor" value="0" name="armor">
            </div>
            <div class="col-xs-3">
              +<input type="text" class="form-mainstat" placeholder="+per lvl" value="0" name="armorpl">
            </div>
            
            <div class="col-xs-3">
               Mana Rgn<input type="text" class="form-stats" placeholder="Mana Rgn" value="0" name="manaregen">
            </div>
            
            <div class="col-xs-3">
             +<input type="text" class="form-mainstat" placeholder="+per lvl" value="0" name="manaregenpl">
            </div>
       
            <div class="col-xs-3">
               Magic Res<input type="text" class="form-stats" placeholder="Magic Res" value="0" name="mr">
            </div>
            <div class="col-xs-3">
              +<input type="text" class="form-mainstat" placeholder="+per lvl" value="0" name="mrpl">
            </div>
            
            <div class="col-xs-3">
               Ranged<input type="text" class="form-stats" placeholder="Range" value="0" name="ranged">
            </div>
            
            <div class="col-xs-3">
             
            </div>
       
            <div class="col-xs-3">
               Mov Spd<input type="text" class="form-stats" placeholder="Mov Spd" value="0" name="ms">
            </div>
            <div class="col-xs-3">
              
            </div>
         

    
    
    <!-- 
        <table class="table">

          <tr>
            <td>
              <b>Health:</b> <input type="text" class="form-stats" placeholder="Health"><input type="text" class="form-stats" placeholder="+ per level">
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
        </table> -->
 

    </div>
    <div class="col-xs-6">
      <h3 style="text-align: center;">Lore/Background</h3>
    <div class ="well" style="
      height: 35%;
      overflow-y: scroll;
      overflow-x: hidden;">
      <textarea class="form-control" rows="13" name="lore"></textarea>
    </div>
    </div>
    </div>
    

          
          
  </div>
</div>

<!-- Modals -->
<!-- P -->
<div class="modal fade" id="p" role="dialogue">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      </div>
      <div class="modal-body">
          <table class="table" id="myTablep">
            <tr>
              <input type="text" class="form-control" placeholder="Skill Name" name="pname">
            </tr>
            <tr>
              <textarea class="form-control" rows="4" placeholder="Description" name="pdesc"></textarea>
            </tr>
            <tr>
              <td>
                <input class="btn btn-default" type="button" value="Add Property" onClick="addRow('p')">
                </td>
              <td>
                <span class="btn btn-primary btn-file">
                  
                <img id="modalp" class="img-rounded img-responsive" src="images/skills/blankP.jpg" >
                  Add Icon <input type="file" id="uploadP" name="imgp">
                </span>
              </td>
            </tr>
            <tr>
              <td>
                <input type="hidden" name="pup[]" value="0">
                <input type="text" class="form-control" name="pprops[]" placeholder="Type eg(Active, Slow, etc)">
              </td>
              <td>
                <input type="text" class="form-control" name="pvals[]" placeholder="Values eg(10/30/50)+20% AP">
              </td>
            </tr>
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
              <input type="text" class="form-control" placeholder="Skill Name" name="qname">
            </tr>
            <tr>
              <textarea class="form-control" rows="4" placeholder="Description" name="qdesc"></textarea>
            </tr>
            <tr>
              <td>
                <input class="btn btn-default" type="button" value="Add Property" onClick="addRow('q')">
                </td>
              <td>
                <span class="btn btn-primary btn-file">
                  
                  <img id="modalq" class="img-rounded img-responsive" src="images/skills/blankQ.jpg" >
                  Add Icon <input type="file" id="uploadQ" name="imgq">
                </span>
              </td>
            </tr>
            <tr>
              <td>
                <input type="hidden" name="qup[]" value="0">
                <input type="text" class="form-control" name="qprops[]" placeholder="Type eg(Active, Slow, etc)">
              </td>
              <td>
                <input type="text" class="form-control" name="qvals[]" placeholder="Values eg(10/30/50)+20% AP">
              </td>
            </tr>
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
              <input type="text" class="form-control" placeholder="Skill Name" name="wname">
            </tr>
            <tr>
              <textarea class="form-control" rows="4" placeholder="Description" name="wdesc"></textarea>
            </tr>
            <tr>
              <td>
                <input class="btn btn-default" type="button" value="Add Property" onClick="addRow('w')">
                </td>
              <td>
                <span class="btn btn-primary btn-file">
                  
                <img id="modalw" class="img-rounded img-responsive" src="images/skills/blankW.jpg" >
                  Add Icon <input type="file" id="uploadW" name="imgw">
                </span>
              </td>
            </tr>
            <tr>
              <td>
                <input type="hidden" name="wup[]" value="0">
                <input type="text" class="form-control" name="wprops[]" placeholder="Type eg(Active, Slow, etc)">
              </td>
              <td>
                <input type="text" class="form-control" name="wvals[]" placeholder="Values eg(10/30/50)+20% AP">
              </td>
            </tr>
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
              <input type="text" class="form-control" placeholder="Skill Name" name="ename">
            </tr>
            <tr>
              <textarea class="form-control" rows="4" placeholder="Description" name="edesc"></textarea>
            </tr>
            <tr>
              <td>
                <input class="btn btn-default" type="button" value="Add Property" onClick="addRow('e')">
                </td>
              <td>
                <span class="btn btn-primary btn-file">
                  
                <img id="modale" class="img-rounded img-responsive" src="images/skills/blankE.jpg" >
                  Add Icon <input type="file" id="uploadE" name="imge">
                </span>
              </td>
            </tr>
            <tr>
              <td>
                <input type="hidden" name="eup[]" value="0">
                <input type="text" class="form-control" name="eprops[]" placeholder="Type eg(Active, Slow, etc)">
              </td>
              <td>
                <input type="text" class="form-control" name="evals[]" placeholder="Values eg(10/30/50)+20% AP">
              </td>
            </tr>
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
              <input type="text" class="form-control" placeholder="Skill Name" name="rname">
            </tr>
            <tr>
              <textarea class="form-control" rows="4" placeholder="Description" name="rdesc"></textarea>
            </tr>
            <tr>
              <td>
                <input class="btn btn-default" type="button" value="Add Property" onClick="addRow('r')">
                </td>
              <td>
                <span class="btn btn-primary btn-file">
                  
                <img id="modalr" class="img-rounded img-responsive" src="images/skills/blankR.jpg" >
                  Add Icon <input type="file" id="uploadR" name="imgr">
                </span>
              </td>
            </tr>
            <tr>
              <td>
                <input type="hidden" name="rup[]" value="0">
                <input type="text" class="form-control" name="rprops[]" placeholder="Type eg(Active, Slow, etc)">
              </td>
              <td>
                <input type="text" class="form-control" name="rvals[]" placeholder="Values eg(10/30/50)+20% AP">
              </td>
            </tr>
          </table>
      </div>
    </div>
</div>
  
  
</form>
<?php include 'include/footer.php'; ?>