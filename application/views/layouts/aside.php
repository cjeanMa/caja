        <!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">      
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MENU PRINCIPAL</li>
                    <li>
                        <a href="<?php echo base_url(); ?>">
                            <i class="fa fa-home"></i> <span>Inicio</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('boleta'); ?>">
                            <i class="fa fa-file"></i> <span>Nueva Boleta</span>
                     

                        </a>
                    </li>
                    <!--<li class="treeview">
                        <a href="#">
                            <i class="fa fa-share-alt"></i> <span>Movimientos</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="../../index.html"><i class="fa fa-circle-o"></i> Generar Boleta</a></li>
                            <li><a href="../../index.html"><i class="fa fa-circle-o"></i> Generar Factura</a></li>
                        </ul>
                    </li>-->
                    <li>
                        <a href="<?php echo base_url('boleta/reportes') ?>">
                            <i class="fa fa-print"></i> <span>Reportes</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                    </li>
                    
                    <?php if ($this->session->userdata('permiso')==1) {
                        ?>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-sitemap"></i> <span>Administracion</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url('procedimientos') ?>"><i class="fa fa-share-alt"></i> Procedimientos</a></li>
                            <li><a href="<?php echo base_url('usuario') ?>"><i class="fa fa-users"></i> Usuarios</a></li>
                        </ul>
                    </li>
                    <?php
                    } ?>


                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- =============================================== -->