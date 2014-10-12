<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2014-05-27 22:21:54 --- CRITICAL: ErrorException [ 8 ]: Undefined property: Controller_Blog::$breadcrumb ~ APPPATH\classes\controller\Blog.php [ 35 ] in D:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php:35
2014-05-27 22:21:54 --- DEBUG: #0 D:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php(35): Kohana_Core::error_handler(8, 'Undefined prope...', 'D:\OpenServer\d...', 35, Array)
#1 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(84): Controller_Blog->action_index()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Blog))
#4 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 D:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#7 {main} in D:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php:35
2014-05-27 22:27:53 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: _columns_data ~ APPPATH\classes\controller\Blog.php [ 41 ] in D:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php:41
2014-05-27 22:27:53 --- DEBUG: #0 D:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php(41): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\OpenServer\d...', 41, Array)
#1 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(84): Controller_Blog->action_index()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Blog))
#4 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 D:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#7 {main} in D:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php:41
2014-05-27 22:37:45 --- CRITICAL: ErrorException [ 8 ]: Undefined property: Controller_Blog::$breadcrumb ~ APPPATH\classes\controller\Blog.php [ 166 ] in D:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php:166
2014-05-27 22:37:45 --- DEBUG: #0 D:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php(166): Kohana_Core::error_handler(8, 'Undefined prope...', 'D:\OpenServer\d...', 166, Array)
#1 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(84): Controller_Blog->action_by_section()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Blog))
#4 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 D:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#7 {main} in D:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php:166
2014-05-27 22:57:08 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: entryurl ~ APPPATH\classes\controller\Blog.php [ 361 ] in D:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php:361
2014-05-27 22:57:08 --- DEBUG: #0 D:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php(361): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\OpenServer\d...', 361, Array)
#1 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(84): Controller_Blog->action_rss()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Blog))
#4 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 D:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#7 {main} in D:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php:361
2014-05-27 22:57:50 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: cache_key ~ APPPATH\classes\controller\Blog.php [ 362 ] in D:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php:362
2014-05-27 22:57:50 --- DEBUG: #0 D:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php(362): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\OpenServer\d...', 362, Array)
#1 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(84): Controller_Blog->action_rss()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Blog))
#4 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 D:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#7 {main} in D:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php:362
2014-05-27 22:59:08 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: url_type ~ APPPATH\classes\controller\Blog.php [ 378 ] in D:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php:378
2014-05-27 22:59:08 --- DEBUG: #0 D:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php(378): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\OpenServer\d...', 378, Array)
#1 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(84): Controller_Blog->action_rss()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Blog))
#4 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 D:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#7 {main} in D:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php:378