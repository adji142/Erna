<footer id="aa-footer">
    <!-- footer bottom -->
    <div class="aa-footer-top">
     <div class="container">
        <div class="row">
        <div class="col-md-12">
          <div class="aa-footer-top-area">
            <div class="row">
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">

                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Contact Us</h3>
                    <?php 
                      $excec = $this->ModelsExecuteMaster->GetData('siteabout')->row();
                      $alamat = $excec->storeaddress;
                      $phone = $excec->storephone;
                      $email = '';
                    ?>
                    <address>
                      <p> <?php echo $alamat; ?></p>
                      <p><span class="fa fa-phone"></span><?php echo $phone; ?></p>
                      <p><span class="fa fa-envelope"></span><?php echo $email; ?></p>
                    </address>
                    <div class="aa-footer-social">
                      <a href="#"><span class="fa fa-facebook"></span></a>
                      <a href="#"><span class="fa fa-twitter"></span></a>
                      <a href="#"><span class="fa fa-google-plus"></span></a>
                      <a href="#"><span class="fa fa-youtube"></span></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     </div>
    </div>
    <!-- footer-bottom -->
    <div class="aa-footer-bottom">
      <div class="container">
        <div class="row">
        <div class="col-md-12">
          <div class="aa-footer-bottom-area">
            <p>Designed by <a href="http://www.markups.io/">MarkUps.io</a></p>
            <div class="aa-footer-payment">
              <span class="fa fa-cc-mastercard"></span>
              <span class="fa fa-cc-visa"></span>
              <span class="fa fa-paypal"></span>
              <span class="fa fa-cc-discover"></span>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </footer>
  <!-- / footer -->
  <!-- Login Modal -->  
  <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">                      
        <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4>Login or Register</h4>
          <form class="aa-login-form" id="goLog" enctype='application/json'>
            <label for="">Email address<span>*</span></label>
            <input type="text" placeholder="email" name="account" id="account">
            <label for="">Password<span>*</span></label>
            <input type="password" placeholder="Password" name="secreet" id="secreet">
            <button class="aa-browse-btn" id="btn_login">Login</button>
            <p class="aa-lost-password"><a href="#">Lost your password?</a></p>
            <div class="aa-register-now">
              Don't have an account?<a href="#" data-toggle="modal" id="register">Register now!</a>
            </div>
          </form>
        </div>                        
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>

  <div class="modal fade" id="Reg-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">                      
        <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4>Login or Register</h4>
          <form class="aa-login-form" id="goReg" enctype='application/json'>
            <div class="form-group has-feedback">
              <label for="">User Name<span>*</span></label>
              <input type="text" placeholder="username" name="username" id="username" required="" class="form-control">
            </div>
            <div class="form-group has-feedback">
              <label for="">Email<span>*</span></label>
              <input type="text" placeholder="Email" name="email" id="email" required="" class="form-control">
            </div>
            <div class="form-group has-feedback">
              <label for="">Phone Number<span>*</span></label>
              <input type="text" placeholder="Phone Number" name="phone" id="phone" required="" class="form-control">
            </div>
            <div class="form-group has-feedback">
              <label for="">Password<span>*</span></label>
              <input type="password" placeholder="Password" required="" id="pass" name="pass" class="form-control">
            </div>
            <div class="form-group has-feedback">
              <label for="">Confirm Password<span>*</span></label>
              <input type="password" placeholder="Confirm Password" required="" id="repass" name="repass" class="form-control">
            </div>
            <button class="aa-browse-btn" id="btn_submit">Register</button>
            <p></p>
          </form>
        </div> 
        <div class="modal-footer">
          <div class="aa-register-now">
              have an account?<a href="#" id="login2">Login now!</a>
          </div>
        </div>                       
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>

    <!-- Login Modal -->  
  <div class="modal fade" id="addqty-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">                      
        <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4>Tambah Lebih banyak lagi</h4>
          <!-- <form class="aa-login-form" id="goLog" enctype='application/json'> -->
            <label for="">Tambah Jumlah<span>*</span></label>
            <input type="hidden" name="idaddcart" id="idaddcart">
            <input type="Number" placeholder="Jumlah" name="account" id="JmlOrder" class="btn" width="100%">
            <button class="btn btn-primary" id="btn_TambahQty" onclick="countingpraise()">Update</button>
          <!-- </form> -->
        </div>                        
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="<?php echo base_url();?>Assets/js/bootstrap.js"></script>  
  <!-- SmartMenus jQuery plugin -->
  <script type="text/javascript" src="<?php echo base_url();?>Assets/js/jquery.smartmenus.js"></script>
  <!-- SmartMenus jQuery Bootstrap Addon -->
  <script type="text/javascript" src="<?php echo base_url();?>Assets/js/jquery.smartmenus.bootstrap.js"></script>  
  <!-- To Slider JS -->
  <script src="<?php echo base_url();?>Assets/js/sequence.js"></script>
  <script src="<?php echo base_url();?>Assets/js/sequence-theme.modern-slide-in.js"></script>  
  <!-- Product view slider -->
  <script type="text/javascript" src="<?php echo base_url();?>Assets/js/jquery.simpleGallery.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>Assets/js/jquery.simpleLens.js"></script>
  <!-- slick slider -->
  <script type="text/javascript" src="<?php echo base_url();?>Assets/js/slick.js"></script>
  <!-- Price picker slider -->
  <script type="text/javascript" src="<?php echo base_url();?>Assets/js/nouislider.js"></script>
  <!-- Custom js -->
  <script src="<?php echo base_url();?>Assets/js/custom.js"></script> 
  
  <!-- Sweet alert -->
  
  <script src="<?php echo base_url();?>Assets/sweetalert2-8.8.0/package/dist/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="<?php echo base_url();?>Assets/sweetalert2-8.8.0/package/dist/sweetalert2.min.css">

  <!--datatable-->
  <!-- <script src="<?php echo base_url();?>front/jquery/js/jquery.dataTables.min.js"></script> -->
  <script src="<?php echo base_url();?>Assets/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url();?>Assets/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  
  <script src="<?php echo base_url();?>Assets/js/passwordscheck.js"></script> 
  <script src="<?php echo base_url();?>Assets/js/icheck.min.js"></script>
  </body>
</html>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5d41b790e5ae967ef80dbd8e/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->