       <?php  $this->load->view('layouts/header');
            $this->load->view('layouts/aside');?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
                <section class="content-header">
                <h1>
                <?php echo $header1; ?>
                <small><?php echo $header2; ?></small>
                </h1>
                </section>
            <!-- Content Header (Page header) -->
            <!--PARTE SUPERIOR DE EL CONTENIDO EMPIEZA AQUI-->

            <!-- Main content -->
            <section class="content">
                <!-- Default box -->
                <div class="box box-solid">
                    <div class="box-body">
                      <h3 class="text-center"><u><?php echo $titulo; ?></u></h3>
                    </div>

            <?php $this->load->view($contenido); ?>

            <!-- PARTE INFERIOR DE EL CONTENIDO-->
            <!-- /.box-body -->
            </div>
            <!-- /.box -->
            </section>


            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php  $this->load->view('layouts/footer');?>
