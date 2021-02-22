<?php
include_once("../db/config.php");
$sender=$_GET["reciever"];

$sql="SELECT * FROM admin_chat where sender='".$sender."'  or  receiver='".$sender."'";
$result=mysqli_query($con,$sql);
while($res=mysqli_fetch_array($result)){
    if($sender==$res["sender"]){
        ?>
         <div class="direct-chat-msg">
                    <div class="direct-chat-infos clearfix">
                      
                      <span class="direct-chat-timestamp float-right"><?=$res["send_at"]?></span>
                    </div>
                    <!-- /.direct-chat-infos -->
                    <img class="direct-chat-img" src="chat/dist/img/user1-128x128.jpg" alt="Message User Image">
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                    <?=$res["message"]?>
                    <?php
                                if($res["attachment"]!=""){
                                 ?>
                                 <a download href="../adminfile/<?=$res['attachment']?>">Download</a>
                                 <?php   
                                }
                                ?>
                    </div>
                    <!-- /.direct-chat-text -->
                  </div>

    <?php
    }
    else{
        ?>
         <div class="direct-chat-msg right">
                    <div class="direct-chat-infos clearfix">
                      
                      <span class="direct-chat-timestamp float-right"><?=$res["send_at"]?></span>
                    </div>
                    <!-- /.direct-chat-infos -->
                    <img class="direct-chat-img" src="chat/dist/img/user1-128x128.jpg" alt="Message User Image">
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                    <?=$res["message"]?>
                    <?php
                                if($res["attachment"]!=""){
                                 ?>
                                 <a download href="../adminfile/<?=$res['attachment']?>">Download</a>
                                 <?php   
                                }
                                ?>
                    </div>
                    <!-- /.direct-chat-text -->
                  </div>
        <?php
    }
}
?>