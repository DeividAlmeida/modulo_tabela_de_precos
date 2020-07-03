<?php
require_once 'database/upload.class.php';

if(!$_SESSION['node']['id']){ die(); exit(); }

if (!checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'])) { Redireciona('./index.php'); }

// Pasta para upload dos arquivos enviados
$upload_folder = 'wa/tabela_de_precos/uploads/';

//
// ITEM
//
if(isset($_GET['AddItem'])){
  if(!checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'item', 'adicionar')){ Redireciona('./index.php'); }

  // Inicializa o upload do arquivo
  $handle = new Upload($_FILES['imagem_arquivo']);
  $files = $_FILES['imagem_arquivo'];

  $handle->file_new_name_body = md5(uniqid(rand(), true));
  $handle->Process($upload_folder);

  $resources = array_combine(array_keys($_POST['link']), array_map(function ($icon_social, $link) {
      return compact('icon_social', 'link');
  },$_POST['icon_social'], $_POST['link']));
  $_POST['social'] = json_encode($resources, JSON_FORCE_OBJECT);

  if ($handle->processed){
    $data = array(
      'id_categoria'    => post('id_categoria'),
      'titulo'          => post('titulo'),
      'subtitulo'       => post('subtitulo'),
      'social'          => $_POST['social'],
      'imagem_arquivo'  => $handle->file_dst_name,
      'auxiliar'        => post('auxiliar'),
      'txt_bt'          => post('txt_bt'),
      'bt_link'         =>post('bt_link'),
      'guia'            =>post('guia'),
      'featured'        =>post('featured'),
      'cor_bg_ft'       =>post('cor_bg_ft'),
      'cor_txt_ft'      =>post('cor_txt_ft'),
      'cor_tg_ft'       =>post('cor_tg_ft'),
      'cor_txt_tg_ft'   =>post('cor_txt_tg_ft'),
      'tg_txt'          =>post('tg_txt')
    );
}else{ 
$erro = 'erro.jpg';
  $data = array(
      'id_categoria'    => post('id_categoria'),
      'titulo'          => post('titulo'),
      'subtitulo'       => post('subtitulo'),
      'social'          => $_POST['social'],
      'imagem_arquivo'  => $erro,
      'auxiliar'        => post('auxiliar'),
      'txt_bt'          => post('txt_bt'),
      'bt_link'         =>post('bt_link'),
      'guia'            =>post('guia'),
      'featured'        =>post('featured'),
      'cor_bg_ft'       =>post('cor_bg_ft'),
      'cor_txt_ft'      =>post('cor_txt_ft'),
      'cor_tg_ft'       =>post('cor_tg_ft'),
      'cor_txt_tg_ft'   =>post('cor_txt_tg_ft'),
      'tg_txt'          =>post('tg_txt')
    );
}
    $query = DBCreate('tabela_de_precos', $data);

    if ($query != 0) {
      Redireciona('?sucesso');
    } else {
      Redireciona('?erro');
    }
  
}

// Atualizar Categoria
if (isset($_GET['AtualizarItem'])) {
  if(!checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'item', 'editar')){ Redireciona('./index.php'); }

  $id = get('AtualizarItem');

  $resources = array_combine(array_keys($_POST['link']), array_map(function ($icon_social, $link) {
      return compact('icon_social', 'link');
  },$_POST['icon_social'], $_POST['link']));
  $_POST['social'] = json_encode($resources, JSON_FORCE_OBJECT);

  
  $data = array(
    'id_categoria'    => post('id_categoria'),
    'titulo'          => post('titulo'),
    'subtitulo'       => post('subtitulo'),
    'social'          => $_POST['social'],
    'auxiliar'        => post('auxiliar'),
    'txt_bt'          => post('txt_bt'),
    'bt_link'         =>post('bt_link'),
    'guia'            =>post('guia'),
    'featured'        =>post('featured'),
    'cor_bg_ft'       =>post('cor_bg_ft'),
    'cor_txt_ft'      =>post('cor_txt_ft'),
    'cor_tg_ft'       =>post('cor_tg_ft'),
    'cor_txt_tg_ft'   =>post('cor_txt_tg_ft'),
    'tg_txt'          =>post('tg_txt')
  );

  if(!empty($_FILES['imagem_arquivo']['name'])){
    // Inicializa o upload do arquivo
    $handle = new Upload($_FILES['imagem_arquivo']);

    $handle->file_new_name_body = md5(uniqid(rand(), true));
    $handle->Process($upload_folder);

    $data['imagem_arquivo'] = $handle->file_dst_name;
  }

  $query = DBUpdate('tabela_de_precos', $data, "id = '{$id}'");
  if ($query != 0) {
    Redireciona('?sucesso&VisualizarCategoria='.post('id_categoria').'&radar='.post('id_categoria'));
  } else {
    Redireciona('?erro&VisualizarCategoria='.post('id_categoria').'&radar='.post('id_categoria'));
  }
}

// Excluir Item
if (isset($_GET['DeletarItem'])) {
  if(!checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'item', 'deletar')){ Redireciona('./index.php'); }

  $id         = get('DeletarItem');
  $i_query    = DBRead('tabela_de_precos','*',"WHERE id = '{$id}'");
	$item        = $i_query[0];

  $query = DBDelete('tabela_de_precos',"id = '{$id}'");
  if ($query != 0) {
    Redireciona('?sucesso&VisualizarCategoria='.$item['id_categoria']);
  } else {
    Redireciona('?erro&VisualizarCategoria='.$item['id_categoria']);
  }
}


