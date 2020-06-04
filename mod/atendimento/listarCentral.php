  <script src='https://cdnjs.cloudflare.com/ajax/libs/echarts/4.2.1/echarts.min.js'></script><script  src="./script.js"></script>
  
<div class="card">
				<div class="card-header white">
					<strong>Categorias</strong>
				</div>

				<?php $Query = DBRead('c_atendimento','*'); if (is_array($Query)) {  ?>

					<div class="card-body p-0">
						<div>
							<div>
								<table id="DataTable" class="table m-0 table-striped">
									<tr>
										<th>ID</th>
										<th>Nome</th>
										<th>Item</th>
										<th>Implementação</th>
										<th width="53px">Ações</th>
									</tr>

									<?php
										foreach ($Query as $dados) {
											$CodSite  = '<div id="Atendimento'.$dados['id'].'" data-painel="'.RemoveHttpS(ConfigPainel('base_url')).'"></div>'."\n";
											$CodSite .= '<script type="text/javascript">Atendimento('.$dados['id'].',1);</script>';
											$id = $dados['id'];
											$itens = DBRead('atendimento','*',"WHERE id = '{$id}'")[0];
									?>
									<tr>
										<td><?php  echo $id; ?></td>
										<td><?php echo LimitarTexto($dados['nome'],'80','...'); ?></td>
										<td>
											<?php if (checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'atendimento', 'adicionar')) { ?>
											<a  class="tooltips" data-tooltip="Adicionar" href="?AdicionarItens=<?php echo $dados['id']; ?>">
												<i class="icon-plus blue lighten-2 avatar"></i> 
											</a> 
											<?php } ?>

											<?php if (checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'relatorio', 'acessar')) { ?>
											<a  class="tooltips" data-tooltip="Gráfico"  href="#" onclick="showDetails(this)" data-toggle="modal" data-target="#myModal" data-face="<?php echo $itens['g_f']; ?>" data-whats="<?php echo $itens['g_w']; ?>"data-line="<?php echo $itens['g_l']; ?>"data-telegram="<?php echo $itens['g_t']; ?>"data-vkontakte="<?php echo $itens['g_v']; ?>"data-sms="<?php echo $itens['g_s']; ?>"data-call="<?php echo $itens['g_c']; ?>" data-email="<?php echo $itens['g_e']; ?>">
												<i class="icon icon-bar-chart blue lighten-2 avatar" aria-hidden="true"></i>
											</a>
											<?php } ?>
										</td>

										
											<td>
												<?php if (checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'codigo')) { ?>
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
														<?php if (checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'central', 'editar')) { ?>
														<a class="dropdown-item" href="?EditarCentral=<?php echo $dados['id']; ?>"><i class="text-primary icon icon-pencil"></i> Editar</a>
													<?php } ?>
														<?php if ($dados['id'] != 0) { ?>
															<?php if (checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'central', 'deletar')) { ?>
															<a class="dropdown-item" href="#" onclick="DeletarItem(<?php echo $dados['id']; ?>, 'DeletarCentral');"><i class="text-danger icon icon-remove"></i> Excluir</a>
														<?php } ?>
														<?php } ?>
													</div>
												</div>
											</td>
									</tr>
									<?php } ?>
								</table>
							</div>
						</div>
					</div>
				<?php } else { ?>
					<div class="card-body">
						<div class="alert alert-info">Nenhuma central adicionada até o momento
					</div>
				<?php } ?>






<div class="modal fade"  id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div  class="modal-dialog" role="document">
    <div style="width:730px" class="modal-content">
    	<p style=" width: 100%; font-weight: bolder; font-size: 30px; position: fixed; margin-top: 10px; margin-left: 150px" >Meios de contato mais populares</p>
    	<div id="main"  style="width:730px; height:400px;"></div>
    </div>
  </div>
</div>


<script>
function showDetails(z) {
  var a = z.getAttribute("data-face");
  var b = z.getAttribute("data-whats");
  var c = z.getAttribute("data-line");
  var d = z.getAttribute("data-telegram");
  var e = z.getAttribute("data-vkontakte");
  var f = z.getAttribute("data-sms");
  var g = z.getAttribute("data-call");
  var h = z.getAttribute("data-email");


var myChart = echarts.init(document.getElementById('main'));
 
        // specify chart configuration item and data
        var option = {

            tooltip: { },
            xAxis: {
                data: ["Facebook","Whatsapp","line","Telegram","Vkontakte","Sms","Call","Email"],

            },
            yAxis: {},
            series: [{
                name: 'Chat',
                type: 'bar',
                data: [a, b, c, d, e, f, g, h],
                color: '#ffc500'
            }]


        };

        // use configuration item and data specified to show chart
        myChart.setOption(option);
    };
</script>


