function del_imu(block){
   $('.'+block+'_block').toggle('medium');
   $('[name='+block+']').val('');
}
function showImagesGallery(ac,block){
   var link = '/admin/resources/php/images_gallery/images_gallery.php?action='+ac+'&block='+block;
   $.fancybox({
      helpers:{
         overlay : {
             css : {
                 "background" : "rgba(0, 0, 0, .9)",
             }
         },
      },
      type			: "iframe",
      href        : link,  
      width       : '100%',
      height      : '78%'         
      
   });
}
function loadpage(obj){
	$('#table-listing').load(obj.href);
}
function check_edit(i){
    document.getElementById(i).checked = true;
    $('#'+i).parent().removeClass('fa-square-o');
    $('#'+i).parent().addClass('fa-check-square-o');  
}
function check_one(i){  
    if($('#'+i).prop('checked')){
        $('#'+i).parent().removeClass('fa-square-o');
        $('#'+i).parent().addClass('fa-check-square-o');       
    }else{
        $('#'+i).parent().addClass('fa-square-o');
        $('#'+i).parent().removeClass('fa-check-square-o');       
    }
}
function check_all_per(){
    if($('#check_all').prop('checked')){
        $('.well input.check').parent().removeClass('fa-square-o');
        $('.well input.check').parent().addClass('fa-check-square-o'); 
        $('.well input.check').prop( "checked", true );      
    }else{
        $('.well input.check').parent().addClass('fa-square-o');
        $('.well input.check').parent().removeClass('fa-check-square-o');       
        $('.well input.check').prop( "checked", false );
    }
}
function trim(sString){
    if(isNaN(sString)){
        return sString;
    }
	while(sString.substring(0,1) == ' '){
		sString = sString.substring(1, sString.length);
	}
	while(sString.substring(sString.length-1, sString.length) == ' '){
		sString = sString.substring(0,sString.length-1);
	}
	return sString;
}
function isBlank(str){
    if(trim(str) == ''){
        return true;
    }else return false;
}
function validForm(obj){
    obj = $.parseJSON(obj);
    for(i in obj.elements){
        var ele = obj.elements[i];
        //console.log(ele);
//        console.log($('#'+ele.id).val());
        if(isBlank($('#'+ele.id).val())){
            if(ele.msg) alert(ele.msg);
            $('#'+ele.id).css({border:'1px solid #FF0000'}).focus();
            return false;
        }else{
            $('#'+ele.id).css('border','1px solid #CCC');
        }  
    }
    //submit
    form_name = obj.form_name;
    document.form_name.submit();
}
function Grid(){
    this.tr = '#tr_';
    this.input_active = '#active_field_';
}

Grid.prototype.checkall = function(){
    if($('#check_all').prop('checked')){
        $('#dynamic-table input.check').parent().removeClass('fa-square-o');
        $('#dynamic-table input.check').parent().addClass('fa-check-square-o'); 
        $('#dynamic-table input.check').prop( "checked", true );      
    }else{
        $('#dynamic-table input.check').parent().addClass('fa-square-o');
        $('#dynamic-table input.check').parent().removeClass('fa-check-square-o');       
        $('#dynamic-table input.check').prop( "checked", false );
    }
}
Grid.prototype.delete_one_image = function(id){
    if(confirm('Bạn muốn xóa bản ghi này ?')){
        var tpl = this.tr + id;
        $(tpl).remove();    
        $.ajax({
            type:'post',
            url:'delete_images.php',
            data:{'record_id':id},
            success:function(html){
                alert(html);
            }
        })
    }
    return false;
}
Grid.prototype.delete_all_images = function(total){
    console.log(total);
    if(confirm('Bạn muốn xóa các bản ghi đã chọn ?')){
        var listid = '0';
        var selected = false;
        for(i=1;i<=total;i++){
            if(document.getElementById("record_"+i).checked == true){
                id = document.getElementById("record_"+i).value;
                listid += ','+id;
                var tpl = this.tr + id;
                $(tpl).remove();
                selected = true;
            }
        }
        if(selected===true){
            $.ajax({
                type: "POST",
                url: "delete_images.php",
                data: "record_id="+listid,
                success: function(msg){
                    if(msg!=''){
                        alert( msg );
                    }
                }
            });
        }else{
            alert('Vui lòng chọn ít nhất 1 bản ghi!');
        }
    }
    return false;
}
Grid.prototype.delete_one = function(id){
    if(confirm('Bạn muốn xóa bản ghi này aaaaa?')){
        var tpl = this.tr + id;
        $(tpl).remove();    
        $.ajax({
            type:'post',
            url:'delete.php',
            data:{'record_id':id},
            success:function(html){
                alert(html);
            }
        })
    }
    return false;
}
Grid.prototype.delete_all = function(total){
    console.log(total);
    if(confirm('Bạn muốn xóa các bản ghi đã chọn ?')){
        var listid = '0';
        var selected = false;
        for(i=1;i<=total;i++){
            if(document.getElementById("record_"+i).checked == true){
                id = document.getElementById("record_"+i).value;
                listid += ','+id;
                var tpl = this.tr + id;
                $(tpl).remove();
                selected = true;
            }
        }
        if(selected===true){
            $.ajax({
                type: "POST",
                url: "delete.php",
                data: "record_id="+listid,
                success: function(msg){
                    if(msg!=''){
                        alert( msg );
                    }
                }
            });
        }else{
            alert('Vui lòng chọn ít nhất 1 bản ghi!');
        }
    }
    return false;
}
Grid.prototype.update_active = function(field,id){
    var tpl = '#'+field+'_'+id;
    var td = $(tpl).closest('td');
    $.ajax({
        type:'post',
        data:{id:id,field:field},
        url:'active.php',
        success:function(html){
            td.html(html);
        },
        beforeSend:function(){
            td.html('<img src="../../resources/img/loading.gif"/>');
        }
    });
    return false;
}
var NewsJS = NewsJS || {};
NewsJS.search_relate = function(){
    data = $('#search_relate').val();
    $.ajax({
        type:'post',
        url:'../news/ajax.php',
        data:{keyword:data,action:'search_relate'},
        success:function(html){
            $('#relate_result').html(html);
        }
    })
}
NewsJS.add_relate = function (){
    var array_relate_list = [];
    $('.new_relate_result').each(function(){
        if($(this).attr('checked') == 'checked'){
            dataRN = {
                value:$(this).val(),
                title:$(this).attr('title')
            }
            array_relate_list.push(dataRN);    
        }
    });
    if(array_relate_list.length){
        var listBuild = '<div class="relate_element">';
        var checkEmpty = true;
        for(i in array_relate_list){
            if(!$('#new_relate_list_'+array_relate_list[i].value).length){
                var buildEle = '';
                buildEle += '<label class="checkbox"><input type="checkbox" class="checkbox" checked="checked" name="new_relate_list[]" value="'+array_relate_list[i].value+'" id="new_relate_list_'+array_relate_list[i].value+'"/>';
                buildEle += array_relate_list[i].title;
                buildEle += '<span style="margin-left:5px;padding:5px;color:red;font-weight:bold;font-size:14px;cursor:pointer;" onclick="NewsJS.del_relate(this);return false;">&times;</span></label>';
                listBuild += buildEle;
                checkEmpty = false;    
            }
        }
        listBuild += '</div>';
        if(!checkEmpty){
            $('#news_relate_after_search').append(listBuild);    
        }
    }
}
NewsJS.del_relate = function (a){
    relateDiv = $(a).closest('.relate_element');
    $(a).closest('label').remove();
    if(!relateDiv.find('label').length) relateDiv.remove();
}

