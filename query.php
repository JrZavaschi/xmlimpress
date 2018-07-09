<?php
if($_FILES['arquivo']['size'] <= 0){
	header('Location: index.php');
}
	$xml=simplexml_load_file($_FILES['arquivo']['tmp_name']);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>XML Impress - Romaneio de entrada New Solution</title>

<!-- Bootstrap -->
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<style type="text/css" media="print">
@page {
    size: auto;   /* auto is the initial value */
 
  margin-top: 5mm;
  margin-bottom: 15mm;
  margin-left: 2mm;
  margin-right: 2mm;

  @bottom-left {
        content: counter(page);
     }
}
</style>
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header" id="header">
     <br>Arquivo importado: <?php echo $_FILES['arquivo']['name']; ?>
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar1"><span class="sr-only">XML to impress</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <!-- /.navbar-collapse --> 
    </div>
  <!-- /.container-fluid --> 
</nav>
<div class="container-fluid">
  <div class="row" id="form">
   <form action="query.php" name="conversor" method="post" enctype="multipart/form-data">
    <div class="col-sm-6 ">
      <label for="">Selecione seu arquivo XML</label>
      <input type="file" name="arquivo" id="arquivo" class="form-control" required>
    </div>
    <div class="col-md-12 ">
     <p></p>
      <button type="submit" class="btn btn-success">Iniciar nova conversão</button>
    </div>
  </form>
  </div>
  
  <div class="row" id="imprimir">
  	<div class="col-sm-12">
		<hr>
	</div>
  	<div class="col-sm-12">
  		<button type="button" style="float: right" class="btn btn-lg btn-info" id="botaoImprimir"> <i class="fa fa-print"></i> </button>
  	</div>
  	<div class="col-sm-12">
		<hr>
	</div>
  </div>
  <div id="impressao">
  <div class="col-sm-12">
  	<div class="row">
		<div class="col-sm-8">
			<img src="img/logo.jpg" class="img-responsive" width="250px" height="auto" alt="">
		</div><br><br><br>
		<div class="col-sm-4 thumbnail">
			<h4>Processo:</h4>
		</div>
  	</div>
	<div class="row">
		<div class="col-sm-4 thumbnail">
			<h4>Data:</h4>
		</div>
		<div class="col-sm-2 thumbnail">
			<h4>Hora início:</h4>
		</div>
		<div class="col-sm-2 thumbnail">
			<h4>Hora final:</h4>
		</div>
		<div class="col-sm-4 thumbnail">
			<h4>Container:</h4>
		</div>
	</div>
  	<div class="row">
		<div class="col-sm-8 thumbnail">
			<h4>Cliente:</h4>
		</div>
		<div class="col-sm-4 thumbnail">
			<h4>Lacre:</h4>
		</div>
	</div>
  	<div class="row">
		<div class="col-sm-8 thumbnail">
			<h4>Transportador:</h4>
		</div>
		<div class="col-sm-4 thumbnail">
			<h4>Placa cavalo:</h4>
		</div>
	</div>
  	<div class="row">
		<div class="col-sm-4 thumbnail">
			<h4>DI:</h4>
		</div>
		<div class="col-sm-4 thumbnail">
			<h4>NF-e: <strong><?php echo $xml->NFe->infNFe->ide->nNF; ?></strong></h4>
		</div>
		<div class="col-sm-4 thumbnail">
			<h4>Placa carreta:</h4>
		</div> 
	</div>
  	<div class="row">
		<div class="col-sm-6 thumbnail">
			<h4>Motorista:</h4>
		</div>	
		<div class="col-sm-6 thumbnail">
			<h4>CPF:</h4>
		</div>
		<div class="col-sm-12">
			<hr>
		</div>
	</div>
 	</div>
  	<div class="row">
  	<div class="col-sm-12">
		<table class="table table-responsive table-striped table-bordered">
			<thead style="margin-top: 1em;">
				<th>Cód. referência</th>
				<th>Descrição</th>
				<th>Qtde total peças</th>
				<th>Qtde total caixas</th>
				<th>Pack</th>
				<th>Padrão plt</th>
				<th>Qtde total plts</th>
			</thead>
			<tbody>
			<?php
				foreach($xml->NFe->infNFe->det as $registro){
					$codigoReferencia = $registro->prod->cProd;
					$nomeProduto = $registro->prod->xProd;

					//echo $codigoReferencia.' - '.$nomeProduto.'<br>';	
			?>
				<tr>
					<td><?php echo $codigoReferencia; ?></td>
					<td><?php echo $nomeProduto; ?></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
			<?php
				}
			?>
			</tbody>
		</table>
  	</div>
  	<div class="col-sm-12 footer">
  		<table class="table table-responsive table-striped table-bordered">
			<thead>
				<th width="60%">Observações</th>
				<th>Avarias</th>
			</thead>
			<tbody>
				<tr>
					<td></td>
					<td>Fotos: </td>
				</tr>
				<tr>
					<td></td>
					<td>[   ] Caixa rasgada </td>
				</tr>
				<tr>
					<td></td>
					<td>[   ] Mercadoria Molhada </td>
				</tr>
				<tr>
					<td></td>
					<td>[   ] Aberto </td>
				</tr>
				<tr>
					<td></td>
					<td>[   ] Falta de mercadoria </td>
				</tr>
				<tr>
					<td></td>
					<td>[   ] Indício de violação </td>
				</tr>
				<tr>
					<td></td>
					<td>[   ] Carga Recebida com Alteração de Informação </td>
				</tr>
				<tr>
					<td></td>
					<td>[   ] Outros / Observações </td>
				</tr>
				<tr>
					<td></td>
					<td></td>
				</tr>
			</tbody>
		</table>
		
		<table class="table table-responsive table-striped table-bordered">
			<tbody>
				<tr>
				<td>Ass. Motorista: _________________________________________________________</td>
				<td>Ass. Conferente: _________________________________________________________</td>
				</tr>
			</tbody>
		</table>
  	</div>
  </div>
  </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js/jquery.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.js"></script>
<script>
	$(document).ready(function(){
		$('#botaoImprimir').click(function(){
			//$('#impressao').printThis();
			
			 $("#impressao").show();
			 $("#header").hide();
			 $("#form").hide();
			 $("#imprimir").hide();
				window.print();
			 $("#header").show();
			 $("#form").show();
			 $("#imprimir").show();
			
		});
	});
</script>
</body>
</html>