<?php
//Form function, tạo form - code dựa trên form_helper của code igniter
   
function form_open($action = '', $attributes = '', $hidden = array()){
	if ($attributes == ''){
		$attributes = 'method="post"';
	}
	$form = '<form action="'.$action.'"';
	$form .= _attributes_to_string($attributes, TRUE);
	$form .= '>';
	if (is_array($hidden) AND count($hidden) > 0){
		$form .= sprintf("<div style=\"display:none\">%s</div>", form_hidden($hidden));
	}
	return $form;
}

// ------------------------------------------------------------------------

/**
* Form Declaration - Multipart type
*
* Creates the opening portion of the form, but with "multipart/form-data".
*/
function form_open_multipart($action = '', $attributes = array(), $hidden = array()){
	if (is_string($attributes)){
		$attributes .= ' enctype="multipart/form-data"';
	}
	else{
		$attributes['enctype'] = 'multipart/form-data';
	}
	return form_open($action, $attributes, $hidden);
}

// ------------------------------------------------------------------------

/**
* Hidden Input Field
*
* Generates hidden fields.  You can pass a simple key/value string or an associative
* array with multiple values.
*/
function form_hidden($name, $value = '', $recursing = FALSE){
	static $form;
	if ($recursing === FALSE){
		$form = "\n";
	}
	if (is_array($name)){
		foreach ($name as $key => $val){
			form_hidden($key, $val, TRUE);
		}
		return $form;
	}
	if ( ! is_array($value)){
		$form .= '<input type="hidden" name="'.$name.'" value="'.$value.'" />'."\n";
	}
	else{
		foreach ($value as $k => $v){
			$k = (is_int($k)) ? '' : $k;
			form_hidden($name.'['.$k.']', $v, TRUE);
		}
	}
	return $form;
}

// ------------------------------------------------------------------------

/**
* Text Input Field
* data : name cua input
* value : gia tri cua input
* extra : chuoi kem them (co the la javascript hoac id, class)
*/
function form_input($data = '', $value = '', $extra = ''){
	$defaults = array('type' => 'text', 'name' => (( ! is_array($data)) ? $data : ''), 'value' => $value);
	return "<input "._parse_form_attributes($data, $defaults).$extra." />";
}

// ------------------------------------------------------------------------

/**
* Password Field
*
* Identical to the input function but adds the "password" type
*/

function form_password($data = '', $value = '', $extra = ''){
	if ( ! is_array($data)){
		$data = array('name' => $data);
	}
	$data['type'] = 'password';
	return form_input($data, $value, $extra);
}
// ------------------------------------------------------------------------

/**
* Upload Field
*
* Identical to the input function but adds the "file" type
*/
function form_upload($data = '', $value = '', $extra = ''){
	if ( ! is_array($data)){
		$data = array('name' => $data);
	}
	$data['type'] = 'file';
	return form_input($data, $value, $extra);
}
// ------------------------------------------------------------------------

/**
 * Textarea field
 */
function form_textarea($data = '', $value = '', $extra = ''){
	$defaults = array('name' => (( ! is_array($data)) ? $data : ''));
	if ( ! is_array($data) OR ! isset($data['value'])){
		$val = $value;
	}
	else{
		$val = $data['value'];
		unset($data['value']); // textareas don't use the value attribute
	}
	$name = (is_array($data)) ? $data['name'] : $data;
	return "<textarea "._parse_form_attributes($data, $defaults).$extra.">".$val."</textarea>";
}
// ------------------------------------------------------------------------

/**
 * Multi-select menu
 */
function form_multiselect($name = '', $options = array(), $selected = array(), $extra = ''){
	if ( ! strpos($extra, 'multiple')){
		$extra .= ' multiple="multiple"';
	}
	return form_dropdown($name, $options, $selected, $extra);
}
// --------------------------------------------------------------------

/**
 * Drop-down Menu
 */
