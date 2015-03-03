<?php
include 'include/dbTools.php';
include 'include/header.php';

$champFlag= $_POST['newChampFlag'];
$champId=$champFlag;

$pprops= $_POST['pprops'];
$pvals= $_POST['pvals'];
$qprops= $_POST['qprops'];
$qvals= $_POST['qvals'];
$wprops= $_POST['wprops'];
$wvals= $_POST['wvals'];
$eprops= $_POST['eprops'];
$evals= $_POST['evals'];
$rprops= $_POST['rprops'];
$rvals= $_POST['rvals'];
$pup= $_POST['pup'];
$qup= $_POST['qup'];
$wup= $_POST['wup'];
$eup= $_POST['eup'];
$rup= $_POST['rup'];
$pflag=0;
$qflag=0;
$wflag=0;
$eflag=0;
$rflag=0;
$health=$_POST['health'];
$healthpl=$_POST['healthpl'];
$healthregen= $_POST['healthregen'];
$healthregenpl=$_POST['healthregenpl'];
$mana=$_POST['mana'];
$manapl=$_POST['manapl'];
$manaregen=$_POST['manaregen'];
$manaregenpl=$_POST['manaregenpl'];
$ad=$_POST['ad'];
$adpl=$_POST['adpl'];
$atkspd=$_POST['atkspd'];
$aspl=$_POST['aspl'];
$armor=$_POST['armor'];
$armorpl=$_POST['armorpl'];
$mr=$_POST['mr'];
$mrpl=$_POST['mrpl'];
$ms=$_POST['ms'];
$ranged=$_POST['ranged'];

//echo $champId;

if($champId==0){
    $sql='INSERT INTO champions(name,title,lore,userId) VALUES("'.$_POST['champName'].'","'.$_POST['champTitle'].'","'.$_POST['lore'].'","'.$_SESSION['userId'].'")';
    //echo $sql;
    mysqli_query($conn, $sql);
    $champId=mysqli_insert_id($conn);
    mkdir('images/skills/'.$champId);
    
    $splashPath="images/splash/blanksplash.png";
    $iconPath="images/icons/champions/blanksquare.png";
    
    if($_FILES["imgSplash"]["tmp_name"]!==""){
        $splashPath="images/splash/".$champId."_splash.jpg";
        move_uploaded_file($_FILES["imgSplash"]["tmp_name"], $splashPath);
    }
    if($_FILES["imgIcon"]["tmp_name"]!==""){
        $iconPath="images/icons/champions/".$champId."square.jpg";
        move_uploaded_file($_FILES["imgIcon"]["tmp_name"], $iconPath);
    }
    $sql = 'UPDATE champions SET icon="'.$iconPath.'", splash="'.$splashPath.'" WHERE champId='.$champId;
    mysqli_query($conn, $sql);
}else{
    if($_FILES["imgSplash"]["tmp_name"]!==""){
        $splashPath="images/splash/".$champId."_splash.jpg";
        move_uploaded_file($_FILES["imgSplash"]["tmp_name"], $splashPath);
        $sql = 'UPDATE champions SET splash="'.$splashPath.'" WHERE champId='.$champId;
        mysqli_query($conn, $sql);
    }
    if($_FILES["imgIcon"]["tmp_name"]!==""){
        $iconPath="images/icons/champions/".$champId."square.jpg";
        move_uploaded_file($_FILES["imgIcon"]["tmp_name"], $iconPath);
        $sql = 'UPDATE champions SET icon="'.$iconPath.'" WHERE champId='.$champId;
        mysqli_query($conn, $sql);
    }
}
$sql = 'UPDATE champions SET lore="'.$_POST['lore'].'", name="'.$_POST['champName'].'", title="'.$_POST['champTitle'].'" WHERE champId='.$champId;
mysqli_query($conn, $sql);





