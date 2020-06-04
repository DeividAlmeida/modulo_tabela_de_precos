function Atendimento(id, pag){
    var UrlPainel = $('#Atendimento'+id).attr("data-painel");
    $.ajax({
        type: "GET",
        cache: false,
        url: UrlPainel+'wa/atendimento/atendimento.php?id='+id+'&pag='+pag,
        beforeSend: function (data){
            //$("#SimpleSlideWA"+id).html("<center><br><img src=\""+UrlPainel+"wa/css_js/loading.gif\"><br>Carregando...<br></center>");
        },
        success: function (data) {
            jQuery('#Atendimento'+id).html(data);
        },
        error: function (data) {
            setTimeout(function(){ Atendimento(id, pag); }, 5000);
        },
    });
}
