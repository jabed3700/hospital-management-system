<?php
include_once("db/config.php");
$sender=$_GET["sender"];
$reciever=$_GET["reciever"];
$sql="SELECT * FROM messages where sender='".$sender."' and reciever='".$reciever."' or sender='".$reciever."' and reciever='".$sender."'";
$result=mysqli_query($con,$sql);
while($res=mysqli_fetch_array($result)){
    if($sender==$res["sender"]){
        ?>
<div class="row msg_container base_sent">
                        <div class="col-md-10 col-xs-10 ">
                            <div class="messages msg_sent">
                                <p><?=$res["message"]?></p>
                                <time datetime="2009-11-13T20:00"><?=$res["send_at"]?></time>
                            </div>
                        </div>
                        <div class="col-md-2 col-xs-2 avatar">
                            <img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive ">
                        </div>
                    </div>
    <?php
    }
    else{
        ?>
         <div class="row msg_container base_receive">
                        <div class="col-md-2 col-xs-2 avatar">
                            <img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive ">
                        </div>
                        <div class="col-xs-10 col-md-10">
                            <div class="messages msg_receive">
                                <p><?=$res["message"]?></p>
                                <time datetime="2009-11-13T20:00"><?=$res["send_at"]?></time>
                            </div>
                        </div>
                    </div>
        <?php
    }
}
?>