<?php
  require_once(APPPATH."views/part/Header.php");
?>
 <!-- Cart view section -->
 <section id="checkout">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="checkout-area">
          <form action="">
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
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" placeholder="First Name*">
                              </div>                             
                            </div>
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" placeholder="Last Name*">
                              </div>
                            </div>
                          </div> 
                          <div class="row">
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="email" placeholder="Email Address*">
                              </div>                             
                            </div>
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="tel" placeholder="Phone*">
                              </div>
                            </div>
                          </div> 
                          <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <textarea cols="8" rows="3">Address*</textarea>
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
                                <input type="text" placeholder="Postcode / ZIP*">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <select id="xpdc" name="xpdc">
                                  <option value="0">Pilih Jasa Pengiriman</option>
                                  <?php 
                                    $exec = $this->ModelsExecuteMaster->FindData(array(),'masterxpdc');
                                    foreach ($exec->result() as $key) {
                                      echo "<option value='".$key->id."'>".$key->xpdccode." | ".$key->xpdcname."</option>";
                                    }
                                  ?>
                                </select>
                              </div>                             
                            </div>
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" placeholder="Estimasi Ongkir*" readonly="">
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
                              <th>Total</th>
                              <td></td>
                              <td>".number_format($exec->pricenet)."</td>
                            </tr>
                          ";
                        ?>
                      </tfoot>
                    </table>
                  </div>
                  <h4>Payment Method</h4>
                  <div class="aa-payment-method">                    
                    <label for="cashdelivery"><input type="radio" id="cashdelivery" name="optionsRadios"> Cash on Delivery </label>
                    <label for="paypal"><input type="radio" id="paypal" name="optionsRadios" checked> Via Paypal </label>
                    <img src="https://www.paypalobjects.com/webstatic/mktg/logo/AM_mc_vs_dc_ae.jpg" border="0" alt="PayPal Acceptance Mark">    
                    <input type="submit" value="Place Order" class="aa-browse-btn">                
                  </div>
                </div>
              </div>
            </div>
          </form>
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