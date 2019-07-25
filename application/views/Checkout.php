<?php
  require_once(APPPATH."views/part/Header.php");
?>
 <!-- Cart view section -->
 <section id="checkout">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="checkout-area">
            <div class="row">
              <div class="col-md-8">
                <div class="checkout-left">
                  <div class="panel-group" id="accordion">
                    <!-- Tac -->
                    <div class="panel panel-default aa-checkout-login">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                            *Read Me* MEMBER BENEFIT PROMO
                          </a>
                        </h4>
                      </div>
                      <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="panel-body">
                          <center><h2>MEMBER BENEFIT</h2></center>
                          <p>Selamat datang pengunjung <a href="#">namasite.com</a> untuk memberi pengalaman berbelanja yang menyenangkan, kami <a href="#">namasite.com</a> memberikan penawaran special untuk anda pelanggan setia <a href="#">namasite.com</a>, MEMBER BENEFIT ini akan berkali kali lipat menguntungkan anda para pengunjung setia <a href="#">namasite.com</a>, bagaimana tidak anda berkesempatan untuk mendapatkan potongan belanja secara langsung hanya dengan berbelanja di <a href="#">namasite.com</a>. Dan juga anda berkesempatan untuk menjadi member kami. Dengan Sekali transaksi anda akan menikmati keuntungan nya seumur hidup.</p>
                          <p>Berikut syarat dan ketentuan MEMBER BENEFIT:</p>
                          <table class="table table-responsive">
                            <thead>
                              <tr>
                                <td>Jenis Member</td>
                                <td>Syarat</td>
                                <td>Benefit Discount</td>
                                <td>Benefit Lain</td>
                                <td>Quota Per Kota</td>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                                $exec = $this->ModelsExecuteMaster->FindData(array('tglpasif'=>null),'mastersettingmember');
                                foreach ($exec->result() as $key) {
                                  echo "
                                    <tr>
                                      <td>".$key->namagrade."</td>
                                      <td>Minimum pembelian ".$key->minimumspend." Pcs</td>
                                      <td>".$key->benefitdiscount." %</td>
                                      <td>".$key->benefitlain1.", ".$key->benefitlain2.", ".$key->benefitlain3."</td>
                                      <td>".$key->quota."</td>
                                    </tr>
                                  ";
                                }
                              ?>
                            </tbody>
                          </table>
                          <p>
                            Info lebih detail silahkan menghubungi kami lewat live chat atau kontak media sosial kami.
                          </p>
                          <p>Terimakasih</p>
                          <p>Selamat Berbelanja</p>
                        </div>
                      </div>
                    </div>
                    <!-- Billing Details -->
                    <?php
                      $memberinfo = $this->ModelsPostProduct->GetMemberInfo($user_id);
                    ?>
                    <div class="panel panel-default aa-checkout-billaddress">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                            Billing Details
                          </a>
                        </h4>
                      </div>
                      <div id="collapseThree" class="panel-collapse">
                        <div class="panel-body">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <input type="text" placeholder="Nama Penerima*" id="recivername" value="<?php echo $memberinfo->row()->namamember; ?>">
                              </div>                             
                            </div>
                          </div> 
                          <div class="row">
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="email" placeholder="Email Address*" id="reciveremail" value="<?php echo $memberinfo->row()->Email; ?>">
                              </div>                             
                            </div>
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="tel" placeholder="Phone*" id="reciverphone" value="<?php echo $memberinfo->row()->Phone; ?>">
                              </div>
                            </div>
                          </div> 
                          <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <textarea cols="8" rows="3" id="reciveraddr"><?php echo $memberinfo->row()->Alamat; ?></textarea>
                              </div>                             
                            </div>                            
                          </div>   
                          <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <select id="Provinsi" name="Provinsi">
                                  <option value="0">Pilih Provinsi</option>
                                  <?php 
                                    $exec = $this->ModelsExecuteMaster->FindData(array(),'provinces');
                                    foreach ($exec->result() as $key) {
                                      echo "<option value='".$key->id."|".$key->id_RO."'>".$key->name."</option>";
                                    }
                                  ?>
                                </select>
                              </div>                             
                            </div>                            
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <!-- <input type="text" placeholder="Appartment, Suite etc."> -->
                                <select id="kota" name="kota">
                                  <option value="0">Pilih Kota</option>
                                </select>
                              </div>                             
                            </div>
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <select id="kec" name="kec">
                                  <option value="0">Pilih Kecamatan</option>
                                </select>
                              </div>
                            </div>
                          </div>   
                          <div class="row">
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <select id="kel" name="kel">
                                  <option value="0">Pilih Kelurahan</option>
                                </select>
                              </div>                             
                            </div>
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" placeholder="Postcode / ZIP*" id="kodepos">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <select id="jasaxpdc" name="jasaxpdc">
                                  <option value="0">Pilih Jasa Pengiriman</option>
                                  <?php 
                                    $exec = $this->ModelsExecuteMaster->FindData(array(),'masterxpdc');
                                    foreach ($exec->result() as $key) {
                                      echo "<option value='".$key->xpdccode."'>".$key->xpdcname."</option>";
                                    }
                                  ?>
                                </select>
                              </div>                             
                            </div>                         
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <div id="cekongkir_InfoExp"></div>
                              </div>                             
                            </div>                         
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <div id="det_ship"></div>
                                <select id="cekongkir_TableInfo" name="cekongkir_TableInfo">
                                  <option value="0">Pilih Service Pengiriman</option>
                                  ?>
                                </select>
                              </div>                             
                            </div>                         
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <textarea cols="8" rows="3" id="otherremarks"></textarea>
                              </div>                             
                            </div>                            
                          </div> 
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="checkout-right">
                  <h4>Order Summary</h4>
                  <div class="aa-order-summary-area">
                    <table class="table table-responsive">
                      <thead>
                        <tr>
                          <th>Product</th>
                          <th>Qty</th>
                          <th>Harga</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $exec = $this->ModelsPostProduct->getCart($user_id);
                          $net = '';
                          $gros = '';
                          foreach ($exec->result() as $key) {
                            if ($key->idsetingmember <> 0) {
                              $net = '<td>
                                        <del>
                                          '.number_format($key->price).'
                                        </del>
                                      '.number_format($key->pricenet).
                                      '</td>';

                              // $net = '<td><del>'.number_format($key->pricenet).'</del></td>';
                              // $gros = '<td>'.number_format($key->price).'</td>';
                            }
                            else{
                              $net = '<td>'.number_format($key->price).'</td>';
                            }
                            echo "
                              <tr>
                                <td>".$key->tittle."</td>
                                <td>".$key->qtyorder."</td>
                                ".$net."
                              </tr>
                            ";
                          }
                        ?>
                      </tbody>
                      <tfoot>
                        <?php
                          $exec = $this->ModelsPostProduct->GetSubtotal($user_id)->row();
                          echo "
                            <tr>
                              <th>Subtotal</th>
                              <td></td>
                              <td>".number_format($exec->grosprice)."</td>
                            </tr>
                            <tr>
                              <th>Discount</th>
                              <td></td>
                              <td>".number_format($exec->grosprice - $exec->pricenet)."</td>
                            </tr>
                            <tr>
                              <th>Ongkir</th>
                              <td></td>
                              <td><div id = 'ongkir_'></td>
                            </tr>
                            <tr>
                              <th>Total</th>
                              <td></td>
                              <td> <input type = 'hidden' id ='grandtotal' value = ".$exec->pricenet."><div id = 'grandtotallabel'>".number_format($exec->pricenet)."</div></td>
                            </tr>
                          ";
                        ?>
                      </tfoot>
                    </table>
                  </div>
                  <h4>Payment Method</h4>
                  <div class="aa-payment-method">                    
                    <!-- <label for="cashdelivery"><input type="radio" id="cashdelivery" name="optionsRadios"> Cash on Delivery </label> -->
                    <label for="paypal"><input type="radio" id="paypal" name="optionsRadios" checked> Via Transfer </label>
                    <img src="https://www.paypalobjects.com/webstatic/mktg/logo/AM_mc_vs_dc_ae.jpg" border="0" alt="PayPal Acceptance Mark">    
                    <button class="aa-browse-btn" id="proses_pesanan"> Proses Pesanan </button>
                  </div>
                </div>
              </div>
            </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->
