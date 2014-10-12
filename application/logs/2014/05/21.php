<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2014-05-21 10:27:13 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected T_LNUMBER ~ APPPATH\classes\model\Blog.php [ 548 ] in file:line
2014-05-21 10:27:13 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-05-21 10:30:41 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: year ~ APPPATH\classes\model\Blog.php [ 547 ] in D:\OpenServer\domains\localhost\spieler\application\classes\model\Blog.php:547
2014-05-21 10:30:41 --- DEBUG: #0 D:\OpenServer\domains\localhost\spieler\application\classes\model\Blog.php(547): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\OpenServer\d...', 547, Array)
#1 D:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php(167): Model_Blog->get_archive('2014', '02', '02')
#2 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(84): Controller_Blog->action_archive()
#3 [internal function]: Kohana_Controller->execute()
#4 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Blog))
#5 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 D:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#8 {main} in D:\OpenServer\domains\localhost\spieler\application\classes\model\Blog.php:547
2014-05-21 10:31:13 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: year ~ APPPATH\classes\model\Blog.php [ 547 ] in D:\OpenServer\domains\localhost\spieler\application\classes\model\Blog.php:547
2014-05-21 10:31:13 --- DEBUG: #0 D:\OpenServer\domains\localhost\spieler\application\classes\model\Blog.php(547): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\OpenServer\d...', 547, Array)
#1 D:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php(167): Model_Blog->get_archive('2014', '02', '02')
#2 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(84): Controller_Blog->action_archive()
#3 [internal function]: Kohana_Controller->execute()
#4 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Blog))
#5 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 D:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#8 {main} in D:\OpenServer\domains\localhost\spieler\application\classes\model\Blog.php:547
2014-05-21 10:31:54 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: begin ~ APPPATH\classes\model\Blog.php [ 552 ] in D:\OpenServer\domains\localhost\spieler\application\classes\model\Blog.php:552
2014-05-21 10:31:54 --- DEBUG: #0 D:\OpenServer\domains\localhost\spieler\application\classes\model\Blog.php(552): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\OpenServer\d...', 552, Array)
#1 D:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php(167): Model_Blog->get_archive('2014', '02', '02')
#2 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(84): Controller_Blog->action_archive()
#3 [internal function]: Kohana_Controller->execute()
#4 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Blog))
#5 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 D:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#8 {main} in D:\OpenServer\domains\localhost\spieler\application\classes\model\Blog.php:552
2014-05-21 10:31:55 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: begin ~ APPPATH\classes\model\Blog.php [ 552 ] in D:\OpenServer\domains\localhost\spieler\application\classes\model\Blog.php:552
2014-05-21 10:31:55 --- DEBUG: #0 D:\OpenServer\domains\localhost\spieler\application\classes\model\Blog.php(552): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\OpenServer\d...', 552, Array)
#1 D:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php(167): Model_Blog->get_archive('2014', '02', '02')
#2 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(84): Controller_Blog->action_archive()
#3 [internal function]: Kohana_Controller->execute()
#4 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Blog))
#5 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 D:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#8 {main} in D:\OpenServer\domains\localhost\spieler\application\classes\model\Blog.php:552
2014-05-21 10:33:22 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected T_ECHO ~ APPPATH\classes\model\Blog.php [ 559 ] in file:line
2014-05-21 10:33:22 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-05-21 10:33:27 --- CRITICAL: ErrorException [ 2 ]: Invalid argument supplied for foreach() ~ APPPATH\views\Blog\List.php [ 1 ] in D:\OpenServer\domains\localhost\spieler\application\views\Blog\List.php:1
2014-05-21 10:33:27 --- DEBUG: #0 D:\OpenServer\domains\localhost\spieler\application\views\Blog\List.php(1): Kohana_Core::error_handler(2, 'Invalid argumen...', 'D:\OpenServer\d...', 1, Array)
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
2014-05-21 10:37:12 --- CRITICAL: ErrorException [ 8 ]: Undefined index: day ~ SYSPATH\classes\Kohana\Validation.php [ 102 ] in D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Validation.php:102
2014-05-21 10:37:12 --- DEBUG: #0 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Validation.php(102): Kohana_Core::error_handler(8, 'Undefined index...', 'D:\OpenServer\d...', 102, Array)
#1 D:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php(164): Kohana_Validation->offsetGet('day')
#2 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(84): Controller_Blog->action_archive()
#3 [internal function]: Kohana_Controller->execute()
#4 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Blog))
#5 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 D:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#8 {main} in D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Validation.php:102
2014-05-21 10:42:45 --- CRITICAL: ErrorException [ 8 ]: Undefined offset: 2 ~ APPPATH\classes\model\Blog.php [ 583 ] in D:\OpenServer\domains\localhost\spieler\application\classes\model\Blog.php:583
2014-05-21 10:42:45 --- DEBUG: #0 D:\OpenServer\domains\localhost\spieler\application\classes\model\Blog.php(583): Kohana_Core::error_handler(8, 'Undefined offse...', 'D:\OpenServer\d...', 583, Array)
#1 D:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php(166): Model_Blog->get_archive('2014', '02', '02')
#2 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(84): Controller_Blog->action_archive()
#3 [internal function]: Kohana_Controller->execute()
#4 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Blog))
#5 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 D:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#8 {main} in D:\OpenServer\domains\localhost\spieler\application\classes\model\Blog.php:583
2014-05-21 10:43:14 --- CRITICAL: ErrorException [ 8 ]: Undefined offset: 2 ~ APPPATH\classes\model\Blog.php [ 583 ] in D:\OpenServer\domains\localhost\spieler\application\classes\model\Blog.php:583
2014-05-21 10:43:14 --- DEBUG: #0 D:\OpenServer\domains\localhost\spieler\application\classes\model\Blog.php(583): Kohana_Core::error_handler(8, 'Undefined offse...', 'D:\OpenServer\d...', 583, Array)
#1 D:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php(166): Model_Blog->get_archive('2014', '02', '02')
#2 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(84): Controller_Blog->action_archive()
#3 [internal function]: Kohana_Controller->execute()
#4 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Blog))
#5 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 D:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#8 {main} in D:\OpenServer\domains\localhost\spieler\application\classes\model\Blog.php:583
2014-05-21 10:43:15 --- CRITICAL: ErrorException [ 8 ]: Undefined offset: 2 ~ APPPATH\classes\model\Blog.php [ 583 ] in D:\OpenServer\domains\localhost\spieler\application\classes\model\Blog.php:583
2014-05-21 10:43:15 --- DEBUG: #0 D:\OpenServer\domains\localhost\spieler\application\classes\model\Blog.php(583): Kohana_Core::error_handler(8, 'Undefined offse...', 'D:\OpenServer\d...', 583, Array)
#1 D:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php(166): Model_Blog->get_archive('2014', '02', '02')
#2 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(84): Controller_Blog->action_archive()
#3 [internal function]: Kohana_Controller->execute()
#4 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Blog))
#5 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 D:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#8 {main} in D:\OpenServer\domains\localhost\spieler\application\classes\model\Blog.php:583
2014-05-21 10:43:15 --- CRITICAL: ErrorException [ 8 ]: Undefined offset: 2 ~ APPPATH\classes\model\Blog.php [ 583 ] in D:\OpenServer\domains\localhost\spieler\application\classes\model\Blog.php:583
2014-05-21 10:43:15 --- DEBUG: #0 D:\OpenServer\domains\localhost\spieler\application\classes\model\Blog.php(583): Kohana_Core::error_handler(8, 'Undefined offse...', 'D:\OpenServer\d...', 583, Array)
#1 D:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php(166): Model_Blog->get_archive('2014', '02', '02')
#2 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(84): Controller_Blog->action_archive()
#3 [internal function]: Kohana_Controller->execute()
#4 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Blog))
#5 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 D:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#8 {main} in D:\OpenServer\domains\localhost\spieler\application\classes\model\Blog.php:583
2014-05-21 10:44:00 --- CRITICAL: ErrorException [ 8 ]: Undefined offset: 2 ~ APPPATH\classes\model\Blog.php [ 583 ] in D:\OpenServer\domains\localhost\spieler\application\classes\model\Blog.php:583
2014-05-21 10:44:00 --- DEBUG: #0 D:\OpenServer\domains\localhost\spieler\application\classes\model\Blog.php(583): Kohana_Core::error_handler(8, 'Undefined offse...', 'D:\OpenServer\d...', 583, Array)
#1 D:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php(166): Model_Blog->get_archive('2014', '02', '02')
#2 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(84): Controller_Blog->action_archive()
#3 [internal function]: Kohana_Controller->execute()
#4 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Blog))
#5 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 D:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#8 {main} in D:\OpenServer\domains\localhost\spieler\application\classes\model\Blog.php:583
2014-05-21 10:45:51 --- CRITICAL: ErrorException [ 8 ]: Undefined index: item_publish_date ~ APPPATH\views\Blog\View.php [ 5 ] in D:\OpenServer\domains\localhost\spieler\application\views\Blog\View.php:5
2014-05-21 10:45:51 --- DEBUG: #0 D:\OpenServer\domains\localhost\spieler\application\views\Blog\View.php(5): Kohana_Core::error_handler(8, 'Undefined index...', 'D:\OpenServer\d...', 5, Array)
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
2014-05-21 10:46:48 --- CRITICAL: ErrorException [ 8 ]: Undefined index: item_publish_date ~ APPPATH\views\Blog\View.php [ 5 ] in D:\OpenServer\domains\localhost\spieler\application\views\Blog\View.php:5
2014-05-21 10:46:48 --- DEBUG: #0 D:\OpenServer\domains\localhost\spieler\application\views\Blog\View.php(5): Kohana_Core::error_handler(8, 'Undefined index...', 'D:\OpenServer\d...', 5, Array)
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
2014-05-21 10:47:05 --- CRITICAL: ErrorException [ 8 ]: Undefined index: item_publish_date ~ APPPATH\views\Blog\View.php [ 5 ] in D:\OpenServer\domains\localhost\spieler\application\views\Blog\View.php:5
2014-05-21 10:47:05 --- DEBUG: #0 D:\OpenServer\domains\localhost\spieler\application\views\Blog\View.php(5): Kohana_Core::error_handler(8, 'Undefined index...', 'D:\OpenServer\d...', 5, Array)
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
2014-05-21 10:47:12 --- CRITICAL: ErrorException [ 8 ]: Undefined index: item_publish_date ~ APPPATH\views\Blog\View.php [ 5 ] in D:\OpenServer\domains\localhost\spieler\application\views\Blog\View.php:5
2014-05-21 10:47:12 --- DEBUG: #0 D:\OpenServer\domains\localhost\spieler\application\views\Blog\View.php(5): Kohana_Core::error_handler(8, 'Undefined index...', 'D:\OpenServer\d...', 5, Array)
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
2014-05-21 10:54:23 --- CRITICAL: ErrorException [ 8 ]: Undefined index: day ~ SYSPATH\classes\Kohana\Validation.php [ 102 ] in D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Validation.php:102
2014-05-21 10:54:23 --- DEBUG: #0 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Validation.php(102): Kohana_Core::error_handler(8, 'Undefined index...', 'D:\OpenServer\d...', 102, Array)
#1 D:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php(167): Kohana_Validation->offsetGet('day')
#2 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(84): Controller_Blog->action_archive()
#3 [internal function]: Kohana_Controller->execute()
#4 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Blog))
#5 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 D:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#8 {main} in D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Validation.php:102
2014-05-21 10:55:13 --- CRITICAL: ErrorException [ 8 ]: Undefined index: day ~ SYSPATH\classes\Kohana\Validation.php [ 102 ] in D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Validation.php:102
2014-05-21 10:55:13 --- DEBUG: #0 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Validation.php(102): Kohana_Core::error_handler(8, 'Undefined index...', 'D:\OpenServer\d...', 102, Array)
#1 D:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php(167): Kohana_Validation->offsetGet('day')
#2 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(84): Controller_Blog->action_archive()
#3 [internal function]: Kohana_Controller->execute()
#4 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Blog))
#5 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 D:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#8 {main} in D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Validation.php:102
2014-05-21 10:55:15 --- CRITICAL: ErrorException [ 8 ]: Undefined index: day ~ SYSPATH\classes\Kohana\Validation.php [ 102 ] in D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Validation.php:102
2014-05-21 10:55:15 --- DEBUG: #0 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Validation.php(102): Kohana_Core::error_handler(8, 'Undefined index...', 'D:\OpenServer\d...', 102, Array)
#1 D:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php(167): Kohana_Validation->offsetGet('day')
#2 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(84): Controller_Blog->action_archive()
#3 [internal function]: Kohana_Controller->execute()
#4 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Blog))
#5 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 D:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#8 {main} in D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Validation.php:102
2014-05-21 10:55:19 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected T_STRING ~ APPPATH\classes\model\Blog.php [ 539 ] in file:line
2014-05-21 10:55:19 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-05-21 10:55:52 --- CRITICAL: ErrorException [ 8 ]: Undefined offset: 2 ~ APPPATH\classes\model\Blog.php [ 583 ] in D:\OpenServer\domains\localhost\spieler\application\classes\model\Blog.php:583
2014-05-21 10:55:52 --- DEBUG: #0 D:\OpenServer\domains\localhost\spieler\application\classes\model\Blog.php(583): Kohana_Core::error_handler(8, 'Undefined offse...', 'D:\OpenServer\d...', 583, Array)
#1 D:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php(169): Model_Blog->get_archive('2014', '02', '02')
#2 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(84): Controller_Blog->action_archive()
#3 [internal function]: Kohana_Controller->execute()
#4 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Blog))
#5 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 D:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#8 {main} in D:\OpenServer\domains\localhost\spieler\application\classes\model\Blog.php:583
2014-05-21 10:56:37 --- CRITICAL: ErrorException [ 8 ]: Undefined offset: 2 ~ APPPATH\classes\model\Blog.php [ 583 ] in D:\OpenServer\domains\localhost\spieler\application\classes\model\Blog.php:583
2014-05-21 10:56:37 --- DEBUG: #0 D:\OpenServer\domains\localhost\spieler\application\classes\model\Blog.php(583): Kohana_Core::error_handler(8, 'Undefined offse...', 'D:\OpenServer\d...', 583, Array)
#1 D:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php(169): Model_Blog->get_archive('2014', '02', '02')
#2 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(84): Controller_Blog->action_archive()
#3 [internal function]: Kohana_Controller->execute()
#4 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Blog))
#5 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 D:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#8 {main} in D:\OpenServer\domains\localhost\spieler\application\classes\model\Blog.php:583
2014-05-21 10:57:39 --- CRITICAL: ErrorException [ 8 ]: Undefined offset: 2 ~ APPPATH\classes\model\Blog.php [ 583 ] in D:\OpenServer\domains\localhost\spieler\application\classes\model\Blog.php:583
2014-05-21 10:57:39 --- DEBUG: #0 D:\OpenServer\domains\localhost\spieler\application\classes\model\Blog.php(583): Kohana_Core::error_handler(8, 'Undefined offse...', 'D:\OpenServer\d...', 583, Array)
#1 D:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php(169): Model_Blog->get_archive('2014', '02', '02')
#2 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(84): Controller_Blog->action_archive()
#3 [internal function]: Kohana_Controller->execute()
#4 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Blog))
#5 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 D:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#8 {main} in D:\OpenServer\domains\localhost\spieler\application\classes\model\Blog.php:583
2014-05-21 10:57:40 --- CRITICAL: ErrorException [ 8 ]: Undefined offset: 2 ~ APPPATH\classes\model\Blog.php [ 583 ] in D:\OpenServer\domains\localhost\spieler\application\classes\model\Blog.php:583
2014-05-21 10:57:40 --- DEBUG: #0 D:\OpenServer\domains\localhost\spieler\application\classes\model\Blog.php(583): Kohana_Core::error_handler(8, 'Undefined offse...', 'D:\OpenServer\d...', 583, Array)
#1 D:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php(169): Model_Blog->get_archive('2014', '02', '02')
#2 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(84): Controller_Blog->action_archive()
#3 [internal function]: Kohana_Controller->execute()
#4 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Blog))
#5 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 D:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#8 {main} in D:\OpenServer\domains\localhost\spieler\application\classes\model\Blog.php:583
2014-05-21 10:57:50 --- CRITICAL: Database_Exception [ 1054 ]: Unknown column 'MONTH("datetime")' in 'where clause' [ SELECT `id_item`, `item_title`, `item_url`, `item_text`, `item_text_full`, `item_publish_date` FROM `site_sblog_items` WHERE `item_status` = '1' AND `item_publish_date` >= '2014-02-02 00:00:00' AND `MONTH("datetime")` = 'MONTH(\".$amonth.\")' AND `DAY("datetime")` = 'DAY(\".$aday.\")' AND `item_url` = '0' ORDER BY `item_publish_date` DESC LIMIT 0,10 ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in D:\OpenServer\domains\localhost\kohana3\modules\database\classes\Kohana\Database\Query.php:251
2014-05-21 10:57:50 --- DEBUG: #0 D:\OpenServer\domains\localhost\kohana3\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(1, 'SELECT `id_item...', false, Array)
#1 D:\OpenServer\domains\localhost\spieler\application\classes\model\Blog.php(591): Kohana_Database_Query->execute()
#2 D:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php(169): Model_Blog->get_archive('2014', '02', '02')
#3 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(84): Controller_Blog->action_archive()
#4 [internal function]: Kohana_Controller->execute()
#5 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Blog))
#6 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 D:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#9 {main} in D:\OpenServer\domains\localhost\kohana3\modules\database\classes\Kohana\Database\Query.php:251
2014-05-21 10:58:40 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function MONTH() ~ APPPATH\classes\model\Blog.php [ 539 ] in file:line
2014-05-21 10:58:40 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-05-21 10:58:56 --- CRITICAL: Database_Exception [ 1054 ]: Unknown column 'MONTH('datetime')' in 'where clause' [ SELECT `id_item`, `item_title`, `item_url`, `item_text`, `item_text_full`, `item_publish_date` FROM `site_sblog_items` WHERE `item_status` = '1' AND `item_publish_date` >= '2014-02-02 00:00:00' AND `MONTH('datetime')` = 'MONTH(\".$amonth.\")' AND `DAY("datetime")` = 'DAY(\".$aday.\")' AND `item_url` = '0' ORDER BY `item_publish_date` DESC LIMIT 0,10 ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in D:\OpenServer\domains\localhost\kohana3\modules\database\classes\Kohana\Database\Query.php:251
2014-05-21 10:58:56 --- DEBUG: #0 D:\OpenServer\domains\localhost\kohana3\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(1, 'SELECT `id_item...', false, Array)
#1 D:\OpenServer\domains\localhost\spieler\application\classes\model\Blog.php(591): Kohana_Database_Query->execute()
#2 D:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php(169): Model_Blog->get_archive('2014', '02', '02')
#3 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(84): Controller_Blog->action_archive()
#4 [internal function]: Kohana_Controller->execute()
#5 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Blog))
#6 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 D:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#9 {main} in D:\OpenServer\domains\localhost\kohana3\modules\database\classes\Kohana\Database\Query.php:251
2014-05-21 11:40:33 --- CRITICAL: Database_Exception [ 1054 ]: Unknown column 'DATE_FORMAT(real_time, '%Y')' in 'where clause' [ SELECT `id_item`, `item_title`, `item_url`, `item_text`, `item_text_full`, `item_publish_date` FROM `site_sblog_items` WHERE `item_status` = '1' AND `item_publish_date` >= '2014-02-02 00:00:00' AND `DATE_FORMAT(real_time, '%Y')` = 'DATE_FORMAT(2014, \'%Y\')' AND `DAY("datetime")` = 'DAY(\".$aday.\")' AND `item_url` = '0' ORDER BY `item_publish_date` DESC LIMIT 0,10 ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in D:\OpenServer\domains\localhost\kohana3\modules\database\classes\Kohana\Database\Query.php:251
2014-05-21 11:40:33 --- DEBUG: #0 D:\OpenServer\domains\localhost\kohana3\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(1, 'SELECT `id_item...', false, Array)
#1 D:\OpenServer\domains\localhost\spieler\application\classes\model\Blog.php(591): Kohana_Database_Query->execute()
#2 D:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php(169): Model_Blog->get_archive('2014', '02', '02')
#3 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(84): Controller_Blog->action_archive()
#4 [internal function]: Kohana_Controller->execute()
#5 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Blog))
#6 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 D:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#9 {main} in D:\OpenServer\domains\localhost\kohana3\modules\database\classes\Kohana\Database\Query.php:251
2014-05-21 11:41:34 --- CRITICAL: Database_Exception [ 1054 ]: Unknown column 'DATE_FORMAT(item_publish_date, '%Y')' in 'where clause' [ SELECT `id_item`, `item_title`, `item_url`, `item_text`, `item_text_full`, `item_publish_date` FROM `site_sblog_items` WHERE `item_status` = '1' AND `item_publish_date` >= '2014-02-02 00:00:00' AND `DATE_FORMAT(item_publish_date, '%Y')` = 'DATE_FORMAT(2014, \'%Y\')' AND `DAY("datetime")` = 'DAY(\".$aday.\")' AND `item_url` = '0' ORDER BY `item_publish_date` DESC LIMIT 0,10 ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in D:\OpenServer\domains\localhost\kohana3\modules\database\classes\Kohana\Database\Query.php:251
2014-05-21 11:41:34 --- DEBUG: #0 D:\OpenServer\domains\localhost\kohana3\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(1, 'SELECT `id_item...', false, Array)
#1 D:\OpenServer\domains\localhost\spieler\application\classes\model\Blog.php(591): Kohana_Database_Query->execute()
#2 D:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php(169): Model_Blog->get_archive('2014', '02', '02')
#3 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(84): Controller_Blog->action_archive()
#4 [internal function]: Kohana_Controller->execute()
#5 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Blog))
#6 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 D:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#9 {main} in D:\OpenServer\domains\localhost\kohana3\modules\database\classes\Kohana\Database\Query.php:251
2014-05-21 11:41:50 --- CRITICAL: Database_Exception [ 1054 ]: Unknown column 'DATE_FORMAT('item_publish_date', '%Y')' in 'where clause' [ SELECT `id_item`, `item_title`, `item_url`, `item_text`, `item_text_full`, `item_publish_date` FROM `site_sblog_items` WHERE `item_status` = '1' AND `item_publish_date` >= '2014-02-02 00:00:00' AND `DATE_FORMAT('item_publish_date', '%Y')` = 'DATE_FORMAT(2014, \'%Y\')' AND `DAY("datetime")` = 'DAY(\".$aday.\")' AND `item_url` = '0' ORDER BY `item_publish_date` DESC LIMIT 0,10 ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in D:\OpenServer\domains\localhost\kohana3\modules\database\classes\Kohana\Database\Query.php:251
2014-05-21 11:41:50 --- DEBUG: #0 D:\OpenServer\domains\localhost\kohana3\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(1, 'SELECT `id_item...', false, Array)
#1 D:\OpenServer\domains\localhost\spieler\application\classes\model\Blog.php(591): Kohana_Database_Query->execute()
#2 D:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php(169): Model_Blog->get_archive('2014', '02', '02')
#3 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(84): Controller_Blog->action_archive()
#4 [internal function]: Kohana_Controller->execute()
#5 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Blog))
#6 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 D:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#9 {main} in D:\OpenServer\domains\localhost\kohana3\modules\database\classes\Kohana\Database\Query.php:251
2014-05-21 11:43:07 --- CRITICAL: ErrorException [ 2 ]: date_format() expects parameter 1 to be DateTime, string given ~ APPPATH\classes\model\Blog.php [ 539 ] in file:line
2014-05-21 11:43:07 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'date_format() e...', 'D:\OpenServer\d...', 539, Array)
#1 D:\OpenServer\domains\localhost\spieler\application\classes\model\Blog.php(539): date_format('item_publish_da...', '%Y')
#2 D:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php(169): Model_Blog->get_archive('2014', '02', '02')
#3 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(84): Controller_Blog->action_archive()
#4 [internal function]: Kohana_Controller->execute()
#5 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Blog))
#6 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 D:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#9 {main} in file:line
2014-05-21 11:43:24 --- CRITICAL: ErrorException [ 8 ]: Use of undefined constant item_publish_date - assumed 'item_publish_date' ~ APPPATH\classes\model\Blog.php [ 539 ] in D:\OpenServer\domains\localhost\spieler\application\classes\model\Blog.php:539
2014-05-21 11:43:24 --- DEBUG: #0 D:\OpenServer\domains\localhost\spieler\application\classes\model\Blog.php(539): Kohana_Core::error_handler(8, 'Use of undefine...', 'D:\OpenServer\d...', 539, Array)
#1 D:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php(169): Model_Blog->get_archive('2014', '02', '02')
#2 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(84): Controller_Blog->action_archive()
#3 [internal function]: Kohana_Controller->execute()
#4 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Blog))
#5 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 D:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#8 {main} in D:\OpenServer\domains\localhost\spieler\application\classes\model\Blog.php:539
2014-05-21 11:43:36 --- CRITICAL: ErrorException [ 2 ]: date_format() expects parameter 1 to be DateTime, string given ~ APPPATH\classes\model\Blog.php [ 539 ] in file:line
2014-05-21 11:43:36 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'date_format() e...', 'D:\OpenServer\d...', 539, Array)
#1 D:\OpenServer\domains\localhost\spieler\application\classes\model\Blog.php(539): date_format('item_publish_da...', '%Y')
#2 D:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php(169): Model_Blog->get_archive('2014', '02', '02')
#3 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(84): Controller_Blog->action_archive()
#4 [internal function]: Kohana_Controller->execute()
#5 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Blog))
#6 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 D:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#9 {main} in file:line
2014-05-21 11:46:33 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ')' ~ APPPATH\classes\model\Blog.php [ 541 ] in file:line
2014-05-21 11:46:33 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-05-21 11:46:40 --- CRITICAL: Database_Exception [ 1054 ]: Unknown column 'DAY("datetime")' in 'where clause' [ SELECT `id_item`, `item_title`, `item_url`, `item_text`, `item_text_full`, `item_publish_date` FROM `site_sblog_items` WHERE `item_status` = '1' AND `item_publish_date` >= '2014-02-02 00:00:00' AND `item_publish_date` LIKE '%02%' AND `DAY("datetime")` = 'DAY(\".$aday.\")' AND `item_url` = '0' ORDER BY `item_publish_date` DESC LIMIT 0,10 ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in D:\OpenServer\domains\localhost\kohana3\modules\database\classes\Kohana\Database\Query.php:251
2014-05-21 11:46:40 --- DEBUG: #0 D:\OpenServer\domains\localhost\kohana3\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(1, 'SELECT `id_item...', false, Array)
#1 D:\OpenServer\domains\localhost\spieler\application\classes\model\Blog.php(591): Kohana_Database_Query->execute()
#2 D:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php(169): Model_Blog->get_archive('2014', '02', '02')
#3 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(84): Controller_Blog->action_archive()
#4 [internal function]: Kohana_Controller->execute()
#5 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Blog))
#6 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 D:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#9 {main} in D:\OpenServer\domains\localhost\kohana3\modules\database\classes\Kohana\Database\Query.php:251
2014-05-21 11:49:29 --- CRITICAL: ErrorException [ 8 ]: Undefined index: day ~ SYSPATH\classes\Kohana\Validation.php [ 102 ] in D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Validation.php:102
2014-05-21 11:49:29 --- DEBUG: #0 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Validation.php(102): Kohana_Core::error_handler(8, 'Undefined index...', 'D:\OpenServer\d...', 102, Array)
#1 D:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php(167): Kohana_Validation->offsetGet('day')
#2 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(84): Controller_Blog->action_archive()
#3 [internal function]: Kohana_Controller->execute()
#4 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Blog))
#5 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 D:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#8 {main} in D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Validation.php:102