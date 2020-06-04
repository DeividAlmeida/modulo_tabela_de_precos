<?php
if(!checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'central', 'adicionar')){ Redireciona('./index.php'); }
?>

<form style="height: 300px;" id="cadastrar" class="cadastrar" method="post" action="?AddCentral" enctype="multipart/form-data">
				<div class="card">
					<div class="card-header  white">
						<strong>Adicionar AddCentral</strong>
					</div>

					<div class="card-body">
						<div class="row">
							<div class="col-md-6">

								<!-- NOME -->
								<div class="form-group">
									<label>Nome da Central:</label>
									<input class="form-control" name="nome" required>
								</div>

								<!-- LOGO -->
							<div class="form-group">
									<label>Logotipo:</label>
								<center>
									<div>
										<input onchange="readURL(this);"  style="width: 0.1px; height: 0.1px; opacity: 0; overflow: hidden; z-index: -1;" type="file" multiple accept='image/*' name="imagem_arquivo" id="imagem_arquivo1">
   										<label multiple accept='image/*' class="btn btn-primary" for="imagem_arquivo1">
									        <svg style="height: 16px; margin-right: 4px;" aria-hidden="true" focusable="false" 
									        		data-prefix="fas" data-icon="upload"class="svg-inline--fa fa-upload fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
										          <path fill="currentColor"
										            d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z">
										          </path>
									        </svg>
        									<span>Upload logo</span>
       									</lable>

									</div>
									     	<img id="blah"  src="wa/atendimento/img/erro.png"  />
									     	<span id="orie" alt="Seu logo de ter as seguintes dimensões 180 x 180">Seu logo de ter as seguintes dimensões 180 x 180
									     	</span>
								<center>
							</div> 					

								<!-- LIMITE -->
								<div class="form-group">
									<label>Mensagem de Saudação::</label>
									<input class="form-control" name="saudação" type="text">
								</div>
					</div>

							<div class="col-md-6">
								<!-- COR DO ÍCONE -->
								<div class="form-group">
									<label>Cor do Ícone:</label>
								<div class="color-picker input-group colorpicker-element focused">
									<input type="text" value="#000" name="cor" class="form-control">
									<span class="input-group-append">
										<span class="input-group-text add-on white">
											<i class="circle" style="background-color: rgb(0, 170, 187);"></i>
										</span>
									</span>
								</div>
						    	</div>

							
								<!-- POSIÇÃO -->
								<div class="form-group">
									<label>Posição:</label>
									<select name="posição" required class="form-control custom-select">
										<option value="left">Esquerda</option>
										<option value="right">Direita</option>
									</select>
								</div>
							
                                <!-- MENSAGEM DE APELAÇÃO -->
								<div class="form-group">
									<label>Gatilho:</label>
									<input class="form-control" name="gatilho" type="text">
								</div>
							</div>
						</div>
					</div>


					<div class="card-footer white">
						<button class="btn btn-primary float-right" type="submit">Cadastrar</button>
					</div>
				</div>
  		</form>