function form_dropdown($name = '', $options = array(), $selected = array(), $extra = ''){
	if ( ! is_array($selected)){
		$selected = array($selected);
	}

	// If no selected state was submitted we will attempt to set it automatically
	if (count($selected) === 0){
		// If the form name appears in the $_POST array we have a winner!
		if (isset($_POST[$name])){
			$selected = array($_POST[$name]);
		}
	}
	if ($extra != '') $extra = ' '.$extra;
	$multiple = (count($selected) > 1 && strpos($extra, 'multiple') === FALSE) ? ' multiple="multiple"' : '';
	$form = '<select name="'.$name.'"'.$extra.$multiple.">\n";
	foreach ($options as $key => $val){
		$key = (string) $key;
		if (is_array($val) && ! empty($val)){
			$form .= '<optgroup label="'.$key.'">'."\n";
			foreach ($val as $optgroup_key => $optgroup_val){
				$sel = (in_array($optgroup_key, $selected)) ? ' selected="selected"' : '';
				$form .= '<option value="'.$optgroup_key.'"'.$sel.'>'.(string) $optgroup_val."</option>\n";
			}
			$form .= '</optgroup>'."\n";
		}
		else{
			$sel = (in_array($key, $selected)) ? ' selected="selected"' : '';
			$form .= '<option value="'.$key.'"'.$sel.'>'.(string) $val."</option>\n";
		}
	}
	$form .= '</select>';
	return $form;
}
function form_dropdown_m8($name = '', $options = array(), $selected = array(), $extra = '',$options_attr = array()){
	if ( ! is_array($selected)){
		$selected = array($selected);
	}

	// If no selected state was submitted we will attempt to set it automatically
	if (count($selected) === 0){
		// If the form name appears in the $_POST array we have a winner!
		if (isset($_POST[$name])){
			$selected = array($_POST[$name]);
		}
	}
	if ($extra != '') $extra = ' '.$extra;
	$multiple = (count($selected) > 1 && strpos($extra, 'multiple') === FALSE) ? ' multiple="multiple"' : '';
	$form = '<select name="'.$name.'"'.$extra.$multiple.">\n";
	foreach ($options as $key => $val){
		$key = (string) $key;
		if (is_array($val) && ! empty($val)){
			$form .= '<optgroup label="'.$key.'">'."\n";
			foreach ($val as $optgroup_key => $optgroup_val){
				$sel = (in_array($optgroup_key, $selected)) ? ' selected="selected"' : '';
				$form .= '<option value="'.$optgroup_key.'"'.$sel.'>'.(string) $optgroup_val."</option>\n";
			}
			$form .= '</optgroup>'."\n";
		}
		else{
			$sel = (in_array($key, $selected)) ? ' selected="selected"' : '';
			$form .= '<option value="'.$key.'"'.$sel.' attr="'.$options_attr[$key].'">'.(string) $val."</option>\n";
		}
	}
	$form .= '</select>';
	return $form;
}
// ------------------------------------------------------------------------

/**
 * Checkbox Field
 */

function form_checkbox($data = '', $value = '', $checked = FALSE, $extra = ''){
	$defaults = array('type' => 'checkbox', 'name' => (( ! is_array($data)) ? $data : ''), 'value' => $value);
	if (is_array($data) AND array_key_exists('checked', $data)){
		$checked = $data['checked'];
		if ($checked == FALSE){
			unset($data['checked']);
		}
		else{
			$data['checked'] = 'checked';
		}
	}
	if ($checked == TRUE){
		$defaults['checked'] = 'checked';
	}
	else{
		unset($defaults['checked']);
	}
	return "<div style='position: relative;'>
   <i class='fa fa-".str_replace('ed','-',@$defaults['checked'])."square-o icon-green font-size17 mgt7'>
            <input style='position: absolute;
               top: -20%;
               left: -20%;
               display: block;
               width: 140%;
               height: 140%;
               margin: 0px;
               padding: 0px;
               border: 0px;
               opacity: 0;
               background: rgb(255, 255, 255);' "._parse_form_attributes($data, $defaults).$extra."></i></div>";
}


// ------------------------------------------------------------------------

/**
 * Radio Button
 */
