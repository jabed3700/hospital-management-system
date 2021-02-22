

<div class="" id="adminid">
    <div class="row chat-window col-xs-5 col-md-3 admin-hidden " id="chat_window_2" style="float:right;z-index:9000;margin-right:5px;">
        <div class="col-xs-12 col-md-12 ">
        	<div class="panel panel-default bg-danger ">
                <div class="panel-heading top-bar " style="background:#fff;">
                    <div class="col-md-8 col-xs-8 ">
                        <h3 class="panel-title text-primary" style="font-weight:600;font-size:20px;">Admin Chat</h3>
                    </div>
                    <div class="col-md-4 col-xs-4" style="text-align: right;">
                        <a href="#"><span id="minim_chat_window" style="
    float: left;" class="glyphicon glyphicon-minus icon_minim "></span></a>
                        <span href="#" style="cursor: pointer"><span id="close-admin" class="glyphicon glyphicon-remove icon_close" data-id="chat_window_1"></span></span>
                    </div>
                </div>
                <div id="admin-msg-body" class="panel-body msg_container_base">
                    
                </div>
                <div class="panel-footer">
                    <div class="input-group" class="form-control input-sm chat_input">
                    <input id="fl" type="file" style="width:90%">
                    
                    </div>
                    <div class="input-group">
                        <input id="adminmsg" type="text" style="font-size:14px;" class="form-control input-sm chat_input" placeholder="Write your message here..." />
                        <span class="input-group-btn">
                        <button class="btn btn-success" style="padding:9px" id="btn-chat" onclick="sendAdmin()">Send</button>
                        </span>
                    </div>
                </div>
    		</div>
        </div>
    </div>
    
   
</div>
<script>
document.getElementById("close-admin").onclick=function(){
    document.getElementById("chat_window_2").style.display="none";
}
</script>
