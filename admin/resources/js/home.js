$(document).ready(function(){
    $('.left-side .module_link a.load-iframe').click(function(){
        var link = $(this).attr('href');
        $('iframe#main_frame').attr('src',link);
        $('.left-side .module_link li').removeClass('active');
        $(this).parent().addClass('active');
        return false;
    });
    $('#infoacc').click(function(){
        $('iframe#main_frame').attr('src','resources/config/infoacc.php');
        return false;
    });
    $('#websetting').click(function(){
        $('iframe#main_frame').attr('src','resources/config/websetting.php');
        return false;
    });
    $('#configsite').click(function(){
        $('iframe#main_frame').attr('src','resources/config/websetting.php');
        return false;
    });
    $('#reloadFrame').click(function(){
        //$('iframe#main_frame').location.reload();
        document.getElementById('main_frame').contentDocument.location.reload(true)
    });
    $('#document').click(function(){
        $('iframe#main_frame').attr('src','document.php');
        return false;
    });
    /*$('#viewHomePage').click(function(){
        $('iframe#main_frame').attr('src','../../../home');
    })*/
});