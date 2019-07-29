<?php
require_once(APPPATH."views/part/Header.php");
$uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$lastUriSegment = array_pop($uriSegments);
$active = array_pop($uriSegments).'/'.$lastUriSegment;
?>
<style type="text/css">
  @import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

  fieldset, label { margin: 0; padding: 0; }
  /*body{ margin: 20px; }*/
  h1 { font-size: 1.5em; margin: 10px; }

  /****** Style Star Rating Widget *****/

  .rating { 
    border: none;
    float: left;
  }

  .rating > input { display: none; } 
  .rating > label:before { 
    margin: 5px;
    font-size: 1.25em;
    font-family: FontAwesome;
    display: inline-block;
    content: "\f005";
  }

  .rating > .half:before { 
    content: "\f089";
    position: absolute;
  }

  .rating > label { 
    color: #ddd; 
   float: right; 
  }

  /***** CSS Magic to Highlight Stars on Hover *****/

  .rating > input:checked ~ label, /* show gold star when clicked */
  .rating:not(:checked) > label:hover, /* hover current star */
  .rating:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover previous stars in list */

  .rating > input:checked + label:hover, /* hover current star when changing rating */
  .rating > input:checked ~ label:hover,
  .rating > label:hover ~ input:checked ~ label, /* lighten current selection */
  .rating > input:checked ~ label:hover ~ label { color: #FFED85;  } 
</style>
<section id="aa-product-category">
<div class="container">
    <div class="row">
    <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
        <div class="aa-product-catg-content">
          <div class="aa-product-catg-body">
              <!-- Start Content Hire -->
              <div class="col-md-12">
              <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#tab1">RINGKASAN ORDER</a></li>
                <li><a data-toggle="tab" href="#tab2">PESANAN DI KIRIM</a></li>
                <li><a data-toggle="tab" href="#tab3">PESANAN SELESAI</a></li>
              </ul>
              <div class="tab-content">
                <div id="tab1" class="tab-pane active">
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
                            $aksi = '<button id = "'.$head->id.'" class = "btn btn-mini-danger bayar_">Bayar</button>';
                          }
                          elseif ($head->statusorder == 1) {
                            $Status = 'Menunggu Pembayaran di konfirmasi';
                          }
                          elseif ($head->statusorder == 2) {
                            $Status = 'Pembayaran di konfirmasi';
                          }
                          elseif ($head->statusorder == 3) {
                            $Status = 'Pesanan Di Proses';
                          }
                          elseif ($head->statusorder == 4) {
                            $Status = 'Pesanan Di Kirim';
                            $aksi = '<a data-toggle="tab" class="btn btn-mini btn-danger" href="#tab2">Cek Resi</a>';
                          }
                          elseif ($head->statusorder == 5) {
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
                <div id="tab2" class="tab-pane">
                  <center>
                        <p><h2>Pesanan Di Kirim</h2></p>
                    </center>
                    <!-- Baca sumary  -->
                    <table class="table table-responsive">
                      <thead>
                        <tr>
                          <th>No. Order</th>
                          <th>Tanggal Order</th>
                          <th>Kurir</th>
                          <th>Service</th>
                          <th>No Resi</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <?php
                        $query = "
                          SELECT 
                            b.nomerorder,
                            b.tglorder,
                            c.nopengiriman,
                            c.tglpengiriman,
                            c.nomerresi,
                            b.xpdc,
                            b.service,
                            b.id doid,
                            a.postid
                          FROM deliveryorderdetail a
                          LEFT JOIN deliveryorder b on a.headerid = b.id
                          LEFT JOIN pengiriman c on c.doid = b.id
                          WHERE b.statusorder = 4
                        ";
                        $getquery = $this->db->query($query);

                        foreach ($getquery->result() as $x) {
                          echo "<tr>
                                  <td>".$x->nomerorder."</td>
                                  <td>".date_format(date_create($x->tglorder),'d-m-Y')."</td>
                                  <td>".$x->xpdc."</td>
                                  <td>".$x->service."</td>
                                  <td>".$x->nomerresi."</td>
                                  <td><button id = '".$x->postid."|".$x->doid."' class = 'btn btn-mini selesai_'>Selesai</button></td>
                                </tr>
                              ";
                        }
                      ?>
                    </table>
                </div>
                <div id="tab3" class="tab-pane">
                  <table class="table table-responsive">
                      <thead>
                        <tr>
                          <th>No. Order</th>
                          <th>Tanggal Order</th>
                          <th>Kurir</th>
                          <th>Service</th>
                          <th>No Resi</th>
                          <th>Total Belanja</th>
                        </tr>
                      </thead>
                      <?php
                        $query = "
                          SELECT 
                            b.nomerorder,
                            b.tglorder,
                            c.nopengiriman,
                            c.tglpengiriman,
                            c.nomerresi,
                            b.xpdc,
                            b.service,
                            SUM(a.gros - a.discount + a.ongkir) AS Total
                          FROM deliveryorderdetail a
                          LEFT JOIN deliveryorder b on a.headerid = b.id
                          LEFT JOIN pengiriman c on c.doid = b.id
                          WHERE b.statusorder = 5
                        ";
                        $getquery = $this->db->query($query);

                        foreach ($getquery->result() as $x) {
                          echo "<tr>
                                  <td>".$x->nomerorder."</td>
                                  <td>".date_format(date_create($x->tglorder),'d-m-Y')."</td>
                                  <td>".$x->xpdc."</td>
                                  <td>".$x->service."</td>
                                  <td>".$x->nomerresi."</td>
                                  <td>".number_format($x->Total)."</td>
                                </tr>
                              ";
                        }
                      ?>
                    </table>
                </div>
            </div>
          </div>
        </div>
        </div>
    </div>

      <div class="modal fade" id="login-bayar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">                      
            <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <p><center><h2>Pembayaran Pemesanan</h2></center></p>
              <p>Silahkan Melakukan Pembayaran dengan Nomer Rekening yang tertera berikut ini :</p>
              <form id="GoBayar" enctype='application/json'>
                <input type="hidden" name="doid" id="doid">
                <div class="form-group has-feedback">
                  <select id="rekening" name="rekening">
                    <option value="0">Pilih Rekening</option>
                    <?php
                      $rek = $this->ModelsExecuteMaster->FindData(array('tglpasif'=>null),'masterrekening')->result();
                      foreach ($rek as $key) {
                        echo "<option value='".$key->id."'>".$key->norek ."| ".$key->namabank."</option>";
                      }
                    ?>
                  </select>
                </div>
                <div id="rekdetail"></div>
                <br>
                <div class="form-group has-feedback">
                  <label for="">Input Bukti Pembayaran<span>*</span></label>
                  <input type='file' id="inputFile">
                  <img id="image_upload_preview" src="http://placehold.it/100x100" alt="your image" width="100" height="100">
                  <textarea id="base64" name="base64" rows="5" style="display:none;"></textarea>
                </div>
                <button class="aa-browse-btn" id="btn_Bayar">Bayar</button>
              </form>
            </div>                        
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div>

        <div class="modal fade" id="Review_" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">                      
            <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <p><center><h2>Tuliskan Review Anda</h2></center></p>
              <form id="gorev" enctype='application/json'>
                <input type="hidden" name="postorderid" id="postorderid">
                <input type="hidden" name="userid_" id="userid_" value="<?php echo $user_id; ?>">
                <div class="form-group has-feedback">
                  <fieldset class="rating">
                    <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                    <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                    <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                    <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                    <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                  </fieldset>
                </div>
                <div class="form-group has-feedback">
                  <!-- <textarea class="form-control" id="descrev" name="descrev" placeholder="Tuliskan Review"></textarea> -->
                  <input type="text" name="" class="form-control">
                </div>
                <!-- <div class="form-group has-feedback">
                  <button class="aa-browse-btn" id="btn_Smt">Submit</button>
                </div> -->
              </form>
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
<script type="text/javascript">

  // Check for the File API support.
if (window.File && window.FileReader && window.FileList && window.Blob) {
  document.getElementById('inputFile').addEventListener('change', handleFileSelect, false);
} else {
  alert('The File APIs are not fully supported in this browser.');
}

  var base64 = '';
  $('.bayar_').click(function () {
    $('#login-bayar').modal('show');
    $('#doid').val($('.bayar_').attr("id"));
  });
  $("#inputFile").change(function () {
      readURL(this);
  });
  $('#rekening').change(function () {
    var idrek = $('#rekening').val();
    $.ajax({
      type: "post",
      url: "<?=base_url()?>ProfileController/RekeningDetail",
      data: {idrek:idrek},
      dataType: "json",
      success: function (response) {
        if(response.success == true){
          $.each(response.data,function (k,v) {
            $('#rekdetail').append(""+
                "<table>"+
                  "<tr>"+
                    "<td>Kode Bank</td>"+
                    "<td>:</td>"+
                    "<td>"+v.kdbank+"</td>"+
                  "<tr>"+
                  "<tr>"+
                    "<td>Nama Bank</td>"+
                    "<td>:</td>"+
                    "<td>"+v.namabank+"</td>"+
                  "<tr>"+
                  "<tr>"+
                    "<td>Nomer Rekening</td>"+
                    "<td>:</td>"+
                    "<td>"+v.norek+"</td>"+
                  "<tr>"+
                  "<tr>"+
                    "<td>Atas Nama</td>"+
                    "<td>:</td>"+
                    "<td>"+v.atasnama+"</td>"+
                  "<tr>"+
                "</table>"
              );
          });
        }
      }
    });
  });
  $('.selesai_test').click(function () {
    $('#Review_').modal('show');
  });
  $(".selesai_").click(function () {
    var Id = $(this).attr("id").split('|');
    var doid = Id[1];
    $('#postorderid').val(Id[0]);
      Swal.fire({
        title: 'Apakah Anda Yakin?',
        text: "Pesanan Sudah anda terima dan sudah sesuai dengan yang anda pesan, lanjutkan ?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, lanjutkan!'
      }).then((result) => {
        if (result.value) {
          $.ajax({
            type    :'post',
            url     : '<?=base_url()?>ProfileController/Selesai',
            data    : {doid:doid},
            dataType: 'json',
            success:function (response) {
              if(response.success == true){
                // $('#Review_').modal('show');
                location.reload();
              }
              else{
                Swal.fire({
                  type: 'error',
                  title: 'Woops...',
                  text: result.message,
                  // footer: '<a href>Why do I have this issue?</a>'
                }).then((result)=>{
                  location.reload();
                });
              }
            }
          });
        }
      });
  });
  $("#Review_").submit(function (e) {
    $('#btn_Smt').text('Tunggu Sebentar...');
    $('#btn_Smt').attr('disabled',true);
    e.preventDefault();
    var me = $(this);
    $.ajax({
      type  : 'post',
      url   : '<?=base_url()?>ProfileController/review',
      data  : me.serialize(),
      dataType : 'json',
      success: function (response) {
        if(response.success == true){
          Swal.fire({
                type: 'success',
                title: 'Selamat !!!',
                text : 'Terimakasih Sudah Memesan.'
              }).then((result)=>{
                location.reload();
              });
        }
        else{
          Swal.fire({
              type: 'error',
              title: 'Woops...',
              text: 'Undefind error',
              footer: response.message,
            }).then((result)=>{
              location.reload();
            });
        }
      }
    });

  });
  $("#GoBayar").submit(function (e){
    $('#btn_Bayar').text('Tunggu Sebentar...');
    $('#btn_Bayar').attr('disabled',true);
    e.preventDefault();
    var me = $(this);
    
    $.ajax({
      type  : 'post',
      url   : '<?=base_url()?>ProfileController/SavePayment',
      data  : me.serialize(),
      dataType : 'json',
      success: function (response) {
        if(response.success == true){
          Swal.fire({
                type: 'success',
                title: 'Selamat !!!',
                text : 'Data berhasil Di Update'
              }).then((result)=>{
                location.reload();
              });
        }
        else{
          Swal.fire({
              type: 'error',
              title: 'Woops...',
              text: 'Undefind error',
              footer: response.message,
            }).then((result)=>{
              location.reload();
            });
        }
      }
    });
  });
function readURL(input) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
          $('#image_upload_preview').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
  }
}
function handleFileSelect(evt) {
  var f = evt.target.files[0]; // FileList object
  var reader = new FileReader();
  // Closure to capture the file information.
  reader.onload = (function(theFile) {
    return function(e) {
      var binaryData = e.target.result;
      //Converting Binary Data to base 64
      var base64String = window.btoa(binaryData);
      //showing file converted to base64
      document.getElementById('base64').value = base64String;
      // alert('File converted to base64 successfuly!\nCheck in Textarea');
    };
  })(f);
  // Read in the image file as a data URL.
  reader.readAsBinaryString(f);
}
</script>