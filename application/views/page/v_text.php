<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tabloid Jubi | Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- masukin style ke view -->
    <?php $this->load->view('style/css.php'); ?>
</head>

<body class="skin-black">
    <!-- header logo: style can be found in header.less -->

    <?php $this->load->view('v_header.php'); ?>

    <div class="wrapper row-offcanvas row-offcanvas-left">
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="left-side sidebar-offcanvas">                
            <!-- sidebar: style can be found in sidebar.less -->
            <?php 
            $data['menuSelected'] = 'menu_text';
            $this->load->view('v_left_menu.php', $data); 
            ?>
        </aside>

        <!-- Right side column. Contains the navbar and content of the page -->
        <aside class="right-side">                
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    <i class="fa fa-dashboard" style="margin-right: 10px"></i>Dashboard
                    <small>Halaman awal</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>beranda"><i class="fa fa-dashboard"></i>Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
                <div class="row">
                <div class="col-md-12">
                    <?php $this->load->view('tabel/v_page_text');?>
                </div>
            </div>
            </section>

            
        </aside><!-- /.right-side -->
</div><!-- ./wrapper -->   

<?php $this->load->view('v_footer');?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
<!-- DATA TABES SCRIPT -->
<script src="<?php echo base_url(); ?>assets/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/js/AdminLTE/app.js" type="text/javascript"></script>

<script type="text/javascript">
    $(function() {
        $("#tabel").DataTable();
    });
</script>

</body>
</html>
