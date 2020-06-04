<link type="text/css" href="wa/atendimento/css/widget.css" rel="stylesheet">
<?php


	require_once('includes/funcoes.php');
	require_once('includes/header.php');
?>
<?php
	require_once('includes/menu.php');
	require_once('controller/atendimento.php');
	$TitlePage = 'Atendimento';
	$UrlPage	 = 'atendimento.php';
?>

<div class="has-sidebar-left">
	<header class="blue accent-3 relative nav-sticky">
		<div class="container-fluid text-white">
			<div class="row p-t-b-10 ">
				<div class="col">
					<h4><i class="icon-comment"></i> <?php echo $TitlePage; ?></h4>
				</div>
			</div>
		</div>
	</header>

	<div class="container-fluid animatedParent animateOnce my-3">
		<p>
			
			<?php if (checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'central')) { ?>
  			<a class="btn btn-sm btn-primary" href="<?php echo $UrlPage; ?>">Central cadastrada</a>
  			<?php } ?>

  			<?php if (checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'central', 'adicionar')) { ?>
  			<a class="btn btn-sm btn-primary" href="?AdicionarCental">Cadastrar central</a>
  			<?php } ?>

		</p>

			<!-- LISTAR ITENS -->
			<?php
				if(isset($_GET['VisualizarCentral'])){
					require_once('mod/atendimento/listarItens,php');
					
				}elseif(isset($_GET['AdicionarItens'])){
					require_once('mod/atendimento/addItens.php');

				}elseif(isset($_GET['AdicionarCental'])){
					require_once('mod/atendimento/addCentral.php');

				} elseif(isset($_GET['EditarCentral'])){
					require_once('mod/atendimento/editarCentral.php');

				}else {
					require_once('mod/atendimento/listarCentral.php');

				}
			?>
		</div>
	</div>

	

<?php require_once('includes/footer.php'); ?>


<script type="text/javascript">
	$(function () {
		$('[data-toggle="tooltip"]').tooltip()
	})
							
	function readURL(input) {
            if (input.files && input.files[0]) {
                document.getElementById("orie").style.display = "none";
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
            
        }
</script>



       