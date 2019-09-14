		<aside class="main-sidebar">
			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar">
				<!-- Sidebar user panel -->
				<div class="user-panel">
					<div class="pull-left image">
						<img src="<?php echo base_url(); ?>assets/dist/img/avatar.png" class="img-circle" alt="User Image">
					</div>
					<div class="pull-left info">
						<p><?php echo $this->session->userdata("nombre")?></p>
					</div>
				</div>
				<!-- sidebar menu: : style can be found in sidebar.less -->
				<ul class="sidebar-menu" data-widget="tree">
					<li class="header">MENU NAVEGACION</li>
					<li class="treeview <?php if($this->uri->segment(1)=='Plantilla'){echo 'active';} ?>">
						<a href="#">
							<i class="fa fa-group"></i> <span>Plantilla</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="#"><i class="fa fa-circle-o"></i>Personal</a></li>
							<!-- <li><a href="<?php //echo base_url();?>Plantilla/Nomina"><i class="fa fa-circle-o"></i>Nomina</a></li> -->
							<!-- <li><a href="<?php //echo base_url();?>Plantilla/General"><i class="fa fa-circle-o"></i>General</a></li> -->
						</ul>
					</li>

				</ul>
			</section>
			<!-- /.sidebar -->
		</aside>