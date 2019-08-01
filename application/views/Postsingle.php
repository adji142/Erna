<?php
  require_once(APPPATH."views/part/Header.php");
  $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
  $lastUriSegment = array_pop($uriSegments);
?>
<link rel="stylesheet" href="<?php echo base_url();?>Assets/css/etalage.css" type="text/css" media="all" />
<script src="<?php echo base_url();?>Assets/js/jquery.etalage.min.js"></script>
    <!-- product category -->
<script>
      jQuery(document).ready(function($){

        $('#etalage').etalage({
          thumb_image_width: 250,
          thumb_image_height: 300,
          source_image_width: 900,
          source_image_height: 1024,
          show_hint: true,
          smallthumb_select_on_hover: true,
          click_callback: function(image_anchor, instance_id){
            alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
          }
        });

      });
    </script>

    <input type="hidden" name="idpost_uri" id="idpost_uri" value="<?php echo $lastUriSegment; ?>">
  <section id="aa-product-details">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-product-details-area">
            <div class="aa-product-details-content">
              <div class="row">
                <!-- Modal view slider -->
                <div class="col-md-5 col-sm-5 col-xs-12">
                  <!-- <div class="aa-product-view-slider"> -->
                    <?php
                    $image = $this->ModelsExecuteMaster->FindData(array('postid'=>$lastUriSegment),'imagetable');
                    $post = $this->ModelsExecuteMaster->FindData(array('id'=>$lastUriSegment),'post_product')->row();
                    $cat = $this->ModelsExecuteMaster->FindData(array('id'=>$post->categories),'categories')->row();
                      foreach ($image->result() as $img) {
                        echo '
                          <ul id="etalage">
                            <li>
                              <img class="etalage_source_image" src="'.$img->image.'" >
                              <img class="etalage_thumb_image" src="'.$img->image.'" >
                            </li>
                          </ul>
                        ';
                      }
                    ?> 
                  <!-- </div> -->
                </div>
                <!-- <div class="col-md-5 col-sm-5 col-xs-12">
                  <div class="aa-product-view-slider">
                    <div id="demo-1" class="simpleLens-gallery-container">
                      <div class="simpleLens-container">
                        <div class="simpleLens-big-image-container"><a data-lens-image="Assets/img/view-slider/large/polo-shirt-1.png" class="simpleLens-lens-image"><img src="img/view-slider/medium/polo-shirt-1.png" class="simpleLens-big-image"></a></div>
                      </div>
                      <div class="simpleLens-thumbnails-container">
                          <a data-big-image="Assets/img/view-slider/medium/polo-shirt-1.png" data-lens-image="img/view-slider/large/polo-shirt-1.png" class="simpleLens-thumbnail-wrapper" href="#">
                            <img src="img/view-slider/thumbnail/polo-shirt-1.png">
                          </a>                                    
                          <a data-big-image="img/view-slider/medium/polo-shirt-3.png" data-lens-image="img/view-slider/large/polo-shirt-3.png" class="simpleLens-thumbnail-wrapper" href="#">
                            <img src="img/view-slider/thumbnail/polo-shirt-3.png">
                          </a>
                          <a data-big-image="img/view-slider/medium/polo-shirt-4.png" data-lens-image="img/view-slider/large/polo-shirt-4.png" class="simpleLens-thumbnail-wrapper" href="#">
                            <img src="img/view-slider/thumbnail/polo-shirt-4.png">
                          </a>
                      </div>
                    </div>
                  </div>
                </div> -->
                <!-- Modal view content -->
                <div class="col-md-7 col-sm-7 col-xs-12">
                  <div class="aa-product-view-content">
                    <h3><?php echo $post->tittle; ?></h3>
                    <div class="aa-price-block">
                      <span class="aa-product-view-price"><?php echo number_format($post->price); ?></span>
                      <p class="aa-product-avilability">Avilability: <span>In stock</span></p>
                    </div>
                    <p>
                      <?php echo $post->description; ?>
                    </p>
                      <p class="aa-prod-category">
                        Category: <a href="#"><?php echo $cat->category; ?></a>
                      </p>
                    </div>
                    <div class="aa-prod-view-bottom">
                      <a class="aa-add-to-cart-btn" href="#" onclick="add_cart('<?php echo $lastUriSegment; ?>')">Add To Cart</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <br>
            <div class="aa-product-details-bottom">
              <!-- review -->
              <br>
              <p><center><strong>_________________________</strong></center></p>

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
      </div>
    </div>
  </section>
  <!-- / product category -->
<?php
  require_once(APPPATH."views/part/Subscribe.php");
  require_once(APPPATH."views/part/Footer.php");
  require_once(APPPATH."views/part/Script.php");
?>