<?php
$aid = $_GET['AdicionarItens'];
$Query = DBRead('atendimento','*',"WHERE id = '{$aid}'"); if (is_array($Query)) {  
foreach ($Query as $dados) {
$valor = $dados['p_call'];
$nun = strlen($valor);
  if ( $nun > 0) {
echo "<style>
#call{
  display: block ;
}#b_call{
  display: none;
}
#b_call2{
  display: inline;
}
</style>";
  }else{
echo "<style>
#call{
  display: none ;
}
#b_call{
  display: inline;
}
#b_call2{
  display: none;
}
</style>";
  }
  }
}



?>   
               <li id="b_call" style="opacity:1 " onclick="call()">
                    <button class="wh-messenger-bg-call" data-bind="
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
                                             fill: white; width: 37px; height: 45px;" alt="Call" viewBox="-72 -72 704 704" title="Call" class="wh-messenger-icon"><path d=" M166.156,512h-41.531c-7.375-0.031-20.563-8.563-20.938-8.906C37.438,437.969,0,348.906,0,255.938 C0,162.719,37.656,73.375,104.281,8.219C104.313,8.188,117.25,0,124.625,0h41.531c15.219,0,33.25,11.125,40.063,24.781l2.906,5.844 c6.781,13.594,6.188,35.563-1.344,48.75l-27.906,48.813c-7.563,13.219-26.188,24.25-41.406,24.25H110.75 c-36.813,64-36.813,143.094-0.031,207.125h27.75c15.219,0,33.844,11.031,41.406,24.25l27.875,48.813 c7.531,13.188,8.156,35.094,1.375,48.781l-2.906,5.844C199.375,500.844,181.375,512,166.156,512z M512,128v256 c0,35.344-28.656,64-64,64H244.688c-1.25-11.219-3.969-22.156-9.156-31.25l-27.875-48.813 c-13.406-23.406-42.469-40.375-69.188-40.375h-8.156c-20.188-45.438-20.188-97.719,0-143.125h8.156 c26.719,0,55.781-16.969,69.188-40.375l27.906-48.813c5.188-9.094,7.906-20.063,9.156-31.25H448C483.344,64,512,92.656,512,128z M328,368c0-13.25-10.75-24-24-24s-24,10.75-24,24s10.75,24,24,24S328,381.25,328,368z M328,304c0-13.25-10.75-24-24-24 s-24,10.75-24,24s10.75,24,24,24S328,317.25,328,304z M328,240c0-13.25-10.75-24-24-24s-24,10.75-24,24s10.75,24,24,24 S328,253.25,328,240z M392,368c0-13.25-10.75-24-24-24s-24,10.75-24,24s10.75,24,24,24S392,381.25,392,368z M392,304 c0-13.25-10.75-24-24-24s-24,10.75-24,24s10.75,24,24,24S392,317.25,392,304z M392,240c0-13.25-10.75-24-24-24s-24,10.75-24,24 s10.75,24,24,24S392,253.25,392,240z M456,368c0-13.25-10.75-24-24-24s-24,10.75-24,24s10.75,24,24,24S456,381.25,456,368z M456,304 c0-13.25-10.75-24-24-24s-24,10.75-24,24s10.75,24,24,24S456,317.25,456,304z M456,240c0-13.25-10.75-24-24-24s-24,10.75-24,24 s10.75,24,24,24S456,253.25,456,240z M456,144c0-8.844-7.156-16-16-16H296c-8.844,0-16,7.156-16,16v32c0,8.844,7.156,16,16,16h144 c8.844,0,16-7.156,16-16V144z" fill-rule="evenodd"></path></svg>
                        <div class="wh-messenger-switch-wrapper">
                            <i class="fa fa-plus-circle wh-add-messenger-icon" data-bind="
                                            css : {'fa-minus-circle wh-del-messenger-icon' : selectedAt, 'fa-plus-circle wh-add-messenger-icon' : !selectedAt() }
                                            " aria-hidden="true"></i>
                        </div>
                    </button>
                </li>
                <li id="b_call2" style="opacity: 0.5" onclick="call2()">
                    <button class="wh-messenger-bg-call" data-bind="
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
                                             fill: white; width: 37px; height: 45px;" alt="Call" viewBox="-72 -72 704 704" title="Call" class="wh-messenger-icon"><path d=" M166.156,512h-41.531c-7.375-0.031-20.563-8.563-20.938-8.906C37.438,437.969,0,348.906,0,255.938 C0,162.719,37.656,73.375,104.281,8.219C104.313,8.188,117.25,0,124.625,0h41.531c15.219,0,33.25,11.125,40.063,24.781l2.906,5.844 c6.781,13.594,6.188,35.563-1.344,48.75l-27.906,48.813c-7.563,13.219-26.188,24.25-41.406,24.25H110.75 c-36.813,64-36.813,143.094-0.031,207.125h27.75c15.219,0,33.844,11.031,41.406,24.25l27.875,48.813 c7.531,13.188,8.156,35.094,1.375,48.781l-2.906,5.844C199.375,500.844,181.375,512,166.156,512z M512,128v256 c0,35.344-28.656,64-64,64H244.688c-1.25-11.219-3.969-22.156-9.156-31.25l-27.875-48.813 c-13.406-23.406-42.469-40.375-69.188-40.375h-8.156c-20.188-45.438-20.188-97.719,0-143.125h8.156 c26.719,0,55.781-16.969,69.188-40.375l27.906-48.813c5.188-9.094,7.906-20.063,9.156-31.25H448C483.344,64,512,92.656,512,128z M328,368c0-13.25-10.75-24-24-24s-24,10.75-24,24s10.75,24,24,24S328,381.25,328,368z M328,304c0-13.25-10.75-24-24-24 s-24,10.75-24,24s10.75,24,24,24S328,317.25,328,304z M328,240c0-13.25-10.75-24-24-24s-24,10.75-24,24s10.75,24,24,24 S328,253.25,328,240z M392,368c0-13.25-10.75-24-24-24s-24,10.75-24,24s10.75,24,24,24S392,381.25,392,368z M392,304 c0-13.25-10.75-24-24-24s-24,10.75-24,24s10.75,24,24,24S392,317.25,392,304z M392,240c0-13.25-10.75-24-24-24s-24,10.75-24,24 s10.75,24,24,24S392,253.25,392,240z M456,368c0-13.25-10.75-24-24-24s-24,10.75-24,24s10.75,24,24,24S456,381.25,456,368z M456,304 c0-13.25-10.75-24-24-24s-24,10.75-24,24s10.75,24,24,24S456,317.25,456,304z M456,240c0-13.25-10.75-24-24-24s-24,10.75-24,24 s10.75,24,24,24S456,253.25,456,240z M456,144c0-8.844-7.156-16-16-16H296c-8.844,0-16,7.156-16,16v32c0,8.844,7.156,16,16,16h144 c8.844,0,16-7.156,16-16V144z" fill-rule="evenodd"></path></svg>
                        <div class="wh-messenger-switch-wrapper">
                            <i class="fa fa-plus-circle wh-add-messenger-icon" data-bind="
                                            css : {'fa-minus-circle wh-del-messenger-icon' : selectedAt, 'fa-plus-circle wh-add-messenger-icon' : !selectedAt() }
                                            " aria-hidden="true"></i>
                        </div>
                    </button>
                </li>

<script type="text/javascript">
function call() {

    document.getElementById("call").style.display = "block";
    document.getElementById("b_call").style.display = "none";
    document.getElementById("b_call2").style.display = "inline";


  } function call2(){
    document.getElementById("call").style.display = "none";
    document.getElementById("b_call").style.display = "inline";
    document.getElementById("b_call2").style.display = "none";
    document.getElementById("in_call").value = "";
  }


</script>