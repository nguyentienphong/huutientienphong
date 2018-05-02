<?php
class Config{
    var $con_type;
    var $con_value = array();
    var $meta_config;
    var $contact_config;
    var $helper_config;
    var $config_link = '/pictures/configuration/';
    function __construct($con_type = '',$con_value = ''){
        if($con_type && $con_value){
            $this->con_type = $con_type;
            $this->con_value = $con_value;    
        }
    }
    function init_config($con_type,$con_value){
        $this->con_type = $con_type;
        $this->con_value = $con_value;
    }
    
    //Tra lai array cac value cua config
    function config_value(){
        $default = array();
        if($this->con_type == 'seo'){
            $default = array('meta_keyword'=>'',
                             'meta_description'=>'',
                             'meta_author'=>'',
                             'meta_copyright'=>'',
                             'title_site'=>'',
                             'favicon'=>'');
        }
        if($this->con_type == 'contact'){
            $default = array('address'=>'',
                             'map'=>0,
                             'phone'=>'',
                             'mobile'=>'',
                             'hotline'=>'',
                             'fax'=>'',
                             'email'=>'',
                             'yahoo'=>'',
                             'skype'=>'');
        }
        if($this->con_type == 'footer'){
            $default = array('position'=>'',
                             'content'=>'',
                             'showmenu'=>0,
                             'custom_menu'=>array('label'=>'','link'=>''));
        }
        if($this->con_type == 'helper'){
            $default = array(0=>
                             array(
                                 'name'=>'',
                                 'hotline'=>'',
                                 'yahoo'=>'',
                                 'skype'=>''
                                  ),
                             1=>
                             array(
                                 'name'=>'',
                                 'hotline'=>'',
                                 'yahoo'=>'',
                                 'skype'=>''
                                  )
                             );
        }
        if($this->con_type == 'about'){
            $default = array('content'=>'');
        }
        _extend_attributes($this->con_value,$default);
        $this->con_value = $default;
        return $this->con_value;
    }
    function Admin_form_config_seo(){
        $str = '';
        //title site
        $str .= '<div class="control-group">'.
                '<label class="control-label">Tiêu đề</label>'.
                '<div class="controls">'
                .form_input('title_site',$this->con_value['title_site'],'placeholder="Tiêu đề mô tả website"').
                '</div></div>';
        //meta keyword
        $str .= '<div class="control-group">'.
                '<label class="control-label">Meta keyword</label>'.
                '<div class="controls">'
                .form_input('meta_keyword',$this->con_value['meta_keyword'],'placeholder="Các từ khóa mô tả về website"').
                '</div></div>';
        //meta description
        $str .= '<div class="control-group">'.
                '<label class="control-label">Meta description</label>'.
                '<div class="controls">'
                .form_textarea('meta_description',$this->con_value['meta_description'],'').
                '</div></div>';
        //meta author
        $str .= '<div class="control-group">'.
                '<label class="control-label">Meta author</label>'.
                '<div class="controls">'
                .form_input('meta_author',$this->con_value['meta_author'],'placeholder="Định danh người tạo website"').
                '</div></div>';
        //meta copyright
        $str .= '<div class="control-group">'.
                '<label class="control-label">Meta copyright</label>'.
                '<div class="controls">'
                .form_input('meta_copyright',$this->con_value['meta_copyright'],'placeholder="Khai báo bản quyền website"').
                '</div></div>';
        
        //favicon
        $str .= '<div class="control-group">'.
                '<label class="control-label">Favicon</label>'.
                '<div class="controls">
                    <div class="center" style="width:200px;padding:10px;"><img title="Favicon" src="../../../pictures/configuration/favicon.ico"/></div>'
                .form_upload('favicon','','title="favicon cho website"').
                '<span class="help-inline">*Ảnh có kích thước không quá 32x32, định dạng .ico </span></div></div>';
        return $str;
    }
    function Admin_form_config_helper(){
        $str = '';$i=0;
        if(!$this->con_value) $this->config_value();
        foreach($this->con_value as $helper){
            $i++;
            $str .= '<div class="control-group"><div class="controls"><strong>Hỗ trợ trực tuyến '.$i.'</strong></div></div>';
            $str .= '<div class="control-group">'.
                    '<label class="control-label">Họ & tên</label>'.
                    '<div class="controls">'.
                    form_input('name_'.$i,$helper['name']).
                    '</div></div>';
            $str .= '<div class="control-group">'.
                    '<label class="control-label">Hotline</label>'.
                    '<div class="controls">'.
                    form_input('hotline_'.$i,$helper['hotline']).
                    '</div></div>';
            $str .= '<div class="control-group">'.
                    '<label class="control-label">Yahoo</label>'.
                    '<div class="controls">'.
                    form_input('yahoo_'.$i,$helper['yahoo']).
                    '</div></div>';
            $str .= '<div class="control-group">'.
                    '<label class="control-label">Skype</label>'.
                    '<div class="controls">'.
                    form_input('skype_'.$i,$helper['skype']).
                    '</div></div>';
        }
        return $str;
    }
    
