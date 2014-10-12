<?php defined('SYSPATH') or die('No direct script access.');

// -- Environment setup --------------------------------------------------------

// Load the core Kohana class
require SYSPATH.'classes/kohana/core'.EXT;

if (is_file(APPPATH.'classes/kohana'.EXT))
{
	// Application extends the core
	require APPPATH.'classes/kohana'.EXT;
}
else
{
	// Load empty core extension
	require SYSPATH.'classes/kohana'.EXT;
}

date_default_timezone_set('Europe/Moscow');
setlocale(LC_ALL, 'ru_RU.utf-8');

spl_autoload_register(array('Kohana', 'auto_load'));
ini_set('unserialize_callback_func', 'spl_autoload_call');

Cookie::$salt = '345426895456098123';



I18n::lang('ru-ru');


if (isset($_SERVER['KOHANA_ENV']))
{
	Kohana::$environment = constant('Kohana::'.strtoupper($_SERVER['KOHANA_ENV']));
}


Kohana::init(array(
	'base_url'   => '/spieler/',
	'index_file' => FALSE,
	'caching' => FALSE
));

Kohana::$config->attach(new Config_File);

Kohana::modules(array(
	'kohana-log'       => MODPATH.'kohana-log',
	'captcha'       => MODPATH.'captcha',
	'currency'       => MODPATH.'currency',
	'auth'       => MODPATH.'auth',       // Basic authentication
	'cache'      => MODPATH.'cache',      // Caching with multiple backends
	'database'   => MODPATH.'database',   // Database access
	'debug_toolbar'   => MODPATH.'debug_toolbar',
	'image'      => MODPATH.'image',      // Image manipulation
	'imagefly'   => MODPATH.'imagefly',
	'nested-sets'       => MODPATH.'nested-sets',
	'orm'        => MODPATH.'orm',        // Object Relationship Mapping
	'pagination'        => MODPATH.'pagination',
	'sitemap'       => MODPATH.'sitemap'
	));

//Kohana::$log->attach(new Log_File(APPPATH.'logs'));
Kohana::$log->attach(new Log_Writer_File(APPPATH.'logs'));
	
// Define admin path
define('ADMINURL',  Kohana::$config->load('global.site_apanel'));
define('ADMINPATH', DOCROOT.DIRECTORY_SEPARATOR.'Admin'.DIRECTORY_SEPARATOR);	


// массив урлов контроллеров
$ctrl_array = Kohana::$config->load('controllers');

// получаем список языков для подстановки в роуты
$lang_array = Kohana::$config->load('lang');
$lang_list = implode("|", array_keys(get_object_vars($lang_array)));

// переменная с массивом языков для подстановки в шаблоны
$lang_view = get_object_vars($lang_array);
View::bind_global('lang_array', $lang_view);
/**
 * Routes
 */


 

/**
 * Backend routes
 */

Route::set('default-logout', 'logout')
	->defaults(array(
		'controller' => 'login',
		'action'     => 'logout',
	)); 
Route::set('default-login', 'login')
	->defaults(array(
		'controller' => 'login',
		'action'     => 'index',
	));
Route::set('ap_blog_items_pg', ADMINURL.'(/'.$ctrl_array['blog'].'(/items(/page(/<page>))))', array('page' => '[0-9]+'))
    ->defaults(array(
	    'directory'  => 'admin',
		'controller' => 'blog',
		'action'     => 'index',
    ));
Route::set('ap_blog_items', ADMINURL.'(/'.$ctrl_array['blog'].'(/items))')
	->defaults(array(
	        'directory'  => 'admin',
			'controller' => 'blog',
			'action'     => 'index'
	));	
Route::set('ap_blog_items_post', ADMINURL.'(/'.$ctrl_array['blog'].'(/items(/post)))')
        ->defaults(array(
			'directory'  => 'admin',
            'controller' => 'blog',
            'action'     => 'items_post',
        )); 
Route::set('ap_blog_items_add', ADMINURL.'(/'.$ctrl_array['blog'].'(/items(/<act>(/<id>))))', array('act' => 'add|edit', 'id' => '[0-9]+'))
	->defaults(array(
	    'directory'  => 'admin',
		'controller' => 'blog',
		'action'     => 'items_form'
	));	

Route::set('ap_blog_sections', ADMINURL.'(/'.$ctrl_array['blog'].'(/sections))')
	->defaults(array(
	        'directory'  => 'admin',
			'controller' => 'blog',
			'action'     => 'sections'
	));	
Route::set('ap_blog', ADMINURL.'(/'.$ctrl_array['blog'].')')
	->defaults(array(
	        'directory'  => 'admin',
			'controller' => 'blog',
			'action'     => 'index'
	));




Route::set('default-admin', ADMINURL.'(/<controller>(/<action>(/<id>)))')
	->defaults(array(
	        'directory'  => 'admin',
		'controller' => 'blog',
		'action'     => 'indgex',
	));		
/**
 * Frontend routes
 */	
