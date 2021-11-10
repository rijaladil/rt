<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                               Saldo Kas</div>
                               <?php 
                            foreach($dashboard_saldo as $s){ 
                            ?>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo number_format($s->saldo_kas ,0,',','.') ?></div>
                            <?php } ?>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Pemasukan Lainnya <?php echo date("F Y");?></div>
                                 <?php 
                                foreach($dashboard_saldo as $s){ 
                                ?> 
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo number_format($s->pemasukan ,0,',','.') ?></div>
                                <?php } ?>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pengeluaran <?php echo date("F Y");?>
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <?php 
                                    foreach($dashboard_saldo as $s){ 
                                    ?>-                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo number_format($s->pengeluaran ,0,',','.') ?></div>
                                     <?php } ?>
                                </div>
                               <!--  <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar"
                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">

                               Iuran Masuk untuk <?php echo date("F Y");?></div>
                            <?php 
                            foreach($dashboard_saldo as $s){ 
                            ?>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">KK : <?php echo number_format($s->qty_iuran ,0,',','.') ?> = <?php echo number_format($s->iuran ,0,',','.') ?>  </div>
                             <div class=" mb-1 text-gray-800">Iuran Masuk Selama <?php echo date("F Y");?> 
                             <br> <b>Bln Bayar : <?php echo number_format($s->qty_iuran_per_month ,0,',','.') ?> = <?php echo number_format($s->iuran_per_month ,0,',','.') ?>  </b></div>
                             <?php } ?>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



