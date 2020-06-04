<?php 
if(!checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'atendimento', 'adicionar')){ Redireciona('./index.php'); }
?>

<div class="card">
                <div class="card-header white">
                    <strong>Adicionar Itens</strong>
                </div> <br>



        <div class="wh-messengers">
           <center> <ul data-bind="foreach:messengers">
                <?php include_once('wa/atendimento/css/additem.css.php')?>
                <?php include_once('wa/atendimento/css/icons/face.php')?>
                <?php include('wa/atendimento/css/icons/whats.php')?>
                <?php include_once('wa/atendimento/css/icons/line.php')?>
                <?php include_once('wa/atendimento/css/icons/telegram.php')?>
                <?php include_once('wa/atendimento/css/icons/vkontakte.php')?>
                <?php include_once('wa/atendimento/css/icons/sms.php')?>
                <?php include_once('wa/atendimento/css/icons/call.php')?>
                <?php include_once('wa/atendimento/css/icons/email.php')?>  
              
        </ul>
            </div>

             <form style="margin-left: 30px;" class="form-horizontal" method="post" action="?AddItens" >
                <input type="hidden" name="id_central" value="<?php echo $_GET['AdicionarItens']; ?>">
                    <?php $aid = $_GET['AdicionarItens'];

                    $Query = DBRead('atendimento','*',"WHERE id = '{$aid}'"); if (is_array($Query)) {  
                        foreach ($Query as $dados) {?>
                                                                <!--  FACEBOOK -->
                            <ul id="face" class="input-group" style="width: 40%; position: relative; ">
                                <?php include_once('wa/atendimento/css/icons/min_face.php')?>                               
                                <input name="face" type="text" class="form-control" id="in_face"style="width: 87%; margin-left: 60px" placeholder="ID da página do Facebook" value="<?php echo  $dados['face']; ?>" >
                                <label for="face" style="width: 100%; margin-left: 60px; font-size: 14px;">
                                    <span data-bind="visible: onlyMobile" style="display: none;">Only for a mobile! </span>
                                        Exemplo:&nbsp;
                                    <span data-bind="html: exampleText">5472891234<br>

                                    </span>
                                    <a href="https://www.facebook.com/help/1503421039731588" target="_blank">Como obter seu ID da página do FB</a>
                                </label>                                    
                            </ul>                       
                                                                <!--  WHATSAPP -->
                            <ul id="whats" class="input-group" style="width: 40%; position: relative;">
                                <?php include_once('wa/atendimento/css/icons/min_whats.php')?>
                                <input name="whats" class="form-control"  type="text" placeholder="Número do Telefone" style="width: 87%; margin-left: 60px" value="<?php echo  $dados['whats']; ?>" id="in_whats"> 
                                <label for="whats" style="width: 100%; margin-left: 60px; font-size: 14px; ">
                                    <span style="display: none;" data-bind="visible: onlyMobile">Only for a mobile!</span>
                                        Exemplo:&nbsp;
                                    <span data-bind="html: exampleText">5511992784567</span>
                                </lable>
                            </ul>
                                                                <!--  LINE -->
                            <ul id="line" class="input-group" style="width: 40%; position: relative; ">
                                <?php include_once('wa/atendimento/css/icons/min_line.php')?>
                                <input name="line" type="text" class="form-control" placeholder="URL de contato" style="width: 87%; margin-left: 60px; font-size: 14px;" value="<?php echo  $dados['line']; ?>" id="in_line">
                                <label for="line" style="width: 100%; margin-left: 60px; font-size: 14px; ">
                                    <span data-bind="visible: onlyMobile" style="display: none;">Only for a mobile! </span>
                                    Exemplo:&nbsp;
                                    <span data-bind="html: exampleText">https://line.me/ti/p/2Y-7aApB8d</span>
                                </lable>
                            </ul>
                                                                <!--  TELEGRAM -->
                            <ul id="telegram" class="input-group" style="width: 40%; position: relative;">
                                <?php include_once('wa/atendimento/css/icons/min_telegram.php')?>
                                <input name="telegram" type="text" class="form-control" placeholder="Usuário" style="width: 87%; margin-left: 60px; font-size: 14px; " value="<?php echo  $dados['telegram']; ?>" id="in_telegram">
                                <label for="telegram" style="width: 100%; margin-left: 60px; font-size: 14px; ">
                                    <span data-bind="visible: onlyMobile" style="display: none;">Only for a mobile! </span>
                                    Exemplo:&nbsp;
                                    <span data-bind="html: exampleText">whatshelpbot</span>
                                </lable>                            
                            </ul>
                                                                <!--  VKONTAKTE -->
                            <ul id="vkontakte" class="input-group" style="width: 40%; position: relative;">
                                <?php include_once('wa/atendimento/css/icons/min_vkontakte.php')?>
                                <input name="vkontakte" type="text" class="form-control" placeholder="Nome da Página" style="width: 87%; margin-left: 60px; font-size: 14px; " value="<?php echo  $dados['vkontakte']; ?>" id="in_vkontakte">
                                <label for="vkontakte" style="width: 100%; margin-left: 60px">
                                    <span data-bind="visible: onlyMobile" style="display: none;">Only for a mobile! </span>
                                    Exemplo:&nbsp;
                                    <span data-bind="html: exampleText">line<span class="mark fc-black">live</span></span>
                                </lable>
                            </ul>
                                                                <!--  SMS -->
                            <ul id="sms" class="input-group" style="width: 40%; position: relative;">
                                <?php include_once('wa/atendimento/css/icons/min_sms.php')?>
                                <input name="sms" type="text" class="form-control" placeholder="Número do Telefone" style="width: 87%; margin-left: 60px" value="<?php echo  $dados['sms']; ?>" id="in_sms">
                                <label for="sms" style="width: 100%; margin-left: 60px; font-size: 14px; ">
                                    <span style="display: none;" data-bind="visible: onlyMobile">Only for a mobile! </span>
                                        Exemplo:&nbsp;
                                    <span data-bind="html: exampleText">5511992784567</span>
                                </lable>
                            </ul>
                                                                <!--  CALL -->
                            <ul id="call" class="input-group" style="width: 40%; position: relative;">
                                <?php include_once('wa/atendimento/css/icons/min_call.php')?>
                                <input name="call" type="text" class="form-control" placeholder="Número do Telefone" style="width: 87%; margin-left: 60px" value="<?php echo  $dados['p_call']; ?>" id="in_call">
                                <label for="call" style="width: 100%; margin-left: 60px; font-size: 14px; ">
                                    <span style="display: none;" data-bind="visible: onlyMobile">Only for a mobile! </span>
                                        Exemplo:&nbsp;
                                    <span data-bind="html: exampleText">5511992784567</span>
                                </lable>
                            </ul>
                                                                <!--  EMAIL -->
                            <ul id="email" class="input-group" style="width: 40%; position: relative; ">
                                <?php include_once('wa/atendimento/css/icons/min_email.php')?>
                                <input name="email" type="text" class="form-control" placeholder="Email" style="width: 87%; margin-left: 60px" value="<?php echo  $dados['email']; ?>" id="in_email">
                                <label for="email" style="width: 100%; margin-left: 60px; font-size: 14px; ">
                                    <span data-bind="visible: onlyMobile" style="display: none;">Only for a mobile! </span>
                                    Exemplo:&nbsp;
                                    <span data-bind="html: exampleText">hello@whatshelp.io</span>
                                </lable>
                            </ul>
                            <div class="card-footer white">
                                <button style="margin-bottom: 7px;" class="btn btn-primary float-right" type="submit">Salvar</button>
                            </div>
                                <?php }}?>
                </form></center>
</div>


