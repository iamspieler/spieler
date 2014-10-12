<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2014-06-05 00:53:11 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected T_VARIABLE, expecting T_STRING ~ APPPATH\classes\model\Blog.php [ 534 ] in file:line
2014-06-05 00:53:11 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 00:54:36 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 00:54:36 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 00:54:36 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 00:54:36 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 00:54:36 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 00:54:36 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 00:54:36 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 00:54:36 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 00:54:36 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 00:54:36 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 00:54:36 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 00:54:36 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 00:54:36 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 00:54:36 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 00:54:39 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 00:54:39 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 00:54:39 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 00:54:39 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 00:54:39 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 00:54:39 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 00:54:39 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 00:54:39 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 00:54:40 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 00:54:40 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 00:54:40 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 00:54:40 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 00:54:40 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 00:54:40 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:11:52 --- CRITICAL: Database_Exception [ 1054 ]: Unknown column 'site_sblog_items.item_title' in 'group statement' [ SELECT `id_item`, `item_title_ru`, `item_text_ru`, `item_text_full_ru`, `item_url`, `item_picture`, `item_publish_date`, Group_concat(site_sblog_sections.section_url SEPARATOR '::::') sect_ids, Group_concat(site_sblog_sections.section_title SEPARATOR '::::') sect_names  FROM `site_sblog_items` INNER JOIN `site_sblog_is` ON (`site_sblog_items`.`id_item` = `site_sblog_is`.`item_id`) INNER JOIN `site_sblog_sections` ON (`site_sblog_is`.`section_id` = `site_sblog_sections`.`id_section`) WHERE `item_status` = '1' AND `section_status` = 1 AND `item_publish_date`  ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in E:\OpenServer\domains\localhost\kohana3\modules\database\classes\Kohana\Database\Query.php:251
2014-06-05 01:11:52 --- DEBUG: #0 E:\OpenServer\domains\localhost\kohana3\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(1, 'SELECT `id_item...', false, Array)
#1 E:\OpenServer\domains\localhost\spieler\application\classes\model\Blog.php(563): Kohana_Database_Query->execute()
#2 E:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php(44): Model_Blog->get_items('1', 0, 'ru')
#3 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(84): Controller_Blog->action_index()
#4 [internal function]: Kohana_Controller->execute()
#5 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Blog))
#6 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 E:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#9 {main} in E:\OpenServer\domains\localhost\kohana3\modules\database\classes\Kohana\Database\Query.php:251
2014-06-05 01:12:59 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:12:59 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:12:59 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:12:59 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:12:59 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:12:59 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:12:59 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:12:59 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:12:59 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:12:59 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:12:59 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:12:59 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:12:59 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:12:59 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:13:25 --- CRITICAL: ErrorException [ 8 ]: Undefined index: item_title ~ APPPATH\views\Blog\List.php [ 26 ] in E:\OpenServer\domains\localhost\spieler\application\views\Blog\List.php:26
2014-06-05 01:13:25 --- DEBUG: #0 E:\OpenServer\domains\localhost\spieler\application\views\Blog\List.php(26): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\OpenServer\d...', 26, Array)
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
#14 {main} in E:\OpenServer\domains\localhost\spieler\application\views\Blog\List.php:26
2014-06-05 01:13:25 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:13:25 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:13:25 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:13:25 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:13:25 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:13:25 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:13:25 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:13:25 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:13:25 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:13:25 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:13:25 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:13:25 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:13:25 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:13:25 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:15:19 --- CRITICAL: ErrorException [ 8 ]: Undefined index: item_text ~ APPPATH\views\Blog\List.php [ 27 ] in E:\OpenServer\domains\localhost\spieler\application\views\Blog\List.php:27
2014-06-05 01:15:19 --- DEBUG: #0 E:\OpenServer\domains\localhost\spieler\application\views\Blog\List.php(27): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\OpenServer\d...', 27, Array)
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
#14 {main} in E:\OpenServer\domains\localhost\spieler\application\views\Blog\List.php:27
2014-06-05 01:15:20 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:15:20 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:15:20 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:15:20 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:15:20 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:15:20 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:15:20 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:15:20 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:15:20 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:15:20 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:15:20 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:15:20 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:15:20 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:15:20 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:15:43 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:15:43 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:15:43 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:15:43 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:15:43 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:15:43 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:15:43 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:15:43 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:15:43 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:15:43 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:15:43 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:15:43 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:15:43 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:15:43 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:16:12 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:16:12 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:16:12 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:16:12 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:16:12 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:16:12 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:16:12 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:16:12 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:16:12 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:16:12 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:16:12 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:16:12 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:16:12 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:16:12 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:16:40 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:16:40 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:16:40 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:16:40 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:16:40 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:16:40 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:16:40 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:16:40 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:16:40 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:16:40 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:16:40 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:16:40 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:16:40 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:16:40 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:16:52 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:16:52 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:16:52 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:16:52 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:16:52 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:16:52 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:16:52 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:16:52 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:16:52 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:16:52 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:16:52 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:16:52 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:16:52 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:16:52 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:22:38 --- CRITICAL: Database_Exception [ 1054 ]: Unknown column 'site_sblog_sections.section_title' in 'field list' [ SELECT `id_item`, `item_title_en`, `item_text_en`, `item_text_full_en`, `item_url`, `item_picture`, `item_publish_date`, Group_concat(site_sblog_sections.section_url SEPARATOR '::::') sect_ids, Group_concat(site_sblog_sections.section_title SEPARATOR '::::') sect_names  FROM `site_sblog_items` INNER JOIN `site_sblog_is` ON (`site_sblog_items`.`id_item` = `site_sblog_is`.`item_id`) INNER JOIN `site_sblog_sections` ON (`site_sblog_is`.`section_id` = `site_sblog_sections`.`id_section`) WHERE `item_status` = '1' AND `section_status` = 1 AND `item_publish_date`  ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in E:\OpenServer\domains\localhost\kohana3\modules\database\classes\Kohana\Database\Query.php:251
2014-06-05 01:22:38 --- DEBUG: #0 E:\OpenServer\domains\localhost\kohana3\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(1, 'SELECT `id_item...', false, Array)
#1 E:\OpenServer\domains\localhost\spieler\application\classes\model\Blog.php(565): Kohana_Database_Query->execute()
#2 E:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php(44): Model_Blog->get_items('1', 0, 'en')
#3 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(84): Controller_Blog->action_index()
#4 [internal function]: Kohana_Controller->execute()
#5 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Blog))
#6 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 E:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#9 {main} in E:\OpenServer\domains\localhost\kohana3\modules\database\classes\Kohana\Database\Query.php:251
2014-06-05 01:23:58 --- CRITICAL: ErrorException [ 8 ]: Undefined index: section_title ~ APPPATH\views\Blog\List.php [ 4 ] in E:\OpenServer\domains\localhost\spieler\application\views\Blog\List.php:4
2014-06-05 01:23:58 --- DEBUG: #0 E:\OpenServer\domains\localhost\spieler\application\views\Blog\List.php(4): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\OpenServer\d...', 4, Array)
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
#14 {main} in E:\OpenServer\domains\localhost\spieler\application\views\Blog\List.php:4
2014-06-05 01:23:58 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:23:58 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:23:58 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:23:58 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:23:58 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:23:58 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:23:58 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:23:58 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:23:58 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:23:58 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:23:58 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:23:58 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:24:29 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:24:29 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:24:29 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:24:29 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:24:29 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:24:29 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:24:30 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:24:30 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:24:30 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:24:30 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:24:30 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:24:30 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:24:30 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:24:30 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:25:01 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:25:01 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:25:01 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:25:01 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:25:01 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:25:01 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:25:01 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:25:01 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:25:01 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:25:01 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:25:01 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:25:01 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:25:02 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:25:02 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:25:50 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:25:50 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:25:50 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:25:50 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:25:50 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:25:50 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:25:50 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:25:50 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:25:50 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:25:50 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:25:51 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:25:51 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:25:51 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:25:51 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:25:57 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:25:57 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:25:57 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:25:57 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:25:57 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:25:57 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:25:57 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:25:57 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:25:57 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:25:57 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:25:57 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:25:57 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:25:57 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:25:57 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:26:01 --- CRITICAL: Database_Exception [ 1054 ]: Unknown column 'item_title' in 'field list' [ SELECT `id_item`, `item_title`, `item_url`, `item_text`, `item_text_full`, `item_picture`, `item_publish_date`, `id_section`, `section_title`, `section_url` FROM `site_sblog_items` JOIN `site_sblog_is` ON (`site_sblog_is`.`item_id` = `site_sblog_items`.`id_item`) JOIN `site_sblog_sections` ON (`site_sblog_sections`.`id_section` = `site_sblog_is`.`section_id`) WHERE `item_status` = '1' AND `item_publish_date`  ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in E:\OpenServer\domains\localhost\kohana3\modules\database\classes\Kohana\Database\Query.php:251
2014-06-05 01:26:01 --- DEBUG: #0 E:\OpenServer\domains\localhost\kohana3\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(1, 'SELECT `id_item...', false, Array)
#1 E:\OpenServer\domains\localhost\spieler\application\classes\model\Blog.php(605): Kohana_Database_Query->execute()
#2 E:\OpenServer\domains\localhost\spieler\application\classes\controller\Blog.php(203): Model_Blog->get_items_section('section2', '1', 0)
#3 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Controller.php(84): Controller_Blog->action_by_section()
#4 [internal function]: Kohana_Controller->execute()
#5 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Blog))
#6 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 E:\OpenServer\domains\localhost\kohana3\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 E:\OpenServer\domains\localhost\spieler\index.php(109): Kohana_Request->execute()
#9 {main} in E:\OpenServer\domains\localhost\kohana3\modules\database\classes\Kohana\Database\Query.php:251
2014-06-05 01:31:04 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:31:04 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:31:04 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:31:04 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:31:04 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:31:04 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:31:04 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:31:04 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:31:04 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:31:04 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:31:04 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:31:04 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:31:04 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:31:04 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:31:12 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:31:12 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:31:13 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:31:13 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:31:13 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:31:13 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:31:13 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:31:13 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:31:13 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:31:13 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:31:13 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:31:13 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:31:13 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:31:13 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:34:36 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:34:36 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:34:36 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:34:36 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:34:36 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:34:36 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:34:36 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:34:36 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:34:36 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:34:36 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:34:36 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:34:36 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:34:37 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:34:37 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:34:59 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:34:59 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:34:59 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:34:59 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:34:59 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:34:59 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:34:59 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:34:59 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:34:59 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:34:59 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:34:59 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:34:59 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:34:59 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:34:59 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:35:44 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:35:44 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:35:44 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:35:44 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:35:44 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:35:44 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:35:44 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:35:44 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:35:44 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:35:44 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:35:44 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:35:44 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:35:44 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:35:44 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:36:20 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:36:20 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:36:20 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:36:20 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:36:20 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:36:20 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:36:20 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:36:20 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:36:20 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:36:20 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:36:20 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:36:20 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:36:20 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:36:20 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:36:45 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:36:45 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:36:45 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:36:45 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:36:45 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:36:45 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:36:45 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:36:45 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:36:45 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:36:45 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:36:45 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:36:45 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 01:36:46 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 01:36:46 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:38:51 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:38:51 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:38:51 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:38:51 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:38:51 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:38:51 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:39:21 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:39:21 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:39:21 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:39:21 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:39:21 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:39:21 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:39:21 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:39:21 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:39:21 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:39:21 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:39:22 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:39:22 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:39:22 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:39:22 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:42:24 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:42:24 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:42:24 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:42:24 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:42:24 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:42:24 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:42:24 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:42:24 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:42:24 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:42:24 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:42:24 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:42:24 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:42:24 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:42:24 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:42:59 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:42:59 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:42:59 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:42:59 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:42:59 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:42:59 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:42:59 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:42:59 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:42:59 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:42:59 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:42:59 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:42:59 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:42:59 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:42:59 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:43:10 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:43:10 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:43:10 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:43:10 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:43:10 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:43:10 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:43:10 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:43:10 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:43:11 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:43:11 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:43:11 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:43:11 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:43:11 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:43:11 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:43:35 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:43:35 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:43:35 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:43:35 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:43:35 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:43:35 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:43:35 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:43:35 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:43:35 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:43:35 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:43:35 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:43:35 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:43:35 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:43:35 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:43:46 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:43:46 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:43:46 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:43:46 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:43:46 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:43:46 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:43:46 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:43:46 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:43:46 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:43:46 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:43:46 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:43:46 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:43:46 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:43:46 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:44:14 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:44:14 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:44:14 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:44:14 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:44:14 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:44:14 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:44:14 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:44:14 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:44:14 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:44:14 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:44:14 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:44:14 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:44:14 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:44:14 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:44:30 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:44:30 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:44:30 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:44:30 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:44:30 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:44:30 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:44:30 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:44:30 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:44:30 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:44:30 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:44:30 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:44:30 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:44:30 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:44:30 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:45:08 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:45:08 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:45:08 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:45:08 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:45:08 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:45:08 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:45:08 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:45:08 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:45:08 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:45:08 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:45:08 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:45:08 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:45:08 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:45:08 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:45:41 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:45:41 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:45:41 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:45:41 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:45:41 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:45:41 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:45:41 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:45:41 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:45:41 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:45:41 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:45:41 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:45:41 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:45:42 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:45:42 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:46:09 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:46:09 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:46:09 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:46:09 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:46:09 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:46:09 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:46:09 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:46:09 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:46:09 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:46:09 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:46:09 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:46:09 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:46:09 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:46:09 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:46:23 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:46:23 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:46:23 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:46:23 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:46:23 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:46:23 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:46:23 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:46:23 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:46:23 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:46:23 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:46:23 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:46:23 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:46:23 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:46:23 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:47:07 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:47:07 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:47:07 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:47:07 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:47:07 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:47:07 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:47:07 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:47:07 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:47:07 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:47:07 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:47:07 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:47:07 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:47:07 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function __() ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 53 ] in file:line
2014-06-05 08:47:07 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-05 08:47:24 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '.' ~ APPPATH\classes\controller\Common.php [ 94 ] in file:line
2014-06-05 08:47:24 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line