<?php
defined('BASEPATH') or exit('No direct script access allowed');

function sidebar()
{
	$CI = get_instance();
	$CI->load->model('Template_model');
	return $CI->Template_model->sidebar();
}
function settings($id)
{
	$CI = get_instance();
	$CI->load->model('Template_model');
	return $CI->Template_model->site($id);
}
function news()
{
	$CI = get_instance();
	$CI->load->model('Template_model');
	return $CI->Template_model->news_section();
}
function external_link()
{
	$CI = get_instance();
	$CI->load->model('Template_model');
	return $CI->Template_model->external_link();
}
function load_menu()
{
	$CI = get_instance();
	$CI->load->model('menu_model');
	return $CI->menu_model->get_menu();
}
function permalink($year)
{
	$CI = get_instance();
	$CI->load->model('Template_model');
	$set = $CI->Template_model->site('permalink');
	if ($set == 1) {
		return '';
	} else if ($set == 2) {
		return $year . '/';
	} else if ($set == 0) {
		return 'post/read/';
	}
}
function top_menu()
{
	$CI = get_instance();
	$CI->load->model('menu_model');
	return $CI->menu_model->get_top_menu();
}
function is_login()
{
	$CI = get_instance();
	$CI->load->model('cek_login');
	return $CI->cek_login->is_login();
}
function is_admin()
{
	$CI = get_instance();
	$CI->load->model('cek_login');
	return $CI->cek_login->is_admin();
}
