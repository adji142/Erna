<script type="text/javascript">
$(function () {
	var form_mode = '';
	var EmailVar = '';
    $.ajaxSetup({
        beforeSend:function(jqXHR, Obj){
            var value = "; " + document.cookie;
            var parts = value.split("; csrf_cookie_token=");
            if(parts.length == 2)   
            Obj.data += '&csrf_token='+parts.pop().split(";").shift();
        }
    });

    $('#login').click(function () {
    	$('#login-modal').modal('show');
    });
    $('#Reg-header').click(function () {
    	$('#Reg-modal').modal('show');
    });
    $('#register').click(function () {
    	$('#login-modal').modal('toggle');
    	$('#Reg-modal').modal('show');
    });
    $('#login2').click(function () {
    	$('#Reg-modal').modal('toggle');
    	$('#login-modal').modal('show');
    });

    $(document).ready(function () {
      var confirmed = '';
      confirmed = $('#confirmed').val();
      // alert(confirmed);
      PopulatePost();
      if(confirmed != ''){
        Swal.fire({
            type: 'success',
            title: 'Horay..',
            text: 'Akun Kamu Sudah ter verifikasi, Silahkan login',
            // footer: '<a href>Why do I have this issue?</a>'
          }).then((result)=>{
            $('#login-modal').modal('show');
          });
      }
    });

    $('#goReg').submit(function (e) {
    	$('#btn_submit').text('Tunggu Sebentar...');
        $('#btn_submit').attr('disabled',true);

        e.preventDefault();
        var me = $(this);

        $.ajax({
        	type 	: 'post',
        	url 	: '<?=base_url()?>Auth/Auth_Login/reg_pro',
        	data 	: me.serialize(),
        	dataType : 'json',
        	success: function (response) {
        		if(response.success == true){
        			$EmailVar = response.return;
        			sendmail(response.return);
        			$('#Reg-modal').modal('toggle');
        			me[0].reset();

        			Swal.fire({
	                  type: 'success',
	                  title: 'Selamat !!!',
	                  html: 'Kamu sudah berhasil jadi member kami,<br> Kami mengirimkan kamu link verifikasi melalui email. Silahkan melakukan verifikasi<br>'+
	                  '<a href = "#" id = "resend">Klik disini </a> Jika belum menerima email.' 
	                });
        		}
        		else{
        			if (response.nessage == '500-NotMatch') {
        				Swal.fire({
			              type: 'error',
			              title: 'Woops...',
			              text: 'Data Gagal disimpan! Password tidak sama',
			              // footer: '<a href>Why do I have this issue?</a>'
			            });
			            $('#btn_submit').text('Register');
        				$('#btn_submit').attr('disabled',false);
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
        	}
        });
    });
    $('#quick-view-modal').on('hidden.bs.modal', function () {
      // alert('closing modals');
        $('.aa-product-view-slider').remove();
    });
    $('#quick-view-modal').on('show.bs.modal', function () {
      // alert($('#postid').val());

      var postid = $('#postid').val();
      var imagesmall = '';
      // begin slider all image
    // "<div class='image size-fixed scale-fit' style='background-image: url("+v.imagemain+");'>"+
      $.ajax({
        type: "post",
        url: "<?=base_url()?>SitePostController/GetPostbyID",
        data: {postid:postid},
        dataType: "json",
        success: function (response) {
          if(response.success == true){
            $.each(response.data,function (k,v) {
              $('#quick-slider').append(""+
                  "<div class='aa-product-view-slider'>" +
                    "<div class='simpleLens-gallery-container' id='demo-1'>"+
                      "<div class='simpleLens-container'>"+
                        "<div class='simpleLens-big-image-container'>"+
                          "<a class='simpleLens-lens-image' data-lens-image='"+resizeImage(v.imagemain,900,1024)+"'>"+
                            "<img src='"+resizeImage(v.imagemain,250,300)+"' class='simpleLens-big-image'>"+
                          "</a>"+
                        "</div>"+
                      "</div>"+
                      "<div class='simpleLens-thumbnails-container' id = 'tumbnail-post'>" +

                      "</div>"+
                    "</div>"+
                  "</div>"
                );

              
            });
          }
        }
      });

      $.ajax({
        type: "post",
        url: "<?=base_url()?>SitePostController/GetImagePost",
        data: {postid:postid},
        dataType: "json",
        success: function (response) {
          if(response.success == true){
            $.each(response.data,function (k,v) {
              $('#tumbnail-post').append(""+
                  "<a href='#' class='simpleLens-thumbnail-wrapper'" +
                    "data-lens-image='"+resizeImage(v.image,900,1024)+"'" +
                    "data-big-image='"+resizeImage(v.image,250,300)+"'>"+
                      "<div class='image size-fixed-mini scale-fit' style='background-image: url("+v.image+");'>"+
                        "<img src='"+v.image+"' width='45' height='55'>"+
                      "</div>"+
                  "</a>"
                );
            });
          }
        }
      });
    });

    $("#goLog").submit(function (e){
        $('#btn_login').text('Tunggu Sebentar...');
        $('#btn_login').attr('disabled',true);
        var account = $('#account').val();
        var secreet = $('#secreet').val();
        e.preventDefault();

        $.ajax({
            type: "post",
            url: "<?=base_url()?>Auth/Auth_Login/Pro_Login",
            data: {account:account,secreet:secreet},
            dataType: "json",
            success: function (response) {
                if(response.message=="L01"){
                    Swal.fire({
                      type: 'error',
                      title: 'Woops...',
                      text: 'Username atau password tidak cocok, Coba Lagi!',
                    });
                    $('#btn_login').text('Login');
                    $('#btn_login').attr('disabled',false);
                  }
                  else if(response.message=="L02"){
                    Swal.fire({
                      type: 'error',
                      title: 'Woops...',
                      text: 'User Tidak ditemukan atau belum terverifikasi!',
                    });
                    $('#btn_login').text('Login');
                    $('#btn_login').attr('disabled',false);
                  }
                else{
                  location.replace("<?=base_url()?>")
                }
            }

        });
    });
    $('#email').focusout(function(){
        
        var email = $('#email').val();
        if(email != ''){
          $.ajax({
            type: "post",
            url: "<?=base_url()?>Auth/Auth_Login/cek_mail",
            data: {email:email},
            dataType: "json",
            success: function (response) {
              if(response.success==false){
                var element = $('#email');
                element.closest('div.form-group')
                .removeClass('has-error')
                .addClass(response.message != 'true' ? 'has-error' : 'has-success')
                .find('.text-danger').remove();
                element.after('<p class="text-danger">Email Sudah pernah di daftarkan.</p>');
                $('#btn_submit').attr('disabled',true);
              }
              else
              {
                $('#email').closest('div.form-group').removeClass('has-error').find('.text-danger').remove();
                $('#btn_submit').attr('disabled',false);
              }
            }
          });
        }
      });
      // User ID
      $('#username').focusout(function(){
        
        var user = $('#username').val();
        if(user != ''){
          $.ajax({
            type: "post",
            url: "<?=base_url()?>Auth/Auth_Login/cek_UID",
            data: {user:user},
            dataType: "json",
            success: function (response) {
              if(response.success==false){
                var element = $('#username');
                element.closest('div.form-group')
                .removeClass('has-error')
                .addClass(response.message != 'true' ? 'has-error' : 'has-success')
                .find('.text-danger').remove();
                element.after('<p class="text-danger">Username Sudah pernah di daftarkan.</p>');
                $('#btn_submit').attr('disabled',true);
              }
              else
              {
                $('#username').closest('div.form-group').removeClass('has-error').find('.text-danger').remove();
                $('#btn_submit').attr('disabled',false);
              }
            }
          });
        }
      });
});
    function sendmail(email){
      var _email = email;
      var hash = $("input[name=csrf_test_name]").val();
      $.ajax({
        type: "post",
        url: "<?=base_url()?>Auth/Auth_Login/send_email",
        data: {'ver':_email,'map':'<?php echo $this->security->get_csrf_hash(); ?>'},
        dataType: "json",
        success: function (response) {
          if(response.success == false){
            console.log(response.message);
          }
        }
      });
    }
    function PopulatePost() {
      // $('ul.aa-product-catg').append('<li>An element</li>');
      var order = '';
      $.ajax({
        type: "post",
        url: "<?=base_url()?>SitePostController/GetPost",
        data: {order:order},
        dataType: "json",
        success: function (response) {
          if(response.success == true){
            $.each(response.data,function (k,v) {
              $('ul.aa-product-catg').append(""+
                "<li>" +
                  "<figure>" +
                    "<a class='aa-product-img' href='#'>"+
                      "<div class='image size-fixed scale-fit' style='background-image: url("+v.imagemain+");'>"+
                        "<img src='"+v.imagemain+"' alt='"+v.tittle+"' width='400' height='400'>"+
                      "</div>"+
                    "</a>" +
                    "<a class='aa-add-card-btn' href='#'><span class='fa fa-shopping-cart'></span>Add To Cart</a>" +
                    "<figcaption>" +
                      "<h4 class='aa-product-title'><a href='#'>"+v.tittle+"</a></h4>" +
                      "<span class='aa-product-price'>Rp. "+formatNumber(v.price)+"</span><span class='aa-product-price'><del>Rp. "+formatNumber(v.price)+"</del></span>" +
                      "<p class='aa-product-descrip'>"+v.description+"</p>"+
                    "</figcaption>"+
                  "</figure>" +
                  "<div class='aa-product-hvr-content'>" +
                    "<a href='#' data-toggle2='tooltip' data-placement='top' title='Quick View' data-toggle='modal' data-target='#quick-view-modal' onclick = 'PostID("+v.id+")'><span class='fa fa-search'></span></a>" +
                  "</div>"+
                "</li>"
                );
            });
          }
          else{
            $('ul.aa-product-catg').append('<li>Post Not available Yet</li>');
          }
        }
      });
    }
    function formatNumber(num) {
      return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
    }
    function PostID(argument) {
      // alert(argument);
      // postid = argument;
      $('#postid').val(argument);
    }
    function resizeImage(base64Str,width1,height1) {

      var img = new Image();
      img.src = base64Str;
      var canvas = document.createElement('canvas');
      var MAX_WIDTH = width1;
      var MAX_HEIGHT = height1;
      var width = img.width;
      var height = img.height;

      if (width > height) {
        if (width > MAX_WIDTH) {
          height *= MAX_WIDTH / width;
          width = MAX_WIDTH;
        }
        else{
          // height = MAX_HEIGHT;
          // width = MAX_WIDTH;
        }
      } else {
        if (height > MAX_HEIGHT) {
          width *= MAX_HEIGHT / height;
          height = MAX_HEIGHT;
        }
        else{
          // width = MAX_WIDTH;
          // height = MAX_HEIGHT;
        }
      }
      canvas.width = width;
      canvas.height = height;
      var ctx = canvas.getContext('2d');
      ctx.drawImage(img, 0, 0, width, height);
      // console.log(canvas.toDataURL());
      return canvas.toDataURL();
  }
</script>