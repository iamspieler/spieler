<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2014-06-01 22:39:36 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: global_config ~ APPPATH\classes\controller\Blog.php [ 189 ] in E:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php:189
2014-06-01 22:39:36 --- DEBUG: #0 E:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php(189): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\OpenServer\d...', 189, Array)
#1 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(84): Controller_Blog->action_by_section()
#2 [internal function]: Kohana_Controller->execute()
#3 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Blog))
#4 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 E:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#7 {main} in E:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php:189
2014-06-01 23:19:23 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: array ~ APPPATH\bootstrap.php [ 70 ] in E:\OpenServer\domains\localhost\spieler\application\bootstrap.php:70
2014-06-01 23:19:23 --- DEBUG: #0 E:\OpenServer\domains\localhost\spieler\application\bootstrap.php(70): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\OpenServer\d...', 70, Array)
#1 E:\OpenServer\domains\localhost\spieler\index.php(102): require('E:\OpenServer\d...')
#2 {main} in E:\OpenServer\domains\localhost\spieler\application\bootstrap.php:70
2014-06-01 23:19:30 --- CRITICAL: ErrorException [ 2 ]: array_keys() expects parameter 1 to be array, object given ~ APPPATH\bootstrap.php [ 70 ] in file:line
2014-06-01 23:19:30 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'array_keys() ex...', 'E:\OpenServer\d...', 70, Array)
#1 E:\OpenServer\domains\localhost\spieler\application\bootstrap.php(70): array_keys(Object(Config_Group))
#2 E:\OpenServer\domains\localhost\spieler\index.php(102): require('E:\OpenServer\d...')
#3 {main} in file:line
2014-06-01 23:21:06 --- CRITICAL: ErrorException [ 8 ]: Undefined property: Config::$load ~ APPPATH\bootstrap.php [ 68 ] in E:\OpenServer\domains\localhost\spieler\application\bootstrap.php:68
2014-06-01 23:21:06 --- DEBUG: #0 E:\OpenServer\domains\localhost\spieler\application\bootstrap.php(68): Kohana_Core::error_handler(8, 'Undefined prope...', 'E:\OpenServer\d...', 68, Array)
#1 E:\OpenServer\domains\localhost\spieler\index.php(102): require('E:\OpenServer\d...')
#2 {main} in E:\OpenServer\domains\localhost\spieler\application\bootstrap.php:68
2014-06-01 23:22:10 --- CRITICAL: ErrorException [ 8 ]: Use of undefined constant key - assumed 'key' ~ APPPATH\bootstrap.php [ 69 ] in E:\OpenServer\domains\localhost\spieler\application\bootstrap.php:69
2014-06-01 23:22:10 --- DEBUG: #0 E:\OpenServer\domains\localhost\spieler\application\bootstrap.php(69): Kohana_Core::error_handler(8, 'Use of undefine...', 'E:\OpenServer\d...', 69, Array)
#1 E:\OpenServer\domains\localhost\spieler\index.php(102): require('E:\OpenServer\d...')
#2 {main} in E:\OpenServer\domains\localhost\spieler\application\bootstrap.php:69
2014-06-01 23:22:17 --- CRITICAL: ErrorException [ 8 ]: Undefined index:  key ~ APPPATH\bootstrap.php [ 69 ] in E:\OpenServer\domains\localhost\spieler\application\bootstrap.php:69
2014-06-01 23:22:17 --- DEBUG: #0 E:\OpenServer\domains\localhost\spieler\application\bootstrap.php(69): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\OpenServer\d...', 69, Array)
#1 E:\OpenServer\domains\localhost\spieler\index.php(102): require('E:\OpenServer\d...')
#2 {main} in E:\OpenServer\domains\localhost\spieler\application\bootstrap.php:69
2014-06-01 23:29:50 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: a:2:{s:2:"ru";s:2:"ru";s:2:"en";s:2:"en";} ~ APPPATH\bootstrap.php [ 70 ] in E:\OpenServer\domains\localhost\spieler\application\bootstrap.php:70
2014-06-01 23:29:50 --- DEBUG: #0 E:\OpenServer\domains\localhost\spieler\application\bootstrap.php(70): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\OpenServer\d...', 70, Array)
#1 E:\OpenServer\domains\localhost\spieler\index.php(102): require('E:\OpenServer\d...')
#2 {main} in E:\OpenServer\domains\localhost\spieler\application\bootstrap.php:70