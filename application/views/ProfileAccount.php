<?php
require_once(APPPATH."views/part/Header.php");
$uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$lastUriSegment = array_pop($uriSegments);
$active = array_pop($uriSegments).'/'.$lastUriSegment;
?>
<style>
.icheckbox_flat-green,
.iradio_flat-green {
    display: inline-block;
    *display: inline;
    vertical-align: middle;
    margin: 0;
    padding: 0;
    width: 20px;
    height: 20px;
    background: url(green.png) no-repeat;
    border: none;
    cursor: pointer;
}
</style>
<?php
    $memberinfo = $this->ModelsExecuteMaster->FindData(array('userid'=>$user_id),'mastermember')->row();
?>
<section id="aa-product-category">
<div class="container">
    <div class="row">
    <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
        <div class="aa-product-catg-content">
        <div class="aa-product-catg-head">
            <!-- Start Content Hire -->
            <div class="col-md-6">
                <div class="aa-product-catg-head-left">
                    <div class="panel-group" id="accordion">
                        <h4>
                            <b>Profil Saya</b>
                        </h4>
                        <h6>
                            Kelola akun anda untuk mengontrol dan mengamankan akun anda
                        </h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="aa-product-catg-body">
            <div class="col-md-12">
                <form id="SaveProfile" enctype='application/json'>
                    <div class="form-group has-feedback">
                        <input type="Email" placeholder="Email" name = "email" id = "email" class="form-control" value="<?php echo $memberinfo->email; ?>">
                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" placeholder="Nomor Telepon" name = "phone" id = "phone" class="form-control" value="<?php echo $memberinfo->notlp; ?>">
                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" placeholder="Nama Lengkap" name = "name" id = "name" class="form-control" value="<?php echo $memberinfo->namamember; ?>">
                    </div>
                    <div class="form-group has-feedback">
                        <?php
                            $laki = '';
                            $wanita = '';

                            if ($memberinfo->gender == 'L') {
                                $laki = 'checked';
                            }
                            elseif ($memberinfo->gender == 'P') {
                                $wanita = 'checked';
                            }
                            else{
                                $laki = '';
                                $wanita = '';
                            }
                        ?>
                        <label class="radio">Jenis Kelamin</label>
                        <label class="radio">Laki Laki
                          <input type="radio" name="r3" value="L" <?php echo $laki; ?>>
                          <span class="checkround"></span>
                        </label>
                        <label class="radio">Perempuan
                          <input type="radio" name="r3" value="P" <?php echo $wanita; ?>>
                          <span class="checkround"></span>
                        </label>
                    </div>
                    <div class="form-group has-feedback">
                      <label>Tanggal Lahir</label>
                      <input type="Date" placeholder="Tanggal Lahir" name = "birtday" id = "birtday" class="form-control" value="<?php echo $memberinfo->tgllahir; ?>">
                    </div>
                    <div class="Form-group has-feedback">
                      <button class="btn btn-warning" id="btn_save_profile">Simpan</button>
                    </div>
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