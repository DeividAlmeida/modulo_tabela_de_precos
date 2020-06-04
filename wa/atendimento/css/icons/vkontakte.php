<?php
$aid = $_GET['AdicionarItens'];
$Query = DBRead('atendimento','*',"WHERE id = '{$aid}'"); if (is_array($Query)) {  
foreach ($Query as $dados) {
$valor = $dados['vkontakte'];
$nun = strlen($valor);
  if ( $nun > 0) {
echo "<style>
#vkontakte{
  display: block ;
}#b_vkontakte{
  display: none;
}
#b_vkontakte2{
  display: inline;
}
</style>";
  }else{
echo "<style>
#vkontakte{
  display: none ;
}
#b_vkontakte{
  display: inline;
}
#b_vkontakte2{
  display: none;
}
</style>";
  }
  }
}



?>   
                <li id="b_vkontakte" style="opacity: 1" onclick="vkontakte()">
                    <button class="wh-messenger-bg-vkontakte" data-bind="
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
                                             fill: white; width: 37px; height: 45px;" alt="Vkontakte" viewBox="0 0 32 32" title="Vkontakte" class="wh-messenger-icon"><path d=" M26.712 10.96s-.167-.48-1.21-.348l-3.447.024a.785.785 0 0 0-.455.072s-.204.108-.3.37a22.1 22.1 0 0 1-1.28 2.695c-1.533 2.61-2.156 2.754-2.407 2.587-.587-.372-.43-1.51-.43-2.323 0-2.54.382-3.592-.756-3.868-.37-.084-.646-.144-1.616-.156-1.232-.012-2.274 0-2.86.287-.396.193-.695.624-.515.648.227.036.742.143 1.017.515 0 0 .3.49.347 1.568.13 2.982-.48 3.353-.48 3.353-.466.252-1.28-.167-2.478-2.634 0 0-.694-1.222-1.233-2.563-.097-.25-.288-.383-.288-.383s-.216-.168-.527-.216l-3.28.024c-.504 0-.683.228-.683.228s-.18.19-.012.587c2.562 6.022 5.483 9.04 5.483 9.04s2.67 2.79 5.7 2.597h1.376c.418-.035.634-.263.634-.263s.192-.214.18-.61c-.024-1.843.838-2.12.838-2.12.838-.262 1.915 1.785 3.065 2.575 0 0 .874.6 1.532.467l3.064-.048c1.617-.01.85-1.352.85-1.352-.06-.108-.442-.934-2.286-2.647-1.916-1.784-1.665-1.496.658-4.585 1.413-1.88 1.976-3.03 1.796-3.52z" fill-rule="evenodd"></path></svg>
                        <div class="wh-messenger-switch-wrapper">
                            <i class="fa fa-plus-circle wh-add-messenger-icon" data-bind="
                                            css : {'fa-minus-circle wh-del-messenger-icon' : selectedAt, 'fa-plus-circle wh-add-messenger-icon' : !selectedAt() }
                                            " aria-hidden="true"></i>
                        </div>
                    </button>
                </li>

                <li id="b_vkontakte2" style="opacity: 0.5" onclick="vkontakte2()">
                    <button class="wh-messenger-bg-vkontakte" data-bind="
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
                                             fill: white; width: 37px; height: 45px;" alt="Vkontakte" viewBox="0 0 32 32" title="Vkontakte" class="wh-messenger-icon"><path d=" M26.712 10.96s-.167-.48-1.21-.348l-3.447.024a.785.785 0 0 0-.455.072s-.204.108-.3.37a22.1 22.1 0 0 1-1.28 2.695c-1.533 2.61-2.156 2.754-2.407 2.587-.587-.372-.43-1.51-.43-2.323 0-2.54.382-3.592-.756-3.868-.37-.084-.646-.144-1.616-.156-1.232-.012-2.274 0-2.86.287-.396.193-.695.624-.515.648.227.036.742.143 1.017.515 0 0 .3.49.347 1.568.13 2.982-.48 3.353-.48 3.353-.466.252-1.28-.167-2.478-2.634 0 0-.694-1.222-1.233-2.563-.097-.25-.288-.383-.288-.383s-.216-.168-.527-.216l-3.28.024c-.504 0-.683.228-.683.228s-.18.19-.012.587c2.562 6.022 5.483 9.04 5.483 9.04s2.67 2.79 5.7 2.597h1.376c.418-.035.634-.263.634-.263s.192-.214.18-.61c-.024-1.843.838-2.12.838-2.12.838-.262 1.915 1.785 3.065 2.575 0 0 .874.6 1.532.467l3.064-.048c1.617-.01.85-1.352.85-1.352-.06-.108-.442-.934-2.286-2.647-1.916-1.784-1.665-1.496.658-4.585 1.413-1.88 1.976-3.03 1.796-3.52z" fill-rule="evenodd"></path></svg>
                        <div class="wh-messenger-switch-wrapper">
                            <i class="fa fa-plus-circle wh-add-messenger-icon" data-bind="
                                            css : {'fa-minus-circle wh-del-messenger-icon' : selectedAt, 'fa-plus-circle wh-add-messenger-icon' : !selectedAt() }
                                            " aria-hidden="true"></i>
                        </div>
                    </button>
                </li>

<script type="text/javascript">
function vkontakte() {

    document.getElementById("vkontakte").style.display = "block";
    document.getElementById("b_vkontakte").style.display = "none";
    document.getElementById("b_vkontakte2").style.display = "inline";


  } function vkontakte2(){
    document.getElementById("vkontakte").style.display = "none";
    document.getElementById("b_vkontakte").style.display = "inline";
    document.getElementById("b_vkontakte2").style.display = "none";
    document.getElementById("in_vkontakte").value = "";
  }


</script>