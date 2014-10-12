<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2014-05-12 00:02:26 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ';' ~ APPPATH\views\Blog\List.php [ 3 ] in file:line
2014-05-12 00:02:26 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-05-12 00:02:40 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ';' ~ APPPATH\views\Blog\List.php [ 3 ] in file:line
2014-05-12 00:02:40 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-05-12 08:39:41 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ';' ~ APPPATH\views\Blog\List.php [ 3 ] in file:line
2014-05-12 08:39:41 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-05-12 08:42:15 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: mod_url ~ APPPATH\views\Blog\List.php [ 3 ] in E:\OpenServer\domains\localhost\spieler\application\views\Blog\List.php:3
2014-05-12 08:42:15 --- DEBUG: #0 E:\OpenServer\domains\localhost\spieler\application\views\Blog\List.php(3): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\OpenServer\d...', 3, Array)
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
#14 {main} in E:\OpenServer\domains\localhost\spieler\application\views\Blog\List.php:3
2014-05-12 09:21:18 --- CRITICAL: ErrorException [ 1 ]: Function name must be a string ~ APPPATH\classes\controller\Blog.php [ 26 ] in file:line
2014-05-12 09:21:18 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-05-12 09:21:41 --- CRITICAL: ErrorException [ 1 ]: Function name must be a string ~ APPPATH\classes\controller\Blog.php [ 19 ] in file:line
2014-05-12 09:21:41 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-05-12 09:22:55 --- CRITICAL: ErrorException [ 1 ]: Function name must be a string ~ APPPATH\classes\controller\Blog.php [ 19 ] in file:line
2014-05-12 09:22:55 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-05-12 09:23:06 --- CRITICAL: ErrorException [ 1 ]: Function name must be a string ~ APPPATH\classes\controller\Blog.php [ 26 ] in file:line
2014-05-12 09:23:06 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-05-12 09:23:23 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: ctrl_array ~ APPPATH\views\Blog\List.php [ 3 ] in E:\OpenServer\domains\localhost\spieler\application\views\Blog\List.php:3
2014-05-12 09:23:23 --- DEBUG: #0 E:\OpenServer\domains\localhost\spieler\application\views\Blog\List.php(3): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\OpenServer\d...', 3, Array)
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
#14 {main} in E:\OpenServer\domains\localhost\spieler\application\views\Blog\List.php:3
2014-05-12 09:23:47 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: ctrl_array ~ APPPATH\classes\controller\Blog.php [ 19 ] in E:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php:19
2014-05-12 09:23:47 --- DEBUG: #0 E:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php(19): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\OpenServer\d...', 19, Array)
#1 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(84): Controller_Blog->action_index()
#2 [internal function]: Kohana_Controller->execute()
#3 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Blog))
#4 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 E:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#7 {main} in E:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php:19
2014-05-12 09:24:08 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: ctrl_array ~ APPPATH\views\Blog\List.php [ 3 ] in E:\OpenServer\domains\localhost\spieler\application\views\Blog\List.php:3
2014-05-12 09:24:08 --- DEBUG: #0 E:\OpenServer\domains\localhost\spieler\application\views\Blog\List.php(3): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\OpenServer\d...', 3, Array)
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
#14 {main} in E:\OpenServer\domains\localhost\spieler\application\views\Blog\List.php:3
2014-05-12 09:24:27 --- CRITICAL: ErrorException [ 8 ]: Use of undefined constant LANG - assumed 'LANG' ~ APPPATH\classes\Sphtml.php [ 37 ] in E:\OpenServer\domains\localhost\spieler\application\classes\Sphtml.php:37
2014-05-12 09:24:27 --- DEBUG: #0 E:\OpenServer\domains\localhost\spieler\application\classes\Sphtml.php(37): Kohana_Core::error_handler(8, 'Use of undefine...', 'E:\OpenServer\d...', 37, Array)
#1 E:\OpenServer\domains\localhost\spieler\application\views\Blog\List.php(3): SpHTML::anchor('/blog/blog/2', '???????????? 2')
#2 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(61): include('E:\OpenServer\d...')
#3 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(348): Kohana_View::capture('E:\OpenServer\d...', Array)
#4 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(228): Kohana_View->render()
#5 E:\OpenServer\domains\localhost\spieler\application\views\Main.php(59): Kohana_View->__toString()
#6 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(61): include('E:\OpenServer\d...')
#7 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(348): Kohana_View::capture('E:\OpenServer\d...', Array)
#8 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#9 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#10 [internal function]: Kohana_Controller->execute()
#11 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Blog))
#12 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#13 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#14 E:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#15 {main} in E:\OpenServer\domains\localhost\spieler\application\classes\Sphtml.php:37