function form_radio($data = '', $value = '', $checked = FALSE, $extra = ''){
	if ( ! is_array($data)){
		$data = array('name' => $data);
	}
	$data['type'] = 'radio';
	return form_checkbox($data, $value, $checked, $extra);
}

// ------------------------------------------------------------------------

/**
 * Submit Button
 */
function form_submit($data = '', $value = '', $extra = ''){
	$defaults = array('type' => 'submit', 'name' => (( ! is_array($data)) ? $data : ''), 'value' => $value);
	return "<input "._parse_form_attributes($data, $defaults).$extra." />";
}

// ------------------------------------------------------------------------

/**
 * Reset Button
 */
function form_reset($data = '', $value = '', $extra = ''){
	$defaults = array('type' => 'reset', 'name' => (( ! is_array($data)) ? $data : ''), 'value' => $value);
	return "<input "._parse_form_attributes($data, $defaults).$extra." />";
}

// ------------------------------------------------------------------------

/**
 * Form Button
 */
function form_button($data = '', $content = '', $extra = ''){
	$defaults = array('name' => (( ! is_array($data)) ? $data : ''), 'type' => 'button');
	if ( is_array($data) AND isset($data['content'])){
		$content = $data['content'];
		unset($data['content']); // content is not an attribute
	}
	return "<button "._parse_form_attributes($data, $defaults).$extra.">".$content."</button>";
}

// ------------------------------------------------------------------------

/**
 * Form Label Tag
 */
function form_label($label_text = '', $id = '', $attributes = array()){
	$label = '<label';
	if ($id != ''){
		$label .= " for=\"$id\"";
	}
	if (is_array($attributes) AND count($attributes) > 0){
		foreach ($attributes as $key => $val){
			$label .= ' '.$key.'="'.$val.'"';
		}
	}
	$label .= ">$label_text</label>";
	return $label;
}

/**
 * Form Close Tag
 */
function form_close($extra = ''){
	return "</form>".$extra;
}


// ------------------------------------------------------------------------

// ------------------------------------------------------------------------

/**
 * Parse the form attributes
 * Helper function used by some of the form helpersg
 */

function _extend_attributes($attributes, $default){
    if (is_array($attributes)){
		foreach ($default as $key => $val){
			if (isset($attributes[$key])){
				$default[$key] = $attributes[$key];
				unset($attributes[$key]);
			}
		}
		if (count($attributes) > 0){
			$default = array_merge($default, $attributes);
		}
	}
    return $default;
}

function _parse_form_attributes($attributes, $default){
	$default = _extend_attributes($attributes,$default);
	$att = '';
	foreach ($default as $key => $val){
		$att .= $key . '="' . $val . '" ';
	}
	return $att;
}


// ------------------------------------------------------------------------

/**
 * Attributes To String
 * Helper function used by some of the form helpers
 */
function _attributes_to_string($attributes, $formtag = FALSE){
	if (is_string($attributes) AND strlen($attributes) > 0){
		if ($formtag == TRUE AND strpos($attributes, 'method=') === FALSE){
			$attributes .= ' method="post"';
		}
	return ' '.$attributes;
	}
	if (is_object($attributes) AND count($attributes) > 0){
		$attributes = (array)$attributes;
	}
	if (is_array($attributes) AND count($attributes) > 0){
		$atts = '';
		if ( ! isset($attributes['method']) AND $formtag === TRUE){
			$atts .= ' method="post"';
		}
		foreach ($attributes as $key => $val){
			$atts .= ' '.$key.'="'.$val.'"';
		}
		return $atts;
	}
}
function tinyMCE($name,$id,$value,$width='99%',$height=450,$theme = 'advanced'){
	$tinyForm = '';
    $tinyForm .= '<textarea name="'.$name.'" id="'.$id.'" style="width:'.$width.';height:'.$height.'px">'.$value.'</textarea>';
    $tinyForm .=   '<script type="text/javascript">
            tinyMCE.init({
                mode:"exact",
                elements:"'.$id.'",
                theme:"'.$theme.'",
                plugins : "autolink,lists,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
                relative_urls : false,
                // Example content CSS (should be your site CSS)
				content_css : false,
        		// using false to ensure that the default browser settings are used for best Accessibility
        		// ACCESSIBILITY SETTINGS
        		theme : "advanced",
				plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

				// Theme options
				theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
				theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
				theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
				theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
				theme_advanced_toolbar_location : "top",
				theme_advanced_toolbar_align : "left",
				theme_advanced_statusbar_location : "bottom",
				theme_advanced_resizing : true,

				

				// Drop lists for link/image/media/template dialogs
				template_external_list_url : "js/template_list.js",
				external_link_list_url : "js/link_list.js",
				external_image_list_url : "js/image_list.js",
				media_external_list_url : "js/media_list.js",
				
            })
            </script>';
	return $tinyForm;
}
class form{
    var $form_name = 'add_new';
    private $array_element = array();
    