if($champFlag==0){
    $ppath="images/skills/blankP.jpg";
    $qpath="images/skills/blankQ.jpg";
    $wpath="images/skills/blankW.jpg";
    $epath="images/skills/blankE.jpg";
    $rpath="images/skills/blankR.jpg";
    $splashpath="image/skills/blankSplash.jpg";
}
if($_FILES["imgp"]["tmp_name"]!==""){
    move_uploaded_file($_FILES["imgp"]["tmp_name"], "images/skills/".$champId."/skill1.jpg");
    $ppath="images/skills/".$champId."/skill1.jpg";
    if($champFlag!=0){
        $pflag=1;
    }
}
if($_FILES["imgq"]["tmp_name"]!==""){
    move_uploaded_file($_FILES["imgq"]["tmp_name"], "images/skills/".$champId."/skill2.jpg");
    $qpath="images/skills/".$champId."/skill2.jpg";
    if($champFlag!=0){
        $qflag=1;
    }
}
if($_FILES["imgw"]["tmp_name"]!==""){
    move_uploaded_file($_FILES["imgw"]["tmp_name"], "images/skills/".$champId."/skill3.jpg");
    $wpath="images/skills/".$champId."/skill3.jpg";
    if($champFlag!=0){
        $wflag=1;
    }
}
if($_FILES["imge"]["tmp_name"]!==""){
    move_uploaded_file($_FILES["imge"]["tmp_name"], "images/skills/".$champId."/skill4.jpg");
    $epath="images/skills/".$champId."/skill4.jpg";
    if($champFlag!=0){
        $eflag=1;
    }
}
if($_FILES["imgr"]["tmp_name"]!==""){
    move_uploaded_file($_FILES["imgr"]["tmp_name"], "images/skills/".$champId."/skill5.jpg");
    $rpath="images/skills/".$champId."/skill5.jpg";
    if($champFlag!=0){
        $rflag=1;
    }
}


if($champFlag==0){
$sql='INSERT INTO skills(champId,skillName,active,skillOrder,icon) VALUES('.$champId.',"'.$_POST['pname'].'","'.$_POST['pdesc'].'",1,"'.$ppath.'")';
mysqli_query($conn, $sql);
$skillid=mysqli_insert_id($conn);
}
else{
$sql='SELECT skillId FROM skills WHERE champId='.$champId.' AND skillOrder=1';
$result=mysqli_query($conn, $sql);
$skill=mysqli_fetch_assoc($result);
$skillid=$skill['skillId'];
if($pflag==1){
    $sql='UPDATE skills SET icon="'.$ppath.'" WHERE skillId='.$skillid;
    mysqli_query($conn, $sql);
}
$sql='UPDATE skills SET skillName="'.$_POST['pname'].'", active="'.$_POST['pdesc'].'" WHERE skillId='.$skillid;
mysqli_query($conn, $sql);
}
$sql='DELETE FROM skillproperties WHERE skillPropId NOT IN ('.implode(",",$pup).') AND skillId='.$skillid;
mysqli_query($conn, $sql);
for($i=0; $i<count($pprops); $i++){
    if($pup[$i]==0){
        $sql='INSERT INTO skillproperties(skillId,propName,propValues) VALUES('.$skillid.',"'.$pprops[$i].'","'.$pvals[$i].'")';
        mysqli_query($conn, $sql);
    }

    else{
        $sql='UPDATE skillproperties SET propName="'.$pprops[$i].'", propValues="'.$pvals[$i].'" WHERE skillPropId='.$pup[$i];
        mysqli_query($conn, $sql);
    }

}

if($champFlag==0){
$sql='INSERT INTO skills(champId,skillName,active,skillOrder,icon) VALUES('.$champId.',"'.$_POST['qname'].'","'.$_POST['qdesc'].'",2,"'.$qpath.'")';
mysqli_query($conn, $sql);
$skillid=mysqli_insert_id($conn);
}
else{
$sql='SELECT skillId FROM skills WHERE champId='.$champId.' AND skillOrder=2';
$result=mysqli_query($conn, $sql);
$skill=mysqli_fetch_assoc($result);
$skillid=$skill['skillId'];
if($qflag==1){
    $sql='UPDATE skills SET icon="'.$qpath.'" WHERE skillId='.$skillid;
    mysqli_query($conn, $sql);
}
$sql='UPDATE skills SET skillName="'.$_POST['qname'].'", active="'.$_POST['qdesc'].'" WHERE skillId='.$skillid;
mysqli_query($conn, $sql);
}
    $sql='DELETE FROM skillproperties WHERE skillPropId NOT IN ('.implode(",",$qup).') AND skillId='.$skillid;
    mysqli_query($conn, $sql);
