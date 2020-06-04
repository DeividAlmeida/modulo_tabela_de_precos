<?php
$aid = $_GET['AdicionarItens'];
$Query = DBRead('atendimento','*',"WHERE id = '{$aid}'"); if (is_array($Query)) {  
foreach ($Query as $dados) {
$valor = $dados['face'];
$nun = strlen($valor);
  if ( $nun > 0) {
echo "<style>
#face{
  display: block ;
}#b_face{
  display: none;
}
#b_face2{
  display: inline;
}
</style>";
  }else{
echo "<style>
#face{
  display: none ;
}
#b_face{
  display: inline;
}
#b_face2{
  display: none;
}
</style>";
  }
  }
}

?>                 
                <li onclick="face()" style="opacity: 1z" id="b_face" >
                    <button class="wh-messenger-bg-facebook wh-messenger-added" data-bind="
                                        attr: {class: 'wh-messenger-bg-' + name},
                                        css : {'wh-messenger-added' : selectedAt},
                                                                                    click: $parent.clickButtonInList
                                                                                ">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" data-bind="attr: {
                                                alt: showAs,
                                                viewBox: svgViewBox,
                                                title: showAs
                                             }, css : {
                                                'wh-messenger-icon' : true
                                             }, html: svgPath" style="
                                             fill: white; width: 37px; height: 45px;" alt="Messenger" viewBox="0 0 32 32" title="Messenger" class="wh-messenger-icon"><path d=" M16 6C9.925 6 5 10.56 5 16.185c0 3.205 1.6 6.065 4.1 7.932V28l3.745-2.056c1 .277 2.058.426 3.155.426 6.075 0 11-4.56 11-10.185C27 10.56 22.075 6 16 6zm1.093 13.716l-2.8-2.988-5.467 2.988 6.013-6.383 2.868 2.988 5.398-2.987-6.013 6.383z" fill-rule="evenodd"></path></svg>
                        <div class="wh-messenger-switch-wrapper">
                            <i class="fa fa-minus-circle wh-del-messenger-icon" data-bind="
                                            css : {'fa-minus-circle wh-del-messenger-icon' : selectedAt, 'fa-plus-circle wh-add-messenger-icon' : !selectedAt() }
                                            " aria-hidden="true"></i>
                        </div>
                    </button>
                </li>
                <li onclick="face2()" style="opacity: 0.5" id="b_face2" >
                    <button class="wh-messenger-bg-facebook wh-messenger-added" data-bind="
                                        attr: {class: 'wh-messenger-bg-' + name},
                                        css : {'wh-messenger-added' : selectedAt},
                                                                                    click: $parent.clickButtonInList
                                                                                ">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" data-bind="attr: {
                                                alt: showAs,
                                                viewBox: svgViewBox,
                                                title: showAs
                                             }, css : {
                                                'wh-messenger-icon' : true
                                             }, html: svgPath" style="
                                             fill: white; width: 37px; height: 45px;" alt="Messenger" viewBox="0 0 32 32" title="Messenger" class="wh-messenger-icon"><path d=" M16 6C9.925 6 5 10.56 5 16.185c0 3.205 1.6 6.065 4.1 7.932V28l3.745-2.056c1 .277 2.058.426 3.155.426 6.075 0 11-4.56 11-10.185C27 10.56 22.075 6 16 6zm1.093 13.716l-2.8-2.988-5.467 2.988 6.013-6.383 2.868 2.988 5.398-2.987-6.013 6.383z" fill-rule="evenodd"></path></svg>
                        <div class="wh-messenger-switch-wrapper">
                            <i class="fa fa-minus-circle wh-del-messenger-icon" data-bind="
                                            css : {'fa-minus-circle wh-del-messenger-icon' : selectedAt, 'fa-plus-circle wh-add-messenger-icon' : !selectedAt() }
                                            " aria-hidden="true"></i>
                        </div>
                    </button>
                </li>


<script type="text/javascript">
function face() {

    document.getElementById("face").style.display = "block";
    document.getElementById("b_face").style.display = "none";
    document.getElementById("b_face2").style.display = "inline";


  } function face2(){
    document.getElementById("face").style.display = "none";
    document.getElementById("b_face").style.display = "inline";
    document.getElementById("b_face2").style.display = "none";
    document.getElementById("in_face").value = "";
  }


</script>


