$(document).ready(function(){

   $('.provinces_more').click(function(){
         $('.provinces_more_wrap').toggle('medium');
      });
   $('.comments_tab_fb').click(function(){
       $('.comments_tab div').removeClass('active');
       $(this).addClass('active');
       $('.comments_main_gg').css({'z-index':'100','position':'absolute'});
       $('.comments_main_fb').css({'z-index':'1000','position':'relative'});
   }); 
   $('.comments_tab_gg').click(function(){
       $('.comments_tab div').removeClass('active');
       $(this).addClass('active');
       $('.comments_main_fb').css({'z-index':'100','position':'absolute'});
       $('.comments_main_gg').css({'z-index':'1000','position':'relative'});
   });
   $('.wrap_popup').height($(document).height());
   /* js phục vụ chức năng đánh giá phim */
   $('.vote_wrap ul li').hover(function(){
      //var point = $(this).attr('point');
      $(this).addClass('li_vote');
      $(this).prevAll().addClass('li_vote');
      $(this).nextAll().addClass('li_novote');
      //$('.point_x').html(point);
      //$('.point_x_wrap').removeClass('hide');
      },
      function(){
         //var your_point = $(this).attr('your_point');
         //if(your_point == "0") your_point == 'x';
         $('.vote_wrap ul li').removeClass('li_vote');
         $('.vote_wrap ul li').removeClass('li_novote');
         //$('.point_x').html(your_point);
         //$('.point_x_wrap').addClass('hide');
   });
   $('.btn-search').click(function(event){
      event.preventDefault();
      if(!$(this).parent().hasClass('form-digg-search_active')){$(this).parent().addClass('form-digg-search_active')} 
      else {$(this).parent().removeClass('form-digg-search_active')}
   });
   $("body").click(function(e){
      if(e.target.className != "btn-search" && e.target.className != "form-digg-search-input"){
         $('.form-digg-search').removeClass('form-digg-search_active')
      }
   })


});
function loadAjax(params,type,option){
    var _option = {
        beforeSend:function(){},
        success:function(){}
    }
    $.extend(_option,option);
    $.ajax({
        type:'post',
        url:'/load-ajax/',
        data:params,
        dataType:type,
        beforeSend:function(){
            _option.beforeSend();
        },
        success:function(result){
            _option.success(result);
        }
    })
}
function checklogin(){
	var txtusername = $("#txtusername").val();
	var txtpassword		 = $("#txtpassword").val();
   var remember_me  = $("#remeber_me").val();
   var action  = $("#action").val();
	if(txtusername == "" || txtusername == "Tên đăng nhập"){
		alert("Bạn chưa nhập tài khoản!");
		$("#txtusername").focus();
		return false;
	}
	if(txtpassword == ""){
		alert("Bạn chưa nhập mật khẩu!");
		$("#txtpassword").focus();
		return false;
	}
   $.post('/ajax/action_login.php', {action:action, txtusername: txtusername, txtpassword: txtpassword, remember_me: remember_me}, function(result){
      if(result['status'] == 0){      
         alert(result['mes']);
      }   
      else {
         if(result['status'] == 2){
            alert("Tài khoản của bạn chưa kích hoạt, vui lòng kiểm tra email kích hoạt hoặc liên hệ với ban quản trị !");
            setTimeout(window.location.href = '/logout/',3000);
         }else{
            alert("Đăng nhập thành công");
            setTimeout(window.location.href = window.location.href,3000);
         }
      } 
    },'json')
    return false;
}
function login_please(){
   alert("Đăng nhập để sử dụng chức năng này");
}
function change_city(){
   var wos_id = $('.change_city').val();
   $.post('/ajax/ajax.php',{type:'change_city',wos_id:wos_id},function(data){
         if(data['suc'] == 1){            
            location.reload();
         }
      },'json')
}
rate = function(obj,message,m8_hash){
      $('<div></div>').appendTo('body')
        .html('<div class="message_rate"><h3>'+message+'?</h3></div>')
        .dialog({
            modal: true, title: '<h3 id="myModalLabel">CộngđồngPG thông báo</h3>', zIndex: 10000, autoOpen: true,
            width: 'auto', resizable: false,
            closeText: '',
            buttonText1:"Đồng ý",
            buttonText2:"Hủy",
            buttons: {
                "Đồng ý": function () {
                     var point = $(obj).attr('point');
                     var pg_id = $(obj).attr('pg_id');
                     //var d = new Date();
                     //var time_rate = d.getTime()/1000;
                        $.ajax({
                           type : 'POST',
                           url  : '/ajax/ajax.php',
                           data : {point:point ,pg_id:pg_id ,m8_hash:m8_hash ,type:'point_pg'},
                           dataType:"json",
                           success:function(data){
                              if(data.arr_li != ''){
                                 $('.vote_wrap ul').html(data.arr_li);
                                 $('.vote_wrap .point_medium').html(data.point_medium);
                                 $('.vote_wrap .vote_medium').html(data.point_count);
                                 $('.vote_wrap .point_medium_big').html(data.point_medium);
                                 $('.vote_wrap .point_x').html(data.your_point);
                                 if(data.alert_24h != '') alert("Bạn chỉ được đánh giá 1 lần trong vòng 24h");
                                 $('.vote_wrap .point_x_wrap').removeClass('hide');
                              }
                           }
                        });
                          $(this).dialog("close");                          
                  },
                "Hủy": function () {
                    $(this).dialog("close","Đóng");
                }
            },
            close: function (event, ui) {
                $(this).remove();
            }
        });
        //$(".ui-button-text").html("Đồng ý");
    }
   function hover_rating(obj){
      var point = $(obj).attr('point');
         $(obj).addClass('li_vote');
         $(obj).prevAll().addClass('li_vote');
         $(obj).nextAll().addClass('li_novote');
         $('.point_x').html(point);
         $('.point_x_wrap').removeClass('hide');
         //$('.point_your span').html(point);
      }
   function hover_rating1(){
      var your_point = $('.vote_wrap ul li').attr('your_point');
      if(your_point == 0) your_point == 'x';
      $('.vote_wrap ul li').removeClass('li_vote');
      $('.vote_wrap ul li').removeClass('li_novote');
      $('.point_x').html(your_point);
      $('.point_x_wrap').addClass('hide');
      //$('.point_your span').html('-');
   }
   /*

Responsive Mobile Menu v1.0
Plugin URI: responsivemobilemenu.com

Author: Sergio Vitov
Author URI: http://xmacros.com

License: CC BY 3.0 http://creativecommons.org/licenses/by/3.0/

*/