for($i=0; $i<count($qprops); $i++){
    if($qup[$i]==0){
        $sql='INSERT INTO skillproperties(skillId,propName,propValues) VALUES('.$skillid.',"'.$qprops[$i].'","'.$qvals[$i].'")';
        //echo $sql;
        mysqli_query($conn, $sql);
        }

    else{
         $sql='UPDATE skillproperties SET propName="'.$qprops[$i].'", propValues="'.$qvals[$i].'" WHERE skillPropId='.$qup[$i];
        mysqli_query($conn, $sql);
    }

}

if($champFlag==0){
$sql='INSERT INTO skills(champId,skillName,active,skillOrder,icon) VALUES('.$champId.',"'.$_POST['wname'].'","'.$_POST['wdesc'].'",3,"'.$wpath.'")';
mysqli_query($conn, $sql);
$skillid=mysqli_insert_id($conn);
}
else{
$sql='SELECT skillId FROM skills WHERE champId='.$champId.' AND skillOrder=3';
$result=mysqli_query($conn, $sql);
$skill=mysqli_fetch_assoc($result);
$skillid=$skill['skillId'];
if($wflag==1){
    $sql='UPDATE skills SET icon="'.$wpath.'" WHERE skillId='.$skillid;
    mysqli_query($conn, $sql);
}
$sql='UPDATE skills SET skillName="'.$_POST['wname'].'", active="'.$_POST['wdesc'].'" WHERE skillId='.$skillid;
mysqli_query($conn, $sql);
}
    $sql='DELETE FROM skillproperties WHERE skillPropId NOT IN ('.implode(",",$wup).') AND skillId='.$skillid;
    mysqli_query($conn, $sql);
for($i=0; $i<count($wprops); $i++){
    if($wup[$i]==0){
        $sql='INSERT INTO skillproperties(skillId,propName,propValues) VALUES('.$skillid.',"'.$wprops[$i].'","'.$wvals[$i].'")';
        mysqli_query($conn, $sql);
        echo $sql;
        }

    else{
        $sql='UPDATE skillproperties SET propName="'.$wprops[$i].'", propValues="'.$wvals[$i].'" WHERE skillPropId='.$wup[$i];
        mysqli_query($conn, $sql);
    }

}

if($champFlag==0){
$sql='INSERT INTO skills(champId,skillName,active,skillOrder,icon) VALUES('.$champId.',"'.$_POST['ename'].'","'.$_POST['edesc'].'",4,"'.$epath.'")';
mysqli_query($conn, $sql);
$skillid=mysqli_insert_id($conn);
}
else{
$sql='SELECT skillId FROM skills WHERE champId='.$champId.' AND skillOrder=4';
$result=mysqli_query($conn, $sql);
$skill=mysqli_fetch_assoc($result);
$skillid=$skill['skillId'];
if($eflag==1){
    $sql='UPDATE skills SET icon="'.$epath.'" WHERE skillId='.$skillid;
    mysqli_query($conn, $sql);
}
$sql='UPDATE skills SET skillName="'.$_POST['ename'].'", active="'.$_POST['edesc'].'" WHERE skillId='.$skillid;
mysqli_query($conn, $sql);
}
    $sql='DELETE FROM skillproperties WHERE skillPropId NOT IN ('.implode(",",$eup).') AND skillId='.$skillid;
    mysqli_query($conn, $sql);