Route::set('pages','(<lang>/)'.$ctrl_array['pages'])
    ->defaults(array(
        'controller' => 'pages',
        'action'     => 'view',
    ));
Route::set('pages_new','(<lang>/)'.$ctrl_array['pages'].'/new')
    ->defaults(array(
        'controller' => 'pages',
        'action'     => 'new',
    ));
Route::set('pages_save','(<lang>/)'.$ctrl_array['pages'].'/save')
    ->defaults(array(
        'controller' => 'pages',
        'action'     => 'save',
    ));
	
Route::set('blog_index_pg', '(<lang>/)'.$ctrl_array['blog'].'(/page(/<page>))', array('lang' => $lang_list, 'page' => '[0-9]+'))
        ->defaults(array(
			'controller' => 'blog',
			'action'     => 'index'
        ));
Route::set('blog_sm', '(<lang>/)'.$ctrl_array['blog'].'/sitemap')
        ->defaults(array(
			'controller' => 'blog',
			'action'     => 'sitemap'
        ));
Route::set('blog_qrcode', '(<lang>/)'.$ctrl_array['blog'].'/qrcode')
        ->defaults(array(
			'controller' => 'blog',
			'action'     => 'qrcode'
        ));
		
Route::set('blog_index', '(<lang>/)'.$ctrl_array['blog'], array('lang' => $lang_list, 'section' => '[a-z0-9_\-]+'))
        ->defaults(array(
			'controller' => 'blog',
            'action'     => 'index',
			'lang'        => 'ru'
        ));
Route::set('blog_by_section', '(<lang>/)'.$ctrl_array['blog'].'/sections/<section>(/page(/<page>))', array('lang' => $lang_list, 'section' => '[a-z0-9_\-]+', 'page' => '[0-9]+'))
        ->defaults(array(
	        'controller' => 'blog',
	        'action'     => 'by_section'
        ));	
		
Route::set('blog_rss', '(<lang>/)'.$ctrl_array['blog'].'/rss')
        ->defaults(array(
	        'controller' => 'blog',
	        'action'     => 'rss'
        ));	
		
Route::set('blog_archive_pg_d', '(<lang>/)'.$ctrl_array['blog'].'/<year>(/page(/<page>))', array('lang' => $lang_list, 'year' => '\d{4}', 'month' => '\d{2}', 'day' => '\d{2}', 'page' => '[0-9]+'))
        ->defaults(array(
			'controller' => 'blog',
			'action'     => 'archive'
        ));
Route::set('blog_archive_pg_m', '(<lang>/)'.$ctrl_array['blog'].'/<year>(/<month>(/page(/<page>)))', array('lang' => $lang_list, 'year' => '\d{4}', 'month' => '\d{2}', 'day' => '\d{2}', 'page' => '[0-9]+'))
        ->defaults(array(
			'controller' => 'blog',
			'action'     => 'archive'
        ));
Route::set('blog_archive_pg_y', '(<lang>/)'.$ctrl_array['blog'].'/<year>(/<month>(/<day>(/page(/<page>))))', array('lang' => $lang_list, 'year' => '\d{4}', 'month' => '\d{2}', 'day' => '\d{2}', 'page' => '[0-9]+'))
        ->defaults(array(
			'controller' => 'blog',
			'action'     => 'archive'
        ));		
Route::set('blog_entry_archive', '(<lang>/)'.$ctrl_array['blog'].'/<year>/<month>/<day>/<slug>', array('lang' => $lang_list, 'year' => '\d{4}', 'month' => '\d{2}', 'day' => '\d{2}', 'slug' => '[a-z0-9_\-]+'))
        ->defaults(array(
	        'controller' => 'blog',
	        'action'     => 'entry_archive'
        ));	
		



		
Route::set('blog_archive', '(<lang>/)'.$ctrl_array['blog'].'/<year>(/<month>(/<day>))', array('lang' => $lang_list, 'year' => '\d{4}', 'month' => '\d{2}', 'day' => '\d{2}'))
        ->defaults(array(
	        'controller' => 'blog',
	        'action'     => 'archive'
        ));			
		
Route::set('blog_entry_id', '(<lang>/)'.$ctrl_array['blog'].'/item/<id>', array('lang' => $lang_list, 'id' => '[0-9]+'))
        ->defaults(array(
	        'controller' => 'blog',
	        'action'     => 'entry_id'
        ));
		
Route::set('blog_entry_slug', '(<lang>/)'.$ctrl_array['blog'].'/<slug>', array('lang' => $lang_list, 'slug' => '[a-z0-9_\-]+'))
        ->defaults(array(
	        'controller' => 'blog',
	        'action'     => 'entry_slug'
        ));	
		
Route::set('default-lang', '<lang>', array('lang' => $lang_list))
	->defaults(array(
		'controller' => 'blog',
		'action'     => 'index'
	));

Route::set('default', '(<controller>(/<action>(/<id>)))', array('id' => '[a-z0-9_\-]+'))
	->defaults(array(
		'controller' => 'blog',
		'action'     => 'index'
	));