var ProductJS = ProductJS || {};
ProductJS.slideDeleteItem = function(a){
    $(a).closest('.thumb').remove();
}

ProductJS.search_relate = function(){
    data = $('#search_pro_relate').val();
    $.ajax({
        type:'post',
        url:'../products/ajax.php',
        data:{keyword:data,action:'search_relate'},
        success:function(html){
            $('#relate_pro_result').html(html);
        }
    })
}

ProductJS.add_relate = function (){
    var array_relate_list = [];
    $('.pro_relate_result').each(function(){
        if($(this).attr('checked') == 'checked'){
            dataRN = {
                value:$(this).val(),
                title:$(this).attr('title')
            }
            array_relate_list.push(dataRN);
        }
    });
    if(array_relate_list.length){
        var listBuild = '<div class="relate_element">';
        var checkEmpty = true;
        for(i in array_relate_list){
            if(!$('#pro_relate_list_'+array_relate_list[i].value).length){
                var buildEle = '';
                buildEle += '<label class="checkbox"><input type="checkbox" class="checkbox" checked="checked" name="pro_relate_list[]" value="'+array_relate_list[i].value+'" id="pro_relate_list_'+array_relate_list[i].value+'"/>';
                buildEle += array_relate_list[i].title;
                buildEle += '<span style="margin-left:5px;padding:5px;color:red;font-weight:bold;font-size:14px;cursor:pointer;" onclick="ProductJS.del_relate(this);return false;">&times;</span></label>';
                listBuild += buildEle;
                checkEmpty = false;
            }
        }
        listBuild += '</div>';
        if(!checkEmpty){
            $('#pro_relate_after_search').append(listBuild);
        }
    }
}
ProductJS.del_relate = function (a){
    relateDiv = $(a).closest('.relate_element');
    $(a).closest('label').remove();
    if(!relateDiv.find('label').length) relateDiv.remove();
}

var TemplateJS = TemplateJS || {};
TemplateJS.disableTemplateListFile = function(){
    $('#tpl_css_file, #tpl_js_file').attr('disabled','disabled');
}
$(document).ready(function(){
    $('input[js-autocomplete="1"]').autocomplete({
        serviceUrl : '../../resources/php/autocomplete.php'
    });
    $('input[datepick-element="1"]').datepicker({
        dateFormat : 'dd/mm/yy',
        changeMonth: true,
         changeYear: true
    });
    //List combo
    $('#add-combo').click(function(){
        var select = $('#combo_id');
        var option = select.find('option[value="'+select.val()+'"]');
        var node = '<label class="checkbox">' +
            '<input type="checkbox" value="'+select.val()+'" name="comboDevide[]" id="comboDevide_'+select.val()+'">' + option.html() +
            '<span style="margin-left:5px;padding:5px;color:red;font-weight:bold;font-size:14px;cursor:pointer;" class="removeRow">×</span></label>';
        //nếu có rồi thì thôi
        if(!$('#comboDevide_'+select.val()).length){
            $('#list-combo').append(node);
        }
    });
    $(document).on('click','.removeRow',function(){
        $(this).parent().remove();
    })
});
function ChangeTypeProduct(id){
    $.ajax({
        type : 'post',
        url : '../products/ajax.php',
        data : {id:id,action:'load_type_product',type : $('#pro_type').val()},
        dataType : 'json',
        success : function(resp){
            if(resp.code == 1){
                //thành công redirect về file đúng
                window.location.href = resp.url;
            }
        }
    })
}