<!-- /.container-fluid -->
<!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-6 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary"> Data Iuran Masuk <?php echo date("F Y");?></h6>

                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                         <thead>
                                        <tr>
                                        <th width="2%">No</th>
                                            <th width="20%">NAME</th>
                                            <th width="10%">ADDRESS</th>
                                            <th width="30%">PAY DATE</th>
                                            <th width="20%">PAY MONTH YEAR</th>
                                            <th width="10%">NOMINAL</th>
                                            <th width="20%">KET.</th>
                                        </tr>
                                     </thead>
                                        <tbody>
                                                <?php 
                                            $id = 1;
                                            foreach($iuran_now as $i){ 
                                            ?>
                                            <tr>
                                                <td><?php echo $id++ ?></td>
                                                <td><?php echo $i->name ?></td>
                                                <td><?php echo $i->address_domisili ?></td>
                                                <td><?php echo $i->pay_date ?></td>
                                                <td><B><?php echo  date('Y-m', strtotime($i->pay_month_year)) ?></B></td>
                                                <td><?php echo number_format($i->nominal ,0,',','.')?></td>
                                                <td><?php echo $i->keterangan ?></td>
                                            </tr>
                                                <?php } ?>
                                                
                                                
                                            </tbody>
                                        </table>
               
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-6 col-lg-7">
<!-- TOT ALL -->
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Summary Kas Triwulan RT 003 : 
                                    <?php echo   date('F',strtotime('-2 Months')) .'-'. date('F Y');  ?></h6>

                                </div>
                                <!-- Card Body -->
                                <?php  foreach($tot_summary as $dsum){  ?>
                                <div class="card-body">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <tr>
                                            <th>Informasi</th>
                                            <td width="15%" align="right">Nominal</td>
                                        </tr>
                                        <!-- Pemasukan -->
                                         <tr style="color: blue; font-weight:bold">
                                            <td>
                                                Total Pemasukan Tercatat Sebelumnya  <br> 
                                                Pemasukan Triwulan 
                                            </td>
                                            
                                            <td align="right"> 
                                                <?php echo number_format(($dsum->tot_pemasukan) - (($dsum->tot_triwulan_iuran)+($dsum->tot_triwulan_pemasukan_lain))  ,0,',','.')?><br>
                                                <?php echo number_format((($dsum->tot_triwulan_iuran)+($dsum->tot_triwulan_pemasukan_lain)) ,0,',','.')?>

                                            </td>                                            
                                        </tr>
                        
                                         <tr>
                                            <td><li><b>Triwulan Iuran Reguler Warga</b></li>
                                                <table width="100%" border="0">
                                                    <tr>
                                                        <td></td>
                                                        <td>
                                                            <li>Iuran Bulan : <?php echo   date('F Y',strtotime('-2 Months'));  ?></li>
                                                            <li>Iuran Bulan : <?php echo   date('F Y',strtotime('-1 Months'));   ?></li>
                                                            <li>Iuran Bulan : <?php echo   date('F Y');  ?></li><br>
                                                        </td>
                                                        <td align="right" width="30%">
                                                            <?php  foreach($tot_summary_3 as $dsum3){  ?>                                                
                                                            <?php echo number_format($dsum3->summary_iuran_3 ,0,',','.')?><br>
                                                            <?php echo number_format($dsum3->summary_iuran_2 ,0,',','.')?><br>
                                                            <?php echo number_format($dsum3->summary_iuran_1 ,0,',','.')?><br> 
                                                             <?php } ?><br>
                                                        </td>
                                                        
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td align="right"><b>Total</b>    </td>
                                                        <td align="right"  width="30%"><b><?php echo number_format($dsum->tot_triwulan_iuran ,0,',','.')?></b></td>
                                                        
                                                    </tr>
                                                </table>

                                                <li><b>Triwulan THR dari Warga & Pemasukan Lainnya, Etc</b>
                                                
                                                    
                                                        <table width="100%" border="0">
                                                            <?php  $i=1; foreach($tot_summary_pemasukan as $dsp){?>
                                                            <tr>
                                                                <td><?php echo  $i++;?></td>
                                                                <td>
                                                                    <?php 
                                                                        
                                                                        echo ($dsp->date);
                                                                        echo  '&nbsp';
                                                                        echo ($dsp->information); 
                                                                        echo '&nbsp';
                                                                        echo ($dsp->note);   ?> 
                                                                   
                                                                </td>
                                                                <td align="right" width="30%">   
                                                                    <?php echo number_format($dsp->nominal ,0,',','.');?><br>
                                                                </td>
                                                            </tr>

                                                            <?php } ?>  
                                                            <tr>
                                                                <td></td>
                                                                <td align="right"><b>Total</b></td>
                                                                <td align="right" ><b><?php echo number_format($dsum->tot_triwulan_pemasukan_lain ,0,',','.')?></b></td>
                                                            </tr>
                                                            
                                                        </table>
                                            </td>
                                            <td align="right">
                                                
                                            </td>
                                        </tr>


                                        <!-- Pengeluaran -->
                                         <tr style="color: red; font-weight:bold">
                                            <td>
                                                Total Pengeluaran Tercatat Sebelumnya <br>
                                                Pengeluaran Triwulan
                                                
                                            </td>
                                            <td align="right">
                                                <?php echo number_format(($dsum->tot_pengeluaran)-(($dsum->tot_triwulan_pengeluaran)) ,0,',','.')?><br>
                                                <?php echo number_format(($dsum->tot_triwulan_pengeluaran)  ,0,',','.')?>
                                                    
                                                </td>                                            
                                        </tr>
                                       <tr>
                                            <td><li><b>Triwulan Setoran Reguler Warga ke RW</b>
                                            
                                                        <table width="100%" border="0">
                                                            <?php  $i=1; foreach($tot_summary_pengeluaran1 as $dspe){  ?>
                                                            <tr>
                                                                <td><?php echo  $i++;?></td>
                                                                <td>
                                                                    <?php 
                                                                        
                                                                        echo ($dspe->date);
                                                                        echo  '&nbsp';
                                                                        echo ($dspe->information); 
                                                                        echo '&nbsp';
                                                                        echo ($dspe->note);   ?> 
                                                                   
                                                                </td>
                                                                <td align="right" width="30%">   
                                                                    <?php echo number_format($dspe->nominal ,0,',','.');?><br>
                                                                </td>
                                                            </tr>

                                                            <?php } ?>  
                                                            <tr>
                                                                <td></td>
                                                                <td align="right"><b>Total</b></td>
                                                                <td align="right" ><b><?php echo number_format($dsum->tot_triwulan_setor_rw ,0,',','.')?></b></td>
                                                            </tr>
                                                        </table>
                                                <li><b>Triwulan Setoran THR ke RW & Kegiatan Warga, Etc</b>
                                                    
                                                        <table width="100%" border="0">
                                                            <?php  $i=1; foreach($tot_summary_pengeluaran2 as $dspe2){  ?>
                                                            <tr>
                                                                <td><?php echo  $i++;?></td>
                                                                <td>
                                                                    <?php 
                                                                        
                                                                        echo ($dspe2->date);
                                                                        echo  '&nbsp';
                                                                        echo ($dspe2->information); 
                                                                        echo '&nbsp';
                                                                        echo ($dspe2->note);   ?> 
                                                                   
                                                                </td>
                                                                <td align="right" width="30%">   
                                                                    <?php echo number_format($dspe2->nominal ,0,',','.');?><br>
                                                                </td>
                                                            </tr>

                                                            <?php } ?>  
                                                            <tr>
                                                                <td></td>
                                                                <td align="right"><b>Total</b></td>
                                                                <td align="right" ><b><?php echo number_format(($dsum->tot_triwulan_pengeluaran)-($dsum->tot_triwulan_setor_rw) ,0,',','.')?></b></td>
                                                            </tr>
                                                        </table>

                                            </td>
                                            <td align="right">
                                            </td>
                                        </tr>                                       
                                        <tr style="color: green; font-weight:bold">
                                            <td><h5>Total Saldo</td>
                                            <td align="right"><h5><?php echo number_format($dsum->tot_saldo_kas ,0,',','.')?></td>
                                            
                                        </tr>
                                         <tr>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </table>
                                </div>
                                 <?php } ?>
                            </div>

 <!-- TRIWULAN -->
                             

                        </div>


                    </div>

                    <!-- Content Row -->
                </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
