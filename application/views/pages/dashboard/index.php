

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
            <div class="card border-left-primary shadow h-85 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                               Saldo Kas & Bank</div>
                               <?php 
                            foreach($dashboard_saldo as $s){ 
                            ?>
                            <div class="h6 mb-0 font-weight-bold text-gray-800"><?php echo number_format($s->saldo_kas ,0,',','.') ?> |
                            Bank :  <?php echo number_format($s->saldo_bank ,0,',','.') ?> - 
                            Kas : <?php echo number_format(($s->saldo_kas - $s->saldo_bank)  ,0,',','.') ?> </div>
                           

                            <?php } ?>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!--  -->
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-85 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Pemasukan Lainnya <?php echo date("F Y");?></div>
                                 <?php 
                                foreach($dashboard_saldo as $s){ 
                                ?> 
                            <div class="h6 mb-0 font-weight-bold text-gray-800"><?php echo number_format($s->pemasukan ,0,',','.') ?></div>
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
            <div class="card border-left-info shadow h-85 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pengeluaran <?php echo date("F Y");?>
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <?php 
                                    foreach($dashboard_saldo as $s){ 
                                    ?>
                                    <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo number_format($s->pengeluaran ,0,',','.') ?></div>
                                     <?php } ?>
                                </div>
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
            <div class="card border-left-warning shadow h-85 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">

                               Iuran Masuk untuk <?php echo date("F Y");?></div>
                            <?php 
                            foreach($dashboard_saldo as $s){ 
                            ?>
                            <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800">PD (<?php echo number_format($s->qty_iuran ,0,',','.') ?>) : <?php echo number_format($s->iuran ,0,',','.') ?> | PMY (<?php echo number_format($s->qty_iuran_per_month ,0,',','.') ?>) : <?php echo number_format($s->iuran_per_month ,0,',','.') ?></div>
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

    
    <div class="row">
         <div class="col-xl-6 col-lg-7">
                <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">This year</h6>
                </div>
                <div class="card-body">
                    <div class="chart-bar">
                        <canvas id="myBarChart1"></canvas>
                    </div>
                    <hr>
                    
                    <?php  foreach($iuran_bln as $ib){  
                        $rn=65000;
                        $rp=75000;
                        $month = date('n');

                        $ibbln = array($ib->bln1,$ib->bln2,$ib->bln3,$ib->bln4,$ib->bln5,$ib->bln6,$ib->bln7,$ib->bln8,$ib->bln9,$ib->bln10,$ib->bln11,$ib->bln12);
                        $ibbln_month = array_sum($ibbln) / $month;
                        $ibbln_month_rp = $ibbln_month / $rp;


                        $ibbln_my= array();
                        $ibbln_my = array($ib->bln_my1,$ib->bln_my2,$ib->bln_my3,$ib->bln_my4,$ib->bln_my5,$ib->bln_my6,$ib->bln_my7,$ib->bln_my8,$ib->bln_my9,$ib->bln_my10,$ib->bln_my11,$ib->bln_my12);

                        $jum = 0;
                        for ($i=0; $i<=$month; $i++){
                            $jum = $jum + $ibbln_my[$i];
                        }
                        $jum;

                        $ibbln_my_month = $jum / $month;
                        $ibbln_my_month_rp = $ibbln_my_month / $rp;

                        echo "Average Pay Date : <b>  ";
                        echo number_format($ibbln_month);
                        echo " </b> | Person : <b>".number_format($ibbln_month_rp)."</b> | Ability : <b> ". number_format( $ibbln_month_rp * $rn );
                        echo "</b><br>Average Pay Month Year : <b> ";
                        echo number_format($ibbln_my_month);
                        echo "</b> | Person : <b>".number_format($ibbln_my_month_rp)."</b> | Ability : <b> ". number_format( $ibbln_my_month_rp * $rn );
                        echo "</b>";

                    }?> 
                     
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-7">
                <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Last year</h6>
                </div>
                <div class="card-body">
                    <div class="chart-bar">
                        <canvas id="myBarChart2"></canvas>
                    </div>
                    <hr>
                    
                    <?php  foreach($iuran_bln_last as $ibl){  

                        $rn=65000;
                        $rp=75000;
                        $month = 12;

                        $ibblln = $ibl->blnl1 + $ibl->blnl2 + $ibl->blnl3 + $ibl->blnl4 + $ibl->blnl5 + $ibl->blnl6 + $ibl->blnl7 + $ibl->blnl8 + $ibl->blnl9 + $ibl->blnl10 + $ibl->blnl11 + $ibl->blnl12;
                        $ibblln_month = $ibblln / $month;
                        $ibblln_month_rp = $ibblln_month / $rp;

                        $ibblln_my = $ibl->blnl_my1 + $ibl->blnl_my2 + $ibl->blnl_my3 + $ibl->blnl_my4 + $ibl->blnl_my5 + $ibl->blnl_my6 + $ibl->blnl_my7 + $ibl->blnl_my8 + $ibl->blnl_my9 + $ibl->blnl_my10 + $ibl->blnl_my11 + $ibl->blnl_my12;
                        $ibblln_my_month = $ibblln_my / $month;
                        $ibblln_my_month_rp = $ibblln_my_month / $rp;

                        echo "Average Pay Date : <b>  ";
                        echo number_format($ibblln_month);
                        echo " </b> | Person : <b>".number_format($ibblln_month_rp)."</b> | Ability : <b> ". number_format( $ibblln_month_rp * $rn );
                        echo "</b><br>Average Pay Month Year : <b> ";
                        echo number_format($ibblln_my_month);
                        echo "</b> | Person : <b>".number_format($ibblln_my_month_rp)."</b> | Ability : <b> ". number_format( $ibblln_my_month_rp * $rn );
                        echo "</b>";



                    }?> 
                     </b>
                </div>
            </div>

        </div>

        
    </div>

     <div class="row">
         <div class="col-xl-6 col-lg-7">
                <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Pemasukan dan Pengeluaran Lain This year</h6>
                </div>
                <div class="card-body">
                    <div class="chart-bar">
                        <canvas id="myBarChart3"></canvas>
                    </div>
                    <hr>
                    
                    <?php  foreach($pemasukan_pengeluaran as $pp){  

                    }?> 
                     
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-7">
                <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Pemasukan dan Pengeluaran Lain Last year</h6>
                </div>
                <div class="card-body">
                    <div class="chart-bar">
                        <canvas id="myBarChart4"></canvas>
                    </div>
                    <hr>
                    
                    <?php  foreach($pemasukan_pengeluaran as $pp){  




                    }?> 
                     </b>
                </div>
            </div>

        </div>

        
    </div>

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
                        <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
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
                                <td><b>Note :</b></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Saldo Kas Sebelum 2017 : <b>2.360.000</b><br>
                                Saldo Kas Kepengurusan RT Sebelumnya : <b>10.090.500</b></td>
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
    <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <!-- <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <!-- <script src="<?php echo base_url(); ?>assets/js/sb-admin-2.min.js"></script> -->

    <!-- Page level plugins -->
    <script src="<?php echo base_url(); ?>assets/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <!-- <script src="<?php echo base_url(); ?>assets/js/demo/chart-bar-demo.js"></script> -->
    <script src="<?php echo base_url(); ?>assets/js/demo/chart-pie-demo.js"></script>





<script type="text/javascript">

function numFormatter(num) {
    if(num > 999 && num < 1000000){
        return (num/1000).toFixed(1) + 'K'; // convert to K for number from > 1000 < 1 million 
    }else if(num >= 1000000){
        return (num/1000000).toFixed(1) + 'M'; // convert to M for number from > 1 million 
    }else if(num < 900){
        return num; // if value < 1000, nothing to do
    }
}
    // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

// Bar Chart Example
'<?php  foreach($iuran_bln as $ib){  ?>'
var ctx = document.getElementById("myBarChart1");
var myBarChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    datasets: [{
      label: "Pay Date",
      backgroundColor: "#2e59d9",
      hoverBackgroundColor: "#4e73df",
      borderColor: "#4e73df",
       
      data: ["<?php echo $ib->bln1; ?>", 
      "<?php echo $ib->bln2;?>", 
      "<?php echo $ib->bln3;?>",
      "<?php echo $ib->bln4;?>",
      "<?php echo $ib->bln5;?>",
      "<?php echo $ib->bln6;?>",
      "<?php echo $ib->bln7;?>",
      "<?php echo $ib->bln8;?>",
      "<?php echo $ib->bln9;?>",
      "<?php echo $ib->bln10;?>",
      "<?php echo $ib->bln11;?>",
      "<?php echo $ib->bln12;?>"]
    },
    {
      label: "Pay Mont Year",
      backgroundColor: "#ff0066",
      hoverBackgroundColor: "#ff80b3",
      borderColor: "#99003d",
       
      data: ["<?php echo $ib->bln_my1; ?>", 
      "<?php echo $ib->bln_my2;?>", 
      "<?php echo $ib->bln_my3;?>",
      "<?php echo $ib->bln_my4;?>",
      "<?php echo $ib->bln_my5;?>",
      "<?php echo $ib->bln_my6;?>",
      "<?php echo $ib->bln_my7;?>",
      "<?php echo $ib->bln_my8;?>",
      "<?php echo $ib->bln_my9;?>",
      "<?php echo $ib->bln_my10;?>",
      "<?php echo $ib->bln_my11;?>",
      "<?php echo $ib->bln_my12;?>"]
    },
    {
      label: "Pay Iuran RW",
      backgroundColor: "#333333",
      hoverBackgroundColor: "#8c8c8c",
      borderColor: "#0d0d0d",
       
      data: ["<?php echo $ib->iuran_bln1; ?>", 
      "<?php echo $ib->iuran_bln2;?>", 
      "<?php echo $ib->iuran_bln3;?>",
      "<?php echo $ib->iuran_bln4;?>",
      "<?php echo $ib->iuran_bln5;?>",
      "<?php echo $ib->iuran_bln6;?>",
      "<?php echo $ib->iuran_bln7;?>",
      "<?php echo $ib->iuran_bln8;?>",
      "<?php echo $ib->iuran_bln9;?>",
      "<?php echo $ib->iuran_bln10;?>",
      "<?php echo $ib->iuran_bln11;?>",
      "<?php echo $ib->iuran_bln12;?>"]
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 12
        },
        maxBarThickness: 25,
      }],
      yAxes: [{
        ticks: {
          min: 0,
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return 'Rp ' + numFormatter(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': Rp ' + number_format(tooltipItem.yLabel);
        }
      }
    },
  }
});

