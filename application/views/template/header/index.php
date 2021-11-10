<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Amarapura</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- <link href="cassets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <!-- <link href="<?php echo base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet"> -->
  <link href="<?php echo base_url(); ?>assets/css/sb-admin-2.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url()?>">
        <div class="sidebar-brand-icon"><i class="fas fa-home fa-5x" ></i></div>
        <div class="sidebar-brand-text" style="margin-top:1em"><small>AMARAPURA</small></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <?php if ( (in_array($this->session->userdata('level'), array(1,2,3))) ) { ?>
        <a class="nav-link" href="<?php echo base_url();?>index.php/dashboard/">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
          <?php } ?>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        APP
      </div>

      <!-- Nav Item - Pages Collapse Menu -->

      <!-- MARKETING -->
     <?php if ( (in_array($this->session->userdata('level'), array(1,2))) ) { ?>  
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cubes"></i>
          <span>Administrasi</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
          <?php if ( (in_array($this->session->userdata('level'), array(1,2))) ) { ?>
          <a class="collapse-item" href="<?php echo base_url();?>index.php/warga/">Data Warga</a>
          <?php } ?>
          <?php if ( (in_array($this->session->userdata('level'), array(1,2))) ) { ?>
          <a class="collapse-item" href="<?php echo base_url();?>index.php/Iuran/">Iuran Warga</a>
          <?php } ?>
          <?php if ( (in_array($this->session->userdata('level'), array(1))) ) { ?>
          <a class="collapse-item" href="<?php echo base_url();?>index.php/Pemasukan/">Pemasukan</a>
          <?php } ?>
          <?php if ( (in_array($this->session->userdata('level'), array(1))) ) { ?>
          <a class="collapse-item" href="<?php echo base_url();?>index.php/Pengeluaran/">Pengeluaran</a>
          <?php } ?>
          </div>
          


        </div>
      </li>
     <?php } ?>
     

      <!-- Nav Item - Utilities Collapse Menu -->
<?php if ( (in_array($this->session->userdata('level'), array(1))) ) { ?>  
      <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- LOG PEKERJAAN -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cogs"></i>
          <span>Setting</span>
        </a>
        <div id="collapseSix" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <!-- <h6 class="collapse-header">Custom:</h6> -->
            <a class="collapse-item" href="<?php echo base_url();?>index.php/user/">User</a>
          </div>
        </div>
      </li>
<?php } ?>

<?php if ( (in_array($this->session->userdata('level'), array(1,2,3))) ) { ?>  
      <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- LAMAN CUSTOMER -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSiy" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-user"></i>
          <span>Last Pay</span>
        </a>
        <div id="collapseSiy" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <!-- <h6 class="collapse-header">Warga:</h6> -->
             <a class="collapse-item" href="<?php echo base_url();?>index.php/lastpay/">Iuran Warga</a>
          </div>
        </div>
      </li>
<?php } ?>
    
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->



    