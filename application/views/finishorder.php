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
              <center>
                <p>
                  <img src="<?php echo base_url();?>Assets/img/shopcart.gif"> 
                </p>
                <p>
                  <h2>HAMPIR SELESAI..</h2>
                </p>
                <p>
                  Terimakasih sudah berbelanja lewat <a href="#">Namasite.com</a><br>
                  Silahkan Ikuti Proses Selanjutnya
                </p>
                <p>
                  <button class="btn btn-primary" id="lanjutnext">Proses Selanjutnya</button>
                  <button class="btn btn-default" id="nexthome">Lanjutkan Berbelanja</button>
                </p>
              </center>
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