<style type="text/css">
        @media only screen and (max-width: 539px) {
    .wh-widget-message-block-main{
      width: auto;
    }

  }
          @media only screen and (min-width: 539px) {
    .wh-widget-message-block-main{
      width: 480px;
    }
  }

    .texto1{
		font-size: 20px; 
		text-align: left;  
		margin: 5px;
    }
    #min{
    	width: 50px;
    	height: 50px;
    	margin-bottom: 6px;
    	cursor: pointer;
    }
       <?php 
$po = $central['posição'];

    if ( $po === 'right') {
      echo "
      .animation::after{
      content: '';
      position: absolute;
      background: white;
      border-bottom: 1px solid #e2e2e2;
      border-right: 1px solid #e2e2e2;
      right: -5px;
      top: 50%;
      margin-top: -4px;
      width: 8px;
      height: 8px;
      z-index: 10;
      -ms-transform: rotate(-45deg);
      -webkit-transform: rotate(-45deg);
      -moz-transform: rotate(-45deg);
      -o-transform: rotate(-45deg);
      transform: rotate(-45deg);
    }
      .animation{    
      padding: 5px 10px 5px 10px;
      line-height: 18px;
      height: auto;
      max-width: 135px;
      word-wrap: break-word;
      font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
      font-size: 14px;
      position: fixed;
      right:  90px;
      bottom:40px;
      box-shadow: 2px 2px 13px rgba(0,0,0,0.1);
      border: 1px solid #e2e2e2;
      border-radius: 5px;
      background: white;
      cursor: pointer;
      z-index: 1;
      cursor: default;
    }
@media only screen and (max-width: 539px) {
   #big_box{
      position: fixed;
      right: 30px; 
      bottom: 100px;
      margin: 0;
      padding: 0;
      display: none;
      z-index:1;
        }
    }
@media only screen and (min-width: 539px) {
  #big_box{
      position: fixed;
      right: 160px; 
      bottom: 100px;
      margin: 0;
      padding: 0;
      display: none;
      z-index:1;
        }
}

" ;}else{
    echo "
     .animation{    
      padding: 5px 10px 5px 10px;
      line-height: 18px;
      height: auto;
      max-width: 135px;
      word-wrap: break-word;
      font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
      font-size: 14px;
      position: fixed;
      left: 90px;
      bottom:40px;
      box-shadow: 2px 2px 13px rgba(0,0,0,0.1);
      border: 1px solid #e2e2e2;
      border-radius: 5px;
      background: white;
      cursor: pointer;
      z-index: 1;
      cursor: default;
    }
      .animation::after{
      content: '';
      position: absolute;
      background: white;
      border-top: 1px solid #e2e2e2;
      border-left:  1px solid #e2e2e2;
      left: -5px;
      top: 50%;
      margin-top: -4px;
      width: 8px;
      height: 8px;
      z-index: 10;
      -ms-transform: rotate(-45deg);
      -webkit-transform: rotate(-45deg);
      -moz-transform: rotate(-45deg);
      -o-transform: rotate(-45deg);
      transform: rotate(-45deg);
    }
      #big_box{
      position: fixed;
      left: 10px; 
      bottom: 100px;
      margin: 0;
      padding: 0;
      display: none;
      z-index:1;
    }

";} ?>


     
    
    #bt_frt{
    	border-radius: 40px; 
    	display: block; 
    	width: 70px; 
    	height: 70px; 
    	background-color:<?php echo $central['cor']; ?>; 
    	cursor: pointer;
    	position: fixed; 
    	box-shadow: 2px 2px 6px rgba(0,0,0,0.4);
      <?php echo $central['posição']; ?>: 10px; 
    }
    #bt_all{
    	position: fixed;
    	right: 110px; 
    	bottom: 90px;
    	z-index:1;
    }

    #bt_scd{
	   	display: block;
	    border-radius: 48px;
	    box-shadow: 2px 2px 6px rgba(0,0,0,0.4);
	    text-decoration: none;
	    color: #fff; 
	    position: fixed; 
    	<?php echo $central['posição']; ?>: 10px; 
    	bottom: 20px;
	    width: 70px; 
	    height: 70px; 
	    background-color:<?php echo $central['cor']; ?>;
    }


</style>


<?php
$face = $itens['face'];
$nunf = strlen($face);
  if ( $nunf > 0) {
echo "<style>
#mface{
  display: inline ;
  text-decoration: none;
}
</style>";
  }else{
echo "<style>
#mface{
  display: none ;
}
</style>";
  }


$whats = $itens['whats'];
$nunw = strlen($whats);
  if ( $nunw > 0) {
echo "<style>
#mwhats{
  display: inline ;
  text-decoration: none;
}
</style>";
  }else{
echo "<style>
#mwhats{
  display: none ;
}
</style>";
  }




$line = $itens['line'];
$nunl = strlen($line);
  if ( $nunl > 0) {
echo "<style>
#mline{
  display: inline ;
  text-decoration: none;
}
</style>";
  }else{
echo "<style>
#mline{
  display: none ;
}
</style>";
  }

$telegram = $itens['telegram'];
$nunt = strlen($telegram);
  if ( $nunt > 0) {
echo "<style>
#mtelegram{
  display: inline ;
  text-decoration: none;
}
</style>";
  }else{
echo "<style>
#mtelegram{
  display: none ;
}
</style>";
  }

$vkontakte = $itens['vkontakte'];
$nunvk = strlen($vkontakte);
  if ( $nunvk > 0) {
echo "<style>
#mvkontakte{
  display: inline ;
  text-decoration: none;
}
</style>";
  }else{
echo "<style>
#mvkontakte{
  display: none ;
  text-decoration: none;
}
</style>";
  }

$sms = $itens['sms'];
$nunsm = strlen($sms);
  if ( $nunsm > 0) {
echo "<style>
#msms{
  display: inline ;
  text-decoration: none;
}
</style>";
  }else{
echo "<style>
#msms{
  display: none ;
  text-decoration: none;
}
</style>";
  }

$call = $itens['p_call'];
$nunc = strlen($call);
  if ( $nunc > 0) {
echo "<style>
#mcall{
  display: inline ;
  text-decoration: none;
}
</style>";
  }else{
echo "<style>
#mcall{
  display: none ;
}
</style>";
  }

$email = $itens['email'];
$nune = strlen($email);
  if ( $nune > 0) {
echo "<style>
#memail{
  display: inline ;
  text-decoration: none;
}
</style>";
  }else{
echo "<style>
#memail{
  display: none ;
}
</style>";
  }

