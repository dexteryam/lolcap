<?php
include 'include/dbTools.php';

if(isset($_POST['rating'])===true){
    $rating = $_POST['rating'];
    $userId = $_POST['userId'];
    $champId = $_POST['champId'];

    if($rating==1){
        
        
        $sql ="SELECT COUNT(*) as numRatings FROM ratinghistory WHERE champId =".$champId." AND userId=".$userId." AND liked=1";
        $result = mysqli_query($conn, $sql);
        $ratingExists = mysqli_fetch_assoc($result);
        if($ratingExists["numRatings"]>0){

        }
        else{
            $sql ="SELECT COUNT(*) as numRatings FROM ratinghistory WHERE champId =".$champId." AND userId=".$userId." AND liked=0";
            $result = mysqli_query($conn, $sql);
            $ratingExists = mysqli_fetch_assoc($result);

            if($ratingExists["numRatings"]>0){
                $sql="UPDATE ratinghistory SET liked = 1 WHERE userId=".$userId." AND champId=".$champId;
                mysqli_query($conn, $sql);

            }
            else{
                $sql="INSERT INTO ratinghistory(userId,champId,liked) VALUES(".$userId.",".$champId.",1)";
                mysqli_query($conn, $sql);
            }
                
        }
    }
    if($rating==0){
        $sql ="SELECT COUNT(*) as numRatings FROM ratinghistory WHERE champId =".$champId." AND userId=".$userId." AND liked=0";
        $result = mysqli_query($conn, $sql);
        $ratingExists = mysqli_fetch_assoc($result);
        if($ratingExists["numRatings"]>0){
        }
        else{    
            $sql ="SELECT COUNT(*) as numRatings FROM ratinghistory WHERE champId =".$champId." AND userId=".$userId." AND liked=1";
            $result = mysqli_query($conn, $sql);
            $ratingExists = mysqli_fetch_assoc($result);
            if($ratingExists["numRatings"]>0){
                $sql="UPDATE ratinghistory SET liked = 0 WHERE userId=".$userId." AND champId=".$champId;
                mysqli_query($conn, $sql);
    
            }
            else{
                $sql="INSERT INTO ratinghistory(userId,champId,liked) VALUES(".$userId.",".$champId.",0)";
                mysqli_query($conn, $sql);
            }
        }
    }
    
        $sql ="SELECT COUNT(*) as totalDislikes FROM ratinghistory WHERE champId =".$champId." AND liked = 0";
        $result = mysqli_query($conn, $sql);
        $rating = mysqli_fetch_assoc($result);
        $dislikes = $rating['totalDislikes'];
        
        $sql ="SELECT COUNT(*) as totalLikes FROM ratinghistory WHERE champId =".$champId." AND liked = 1";
        $result = mysqli_query($conn, $sql);
        $rating = mysqli_fetch_assoc($result);
        $likes = $rating['totalLikes'];
        
        echo $likes.','.$dislikes;

}

?>