<?php
$aid = $_GET['AdicionarItens'];
$Query = DBRead('atendimento','*',"WHERE id = '{$aid}'"); if (is_array($Query)) {  
foreach ($Query as $dados) {
$valor = $dados['email'];
$nun = strlen($valor);
  if ( $nun > 0) {
echo "<style>
#email{
  display: block ;
}#b_email{
  display: none;
}
#b_email2{
  display: inline;
}
</style>";
  }else{
echo "<style>
#email{
  display: none ;
}
#b_email{
  display: inline;
}
#b_email2{
  display: none;
}
</style>";
  }
  }
}



?>   
                <li id="b_email" style="opacity: 1" onclick="email()">
                    <button class="wh-messenger-bg-email" data-bind="
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
                                             fill: white; width: 37px; height: 45px;" alt="Email" viewBox="0 0 32 32" title="Email" class="wh-messenger-icon"><path d=" M27 22.757c0 1.24-.988 2.243-2.19 2.243H7.19C5.98 25 5 23.994 5 22.757V13.67c0-.556.39-.773.855-.496l8.78 5.238c.782.467 1.95.467 2.73 0l8.78-5.238c.472-.28.855-.063.855.495v9.087z" fill-rule="evenodd"></path><path d=" M27 9.243C27 8.006 26.02 7 24.81 7H7.19C5.988 7 5 8.004 5 9.243v.465c0 .554.385 1.232.857 1.514l9.61 5.733c.267.16.8.16 1.067 0l9.61-5.733c.473-.283.856-.96.856-1.514v-.465z" fill-rule="evenodd"></path></svg>
                        <div class="wh-messenger-switch-wrapper">
                            <i class="fa fa-plus-circle wh-add-messenger-icon" data-bind="
                                            css : {'fa-minus-circle wh-del-messenger-icon' : selectedAt, 'fa-plus-circle wh-add-messenger-icon' : !selectedAt() }
                                            " aria-hidden="true"></i>
                        </div>
                    </button>
                </li>
                                <li id="b_email2" style="opacity: 0.5" onclick="email2()">
                    <button class="wh-messenger-bg-email" data-bind="
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
                                             fill: white; width: 37px; height: 45px;" alt="Email" viewBox="0 0 32 32" title="Email" class="wh-messenger-icon"><path d=" M27 22.757c0 1.24-.988 2.243-2.19 2.243H7.19C5.98 25 5 23.994 5 22.757V13.67c0-.556.39-.773.855-.496l8.78 5.238c.782.467 1.95.467 2.73 0l8.78-5.238c.472-.28.855-.063.855.495v9.087z" fill-rule="evenodd"></path><path d=" M27 9.243C27 8.006 26.02 7 24.81 7H7.19C5.988 7 5 8.004 5 9.243v.465c0 .554.385 1.232.857 1.514l9.61 5.733c.267.16.8.16 1.067 0l9.61-5.733c.473-.283.856-.96.856-1.514v-.465z" fill-rule="evenodd"></path></svg>
                        <div class="wh-messenger-switch-wrapper">
                            <i class="fa fa-plus-circle wh-add-messenger-icon" data-bind="
                                            css : {'fa-minus-circle wh-del-messenger-icon' : selectedAt, 'fa-plus-circle wh-add-messenger-icon' : !selectedAt() }
                                            " aria-hidden="true"></i>
                        </div>
                    </button>
                </li>

<script type="text/javascript">
function email() {

    document.getElementById("email").style.display = "block";
    document.getElementById("b_email").style.display = "none";
    document.getElementById("b_email2").style.display = "inline";


  } function email2(){
    document.getElementById("email").style.display = "none";
    document.getElementById("b_email").style.display = "inline";
    document.getElementById("b_email2").style.display = "none";
    document.getElementById("in_email").value = "";
  }


</script>