//
// CATEGORIA
//

// Adicionar Categoria
if (isset($_GET['AddCategoria'])) {
  if(!checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'categoria', 'adicionar')){ Redireciona('./index.php'); }

  $data = array(
    'nome'            => post('nome'),
    'colunas'         => post('colunas'),
    'estilo'          => post('estilo'),
    'cor_titulo'      => post('cor_titulo'),
    'cor_subtitulo'   => post('cor_subtitulo'),
    'cor_borda'       => post('cor_borda'),
    'efeito'          => post('efeito'),
    'ordenar_por'     => post('ordenar_por'),
    'asc_desc'        => post('asc_desc'),
    'limite'          => post('limite'),
    'ativa_paginacao' => post('ativa_paginacao'),
    'cor_bg'          => post('cor_bg'),
    'cor_bg_titulo'   => post('cor_bg_titulo'),
    'cor_bg_botao'    => post('cor_bg_botao'),
    'cor_botao'       => post('cor_botao'),
    'cor_hover_botao' => post('cor_hover_botao'),
    'cor_icone'       => post('cor_icone'),
    'cor_hover_icone' => post('cor_hover_icone'),
    'cor_hover_txt'   => post('cor_hover_texto_bt'),
    'efeito_hover'   => post('efeito_hover'),
  );

  $query = DBCreate('c_tabela_de_precos', $data);

  if ($query != 0) {
    Redireciona('?Implementacao&sucesso');
  } else {
    Redireciona('?Implementacao&erro');
  }
}

// Atualizar Categoria
if (isset($_GET['AtualizarCategoria'])) {
  if(!checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'categoria', 'editar')){ Redireciona('./index.php'); }

  $id = get('AtualizarCategoria');
  $data = array(
    'nome'            => post('nome'),
    'colunas'         => post('colunas'),
    'estilo'          => post('estilo'),
    'cor_titulo'      => post('cor_titulo'),
    'cor_subtitulo'   => post('cor_subtitulo'),
    'cor_borda'       => post('cor_borda'),
    'efeito'          => post('efeito'),
    'ordenar_por'     => post('ordenar_por'),
    'asc_desc'        => post('asc_desc'),
    'limite'          => post('limite'),
    'ativa_paginacao' => post('ativa_paginacao'),
    'cor_bg'          => post('cor_bg'),
    'cor_bg_titulo'   => post('cor_bg_titulo'),
    'cor_bg_botao'    => post('cor_bg_botao'),
    'cor_botao'       => post('cor_botao'),
    'cor_hover_botao' => post('cor_hover_botao'),
    'cor_icone'       => post('cor_icone'),
    'cor_hover_icone' => post('cor_hover_icone'),
    'cor_hover_txt'   => post('cor_hover_texto_bt'),
    'efeito_hover'   => post('efeito_hover'),
  );

  $query = DBUpdate('c_tabela_de_precos', $data, "id = '{$id}'");
  if ($query != 0) {
    Redireciona('?Implementacao&sucesso');
  } else {
    Redireciona('?Implementacao&erro');
  }
}

//Duplica Categoria & Item
  if (isset($_GET['DuplicarCategoria'])) {
    if(!checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'categoria', 'adicionar')){ Redireciona('./index.php'); }

    $id = get('DuplicarCategoria');

    $Query = DBRead('c_tabela_de_precos','*',"WHERE id = '{$id}' LIMIT 1");
    $Query = $Query[0];
    $uvo = $Query['id'];
    unset($Query['id']);

    $Query2 = DBRead('tabela_de_precos','*',"WHERE id_categoria = '{$id}'");
    unset($Query2['id']);
$Query1 = DBCreate('c_tabela_de_precos', $Query, true); 
      foreach ($Query2 as $vl) {

        $data = array(
    'titulo'        => $vl['titulo'],
    'id_categoria'  => $Query1,
    'subtitulo'       => $vl['subtitulo'],
    'social'          => $vl['social'],
    'auxiliar'        => $vl['auxiliar'],
    'txt_bt'          => $vl['txt_bt'],
    'bt_link'         =>$vl['bt_link'],
    'guia'            =>$vl['guia'],
    'featured'        =>$vl['featured'],
    'cor_bg_ft'       =>$vl['cor_bg_ft'],
    'cor_txt_ft'      =>$vl['cor_txt_ft'],
    'cor_tg_ft'       =>$vl['cor_tg_ft'],
    'cor_txt_tg_ft'   =>$vl['cor_txt_tg_ft'],
    'tg_txt'          =>$vl['tg_txt'],
    );
     DBCreate('tabela_de_precos', $data);
      }

                
    
     if ($Query1 != 0) {
    Redireciona('?Implementacao&sucesso');
  } else {
    Redireciona('?Implementacao&erro');
  }
}
// Excluir Categoria
if (isset($_GET['DeletarCategoria'])) {
  if(!checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'categoria', 'deletar')){ Redireciona('./index.php'); }

  $id = get('DeletarCategoria');
  $query = DBDelete('c_tabela_de_precos',"id = '{$id}'");
  if ($query != 0) {
    Redireciona('?Implementacao&sucesso');
  } else {
    Redireciona('?Implementacao&erro');
  }
}