for($i=0; $i<count($eprops); $i++){
    if($eup[$i]==0){
        $sql='INSERT INTO skillproperties(skillId,propName,propValues) VALUES('.$skillid.',"'.$eprops[$i].'","'.$evals[$i].'")';
        mysqli_query($conn, $sql);
        }

    else{
        $sql='UPDATE skillproperties SET propName="'.$eprops[$i].'", propValues="'.$evals[$i].'" WHERE skillPropId='.$eup[$i];
        mysqli_query($conn, $sql);
    }
}

if($champFlag==0){
$sql='INSERT INTO skills(champId,skillName,active,skillOrder,icon) VALUES('.$champId.',"'.$_POST['rname'].'","'.$_POST['rdesc'].'",5,"'.$rpath.'")';
mysqli_query($conn, $sql);
$skillid=mysqli_insert_id($conn);
}else{
$sql='SELECT skillId FROM skills WHERE champId='.$champId.' AND skillOrder=5';
$result=mysqli_query($conn, $sql);
$skill=mysqli_fetch_assoc($result);
$skillid=$skill['skillId'];
if($rflag==1){
    $sql='UPDATE skills SET icon="'.$rpath.'" WHERE skillId='.$skillid;
    mysqli_query($conn, $sql);
}
$sql='UPDATE skills SET skillName="'.$_POST['rname'].'", active="'.$_POST['rdesc'].'" WHERE skillId='.$skillid;
mysqli_query($conn, $sql);
}
    $sql='DELETE FROM skillproperties WHERE skillPropId NOT IN ('.implode(",",$rup).') AND skillId='.$skillid;
    mysqli_query($conn, $sql);
for($i=0; $i<count($rprops); $i++){
    if($rup[$i]==0){
        $sql='INSERT INTO skillproperties(skillId,propName,propValues) VALUES('.$skillid.',"'.$rprops[$i].'","'.$rvals[$i].'")';
        mysqli_query($conn, $sql);
        }
    else{
        $sql='UPDATE skillproperties SET propName="'.$rprops[$i].'", propValues="'.$rvals[$i].'" WHERE skillPropId='.$rup[$i];
        mysqli_query($conn, $sql);
    } 
}

if($champFlag==0){
    $sql = "INSERT INTO stats(champId,health,healthpl,healthRegen,healthRegenpl,mana,manapl,manaRegen,manaRegenpl,ad,adpl,atkspd,aspl,armor,armorpl,mr,mrpl,ms,ranged) VALUES(".$champId.",".$_POST['health'].",".$_POST['healthpl'].",".$_POST['healthregen'].","
            .$_POST['healthregenpl'].",".$_POST['mana'].",".$_POST['manapl'].",".$_POST['manaregen'].",".$_POST['manaregenpl']
            .",".$_POST['ad'].",".$_POST['adpl'].",".$_POST['atkspd'].",".$_POST['aspl'].",".$_POST['armor'].",".$_POST['armorpl']
            .",".$_POST['mr'].",".$_POST['mrpl'].",".$_POST['ms'].",".$_POST['ranged'].")";
    mysqli_query($conn, $sql);
}else{
    $sql = "UPDATE stats SET health=".$_POST['health'].", healthpl=".$_POST['healthpl'].", healthRegen=".$_POST['healthregen'].", healthRegenpl=".$_POST['healthregenpl'].", mana=".$_POST['mana'].", manapl=".$_POST['manapl'].", manaRegen=".$_POST['manaregen'].", manaRegenpl=".$_POST['manaregenpl'].", ad=".$_POST['ad'].", adpl=".$_POST['adpl'].", atkspd=".$_POST['atkspd'].", aspl=".$_POST['aspl'].",
    armor=".$_POST['armor'].", armorpl=".$_POST['armorpl'].", mr=".$_POST['mr'].", mrpl=".$_POST['mrpl'].", ms=".$_POST['ms'].", ranged=".$_POST['ranged']." WHERE champId=".$champId;
    mysqli_query($conn, $sql);
    //echo $sql;
}


header('Location: champion.php?id='.$champId);

?>