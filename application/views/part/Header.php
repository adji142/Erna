<!DOCTYPE html>
<style>
.image {
  display: inline-block;
  margin: 4px;
  border: 1px solid #CCCCCC;
  background-position: center center;
  background-repeat: no-repeat;
}
.image.size-fixed {
  width: 250px;
  height: 300px;
}
.image.size-fixed-mini {
  width: 45px;
  height: 55px;
}
.image.size-fixed-XL {
  width: 900px;
  height: 1024px;
}
.image.size-fixed-Med {
  width: 250px;
  height: 300px;
}
.image.size-fluid {
  padding-top: 15%;
  width: 20%;
}
.image.scale-fit {
  background-size: contain;
}
.image.scale-fill {
  background-size: cover;
}
.image img {
  display: none;
}

</style>
<?php
  $confirmed = $this->session->userdata('confirmed');
  $flag = '';
  // User session

  $active = "";
  $output = "";
  $imageprofile = "";
  $user_id = $this->session->userdata('userid');
  $imageprofileLarge = "";

  if ($confirmed == true) {
    echo "
      <input type ='hidden' id = 'confirmed' value = 'confirmed' />
    ";
    // $flag = 'confirmed';
    $this->session->unset_userdata('confirmed');
  }
  else{
    echo "
      <input type ='hidden' id = 'confirmed' value = '' />
    ";
  }


  // user condition

  if($user_id==""){
    $output = "
    <li><a href='' data-toggle='modal' id='login'>Login</a></li>
    <li><a href='' data-toggle='modal' id='Reg-header'>Register</a></li>
    ";
  }
  else{
    $user_info = $this->GlobalVar->UserInfo($user_id);
    $username = substr($user_info->row()->username,0,1);

    if($user_info->row()->image == null){
      if(!preg_match("/^[a-zA-Z]*$/",$username)){
        $output = "
          <li class='hidden-xs'><a href='cart.html'>My Cart</a></li>
          <li class='hidden-xs'><a href='checkout.html'>Checkout</a></li>
          <li>
            <img src = '".base_url()."Assets/Img/ICO/1.png' class = 'avatar-sm' >
            <a href = '".base_url('Profile/Akun')."'>".$user_info->row()->username."</a>
          </li>
          <li><a href = '".base_url('logout')."'>Logout </a></li>
        ";
        $imageprofile="
          <img src = '".base_url()."Assets/Img/ICO/1.png' class = 'avatar-med' id = 'ImgProfile'>
        ";
        $imageprofileLarge = "
          <img src = '".base_url()."Assets/Img/ICO/1.png' id = 'ImgProfile' class='avatar'>
          
        ";
      }
      else{
        $output = "
          <li class='hidden-xs'><a href='cart.html'>My Cart</a></li>
          <li class='hidden-xs'><a href='checkout.html'>Checkout</a></li>
          <li>
            <img src = '".base_url()."Assets/Img/ICO/".strtoupper($username).".png' class = 'avatar-sm'>
            <a href = '".base_url('Profile/Akun')."'>".$user_info->row()->username."</a>
          </li>
          <li><a href = '".base_url('logout')."'>Logout </a></li>
        ";
        $imageprofile = "
          <img src = '".base_url()."Assets/Img/ICO/".strtoupper($username).".png' class = 'avatar-med' id = 'ImgProfile'>
        ";
        $imageprofileLarge = "
          <img src = '".base_url()."Assets/Img/ICO/".strtoupper($username).".png' id = 'ImgProfile' class ='avatar'>
        ";
      }
      
    }
  }
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Daily Shop | Home</title>
    
    <!-- Font awesome -->
    <link href="<?php echo base_url();?>Assets/css/font-awesome.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>Assets/css/bootstrap.css" rel="stylesheet">   
    <!-- SmartMenus jQuery Bootstrap Addon CSS -->
    <link href="<?php echo base_url();?>Assets/css/jquery.smartmenus.bootstrap.css" rel="stylesheet">
    <!-- Product view slider -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>Assets/css/jquery.simpleLens.css">    
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>Assets/css/slick.css">
    <!-- price picker slider -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>Assets/css/nouislider.css">
    <!-- Theme color -->
    <link id="switcher" href="<?php echo base_url();?>Assets/css/theme-color/default-theme.css" rel="stylesheet">
    <!-- <link id="switcher" href="css/theme-color/bridge-theme.css" rel="stylesheet"> -->
    <!-- Top Slider CSS -->
    <link href="<?php echo base_url();?>Assets/css/sequence-theme.modern-slide-in.css" rel="stylesheet" media="all">

    <!-- Main style sheet -->
    <link href="<?php echo base_url();?>Assets/css/style.css" rel="stylesheet">    

    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  

  </head>
  <body> 
   <!-- wpf loader Two -->
    <!-- div id="wpf-loader-two">          
      <div class="wpf-loader-two-inner">
        <span>Loading</span>
      </div>
    </div>  -->
    <!-- / wpf loader Two -->       
  <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
  <!-- END SCROLL TOP BUTTON -->


  <!-- Start header section -->
  <header id="aa-header">
    <!-- start header top  -->
    <div class="aa-header-top">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-top-area">
              <div class="aa-header-top-right">
                <ul class="aa-head-top-nav-right">
                  <!-- <li class="hidden-xs"><a href="cart.html">My Cart</a></li>
                  <li class="hidden-xs"><a href="checkout.html">Checkout</a></li>
                  <li><a href="" data-toggle="modal" id="login" >Login</a></li>
                  <li><a href="" data-toggle="modal" id="Reg-header" >Register</a></li> -->
                  <?php echo $output;?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header top  -->

    <!-- start header bottom  -->
    <div class="aa-header-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-bottom-area">
              <!-- logo  -->
              <div class="aa-logo">
                <!-- Text based logo -->
                <a href="index.html">
                  <span class="fa fa-shopping-cart"></span>
                  <p>daily<strong>Shop</strong> <span>Your Shopping Partner</span></p>
                </a>
                <!-- img based logo -->
                <!-- <a href="index.html"><img src="img/logo.jpg" alt="logo img"></a> -->
              </div>
              <!-- / logo  -->
               <!-- cart box -->
              <div class="aa-cartbox">
                <a class="aa-cart-link" href="#">
                  <span class="fa fa-shopping-basket"></span>
                  <span class="aa-cart-title">SHOPPING CART</span>
                  <span class="aa-cart-notify">2</span>
                </a>
                <div class="aa-cartbox-summary">
                  <ul>
                    <li>
                      <a class="aa-cartbox-img" href="#"><img src="img/woman-small-2.jpg" alt="img"></a>
                      <div class="aa-cartbox-info">
                        <h4><a href="#">Product Name</a></h4>
                        <p>1 x $250</p>
                      </div>
                      <a class="aa-remove-product" href="#"><span class="fa fa-times"></span></a>
                    </li>
                    <li>
                      <a class="aa-cartbox-img" href="#"><img src="img/woman-small-1.jpg" alt="img"></a>
                      <div class="aa-cartbox-info">
                        <h4><a href="#">Product Name</a></h4>
                        <p>1 x $250</p>
                      </div>
                      <a class="aa-remove-product" href="#"><span class="fa fa-times"></span></a>
                    </li>                    
                    <li>
                      <span class="aa-cartbox-total-title">
                        Total
                      </span>
                      <span class="aa-cartbox-total-price">
                        $500
                      </span>
                    </li>
                  </ul>
                  <a class="aa-cartbox-checkout aa-primary-btn" href="checkout.html">Checkout</a>
                </div>
              </div>
              <!-- / cart box -->
              <!-- search box -->
              <div class="aa-search-box">
                <form action="">
                  <input type="text" name="" id="" placeholder="Search here ex. 'man' ">
                  <button type="submit"><span class="fa fa-search"></span></button>
                </form>
              </div>
              <!-- / search box -->             
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header bottom  -->
  </header>
  <!-- / header section -->
  <!-- menu -->
  <section id="menu">
    <div class="container">
      <div class="menu-area">
        <!-- Navbar -->
        <div class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>          
          </div>
          <div class="navbar-collapse collapse">
            <!-- Left nav -->
            <ul class="nav navbar-nav">
              <li><a href="<?php echo base_url()?>">Home</a></li>
                <?php
              // Get Header
                  $headerLv1 = $this->ModelsExecuteMaster->FindData(array('parent'=>0, 'tglpasif'=>null),'categories');
                  foreach ($headerLv1->result() as $key) :
                    $parent = $key->id;
                    $headerlv2 = $this->ModelsExecuteMaster->FindData(array('parent'=>$parent, 'tglpasif'=>null),'categories');
                ?>
              <li><a href="#"><?= $key->category ;?> <span class="caret"></span></a>
                <ul class="dropdown-menu"> 
                  <?php foreach ($headerlv2->result() as $sub) :?>
                    <li><a href="<?php echo base_url().'cat/'.strtolower(str_replace(' ', '', $sub->category));?>"><?= $sub->category; ?></a></li>
                  <?php endforeach; ?>
                </ul>
              </li>
              <?php endforeach; ?>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>       
    </div>
  </section>
  <!-- / menu -->
  <!-- Start slider -->
  <section id="aa-slider">
    <div class="aa-slider-area">
      <div id="sequence" class="seq">
        <div class="seq-screen">
          <ul class="seq-canvas">
            <!-- single slide item -->
              <!-- Getting Image -->
              <?php
                $GetBanner = $this->ModelsExecuteMaster->FindData(array('tglpasif'=>null),'sitebanner');
                foreach ($GetBanner->result() as $ban) {
                  echo "
                  <li>
                    <div class='seq-model'>
                      <img data-seq src='".$ban->image."' alt='".$ban->hightlight."' />
                    </div>
                    <div class='seq-title'>
                      <span data-seq>".$ban->hightlight."</span>
                      <h2 data-seq>".$ban->title."</h2>
                      <p data-seq>".$ban->subtitle."</p>
                    </div>
                  </li>
                  ";
                }
              ?>
          </ul>
        </div>
        <!-- slider navigation btn -->
        <fieldset class="seq-nav" aria-controls="sequence" aria-label="Slider buttons">
          <a type="button" class="seq-prev" aria-label="Previous"><span class="fa fa-angle-left"></span></a>
          <a type="button" class="seq-next" aria-label="Next"><span class="fa fa-angle-right"></span></a>
        </fieldset>
      </div>
    </div>
  </section>
  <!-- / slider -->