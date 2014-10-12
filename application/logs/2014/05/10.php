<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2014-05-10 23:26:22 --- ERROR: ErrorException [ 8 ]: Undefined index:  feedback ~ APPPATH\bootstrap.php [ 73 ]
2014-05-10 23:26:22 --- STRACE: ErrorException [ 8 ]: Undefined index:  feedback ~ APPPATH\bootstrap.php [ 73 ]
--
#0 E:\OpenServer\domains\localhost\spieler\application\bootstrap.php(73): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\OpenServer\d...', 73, Array)
#1 E:\OpenServer\domains\localhost\spieler\index.php(102): require('E:\OpenServer\d...')
#2 {main}
2014-05-10 23:27:06 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL / was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2014-05-10 23:27:06 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL / was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 E:\OpenServer\domains\localhost\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 E:\OpenServer\domains\localhost\kohana\system\classes\kohana\request.php(1154): Kohana_Request_Client->execute(Object(Request))
#2 E:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#3 {main}
2014-05-10 23:38:25 --- ERROR: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\kohana\kohana\exception.php [ 57 ]
2014-05-10 23:38:25 --- STRACE: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\kohana\kohana\exception.php [ 57 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-05-10 23:39:37 --- ERROR: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\kohana\kohana\exception.php [ 57 ]
2014-05-10 23:39:37 --- STRACE: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\kohana\kohana\exception.php [ 57 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-05-10 23:39:38 --- ERROR: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\kohana\kohana\exception.php [ 57 ]
2014-05-10 23:39:38 --- STRACE: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\kohana\kohana\exception.php [ 57 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-05-10 23:39:47 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL / was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2014-05-10 23:39:47 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL / was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 E:\OpenServer\domains\localhost\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 E:\OpenServer\domains\localhost\kohana\system\classes\kohana\request.php(1154): Kohana_Request_Client->execute(Object(Request))
#2 E:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#3 {main}
2014-05-10 23:40:16 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL / was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2014-05-10 23:40:16 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL / was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 E:\OpenServer\domains\localhost\kohana\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 E:\OpenServer\domains\localhost\kohana\system\classes\kohana\request.php(1154): Kohana_Request_Client->execute(Object(Request))
#2 E:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#3 {main}