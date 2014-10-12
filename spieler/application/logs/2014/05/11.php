<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2014-05-11 10:07:37 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL / was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2014-05-11 10:07:37 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL / was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 E:\OpenServer\domains\localhost\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 E:\OpenServer\domains\localhost\kohana\system\classes\kohana\request.php(1154): Kohana_Request_Client->execute(Object(Request))
#2 E:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#3 {main}
2014-05-11 10:08:38 --- ERROR: View_Exception [ 0 ]: The requested view Main could not be found ~ SYSPATH\classes\kohana\view.php [ 252 ]
2014-05-11 10:08:38 --- STRACE: View_Exception [ 0 ]: The requested view Main could not be found ~ SYSPATH\classes\kohana\view.php [ 252 ]
--
#0 E:\OpenServer\domains\localhost\kohana\system\classes\kohana\view.php(137): Kohana_View->set_filename('Main')
#1 E:\OpenServer\domains\localhost\kohana\system\classes\kohana\view.php(30): Kohana_View->__construct('Main', NULL)
#2 E:\OpenServer\domains\localhost\kohana\system\classes\kohana\controller\template.php(33): Kohana_View::factory('Main')
#3 E:\OpenServer\domains\localhost\spieler\application\classes\controller\Common.php(9): Kohana_Controller_Template->before()
#4 [internal function]: Controller_Common->before()
#5 E:\OpenServer\domains\localhost\kohana\system\classes\kohana\request\client\internal.php(103): ReflectionMethod->invoke(Object(Controller_Blog))
#6 E:\OpenServer\domains\localhost\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#7 E:\OpenServer\domains\localhost\kohana\system\classes\kohana\request.php(1154): Kohana_Request_Client->execute(Object(Request))
#8 E:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#9 {main}
2014-05-11 10:09:41 --- ERROR: ErrorException [ 1 ]: Class 'Model_Blocks' not found ~ SYSPATH\classes\kohana\model.php [ 26 ]
2014-05-11 10:09:41 --- STRACE: ErrorException [ 1 ]: Class 'Model_Blocks' not found ~ SYSPATH\classes\kohana\model.php [ 26 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-05-11 10:10:16 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: public/css/bootstrap.min.css ~ SYSPATH\classes\kohana\request.php [ 1142 ]
2014-05-11 10:10:16 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: public/css/bootstrap.min.css ~ SYSPATH\classes\kohana\request.php [ 1142 ]
--
#0 E:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#1 {main}
2014-05-11 10:10:16 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: public/img/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1142 ]
2014-05-11 10:10:16 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: public/css/font-awesome.min.css ~ SYSPATH\classes\kohana\request.php [ 1142 ]
2014-05-11 10:10:16 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: public/js/bootstrap.min.js ~ SYSPATH\classes\kohana\request.php [ 1142 ]
2014-05-11 10:10:16 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: public/css/font-awesome.min.css ~ SYSPATH\classes\kohana\request.php [ 1142 ]
--
#0 E:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#1 {main}
2014-05-11 10:10:16 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: public/js/bootstrap.min.js ~ SYSPATH\classes\kohana\request.php [ 1142 ]
--
#0 E:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#1 {main}
2014-05-11 10:10:16 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: public/css/style.css ~ SYSPATH\classes\kohana\request.php [ 1142 ]
2014-05-11 10:10:16 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: public/img/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1142 ]
--
#0 E:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#1 {main}
2014-05-11 10:10:16 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: public/css/style.css ~ SYSPATH\classes\kohana\request.php [ 1142 ]
--
#0 E:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#1 {main}
2014-05-11 10:10:16 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: public/js/main.js ~ SYSPATH\classes\kohana\request.php [ 1142 ]
2014-05-11 10:10:16 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: public/js/main.js ~ SYSPATH\classes\kohana\request.php [ 1142 ]
--
#0 E:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#1 {main}
2014-05-11 15:00:29 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: public/js/bootstrap.min.js ~ SYSPATH\classes\kohana\request.php [ 1142 ]
2014-05-11 15:00:29 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: public/img/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1142 ]
2014-05-11 15:00:29 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: public/css/font-awesome.min.css ~ SYSPATH\classes\kohana\request.php [ 1142 ]
2014-05-11 15:00:29 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: public/css/bootstrap.min.css ~ SYSPATH\classes\kohana\request.php [ 1142 ]
2014-05-11 15:00:29 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: public/img/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1142 ]
--
#0 E:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#1 {main}
2014-05-11 15:00:29 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: public/js/bootstrap.min.js ~ SYSPATH\classes\kohana\request.php [ 1142 ]
--
#0 E:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#1 {main}
2014-05-11 15:00:29 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: public/css/font-awesome.min.css ~ SYSPATH\classes\kohana\request.php [ 1142 ]
--
#0 E:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#1 {main}
2014-05-11 15:00:29 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: public/css/style.css ~ SYSPATH\classes\kohana\request.php [ 1142 ]
--
#0 E:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#1 {main}
2014-05-11 15:00:29 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: public/css/bootstrap.min.css ~ SYSPATH\classes\kohana\request.php [ 1142 ]
--
#0 E:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#1 {main}
2014-05-11 15:00:29 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: public/js/main.js ~ SYSPATH\classes\kohana\request.php [ 1142 ]
2014-05-11 15:00:29 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: public/js/main.js ~ SYSPATH\classes\kohana\request.php [ 1142 ]
--
#0 E:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#1 {main}
2014-05-11 15:00:29 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: public/js/main.js ~ SYSPATH\classes\kohana\request.php [ 1142 ]
2014-05-11 15:00:29 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: public/js/main.js ~ SYSPATH\classes\kohana\request.php [ 1142 ]
--
#0 E:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#1 {main}
2014-05-11 18:57:38 --- CRITICAL: Kohana_Exception [ 0 ]: Attempted to load an invalid or missing module 'pagination' at 'MODPATH\pagination' ~ SYSPATH\classes\Kohana\Core.php [ 579 ] in E:\OpenServer\domains\localhost\spieler\application\bootstrap.php:54
2014-05-11 18:57:38 --- DEBUG: #0 E:\OpenServer\domains\localhost\spieler\application\bootstrap.php(54): Kohana_Core::modules(Array)
#1 E:\OpenServer\domains\localhost\spieler\index.php(102): require('E:\OpenServer\d...')
#2 {main} in E:\OpenServer\domains\localhost\spieler\application\bootstrap.php:54
2014-05-11 19:03:02 --- CRITICAL: ErrorException [ 8 ]: Undefined index:  feedback ~ APPPATH\bootstrap.php [ 74 ] in E:\OpenServer\domains\localhost\spieler\application\bootstrap.php:74
2014-05-11 19:03:02 --- DEBUG: #0 E:\OpenServer\domains\localhost\spieler\application\bootstrap.php(74): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\OpenServer\d...', 74, Array)
#1 E:\OpenServer\domains\localhost\spieler\index.php(102): require('E:\OpenServer\d...')
#2 {main} in E:\OpenServer\domains\localhost\spieler\application\bootstrap.php:74
2014-05-11 22:12:57 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '*' ~ APPPATH\classes\controller\Blog.php [ 32 ] in file:line
2014-05-11 22:12:57 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-05-11 22:13:07 --- CRITICAL: View_Exception [ 0 ]: The requested view /Blog/List could not be found ~ SYSPATH\classes\Kohana\View.php [ 257 ] in E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php:137
2014-05-11 22:13:07 --- DEBUG: #0 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(137): Kohana_View->set_filename('/Blog/List')
#1 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(30): Kohana_View->__construct('/Blog/List', NULL)
#2 E:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php(15): Kohana_View::factory('/Blog/List')
#3 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(84): Controller_Blog->action_index()
#4 [internal function]: Kohana_Controller->execute()
#5 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Blog))
#6 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 E:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#9 {main} in E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php:137
2014-05-11 22:14:02 --- CRITICAL: View_Exception [ 0 ]: The requested view /Breadcrumbs could not be found ~ SYSPATH\classes\Kohana\View.php [ 257 ] in E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php:137
2014-05-11 22:14:02 --- DEBUG: #0 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(137): Kohana_View->set_filename('/Breadcrumbs')
#1 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(30): Kohana_View->__construct('/Breadcrumbs', NULL)
#2 E:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php(24): Kohana_View::factory('/Breadcrumbs')
#3 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(84): Controller_Blog->action_index()
#4 [internal function]: Kohana_Controller->execute()
#5 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Blog))
#6 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 E:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#9 {main} in E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php:137
2014-05-11 22:14:31 --- CRITICAL: ErrorException [ 1 ]: Class 'Breadcrumbs' not found ~ APPPATH\classes\controller\Blog.php [ 25 ] in file:line
2014-05-11 22:14:31 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-05-11 22:15:41 --- CRITICAL: ErrorException [ 1 ]: Class 'Model_Blog' not found ~ SYSPATH\classes\Kohana\Model.php [ 26 ] in file:line
2014-05-11 22:15:41 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-05-11 22:23:08 --- CRITICAL: ErrorException [ 2 ]: Missing argument 1 for Model_Blog::list_items(), called in E:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php on line 31 and defined ~ APPPATH\classes\model\Blog.php [ 506 ] in E:\OpenServer\domains\localhost\spieler\application\classes\model\Blog.php:506
2014-05-11 22:23:08 --- DEBUG: #0 E:\OpenServer\domains\localhost\spieler\application\classes\model\Blog.php(506): Kohana_Core::error_handler(2, 'Missing argumen...', 'E:\OpenServer\d...', 506, Array)
#1 E:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php(31): Model_Blog->list_items()
#2 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(84): Controller_Blog->action_index()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Blog))
#5 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 E:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#8 {main} in E:\OpenServer\domains\localhost\spieler\application\classes\model\Blog.php:506
2014-05-11 22:29:25 --- CRITICAL: ErrorException [ 8 ]: Undefined property: Controller_Blog::$breadcrumb ~ APPPATH\classes\controller\Blog.php [ 30 ] in E:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php:30
2014-05-11 22:29:25 --- DEBUG: #0 E:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php(30): Kohana_Core::error_handler(8, 'Undefined prope...', 'E:\OpenServer\d...', 30, Array)
#1 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(84): Controller_Blog->action_index()
#2 [internal function]: Kohana_Controller->execute()
#3 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Blog))
#4 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 E:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#7 {main} in E:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php:30
2014-05-11 22:30:36 --- CRITICAL: Database_Exception [ 2 ]: mysql_connect() [function.mysql-connect]: Access denied for user ''@'localhost' (using password: NO) ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 67 ] in E:\OpenServer\domains\localhost\kohana3\modules\database\classes\Kohana\Database\MySQL.php:171
2014-05-11 22:30:36 --- DEBUG: #0 E:\OpenServer\domains\localhost\kohana3\modules\database\classes\Kohana\Database\MySQL.php(171): Kohana_Database_MySQL->connect()
#1 E:\OpenServer\domains\localhost\kohana3\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(1, 'SELECT `id_page...', false, Array)
#2 E:\OpenServer\domains\localhost\spieler\application\classes\model\Blog.php(520): Kohana_Database_Query->execute()
#3 E:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php(32): Model_Blog->list_items('1')
#4 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(84): Controller_Blog->action_index()
#5 [internal function]: Kohana_Controller->execute()
#6 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Blog))
#7 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 E:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#10 {main} in E:\OpenServer\domains\localhost\kohana3\modules\database\classes\Kohana\Database\MySQL.php:171
2014-05-11 22:31:21 --- CRITICAL: Database_Exception [ 1054 ]: Unknown column 'id_pages' in 'field list' [ SELECT `id_pages`, `pages_title`, `pages_url`, `pages_text`, `pages_text_full` FROM `site_sblog_items` WHERE `pages_url` = NULL AND `pages_status` = 1 ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in E:\OpenServer\domains\localhost\kohana3\modules\database\classes\Kohana\Database\Query.php:251
2014-05-11 22:31:21 --- DEBUG: #0 E:\OpenServer\domains\localhost\kohana3\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(1, 'SELECT `id_page...', false, Array)
#1 E:\OpenServer\domains\localhost\spieler\application\classes\model\Blog.php(520): Kohana_Database_Query->execute()
#2 E:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php(32): Model_Blog->list_items('1')
#3 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(84): Controller_Blog->action_index()
#4 [internal function]: Kohana_Controller->execute()
#5 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Blog))
#6 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 E:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#9 {main} in E:\OpenServer\domains\localhost\kohana3\modules\database\classes\Kohana\Database\Query.php:251
2014-05-11 23:17:31 --- CRITICAL: ErrorException [ 1 ]: Function name must be a string ~ APPPATH\classes\model\Blog.php [ 509 ] in file:line
2014-05-11 23:17:31 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-05-11 23:17:57 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function NOW() ~ APPPATH\classes\model\Blog.php [ 520 ] in file:line
2014-05-11 23:17:57 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-05-11 23:18:09 --- CRITICAL: ErrorException [ 1 ]: Function name must be a string ~ APPPATH\classes\model\Blog.php [ 509 ] in file:line
2014-05-11 23:18:09 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-05-11 23:20:00 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: page ~ APPPATH\classes\controller\Blog.php [ 18 ] in E:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php:18
2014-05-11 23:20:00 --- DEBUG: #0 E:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php(18): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\OpenServer\d...', 18, Array)
#1 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(84): Controller_Blog->action_index()
#2 [internal function]: Kohana_Controller->execute()
#3 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Blog))
#4 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 E:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#7 {main} in E:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php:18
2014-05-11 23:20:41 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function NOW() ~ APPPATH\classes\model\Blog.php [ 520 ] in file:line
2014-05-11 23:20:41 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-05-11 23:20:55 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: ctrl_array ~ APPPATH\classes\model\Blog.php [ 524 ] in E:\OpenServer\domains\localhost\spieler\application\classes\model\Blog.php:524
2014-05-11 23:20:55 --- DEBUG: #0 E:\OpenServer\domains\localhost\spieler\application\classes\model\Blog.php(524): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\OpenServer\d...', 524, Array)
#1 E:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php(34): Model_Blog->list_items('1', 0)
#2 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(84): Controller_Blog->action_index()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Blog))
#5 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 E:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#8 {main} in E:\OpenServer\domains\localhost\spieler\application\classes\model\Blog.php:524
2014-05-11 23:21:29 --- CRITICAL: Database_Exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 [ SELECT `id_item`, `item_title`, `item_url`, `item_text`, `item_text_full` FROM `site_sblog_items` WHERE `item_status` = '1' AND `item_publish_date` = 'NOW()' ORDER BY `item_publish_date` DESC LIMIT 0, ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in E:\OpenServer\domains\localhost\kohana3\modules\database\classes\Kohana\Database\Query.php:251
2014-05-11 23:21:29 --- DEBUG: #0 E:\OpenServer\domains\localhost\kohana3\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(1, 'SELECT `id_item...', false, Array)
#1 E:\OpenServer\domains\localhost\spieler\application\classes\model\Blog.php(525): Kohana_Database_Query->execute()
#2 E:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php(34): Model_Blog->list_items('1', 0)
#3 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(84): Controller_Blog->action_index()
#4 [internal function]: Kohana_Controller->execute()
#5 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Blog))
#6 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 E:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#9 {main} in E:\OpenServer\domains\localhost\kohana3\modules\database\classes\Kohana\Database\Query.php:251
2014-05-11 23:22:26 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: pages_list ~ APPPATH\views\Blog\List.php [ 5 ] in E:\OpenServer\domains\localhost\spieler\application\views\Blog\List.php:5
2014-05-11 23:22:26 --- DEBUG: #0 E:\OpenServer\domains\localhost\spieler\application\views\Blog\List.php(5): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\OpenServer\d...', 5, Array)
#1 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(61): include('E:\OpenServer\d...')
#2 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(348): Kohana_View::capture('E:\OpenServer\d...', Array)
#3 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 E:\OpenServer\domains\localhost\spieler\application\views\Main.php(59): Kohana_View->__toString()
#5 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(61): include('E:\OpenServer\d...')
#6 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(348): Kohana_View::capture('E:\OpenServer\d...', Array)
#7 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Blog))
#11 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#13 E:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#14 {main} in E:\OpenServer\domains\localhost\spieler\application\views\Blog\List.php:5
2014-05-11 23:23:50 --- CRITICAL: ErrorException [ 8 ]: Undefined index: item)title ~ APPPATH\views\Blog\List.php [ 2 ] in E:\OpenServer\domains\localhost\spieler\application\views\Blog\List.php:2
2014-05-11 23:23:50 --- DEBUG: #0 E:\OpenServer\domains\localhost\spieler\application\views\Blog\List.php(2): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\OpenServer\d...', 2, Array)
#1 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(61): include('E:\OpenServer\d...')
#2 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(348): Kohana_View::capture('E:\OpenServer\d...', Array)
#3 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 E:\OpenServer\domains\localhost\spieler\application\views\Main.php(59): Kohana_View->__toString()
#5 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(61): include('E:\OpenServer\d...')
#6 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(348): Kohana_View::capture('E:\OpenServer\d...', Array)
#7 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Blog))
#11 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#13 E:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#14 {main} in E:\OpenServer\domains\localhost\spieler\application\views\Blog\List.php:2
2014-05-11 23:23:57 --- CRITICAL: ErrorException [ 8 ]: Undefined index: item_title ~ APPPATH\views\Blog\List.php [ 2 ] in E:\OpenServer\domains\localhost\spieler\application\views\Blog\List.php:2
2014-05-11 23:23:57 --- DEBUG: #0 E:\OpenServer\domains\localhost\spieler\application\views\Blog\List.php(2): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\OpenServer\d...', 2, Array)
#1 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(61): include('E:\OpenServer\d...')
#2 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(348): Kohana_View::capture('E:\OpenServer\d...', Array)
#3 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 E:\OpenServer\domains\localhost\spieler\application\views\Main.php(59): Kohana_View->__toString()
#5 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(61): include('E:\OpenServer\d...')
#6 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(348): Kohana_View::capture('E:\OpenServer\d...', Array)
#7 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Blog))
#11 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#13 E:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#14 {main} in E:\OpenServer\domains\localhost\spieler\application\views\Blog\List.php:2
2014-05-11 23:28:59 --- CRITICAL: ErrorException [ 8 ]: Undefined index: item_title ~ APPPATH\views\Blog\List.php [ 2 ] in E:\OpenServer\domains\localhost\spieler\application\views\Blog\List.php:2
2014-05-11 23:28:59 --- DEBUG: #0 E:\OpenServer\domains\localhost\spieler\application\views\Blog\List.php(2): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\OpenServer\d...', 2, Array)
#1 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(61): include('E:\OpenServer\d...')
#2 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(348): Kohana_View::capture('E:\OpenServer\d...', Array)
#3 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 E:\OpenServer\domains\localhost\spieler\application\views\Main.php(59): Kohana_View->__toString()
#5 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(61): include('E:\OpenServer\d...')
#6 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(348): Kohana_View::capture('E:\OpenServer\d...', Array)
#7 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Blog))
#11 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#13 E:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#14 {main} in E:\OpenServer\domains\localhost\spieler\application\views\Blog\List.php:2
2014-05-11 23:29:16 --- CRITICAL: ErrorException [ 8 ]: Undefined index: item_title ~ APPPATH\views\Blog\List.php [ 2 ] in E:\OpenServer\domains\localhost\spieler\application\views\Blog\List.php:2
2014-05-11 23:29:16 --- DEBUG: #0 E:\OpenServer\domains\localhost\spieler\application\views\Blog\List.php(2): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\OpenServer\d...', 2, Array)
#1 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(61): include('E:\OpenServer\d...')
#2 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(348): Kohana_View::capture('E:\OpenServer\d...', Array)
#3 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 E:\OpenServer\domains\localhost\spieler\application\views\Main.php(59): Kohana_View->__toString()
#5 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(61): include('E:\OpenServer\d...')
#6 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(348): Kohana_View::capture('E:\OpenServer\d...', Array)
#7 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Blog))
#11 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#13 E:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#14 {main} in E:\OpenServer\domains\localhost\spieler\application\views\Blog\List.php:2
2014-05-11 23:29:17 --- CRITICAL: ErrorException [ 8 ]: Undefined index: item_title ~ APPPATH\views\Blog\List.php [ 2 ] in E:\OpenServer\domains\localhost\spieler\application\views\Blog\List.php:2
2014-05-11 23:29:17 --- DEBUG: #0 E:\OpenServer\domains\localhost\spieler\application\views\Blog\List.php(2): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\OpenServer\d...', 2, Array)
#1 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(61): include('E:\OpenServer\d...')
#2 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(348): Kohana_View::capture('E:\OpenServer\d...', Array)
#3 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 E:\OpenServer\domains\localhost\spieler\application\views\Main.php(59): Kohana_View->__toString()
#5 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(61): include('E:\OpenServer\d...')
#6 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(348): Kohana_View::capture('E:\OpenServer\d...', Array)
#7 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Blog))
#11 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#13 E:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#14 {main} in E:\OpenServer\domains\localhost\spieler\application\views\Blog\List.php:2
2014-05-11 23:31:54 --- CRITICAL: ErrorException [ 8 ]: Undefined index: item_title ~ APPPATH\views\Blog\List.php [ 2 ] in E:\OpenServer\domains\localhost\spieler\application\views\Blog\List.php:2
2014-05-11 23:31:54 --- DEBUG: #0 E:\OpenServer\domains\localhost\spieler\application\views\Blog\List.php(2): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\OpenServer\d...', 2, Array)
#1 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(61): include('E:\OpenServer\d...')
#2 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(348): Kohana_View::capture('E:\OpenServer\d...', Array)
#3 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 E:\OpenServer\domains\localhost\spieler\application\views\Main.php(59): Kohana_View->__toString()
#5 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(61): include('E:\OpenServer\d...')
#6 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(348): Kohana_View::capture('E:\OpenServer\d...', Array)
#7 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Blog))
#11 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#13 E:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#14 {main} in E:\OpenServer\domains\localhost\spieler\application\views\Blog\List.php:2
2014-05-11 23:31:55 --- CRITICAL: ErrorException [ 8 ]: Undefined index: item_title ~ APPPATH\views\Blog\List.php [ 2 ] in E:\OpenServer\domains\localhost\spieler\application\views\Blog\List.php:2
2014-05-11 23:31:55 --- DEBUG: #0 E:\OpenServer\domains\localhost\spieler\application\views\Blog\List.php(2): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\OpenServer\d...', 2, Array)
#1 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(61): include('E:\OpenServer\d...')
#2 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(348): Kohana_View::capture('E:\OpenServer\d...', Array)
#3 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 E:\OpenServer\domains\localhost\spieler\application\views\Main.php(59): Kohana_View->__toString()
#5 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(61): include('E:\OpenServer\d...')
#6 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(348): Kohana_View::capture('E:\OpenServer\d...', Array)
#7 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Blog))
#11 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#13 E:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#14 {main} in E:\OpenServer\domains\localhost\spieler\application\views\Blog\List.php:2
2014-05-11 23:34:01 --- CRITICAL: ErrorException [ 8 ]: Undefined index: item_title ~ APPPATH\views\Blog\List.php [ 2 ] in E:\OpenServer\domains\localhost\spieler\application\views\Blog\List.php:2
2014-05-11 23:34:01 --- DEBUG: #0 E:\OpenServer\domains\localhost\spieler\application\views\Blog\List.php(2): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\OpenServer\d...', 2, Array)
#1 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(61): include('E:\OpenServer\d...')
#2 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(348): Kohana_View::capture('E:\OpenServer\d...', Array)
#3 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 E:\OpenServer\domains\localhost\spieler\application\views\Main.php(59): Kohana_View->__toString()
#5 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(61): include('E:\OpenServer\d...')
#6 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(348): Kohana_View::capture('E:\OpenServer\d...', Array)
#7 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Blog))
#11 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#13 E:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#14 {main} in E:\OpenServer\domains\localhost\spieler\application\views\Blog\List.php:2
2014-05-11 23:34:31 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: pages_list ~ APPPATH\views\Blog\List.php [ 24 ] in E:\OpenServer\domains\localhost\spieler\application\views\Blog\List.php:24
2014-05-11 23:34:31 --- DEBUG: #0 E:\OpenServer\domains\localhost\spieler\application\views\Blog\List.php(24): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\OpenServer\d...', 24, Array)
#1 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(61): include('E:\OpenServer\d...')
#2 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(348): Kohana_View::capture('E:\OpenServer\d...', Array)
#3 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 E:\OpenServer\domains\localhost\spieler\application\views\Main.php(59): Kohana_View->__toString()
#5 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(61): include('E:\OpenServer\d...')
#6 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(348): Kohana_View::capture('E:\OpenServer\d...', Array)
#7 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Blog))
#11 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#13 E:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#14 {main} in E:\OpenServer\domains\localhost\spieler\application\views\Blog\List.php:24
2014-05-11 23:34:50 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: pages_list ~ APPPATH\views\Blog\List.php [ 24 ] in E:\OpenServer\domains\localhost\spieler\application\views\Blog\List.php:24
2014-05-11 23:34:50 --- DEBUG: #0 E:\OpenServer\domains\localhost\spieler\application\views\Blog\List.php(24): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\OpenServer\d...', 24, Array)
#1 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(61): include('E:\OpenServer\d...')
#2 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(348): Kohana_View::capture('E:\OpenServer\d...', Array)
#3 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 E:\OpenServer\domains\localhost\spieler\application\views\Main.php(59): Kohana_View->__toString()
#5 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(61): include('E:\OpenServer\d...')
#6 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(348): Kohana_View::capture('E:\OpenServer\d...', Array)
#7 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Blog))
#11 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#13 E:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#14 {main} in E:\OpenServer\domains\localhost\spieler\application\views\Blog\List.php:24
2014-05-11 23:45:48 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method DB::count() ~ APPPATH\classes\model\Blog.php [ 442 ] in file:line
2014-05-11 23:45:48 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-05-11 23:48:19 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected T_STRING ~ APPPATH\classes\model\Blog.php [ 443 ] in file:line
2014-05-11 23:48:19 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-05-11 23:49:14 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected T_STRING ~ APPPATH\classes\model\Blog.php [ 443 ] in file:line
2014-05-11 23:49:14 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line