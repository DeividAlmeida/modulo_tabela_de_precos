<?php
	require_once('../../includes/funcoes.php');
	require_once('../../database/config.database.php');
	require_once('../../database/config.php');
	$id = $_GET['id'];
	$itens 			= DBRead('atendimento','*',"WHERE id = '{$id}'")[0];

	$f = $itens['g_f']+1;
	$w = $itens['g_w']+1;
	$l = $itens['g_l']+1;
	$t = $itens['g_t']+1;
	$v = $itens['g_v']+1;
	$s = $itens['g_s']+1;
	$c = $itens['g_c']+1;
	$e = $itens['g_e']+1;

	if (isset($_GET['face'])) {
    $data = array(
    'g_f' => $f);

  $query = DBUpdate('atendimento',$data,"id = '{$id}'");  

}elseif (isset($_GET['whats'])) {
    $data = array(
    'g_w' => $w);

  $query = DBUpdate('atendimento',$data,"id = '{$id}'");

}elseif (isset($_GET['line'])) {
    $data = array(
    'g_l' => $l);

  $query = DBUpdate('atendimento',$data,"id = '{$id}'");

}elseif (isset($_GET['telegram'])) {
    $data = array(
    'g_t' => $t);

  $query = DBUpdate('atendimento',$data,"id = '{$id}'");

}elseif (isset($_GET['vkontakte'])) {
    $data = array(
    'g_v' => $v);

  $query = DBUpdate('atendimento',$data,"id = '{$id}'");

}elseif (isset($_GET['sms'])) {
    $data = array(
    'g_s' => $s);

  $query = DBUpdate('atendimento',$data,"id = '{$id}'");

}elseif (isset($_GET['call'])) {
    $data = array(
    'g_c' => $c);

  $query = DBUpdate('atendimento',$data,"id = '{$id}'");

}elseif (isset($_GET['email'])) {
    $data = array(
    'g_e' => $e);

  $query = DBUpdate('atendimento',$data,"id = '{$id}'");

}
?>