function responsiveMobileMenu() {	
		$('.rmm').each(function() {
			
			
			
			$(this).children('ul').addClass('rmm-main-list');	// mark main menu list
			
			
			var $style = $(this).attr('data-menu-style');	// get menu style
				if ( typeof $style == 'undefined' ||  $style == false )
					{
						$(this).addClass('graphite'); // set graphite style if style is not defined
					}
				else {
						$(this).addClass($style);
					}
					
					
			/* 	width of menu list (non-toggled) */
			
			var $width = 0;
				$(this).find('ul li').each(function() {
					$width += $(this).outerWidth();
				});
				
			// if modern browser
			
			if ($.support.leadingWhitespace) {
				$(this).css('max-width' , $width*1+'px');
			}
			// 
			else {
				$(this).css('width' , $width*1+'px');
			}
		
	 	});
}
function getMobileMenu() {

	/* 	build toggled dropdown menu list */
	
	$('.rmm').each(function() {	
				var menutitle = $(this).attr("data-menu-title");
				if ( menutitle == "" ) {
					menutitle = "Menu";
				}
				else if ( menutitle == undefined ) {
					menutitle = "Menu";
				}
				var $menulist = $(this).children('.rmm-main-list').html();
				var $menucontrols ="<div class='rmm-toggled-controls'><div class='rmm-toggled-title'>" + menutitle + "</div><div class='rmm-button'><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span></div></div>";
				$(this).prepend("<div class='rmm-toggled rmm-closed'>"+$menucontrols+"<ul>"+$menulist+"</ul></div>");

		});
}

function adaptMenu() {
	
	/* 	toggle menu on resize */
	
	$('.rmm').each(function() {
			var $width = $(this).css('max-width');
			$width = $width.replace('px', ''); 
			if ( $(this).parent().width() < 960 ) {
				$(this).children('.rmm-main-list').hide(0);
				$(this).children('.rmm-toggled').show(0);
            $('.li_vertical').hide(0);
			}
			else {
				$(this).children('.rmm-main-list').show(0);
				$(this).children('.rmm-toggled').hide(0);
            $('.li_vertical').show(0);
			}
		});
		
}

$(function() {

	 responsiveMobileMenu();
	 getMobileMenu();
	 adaptMenu();
	 
	 /* slide down mobile menu on click */
	 
	 $('.rmm-toggled, .rmm-toggled .rmm-button').click(function(){
	 	if ( $(this).is(".rmm-closed")) {
		 	 $(this).find('ul').stop().show(300);
		 	 $(this).removeClass("rmm-closed");
	 	}
	 	else {
		 	$(this).find('ul').stop().hide(300);
		 	 $(this).addClass("rmm-closed");
	 	}
		
	});	

});
	/* 	hide mobile menu on resize */
$(window).resize(function() {
 	adaptMenu();
});