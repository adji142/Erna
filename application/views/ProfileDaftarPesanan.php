<?php
require_once(APPPATH."views/part/Header.php");
$uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$lastUriSegment = array_pop($uriSegments);
$active = array_pop($uriSegments).'/'.$lastUriSegment;
?>
<section id="aa-product-category">
<div class="container">
    <div class="row">
    <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
        <div class="aa-product-catg-content">
        <div class="aa-product-catg-body">
            <!-- Start Content Hire -->
            <ul class="nav nav-tabs">
              <li><a data-toggle="tab" href="#tab1">RINGKASAN ORDER</a></li>
              <li><a data-toggle="tab" href="#tab2">PESANAN DI KIRIM</a></li>
              <li><a data-toggle="tab" href="#tab3">PESANAN SELESAI</a></li>
            </ul>
            <div id="tab1" class="tab-pane">
                <center>
                    <p><h2>Ringkasan Order</h2></p>
                </center>
                <!-- Baca sumary  -->
                <table class="table table-responsive">
                  <thead>
                    <tr>
                      <th>No. Order</th>
                      <th>Tanggal Order</th>
                      <th>Total Qty</th>
                      <th>Total Harga</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <?php
                    $memberid = $this->ModelsExecuteMaster->FindData(array('userid'=>$user_id),'mastermember')->row();
                    $header = $this->ModelsExecuteMaster->FindData(array('memberid'=>$memberid->Id),'deliveryorder');

                    foreach ($header->result() as $head) {
                      $SUMARY = $this->ProfileModels->SumOrder($head->id)->row();
                      $Status= '';
                      $aksi = '';
                      if ($head->statusorder == 0) {
                        $Status = 'Menunggu Pembayaran';
                        $aksi = '<button id = "bayar_" class = "btn btn-mini-danger">Bayar</button>';
                      }
                      elseif ($head->statusorder == 1) {
                        $Status = 'Pembayaran di konfirmasi';
                      }
                      elseif ($head->statusorder == 2) {
                        $Status = 'Pesanan Di Proses';
                      }
                      elseif ($head->statusorder == 3) {
                        $Status = 'Pesanan Di Kirim';
                      }
                      elseif ($head->statusorder == 4) {
                        $Status = 'Pesanan Selesai';
                      }
                      else{
                        $Status = 'Status Tidak Di ketahui';
                      }
                      echo "<tr>
                              <td>".$head->nomerorder."</td>
                              <td>".date_format(date_create($head->tglorder),'d-m-Y')."</td>
                              <td>".number_format($SUMARY->Qty)."</td>
                              <td>".number_format($SUMARY->TOTAL)."</td>
                              <td>".$Status."</td>
                              <td>".$aksi."</td>
                            </tr>
                          ";
                    }
                  ?>
                </table>
            </div>
        </div>
        </div>
    </div>
<?php
require_once(APPPATH."views/part/sidebar.php");
require_once(APPPATH."views/part/Subscribe.php");
  require_once(APPPATH."views/part/Footer.php");
  require_once(APPPATH."views/part/Script.php");
?>