<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="<?php echo base_url(); ?>assets/img/avatar/1.png?>" class="img-circle" alt="User Image" />
        </div>
        <div class="pull-left info">
            <p style="font-size: 14px"><?php echo $this->session->userdata('fullname'); ?> </p>
            <p style="font-size: 10px"><i class="fa fa-circle text-green"></i>&nbsp;&nbsp;Online</p>
        </div>
    </div>
    <!-- search form -->
    <!-- <form action="" method="get" class="sidebar-form">
        <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search..."/>
            <span class="input-group-btn">
                <button type='submit' name='seach' id='search-btn' class="btn btn-flat" disabled><i class="fa fa-search"></i></button>
            </span>
        </div>
    </form> -->
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <hr style="margin:0px">
    <ul class="sidebar-menu">
        <li class="<?php if ($menuSelected == 'menu_home') {echo "active";} ?>">
            <a href="<?php echo base_url(); ?>cms/beranda">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>
        <li class="treeview <?php if ($menuSelected == 'menu_admin' || $menuSelected == 'menu_log') {echo "active";} ?>">
            <a href="#">
                <i class="fa fa-trello"></i>
                <span>Manajemen Admin</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li class="<?php if ($menuSelected == 'menu_text') {echo "active";} ?>"><a href="<?php echo base_url(); ?>cms/text"><i class="fa fa-sitemap"></i>Manajemen Text</a></li>
                <li class="<?php if ($menuSelected == 'menu_iklan') {echo "active";} ?>"><a href="<?php echo base_url(); ?>cms/iklan"><i class="fa fa-sitemap"></i>Manajemen iklan</a></li>
                
            </ul>
        </li>
        
    </ul>
</section>
<!-- /.sidebar -->