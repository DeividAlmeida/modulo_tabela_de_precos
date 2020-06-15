<?php require_once('includes/_epack.php'); ?>
<?php $uniqid = uniqid(); ?>
<style type="text/css">
  [class*="tc-member-"] img {width: 100%;}
  .tc-member-style<?php echo $id; ?> {box-shadow: 0 10px 40px 0 rgba(0, 0, 0, 0.08);-webkit-transform: translateY(0);transform: translateY(0);-webkit-transition: all .25s cubic-bezier(0.43, 0.44, 0.63, 0.61);transition: all .25s cubic-bezier(0.43, 0.44, 0.63, 0.61);}
  .tc-member-style<?php echo $id; ?> .member-photo {position: relative;}
  .tc-member-style<?php echo $id; ?> .member-icons {position: absolute;bottom: 0;background: rgba(255,255,255,0.1);width: 100%;padding: 7px 10px;left: 0;}
  .tc-member-style<?php echo $id; ?>.member-light .member-icons {background: rgba(0,0,0,0.4);}
  .tc-member-style<?php echo $id; ?> .member-icon i {font-size: 11px;color: <?php echo $categoria['cor_icone']; ?>;margin: 0 6px;height: 26px;border: 1px solid <?php echo $categoria['cor_borda']; ?>;width: 26px;line-height: 26px;text-align: center;border-radius: 50%;background: transparent;-webkit-transition: all .25s cubic-bezier(0.43, 0.44, 0.63, 0.61);transition: all .25s cubic-bezier(0.43, 0.44, 0.63, 0.61);}
  .tc-member-style<?php echo $id; ?> .member-icon i:hover {color: <?php echo $categoria['cor_hover_icone']; ?> !important;}
  .tc-member-style<?php echo $id; ?> .member-info {padding: 20px 20px;}
  .tc-member-style<?php echo $id; ?> .member-name {font-size: 18px;margin: 0;}
  .tc-member-style<?php echo $id; ?> span.member-role {font-size: 12px;color: #999;display: block;}
  .tc-member-style<?php echo $id; ?>:hover { animation: tc-shake 0.5s;animation-iteration-count: 0.1s;}
  .tc-member-style<?php echo $id; ?> .member-icon i:hover {background: <?php echo $categoria['cor_hover_botao']; ?>;color: #444;}
  .tc-member-style<?php echo $id; ?>.member-align-right {text-align: right;}
  .tc-member-style<?php echo $id; ?>.member-align-center {text-align: center;}
  /*.member-photo :hover{background-color: <?php echo $categoria['cor_borda']; ?>;border-radius: 50%; }*/
  .member-align-center:hover {background-color: <?php echo $categoria['cor_icone']; ?> !important}
  .member-align-center:hover h1 { background-color: <?php echo $categoria['cor_icone']; ?> !important}

  button :hover {background-color: <?php echo $categoria['cor_hover_icone']; ?> !important; color: <?php echo $dados['cor_hover_txt']; ?>;border-radius: 20px;}
.fds:focus,.fds:hover {color:<?php echo $categoria['cor_hover_txt']; ?> !important; text-decoration: underline;}
.zxc:hover {transition-delay: 2s; background-color: <?php echo $categoria['cor_icone']; ?> !important;  }
#zxc:hover {transition-delay: 2s; background-color: <?php echo $categoria['cor_icone']; ?> !important;  }
.member-icon:hover {transition-delay: 2s; background-color: <?php echo $categoria['cor_icone']; ?> !important;}
</style>

                                                <!--  ALL -->
<section  style="background-color: transparent;padding: 100px 0;" class="wow <?php echo $categoria['efeito']; ?> sec-spacer sec-color">
  <div class="col-md-12">
    <div class="row">
      <?php foreach ($itens as $i): ?>
        <?php $social = json_decode($i['social'], true); ?>
      <div class="col-sm-<?php echo (12/$categoria['colunas']); ?> " style="<?php if ($i['featured'] === 'margin-top: 25%'){echo "margin-top: -3%"; }?>;padding-bottom: 40px;" >
        <div class="member-align-center <?php echo $i['id'];?>  <?php echo $categoria['efeito_hover']; ?> " id="fds"  style="background-color: <?php if ($i['featured'] === 'margin-top: 25%'){ echo $i['cor_bg_ft'];}else{echo $categoria['cor_botao']; }?>;margin-bottom: 33px;-webkit-box-shadow: 0 2px 7px 0px rgba(0, 0, 0, 0.1);box-shadow: 0 2px 7px 0px rgba(0, 0, 0, 0.1);min-height: 300px;">

                          
                                                <!--  HEAD -->
            <center> <div style="min-height: 130px;"><div class="badge" style="position: absolute; top: 0;left: 50%;padding: 4px 8px;background-color:<?php echo $i['cor_tg_ft'];?>;color: <?php echo $i['cor_txt_tg_ft'];?>;border-radius: 0 0 5px 5px;font-size: 11px;-webkit-transform: translateX(-50%);transform: translateX(-50%);<?php if ($i['featured'] === 'margin-top: 25%'){}else{echo "display: none"; }?>"><?php echo $i['tg_txt']; ?></div><br><br>

                <div class="member-photo" style=" width: 100%;">                    
                     <h1 class="member-name" id="dife" style=" color: <?php if ($i['featured'] === 'margin-top: 25%'){ echo $i['cor_txt_ft'];}else{echo $categoria['cor_titulo']; }?>; font-size: 220%;letter-spacing: 1px ;position: absolute;z-index: 1;top:65%;width: 100%;padding-bottom: 2.5px;padding-top: 2.5px;background-color: <?php if ($i['featured'] === 'margin-top: 25%'){ echo $i['cor_bg_ft'];}else{echo $categoria['cor_botao']; }?> "><?php echo $i['titulo']; ?></h1>
                     <img style=" border-radius: 50%;width: 90%;" src="<?php echo ConfigPainel('base_url'); ?>/wa/tabela_de_precos/uploads/<?php echo $i['imagem_arquivo']; ?> ">           
                    
                        </div><br>
                       
                    <span class="member-role" style="color: <?php if ($i['featured'] === 'margin-top: 25%'){ echo $i['cor_txt_ft'];}else{echo $categoria['cor_subtitulo']; }?>; margin-top: 1%;display: block;font-size: 36px; line-height: normal;font-weight: 600;"><?php echo $i['subtitulo']; ?></span><span class="duration" style="color: <?php if ($i['featured'] === 'margin-top: 25%'){ echo $i['cor_txt_ft'];}else{echo $categoria['cor_subtitulo']; }?>;    display: block;font-size: 11px;color: "><?php echo $i['auxiliar'];?></span> 
                </div>
            </center>
                                                        <!-- BODY -->
            <div  class="member-info" style="background-color: transparent; min-height: 100px; height: auto;">
              <?php foreach($social as $s => $valor): ?> 
                <ul target="_blank" href="" class="member-icon" style="text-decoration: none; position: relative; right: 5%; color: <?php if ($i['featured'] === 'margin-top: 25%'){echo $i['cor_txt_ft']; }else{echo $categoria['cor_bg'];}?>; font-size: 12px; padding: 0; text-align: center; margin-top: 8%;  ">
                     <li class="zxc" style=" <?php if ($s<1) { echo "font-weight: bold; font-size: 15px"; }elseif ($s>0 && $s<2) { echo "font-size: 14px"; }?>; list-style-type: none; display: inline-block;  overflow-wrap: break-word; background-color: transparent;"> <?php echo $valor['link'];?> </li> 
                              
                </ul>

                    <?php endforeach; ?>
            </div>
            
                                                       <!--  FOOTER -->
      <center style="<?php echo $i['featured'];?>;background-color:transparent;<?php $av = $i['txt_bt']; $bv = strlen($av); if ( $bv < 1){ echo "visibility:hidden"; }; ?>
      ">
        <button  type="button"   class="button.list-group-item" style="margin: 10%;background-color: <?php echo $categoria['cor_hover_botao']; ?>; padding: 0px; border-color: <?php echo $categoria['cor_hover_botao']; ?>; border: 1px solid <?php echo $categoria['cor_hover_icone']; ?>;border-radius: 20px;" >
                <a <?php echo $i['guia'];?> href="<?php echo $i['bt_link'];?>" class="fds" style="display: inline-block;line-height: normal; font-size: 13px;font-weight: bolder; min-width: 130px; text-transform: uppercase; text-decoration: none;-webkit-transition: .3s all ease; transition: .3s all ease; padding: 10px 20px 7px 20px; color:<?php echo $categoria['cor_bg_titulo']; ?>; "><i class="fa fa-shopping-cart"></i> <?php echo $i['txt_bt'];?>
                </a>
          </button>
      </center>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

 