'<?php } ?>'


// ---------------------------------
// Bar Chart Example
'<?php  foreach($iuran_bln_last as $ibl){  ?>'
var ctx = document.getElementById("myBarChart2");
var myBarChart2 = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    datasets: [{
      label: "Pay Date",
      backgroundColor: "#009933",
      hoverBackgroundColor: "#33cc33",
      borderColor: "#4e73df",
       
      data: [ "<?php echo $ibl->blnl1; ?>", 
      "<?php echo $ibl->blnl2;?>", 
      "<?php echo $ibl->blnl3;?>",
      "<?php echo $ibl->blnl4;?>",
      "<?php echo $ibl->blnl5;?>",
      "<?php echo $ibl->blnl6;?>",
      "<?php echo $ibl->blnl7;?>",
      "<?php echo $ibl->blnl8;?>",
      "<?php echo $ibl->blnl9;?>",
      "<?php echo $ibl->blnl10;?>",
      "<?php echo $ibl->blnl11;?>",
      "<?php echo $ibl->blnl12;?>"],
    },
    {
       label: "Pay Mont Year",
      backgroundColor: "#ff0066",
      hoverBackgroundColor: "#ff80b3",
      borderColor: "#99003d",
       
      data: [ "<?php echo $ibl->blnl_my1; ?>", 
      "<?php echo $ibl->blnl_my2;?>", 
      "<?php echo $ibl->blnl_my3;?>",
      "<?php echo $ibl->blnl_my4;?>",
      "<?php echo $ibl->blnl_my5;?>",
      "<?php echo $ibl->blnl_my6;?>",
      "<?php echo $ibl->blnl_my7;?>",
      "<?php echo $ibl->blnl_my8;?>",
      "<?php echo $ibl->blnl_my9;?>",
      "<?php echo $ibl->blnl_my10;?>",
      "<?php echo $ibl->blnl_my11;?>",
      "<?php echo $ibl->blnl_my12;?>"],
    },
    {
      label: "Pay Iuran RW",
      backgroundColor: "#333333",
      hoverBackgroundColor: "#8c8c8c",
      borderColor: "#0d0d0d",
       
      data: ["<?php echo $ibl->iuran_blnl1; ?>", 
      "<?php echo $ibl->iuran_blnl2;?>", 
      "<?php echo $ibl->iuran_blnl3;?>",
      "<?php echo $ibl->iuran_blnl4;?>",
      "<?php echo $ibl->iuran_blnl5;?>",
      "<?php echo $ibl->iuran_blnl6;?>",
      "<?php echo $ibl->iuran_blnl7;?>",
      "<?php echo $ibl->iuran_blnl8;?>",
      "<?php echo $ibl->iuran_blnl9;?>",
      "<?php echo $ibl->iuran_blnl10;?>",
      "<?php echo $ibl->iuran_blnl11;?>",
      "<?php echo $ibl->iuran_blnl12;?>"]
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 12
        },
        maxBarThickness: 25,
      }],
      yAxes: [{
        ticks: {
          min: 0,
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return 'Rp ' + numFormatter(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': Rp ' + number_format(tooltipItem.yLabel);
        }
      }
    },
  }
});

