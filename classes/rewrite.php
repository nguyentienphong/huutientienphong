<?php
class Rewrite{
   var $actual;
   var $path;
   var $rules;
   var $variables;
   var $e404		=	"home/controllers/404.php";
   /*$url = 'http://domain.com/danh-muc/duong-dan-chi-tiet.html?arg=value#anchor';
   dump(parse_url($url));
   Array
   (
       [scheme] => http
       [host] => domain.com
       [path] => /danh-muc/duong-dan-chi-tiet.html
       [query] => arg=value
       [fragment] => anchor
   )*/
   function Rewrite(){
      $this->path = parse_url($_SERVER['REQUEST_URI']);	 
      $this->actual = $this->path ==  "/" ?  array("") : explode("/",$this->path['path']);
      $this->execute();
   }
   function error404() {
      header('HTTP/1.1 404 Not Found');
      header('Status: 404 Not Found');
      if ( $this->e404 != '')
         require $this->e404;
      exit();
   }
   function execute(){		
      if (strpos($this->path['path'], 'http:')!==false || strpos($this->path['path'], '?')!==false){
         $this->error404();
      }
      //cho home
      $check_url_path = preg_match("@^/$@" , $this->path['path'], $regs);
      if ($check_url_path == 1){	
         $_GET["file"] = "index";	
         $_GET["alias"] = "";			
         return;
      }
      //cho link: /tim-kiem/
      $check_url_path = preg_match("@^/tim-kiem/$@" , $this->path['path'], $regs);
      if ($check_url_path == 1){	
         $_GET["file"] = "search";			
         $_GET["alias"] =  str_replace('/','',$regs[0]);
         return;
      }
      //cho link: /dich-vu/
      $check_url_path = preg_match("@^/dich-vu/$@" , $this->path['path'], $regs);
      if ($check_url_path == 1){	
         $_GET["file"] = "services";			
         $_GET["alias"] =  str_replace('/','',$regs[0]);
         return;
      }
      //cho link: /dich-vu/dich-vu-dau-tien.html
      $check_url_path = preg_match("@^/dich-vu/([^/]*).html$@" , $this->path['path'], $regs);
      if ($check_url_path == 1){			
         $_GET["file"] = "services_detail";	
         $_GET["alias"] = $regs[1];
         return;
      }
      //cho link: /dich-vu/danh-muc
      $check_url_path = preg_match("@^/dich-vu/([^/]*)$@" , $this->path['path'], $regs);
      if ($check_url_path == 1){	
         $_GET["file"] = "services";			
         $_GET["alias"] =  str_replace('/','',$regs[1]);
         return;
      }
      
      
      //cho link: /gioi-thieu/
      $check_url_path = preg_match("@^/gioi-thieu/$@" , $this->path['path'], $regs);
      if ($check_url_path == 1){	
         $_GET["file"] = "aboutus";			
         $_GET["alias"] =  str_replace('/','',$regs[0]);
         return;
      }
      //cho link: /tam-nhin-su-menh/
      $check_url_path = preg_match("@^/tam-nhin-su-menh/$@" , $this->path['path'], $regs);
      if ($check_url_path == 1){	
         $_GET["file"] = "mission";			
         $_GET["alias"] =  str_replace('/','',$regs[0]);
         return;
      }
      //cho link: /van-hoa-doanh-nghiep/
      $check_url_path = preg_match("@^/van-hoa-doanh-nghiep/$@" , $this->path['path'], $regs);
      if ($check_url_path == 1){	
         $_GET["file"] = "culture";			
         $_GET["alias"] =  str_replace('/','',$regs[0]);
         return;
      }
      //cho link: /doi-tac/
      $check_url_path = preg_match("@^/doi-tac/$@" , $this->path['path'], $regs);
      if ($check_url_path == 1){			
         $_GET["file"] = "partner";	
          $_GET["alias"] =  str_replace('/','',$regs[0]);
         return;
      }
      //cho link: /tuyn-dung/
      $check_url_path = preg_match("@^/ung-tuyen/$@" , $this->path['path'], $regs);
      if ($check_url_path == 1){	
         $_GET["file"] = "recruitment_resume";			
         $_GET["alias"] =  str_replace('/','',$regs[0]);
         return;
      }
      //cho link: /tuyen-dung/
      $check_url_path = preg_match("@^/tuyen-dung/$@" , $this->path['path'], $regs);
      if ($check_url_path == 1){	
         $_GET["file"] = "recruitment";			
         $_GET["alias"] =  str_replace('/','',$regs[0]);
         return;
      }
      //cho link: /tuyen-dung/trang-1 ( phân trang tuyển dụng )
      $check_url_path = preg_match("@^/tuyen-dung/trang-([^/]*)$@" , $this->path['path'], $regs);
      if ($check_url_path == 1){	
         $_GET["file"] = "recruitment";			
         $_GET["alias"] =  str_replace('/','',$regs[0]);
         $_GET["page"] =  $regs[1];
         return;
      }
      //cho link: /tuyen-dung/tin-tuyen-dung-dau-tien.html
      $check_url_path = preg_match("@^/tuyen-dung/([^/]*).html$@" , $this->path['path'], $regs);
      if ($check_url_path == 1){			
         $_GET["file"] = "recruitment_detail";	
         $_GET["alias"] = $regs[1];
         return;
      }
      //cho link: /tuyen-dung/danh-muc
      $check_url_path = preg_match("@^/tuyen-dung/([^/]*)$@" , $this->path['path'], $regs);
      if ($check_url_path == 1){	
         $_GET["file"] = "recruitment";			
         $_GET["alias"] =  str_replace('/','',$regs[1]);
         return;
      }
      
      //cho link: /dang-ky/
      $check_url_path = preg_match("@^/dang-ky/$@" , $this->path['path'], $regs);
      if ($check_url_path == 1){	
         $_GET["file"] = "register";			
         $_GET["alias"] =  str_replace('/','',$regs[0]);
         return;
      }
      //cho link: /lien-he/
      $check_url_path = preg_match("@^/lien-he/$@" , $this->path['path'], $regs);
      if ($check_url_path == 1){	
         $_GET["file"] = "contact";			
         $_GET["alias"] =  str_replace('/','',$regs[0]);
         return;
      }
      //cho link: /lien-he/
      $check_url_path = preg_match("@^/y-kien-khach-hang/$@" , $this->path['path'], $regs);
      if ($check_url_path == 1){	
         $_GET["file"] = "feedback";			
         $_GET["alias"] =  str_replace('/','',$regs[0]);
         return;
      }
      //cho link: /logout/
      $check_url_path = preg_match("@^/logout/$@" , $this->path['path'], $regs);
      if ($check_url_path == 1){	
         $_GET["file"] = "logout";			
         $_GET["alias"] =  str_replace('/','',$regs[0]);
         return;
      }
      //cho tags : /tags/Việt-Nam
      $check_url_path = preg_match("@^/tags/(.*)$@" , $this->path['path'], $regs);
      if ($check_url_path == 1){	
         $_GET["file"] = "tags";			
         $_GET["alias"] =  str_replace('/','',$regs[0]);
         $_GET["keyword"] =  $regs[1];
         return;
      }
      //cho link: /tin-tuc/ (  )
      $check_url_path = preg_match("@^/tin-tuc/$@" , $this->path['path'], $regs);
      if ($check_url_path == 1){	
         $_GET["file"] = "news";			
         $_GET["alias"] =  str_replace('/','',$regs[0]);
         return;
      }
      //cho link: /tin-tuc/trang-1 ( phân trang tin tức )
      $check_url_path = preg_match("@^/tin-tuc/trang-([^/]*)$@" , $this->path['path'], $regs);
      if ($check_url_path == 1){	
         $_GET["file"] = "news";			
         $_GET["alias"] =  str_replace('/','',$regs[0]);
         $_GET["page"] =  $regs[1];
         return;
      }
      //cho link: /tin-tuc/bai-viet-dau-tien.html
      $check_url_path = preg_match("@^/tin-tuc/([^/]*).html$@" , $this->path['path'], $regs);
      if ($check_url_path == 1){			
         $_GET["file"] = "news_detail";	
         $_GET["alias"] = $regs[1];
         return;
      }
      //cho link: /tin-tuc/danh-muc/
      $check_url_path = preg_match("@^/tin-tuc/([^/]*)/$@" , $this->path['path'], $regs);
      if ($check_url_path == 1){			
         $_GET["file"] = "news_cat";	
         $_GET["alias"] =  str_replace('/','',$regs[1]);
         return;
      }
      //cho link: /tin-tuc/danh-muc/trang
      $check_url_path = preg_match("@^/tin-tuc/([^/]*)/trang-([^/]*)$@" , $this->path['path'], $regs);
      if ($check_url_path == 1){			
         $_GET["file"] = "news_cat";	
         $_GET["alias"] =  str_replace('/','',$regs[1]);
         $_GET["page"] =  $regs[2];
         return;
      }
      //cho link: /hoi-nghi-va-su-kien/ (  )
      $check_url_path = preg_match("@^/hoi-nghi-va-su-kien/$@" , $this->path['path'], $regs);
      if ($check_url_path == 1){	
         $_GET["file"] = "metting_event";			
         $_GET["alias"] =  str_replace('/','',$regs[0]);
         return;
      }            
	  //cho link: /hoi-nghi-va-su-kien/trang-1 ( phân trang hội nghị và sự kiện )
      $check_url_path = preg_match("@^/hoi-nghi-va-su-kien/trang-([^/]*)$@" , $this->path['path'], $regs);
          
      if ($check_url_path == 1){	
         $_GET["file"] = "metting_event";			
         $_GET["alias"] =  str_replace('/','',$regs[0]);
         $_GET["page"] =  $regs[1];
         return;
      }
      //cho link: /hoi-nghi-va-su-kien/bai-viet-dau-tien.html
      $check_url_path = preg_match("@^/hoi-nghi-va-su-kien/([^/]*).html$@" , $this->path['path'], $regs);
      if ($check_url_path == 1){			
         $_GET["file"] = "metting_event_detail";	
         $_GET["alias"] = $regs[1];
         return;
      }
      //cho link: /cau-hoi-thuong-gap/ (  )
      $check_url_path = preg_match("@^/cau-hoi-thuong-gap/$@" , $this->path['path'], $regs);
      if ($check_url_path == 1){	
         $_GET["file"] = "faqs";			
         $_GET["alias"] =  str_replace('/','',$regs[0]);
         return;
      }
      //cho link: /cau-hoi-thuong-gap/trang-1 ( phân trang )
      $check_url_path = preg_match("@^/cau-hoi-thuong-gap/trang-([^/]*)$@" , $this->path['path'], $regs);
      if ($check_url_path == 1){	
         $_GET["file"] = "faqs";			
         $_GET["alias"] =  str_replace('/','',$regs[0]);
         $_GET["page"] =  $regs[1];
         return;
      }
      //cho link: /cau-hoi-thuong-gap/cau-hoi-dau-tien.html
      $check_url_path = preg_match("@^/cau-hoi-thuong-gap/([^/]*).html$@" , $this->path['path'], $regs);
      if ($check_url_path == 1){			
         $_GET["file"] = "faqs_detail";	
         $_GET["alias"] = $regs[1];
         return;
      }
      //cho link: /gui-email-nhan-khuyen-mai/ (  )
      $check_url_path = preg_match("@^/gui-email-nhan-khuyen-mai/$@" , $this->path['path'], $regs);
      if ($check_url_path == 1){	
         $_GET["file"] = "email_promotion";			
         $_GET["alias"] =  str_replace('/','',$regs[0]);
         return;
      }
      //cho link: categories
      $check_url_path = preg_match("@^/([^/]*)/$@" , $this->path['path'], $regs);
      if ($check_url_path == 1){	
         $_GET["file"] = "categories";			
         $_GET["alias"] =  str_replace('/','',$regs[1]);
         return;
      }
      //cho link: categories có thêm trang
      $check_url_path = preg_match("@^/([^/]*)/trang-([^/]*)$@" , $this->path['path'], $regs);
      if ($check_url_path == 1){	
         $_GET["file"] = "categories";			
         $_GET["alias"] =  str_replace('/','',$regs[1]);
         $_GET["page"] =  $regs[2];
         return;
      }
      //cho link: chi tiet post
      $check_url_path = preg_match("@^/([^/]*).html$@" , $this->path['path'], $regs);
      if ($check_url_path == 1){			
         $_GET["file"] = "post_detail";	
         $_GET["alias"] = $regs[1];
         return;
      }
      //cho link: trang đơn
      $check_url_path = preg_match("@^/trang-don/([^/]*).html$@" , $this->path['path'], $regs);
      if ($check_url_path == 1){			
         $_GET["file"] = "page";	
         $_GET["alias"] = $regs[1];
         return;
      }
	  
	  //cho link: /gui-mail/23 ( gui mail cho yeu cau dat phong )
      $check_url_path = preg_match("@^/gui-mail/([^/]*)$@" , $this->path['path'], $regs);
      if ($check_url_path == 1){	
         $_GET["file"] = "sendmail_api";			
         $_GET["alias"] =  str_replace('/','',$regs[0]);
         $_GET["id"] =  $regs[1];
         return;
      }
      
      
         
      if(!isset($_GET["file"]) || $_GET["file"] == '') {
         $this->error404();
      }
   }
}
/*
Trong class, các biểu thức chính qui thay / bởi @ để tránh lỗi
Cơ bản: 
   '/hello/'; // biểu thức chính quy cho một string có chuỗi “hello” ở trong đó.
Ký hiệu “^” và “$”: bắt đầu và kết thúc 1 string:
   '/^hello/';  // biểu thức chính quy cho một string bắt đầu bởi chuỗi “hello”
   '/hello$/'; // biểu thức chính quy cho một string kết thúc bởi chuỗi “hello”
Ký hiệu: “*”, “+”, “?”
   $re = '/^ab*$/' ; // biểu thức chính quy cho một string bắt đầu bởi a, và kết thúc là 0 hoặc nhiều b (ví dụ: a, ab, abb, abbb, …);
   $re = '/^ab+$/' ; // biểu thức chính quy cho một string bắt đầu bởi a, và kết thúc là 1 hoặc nhiều b (ví dụ: ab, abb, abbb, …);
   $re = '/^ab?$/' : // biểu thức chính quy cho một string bắt đầu bởi a, và kết thúc là b hoặc là không (ví dụ: ab hoặc a)
Sử dụng: {}
   $re = '/^ab{2}$/'; // biểu thức chính quy cho một string bắt đầu bởi a, và kết thúc là 2 chũ b (là abb);
   $re = '/^ab{2,}$/'; // biểu thức chính quy cho một string bắt đầu bởi a, và kết thúc là ít nhất 2 chũ b (ví dụ: abb, abbb, abbbb, …);
   $re = '/^ab{2,5}$/'; // biểu thức chính quy cho một string bắt đầu bởi a, và kết thúc là ít nhất 2 chũ b và nhiều nhất là 5 chữ b (ví dụ: abb, abbb, abbbb, abbbbb)
Sử dụng : () và |
   $re = '/^a(bc)*$/'; // biểu thức chính quy cho một string bắt đầu bởi a, và kết thúc là 0 hoặc nhiều 'bc' (ví dụ abc, abcbc, abcbcbcbc, …)
   $re = '/^a(b|c)*$/'; // biểu thức chính quy cho một string bắt đầu bởi a, và kết thúc là 0 hoặc nhiều 'b' hoặc nhiều 'c' hoặc 'b' 'c' lẫn lộn :D (ví dụ abc, abbcccccccccc, abccccbbbcbc, …)
Sử dụng symbol '.': đại diện cho một ký tự đơn bất kỳ
   $re = '/^.{3}$/'; //Biểu thức chính quy cho một chuỗi có đúng 3 ký tự bất kỳ.
Sử dụng: '-':
   [0-9] : Một chữ số
   [a-zA-Z]: một ký tự A->Z, a->z
   [a-d] : ~ (a|b|c|d)
   [^a-zA-Z]: một ký tự không phải là A->Z, a->z
   [^0-9]: một ký tự không phải là số
Sử dụng: '\'
   \d - Chữ số bất kỳ ~ [0-9]
   \D - Ký tự bất kỳ không phải là chữ số (ngược với \d) ~ [^0-9]
   \w - Ký tự từ a-z, A-Z, hoặc 0-9 ~ [a-zA-Z0-9]
   \W - Ngược lại với \w (nghĩa là các ký tự không thuộc các khoảng: a-z, A-Z, hoặc 0-9) ~[^a-zA-Z0-9]
   \s - Khoảng trắng (space) 
   \S - Ký tự bất kỳ không phải là khoảng trắng. 
*/
?>