<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2014-08-01 02:09:18 --- EMERGENCY: ErrorException [ 2 ]: date_timestamp_get() expects parameter 1 to be DateTime, string given ~ APPPATH/views/grafics/ganta.php [ 35 ] in file:line
2014-08-01 02:09:18 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'date_timestamp_...', '/home/bitrix/ex...', 35, Array)
#1 /home/bitrix/ext_www/otchet/application/views/grafics/ganta.php(35): date_timestamp_get('2014-07-30 12:2...')
#2 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(61): include('/home/bitrix/ex...')
#3 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(348): Kohana_View::capture('/home/bitrix/ex...', Array)
#4 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(228): Kohana_View->render()
#5 /home/bitrix/ext_www/otchet/application/views/tables/project.php(64): Kohana_View->__toString()
#6 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(61): include('/home/bitrix/ex...')
#7 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(348): Kohana_View::capture('/home/bitrix/ex...', Array)
#8 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(228): Kohana_View->render()
#9 /home/bitrix/ext_www/otchet/application/views/base/base_template.php(40): Kohana_View->__toString()
#10 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(61): include('/home/bitrix/ex...')
#11 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(348): Kohana_View::capture('/home/bitrix/ex...', Array)
#12 /home/bitrix/ext_www/otchet/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#13 /home/bitrix/ext_www/otchet/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#14 [internal function]: Kohana_Controller->execute()
#15 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Projects))
#16 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#17 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#18 /home/bitrix/ext_www/otchet/index.php(118): Kohana_Request->execute()
#19 {main} in file:line
2014-08-01 02:09:43 --- EMERGENCY: ErrorException [ 2 ]: date_timestamp_get() expects parameter 1 to be DateTime, string given ~ APPPATH/views/grafics/ganta.php [ 35 ] in file:line
2014-08-01 02:09:43 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'date_timestamp_...', '/home/bitrix/ex...', 35, Array)
#1 /home/bitrix/ext_www/otchet/application/views/grafics/ganta.php(35): date_timestamp_get('2014-07-30 12:2...')
#2 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(61): include('/home/bitrix/ex...')
#3 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(348): Kohana_View::capture('/home/bitrix/ex...', Array)
#4 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(228): Kohana_View->render()
#5 /home/bitrix/ext_www/otchet/application/views/tables/project.php(64): Kohana_View->__toString()
#6 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(61): include('/home/bitrix/ex...')
#7 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(348): Kohana_View::capture('/home/bitrix/ex...', Array)
#8 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(228): Kohana_View->render()
#9 /home/bitrix/ext_www/otchet/application/views/base/base_template.php(40): Kohana_View->__toString()
#10 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(61): include('/home/bitrix/ex...')
#11 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(348): Kohana_View::capture('/home/bitrix/ex...', Array)
#12 /home/bitrix/ext_www/otchet/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#13 /home/bitrix/ext_www/otchet/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#14 [internal function]: Kohana_Controller->execute()
#15 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Projects))
#16 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#17 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#18 /home/bitrix/ext_www/otchet/index.php(118): Kohana_Request->execute()
#19 {main} in file:line
2014-08-01 02:25:18 --- EMERGENCY: ErrorException [ 8 ]: A non well formed numeric value encountered ~ APPPATH/views/grafics/ganta.php [ 35 ] in file:line
2014-08-01 02:25:18 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(8, 'A non well form...', '/home/bitrix/ex...', 35, Array)
#1 /home/bitrix/ext_www/otchet/application/views/grafics/ganta.php(35): strtotime('Y-d-m', '2014-07-28 13:0...')
#2 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(61): include('/home/bitrix/ex...')
#3 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(348): Kohana_View::capture('/home/bitrix/ex...', Array)
#4 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(228): Kohana_View->render()
#5 /home/bitrix/ext_www/otchet/application/views/tables/project.php(64): Kohana_View->__toString()
#6 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(61): include('/home/bitrix/ex...')
#7 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(348): Kohana_View::capture('/home/bitrix/ex...', Array)
#8 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(228): Kohana_View->render()
#9 /home/bitrix/ext_www/otchet/application/views/base/base_template.php(40): Kohana_View->__toString()
#10 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(61): include('/home/bitrix/ex...')
#11 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(348): Kohana_View::capture('/home/bitrix/ex...', Array)
#12 /home/bitrix/ext_www/otchet/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#13 /home/bitrix/ext_www/otchet/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#14 [internal function]: Kohana_Controller->execute()
#15 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Projects))
#16 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#17 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#18 /home/bitrix/ext_www/otchet/index.php(118): Kohana_Request->execute()
#19 {main} in file:line
2014-08-01 03:23:47 --- EMERGENCY: View_Exception [ 0 ]: The requested view footer could not be found ~ SYSPATH/classes/Kohana/View.php [ 257 ] in /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php:137
2014-08-01 03:23:47 --- DEBUG: #0 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(137): Kohana_View->set_filename('footer')
#1 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(30): Kohana_View->__construct('footer', NULL)
#2 /home/bitrix/ext_www/otchet/application/views/base/base_template.php(42): Kohana_View::factory('footer')
#3 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(61): include('/home/bitrix/ex...')
#4 /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php(348): Kohana_View::capture('/home/bitrix/ex...', Array)
#5 /home/bitrix/ext_www/otchet/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#6 /home/bitrix/ext_www/otchet/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#7 [internal function]: Kohana_Controller->execute()
#8 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Projects))
#9 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#11 /home/bitrix/ext_www/otchet/index.php(118): Kohana_Request->execute()
#12 {main} in /home/bitrix/ext_www/otchet/system/classes/Kohana/View.php:137
2014-08-01 09:24:06 --- EMERGENCY: ErrorException [ 2 ]: unlink(/home/bitrix/ext_www/otchet//upload/Техническое_задание_Керамика_-_золотое.docx): No such file or directory ~ APPPATH/classes/Controller/Projects.php [ 74 ] in file:line
2014-08-01 09:24:06 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'unlink(/home/bi...', '/home/bitrix/ex...', 74, Array)
#1 /home/bitrix/ext_www/otchet/application/classes/Controller/Projects.php(74): unlink('/home/bitrix/ex...')
#2 /home/bitrix/ext_www/otchet/system/classes/Kohana/Controller.php(84): Controller_Projects->action_taskedit()
#3 [internal function]: Kohana_Controller->execute()
#4 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Projects))
#5 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /home/bitrix/ext_www/otchet/index.php(118): Kohana_Request->execute()
#8 {main} in file:line
2014-08-01 09:24:17 --- EMERGENCY: ErrorException [ 2 ]: unlink(/home/bitrix/ext_www/otchet/upload/Техническое_задание_Керамика_-_золотое.docx): No such file or directory ~ APPPATH/classes/Controller/Projects.php [ 74 ] in file:line
2014-08-01 09:24:17 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'unlink(/home/bi...', '/home/bitrix/ex...', 74, Array)
#1 /home/bitrix/ext_www/otchet/application/classes/Controller/Projects.php(74): unlink('/home/bitrix/ex...')
#2 /home/bitrix/ext_www/otchet/system/classes/Kohana/Controller.php(84): Controller_Projects->action_taskedit()
#3 [internal function]: Kohana_Controller->execute()
#4 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Projects))
#5 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /home/bitrix/ext_www/otchet/index.php(118): Kohana_Request->execute()
#8 {main} in file:line