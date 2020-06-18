<?php
	require_once('includes/funcoes.php');
	require_once('includes/header.php');
?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css_js/jquery-ui.css">
<link rel="stylesheet" href="assets/plugins/iconpicker/bootstrap-iconpicker.min.css"/>

<?php
	require_once('includes/menu.php');
	require_once('controller/tabela_de_precos.php');
	$TitlePage = 'Tabela de Preços';
	$UrlPage   = 'tabela_de_precos.php';
?>

<div class="has-sidebar-left">
	<header class="blue accent-3 relative nav-sticky">
		<div class="container-fluid text-white">
			<div class="row p-t-b-10 ">
				<div class="col">
					<h4><i class="icon-usd"></i> <?php echo $TitlePage; ?></h4>
				</div>
			</div>
		</div>
	</header>

	<div class="container-fluid animatedParent animateOnce my-3">
		<p>
			<?php if (DadosSession('nivel') == 1) { ?>
  			<a class="btn btn-sm btn-primary" href="<?php echo $UrlPage; ?>">Categorias cadastradas</a>
			  <?php if (checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'categoria', 'adicionar')) { ?>
  			<a class="btn btn-sm btn-primary" href="?AdicionarCategoria">Cadastrar categoria</a>
<?php } ?>
				<?php if(isset($_GET['VisualizarCategoria'])){ ?>
					<?php if (checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'item', 'adicionar')) { ?>
					<a class="btn btn-sm btn-primary" href="?AdicionarItem=<?php echo get('VisualizarCategoria'); ?>">Adicionar coluna</a>
<?php } ?>
				<?php } ?>
  			<button class="btn btn-sm behance text-white" data-toggle="modal" data-target="#Ajuda"><i class="icon-question-circle"></i></button>
			<?php } ?>
		</p>

		<!-- LISTAR ITENS -->
		<?php if(isset($_GET['VisualizarCategoria'])){ ?>
			<?php $id = get('VisualizarCategoria'); $c_query = DBRead('c_tabela_de_precos','*',"WHERE id = '{$id}'"); $categoria = $c_query['0']; ?>

			<div class="card">
				<div class="card-header white">
					<strong>#<?php echo $categoria['id']; ?> <?php echo $categoria['nome']; ?> > Tabela</strong>
				</div>

				<?php $Query = DBRead('tabela_de_precos','*',"WHERE id_categoria = ".$id); if (is_array($Query)) {  ?>

					<div class="card-body p-0">
						<div>
							<div>
								<table id="DataTable" class="table m-0 table-striped">
									<tr>
										<th>ID</th>
										<th>Imagem <i class="icon icon-question-circle tooltips" data-tooltip="Apenas para estilo 5"></i></th>
										<th>Título</th>
										<th>Valor</th>
										<?php if (DadosSession('nivel') == 1) { ?>
										<th width="53px">Ações</th>
										<?php } ?>
									</tr>

									<?php foreach ($Query as $dados) { ?>
										<tr>
											<td><?php echo $dados['id']; ?></td>
											<td>
												<img style="display: <?php $id = get('VisualizarCategoria'); $C = DBRead('c_tabela_de_precos','*',"WHERE id = '{$id}'")[0];  if ( $C['estilo'] < 5) {echo "none";} ?>;"  src="wa/tabela_de_precos/uploads/<?php echo $dados['imagem_arquivo']; ?>" width="100"></td>
											<td><?php echo LimitarTexto($dados['titulo'],'80','...'); ?></td>
											<td><?php echo LimitarTexto($dados['subtitulo'],'200','...'); ?></td>
											<?php if (DadosSession('nivel') == 1) { ?>
												<td>
													<div class="dropdown">
														<a class="" href="#" data-toggle="dropdown">
															<i class="icon-apps blue lighten-2 avatar"></i>
														</a>

														<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">
														<?php if (checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'item', 'editar')) { ?>
															<a class="dropdown-item" href="?EditarItem=<?php echo $dados['id']; ?>&radar=<?php echo get('radar')?>"><i class="text-primary icon icon-pencil"></i> Editar</a>
<?php } ?>
															<?php if ($dados['id'] != 0) { ?>
																<?php if (checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'item', 'deletar')) { ?>
																<a class="dropdown-item" onclick="DeletarItem(<?php echo $dados['id']; ?>, 'DeletarItem');" href="#!"><i class="text-danger icon icon-remove"></i> Excluir</a>
<?php } ?>
															<?php } ?>
														</div>
													</div>
												</td>
											<?php } ?>
										</tr>
									<?php } ?>
								</table>
							</div>
						</div>
					</div>

				<?php } else { ?>
					<div class="card-body">
					<?php if (checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'item', 'adicionar')) { ?>
						<div class="alert alert-info">Nenhuma coluna adicionada até o momento, <a href="?AdicionarItem=<?php echo $_GET['VisualizarCategoria']; ?>">clique aqui</a> para adicionar.
						<?php } ?>
					</div>
				<?php } ?>
			</div>

		<!--  Adicionar Item -->
		<?php } elseif(isset($_GET['AdicionarItem'])){ if(!checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'item', 'adicionar')){ Redireciona('./index.php'); } ?>
				<form method="post" action="?AddItem=<?php echo $_GET['AdicionarItem'];?>" enctype="multipart/form-data">
					<div class="card">
						<div class="card-header  white">
							<strong>Adcionar Itens</strong>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-md-12">
									<input name="id_categoria" type="hidden" value="<?php echo $_GET['AdicionarItem'];?>">

									<div class="form-group">
										<label>Título: </label>
										<input class="form-control" name="titulo" required>
									</div>

									<div class="form-group">
										<label>Preço: </label>
										<input class="form-control" name="subtitulo" required>
									</div>
									<div class="form-group">
										<label>Texto auxiliar de preço: </label>
										<input class="form-control" name="auxiliar" >
									</div>

									<div class="form-group">
					                    <label>Conteúdo: <i class="icon icon-question-circle" data-toggle="tooltip" data-placement="right" ></i></label>
					                    <div id="input_group">
					                      <div class="row">
					                        <div class="col-md-12"><button type="button" class="btn btn-primary btnAdd" style="margin-bottom: 15px;"><i class="fas fa-plus"></i></button></div>
					                      </div>

					                      <div class="row groupItens">
					                        <div class="col-md-1">
					                          <div class="form-group">
					                            <div class="input-group iconinput">
					                              <span class="input-group-btn">
					                                  <button name="icon_social[]" type="button" class="btn btn-default target" data-icon="" role="iconpicker" data-selected-class="btn-success" data-search-text="Pesquisar" data-label-footer="{0} - {1} de {2} ícones" data-rows="5" data-cols="10" data-arrow-class="btn-default" data-arrow-prev-icon-class="fa fa-angle-left" data-arrow-next-icon-class="fa fa-angle-right" data-iconset-version="5.3.1" data-iconset="fontawesome5"></button>
					                              </span>
					                            </div>
					                          </div>
					                        </div>
					                        <div class="col-md-10">
					                          <input class="form-control" type="text" name="link[]" placeholder="Texto Conteúdo">
					                        </div>
					                        <div class="col-md-1 pull-right">
					                          <button type="button" class="btn btn-danger btnRemove"><i class="fas fa-trash"></i></button>
					                        </div>
					                      </div>

					                    </div>
					                </div>
					                <div class="form-group">
										<label>Texto do Botão: </label>
										<input class="form-control" name="txt_bt" >
									</div>
									<div class="form-group">
										<label>Link Botão: </label>
										<input class="form-control" type="url" name="bt_link">
									</div>
										<div class="form-group" >
											<label>Nova Guia:</label>
											<select class="form-control custom-select" name="guia">
												<option value="Sim" selected>Sim</option>
												<option value="Não">Não</option>
											</select>
										</div>
									</div>
									<div class="form-group" style="display: <?php $id = get('AdicionarItem'); $A = DBRead('c_tabela_de_precos','*',"WHERE id = '{$id}'")[0];  if ( $A['estilo'] < 5) {
											echo "none";
										} ?>;" >
										<label>Imagem: <i class="icon icon-question-circle tooltips" data-toggle="tooltip" data-placement="right" data-tooltip="Resolução da imagem 250x250."></i></label>
		
										<input type="file" class="form-control" name="imagem_arquivo" accept="image/*">
									</div>
								</div>
								<label for="chkPassport"> Destacar Coluna?<br><input name="featured" type="checkbox" id="chkPassport" value="margin-top: 25%" />
									    
									</label>
									
									<div class="row" id="dvPassport" style="display: none">
								<div class="col-md-6">
									<div class="form-group">
										<label>Cor do Texto:</label>
										<div class="color-picker input-group colorpicker-element focused">
					          				<input class="form-control" name="cor_txt_ft" value="#242424">
											<span class="input-group-append">
												<span class="input-group-text add-on white">
													<i class="circle"></i>
												</span>
											</span>
						        		</div>
							    	</div>
							    	<div class="form-group">
										<label>Cor da Tag:</label>
										<div class="color-picker input-group colorpicker-element focused">
					          				<input class="form-control" name="cor_tg_ft" value="#242424">
											<span class="input-group-append">
												<span class="input-group-text add-on white">
													<i class="circle"></i>
												</span>
											</span>
						        		</div>
							    	</div>
							    	
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Cor do fundo da Coluna:</label>
											<div class="color-picker input-group colorpicker-element focused">
					          					<input class="form-control" name="cor_bg_ft" value="#242424">
												<span class="input-group-append">
													<span class="input-group-text add-on white">
														<i class="circle"></i>
													</span>
												</span>
						        			</div>
							    		</div>
							    		<div class="form-group">
										<label>Cor do Texto da Tag:</label>
										<div class="color-picker input-group colorpicker-element focused">
					          				<input class="form-control" name="cor_txt_tg_ft" value="#242424">
											<span class="input-group-append">
												<span class="input-group-text add-on white">
													<i class="circle"></i>
												</span>
											</span>
						        		</div>
							    	</div>
							    	</div>
							    	<div class="form-group"style="width: 97%;margin-left: 20px;">
										<label>Texto da Tag: </label>
										<input  class="form-control" name="tg_txt" >
									</div>
								</div><br>
									<button class="btn btn-primary float-right" type="submit">Adicionar</button>
								
							</div>
						</div>
					</div>
				</form>
		<!--  Editar Item -->
		<?php } elseif(isset($_GET['EditarItem'])){ if(!checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'item', 'editar')){ Redireciona('./index.php'); } ?>
			<?php $id = get('EditarItem'); $Query = DBRead('tabela_de_precos','*',"WHERE id = '{$id}'"); if (is_array($Query)) { foreach ($Query as $dados) { ?>

				<form method="post" action="?AtualizarItem=<?php echo $id; ?>" enctype="multipart/form-data">
					<div class="card">
						<div class="card-header  white">
							<strong>Editar Coluna</strong>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-md-12">
									<input name="id" type="hidden" value="<?php echo $dados['id'];?>">

									<input name="id_categoria" type="hidden" value="<?php echo $dados['id_categoria'];?>">

									<div class="form-group">
										<label>Título: </label>
										<input class="form-control" name="titulo" required value="<?php echo $dados['titulo'];?>">
									</div>

									<div class="form-group">
										<label>Preço: </label>
										<input class="form-control" name="subtitulo" required value="<?php echo $dados['subtitulo'];?>">
									</div>
									<div class="form-group">
										<label>Texto auxiliar de preço: </label>
										<input class="form-control" name="auxiliar" value="<?php echo $dados['auxiliar'];?>">
									</div>

									<div class="form-group">
					                  <label>Conteúdo: </label>
					                    <div id="input_group">
					                      <div class="row">
					                        <div class="col-md-12">
					                        	<button type="button" class="btn btn-primary btnAdd" style="margin-bottom: 15px;">
					                        		<i class="fas fa-plus">					                        		</i>
					                        	</button>
					                        </div>
					                      </div>
											
										<?php $ArrayFeatures = json_decode($dados['social']); foreach ($ArrayFeatures as $data): ?>										
					                      <div class="row groupItens">
					                        <div class="col-md-1">
					                          <div class="form-group">
					                            <div class="input-group iconinput">
					                              <span class="input-group-btn">
					                                  <button name="icon_social[]" type="button" class="btn btn-default target" data-icon="<?php echo $data->icon_social; ?>" role="iconpicker" data-selected-class="btn-success" data-search-text="Pesquisar" data-label-footer="{0} - {1} de {2} ícones" data-rows="5" data-cols="10" data-arrow-class="btn-default" data-arrow-prev-icon-class="fa fa-angle-left" data-arrow-next-icon-class="fa fa-angle-right" data-iconset-version="5.3.1" data-iconset="fontawesome5"></button>
					                              </span>
					                            </div>
					                          </div>
					                        </div>
					                        <div class="col-md-10">
					                          <input class="form-control" type="text" name="link[]" value="<?php echo $data->link; ?>" placeholder="Texto Conteúdo">
					                        </div>
					                        <div class="col-md-1 pull-right">
					                          <button type="button" class="btn btn-danger btnRemove"><i class="fas fa-trash"></i></button>
					                        </div>
					                      </div>
					                  <?php endforeach; ?>

					                    </div>
					                </div>
					                <div class="form-group">
										<label>Texto do Botão: </label>
										<input class="form-control" name="txt_bt"  value="<?php echo $dados['txt_bt'];?>">
									</div>
									 <div class="form-group">
										<label>Link Botão: </label>
										<input class="form-control" name="bt_link" type="url" value="<?php echo $dados['bt_link'];?>">
									</div>
									<div class="form-group" >
									<label>Nova Guia:</label>
									<select class="form-control custom-select" name="guia">
										<option value="Sim" <?php Selected($dados['guia'], 'Sim'); ?>>Sim</option>
										<option value="Não" <?php Selected($dados['guia'], 'Não'); ?>>Não</option>
									</select>
								</div>
									<div class="form-group" style="display: <?php $id = get('radar'); $B = DBRead('c_tabela_de_precos','*',"WHERE id = '{$id}'")[0];  if ( $B['estilo'] < 5) {echo "none";} ?>;" >
										<label>Imagem Atual:</label><br> 
										<img src="wa/tabela_de_precos/uploads/<?php echo $dados['imagem_arquivo']; ?>" width="100"><br><br>
										<label>Imagem: <i class="icon icon-question-circle tooltips" data-toggle="tooltip" data-placement="right" data-tooltip="Resolução da imagem 250x250."></i></label>
										<input type="file" class="form-control" name="imagem_arquivo" accept="image/*">
									</div>

									<label for="chkPassport"> Destacar Coluna?<br><input name="featured" type="checkbox" id="chkPassport" value="margin-top: 25%" <?php if ($dados['featured'] === 'margin-top: 25%'){echo "checked";}?> />
									    
									</label>
									
									<div class="row" id="dvPassport" style="display: none">
									    <div class="col-md-6">
									<div class="form-group">
										<label>Cor do Texto:</label>
										<div class="color-picker input-group colorpicker-element focused">
					          				<input class="form-control" name="cor_txt_ft" value="<?php echo $dados['cor_txt_ft']; ?>">
											<span class="input-group-append">
												<span class="input-group-text add-on white">
													<i class="circle"></i>
												</span>
											</span>
						        		</div>
							    	</div>
							    	<div class="form-group">
										<label>Cor da Tag:</label>
										<div class="color-picker input-group colorpicker-element focused">
					          				<input class="form-control" name="cor_tg_ft" value="<?php echo $dados['cor_tg_ft']; ?>">
											<span class="input-group-append">
												<span class="input-group-text add-on white">
													<i class="circle"></i>
												</span>
											</span>
						        		</div>
							    	</div>
							    	
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Cor do Fundo da Coluna:</label>
											<div class="color-picker input-group colorpicker-element focused">
					          					<input class="form-control" name="cor_bg_ft" value="<?php echo $dados['cor_bg_ft']; ?>">
												<span class="input-group-append">
													<span class="input-group-text add-on white">
														<i class="circle"></i>
													</span>
												</span>
						        			</div>
							    		</div>
							    		<div class="form-group">
										<label>Cor do Texto da Tag:</label>
										<div class="color-picker input-group colorpicker-element focused">
					          				<input class="form-control" name="cor_txt_tg_ft" value="<?php echo $dados['cor_txt_tg_ft']; ?>">
											<span class="input-group-append">
												<span class="input-group-text add-on white">
													<i class="circle"></i>
												</span>
											</span>
						        		</div>
							    	</div>
							    	</div>
							    	<div class="form-group"style="width: 97%;margin-left: 20px;">
										<label>Texto da Tag: </label>
										<input  class="form-control" name="tg_txt" value="<?php echo $dados['tg_txt'];?>">
									</div>
								</div><br>
									<button class="btnSubmit btn btn-primary float-right" type="submit">Editar</button>
								
							</div>
						</div>
					</div>
				</form>
			<?php }} ?>
		<!--  ADD CATEGORIA -->
		<?php } elseif(isset($_GET['AdicionarCategoria'])){ if(!checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'categoria', 'adicionar')){ Redireciona('./index.php'); } ?>

			<form method="post" action="?AddCategoria" enctype="multipart/form-data">
				<div class="card">
					<div class="card-header  white">
						<strong>Adicionar Categoria</strong>
					</div>

					<div class="card-body">
						<div class="row">
							<div class="col-md-6">

								<div class="form-group">
									<label>Nome da Categoria:</label>
									<input class="form-control" name="nome" required>
								</div>

								<div class="form-group">
									<label>Colunas:</label>
									<select class="form-control" name="colunas">
										<option value="1">1 Coluna</option>
										<option value="2">2 Colunas</option>
										<option value="3">3 Colunas</option>
										<option value="4">4 Colunas</option>
									</select>
								</div>

								<div class="form-group">
									<label>Ordernar por:</label>
									<select class="form-control custom-select" name="ordenar_por">
										<option value="id" selected>ID (Ordem de Criação)</option>
										<option value="titulo">Título</option>
									</select>
								</div>

								<div class="form-group">
									<label>Ordem de Exibição:</label>
									<select class="form-control custom-select" name="asc_desc">
										<option value="ASC" selected>Crescente (Menor > Maior)</option>
										<option value="DESC">Decrescente (Maior > Menor)</option>
									</select>
								</div>

								<div class="form-group">
									<label>Mostrar Paginação:</label>
									<select class="form-control custom-select" name="ativa_paginacao">
										<option value="S">Sim</option>
										<option value="N" selected>Não</option>
									</select>
								</div>

								<div class="form-group">
									<label>Limitar Listagem:</label>
									<input class="form-control" name="limite" type="number">
								</div>

								<div class="form-group">
									<label>Estilo:</label>
									<select class="form-control" name="estilo">
										<option value="1">Estilo 01</option>
										<option value="2">Estilo 02</option>
										<option value="3">Estilo 03</option>
										<option value="4">Estilo 04</option>
										<option value="5">Estilo 05</option>									
									</select>
								</div>
								<div class="form-group">
									<label>Efeito Hover:</label>
									<select class="form-control custom-select" name="efeito_hover">
										<option value="Sim" selected>Sim</option>
										<option value="Não" >Não</option>
									</select>
								</div>

								<div class="form-group">
									<label>Cor do Titulo:</label>
									<div class="color-picker input-group colorpicker-element focused">
				          				<input class="form-control" name="cor_titulo" value="#242424">
										<span class="input-group-append">
											<span class="input-group-text add-on white">
												<i class="circle"></i>
											</span>
										</span>
					        		</div>
						    	</div>
						    	<div class="form-group">
									<label>Cor do Conteúdo:</label>
									<div class="color-picker input-group colorpicker-element focused">
				          				<input class="form-control" name="cor_bg" value="#242424">
										<span class="input-group-append">
											<span class="input-group-text add-on white">
												<i class="circle"></i>
											</span>
										</span>
					        		</div>
						    	</div>
						    </div>
						    <div class="col-md-6">
						    	<div class="form-group">
									<label>Cor da Coluna:</label>
									<div class="color-picker input-group colorpicker-element focused">
				          				<input class="form-control" name="cor_botao" value="#242424">
										<span class="input-group-append">
											<span class="input-group-text add-on white">
												<i class="circle"></i>
											</span>
										</span>
					        		</div>
						    	</div>
						    	<div class="form-group">
									<label>Cor Hover Coluna:</label>
									<div class="color-picker input-group colorpicker-element focused">
				          				<input class="form-control" name="cor_icone" value="#242424">
										<span class="input-group-append">
											<span class="input-group-text add-on white">
												<i class="circle"></i>
											</span>
										</span>
					        		</div>
						    	</div>
						    	<div class="form-group">
									<label>Cor do Preço:</label>
									<div class="color-picker input-group colorpicker-element focused">
				          				<input class="form-control" name="cor_subtitulo" value="#242424">
										<span class="input-group-append">
											<span class="input-group-text add-on white">
												<i class="circle"></i>
											</span>
										</span>
					        		</div>
						    	</div>
						    	<div class="form-group">
									<label>Cor do Fundo do Preço:</label>
									<div class="color-picker input-group colorpicker-element focused">
				          				<input class="form-control" name="cor_bg_botao" value="#242424">
										<span class="input-group-append">
											<span class="input-group-text add-on white">
												<i class="circle"></i>
											</span>
										</span>
					        		</div>
						    	</div>
						    	<div class="form-group">
									<label>Cor Hover Preço:</label>
									<div class="color-picker input-group colorpicker-element focused">
				          				<input class="form-control" name="cor_borda" value="#242424">
										<span class="input-group-append">
											<span class="input-group-text add-on white">
												<i class="circle"></i>
											</span>
										</span>
					        		</div>
						    	</div>
						    	<div class="form-group">
									<label>Cor do Botão:</label>
									<div class="color-picker input-group colorpicker-element focused">
				          				<input class="form-control" name="cor_hover_botao" value="#242424">
										<span class="input-group-append">
											<span class="input-group-text add-on white">
												<i class="circle"></i>
											</span>
										</span>
					        		</div>
						    	</div>
						    	<div class="form-group">
									<label>Cor do Texto do Botão:</label>
									<div class="color-picker input-group colorpicker-element focused">
				          				<input class="form-control" name="cor_bg_titulo" value="#242424">
										<span class="input-group-append">
											<span class="input-group-text add-on white">
												<i class="circle"></i>
											</span>
										</span>
					        		</div>
						    	</div>
						    	<div class="form-group">
									<label>Cor Hover Botão:</label>
									<div class="color-picker input-group colorpicker-element focused">
				          				<input class="form-control" name="cor_hover_icone" value="#242424">
										<span class="input-group-append">
											<span class="input-group-text add-on white">
												<i class="circle"></i>
											</span>
										</span>
					        		</div>
						    	</div>
						    	<div class="form-group">
									<label>Cor Hover Texto Botão:</label>
										<div class="color-picker input-group colorpicker-element focused">
					          				<input class="form-control" name="cor_hover_texto_bt" value="#242424">
											<span class="input-group-append">
												<span class="input-group-text add-on white">
													<i class="circle"></i>
												</span>
											</span>
						        		</div>
							    	</div>												    	
								<div class="form-group <?php if (DadosSession('nivel') <> 1){ ?>hidden<?php } ?>">
									<label>Efeito de Entrada do Módulo:</label>
									<select name="efeito" required class="form-control custom-select">
										<option value="none">Nenhum</option>
										<option value="tc-animation-slide-top">Slide Top</option>
										<option value="tc-animation-slide-right">Slide Right</option>
										<option value="tc-animation-slide-bottom">Slide Bottom</option>
										<option value="tc-animation-slide-left">Slide Left</option>
										<option value="tc-animation-scale-up">Scale Up</option>
										<option value="tc-animation-scale-down">Scale Down</option>
										<option value="tc-animation-scale">Scale</option>
										<option value="tc-animation-shake">Shake</option>
										<option value="tc-animation-rotate">Rotate</option>
									</select>
								</div>
							</div>
						</div>
					</div>

					<div class="card-footer white">
						<button class="btn btn-primary float-right" type="submit">Cadastrar</button>
					</div>
				</div>
  		</form>

		<!--  EDITAR CATEGORIA -->
		<?php } elseif(isset($_GET['EditarCategoria'])){ if(!checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'categoria', 'editar')){ Redireciona('./index.php'); } ?>
			<?php $id = get('EditarCategoria'); $Query = DBRead('c_tabela_de_precos','*',"WHERE id = '{$id}'"); if (is_array($Query)) { foreach ($Query as $dados) { ?>
				<form method="post" action="?AtualizarCategoria=<?php echo $id; ?>" enctype="multipart/form-data">
					<div class="card">
						<div class="card-header  white">
							<strong>Editar Categorial</strong>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-md-6">

									<div class="form-group">
										<label>Nome da Categoria:</label>
										<input class="form-control" name="nome" value="<?php echo $dados['nome']; ?>" required>
									</div>

									<div class="form-group">
										<label>Colunas:</label>
										<select class="form-control" name="colunas">
											<option value="1" <?php Selected($dados['colunas'], '1'); ?>>1 Coluna</option>
											<option value="2" <?php Selected($dados['colunas'], '2'); ?>>2 Colunas</option>
											<option value="3" <?php Selected($dados['colunas'], '3'); ?>>3 Colunas</option>
											<option value="4" <?php Selected($dados['colunas'], '4'); ?>>4 Colunas</option>
										</select>
									</div>

									<div class="form-group">
										<label>Ordernar por:</label>
										<select class="form-control custom-select" name="ordenar_por">
											<option value="id" <?php Selected($dados['ordenar_por'], 'id'); ?>>ID (Ordem de Criação)</option>
											<option value="titulo" <?php Selected($dados['ordenar_por'], 'titulo'); ?>>Título</option>
										</select>
									</div>

									<div class="form-group">
										<label>Ordem de Exibição:</label>
										<select class="form-control custom-select" name="asc_desc">
											<option value="ASC" <?php Selected($dados['asc_desc'], 'ASC'); ?>>Crescente (Menor > Maior)</option>
											<option value="DESC" <?php Selected($dados['asc_desc'], 'DESC'); ?>>Decrescente (Maior > Menor)</option>
										</select>
									</div>

									<div class="form-group">
										<label>Mostrar Paginação:</label>
										<select class="form-control custom-select" name="ativa_paginacao" value="S">
											<option value="S" <?php Selected($dados['ativa_paginacao'], 'S'); ?>>Sim</option>
											<option value="N" <?php Selected($dados['ativa_paginacao'], 'N'); ?>>Não</option>
										</select>
									</div>

									<div class="form-group">
										<label>Limitar Listagem:</label>
										<input class="form-control" name="limite" type="number" value="<?php echo $dados['limite']; ?>">
									</div>

									<div class="form-group">
										<label>Estilo:</label>
										<select class="form-control" name="estilo">
											<option value="1" <?php Selected($dados['estilo'], '1'); ?>>Estilo 01</option>
											<option value="2" <?php Selected($dados['estilo'], '2'); ?>>Estilo 02</option>
											<option value="3" <?php Selected($dados['estilo'], '3'); ?>>Estilo 03</option>
											<option value="4" <?php Selected($dados['estilo'], '4'); ?>>Estilo 04</option>
											<option value="5" <?php Selected($dados['estilo'], '5'); ?>>Estilo 05</option>
										</select>
									</div>
									<div class="form-group">
									<label>Efeito Hover:</label>
									<select class="form-control custom-select" name="efeito_hover">
										<option value="Sim"<?php Selected($dados['efeito_hover'], 'Sim'); ?>>Sim</option>
										<option value="Não" <?php Selected($dados['efeito_hover'], 'Não'); ?>>Não</option>
									</select>
								</div>

									<div class="form-group">
										<label>Cor do Titulo:</label>
										<div class="color-picker input-group colorpicker-element focused">
					          				<input class="form-control" name="cor_titulo" value="<?php echo $dados['cor_titulo']; ?>">
											<span class="input-group-append">
												<span class="input-group-text add-on white">
													<i class="circle"></i>
												</span>
											</span>
						        		</div>
							    	</div>
							    	<div class="form-group">
										<label>Cor do Conteúdo:</label>
										<div class="color-picker input-group colorpicker-element focused">
					          				<input class="form-control" name="cor_bg" value="<?php echo $dados['cor_bg']; ?>">
											<span class="input-group-append">
												<span class="input-group-text add-on white">
													<i class="circle"></i>
												</span>
											</span>
						        		</div>
							    	</div> 	
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Cor da Coluna:</label>
										<div class="color-picker input-group colorpicker-element focused">
					          				<input class="form-control" name="cor_botao" value="<?php echo $dados['cor_botao']; ?>">
											<span class="input-group-append">
												<span class="input-group-text add-on white">
													<i class="circle"></i>
												</span>
											</span>
						        		</div>
							    	</div>
							    	<div class="form-group">
										<label>Cor Hover Coluna:</label>
										<div class="color-picker input-group colorpicker-element focused">
					          				<input class="form-control" name="cor_icone" value="<?php echo $dados['cor_icone']; ?>">
											<span class="input-group-append">
												<span class="input-group-text add-on white">
													<i class="circle"></i>
												</span>
											</span>
						        		</div>
							    	</div>
									<div class="form-group">
										<label>Cor do Preço:</label>
										<div class="color-picker input-group colorpicker-element focused">
					          				<input class="form-control" name="cor_subtitulo" value="<?php echo $dados['cor_subtitulo']; ?>">
											<span class="input-group-append">
												<span class="input-group-text add-on white">
													<i class="circle"></i>
												</span>
											</span>
						        		</div>
							    	</div>								
									<div class="form-group">
										<label>Cor do Fundo do Preço:</label>
										<div class="color-picker input-group colorpicker-element focused">
					          				<input class="form-control" name="cor_bg_botao" value="<?php echo $dados['cor_bg_botao']; ?>">
											<span class="input-group-append">
												<span class="input-group-text add-on white">
													<i class="circle"></i>
												</span>
											</span>
						        		</div>
							    	</div>
							    	<div class="form-group">
										<label>Cor Hover Preço:</label>
										<div class="color-picker input-group colorpicker-element focused">
					          				<input class="form-control" name="cor_borda" value="<?php echo $dados['cor_borda']; ?>">
											<span class="input-group-append">
												<span class="input-group-text add-on white">
													<i class="circle"></i>
												</span>
											</span>
						        		</div>
							    	</div>
							    	<div class="form-group">
										<label>Cor do Botão:</label>
										<div class="color-picker input-group colorpicker-element focused">
					          				<input class="form-control" name="cor_hover_botao" value="<?php echo $dados['cor_hover_botao']; ?>">
											<span class="input-group-append">
												<span class="input-group-text add-on white">
													<i class="circle"></i>
												</span>
											</span>
						        		</div>
							    	</div>
							    	<div class="form-group">
										<label>Cor do Texto do Botão:</label>
										<div class="color-picker input-group colorpicker-element focused">
					          				<input class="form-control" name="cor_bg_titulo" value="<?php echo $dados['cor_bg_titulo']; ?>">
											<span class="input-group-append">
												<span class="input-group-text add-on white">
													<i class="circle"></i>
												</span>
											</span>
						        		</div>
							    	</div>
							    	<div class="form-group">
										<label>Cor Hover Botão:</label>
										<div class="color-picker input-group colorpicker-element focused">
					          				<input class="form-control" name="cor_hover_icone" value="<?php echo $dados['cor_hover_icone']; ?>">
											<span class="input-group-append">
												<span class="input-group-text add-on white">
													<i class="circle"></i>
												</span>
											</span>
						        		</div>
							    	</div>
							    	<div class="form-group">
										<label>Cor Hover Texto Botão:</label>
										<div class="color-picker input-group colorpicker-element focused">
					          				<input class="form-control" name="cor_hover_texto_bt" value="<?php echo $dados['cor_hover_txt']; ?>">
											<span class="input-group-append">
												<span class="input-group-text add-on white">
													<i class="circle"></i>
												</span>
											</span>
						        		</div>
							    	</div>
									<div class="form-group <?php if (DadosSession('nivel') <> 1){ ?>hidden<?php } ?>">
										<label>Efeito de Entrada do Módulo:</label>
										<select name="efeito" required class="form-control custom-select">
											<option value="none">Nenhum</option>
											<option value="tc-animation-slide-top" <?php Selected($dados['efeito'], 'tc-animation-slide-top'); ?>>Slide Top</option>
											<option value="tc-animation-slide-right" <?php Selected($dados['efeito'], 'tc-animation-slide-right'); ?>>Slide Right</option>
											<option value="tc-animation-slide-bottom" <?php Selected($dados['efeito'], 'tc-animation-slide-bottom'); ?>>Slide Bottom</option>
											<option value="tc-animation-slide-left" <?php Selected($dados['efeito'], 'tc-animation-slide-left'); ?>>Slide Left</option>
											<option value="tc-animation-scale-up" <?php Selected($dados['efeito'], 'tc-animation-scale-up'); ?>>Scale Up</option>
											<option value="tc-animation-scale-down" <?php Selected($dados['efeito'], 'tc-animation-scale-down'); ?>>Scale Down</option>
											<option value="tc-animation-scale" <?php Selected($dados['efeito'], 'tc-animation-scale'); ?>>Scale</option>
											<option value="tc-animation-shake" <?php Selected($dados['efeito'], 'tc-animation-shake'); ?>>Shake</option>
											<option value="tc-animation-rotate" <?php Selected($dados['efeito'], 'tc-animation-rotate'); ?>>Rotate</option>
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="card-footer white">
							<button class="btn btn-primary float-right" type="submit">Atualizar</button>
						</div>
					</div>
				</form>
			<?php } } ?>

		<!--  LISTAR CATEGORIAS -->
		<?php } else { ?>

			<div class="card">
				<div class="card-header white">
					<strong>Categorias</strong>
				</div>

				<?php $Query = DBRead('c_tabela_de_precos','*'); if (is_array($Query)) {  ?>
					<div class="card-body p-0">
						<div>
							<div>
								<table id="DataTable" class="table m-0 table-striped">
									<tr>
										<th>ID</th>
										<th>Nome</th>
										<th>Colunas</th>
										<?php if (DadosSession('nivel') == 1) { ?>
										<th>Implementação</th>
										<th width="53px">Ações</th>
										<?php } ?>
									</tr>

									<?php
										foreach ($Query as $dados) {
											$CodSite  = '<div id="Tabela'.$dados['id'].'" data-painel="'.RemoveHttpS(ConfigPainel('base_url')).'"></div>'."\n";
											$CodSite .= '<script type="text/javascript">Tabela('.$dados['id'].',1);</script>';
									?>
									<tr>
										<td><?php echo $dados['id']; ?></td>
										<td><?php echo LimitarTexto($dados['nome'],'80','...'); ?></td>
										<td>
										<?php if (checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'item', 'adicionar')) { ?>
											<a class="tooltips" data-tooltip="Adicionar" href="?AdicionarItem=<?php echo $dados['id']; ?>&radar=<?php echo $dados['id'] ;?>">
												<i class="icon-plus blue lighten-2 avatar"></i>
											</a>
<?php } ?>

											<a class="tooltips" data-tooltip="Visualizar" href="?VisualizarCategoria=<?php echo $dados['id']; ?>&radar=<?php echo $dados['id'] ;?>">
												<i class="icon-eye blue lighten-2 avatar"></i>
											</a>
										</td>

										<?php if (DadosSession('nivel') == 1) { ?>
											<td>
											<?php if (checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'codigo', 'acessar')) { ?>
												<button
												id="btnCopiarCodSite<?php echo $dados['id']; ?>"
												class="btn btn-primary btn-xs"
												onclick="CopiadoCodSite(<?php echo $dados['id']; ?>)"
												data-clipboard-text='<?php echo $CodSite; ?>'>
													<i class="icon icon-code"></i> Copiar Cód. do Site
												</button>
<?php } ?>
											</td>
											<td>
												<div class="dropdown">
													<a class="" href="#" data-toggle="dropdown">
														<i class="icon-apps blue lighten-2 avatar"></i>
													</a>

													<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">
													<?php if (checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'categoria', 'editar')) { ?>
														<a class="dropdown-item" href="?EditarCategoria=<?php echo $dados['id']; ?>"><i class="text-primary icon icon-pencil"></i> Editar</a>
<?php } ?>
														<?php if ($dados['id'] != 0) { ?>
															<?php if (checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'categoria', 'deletar')) { ?>
															<a class="dropdown-item" href="#" onclick="DeletarItem(<?php echo $dados['id']; ?>, 'DeletarCategoria');"><i class="text-danger icon icon-remove"></i> Excluir</a>
<?php } ?>
														<?php } ?>
													</div>
												</div>
											</td>
										<?php } ?>
									</tr>
									<?php } ?>
								</table>
							</div>
						</div>
					</div>
				<?php } else { ?>
					<div class="card-body">
						<div class="alert alert-info">Nenhuma categoria de tabela de preços adicionada até o momento, <a href="?AdicionarCategoria">clique aqui</a> para adicionar.
					</div>
				<?php } ?>

			</div>

    <?php } ?>
	</div>

<?php require_once('includes/footer.php'); ?>
<script src="css_js/jquery.multifield.min.js"></script>
<script type="text/javascript" src="assets/plugins/iconpicker/bootstrap-iconpicker.bundle.min.js"></script>

<script type="text/javascript">
	$(function () {
		$('[data-toggle="tooltip"]').tooltip();
		$('.target').iconpicker();
	});

	$('#input_group').multifield({
	    section: '.groupItens',
	    btnAdd:'.btnAdd',
	    btnRemove:'.btnRemove',
	    locale:{
	      "multiField": {
	        "messages": {
	          "removeConfirmation": "Deseja realmente remover estes campos?"
	        }
	      }
	    }
	  });

  $('.btnAdd').on( "click", function(e) {
    setTimeout(function(){
      $('.target').iconpicker(); 
    }, 0);
  });


  $(function () {
        $("#chkPassport").click(function () {
            if ($(this).is(":checked")) {
                $("#dvPassport").show();
            } else {
                $("#dvPassport").hide();
            }
        });

            if ($("#chkPassport").is(":checked")) {
                $("#dvPassport").show();
            } else {
                $("#dvPassport").hide();
            }
        });



</script>
