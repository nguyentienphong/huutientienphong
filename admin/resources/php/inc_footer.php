<span class="fl" id="wrapper-fullscreen">Mở rộng/Thu nhỏ thanh điều hướng <i id="ft_icon_fscr" class="icon-resize-small icon-black"></i></span>
<div class="fr ft_text">Bản quyền thuộc về Sudo Group - Copyright &copy; 2013</div>
<script>
wL = $('#home_left').width();
wFrameFull = $(window).width() - 4;
$('#wrapper-fullscreen').click(function(){
    if($('#ft_icon_fscr').hasClass('icon-resize-small')){
        $('#ft_icon_fscr').removeClass('icon-resize-small').addClass('icon-resize-full');
        $('#home_left').animate({
            width:0
        },100,function(){
            $('#menu_list').addClass('hidden');
        });
        $('#main_frame').animate({
            width:wFrameFull
        },100);
    }else{
        $('#ft_icon_fscr').removeClass('icon-resize-full').addClass('icon-resize-small');
            $('#home_left').animate({
            width:wL
        },100,function(){
            $('#menu_list').removeClass('hidden');
        });
        $('#main_frame').animate({
            width:wFrameFull - wL
        },100);
    }
})
</script>