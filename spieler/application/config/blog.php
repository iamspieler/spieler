<?php defined('SYSPATH') or die('No direct script access');
return array(
    'mod_title'       => __('Blog'),
    'items_by_page'  => 10, // записей на страницу
    'ap_items_by_page'  => 15, // записей на страницу в админке
	'url_type'  => 2, // тип урла: 0 - id, 1 - blog_url, 2 - дата и blog_url
    'mod_w_by_page'  => 2, // записей на страницу в виджете
    'mod_np_w'  => 800,
    'mod_np_h'  => 600,
    'mod_nps_w'  => 300,
    'mod_nps_h'  => 150,
    'mod_npm_w'  => 665,
    'mod_npm_h'  => 333,
    'mod_np_watermark'  => false,
    'mod_np_watermark_file'  => 'white.png',
    'widgets_list' => array(
	'getbanner',
    ),
    'widgets_view' => array(
	'lastnews',
    ),
    
);