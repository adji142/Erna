<script type="text/javascript">
$(function () {
	var form_mode = '';
	var EmailVar = '';
  var globalID;
  var xpostid;
  var global_User;

  var cekongkir_provinsi = '';
  var cekongkir_kota = '';
    $.ajaxSetup({
        beforeSend:function(jqXHR, Obj){
            var value = "; " + document.cookie;
            var parts = value.split("; csrf_cookie_token=");
            if(parts.length == 2)   
            Obj.data += '&csrf_token='+parts.pop().split(";").shift();
        }
    });
    $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : false,
      'autoWidth'   : true
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
      var userid = $('#userxid').val();
      var anonimuser = $('#anonimuser').val();
      var fixid;

      if(userid == ''){
        fixid = anonimuser;
      }
      else{
        fixid = userid;
      }
      // alert($('#anonimuser').val());
      // PopulatePost('');
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
      // pagination

      $('#pagination').on('click','a',function(e){
         e.preventDefault(); 
         var pageno = $(this).attr('data-ci-pagination-page');
         loadPagination(pageno,'',globalID);
       });

      loadPagination(0,'',globalID);

      ShowCart(fixid);
      // $('#count_cart').val('5');
      // ChangeUser(anonimuser,userid);

        // var idaddr = 0;
        // var link = 'kota_RO';

        // $.ajax({
        //   type: "post",
        //   url: "<?=base_url()?>SitePostController/GetInfoAddr",
        //   data: {link:link,idaddr:idaddr},
        //   dataType: "json",
        //   success: function (response) {
        //     if(response.success == true){
        //     //   $('#Provinsi').empty();
        //     //   $('#Provinsi').append("<option value='0'>Pilih Provinsi</option>");
        //       $.each(response.data,function (k,v) {
        //         if (link == 'prov') {
        //           SaveProvRajaONgkir(v.province_id,v.province);
        //         }
        //         else{
        //           SaveKotaRajaONgkir(v.city_id,v.city_name,v.type,v.postal_code);
        //         }
        //         // $('#Provinsi').append(""+
        //         //   "<option value='"+v.province_id+"'>"+v.province+"</option>"
        //         // );
        //       });
        //     }
        //   }
        // });

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
                  "<a href='#' class='simpleLens-thumbnail-wrapper' " +
                    "data-lens-image='"+resizeImage(v.image,900,1024)+"' " +
                    "data-big-image='"+resizeImage(v.image,250,300)+"'> "+
                      "<div class='image size-fixed-mini scale-fit' style='background-image: url("+v.image+");'> "+
                        "<img src='"+resizeImage(v.image,45,55)+"'> "+
                      "</div> "+
                  "</a>"
                );
              console.log(resizeImage(v.image,45,55));
              // console.log(v.image);
              alert(resizeImage(v.image,45,55));
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

        var userid = $('#userxid').val();
        var anonimuser = $('#anonimuser').val();

        e.preventDefault();

        $.ajax({
            type: "post",
            url: "<?=base_url()?>Auth/Auth_Login/Pro_Login",
            data: {account:account,secreet:secreet,anonimuser:anonimuser},
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

      $('#SortPost').change(function () {
        // alert($('#SortPost').val());
        // 
        $('ul.aa-product-catg').empty();
        // PopulatePost($('#SortPost').val());
        loadPagination(0,$('#SortPost').val(),globalID);
      });
      $('.submenu_populate').click(function () {
        var id = $(this).attr("id");
        globalID = id;
        // alert(id);
        loadPagination(0,'',globalID);
        $('html, body').animate({
          scrollTop:$('#scroll-hire').offset().top
        },'slow');
      });
      $('.category-main').click(function () {
        var id = $(this).attr("id");
        globalID = id;
        // alert(id);
        loadPagination(0,'',globalID);
        $('html, body').animate({
          scrollTop:$('#scroll-hire').offset().top
        },'slow');
      });
      // scrolling
      $(window).scroll(function () {
        if($(window).scrollTop() + $(window).height() >= $(document).height()){
          var LastId = $('.post-id:last').attr('id');
          // alert(LastId)
          // PopulatePost_v2(LastId);
        }
      });

      $('#frmsearch').submit(function(e) {
        e.preventDefault();
        var me = $(this);

        var id = $('#search').val();
        globalID = id;
        // alert(id);
        loadPagination(0,'','SC'+globalID);
        $('html, body').animate({
          scrollTop:$('#scroll-hire').offset().top
        },'slow');
      });

      $('#Checkout').click(function () {
        // alert('');
        var userid = $('#userxid').val();

        if(userid == ''){
          $('#login-modal').modal('show');
        }
        else{
          // alert('sudah login');
        }
      });
      
      // info kota
      $('#Provinsi').change(function () {
        var idaddr = $('#Provinsi').val();
        var link = 'kota';

        var exploded = idaddr.split('|');

        // var x = exploded[1];
        cekongkir_provinsi = exploded[1];
        idaddr = exploded[0];


        $.ajax({
          type: "post",
          url: "<?=base_url()?>SitePostController/GetInfoAddr",
          data: {link:link,idaddr:idaddr},
          dataType: "json",
          success: function (response) {
            if(response.success == true){
              $('#kota').empty();
              $('#kota').append(""+
                "<option value='0'>Pilih Kota</option>"
              );
              $.each(response.data,function (k,v) {
                $('#kota').append(""+
                  "<option value='"+v.id+"|"+v.id_RO+"'>"+v.name+"</option>"
                );
              });
            }
          }
        });
      });

      $('#kota').change(function () {
        var idaddr = $('#kota').val();
        var link = 'kec';

        var exploded = idaddr.split('|');

        cekongkir_kota = exploded[1];
        idaddr = exploded[0];

        $.ajax({
          type: "post",
          url: "<?=base_url()?>SitePostController/GetInfoAddr",
          data: {link:link,idaddr:idaddr},
          dataType: "json",
          success: function (response) {
            if(response.success == true){
              $('#kec').empty();
              $('#kec').append(""+
                "<option value='0'>Pilih Kecamatan</option>"
              );
              $.each(response.data,function (k,v) {
                $('#kec').append(""+
                  "<option value='"+v.id+"'>"+v.name+"</option>"
                );
              });
            }
          }
        });
      });
      $('#kec').change(function () {
        var idaddr = $('#kec').val();
        var link = 'kel';

        $.ajax({
          type: "post",
          url: "<?=base_url()?>SitePostController/GetInfoAddr",
          data: {link:link,idaddr:idaddr},
          dataType: "json",
          success: function (response) {
            if(response.success == true){
              $('#kel').empty();
              $('#kel').append(""+
                "<option value='0'>Pilih Kelurahan</option>"
              );
              $.each(response.data,function (k,v) {
                $('#kel').append(""+
                  "<option value='"+v.id+"'>"+v.name+"</option>"
                );
              });
            }
          }
        });
      });
      $('#jasaxpdc').change(function () {
        var xpdc = $('#jasaxpdc').val();
        $.ajax({
          type: "post",
          url: "<?=base_url()?>SitePostController/cekongkir",
          data: {cekongkir_provinsi:cekongkir_provinsi,cekongkir_kota:cekongkir_kota,xpdc:xpdc},
          dataType: "json",
          success: function (response) {
            if(response.success == true){
              $('#cekongkir_TableInfo').empty();
              $('#det_ship').empty();
              // $.each(response.origin_det,function (k,v) {
                $('#det_ship').append("<strong>Dari:<br></strong>"+response.origin_det.city_name+" ,"+response.origin_det.province+"<br>");
              // });
              // $.each(response.dest_det,function (k,v) {
                $('#det_ship').append("<strong>ke:<br></strong>"+response.dest_det.city_name+" ,"+response.dest_det.province+"<br>");
              // });
              var i;
              $('#cekongkir_TableInfo').append(""+
                "<option value='0'>Pilih Service Pengiriman</option>"
              );
              for (i =0; i< response.data.length ;i++) {
                // console.log(response.data[i]);
                $('#cekongkir_InfoExp').empty();
                $('#cekongkir_InfoExp').append("<center><h3>"+response.data[i].name+"</h3></center>");
                var j;
                for (j =0;j< response.data[i]['costs'].length;j++) {
                  // console.log(response.data[i]['costs'][j]);
                  // $('#cekongkir_TableInfo').append(""+
                  //   "<option value='"+response.data[i]['costs'][j].service+"|'>"+response.data[i]['costs'][j].service+" | "+response.data[i]['costs'][j].description+"</option>"
                  //   );
                  // info service
                  var k;
                  for (k=0;k< response.data[i]['costs'][j]['cost'].length;k++) {
                    // console.log(response.data[i]['costs'][j]['cost'][k].value);
                    $('#cekongkir_TableInfo').append(""+
                    "<option value='"+response.data[i]['costs'][j].service+"|"+response.data[i]['costs'][j]['cost'][k].value+"'>"+response.data[i]['costs'][j].service+" | "+response.data[i]['costs'][j].description+" | "+formatNumber(response.data[i]['costs'][j]['cost'][k].value)+"</option>"
                    );
                    // info harga
                  }

                }
              }
              // $.each(response.data,function (k,v) {
              //   $.each(v['costs'][0],function (x,y) {
              //     console.log(y);
              //   });
              // });
            }
          }
        });
      });

      $('#cekongkir_TableInfo').change(function () {
        var srv = $('#cekongkir_TableInfo').val();

        var exploded = srv.split('|');

        var jnssrv = exploded[0];
        var value = exploded[1];
        
        alert(jnssrv+"-"+value);
        if (value > 0 && jnssrv != '') {
          $('#ongkir_').empty();
          $('#ongkir_').append(formatNumber(value));
          // alert($('#grandtotal').val());
          var gt = $('#grandtotal').val();

          $('#grandtotallabel').empty();
          $('#grandtotal').val('0');
          alert($('#grandtotal').val());
          // set value
          $('#grandtotal').val(parseInt(gt)+parseInt(value));
          $('#grandtotallabel').append(formatNumber(parseInt(gt)+parseInt(value)));
          alert($('#grandtotal').val());
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
    function loadPagination(pagno,sort,cat){
         $.ajax({
           url: "<?=base_url()?>SitePostController/loadRecord",
           type: 'post',
           data:{pagno:pagno,sort:sort,cat:cat},
           dataType: 'json',
           success: function(response){
              $('#pagination').html(response.pagination);
              createTable(response.result,response.row);
           }
         });
       }
    function createTable(result,sno){
         sno = Number(sno);
         $('ul.aa-product-catg').empty();
         for(index in result){
            sno+=1;
            var badge = '';
            var afterdisc = '';
            var normal ='';
            if (result[index].promomember == 1) {
              badge = "<span class='aa-badge aa-sale' href='#'>Member Benefit! Up To ("+Math.round(result[index].DISC,1)+" %)</span>";
              // alert(CekDiscount());
              afterdisc = "<span class='aa-product-price'>Rp. "+formatNumber(result[index].price - ((result[index].DISC/100)*result[index].price))+"</span>";
              normal = "<span class='aa-product-price'><del>Rp. "+formatNumber(result[index].price)+"</del></span>";
            }
            else{
              badge = '';
              afterdisc = "<span class='aa-product-price'>Rp. "+formatNumber(result[index].price)+"</span>";
              normal = "<span class='aa-product-price'><del></del></span>";
            }
            $('ul.aa-product-catg').append(""+
              "<div class = 'post-id' id = '"+result[index].id+"'>"+
              "<input type ='hidden' id = 'indexpostid' value = '"+result[index].id+"' />"+
              "<li>" +
                "<figure>" +
                  "<a class='aa-product-img' href='<?php echo base_url('detail'); ?>/"+result[index].id+"' style='cursor:pointer;' id = 'gotosingle' >"+
                    "<div class='image size-fixed scale-fit' style='background-image: url("+result[index].imagemain+");'>"+
                      "<img src='"+result[index].imagemain+"' alt='"+result[index].tittle+"' width='400' height='400'>"+
                    "</div>"+
                  "</a>" +
                  "<a class='aa-add-card-btn disabled' href='#' id='addcart_direct' onclick='add_cart("+result[index].id+")'><span class='fa fa-shopping-cart'></span>Add To Cart</a>" +
                  "<figcaption>" +
                    "<h4 class='aa-product-title'><a href='#'>"+result[index].tittle+"</a></h4>" +
                    afterdisc+"" +normal+
                    "<p class='aa-product-descrip'>"+result[index].description+"</p>"+
                  "</figcaption>"+
                "</figure>" +
                "<div class='aa-product-hvr-content'>" +
                  "<a href='#' data-toggle2='tooltip' data-placement='top' title='Quick View' data-toggle='modal' data-target='#quick-view-modal' onclick = 'PostID("+result[index].id+")'><span class='fa fa-search'></span></a>" +
                "</div>"+
                badge +
              "</li> </div>"
              );

          }
        }

    function CekDiscount() {
      var discount = 0;
      $.ajax({
        type: "post",
        url: "<?=base_url()?>SitePostController/GetPromo",
        data: {'order':'order'},
        dataType: "json",
        success: function (response) {
          if (response.success == true) {
            
            $.each(response.data,function (k,v) {
              discount = v.benefitdiscount;
            });
            // console.log(discount);
            return discount;
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
      // var width = img.width;
      // var height = img.height;

      // if (width > height) {
      //   if (width > MAX_WIDTH) {
      //     height *= MAX_WIDTH / width;
      //     width = MAX_WIDTH;
      //   }
      //   else{
      //     // height = MAX_HEIGHT;
      //     // width = MAX_WIDTH;
      //   }
      // } else {
      //   if (height > MAX_HEIGHT) {
      //     width *= MAX_HEIGHT / height;
      //     height = MAX_HEIGHT;
      //   }
      //   else{
      //     // width = MAX_WIDTH;
      //     // height = MAX_HEIGHT;
      //   }
      // }

      canvas.width = MAX_WIDTH;
      canvas.height = MAX_HEIGHT;
      var ctx = canvas.getContext('2d');
      ctx.drawImage(img, 0, 0, MAX_WIDTH, MAX_HEIGHT);
      // console.log(canvas.toDataURL());
      return canvas.toDataURL();
  }
  function add_cart(xpostid) {
    $('#addcart_direct').attr('disabled',true);
    var id_post = xpostid;
    var userid = $('#userxid').val();
    var anonimuser = $('#anonimuser').val();
    var fixid;

    if(userid == ''){
      fixid = anonimuser;
    }
    else{
      fixid = userid;
    }

    $.ajax({
      type: "post",
      url: "<?=base_url()?>SitePostController/CartSave",
      data: {id_post:id_post,fixid:fixid},
      dataType: "json",
      success: function (response) {
        if(response.success == false){
          console.log(response.message);
          Swal.fire({
            type: 'error',
            title: 'Woops...',
            text: response.message,
          });
        }
        $('#addcart_direct').attr('disabled',false);

        // load count cart
        ShowCart(fixid)
        // load cart
      }
    });
  }

  function ShowCart(userid) {
    $('#cart_box').empty();
    $('#count_cart').empty();
    global_User = userid;
    $.ajax({
      type: "post",
      url: "<?=base_url()?>SitePostController/CartPopulate",
      data: {userid:userid},
      dataType: "json",
      success: function (response) {
        if(response.success == true){
          // alert(response.count);
          $('#count_cart').append(response.count);
          // if (response.count > 0) {
          //   
          // }
          // else{
          //   $('#count_cart').append(13);
          // }
          if (response.count > 0) {
            $.each(response.data,function (k,v) {
              $('#cart_box').append(""+
                "<li>"+
                  "<a class='aa-cartbox-img' href='#'><img src='"+v.image+"' alt='"+v.tittle+"'></a>"+
                    "<div class='aa-cartbox-info'>"+
                      "<h4><a href='#'>"+v.tittle+"</a></h4>"+
                      "<button id ='dec' class = 'btn btn-primary' onclick='decrease("+v.id+")'>-</button><input type = 'Number' min = '0' max = '1000' maxlength = '4' id ='"+v.id+"' class ='btn ordr' value = '"+v.qtyorder+"' onClick = 'ShowModals("+v.id+","+v.qtyorder+")' readonly><button id ='inc' class = 'btn btn-mini' onclick='increase("+v.id+")'>+</button>"+
                      "<p>"+v.qtyorder+" x Rp. "+formatNumber(v.pricenet)+"</p>"+
                    "</div>"+
                  "<a class='aa-remove-product remove-cart' href='#' onclick='remove_cart("+v.id+")'><span class='fa fa-times'></span></a>"+
                "</li>"
              );
              // $('#memberopt').val(v.idsetingmember).change();
              // console.log(v.idsetingmember);
              var selected;
              selected = v.idsetingmember;
              console.log(selected);

              $('#memberopt option[value='+v.idsetingmember+']').attr('selected','selected');
              // $("#memberopt").selectedIndex = 1;
              // $('#memberopt').prop('selectedIndex', selected.toString()); 
              // alert($('#sel1'));
              // if()
            });
            $('#cart_box').append(""+
              "<li>"+
                "<span class='aa-cartbox-total-title'>"+
                  "Total" +
                "</span>"+
                "<span class='aa-cartbox-total-price'>"+
                  "Rp. "+formatNumber(response.sum)+
                "</span>"+
              "</li>"
            );
          }
          // console.log(response.data);
        }
        else{
          $('#count_cart').append(0);
        }
      }
    });
  }

  function changeMember(postid,cartid) {
      // console.log(global_User+" ini user id");
      // console.log(postid+" ini post id");
      // console.log($('#memberopt').val()+" ini post id");
      var memberid = $('#memberopt').val();
      $.ajax({
        type: "post",
        url: "<?=base_url()?>SitePostController/Update_Price",
        data: {global_User:global_User,postid:postid,memberid:memberid,cartid:cartid},
        dataType: "json",
        success:function (response) {
          if (response.success == true) {
            ShowCart(global_User);
          }
          else{
            Swal.fire({
              type: 'error',
              title: 'Whoops',
              text: 'Something Wrong, '+response.message,
              // footer: '<a href>Why do I have this issue?</a>'
            });
          }
        }
      });
  }
  function remove_cart(id) {
    // alert(id);
    var userid = $('#userxid').val();
    var anonimuser = $('#anonimuser').val();
    var fixid;

    if(userid == ''){
      fixid = anonimuser;
    }
    else{
      fixid = userid;
    }
    $.ajax({
      type: "post",
      url: "<?=base_url()?>SitePostController/Rem_Cart",
      data: {id:id},
      dataType: "json",
      success: function (response) {
        if(response.success == true){
          ShowCart(fixid);
        }
        else{
          Swal.fire({
            type: 'error',
            title: 'Whoops',
            text: 'Something Wrong, '+response.message,
            // footer: '<a href>Why do I have this issue?</a>'
          });
        }
      }
    });
  }
  function ChangeUser(userold,usernew) {
    $.ajax({
      type: "post",
      url: "<?=base_url()?>SitePostController/cekuser",
      data: {userold:userold,usernew:usernew},
      dataType: "json",
      success: function (response) {
        if(response.success == true){
          ShowCart(fixid);
        }
        // else{
        //   Swal.fire({
        //     type: 'error',
        //     title: 'Whoops',
        //     text: 'Something Wrong, '+response.message,
        //     // footer: '<a href>Why do I have this issue?</a>'
        //   });
        // }
      }
    });
  }
  function gotosingle(id) {
    // alert('');
    window.location.href = "<?php echo base_url('detail'); ?>"+"/"+id;
  }
  function increase(id) {
    $('#'+id).val(parseInt($('#'+id).val())+1);

    var Qty = $('#'+id).val();
    var cartid = id;
    
      $.ajax({
        type: "post",
        url: "<?=base_url()?>SitePostController/Update_Price",
        data: {Qty:Qty,cartid:cartid},
        dataType: "json",
        success:function (response) {
          if (response.success == true) {
            ShowCart(global_User);
          }
          else{
            Swal.fire({
              type: 'error',
              title: 'Whoops',
              text: 'Something Wrong, '+response.message,
              // footer: '<a href>Why do I have this issue?</a>'
            });
          }
        }
      });
  }
  function decrease(id) {
    if(parseInt($('#'+id).val()) > 1){
      $('#'+id).val(parseInt($('#'+id).val())-1);

      var Qty = $('#'+id).val();
      var cartid = id;
      
        $.ajax({
          type: "post",
          url: "<?=base_url()?>SitePostController/Update_Price",
          data: {Qty:Qty,cartid:cartid},
          dataType: "json",
          success:function (response) {
            if (response.success == true) {
              ShowCart(global_User);
            }
            else{
              Swal.fire({
                type: 'error',
                title: 'Whoops',
                text: 'Something Wrong, '+response.message,
                // footer: '<a href>Why do I have this issue?</a>'
              });
            }
          }
        });
    }
  }
  function countingpraise() {
    
    $('#btn_TambahQty').text('Tunggu Sebentar...');
    $('#btn_TambahQty').attr('disabled',true);
    var Qty = $('#JmlOrder').val();
      var cartid = $('#idaddcart').val();
        $.ajax({
          type: "post",
          url: "<?=base_url()?>SitePostController/Update_Price",
          data: {Qty:Qty,cartid:cartid},
          dataType: "json",
          success:function (response) {
            if (response.success == true) {
              $('#cart_box').empty();
              $('#count_cart').empty();
              $('#addqty-modal').modal('toggle');
              ShowCart(global_User);
            }
            else{
              Swal.fire({
                type: 'error',
                title: 'Whoops',
                text: 'Something Wrong, '+response.message,
                // footer: '<a href>Why do I have this issue?</a>'
              });
            }
          }
        });
  }
  function ShowModals(id,qtyorder) {
    $('#btn_TambahQty').text('Update');
    $('#btn_TambahQty').attr('disabled',false);

    $('#idaddcart').val(id);
    $('#JmlOrder').val(qtyorder);
    $('#addqty-modal').modal('show');
  }
  function SaveProvRajaONgkir(id,prov) {
    var tipe = 'prov';
    $.ajax({
      type: "post",
      url: "<?=base_url()?>SitePostController/SaveInfo",
      data: {id:id,prov:prov,tipe:tipe},
      dataType: "json",
      success:function (response) {
        if (response.success == true) {
          console.log('done');
        }
        else{
          console.log('fail');
        }
      }
    });
  }
  function SaveKotaRajaONgkir(city_id,city_name,type,postal_code) {
    var tipe = 'kota';
    $.ajax({
      type: "post",
      url: "<?=base_url()?>SitePostController/SaveInfo",
      data: {city_id:city_id,city_name:city_name,type:type,postal_code:postal_code,tipe:tipe},
      dataType: "json",
      success:function (response) {
        if (response.success == true) {
          console.log('done');
        }
        else{
          console.log('fail');
        }
      }
    });
  }
</script>