    //form config liên hệ
    function Admin_form_config_contact(){
        $str = '';
        //address
        $str .= '<div class="control-group">'.
                '<label class="control-label">Địa chỉ</label>'.
                '<div class="controls">'
                .form_input('address',$this->con_value['address'],'class="span4" placeholder="Có thể hiển thị trên bản đồ Googlemaps"').
                '</div></div>';
        //Lựa chọn hiển thị bản đồ googlemaps
        $str .= '<div class="control-group">
                <div class="controls">
                <label class="checkbox">'
                .form_checkbox('maps',1,$this->con_value['maps']).
                'Hiển thị bản đồ Google Maps
                </label></div></div>';
        //phone
        $str .= '<div class="control-group">'.
                '<label class="control-label">Điện thoại</label>'.
                '<div class="controls">'
                .form_input('phone',$this->con_value['phone'],'class="span4" placeholder=""').
                '</div></div>';
        $str .= '<div class="control-group">'.
                '<label class="control-label">Di động</label>'.
                '<div class="controls">'
                .form_input('mobile',$this->con_value['mobile'],'class="span4" placeholder=""').
                '</div></div>';
        $str .= '<div class="control-group">'.
                '<label class="control-label">Hotline</label>'.
                '<div class="controls">'
                .form_input('hotline',$this->con_value['hotline'],'class="span4" placeholder=""').
                '</div></div>';
        $str .= '<div class="control-group">'.
                '<label class="control-label">Fax</label>'.
                '<div class="controls">'
                .form_input('fax',$this->con_value['fax'],'class="span4" placeholder=""').
                '</div></div>';
        $str .= '<div class="control-group">'.
                '<label class="control-label">Email</label>'.
                '<div class="controls">'
                .form_input('email',$this->con_value['email'],'class="span4" placeholder=""').
                '</div></div>';
        $str .= '<div class="control-group">'.
                '<label class="control-label">Yahoo</label>'.
                '<div class="controls">'
                .form_input('yahoo',$this->con_value['yahoo'],'class="span4" placeholder=""').
                '</div></div>';
        $str .= '<div class="control-group">'.
                '<label class="control-label">Skype</label>'.
                '<div class="controls">'
                .form_input('skype',$this->con_value['skype'],'class="span4" placeholder=""').
                '</div></div>';
        return $str;
    }
    function Admin_form_config_footer(){
        $str = '';
        $str .= '<div class="control-group">
                    <label class="control-label">Vị trí</label>
                    <div class="controls">
                        <label class="radio"><input type="radio" name="position" value="left" '.($this->con_value['position'] == 'left' ? 'checked="checked"' : '').'/>Trái</label>
                        <label class="radio"><input type="radio" name="position" value="right" '.($this->con_value['position'] == 'right' ? 'checked="checked"' : '').'/>Phải</label>
                        <label class="radio"><input type="radio" name="position" value="center" '.($this->con_value['position'] == 'center' ? 'checked="checked"' : '').'/>Giữa</label>
                    </div>
                </div>';
        $str .= '<div class="control-group">'.
                '<label class="control-label">Custom menu</label>'.
                '<div class="controls">'
                .form_input('custom_menu_label',$this->con_value['custom_menu']['label'],'class="span4" placeholder="Tên menu, phân cách bởi dấu |"')
                .'<br /><br />'
                .form_input('custom_menu_link',$this->con_value['custom_menu']['link'],'class="span4" placeholder="Link đến menu, phân cách bởi dấy |"')
                .'</div></div>';
        $str .= '<div class="control-group">
                <div class="controls">
                <label class="checkbox">'
                .form_checkbox('showmenu',1,$this->con_value['showmenu']).
                'Hiển thị menu điều hướng
                </label></div></div>';
        return $str;
    }
    function MetaConfig($return_array = FALSE){
        $db_query = new db_query('SELECT * FROM configuration 
                                  WHERE con_type = "seo" LIMIT 1');
        $meta_array = mysql_fetch_assoc($db_query->result);
        $this->meta_config = json_decode(base64_decode($meta_array['con_value']),$return_array);
        return $this->meta_config;
    }
    function MetaKeyword(){
        $this->MetaConfig();
        if(is_array($this->meta_config))
            $meta = $this->meta_config['meta_keyword'];
        if(is_object($this->meta_config))
            $meta = $this->meta_config->meta_keyword;
        return $meta;
    }
    function MetaAuthor(){
        $this->MetaConfig();
        if(is_array($this->meta_config))
            $meta = $this->meta_config['meta_author'];
        if(is_object($this->meta_config))
            $meta = $this->meta_config->meta_author;
        return $meta;
    }
    function MetaDescription(){
        $this->MetaConfig();
        if(is_array($this->meta_config))
            $meta = $this->meta_config['meta_description'];
        if(is_object($this->meta_config))
            $meta = $this->meta_config->meta_description;
        return $meta;
    }
    function MetaCopyright(){
        $this->MetaConfig();
        if(is_array($this->meta_config))
            $meta = $this->meta_config['meta_copyright'];
        if(is_object($this->meta_config))
            $meta = $this->meta_config->meta_copyright;
        return $meta;
    }
    function TitleSite(){
        $this->MetaConfig();
        if(is_array($this->meta_config))
            $title = $this->meta_config['title_site'];
        if(is_object($this->meta_config))
            $title = $this->meta_config->title_site;
        return $title;
    }
    function Favicon(){
        $this->MetaConfig();
        if(is_array($this->meta_config))
            $favicon = $this->meta_config['favicon'];
        if(is_object($this->meta_config))
            $favicon = $this->meta_config->title_site;
        return $favicon;    
    }
    function SeoString(){
        $str = '';
        $this->MetaConfig();
        $str .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
        $str .= '<meta name="keywords" content="'.$this->meta_config->meta_keyword.'" />';
        $str .= '<meta name="description" content="'.$this->meta_config->meta_description.'" />';
        $str .= '<meta name="author" content="'.$this->meta_config->meta_author.'" />';
        $str .= '<meta name="copyright" content="'.$this->meta_config->meta_copyright.'" />';
        $str .= '<meta name="robots" content="index,follow" />';
        $str .= '<meta name="rating" content="general" />';
        $str .= '<meta http-equiv="audience" content="General" />';
        $str .= '<meta name="resource-type" content="Document" />';
        $str .= '<meta name="distribution" content="Global" />';
        $str .= '<meta name="revisit-after" content="2 days" />';
        $str .= '<meta name="generator" content="Bidiots Group" />';
        $str .= '<meta content="http://bidiots.net" name="generator" />';
        $str .= '<meta content="PHP" name="CODE_LANGUAGE" />';
        $str .= '<meta content="JavaScript" name="vs_defaultClientScript" />';
        $str .= '<link rel="Shortcut Icon" href="'.$this->config_link.'favicon.ico" type="image/x-icon" />';
        return $str;
    }
    function ContactConfig(){
        $db_query = new db_query('SELECT * FROM configuration 
                                  WHERE con_type = "contact" LIMIT 1');
        $contact_array = mysql_fetch_assoc($db_query->result);
        $this->contact_config = json_decode(base64_decode($contact_array['con_value']),true);
        return $this->contact_config;
    }
    function AboutConfig(){
        $db_query = new db_query('SELECT * FROM configuration 
                                  WHERE con_type = "about" LIMIT 1');
        $result = mysql_fetch_assoc($db_query->result);
        $result = json_decode(base64_decode($result['con_value']),true);
        $this->contact_config = $result['content'];
        return $this->contact_config;
    }
    function HelperConfig(){
        $db_query = new db_query('SELECT * FROM configuration 
                                  WHERE con_type = "helper" LIMIT 1');
        $result = mysql_fetch_assoc($db_query->result);
        $result = json_decode(base64_decode($result['con_value']),true);
        $this->helper_config = $result;
        return $this->helper_config;
    }
}
?>