<?php
  require_once(APPPATH."views/part/Subscribe.php");
  require_once(APPPATH."views/part/Footer.php");
  require_once(APPPATH."views/part/Script.php");
?>

<script type="text/javascript">
  $('#proses_pesanan').click(function () {
    var penerima = $('#recivername').val();
    var email = $('#reciveremail').val();
    var phone = $('#reciverphone').val();
    var alamat = $('#reciveraddr').val();
    var Provinsi = $('#Provinsi').val().split('|');
    var Kota = $('#kota').val().split('|');
    var kecamatan = $('#kec').val();
    var Kelurahan= $('#kel').val();
    var postcode = $('#kodepos').val();
    var xpdc = $('#jasaxpdc').val();
    var Service = $('#cekongkir_TableInfo').val().split('|');
    var otherremarks = $('#otherremarks').val();

    var fixprovinsi = Provinsi[0];
    var fixkota = Kota[0];
    var fixservice = Service[0];
    var fixcost = Service[1];

    if (penerima != '' && email != '' && phone != '' && alamat != '' && fixprovinsi != '' && fixkota != '' && kecamatan != '' && Kelurahan != '' && xpdc != '' && fixservice != '' && fixcost > 0) {
      // alert('OKE');
      // Cek available member
      $.ajax({
        type: "post",
        url: "<?=base_url()?>SitePostController/PlaceOrder",
        data: {penerima:penerima,email:email,phone:phone,alamat:alamat,fixprovinsi:fixprovinsi,fixkota:fixkota,kecamatan:kecamatan,Kelurahan:Kelurahan,postcode:postcode,xpdc:xpdc,fixservice:fixservice,fixcost:fixcost},
        dataType: "json",
        success:function (response) {
          console.log(response.success);
          if (response.success == true) {
            location.replace("<?=base_url()?>finish");
          }
          else{
            var kode = response.message;
            if (kode.substring(0,3) == '701') {
              Swal.fire({
                type: 'error',
                title: 'Woops...',
                text: response.message,
              }).then((result)=>{
                Recakculation();
              });;  
            }
            else{
              Swal.fire({
                type: 'error',
                title: 'Woops...',
                text: response.message,
              });
            }
          }
        }
      });
    }
    else{
      Swal.fire({
        type: 'error',
        title: 'Woops...',
        text: 'Data Tidak lengkap, silahkan periksa Kembali',
      });
    }
  });
  function Recakculation() {
    var penerima = $('#recivername').val();
    var email = $('#reciveremail').val();
    var phone = $('#reciverphone').val();
    var alamat = $('#reciveraddr').val();
    var Provinsi = $('#Provinsi').val().split('|');
    var Kota = $('#kota').val().split('|');
    var kecamatan = $('#kec').val();
    var Kelurahan= $('#kel').val();
    var postcode = $('#kodepos').val();
    var xpdc = $('#jasaxpdc').val();
    var Service = $('#cekongkir_TableInfo').val().split('|');
    var otherremarks = $('#otherremarks').val();

    var fixprovinsi = Provinsi[0];
    var fixkota = Kota[0];
    var fixservice = Service[0];
    var fixcost = Service[1];

    if (penerima != '' && email != '' && phone != '' && alamat != '' && fixprovinsi != '' && fixkota != '' && kecamatan != '' && Kelurahan != '' && xpdc != '' && fixservice != '' && fixcost > 0) {
      // alert('OKE');
      // Cek available member
      $.ajax({
        type: "post",
        url: "<?=base_url()?>SitePostController/Recalculation",
        data: {penerima:penerima,email:email,phone:phone,alamat:alamat,fixprovinsi:fixprovinsi,fixkota:fixkota,kecamatan:kecamatan,Kelurahan:Kelurahan,postcode:postcode,xpdc:xpdc,fixservice:fixservice,fixcost:fixcost},
        dataType: "json",
        success:function (response) {
          console.log(response.success);
          if (response.success == true) {
            location.replace("<?=base_url()?>finish");
          }
          else{
            alert('else');
            Swal.fire({
              type: 'error',
              title: 'Woops...',
              text: response.message,
            });
          }
        }
      });
    }
    else{
      Swal.fire({
        type: 'error',
        title: 'Woops...',
        text: 'Data Tidak lengkap, silahkan periksa Kembali',
      });
    }
  }
</script>