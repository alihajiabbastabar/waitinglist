<?php
//add player function
function addPlayer($name){
    include "config.php";
    $result=mysqli_query($conn,"select * from player_lkjh where name='$name' ");
    //check duplicate
    if(mysqli_num_rows($result)){
        return "The player exists";
    }else{
        //insert and log
        $insert_result=mysqli_query($conn,"insert into player_lkjh values (NULL,'$name',NOW(),0)");
        $result=mysqli_query($conn,"insert into log_lkjh values (NULL,'$name',NOW(),'Added to Waitinglist')");
        if($insert_result)return "Success"; else return "Adding failed!";
    }
    mysqli_close($conn);
}
//remove player function
function removePlayer($name){
    include "config.php";
    //remove and log
    $delete_result=mysqli_query($conn,"delete from player_lkjh where name='$name'");
    $result=mysqli_query($conn,"insert into log_lkjh values (NULL,'$name',NOW(),'Removed from Waitinglist')");
    if($delete_result)return "Success"; else return "Deleting failed!";
    mysqli_close($conn);
}
//update waitinglist function that updates players groupnumber in database too , group number 0 means incomplete group
function updateWaitinglist(){
    include "config.php";
    //load players sort by add time
    $result=mysqli_query($conn,"select * from player_lkjh order by addtime");
    //check total players count
    $result1=mysqli_query($conn,"select count(*) from player_lkjh");
    $row1=mysqli_fetch_row($result1);
    $wl="<div class='waitlist'>";
    //if players count grater than 3 it start generating groups
    if($row1[0]/4>=1){
        $i=$row1[0]/4;
        for($j=1;$j<=$i;$j++){
            $wl.="<div class='group'>
                    <h3>Group $j</h3>
                    <ul>";
            for($w=1;$w<=4;$w++){
              $row=mysqli_fetch_row($result);
              //update group number of players
              $update_result=mysqli_query($conn,"update player_lkjh set groupnumber='$j' where id='".$row[0]."' ");
              $wl.="<li>".$row[1]."</li>";
            }
            $wl.="</ul></div>";
        }
    }
    //this if is for when total count is less than 4 or the players that remain with incomplete group
    if($row1[0]%4>0){
    $wl.="<div class='group'>
            <h3>Incomplete  Group</h3>
            <ul>";
            while($row=mysqli_fetch_row($result)){
              //incomplete group number is 0 for players
              $update_result=mysqli_query($conn,"update player_lkjh set groupnumber='0' where id='".$row[0]."' ");
              $wl.="<li>".$row[1]."</li>";
            }
            $wl.="</ul></div>";
    }
    $wl.="</div>";
    mysqli_close($conn);
    return $wl;
}
//test functions
function testAddPlayer(){
    $testname="testname".time();
    addPlayer($testname);
    include "config.php";
    $result = mysqli_query($conn, "select * from player_lkjh where name='$testname'");
    assert(mysqli_num_rows($result) > 0 ,"AddPlayer Function has Error");
    mysqli_query($conn, "DELETE FROM player_lkjh WHERE name='$testname'");
    mysqli_close($conn);
}
function testRemovePlayer(){
    $testname="testname".time();
    include "config.php";
    $result=mysqli_query($conn,"insert into player_lkjh values (NULL,'$testname',NOW(),0)");
    removePlayer($testname);
    $result = mysqli_query($conn, "select * from player_lkjh where name='$testname'");
    assert(mysqli_num_rows($result) == 0,"RemovePlayer Function has Error");
    mysqli_close($conn);
}
function testUpdateWaitinglist(){
    assert(updateWaitinglist()!='',"UpdateWaitinglist Function has Error");
}

?>