'<?php } ?>'

// ---------------------------------
// Bar Chart Example
'<?php  foreach($pemasukan_pengeluaran as $pp){  ?>'
var ctx = document.getElementById("myBarChart3");
var myBarChart3 = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    datasets: [{
      label: "Pemasukan",
      backgroundColor: "#2e59d9",
      hoverBackgroundColor: "#4e73df",
      borderColor: "#4e73df",
       
      data: [ "<?php echo $pp->yuml_blnl1; ?>", 
      "<?php echo $pp->yuml_blnl2;?>", 
      "<?php echo $pp->yuml_blnl3;?>",
      "<?php echo $pp->yuml_blnl4;?>",
      "<?php echo $pp->yuml_blnl5;?>",
      "<?php echo $pp->yuml_blnl6;?>",
      "<?php echo $pp->yuml_blnl7;?>",
      "<?php echo $pp->yuml_blnl8;?>",
      "<?php echo $pp->yuml_blnl9;?>",
      "<?php echo $pp->yuml_blnl10;?>",
      "<?php echo $pp->yuml_blnl11;?>",
      "<?php echo $pp->yuml_blnl12;?>"],
    },{
      label: "Pengeluaran",
      backgroundColor: "#333333",
      hoverBackgroundColor: "#8c8c8c",
      borderColor: "#0d0d0d",
       
      data: [ "<?php echo $pp->yukl_blnl1; ?>", 
      "<?php echo $pp->yukl_blnl2;?>", 
      "<?php echo $pp->yukl_blnl3;?>",
      "<?php echo $pp->yukl_blnl4;?>",
      "<?php echo $pp->yukl_blnl5;?>",
      "<?php echo $pp->yukl_blnl6;?>",
      "<?php echo $pp->yukl_blnl7;?>",
      "<?php echo $pp->yukl_blnl8;?>",
      "<?php echo $pp->yukl_blnl9;?>",
      "<?php echo $pp->yukl_blnl10;?>",
      "<?php echo $pp->yukl_blnl11;?>",
      "<?php echo $pp->yukl_blnl12;?>"],
    }
    ],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 12
        },
        maxBarThickness: 25,
      }],
      yAxes: [{
        ticks: {
          min: 0,
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return 'Rp ' + numFormatter(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': Rp ' + number_format(tooltipItem.yLabel);
        }
      }
    },
  }
});

