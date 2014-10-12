<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2014-05-23 10:22:45 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected T_IS_EQUAL, expecting ',' or ')' ~ APPPATH\classes\model\Blog.php [ 598 ] in file:line
2014-05-23 10:22:45 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-05-23 10:22:57 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected T_IS_EQUAL, expecting ',' or ')' ~ APPPATH\classes\model\Blog.php [ 627 ] in file:line
2014-05-23 10:22:57 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-05-23 10:24:20 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected T_IS_EQUAL, expecting ',' or ')' ~ APPPATH\classes\model\Blog.php [ 627 ] in file:line
2014-05-23 10:24:20 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-05-23 10:24:21 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected T_IS_EQUAL, expecting ',' or ')' ~ APPPATH\classes\model\Blog.php [ 627 ] in file:line
2014-05-23 10:24:21 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-05-23 10:24:22 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected T_IS_EQUAL, expecting ',' or ')' ~ APPPATH\classes\model\Blog.php [ 627 ] in file:line
2014-05-23 10:24:22 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-05-23 10:34:13 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected T_IS_EQUAL, expecting ',' or ')' ~ APPPATH\classes\model\Blog.php [ 627 ] in file:line
2014-05-23 10:34:13 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-05-23 11:08:38 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Model_Blog::get_entry() ~ APPPATH\classes\controller\Blog.php [ 197 ] in file:line
2014-05-23 11:08:38 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-05-23 11:28:09 --- CRITICAL: ErrorException [ 8 ]: Undefined index: item_publish_date ~ APPPATH\views\Blog\View.php [ 5 ] in D:\OpenServer\domains\localhost\spieler\application\views\Blog\View.php:5
2014-05-23 11:28:09 --- DEBUG: #0 D:\OpenServer\domains\localhost\spieler\application\views\Blog\View.php(5): Kohana_Core::error_handler(8, 'Undefined index...', 'D:\OpenServer\d...', 5, Array)
#1 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(61): include('D:\OpenServer\d...')
#2 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(348): Kohana_View::capture('D:\OpenServer\d...', Array)
#3 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 D:\OpenServer\domains\localhost\spieler\application\views\Main.php(59): Kohana_View->__toString()
#5 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(61): include('D:\OpenServer\d...')
#6 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(348): Kohana_View::capture('D:\OpenServer\d...', Array)
#7 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Blog))
#11 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#13 D:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#14 {main} in D:\OpenServer\domains\localhost\spieler\application\views\Blog\View.php:5
2014-05-23 11:28:11 --- CRITICAL: ErrorException [ 8 ]: Undefined index: item_publish_date ~ APPPATH\views\Blog\View.php [ 5 ] in D:\OpenServer\domains\localhost\spieler\application\views\Blog\View.php:5
2014-05-23 11:28:11 --- DEBUG: #0 D:\OpenServer\domains\localhost\spieler\application\views\Blog\View.php(5): Kohana_Core::error_handler(8, 'Undefined index...', 'D:\OpenServer\d...', 5, Array)
#1 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(61): include('D:\OpenServer\d...')
#2 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(348): Kohana_View::capture('D:\OpenServer\d...', Array)
#3 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 D:\OpenServer\domains\localhost\spieler\application\views\Main.php(59): Kohana_View->__toString()
#5 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(61): include('D:\OpenServer\d...')
#6 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(348): Kohana_View::capture('D:\OpenServer\d...', Array)
#7 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Blog))
#11 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#13 D:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#14 {main} in D:\OpenServer\domains\localhost\spieler\application\views\Blog\View.php:5
2014-05-23 11:37:41 --- CRITICAL: Database_Exception [ 1054 ]: Unknown column 'DB::expr("YEAR(item_publish_date)")' in 'where clause' [ SELECT `id_item`, `item_title`, `item_url`, `item_text`, `item_text_full`, `item_publish_date` FROM `site_sblog_items` WHERE `item_status` = 1 AND `DB::expr("YEAR(item_publish_date)")` = '2014' AND `DB::expr("MONTH(item_publish_date)")` = '02' AND `DB::expr("DAY(item_publish_date)")` = '02' AND `item_url` = 'item2' ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in D:\OpenServer\domains\localhost\kohana3\modules\database\classes\Kohana\Database\Query.php:251
2014-05-23 11:37:41 --- DEBUG: #0 D:\OpenServer\domains\localhost\kohana3\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(1, 'SELECT `id_item...', false, Array)
#1 D:\OpenServer\domains\localhost\spieler\application\classes\model\Blog.php(679): Kohana_Database_Query->execute()
#2 D:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php(258): Model_Blog->get_entry_archive('item2', '2014', '02', '02')
#3 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(84): Controller_Blog->action_entry_archive()
#4 [internal function]: Kohana_Controller->execute()
#5 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Blog))
#6 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 D:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#9 {main} in D:\OpenServer\domains\localhost\kohana3\modules\database\classes\Kohana\Database\Query.php:251
2014-05-23 11:51:48 --- CRITICAL: ErrorException [ 2 ]: Invalid argument supplied for foreach() ~ APPPATH\views\Blog\List.php [ 1 ] in D:\OpenServer\domains\localhost\spieler\application\views\Blog\List.php:1
2014-05-23 11:51:48 --- DEBUG: #0 D:\OpenServer\domains\localhost\spieler\application\views\Blog\List.php(1): Kohana_Core::error_handler(2, 'Invalid argumen...', 'D:\OpenServer\d...', 1, Array)
#1 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(61): include('D:\OpenServer\d...')
#2 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(348): Kohana_View::capture('D:\OpenServer\d...', Array)
#3 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 D:\OpenServer\domains\localhost\spieler\application\views\Main.php(59): Kohana_View->__toString()
#5 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(61): include('D:\OpenServer\d...')
#6 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(348): Kohana_View::capture('D:\OpenServer\d...', Array)
#7 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Blog))
#11 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#13 D:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#14 {main} in D:\OpenServer\domains\localhost\spieler\application\views\Blog\List.php:1
2014-05-23 12:06:09 --- CRITICAL: Kohana_Exception [ 0 ]: Not an image or invalid image: DOCROOT\media\upload ~ MODPATH\image\classes\Kohana\Image.php [ 107 ] in D:\OpenServer\domains\localhost\kohana3\modules\image\classes\Kohana\Image\GD.php:91
2014-05-23 12:06:09 --- DEBUG: #0 D:\OpenServer\domains\localhost\kohana3\modules\image\classes\Kohana\Image\GD.php(91): Kohana_Image->__construct('media/upload')
#1 D:\OpenServer\domains\localhost\kohana3\modules\image\classes\Kohana\Image.php(54): Kohana_Image_GD->__construct('media/upload')
#2 D:\OpenServer\domains\localhost\kohana3\modules\imagefly\classes\ImageFly.php(158): Kohana_Image::factory('media/upload')
#3 D:\OpenServer\domains\localhost\kohana3\modules\imagefly\classes\ImageFly.php(72): ImageFly->_set_params()
#4 D:\OpenServer\domains\localhost\kohana3\modules\imagefly\classes\Controller\ImageFly.php(14): ImageFly->__construct()
#5 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(84): Controller_ImageFly->action_index()
#6 [internal function]: Kohana_Controller->execute()
#7 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_ImageFly))
#8 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#10 D:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#11 {main} in D:\OpenServer\domains\localhost\kohana3\modules\image\classes\Kohana\Image\GD.php:91
2014-05-23 12:06:46 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '[', expecting ',' or ';' ~ APPPATH\views\Blog\View.php [ 10 ] in file:line
2014-05-23 12:06:46 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-05-23 14:39:44 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: validate_page ~ APPPATH\classes\controller\Blog.php [ 132 ] in D:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php:132
2014-05-23 14:39:44 --- DEBUG: #0 D:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php(132): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\OpenServer\d...', 132, Array)
#1 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(84): Controller_Blog->action_by_section()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Blog))
#4 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 D:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#7 {main} in D:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php:132
2014-05-23 21:56:34 --- CRITICAL: Cache_Exception [ 0 ]: Failed to load Kohana Cache group: sqlite ~ MODPATH\cache\classes\Kohana\Cache.php [ 127 ] in D:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php:120
2014-05-23 21:56:34 --- DEBUG: #0 D:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php(120): Kohana_Cache::instance('sqlite')
#1 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(84): Controller_Blog->action_by_section()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Blog))
#4 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 D:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#7 {main} in D:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php:120
2014-05-23 22:04:24 --- CRITICAL: Cache_Exception [ 0 ]: Failed to load Kohana Cache group: sqlite ~ MODPATH\cache\classes\Kohana\Cache.php [ 127 ] in D:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php:21
2014-05-23 22:04:24 --- DEBUG: #0 D:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php(21): Kohana_Cache::instance('sqlite')
#1 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(84): Controller_Blog->action_index()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Blog))
#4 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 D:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#7 {main} in D:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php:21
2014-05-23 22:05:05 --- CRITICAL: ErrorException [ 1 ]: Call to a member function get() on a non-object ~ APPPATH\classes\controller\Blog.php [ 43 ] in file:line
2014-05-23 22:05:05 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-05-23 22:05:11 --- CRITICAL: ErrorException [ 1 ]: Call to a member function get() on a non-object ~ APPPATH\classes\controller\Blog.php [ 43 ] in file:line
2014-05-23 22:05:11 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line