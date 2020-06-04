<?php
require_once('database/upload.class.php');

if(!$_SESSION['node']['id']){ die(); exit(); }

// Pasta para upload dos arquivos enviados
$upload_folder = 'wa/atendimento/uploads/';

//
// ITEM
//
if(isset($_GET['AddItens'])){
  $id = get('AddItens');
  
    $data = array(
    'id_central'      => post('id_central'),
    'face'            => post('face'),
    'whats'           => post('whats'),
    'line'            => post('line'),
    'telegram'        => post('telegram'),
    'vkontakte'       => post('vkontakte'),
    'sms'             => post('sms'),
    'p_call'          => post('call'),
    'email'           => post('email')
    );
    $id_cen = $data['id_central'];
    $query = DBUpdate('atendimento', $data, "id = '{$id_cen}'");

    if ($query != 0) {
      Redireciona('?sucesso');
    } else {
      Redireciona('?erro');
    }
}


//
// CENTRAL
//

// Adicionar Central
if (isset($_GET['AddCentral'])) {

  // Inicializa o upload do arquivo
  $handle = new Upload($_FILES['imagem_arquivo']);



  $handle->file_new_name_body = md5(uniqid(rand(), true));
  $handle->Process($upload_folder);

  $data = array(
    'nome'            => post('nome'),
    'saudação'        => post('saudação'),
    'cor'             => post('cor'),
    'posição'         => post('posição'),
    'gatilho'         => post('gatilho'),
    'logo'            => $handle->file_dst_name
  );
  $query = DBCreate('c_atendimento', $data, true);

  $data2 = array(
    'id_central'    => $query,
  );
  $query2 = DBCreate('atendimento', $data2);

  if ($query != 0) {
    Redireciona('?Implementacao&sucesso');
  } else {
    Redireciona('?Implementacao&erro');
  }
}

// Atualizar Central
if (isset($_GET['AtualizarCentral'])) {
  $handle = new Upload($_FILES['imagem_arquivo1']);
  $handle->file_new_name_body = md5(uniqid(rand(), true));
  $handle->Process($upload_folder);
  $id = get('AtualizarCentral');
  $data = array(
    'nome'            => post('nome'),
    'saudação'        => post('saudação'),
    'cor'             => post('cor'),
    'posição'         => post('posição'),
    'gatilho'         => post('gatilho'),
    'logo'            => $handle->file_dst_name
  );

  $query = DBUpdate('c_atendimento', $data, "id = '{$id}'");
  if ($query != 0) {
    Redireciona('?Implementacao&sucesso');
  } else {
    Redireciona('?Implementacao&erro');
  }
}

// Excluir Central & Item
if (isset($_GET['DeletarCentral'])) {
  $id     = get('DeletarCentral');
  $query  = DBDelete('c_atendimento',"id = '{$id}'");
  $query2 = DBDelete('atendimento',"id = '{$id}'");
  if ($query != 0) {
    Redireciona('?Implementacao&sucesso');
  } else {
    Redireciona('?Implementacao&erro');
  }
}

