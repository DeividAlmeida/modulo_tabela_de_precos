<?php
	header('Access-Control-Allow-Origin: *');
	require_once('../../includes/funcoes.php');
	require_once('../../database/config.database.php');
	require_once('../../database/config.php');

	$id 	= get('id');

	if (ModoManutencao()) { header("Location: ../manutencao.php"); }
	$central 		= DBRead('c_atendimento','*',"WHERE id = '{$id}'")[0];


	$itens 			= DBRead('atendimento','*',"WHERE id = '{$id}'")[0];

?>

<?php include_once('css/box.css.php')?>

<div id="bt_all" >
    <div class="animation">
        <div class="wh-call-to-action-content" wh-html-unsafe="text"><?php echo $central['gatilho']; ?></div>
    </div>
    <a id= "bt_frt" onclick="open_box()">
        <center><?php include('css/icons/chat.php')?></center>
    </a>
</div>

<div id="big_box">
        <div class="row clearfix">
            <div class="col-sm-5 col-md-5 column">
                <div id="wh-customise-widget-example-wrapper">
                    <div class="wh-widget-message-block">
                        <div class="wh-widget-message-block-main">
                            <div class="wh-widget-close" onclick="bt_close()">
                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"  style="height: 30px;width: 30px;">
                                    <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"></path>
                                    <path d="M0 0h24v24H0z" fill="none"></path>
                                </svg>
                            </div>
                            <a class="wh-widget-message-block-show">
                                <div style="height: 100px; width: 100px;" class="wh-widget-message-block-photo">
                                    <img style="height: 100px; width: 100px;" src="<?php echo ConfigPainel('base_url');?>/wa/atendimento/uploads/<?php echo $central['logo'];?>">
                                </div>
                                <div style=" width: 64%; height: auto; cursor: default;"  class="wh-widget-message-block-text">
                                   <p class="texto1"><?php echo $central['saudação']; ?></p>
                                </div>
                                <div class="wh-clear"></div>
                            </a>

                            <div class="wh-messengers">
                                <ul style="display: inline;" ><center>

                                                            <!--  FACEBOOK -->
                                    <a onclick="face()" id="mface" class="ctrlq"><?php include_once('css/icons/min_face.php')?><a/>

                                                            <!--  WHATSAPP -->
                                    <a  target="_blank" onclick="whats()"  href="https://wa.me/<?php echo $itens['whats'];?>" id="mwhats"> <?php include_once('css/icons/min_whats.php')?></a>

                                                            <!--  LINE -->
                                    <a onclick="line()" target="_blank" href="<?php echo $itens['line'];?>" id="mline"><?php include_once('css/icons/min_line.php')?></a>
                                                            
                                                            <!--  TELEGRAM -->
                                    <a onclick="telegram()" href="https://telegram.me/<?php echo $itens['telegram'];?>" target="_blank" id="mtelegram"><?php include_once('css/icons/min_telegram.php')?></a>

                                                            <!--  VKONTAKTE -->
                                    <a onclick="vkontakte()" href="https://vk.me/<?php echo $itens['vkontakte'];?>" target="_blank" id="mvkontakte"><?php include_once('css/icons/min_vkontakte.php')?></a>

                                                            <!--  SMS -->
                                    <a onclick="sms()" href="sms://+<?php echo $itens['sms'];?>" id="msms"><?php include_once('css/icons/min_sms.php')?></a>

                                                            <!--  CALL -->
                                    <a onclick="call()"  href="tel:<?php echo $itens['p_call'];?>" id="mcall"><?php include_once('css/icons/min_call.php')?></a>

                                                            <!--  EMAIL -->
                                    <a onclick="email()" href="mailto:<?php echo $itens['email'];?>" id="memail"><?php include_once('css/icons/min_email.php')?></a>
                                	
                                    </center>

                                </ul>
                            </div>
                        </div>
                        <div class="wh-clear"></div>
                    </div>

                    <a id="bt_scd">
                      <center><?php include('css/icons/chat.php')?></center>
                    </a>
                    <div class="wh-clear"></div>
                </div>
            </div>
        </div>
    </div>

<?php include_once('css/messenger.css.php')?>
<script>
var a = document.getElementById("big_box");
var b = document.getElementById("bt_all");
   
    function open_box(){

        a.style.display = "block";
        b.style.display = "none";
    }

    function bt_close(){
        a.style.display = "none";
        b.style.display = "block";
    }


</script>
<link rel="stylesheet" href="<?php echo RemoveHttpS(ConfigPainel('base_url')); ?>/epack/css/elements/animate.css">
<link type="text/css" href="<?php echo RemoveHttpS(ConfigPainel('base_url')); ?>wa/atendimento/css/widget.css" rel="stylesheet">






<script>
function face() {
  var xhttp = new XMLHttpRequest();
  
  xhttp.open("GET", "<?php echo ConfigPainel('base_url'); ?>/wa/atendimento/2nd_controller.php?face&id=<?php echo $itens['id']?>", true);
  xhttp.send();
}
function whats() {
  var xhttp = new XMLHttpRequest();
  
  xhttp.open("GET", "<?php echo ConfigPainel('base_url'); ?>/wa/atendimento/2nd_controller.php?whats&id=<?php echo $itens['id']?>", true);
  xhttp.send();
}
function line() {
  var xhttp = new XMLHttpRequest();
  
  xhttp.open("GET", "<?php echo ConfigPainel('base_url'); ?>/wa/atendimento/2nd_controller.php?line&id=<?php echo $itens['id']?>", true);
  xhttp.send();
}function telegram() {
  var xhttp = new XMLHttpRequest();
  
  xhttp.open("GET", "<?php echo ConfigPainel('base_url'); ?>/wa/atendimento/2nd_controller.php?telegram&id=<?php echo $itens['id']?>", true);
  xhttp.send();
}function vkontakte() {
  var xhttp = new XMLHttpRequest();
  
  xhttp.open("GET", "<?php echo ConfigPainel('base_url'); ?>/wa/atendimento/2nd_controller.php?vkontakte&id=<?php echo $itens['id']?>", true);
  xhttp.send();
}function sms() {
  var xhttp = new XMLHttpRequest();
  
  xhttp.open("GET", "<?php echo ConfigPainel('base_url'); ?>/wa/atendimento/2nd_controller.php?sms&id=<?php echo $itens['id']?>", true);
  xhttp.send();
}function call() {
  var xhttp = new XMLHttpRequest();
  
  xhttp.open("GET", "<?php echo ConfigPainel('base_url'); ?>/wa/atendimento/2nd_controller.php?call&id=<?php echo $itens['id']?>", true);
  xhttp.send();
}function email() {
  var xhttp = new XMLHttpRequest();
  
  xhttp.open("GET", "<?php echo ConfigPainel('base_url'); ?>/wa/atendimento/2nd_controller.php?email&id=<?php echo $itens['id']?>", true);
  xhttp.send();
}
</script>

