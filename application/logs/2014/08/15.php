<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2014-08-15 11:15:09 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: 3 ~ APPPATH/views/blocks/task_detail.php [ 55 ] in /home/bitrix/ext_www/otchet/application/views/blocks/task_detail.php:55
2014-08-15 11:15:09 --- DEBUG: #0 /home/bitrix/ext_www/otchet/application/views/blocks/task_detail.php(55): Kohana_Core::error_handler(8, 'Undefined index...', '/home/bitrix/ex...', 55, Array)
#1 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(61): include('/home/bitrix/ex...')
#2 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(348): Kohana_View::capture('/home/bitrix/ex...', Array)
#3 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /home/bitrix/ext_www/otchet/application/views/base/base_template.php(82): Kohana_View->__toString()
#5 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(61): include('/home/bitrix/ex...')
#6 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(348): Kohana_View::capture('/home/bitrix/ex...', Array)
#7 /home/bitrix/ext_www/otchet/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#8 /home/bitrix/ext_www/otchet/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Projects))
#11 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#13 /home/bitrix/ext_www/otchet/index.php(118): Kohana_Request->execute()
#14 {main} in /home/bitrix/ext_www/otchet/application/views/blocks/task_detail.php:55
2014-08-15 11:16:24 --- EMERGENCY: ErrorException [ 1 ]: Call to undefined method My::GetDatasForGraphikProject() ~ APPPATH/views/tables/project.php [ 155 ] in file:line
2014-08-15 11:16:24 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-08-15 11:17:33 --- EMERGENCY: ErrorException [ 1 ]: Call to undefined method My::GetDatasForGraphikProject() ~ APPPATH/views/tables/project.php [ 155 ] in file:line
2014-08-15 11:17:33 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-08-15 15:58:41 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 2 ~ MODPATH/mymodule/classes/Kohana/My.php [ 108 ] in /home/bitrix/ext_www/otchet/modules/mymodule/classes/Kohana/My.php:108
2014-08-15 15:58:41 --- DEBUG: #0 /home/bitrix/ext_www/otchet/modules/mymodule/classes/Kohana/My.php(108): Kohana_Core::error_handler(8, 'Undefined offse...', '/home/bitrix/ex...', 108, Array)
#1 /home/bitrix/ext_www/otchet/modules/mymodule/classes/Kohana/My.php(101): Kohana_My::TimeToTimestamp(':00')
#2 /home/bitrix/ext_www/otchet/application/classes/Controller/Projects.php(95): Kohana_My::TimeBetwin(':00', ':00')
#3 /home/bitrix/ext_www/otchet/system/classes/Kohana/Controller.php(84): Controller_Projects->action_taskdetail()
#4 [internal function]: Kohana_Controller->execute()
#5 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Projects))
#6 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /home/bitrix/ext_www/otchet/index.php(118): Kohana_Request->execute()
#9 {main} in /home/bitrix/ext_www/otchet/modules/mymodule/classes/Kohana/My.php:108