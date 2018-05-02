/**
 * Created by tungdt on 3/19/15.
 */
function langEn(){
   $.post('/home/aj/ajax.php',{'type':'langEn'},function(data){
         if(data.suc == 1){
            location.reload();
         }
      },'json')
      //alert('Phiên bản tiếng Anh đang xây dựng. Vui lòng quay lại sau.');
}
function langVn(){
   $.post('/home/aj/ajax.php',{'type':'langVn'},function(data){
         if(data.suc == 1){
            location.reload();
         }
      },'json')
}
function isemail(email) {
    var re = /^(\w|[^_]\.[^_]|[\-])+(([^_])(\@){1}([^_]))(([a-z]|[\d]|[_]|[\-])+|([^_]\.[^_])*)+\.[a-z]{2,3}$/i
    return re.test(email);
}

