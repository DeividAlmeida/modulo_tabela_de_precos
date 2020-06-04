<?php
$aid = $_GET['AdicionarItens'];
$Query = DBRead('atendimento','*',"WHERE id = '{$aid}'"); if (is_array($Query)) {  
foreach ($Query as $dados) {
$valor = $dados['line'];
$nun = strlen($valor);
  if ( $nun > 0) {
echo "<style>
#line{
  display: block ;
}#b_line{
  display: none;
}
#b_line2{
  display: inline;
}
</style>";
  }else{
echo "<style>
#line{
  display: none ;
}
#b_line{
  display: inline;
}
#b_line2{
  display: none;
}
</style>";
  }
  }
}



?>   
                <li id="b_line" style="opacity: 1" onclick="line()">
                    <button class="wh-messenger-bg-line" data-bind="
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
                                             fill: white; width: 37px; height: 45px;" alt="LINE" viewBox="0 0 32 32" title="LINE" class="wh-messenger-icon"><path d=" M27 14.926C27 10.006 22.065 6 16 6S5 10.005 5 14.926c0 4.413 3.913 8.11 9.2 8.808.358.077.845.236.968.542.112.278.073.713.036.995l-.157.942c-.048.28-.22 1.088.953.593 1.174-.494 6.334-3.73 8.642-6.386C26.236 18.67 27 16.896 27 14.925zm-4.247-.41a.577.577 0 0 1 0 1.153h-1.61v1.03h1.61a.578.578 0 0 1 0 1.155h-2.186a.578.578 0 0 1-.577-.577v-4.37c0-.32.26-.578.577-.578h2.186a.578.578 0 0 1 0 1.153h-1.61v1.033h1.61zm-3.537 2.762a.575.575 0 0 1-.578.577.58.58 0 0 1-.46-.23l-2.24-3.05v2.703a.577.577 0 0 1-1.154 0v-4.37a.577.577 0 0 1 1.038-.347l2.24 3.05v-2.703a.578.578 0 0 1 1.154 0v4.37zm-5.26 0a.577.577 0 0 1-1.154 0v-4.37a.577.577 0 0 1 1.153 0v4.37zm-2.262.577H9.508a.577.577 0 0 1-.576-.577v-4.37a.577.577 0 0 1 1.153 0V16.7h1.61a.577.577 0 0 1 0 1.155z" fill-rule="evenodd"></path></svg>
                        <div class="wh-messenger-switch-wrapper">
                            <i class="fa fa-plus-circle wh-add-messenger-icon" data-bind="
                                            css : {'fa-minus-circle wh-del-messenger-icon' : selectedAt, 'fa-plus-circle wh-add-messenger-icon' : !selectedAt() }
                                            " aria-hidden="true"></i>
                        </div>
                    </button>
                </li>

                <li id="b_line2" style="opacity: 0.5" onclick="line2()">
                    <button class="wh-messenger-bg-line" data-bind="
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
                                             fill: white; width: 37px; height: 45px;" alt="LINE" viewBox="0 0 32 32" title="LINE" class="wh-messenger-icon"><path d=" M27 14.926C27 10.006 22.065 6 16 6S5 10.005 5 14.926c0 4.413 3.913 8.11 9.2 8.808.358.077.845.236.968.542.112.278.073.713.036.995l-.157.942c-.048.28-.22 1.088.953.593 1.174-.494 6.334-3.73 8.642-6.386C26.236 18.67 27 16.896 27 14.925zm-4.247-.41a.577.577 0 0 1 0 1.153h-1.61v1.03h1.61a.578.578 0 0 1 0 1.155h-2.186a.578.578 0 0 1-.577-.577v-4.37c0-.32.26-.578.577-.578h2.186a.578.578 0 0 1 0 1.153h-1.61v1.033h1.61zm-3.537 2.762a.575.575 0 0 1-.578.577.58.58 0 0 1-.46-.23l-2.24-3.05v2.703a.577.577 0 0 1-1.154 0v-4.37a.577.577 0 0 1 1.038-.347l2.24 3.05v-2.703a.578.578 0 0 1 1.154 0v4.37zm-5.26 0a.577.577 0 0 1-1.154 0v-4.37a.577.577 0 0 1 1.153 0v4.37zm-2.262.577H9.508a.577.577 0 0 1-.576-.577v-4.37a.577.577 0 0 1 1.153 0V16.7h1.61a.577.577 0 0 1 0 1.155z" fill-rule="evenodd"></path></svg>
                        <div class="wh-messenger-switch-wrapper">
                            <i class="fa fa-plus-circle wh-add-messenger-icon" data-bind="
                                            css : {'fa-minus-circle wh-del-messenger-icon' : selectedAt, 'fa-plus-circle wh-add-messenger-icon' : !selectedAt() }
                                            " aria-hidden="true"></i>
                        </div>
                    </button>
                </li>

<script type="text/javascript">
function line() {

    document.getElementById("line").style.display = "block";
    document.getElementById("b_line").style.display = "none";
    document.getElementById("b_line2").style.display = "inline";


  } function line2(){
    document.getElementById("line").style.display = "none";
    document.getElementById("b_line").style.display = "inline";
    document.getElementById("b_line2").style.display = "none";
    document.getElementById("in_line").value = "";
  }


</script>