'<?php } ?>'

// ---------------------------------
// Bar Chart Example
'<?php  foreach($pemasukan_pengeluaran as $pp){  ?>'
var ctx = document.getElementById("myBarChart4");
var myBarChart4 = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    datasets: [ {
      label: "Pemasukan",
      backgroundColor: "#009933",
      hoverBackgroundColor: "#33cc33",
      borderColor: "#4e73df",
       
      data: [ "<?php echo $pp->uml_blnl1; ?>", 
      "<?php echo $pp->uml_blnl2;?>", 
      "<?php echo $pp->uml_blnl3;?>",
      "<?php echo $pp->uml_blnl4;?>",
      "<?php echo $pp->uml_blnl5;?>",
      "<?php echo $pp->uml_blnl6;?>",
      "<?php echo $pp->uml_blnl7;?>",
      "<?php echo $pp->uml_blnl8;?>",
      "<?php echo $pp->uml_blnl9;?>",
      "<?php echo $pp->uml_blnl10;?>",
      "<?php echo $pp->uml_blnl11;?>",
      "<?php echo $pp->uml_blnl12;?>"],
    },{
      label: "Pengeluaran",
      backgroundColor: "#333333",
      hoverBackgroundColor: "#8c8c8c",
      borderColor: "#0d0d0d",
       
      data: [ "<?php echo $pp->ukl_blnl1; ?>", 
      "<?php echo $pp->ukl_blnl2;?>", 
      "<?php echo $pp->ukl_blnl3;?>",
      "<?php echo $pp->ukl_blnl4;?>",
      "<?php echo $pp->ukl_blnl5;?>",
      "<?php echo $pp->ukl_blnl6;?>",
      "<?php echo $pp->ukl_blnl7;?>",
      "<?php echo $pp->ukl_blnl8;?>",
      "<?php echo $pp->ukl_blnl9;?>",
      "<?php echo $pp->ukl_blnl10;?>",
      "<?php echo $pp->ukl_blnl11;?>",
      "<?php echo $pp->ukl_blnl12;?>"],
    }
   ],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 12
        },
        maxBarThickness: 25,
      }],
      yAxes: [{
        ticks: {
          min: 0,
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return 'Rp ' + numFormatter(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': Rp ' + number_format(tooltipItem.yLabel);
        }
      }
    },
  }
});

'<?php } ?>'
// ---------------------------------



</script>

