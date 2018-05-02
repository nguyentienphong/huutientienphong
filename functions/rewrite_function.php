<?php
function generate_faqs_detail_url($forms) {
    return '/hoi-dap/' .removeTitle($forms['faq_title']). '-' .$forms['faq_id']. '.html';
}

function generate_faqs_cat_url($forms_cat) {
    return '/hoi-dap/' .removeTitle($forms_cat['cat_name']). '-' .$forms_cat['cat_id']. '/';
}
function generate_forms_detail_url($forms) {
    return '/bieu-mau/' .removeTitle($forms['for_title']). '-' .$forms['for_id']. '.html';
}

function generate_forms_cat_url($forms_cat) {
    return '/bieu-mau/' .removeTitle($forms_cat['cat_name']). '-' .$forms_cat['cat_id']. '/';
}
function genarate_page_static_url($page) {
    return '/page/' .removeTitle($page['pag_title']). '-' .$page['pag_id']. '.html';
}
function generate_news_detail_url($news) {
    return '/tin-tuc/' .removeTitle($news['new_title']). '-' .$news['new_id']. '.html';
}

function generate_news_cat_url($news_cat) {
    return '/tin-tuc/' .removeTitle($news_cat['cat_name']). '-' .$news_cat['cat_id']. '/';
}
function generate_services_cat_url($cat) {
    return '/dich-vu/' .removeTitle($cat['cat_name']). '-' .$cat['cat_id']. '/';
}
function generate_services_detail_url($products) {
    return '/dich-vu/' .removeTitle($products['ser_title']). '-' .$products['ser_id']. '.html';
}
function generate_partner_detail_url($partner) {
    return '/doi-tac/' .removeTitle($partner['par_title']). '-' .$partner['par_id']. '.html';
}

function generate_page_detail_url($page) {
    return '/' .removeTitle($page['pag_title']). '-' .$page['pag_id']. '.html';
}

function removeTitle($string,$keyReplace = "/"){
	 $string = removeSign($string);
	 $string  =  trim(preg_replace("/[^A-Za-z0-9]/i"," ",$string)); // khong dau
	 $string  =  str_replace(" ","-",$string);
	 $string = str_replace("--","-",$string);
	 $string = str_replace("--","-",$string);
	 $string = str_replace("--","-",$string);
	 $string = str_replace("--","-",$string);
	 $string = str_replace("--","-",$string);
	 $string = str_replace("--","-",$string);
	 $string = str_replace("--","-",$string);
	 $string = str_replace($keyReplace,"-",$string);
	 return strtolower($string);
}
?>