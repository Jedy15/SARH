<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>SRH2018 | Dashboard</title>
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

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

	<!-- Morris chart -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/morris.js/morris.css">
	<!-- jvectormap -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/jvectormap/jquery-jvectormap.css">
</head>
<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">
	<!-- Site wrapper -->
	<div class="wrapper">

		<?php
		$this->load->view('layout/main_header');

		$this->load->view('layout/aside');
		?>
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>
					Dashboard
					<!-- <small>Version 2.0</small> -->
				</h1>
			</section>
			<!-- Main content -->
			<section class="content">
				<!-- Small boxes (Stat box) -->
				<div class="row">
					<div class="col-lg-3 col-xs-12">
						<!-- small box -->
						<div class="small-box bg-aqua">
							<div class="inner">
								<h3><?php echo $TotalOperativo[0]->Total; ?></h3>

								<p>Personal Operativo</p>
							</div>
							<div class="icon">
								<i class="ion ion-ios-people-outline"></i>
							</div>
							<a href="#" class="small-box-footer" id="mostrar1" onclick="mostrar1()">Mas Información <i class="fa fa-arrow-circle-right"></i></a>
						</div>
					</div>
					<!-- ./col -->
					<div class="col-lg-3 col-xs-12">
						<!-- small box -->
						<div class="small-box bg-green">
							<div class="inner">
								<h3><?php echo $TotalNomina[0]->Total; ?></h3>
								<p>Personal en Nomina</p>
							</div>
							<div class="icon">
								<i class="ion ion-ios-people-outline"></i>
							</div>
							<a href="#" class="small-box-footer" id="mostrar2" onclick="mostrar2()">Mas Información <i class="fa fa-arrow-circle-right"></i></a>
						</div>
					</div>
					<!-- ./col -->
					<div class="col-lg-3 col-xs-12">
						<!-- small box -->
						<div class="small-box bg-yellow">
							<div class="inner">
								<h3><span data-toggle="tooltip"  data-original-title="Fuera"><i class="fa fa-arrow-circle-down text-red"></i> <?php echo $TotalFueraComisionado[0]->Total; ?></span> <span data-toggle="tooltip"  data-original-title="Viene"><i class="fa fa-arrow-circle-up text-green"></i> <?php echo $TotalVieneComisionado[0]->Total; ?></span></h3>
								<p>Comisionados</p>
							</div>
							<div class="icon">
								<i class="ion ion-person-add"></i>
							</div>
							<a href="#" class="small-box-footer" id="mostrar3" onclick="mostrar3()">Mas Información <i class="fa fa-arrow-circle-right"></i></a>
						</div>
					</div>
					<!-- ./col -->
					<div class="col-lg-3 col-xs-12">
						<!-- small box -->
						<div class="small-box bg-red">
							<div class="inner">
								<h3><?php echo $IncidenciaSemanal ?></h3>

								<p>Incidencias de la semana</p>
							</div>
							<div class="icon">
								<i class="ion ion-stats-bars"></i>
							</div>
							<a href="<?php echo base_url();?>Reporte/DetalleIncidencias" class="small-box-footer">Mas Información <i class="fa fa-arrow-circle-right"></i></a>
						</div>
					</div>
					<!-- ./col -->
				</div>

				<div class="row">
					<div class="col-md-6">
						<!-- AREA CHART -->

						<!-- DONUT CHART -->
						<div class="box box-primary" id="Grafico1" style='display:none;'>
							<div class="box-header with-border">
								<h3 class="box-title">Personal Operativo Por Turno</h3>

								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
									</button>
									<!-- <button type="button" id="BtnCerrar" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
								</div>
							</div>
							<div class="box-body">
								<canvas id="myChart"></canvas>								
							</div>
							<!-- /.box-body -->
						</div>

						<div class="box box-success" id="Grafico2" style='display:none;'>
							<div class="box-header with-border">
								<h3 class="box-title">Personal de Nomina por Tipo de Trabajador</h3>

								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
									</button>
									<!-- <button type="button" id="BtnCerrar" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
								</div>
							</div>
							<div class="box-body">
								<canvas id="myChart2"></canvas>								
							</div>
							<!-- /.box-body -->
						</div>
					</div>
					<div class="col-md-6">
						<div class="box box-primary" id="Grafico4">
							<div class="box-header with-border">
								<h3 class="box-title">Personal Operativo por Rama</h3>

								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
									</button>
									<!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
								</div>
							</div>
							<div class="box-body">
								<div class="col-md-10">
									<canvas id="myChart4"></canvas>		
								</div>
								<div class="col-md-2">
									<div class="small-box">
										<ul class="chart-legend clearfix" id="Etiqueta">
										</ul>
									</div>
								</div>

							</div>
						</div><!-- fin de  grafico 4 -->


						<div class="box box-warning" id="Grafico3" style='display:none;'>
							<div class="box-header with-border">
								<h3 class="box-title">Personal Por Estatus Laboral</h3>

								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
									</button>
									<!-- <button type="button" id="BtnCerrar" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
								</div>
							</div>
							<div class="box-body">
								<canvas id="myChart3"></canvas>								
							</div>
							<!-- /.box-body -->
						</div>




					</div>
					<!-- /.col (RIGHT) -->

				</div>

			</section>

			<!-- /.content -->
		</div>
		
		<?php $this->load->view('layout/footer_v2'); ?>

	</div>
	<!-- jQuery 3 -->
	<script src="<?php echo base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap 3.3.7 -->
	<script src="<?php echo base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- ChartJS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>


	<!-- FastClick -->
	<script src="<?php echo base_url();?>assets/bower_components/fastclick/lib/fastclick.js"></script>
	<!-- AdminLTE App -->
	<script src="<?php echo base_url();?>assets/dist/js/adminlte.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="<?php echo base_url();?>assets/dist/js/demo.js"></script>

	<script>
		$('#Grafico4').hide();


		function mostrar1(){

			$('#Grafico4').show();
			$('#mostrar1').hide();
			$('#Grafico1').show();
			$.post('<?php echo base_url();?>Reporte/CargarTurnos', {}, 
				function(data, textStatus, xhr) {
					// console.log(data);
					var nombre = [];
					var stock = [];
					var color = ['rgba(255, 99, 132, 0.6)', 'rgba(54, 162, 235, 0.6)', 'rgba(255, 206, 86, 0.6)', 'rgba(75, 192, 192, 0.6)', 'rgba(153, 102, 255, 0.6)', 'rgba(255, 159, 64, 0.6)'];
					var bordercolor =  ['rgba(255,99,132,1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)'];
					var datos = $.parseJSON(data); 

					for(var i in datos) {
						// console.log(datos[i]);
						nombre.push(datos[i].label);
						// console.log(data[i].data);
						stock.push(datos[i].data);
					}

					var chartdata = {
						labels: nombre,
						datasets : [
						{
							label: nombre,
							backgroundColor: color,
							borderColor: color,
							borderWidth: 2,
							hoverBackgroundColor: color,
							hoverBorderColor: bordercolor,
							data: stock
						}
						]
					};

					var mostrar = $("#myChart");
					var grafico = new Chart(mostrar, {
						type: 'doughnut',
						data: chartdata,
						options: {
							// onclick: alert('hola mundo');
							responsive: true
							// scales: {
							// 	yAxes: [{
							// 		ticks: {
							// 			beginAtZero:true
							// 		}
							// 	}]
							// }
						}
					});
					var canvas = document.getElementById("myChart");

					canvas.onclick = function(evt) {
						console.log(canvas);
					// 	var activePoints = myNewChart.getElementsAtEvent(evt);
					// 	if (activePoints[0]) {
					// 		var chartData = activePoints[0]['_chart'].config.data;
					// 		var idx = activePoints[0]['_index'];

					// 		var label = chartData.labels[idx];
					// 		var value = chartData.datasets[0].data[idx];

					// 		var url = "http://example.com/?label=" + label + "&value=" + value;
					// 		console.log(url);
					// 		// alert(url);
					// 	}
				};

				// console.log(data);
				// // var datos = $.parseJSON(data); 
				// // console.log(datos[0]['data']);
				// // alert($.parseJSON(data));
				// // var datos = 
				// var ctx = document.getElementById("myChart").getContext('2d');
				// var myDoughnutChart = new Chart(ctx, {
				// 	type: 'doughnut',
				// 	data: {
				// 		datasets: [data]
				// 		// labels: [
				// 		// 'Red',
				// 		// 'Yellow',
				// 		// 'Blue'
				// 		// ]

				// 	}
				// });


				// alert(datos);
			});

			$.post('<?php echo base_url();?>Reporte/CargarGrafica4', {}, 
				function(data, textStatus, xhr) {
					// console.log(data);
					// var nombre = [];
					// var stock = [];
					var color = ['rgba(255, 99, 132, 0.6)', 'rgba(54, 162, 235, 0.6)', 'rgba(255, 206, 86, 0.6)', 'rgba(75, 192, 192, 0.6)', 'rgba(153, 102, 255, 0.6)', 'rgba(255, 159, 64, 0.6)', 'rgba(255, 182, 193, 0.6)'];
					var bordercolor =  ['rgba(255,99,132,1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)', 'rgba(255, 182, 193, 1)'];
					var datos = $.parseJSON(data); 
					// console.log(datos);
					var Rama = [];
					var EtiquetaR = [];
					var total = [];
					// var dataset = [];



					for(var i in datos) {
						$('#Etiqueta').append('<li><a class="IrGrafica" href="#" id="'+datos[i].IdRama+'"><i class="fa fa-circle-o" style="color: '+bordercolor[i]+'"></i> '+datos[i].NombreRama+'</a></li>')
						Rama.push(datos[i].NombreRama);
						EtiquetaR.push(datos[i].RAMA);
						total.push(datos[i].Total);
					}

					var chartdata = {
						labels: EtiquetaR,
						datasets : [
						{
							// label: ['1','2','3','4','5','6','7'],
							// xAxisID: Rama,
							backgroundColor: color,
							borderColor: color,
							borderWidth: 2,
							hoverBackgroundColor: color,
							hoverBorderColor: bordercolor,
							data: total
						}
						]
					};

					var mostrar = $("#myChart4");
					var grafico = new Chart(mostrar, {
						type: 'bar',
						data: chartdata,
						options: {
							// scales:{
							// 	xAxes: Rama,
							// },
							responsive: true,
							legend:{
								display : false
							}
						}
					});

				}); //fin de Post
		}

		function mostrar2(){
			$('#mostrar2').hide();
			$('#Grafico2').show();
			$.post('<?php echo base_url(); ?>Reporte/CargarTipo', {}, 
				function(data, textStatus, xhr) {
					var nombre = [];
					var stock = [];
					var color = ['rgba(255, 99, 132, 0.6)', 'rgba(54, 162, 235, 0.6)', 'rgba(255, 206, 86, 0.6)', 'rgba(75, 192, 192, 0.6)', 'rgba(153, 102, 255, 0.6)', 'rgba(255, 159, 64, 0.6)'];
					var bordercolor =  ['rgba(255,99,132,1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)'];
					var datos = $.parseJSON(data); 

					for(var i in datos) {
						// console.log(datos[i]);
						nombre.push(datos[i].Tipo);
						// console.log(data[i].data);
						stock.push(datos[i].Total);
					}

					var chartdata = {
						labels: nombre,
						datasets : [
						{
							label: nombre,
							backgroundColor: color,
							borderColor: color,
							borderWidth: 2,
							hoverBackgroundColor: color,
							hoverBorderColor: bordercolor,
							data: stock
						}
						]
					};

					var mostrar = $("#myChart2");

					var grafico = new Chart(mostrar, {
						type: 'doughnut',
						data: chartdata,
						options: {
							responsive: true

						}
					});


				});	//fin post
		}

		function mostrar3(){
			$('#mostrar3').hide();
			$('#Grafico3').show();
			$.post('<?php echo base_url(); ?>Reporte/CargarGrafico3', {}, 
				function(data, textStatus, xhr) {
					var totales = [];
					var nombre = ['Fuera Comisionado', 'Viene Comisionado', 'Operativo/Interino']
					var color = ['rgba(255, 99, 132, 0.6)', 'rgba(54, 162, 235, 0.6)', 'rgba(255, 206, 86, 0.6)', 'rgba(75, 192, 192, 0.6)', 'rgba(153, 102, 255, 0.6)', 'rgba(255, 159, 64, 0.6)'];
					var bordercolor =  ['rgba(255,99,132,1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)'];
					var datos = $.parseJSON(data); 
					for(var i in datos) {
						totales.push(datos[i][0].Total);
					}

					var chartdata = {
						labels: nombre,
						datasets : [
						{
							label: nombre,
							backgroundColor: color,
							borderColor: color,
							borderWidth: 2,
							hoverBackgroundColor: color,
							hoverBorderColor: bordercolor,
							data: totales
						}
						]
					};

					var mostrar = $("#myChart3");

					var grafico = new Chart(mostrar, {
						type: 'doughnut',
						data: chartdata,
						options: {
							responsive: true

						}
					});


					// console.log(totales);
				}); //fin de post
		}

		$('#IrGrafica').click(function(event) {
			alert('hola mundo');
		});

	</script>
</body>
</html>		