    function textnote($arrStr = array()){
        if(is_string($arrStr)){
            $arrStr = array($arrStr);
        }
        $textnote = '<div class="form-textnote">';
        foreach($arrStr as $note){
            $textnote .= '<span class="form-asterick">*</span><span class="muted">'.$note.'</span><br />';
        }
        $textnote .= '</div>';
        return $textnote;
    }
    private function create_control($attribute = array(), $control = ''){
        $default = array('label'=>'', 'id'=>'', 'require'=> 0, 'errorMsg'=> '', 'helptext'=>'', 'helpblock'=> '','class'=>'');
        $default = _extend_attributes($attribute,$default);
        $form = '<div class="form-group">';
		
		//require
		$require = $default['require'] ? '<span class="form-asterick">*</span>' : '';
		if($default['require']){
            //add element to array
            $this->array_element[] = array('id'=>$default['id'],'msg'=>$default['errorMsg']);
		}		
        $form .= '<label class="control-label fl" for="'.$default['id'].'">'.$require.$default['label'].'</label>';
        if($default['helptext']){
			$form .= '<div class="controls '.$default['class'].'">'.$control.'<span class="help-inline">'.$default['helptext'].'</span></div>';
		}elseif($default['helpblock']){
			$form .= '<div class="controls '.$default['class'].'">'.$control.'<span class="help-block">'.$default['helpblock'].'</span></div>';
		}else{
			$form .= '<div class="controls '.$default['class'].'">'.$control.'</div>';
		}
		
        $form .= '</div>';
        
        return $form;
    }
    
