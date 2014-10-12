<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2014-05-20 07:51:39 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ';' ~ APPPATH\views\Blog\List.php [ 5 ] in file:line
2014-05-20 07:51:39 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-05-20 07:52:06 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ';' ~ APPPATH\views\Blog\List.php [ 11 ] in file:line
2014-05-20 07:52:06 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-05-20 07:52:26 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ';' ~ APPPATH\views\Blog\List.php [ 11 ] in file:line
2014-05-20 07:52:26 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-05-20 07:53:25 --- CRITICAL: ErrorException [ 8 ]: Undefined index: item_publish_date ~ APPPATH\views\Blog\List.php [ 11 ] in E:\OpenServer\domains\localhost\spieler\application\views\Blog\List.php:11
2014-05-20 07:53:25 --- DEBUG: #0 E:\OpenServer\domains\localhost\spieler\application\views\Blog\List.php(11): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\OpenServer\d...', 11, Array)
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
#14 {main} in E:\OpenServer\domains\localhost\spieler\application\views\Blog\List.php:11
2014-05-20 07:53:53 --- CRITICAL: ErrorException [ 8 ]: Undefined index: entry_url ~ APPPATH\views\Blog\List.php [ 11 ] in E:\OpenServer\domains\localhost\spieler\application\views\Blog\List.php:11
2014-05-20 07:53:53 --- DEBUG: #0 E:\OpenServer\domains\localhost\spieler\application\views\Blog\List.php(11): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\OpenServer\d...', 11, Array)
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
#14 {main} in E:\OpenServer\domains\localhost\spieler\application\views\Blog\List.php:11
2014-05-20 08:11:16 --- CRITICAL: View_Exception [ 0 ]: The requested view /Blog/View could not be found ~ SYSPATH\classes\Kohana\View.php [ 257 ] in E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php:137
2014-05-20 08:11:16 --- DEBUG: #0 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(137): Kohana_View->set_filename('/Blog/View')
#1 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php(30): Kohana_View->__construct('/Blog/View', NULL)
#2 E:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php(65): Kohana_View::factory('/Blog/View')
#3 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(84): Controller_Blog->action_entry()
#4 [internal function]: Kohana_Controller->execute()
#5 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Blog))
#6 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 E:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#9 {main} in E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\View.php:137
2014-05-20 08:14:38 --- CRITICAL: ErrorException [ 8 ]: Undefined index: section_url ~ APPPATH\views\Blog\View.php [ 25 ] in E:\OpenServer\domains\localhost\spieler\application\views\Blog\View.php:25
2014-05-20 08:14:38 --- DEBUG: #0 E:\OpenServer\domains\localhost\spieler\application\views\Blog\View.php(25): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\OpenServer\d...', 25, Array)
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
#14 {main} in E:\OpenServer\domains\localhost\spieler\application\views\Blog\View.php:25
2014-05-20 08:15:16 --- CRITICAL: ErrorException [ 8 ]: Undefined index: item_publish_date ~ APPPATH\views\Blog\View.php [ 5 ] in E:\OpenServer\domains\localhost\spieler\application\views\Blog\View.php:5
2014-05-20 08:15:16 --- DEBUG: #0 E:\OpenServer\domains\localhost\spieler\application\views\Blog\View.php(5): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\OpenServer\d...', 5, Array)
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
#14 {main} in E:\OpenServer\domains\localhost\spieler\application\views\Blog\View.php:5