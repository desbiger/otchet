<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2014-07-31 02:34:30 --- EMERGENCY: ErrorException [ 4096 ]: Object of class Database_MySQL_Result could not be converted to string ~ APPPATH/views/blocks/task_detail.php [ 23 ] in /home/bitrix/ext_www/otchet/application/views/blocks/task_detail.php:23
2014-07-31 02:34:30 --- DEBUG: #0 /home/bitrix/ext_www/otchet/application/views/blocks/task_detail.php(23): Kohana_Core::error_handler(4096, 'Object of class...', '/home/bitrix/ex...', 23, Array)
#1 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(61): include('/home/bitrix/ex...')
#2 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(348): Kohana_View::capture('/home/bitrix/ex...', Array)
#3 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /home/bitrix/ext_www/otchet/application/views/base/base_template.php(23): Kohana_View->__toString()
#5 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(61): include('/home/bitrix/ex...')
#6 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(348): Kohana_View::capture('/home/bitrix/ex...', Array)
#7 /home/bitrix/ext_www/otchet/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#8 /home/bitrix/ext_www/otchet/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Projects))
#11 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#13 /home/bitrix/ext_www/otchet/index.php(118): Kohana_Request->execute()
#14 {main} in /home/bitrix/ext_www/otchet/application/views/blocks/task_detail.php:23
2014-07-31 02:35:41 --- EMERGENCY: Kohana_Exception [ 0 ]: Method find_all() cannot be called on loaded objects ~ MODPATH/orm/classes/Kohana/ORM.php [ 991 ] in /home/bitrix/ext_www/otchet/application/views/blocks/task_detail.php:23
2014-07-31 02:35:41 --- DEBUG: #0 /home/bitrix/ext_www/otchet/application/views/blocks/task_detail.php(23): Kohana_ORM->find_all()
#1 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(61): include('/home/bitrix/ex...')
#2 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(348): Kohana_View::capture('/home/bitrix/ex...', Array)
#3 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /home/bitrix/ext_www/otchet/application/views/base/base_template.php(23): Kohana_View->__toString()
#5 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(61): include('/home/bitrix/ex...')
#6 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(348): Kohana_View::capture('/home/bitrix/ex...', Array)
#7 /home/bitrix/ext_www/otchet/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#8 /home/bitrix/ext_www/otchet/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Projects))
#11 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#13 /home/bitrix/ext_www/otchet/index.php(118): Kohana_Request->execute()
#14 {main} in /home/bitrix/ext_www/otchet/application/views/blocks/task_detail.php:23
2014-07-31 02:35:48 --- EMERGENCY: ErrorException [ 4096 ]: Object of class Database_MySQL_Result could not be converted to string ~ APPPATH/views/blocks/task_detail.php [ 23 ] in /home/bitrix/ext_www/otchet/application/views/blocks/task_detail.php:23
2014-07-31 02:35:48 --- DEBUG: #0 /home/bitrix/ext_www/otchet/application/views/blocks/task_detail.php(23): Kohana_Core::error_handler(4096, 'Object of class...', '/home/bitrix/ex...', 23, Array)
#1 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(61): include('/home/bitrix/ex...')
#2 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(348): Kohana_View::capture('/home/bitrix/ex...', Array)
#3 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /home/bitrix/ext_www/otchet/application/views/base/base_template.php(23): Kohana_View->__toString()
#5 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(61): include('/home/bitrix/ex...')
#6 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(348): Kohana_View::capture('/home/bitrix/ex...', Array)
#7 /home/bitrix/ext_www/otchet/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#8 /home/bitrix/ext_www/otchet/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Projects))
#11 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#13 /home/bitrix/ext_www/otchet/index.php(118): Kohana_Request->execute()
#14 {main} in /home/bitrix/ext_www/otchet/application/views/blocks/task_detail.php:23
2014-07-31 02:36:07 --- EMERGENCY: ErrorException [ 4096 ]: Object of class Database_MySQL_Result could not be converted to string ~ APPPATH/views/blocks/task_detail.php [ 23 ] in /home/bitrix/ext_www/otchet/application/views/blocks/task_detail.php:23
2014-07-31 02:36:07 --- DEBUG: #0 /home/bitrix/ext_www/otchet/application/views/blocks/task_detail.php(23): Kohana_Core::error_handler(4096, 'Object of class...', '/home/bitrix/ex...', 23, Array)
#1 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(61): include('/home/bitrix/ex...')
#2 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(348): Kohana_View::capture('/home/bitrix/ex...', Array)
#3 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /home/bitrix/ext_www/otchet/application/views/base/base_template.php(23): Kohana_View->__toString()
#5 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(61): include('/home/bitrix/ex...')
#6 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(348): Kohana_View::capture('/home/bitrix/ex...', Array)
#7 /home/bitrix/ext_www/otchet/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#8 /home/bitrix/ext_www/otchet/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Projects))
#11 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#13 /home/bitrix/ext_www/otchet/index.php(118): Kohana_Request->execute()
#14 {main} in /home/bitrix/ext_www/otchet/application/views/blocks/task_detail.php:23
2014-07-31 03:03:11 --- EMERGENCY: ErrorException [ 1 ]: Class 'Calendar' not found ~ DOCROOT/include/ganty/gantti.php [ 28 ] in file:line
2014-07-31 03:03:11 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-07-31 03:03:31 --- EMERGENCY: ErrorException [ 1 ]: Class 'Calendar' not found ~ DOCROOT/include/ganty/gantti.php [ 28 ] in file:line
2014-07-31 03:03:31 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-07-31 03:03:51 --- EMERGENCY: ErrorException [ 1 ]: Class 'Calendar' not found ~ DOCROOT/include/ganty/gantti.php [ 28 ] in file:line
2014-07-31 03:03:51 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-07-31 03:04:02 --- EMERGENCY: ErrorException [ 1 ]: Class 'Calendar' not found ~ DOCROOT/include/ganty/gantti.php [ 28 ] in file:line
2014-07-31 03:04:02 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-07-31 03:04:10 --- EMERGENCY: ErrorException [ 1 ]: Class 'Calendar' not found ~ DOCROOT/include/ganty/gantti.php [ 28 ] in file:line
2014-07-31 03:04:10 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-07-31 08:25:21 --- EMERGENCY: ErrorException [ 8 ]: Undefined property: Database_MySQL_Result::$date ~ APPPATH/views/blocks/task_detail.php [ 47 ] in /home/bitrix/ext_www/otchet/application/views/blocks/task_detail.php:47
2014-07-31 08:25:21 --- DEBUG: #0 /home/bitrix/ext_www/otchet/application/views/blocks/task_detail.php(47): Kohana_Core::error_handler(8, 'Undefined prope...', '/home/bitrix/ex...', 47, Array)
#1 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(61): include('/home/bitrix/ex...')
#2 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(348): Kohana_View::capture('/home/bitrix/ex...', Array)
#3 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /home/bitrix/ext_www/otchet/application/views/base/base_template.php(24): Kohana_View->__toString()
#5 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(61): include('/home/bitrix/ex...')
#6 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(348): Kohana_View::capture('/home/bitrix/ex...', Array)
#7 /home/bitrix/ext_www/otchet/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#8 /home/bitrix/ext_www/otchet/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Projects))
#11 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#13 /home/bitrix/ext_www/otchet/index.php(118): Kohana_Request->execute()
#14 {main} in /home/bitrix/ext_www/otchet/application/views/blocks/task_detail.php:47
2014-07-31 08:27:34 --- EMERGENCY: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/views/blocks/task_detail.php [ 47 ] in /home/bitrix/ext_www/otchet/application/views/blocks/task_detail.php:47
2014-07-31 08:27:34 --- DEBUG: #0 /home/bitrix/ext_www/otchet/application/views/blocks/task_detail.php(47): Kohana_Core::error_handler(8, 'Trying to get p...', '/home/bitrix/ex...', 47, Array)
#1 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(61): include('/home/bitrix/ex...')
#2 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(348): Kohana_View::capture('/home/bitrix/ex...', Array)
#3 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /home/bitrix/ext_www/otchet/application/views/base/base_template.php(24): Kohana_View->__toString()
#5 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(61): include('/home/bitrix/ex...')
#6 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(348): Kohana_View::capture('/home/bitrix/ex...', Array)
#7 /home/bitrix/ext_www/otchet/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#8 /home/bitrix/ext_www/otchet/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Projects))
#11 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#13 /home/bitrix/ext_www/otchet/index.php(118): Kohana_Request->execute()
#14 {main} in /home/bitrix/ext_www/otchet/application/views/blocks/task_detail.php:47
2014-07-31 08:29:58 --- EMERGENCY: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/views/blocks/task_detail.php [ 48 ] in /home/bitrix/ext_www/otchet/application/views/blocks/task_detail.php:48
2014-07-31 08:29:58 --- DEBUG: #0 /home/bitrix/ext_www/otchet/application/views/blocks/task_detail.php(48): Kohana_Core::error_handler(8, 'Trying to get p...', '/home/bitrix/ex...', 48, Array)
#1 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(61): include('/home/bitrix/ex...')
#2 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(348): Kohana_View::capture('/home/bitrix/ex...', Array)
#3 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /home/bitrix/ext_www/otchet/application/views/base/base_template.php(24): Kohana_View->__toString()
#5 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(61): include('/home/bitrix/ex...')
#6 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(348): Kohana_View::capture('/home/bitrix/ex...', Array)
#7 /home/bitrix/ext_www/otchet/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#8 /home/bitrix/ext_www/otchet/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Projects))
#11 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#13 /home/bitrix/ext_www/otchet/index.php(118): Kohana_Request->execute()
#14 {main} in /home/bitrix/ext_www/otchet/application/views/blocks/task_detail.php:48
2014-07-31 08:31:09 --- EMERGENCY: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/views/blocks/task_detail.php [ 47 ] in /home/bitrix/ext_www/otchet/application/views/blocks/task_detail.php:47
2014-07-31 08:31:09 --- DEBUG: #0 /home/bitrix/ext_www/otchet/application/views/blocks/task_detail.php(47): Kohana_Core::error_handler(8, 'Trying to get p...', '/home/bitrix/ex...', 47, Array)
#1 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(61): include('/home/bitrix/ex...')
#2 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(348): Kohana_View::capture('/home/bitrix/ex...', Array)
#3 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /home/bitrix/ext_www/otchet/application/views/base/base_template.php(24): Kohana_View->__toString()
#5 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(61): include('/home/bitrix/ex...')
#6 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(348): Kohana_View::capture('/home/bitrix/ex...', Array)
#7 /home/bitrix/ext_www/otchet/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#8 /home/bitrix/ext_www/otchet/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Projects))
#11 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#13 /home/bitrix/ext_www/otchet/index.php(118): Kohana_Request->execute()
#14 {main} in /home/bitrix/ext_www/otchet/application/views/blocks/task_detail.php:47
2014-07-31 08:33:24 --- EMERGENCY: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/views/blocks/task_detail.php [ 47 ] in /home/bitrix/ext_www/otchet/application/views/blocks/task_detail.php:47
2014-07-31 08:33:24 --- DEBUG: #0 /home/bitrix/ext_www/otchet/application/views/blocks/task_detail.php(47): Kohana_Core::error_handler(8, 'Trying to get p...', '/home/bitrix/ex...', 47, Array)
#1 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(61): include('/home/bitrix/ex...')
#2 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(348): Kohana_View::capture('/home/bitrix/ex...', Array)
#3 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /home/bitrix/ext_www/otchet/application/views/base/base_template.php(24): Kohana_View->__toString()
#5 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(61): include('/home/bitrix/ex...')
#6 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(348): Kohana_View::capture('/home/bitrix/ex...', Array)
#7 /home/bitrix/ext_www/otchet/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#8 /home/bitrix/ext_www/otchet/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Projects))
#11 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#13 /home/bitrix/ext_www/otchet/index.php(118): Kohana_Request->execute()
#14 {main} in /home/bitrix/ext_www/otchet/application/views/blocks/task_detail.php:47
2014-07-31 03:36:16 --- EMERGENCY: ErrorException [ 1 ]: Class 'Gantti' not found ~ APPPATH/views/tables/project.php [ 70 ] in file:line
2014-07-31 03:36:16 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-07-31 03:36:57 --- EMERGENCY: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/views/tables/project.php [ 66 ] in /home/bitrix/ext_www/otchet/application/views/tables/project.php:66
2014-07-31 03:36:57 --- DEBUG: #0 /home/bitrix/ext_www/otchet/application/views/tables/project.php(66): Kohana_Core::error_handler(8, 'Trying to get p...', '/home/bitrix/ex...', 66, Array)
#1 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(61): include('/home/bitrix/ex...')
#2 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(348): Kohana_View::capture('/home/bitrix/ex...', Array)
#3 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /home/bitrix/ext_www/otchet/application/views/base/base_template.php(24): Kohana_View->__toString()
#5 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(61): include('/home/bitrix/ex...')
#6 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(348): Kohana_View::capture('/home/bitrix/ex...', Array)
#7 /home/bitrix/ext_www/otchet/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#8 /home/bitrix/ext_www/otchet/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Projects))
#11 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#13 /home/bitrix/ext_www/otchet/index.php(118): Kohana_Request->execute()
#14 {main} in /home/bitrix/ext_www/otchet/application/views/tables/project.php:66
2014-07-31 04:37:30 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: data ~ APPPATH/views/tables/project.php [ 72 ] in /home/bitrix/ext_www/otchet/application/views/tables/project.php:72
2014-07-31 04:37:30 --- DEBUG: #0 /home/bitrix/ext_www/otchet/application/views/tables/project.php(72): Kohana_Core::error_handler(8, 'Undefined varia...', '/home/bitrix/ex...', 72, Array)
#1 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(61): include('/home/bitrix/ex...')
#2 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(348): Kohana_View::capture('/home/bitrix/ex...', Array)
#3 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /home/bitrix/ext_www/otchet/application/views/base/base_template.php(24): Kohana_View->__toString()
#5 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(61): include('/home/bitrix/ex...')
#6 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(348): Kohana_View::capture('/home/bitrix/ex...', Array)
#7 /home/bitrix/ext_www/otchet/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#8 /home/bitrix/ext_www/otchet/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Projects))
#11 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#13 /home/bitrix/ext_www/otchet/index.php(118): Kohana_Request->execute()
#14 {main} in /home/bitrix/ext_www/otchet/application/views/tables/project.php:72
2014-07-31 04:37:51 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '[' ~ APPPATH/views/tables/project.php [ 57 ] in file:line
2014-07-31 04:37:51 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-07-31 04:37:59 --- EMERGENCY: ErrorException [ 1 ]: Call to a member function month() on a non-object ~ DOCROOT/include/ganty/gantti.php [ 58 ] in file:line
2014-07-31 04:37:59 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-07-31 04:56:22 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: project ~ APPPATH/views/tables/project.php [ 20 ] in /home/bitrix/ext_www/otchet/application/views/tables/project.php:20
2014-07-31 04:56:22 --- DEBUG: #0 /home/bitrix/ext_www/otchet/application/views/tables/project.php(20): Kohana_Core::error_handler(8, 'Undefined varia...', '/home/bitrix/ex...', 20, Array)
#1 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(61): include('/home/bitrix/ex...')
#2 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(348): Kohana_View::capture('/home/bitrix/ex...', Array)
#3 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /home/bitrix/ext_www/otchet/application/views/base/base_template.php(24): Kohana_View->__toString()
#5 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(61): include('/home/bitrix/ex...')
#6 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(348): Kohana_View::capture('/home/bitrix/ex...', Array)
#7 /home/bitrix/ext_www/otchet/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#8 /home/bitrix/ext_www/otchet/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Projects))
#11 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#13 /home/bitrix/ext_www/otchet/index.php(118): Kohana_Request->execute()
#14 {main} in /home/bitrix/ext_www/otchet/application/views/tables/project.php:20
2014-07-31 05:04:31 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: gan ~ APPPATH/views/tables/project.php [ 87 ] in /home/bitrix/ext_www/otchet/application/views/tables/project.php:87
2014-07-31 05:04:31 --- DEBUG: #0 /home/bitrix/ext_www/otchet/application/views/tables/project.php(87): Kohana_Core::error_handler(8, 'Undefined varia...', '/home/bitrix/ex...', 87, Array)
#1 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(61): include('/home/bitrix/ex...')
#2 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(348): Kohana_View::capture('/home/bitrix/ex...', Array)
#3 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /home/bitrix/ext_www/otchet/application/views/base/base_template.php(24): Kohana_View->__toString()
#5 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(61): include('/home/bitrix/ex...')
#6 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(348): Kohana_View::capture('/home/bitrix/ex...', Array)
#7 /home/bitrix/ext_www/otchet/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#8 /home/bitrix/ext_www/otchet/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Projects))
#11 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#13 /home/bitrix/ext_www/otchet/index.php(118): Kohana_Request->execute()
#14 {main} in /home/bitrix/ext_www/otchet/application/views/tables/project.php:87
2014-07-31 05:07:04 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: data ~ APPPATH/views/tables/project.php [ 80 ] in /home/bitrix/ext_www/otchet/application/views/tables/project.php:80
2014-07-31 05:07:04 --- DEBUG: #0 /home/bitrix/ext_www/otchet/application/views/tables/project.php(80): Kohana_Core::error_handler(8, 'Undefined varia...', '/home/bitrix/ex...', 80, Array)
#1 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(61): include('/home/bitrix/ex...')
#2 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(348): Kohana_View::capture('/home/bitrix/ex...', Array)
#3 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /home/bitrix/ext_www/otchet/application/views/base/base_template.php(24): Kohana_View->__toString()
#5 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(61): include('/home/bitrix/ex...')
#6 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(348): Kohana_View::capture('/home/bitrix/ex...', Array)
#7 /home/bitrix/ext_www/otchet/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#8 /home/bitrix/ext_www/otchet/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Projects))
#11 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#13 /home/bitrix/ext_www/otchet/index.php(118): Kohana_Request->execute()
#14 {main} in /home/bitrix/ext_www/otchet/application/views/tables/project.php:80
2014-07-31 07:35:04 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: gan ~ APPPATH/views/tables/project.php [ 87 ] in /home/bitrix/ext_www/otchet/application/views/tables/project.php:87
2014-07-31 07:35:04 --- DEBUG: #0 /home/bitrix/ext_www/otchet/application/views/tables/project.php(87): Kohana_Core::error_handler(8, 'Undefined varia...', '/home/bitrix/ex...', 87, Array)
#1 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(61): include('/home/bitrix/ex...')
#2 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(348): Kohana_View::capture('/home/bitrix/ex...', Array)
#3 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /home/bitrix/ext_www/otchet/application/views/base/base_template.php(24): Kohana_View->__toString()
#5 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(61): include('/home/bitrix/ex...')
#6 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(348): Kohana_View::capture('/home/bitrix/ex...', Array)
#7 /home/bitrix/ext_www/otchet/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#8 /home/bitrix/ext_www/otchet/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Projects))
#11 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#13 /home/bitrix/ext_www/otchet/index.php(118): Kohana_Request->execute()
#14 {main} in /home/bitrix/ext_www/otchet/application/views/tables/project.php:87
2014-07-31 08:02:03 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: ganta ~ APPPATH/views/grafics/ganta.php [ 21 ] in /home/bitrix/ext_www/otchet/application/views/grafics/ganta.php:21
2014-07-31 08:02:03 --- DEBUG: #0 /home/bitrix/ext_www/otchet/application/views/grafics/ganta.php(21): Kohana_Core::error_handler(8, 'Undefined varia...', '/home/bitrix/ex...', 21, Array)
#1 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(61): include('/home/bitrix/ex...')
#2 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(348): Kohana_View::capture('/home/bitrix/ex...', Array)
#3 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /home/bitrix/ext_www/otchet/application/views/tables/project.php(64): Kohana_View->__toString()
#5 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(61): include('/home/bitrix/ex...')
#6 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(348): Kohana_View::capture('/home/bitrix/ex...', Array)
#7 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(228): Kohana_View->render()
#8 /home/bitrix/ext_www/otchet/application/views/base/base_template.php(27): Kohana_View->__toString()
#9 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(61): include('/home/bitrix/ex...')
#10 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(348): Kohana_View::capture('/home/bitrix/ex...', Array)
#11 /home/bitrix/ext_www/otchet/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#12 /home/bitrix/ext_www/otchet/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#13 [internal function]: Kohana_Controller->execute()
#14 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Projects))
#15 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#16 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#17 /home/bitrix/ext_www/otchet/index.php(118): Kohana_Request->execute()
#18 {main} in /home/bitrix/ext_www/otchet/application/views/grafics/ganta.php:21