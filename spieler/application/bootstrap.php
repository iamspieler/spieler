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

Kohana::$log->attach(new Log_File(APPPATH.'logs'));

Kohana::$config->attach(new Config_File);

Kohana::modules(array(
	'alt-error'       => MODPATH.'alt-error',
	'auth'       => MODPATH.'auth',       // Basic authentication
	'cache'      => MODPATH.'cache',      // Caching with multiple backends
	'database'   => MODPATH.'database',   // Database access
	'debug_toolbar'   => MODPATH.'debug_toolbar',
	'image'      => MODPATH.'image',      // Image manipulation
	'imagefly'   => MODPATH.'imagefly',
	'orm'        => MODPATH.'orm',        // Object Relationship Mapping
	'pagination'        => MODPATH.'pagination'
	));

// Define admin path
define('ADMINURL', 'panel');
define('ADMINPATH', DOCROOT.DIRECTORY_SEPARATOR.'Admin'.DIRECTORY_SEPARATOR);	


// массив урлов контроллеров
$ctrl_array = Kohana::$config->load('controllers');
	
/**
 * Routes
 */


 

/**
 * Backend routes
 */

Route::set('blog_index_pg', $ctrl_array['blog'].'(/page(/<page>))', array('page' => '[0-9]+'))
        ->defaults(array(
			'controller' => 'blog',
			'action'     => 'index'
        ));


Route::set('blog_index', $ctrl_array['blog'])
        ->defaults(array(
			'controller' => 'blog',
            'action'     => 'index',
			'lang'        => 'ru'
        ));
Route::set('blog_by_section', $ctrl_array['blog'].'/sections/<section>', array('section' => '[a-z0-9_\-]+'))
        ->defaults(array(
	        'controller' => 'blog',
	        'action'     => 'by_section'
        ));	
		
Route::set('blog_entry_archive', $ctrl_array['blog'].'/<year>/<month>/<day>/<slug>', array('year' => '\d{4}', 'month' => '\d{2}', 'day' => '\d{2}', 'slug' => '[a-z0-9_\-]+'))
        ->defaults(array(
	        'controller' => 'blog',
	        'action'     => 'entry_archive'
        ));			
		
Route::set('blog_archive', $ctrl_array['blog'].'/<year>(/<month>(/<day>))', array('year' => '\d{4}', 'month' => '\d{2}', 'day' => '\d{2}'))
        ->defaults(array(
	        'controller' => 'blog',
	        'action'     => 'archive'
        ));			
		
Route::set('blog_entry_id', $ctrl_array['blog'].'(/<lang>)/item/<id>', array('lang' => 'ru', 'id' => '[0-9]+'))
        ->defaults(array(
	        'controller' => 'blog',
	        'action'     => 'entry_id'
        ));
		
Route::set('blog_entry_slug', $ctrl_array['blog'].'(/<lang>)/<slug>', array('lang' => 'ru', 'slug' => '[a-z0-9_\-]+'))
        ->defaults(array(
	        'controller' => 'blog',
	        'action'     => 'entry_slug'
        ));	

Route::set('default', '(<controller>(/<action>(/<id>)))', array('id' => '[a-z0-9_\-]+'))
	->defaults(array(
		'controller' => 'blog',
		'action'     => 'index',
		'lang'        => 'ru'
	));