<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


// bootstrap css
if ( ! function_exists('admin_bt_css_url')){
	function admin_bt_css_url($nom){
		return base_url() . 'assets/admin/bootstrap/' . $nom . '.css';
	}
}

if ( ! function_exists('admin_bt_css')){
	function admin_bt_css($nom){
		return '<link rel="stylesheet" type="text/css" media="all" href="' . admin_bt_css_url($nom) . '" />';
	}
}


// bootstrap js
if ( ! function_exists('admin_bt_js_url')){
	function admin_bt_js_url($nom){
		return base_url() . 'assets/admin/bootstrap/' . $nom . '.js';
	}
}

if ( ! function_exists('admin_bt_js')){
	function admin_bt_js($nom){
		return '<script type="text/javascript"  src="' . admin_bt_js_url($nom) . '" />';
	}
}


// dist css
if ( ! function_exists('admin_dist_css_url')){
	function admin_dist_css_url($nom){
		return base_url() . 'assets/admin/dist/' . $nom . '.css';
	}
}

if ( ! function_exists('admin_dist_css')){
	function admin_dist_css($nom){
		return '<link rel="stylesheet" type="text/css" media="all" href="' . admin_dist_css_url($nom) . '" />';
	}
}


// dist css
if ( ! function_exists('admin_img_url')){
	function admin_img_url($nom){
		return base_url() . 'assets/admin/' . $nom;
	}
}

if ( ! function_exists('admin_img')){
	function admin_img($nom,$class,$alt){
		return '<img media="all" src="' . admin_img_url($nom) . '" class="'.$class.'"  alt="'.$alt.'"  />';
	}
}


// dist css
if ( ! function_exists('admin_js_url')){
	function admin_js_url($nom){
		return base_url() . 'assets/admin/' . $nom.'.js';
	}
}
if ( ! function_exists('jquery_js')){
	function jquery_js($nom){
		return base_url() . 'assets/javascript/js/' . $nom.'.js';
	}
}

if ( ! function_exists('admin_js')){
	function admin_js($nom){
		return '<script src="' . admin_js_url($nom) . '"  ></script>';
	}
}

// plugins css
if ( ! function_exists('admin_plugins_css_url')){
	function admin_plugins_css_url($nom){
		return base_url() . 'assets/admin/plugins/' . $nom . '.css';
	}
}

if ( ! function_exists('admin_plugins_css')){
	function admin_plugins_css($nom){
		return '<link rel="stylesheet" type="text/css" media="all" href="' . admin_plugins_css_url($nom) . '" />';
	}
}







