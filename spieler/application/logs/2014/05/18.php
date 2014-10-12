<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2014-05-18 23:43:05 --- CRITICAL: ErrorException [ 2048 ]: Only variables should be passed by reference ~ APPPATH\classes\controller\Blog.php [ 25 ] in E:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php:25
2014-05-18 23:43:05 --- DEBUG: #0 E:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php(25): Kohana_Core::error_handler(2048, 'Only variables ...', 'E:\OpenServer\d...', 25, Array)
#1 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(84): Controller_Blog->action_index()
#2 [internal function]: Kohana_Controller->execute()
#3 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Blog))
#4 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 E:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#7 {main} in E:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php:25
2014-05-18 23:44:29 --- CRITICAL: ErrorException [ 2048 ]: Only variables should be passed by reference ~ APPPATH\classes\controller\Blog.php [ 26 ] in E:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php:26
2014-05-18 23:44:29 --- DEBUG: #0 E:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php(26): Kohana_Core::error_handler(2048, 'Only variables ...', 'E:\OpenServer\d...', 26, Array)
#1 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(84): Controller_Blog->action_index()
#2 [internal function]: Kohana_Controller->execute()
#3 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Blog))
#4 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 E:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#7 {main} in E:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php:26