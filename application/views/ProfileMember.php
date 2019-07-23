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
            This is akun
        </div>
        </div>
    </div>
<?php
require_once(APPPATH."views/part/sidebar.php");
require_once(APPPATH."views/part/Subscribe.php");
  require_once(APPPATH."views/part/Footer.php");
  require_once(APPPATH."views/part/Script.php");
?>