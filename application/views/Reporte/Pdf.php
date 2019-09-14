<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>SARH | Horario</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- <body onload="window.print();"> -->
	<body>
		<div class="wrapper">
			<!-- Main content -->
			<section class="invoice">
				<!-- title row -->
				<div class="row">
					<div class="col-xs-4">
						<img src="<?php echo base_url();?>images/logoSS.PNG" height="60" width="100">
					</div>
					<div class="col-xs-4">
						<div class="text-center">
							<strong>SECRETARIA DE SALUD</strong><br>
							<strong>INSTITUTO DE SALUD</strong><br>
							<strong>HOSPITAL DE LA MUJER</strong>
						</div>
					</div>
					<div class="col-xs-4">
						<div class="pull-right">
							<img src="<?php echo base_url();?>images/logo_salud_chiapas.PNG" height="60">
						</div>
					</div>
					<!-- /.col -->
				</div>
				<!-- info row -->
				<div class="row invoice-info">
					<div class="col-sm-4 invoice-col">

					</div>
					<!-- /.col -->
					<div class="col-sm-4 invoice-col">

					</div>
					<!-- /.col -->
					<div class="col-sm-4 invoice-col">
						<div class="pull-right">
							San Cristóbal de las Casas, Chiapas <br>
							<?php $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
							$hoy = date('d')." de ".$meses[date('n')-1]. " de ".date('Y');
							echo $hoy; ?>
						</div>	
					</div>
					<!-- /.col -->
				</div>
				<!-- /.row -->

				<!-- row -->
				<div class="row">
					<div class="col-xs-12">
						<br>
						<b>NOMBRE</b><br>
						<b>FUNCION TURNO</b><br>	
						<b>PRESENTE</b>
					</div>
					<!-- /.col -->
				</div>
				<!-- /.row -->

				<!-- row -->
				<div class="row">
					<div class="col-xs-12">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum qui ut ex et repellat exercitationem deserunt asperiores architecto impedit voluptatem, expedita iusto, voluptates minima at assumenda tempora officia incidunt corrupti! <br>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet aliquam eaque officiis quos libero sed repellat quisquam iure quidem provident, incidunt voluptatibus, dicta nesciunt maxime! Blanditiis atque adipisci maxime. Deserunt!</p>
					</div>
					<!-- /.col -->
				</div>
				<!-- /.row -->

				<div class="row">
					<!-- accepted payments column -->
					<div class="col-xs-6">
						<p class="lead">Payment Methods:</p>

						<p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
							Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr
							jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
						</p>
					</div>
					<!-- /.col -->
					<div class="col-xs-6">
						<p class="lead">Amount Due 2/22/2014</p>

						<div class="table-responsive">
							<table class="table">
								<tr>
									<th style="width:50%">Subtotal:</th>
									<td>$250.30</td>
								</tr>
								<tr>
									<th>Tax (9.3%)</th>
									<td>$10.34</td>
								</tr>
								<tr>
									<th>Shipping:</th>
									<td>$5.80</td>
								</tr>
								<tr>
									<th>Total:</th>
									<td>$265.24</td>
								</tr>
							</table>
						</div>
					</div>
					<!-- /.col -->
				</div>
				<!-- /.row -->


				<div class="row">
					<div class="col-xs-12">
						<b>Av. Insurgentes No.24, Barrio de Santa Lucia</b><br>
						Conmutador: (967) 67 80770, Fax 67 83834 <br>
						Pagweb: <a href="http://www.hmsclc.com">www.hmsclc.com</a>
					</div>
					<!-- /.col -->
				</div>

			</section>
			<!-- /.content -->
		</div>
		<!-- ./wrapper -->



	</body>
	</html>