    function form_open($name = 'add_new',$action = ''){
        $this->form_name = $name ? $name : 'add_new';
        $form = form_open_multipart($action, 'name="'.$this->form_name.'" class="form-horizontal" onsubmit="checkJavascript();return false;"');
        return $form;
    }
    function form_close($extra = ''){
        $jstring = array('form_name'=>$this->form_name,'elements'=>$this->array_element);
        $jstring = json_encode($jstring);
        $extra .= '<script type="text/javascript">
            function checkJavascript(){
                validForm(\''.$jstring.'\');
            }
            </script>';
        return form_close($extra);
    }
    
    function showImagesGallery($attribute = array()){
      $default = array('label'=>'', 'id'=>'', 'require'=> 0, 'name'=> '', 'value'=>'','class'=>'');
      $default = _extend_attributes($attribute,$default);
      return  '<div class="form-group">
                  <label class="control-label fl" for="'.$default['id'].'">'.$default['label'].'</label>
                  <div class="controls '.$default['class'].'">
                     <a href="javascript:;" onclick="return showImagesGallery(\'avatar\',\''.$default['name'].'\')">
                        <button class="btn btn-success" type="button" id="'.$default['id'].'"><i class="fa fa-plus-square"></i> Thư viện ảnh </button>
                     </a>'.form_hidden($default['name'],$default['value']).'
                     <div class="imu_image '.$default['name'].'_block"'.(($default['value']) ? 'style="display:block"':'').'>
                        <img src="'.$default['value'].'" width="150px"/>
                        <a href="javascript:;" class="del_imu" onclick="return del_imu(\''.$default['name'].'\')"><i class="fa fa-times"></i></a>
                     </div>
                  </div>
               </div>';
      
    }
    /*
		array : label, name, id, value, extra, require, errorMsg, helptext, placeholder
	*/
    function text($attribute = array(), $width = 0, $inputSpan = 'form-control'){
        $extra = ' id="'.$attribute['id'].'" ';
        $extra .= $inputSpan ? ' class="'.$inputSpan.'"' : ($width ? ' width ="'.$width.'"': '') ;
        if(isset($attribute['title'])){
            $extra .= ' title="'.$attribute['title'].'"';
        }
        if(isset($attribute['placeholder'])){
            $extra .= ' placeholder="'.$attribute['placeholder'].'"';
        }
        if(isset($attribute['isdatepicker'])){
            $extra .= ' datepick-element="1" ';
        }
        if(isset($attribute['autocomplete'])){
            $extra .= ' js-autocomplete="1" ';
        }
        if(isset($attribute['extra'])){
            $extra .= $attribute['extra'];
        }
		if(isset($attribute['readonly'])){
            $extra .= $attribute['readonly'];
        }
		if(isset($attribute['isdatetimepicker'])){
            $extra .= ' datetimepick-element="1" ';
        }
        if(!isset($attribute['value'])) $attribute['value'] = '';        
        $control = form_input($attribute['name'],$attribute['value'],$extra);
        return $this->create_control($attribute,$control);
    }
    function password($attribute = array(), $width = 0, $inputSpan = 'form-control'){
        $extra = ' id="'.$attribute['id'].'" ';
        $extra .= $inputSpan ? ' class="'.$inputSpan.'"' : ($width ? ' width ="'.$width.'"': '') ;
        if(isset($attribute['title'])){
            $extra .= ' title="'.$attribute['title'].'"';
        }
        if(isset($attribute['placeholder'])){
            $extra .= ' placeholder="'.$attribute['placeholder'].'"';
        }
        if(isset($attribute['isdatepicker'])){
            $extra .= ' datepick-element="1" ';
        }
        if(isset($attribute['extra'])){
            $extra .= $attribute['extra'];
        }
        if(!isset($attribute['value'])) $attribute['value'] = '';        
        $control = form_password($attribute['name'],$attribute['value'],$extra);
        return $this->create_control($attribute,$control);
    }
    function checkbox($attribute = array()){
    	/*
		array : label, name, id, value, currentValue, extra, require, errorMsg, helptext
    	*/
		$extra = ' id='.$attribute['id'];
		if(isset($attribute['title'])){
            $extra .= ' title="'.$attribute['title'].'"';
        }
		if(!isset($attribute['value'])) $attribute['value'] = '';
		$checked = FALSE;
		if(!isset($attribute['currentValue'])) $attribute['currentValue'] = '';
		if(isset($attribute['value']) && $attribute['value']){
			if(isset($attribute['currentValue']) && $attribute['currentValue'] == $attribute['value'])
				$checked = TRUE;
			else $checked = FALSE;
		}
        if(isset($attribute['extra'])){
            $extra .= $attribute['extra'];
        }
        $control = form_checkbox($attribute['name'], $attribute['value'], $checked, $extra);
		return $this->create_control($attribute, $control);
    }
	function radio($attribute = array()){
		/*
		array : label, name, id, value, currentValue, extra, require, errorMsg, helptext
    	*/
		$extra = ' id='.$attribute['id'];
		if(isset($attribute['title'])){
            $extra .= ' title="'.$attribute['title'].'"';
        }
		if(!isset($attribute['value'])) $attribute['value'] = '';
		$checked = FALSE;
		if(!isset($attribute['currentValue'])) $attribute['currentValue'] = '';
		if(isset($attribute['value']) && $attribute['value']){
			if(isset($attribute['currentValue']) && $attribute['currentValue'] == $attribute['value'])
				$checked = TRUE;
			else $checked = FALSE;
		}
        if(isset($attribute['extra'])){
            $extra .= $attribute['extra'];
        }
        $control = form_radio($attribute['name'], $attribute['value'], $checked, $extra);
		return $this->create_control($attribute, $control);
	}
	function tinyMCE($titleControl,$name,$id,$value,$width='99%',$height=450,$theme = 'advanced'){
		$tinyForm = '';
        $tinyForm .= '<div class="form-group tinyMCE-wrapper" style="text-align:left; width:' . $width . '">' ;        
        $tinyForm .= '<label class="control-label fl" for="'.$id.'">'.$titleControl.'</label>';
        $tinyForm .= '<div class="controls col-sm-9">
                      <button onclick="return showImagesGallery(\'tinymce\',\''.$id.'\')" class="btn btn-success mgb5" type="button" id=""><i class="fa fa-plus-square"></i> Thư viện ảnh </button>';
        $tinyForm .= '<textarea name="'.$name.'" id="'.$id.'" style="width:'.$width.';height:'.$height.'px">'.$value.'</textarea></div>';
        $tinyForm .= '<script type="text/javascript">
                         tinymce.init({
                               plugins: "fullpage",
                               fullpage_default_encoding: "UTF-8",
                               entity_encoding : "raw",
                               selector: "#'.$id.'",
                               plugins: [
                                   "advlist autolink lists link image charmap print preview anchor",
                                   "searchreplace visualblocks code fullscreen",
                                   "insertdatetime media table contextmenu paste",
                                   "textcolor"
                               ],
                               toolbar: "insertfile undo redo | styleselect | bold italic underline fontsizeselect forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link "
                           })
                         </script>';
        $tinyForm .= '</div>';
		return $tinyForm;
    }
	
	function textarea($attribute = array()){
		$extra = ' id='.$attribute['id'];
		if(isset($attribute['title'])){
            $extra .= ' title="'.$attribute['title'].'"';
        }
		if(isset($attribute['style'])){
            $extra .= ' style="'.$attribute['style'].'"';
		}
		if(!isset($attribute['value'])) $attribute['value'] = '';
        if(isset($attribute['extra'])){
            $extra .= $attribute['extra'];
        }
		$control = form_textarea($attribute['name'], $attribute['value'],$extra);
		return $this->create_control($attribute,$control);
	}
    
   function select($attribute = array()){
      $extra = ' id="'.$attribute['id'].'"';
      if(isset($attribute['title'])){
            $extra .= ' title="'.$attribute['title'].'"';
        }
      if(isset($attribute['style'])){
            $extra .= ' style="'.$attribute['style'].'"';
      }
      if(!isset($attribute['selected'])) $attribute['selected'] = '';
      if(!isset($attribute['value'])) $attribute['value'] = '';
      if(isset($attribute['extra'])){
         $extra .= $attribute['extra'];
      }
      if(isset($attribute['class'])){
         $extra .= ' class="form-control"';
      }
      $control = form_dropdown($attribute['name'],$attribute['option'],$attribute['selected'],$extra);
      return $this->create_control($attribute,$control);
    }
    function select_m8($attribute = array()){
        $extra = ' id="'.$attribute['id'].'"';
		if(isset($attribute['title'])){
            $extra .= ' title="'.$attribute['title'].'"';
        }
		if(isset($attribute['style'])){
            $extra .= ' style="'.$attribute['style'].'"';
		}
        if(!isset($attribute['selected'])) $attribute['selected'] = '';
		if(!isset($attribute['value'])) $attribute['value'] = '';
        if(isset($attribute['extra'])){
            $extra .= $attribute['extra'];
        }
        $control = form_dropdown_m8($attribute['name'],$attribute['option'],$attribute['selected'],$extra,$attribute['option_attr']);
        return $this->create_control($attribute,$control);
    }
    
    function button($attribute = array()){
        
    }
    
    function getFile($attribute = array()){
        $extra = '';
        $extra .= 'id = "'.$attribute['id'].'"';
        if(isset($attribute['extra'])){
            $extra .= ' '.$attribute['extra'] . ' ';
        }
        if(isset($attribute['size']) && $attribute['size']){
            $extra .= ' size="'.$attribute['size'].'"';
        }
        if(isset($attribute['title']) && $attribute['title']){
            $extra .= ' title="'.$attribute['title'].'"';
        }
        $control = form_upload($attribute['name'],'',$extra);
        return $this->create_control($attribute,$control);
    }
    
    function form_action($attribute = array()){
        if(is_string($attribute['label'])){
            $attribute['label'] = array($attribute['label']);
        }
        if(is_string($attribute['type'])){
            $attribute['type'] = array($attribute['type']);
        }
        $form = '<div class="form-actions">';
        $form .= form_hidden('action','execute');
        foreach($attribute['label'] as $key=>$btn){
            if($attribute['type'][$key] == 'submit'){
                $class = 'btn btn-primary';
                $type = 'submit';
            }
            if($attribute['type'][$key] == 'reset'){
                $class = 'btn';
                $type = 'reset';
            }
            $form .= '<button type="'.$type.'" class="'.$class.'">'.$btn.'</button>&nbsp;';
        }
        $form .= '</div>';
        return $form;
    }
    function form_action_add() {
        $form = '<div class="form-actions">';
        $form .= form_hidden('action','execute');
         //$form .= '<button type="submit" name="redirect" value="1" class="btn btn-success">Cập nhật</button>&nbsp;';
         $form .= '<button type="submit" class="btn btn-info">Đăng tin</button>&nbsp;';
         //$form .= '<button type="reset" class="btn">Nhập lại</button>&nbsp;';
         //$form .= '<button type="button" onclick="window.location=\'listing.php\'" class="btn btn-danger">Thoát</button>&nbsp;';
        $form .= '</div>';
        return $form;
    }
    function form_action_edit() {
        $form = '<div class="form-actions">';
        $form .= form_hidden('action','execute');
         //$form .= '<button type="submit" name="redirect" value="1" class="btn btn-success">Lưu lại</button>&nbsp;';
         $form .= '<button type="submit" class="btn btn-info">Lưu</button>&nbsp;';
         //$form .= '<button type="button" onclick="window.location=\'listing.php\'" class="btn btn-danger">Thoát</button>&nbsp;';
        $form .= '</div>';
        return $form;
    }
    function form_preview($link = '#') {
        $form = '<div class="form-preview">
                  <a href="'.$link.'" target="_blank" class="btn btn-primary"><i class="fa fa-eye"></i> Xem trước</a>
               </div>';
        return $form;
    }
    function seoMeta($table_name = '',$post_id = 0){
         $form = '<div class="wrap_seometa">
                     <h2>Nội dung cho Seo</h2>';
        //Nếu là file add để rỗng trường post_id
        if($table_name != '' && $post_id == 0 ) {
            $form .= '<div class="preview_snippet">
                        <h4>Xem trước hiển thị tìm kiếm trên Google</h4>
                        <div class="preview_snippet_main">
                           <h3 class="preview_snippet_title"></h3>
                           <p class="preview_snippet_link">http://'.$_SERVER['HTTP_HOST'].'/bai-viet-so-1.html</p>
                           <p class="preview_snippet_des"></p>
                        </div>
                     </div>';
            $form .= '<div class="form-group">
                        <label for="'.$table_name.'_title" class="control-label"><span class="form-asterick"></span>Tiêu đề cho thẻ meta title (SEO)</label>
                        <div class="controls  col-sm-9">
                            <input type="text" placeholder="Tiêu đề tốt nhất 60 - 70 ký tự" class="form-control col-sm-9 in_title" id="'.$table_name.'_title" value="" name="seo_title">
                            <span class="in_title_count">0</span> ký tự. Tiêu đề (title) tốt nhất khoảng 60 - 70 ký tự
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="'.$table_name.'_description" class="control-label"><span class="form-asterick"></span>Đoạn mô tả cho thẻ meta description (SEO)</label>
                        <div class="controls col-sm-9">
                            <textarea placeholder="Mô tả khoảng 160 ký tự" class="span6 in_des" id="'.$table_name.'_description" value="" name="seo_description" style="width:100%;height:60px"></textarea>
                            <span class="in_des_count">0</span> ký tự. Mô tả (description) tốt nhất khoảng 120 - 160 ký tự
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="'.$table_name.'_robots" class="control-label"><span class="form-asterick"></span>Điều hướng Robots</label>
                        <div class="controls col-sm-3">
                           <select id="'.$table_name.'_robots" name="seo_robots" class="form-control">
                              <option value="Index,Follow">Index,Follow</option>
                              <option value="Noindex,Nofollow">Noindex,Nofollow</option>
                              <option value="Index,Nofollow">Index,Nofollow</option>
                              <option value="Noindex,Follow">Noindex,Follow</option>
                           </select>
                        </div>
                    </div>';
        }
        //Nếu là file edit truyền đủ tên bảng và post_id (id bài viết)
        if($table_name != '' && $post_id != 0 ) {
            $db_meta_seo = new db_query('SELECT * FROM meta_seo WHERE met_type = "'.$table_name.'" AND met_post_id = '.$post_id.' LIMIT 1');
            $meta_seo = mysql_fetch_assoc($db_meta_seo->result);unset($db_meta_seo);
            $form .= '<div class="preview_snippet">
                        <h4>Xem trước hiển thị tìm kiếm trên Google</h4>
                        <div class="preview_snippet_main">
                           <h3 class="preview_snippet_title">'.$meta_seo['met_title'].'</h3>
                           <p class="preview_snippet_link">http://'.$_SERVER['HTTP_HOST'].'/bai-viet-so-1.html</p>
                           <p class="preview_snippet_des">'.$meta_seo['met_description'].'</p>
                        </div>
                     </div>';
            $form .= '<div class="form-group">
                        <label for="'.$table_name.'_title" class="control-label"><span class="form-asterick"></span>Tiêu đề cho thẻ meta title (SEO)</label>
                        <div class="controls col-sm-9">
                            <input type="text" placeholder="Tiêu đề tốt nhất 60 - 70 ký tự" class="form-control col-sm-9 in_title" id="'.$table_name.'_title" value="'.$meta_seo['met_title'].'" name="seo_title">
                            <span class="in_title_count">'.strlen($meta_seo['met_title']).'</span> ký tự. Tiêu đề (title) tốt nhất khoảng 60 - 70 ký tự
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="'.$table_name.'_description" class="control-label"><span class="form-asterick"></span>Đoạn mô tả cho thẻ meta description (SEO)</label>
                        <div class="controls col-sm-9">
                            <textarea placeholder="Mô tả khoảng 160 ký tự" class="span6 in_des" id="'.$table_name.'_description" name="seo_description" style="width:100%;height:60px">'.$meta_seo['met_description'].'</textarea>
                            <span class="in_des_count">'.strlen($meta_seo['met_description']).'</span> ký tự. Mô tả (description) tốt nhất khoảng 120 - 160 ký tự
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="'.$table_name.'_robots" class="control-label"><span class="form-asterick"></span>Điều hướng Robots</label>
                        <div class="controls col-sm-3">
                           <select id="'.$table_name.'_robots" name="seo_robots" class="form-control">
                              <option value="Index,Follow" '.($meta_seo['met_robots'] == 'Index,Follow' ? ' selected="selected"' : '').'>Index,Follow</option>
                              <option value="Noindex,Nofollow" '.($meta_seo['met_robots'] == 'Noindex,Nofollow' ? ' selected="selected"' : '').'>Noindex,Nofollow</option>
                              <option value="Index,Nofollow" '.($meta_seo['met_robots'] == 'Index,Nofollow' ? ' selected="selected"' : '').'>Index,Nofollow</option>
                              <option value="Noindex,Follow" '.($meta_seo['met_robots'] == 'Noindex,Follow' ? ' selected="selected"' : '').'>Noindex,Follow</option>
                           </select>
                        </div>
                    </div>';
        }
        $form .= '<script>
                    $(".in_title").on("keyup",function(){
                        $(".preview_snippet_title").html($(this).val());
                        $(".in_title_count").html($(this).val().length);
                    });
                    $(".in_des").on("keyup",function(){
                        $(".preview_snippet_des").html($(this).val());
                        $(".in_des_count").html($(this).val().length);
                    });
                 </script>';
        $form .= '</div>';
        
        return $form;
    }
}
?>