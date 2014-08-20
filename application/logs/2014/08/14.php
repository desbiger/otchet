<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2014-08-14 18:10:57 --- EMERGENCY: Database_Exception [ 1452 ]: Cannot add or update a child row: a foreign key constraint fails (`otchet`.`objects`, CONSTRAINT `status` FOREIGN KEY (`status`) REFERENCES `object_statuses` (`id`)) [ INSERT INTO `objects` (`name`, `description`, `status`) VALUES ('Дверикурск', 'техподдержка, продвижение', '0') ] ~ MODPATH/database/classes/Kohana/Database/MySQL.php [ 194 ] in /home/bitrix/ext_www/otchet/modules/database/classes/Kohana/Database/Query.php:251
2014-08-14 18:10:57 --- DEBUG: #0 /home/bitrix/ext_www/otchet/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_MySQL->query(2, 'INSERT INTO `ob...', false, Array)
#1 /home/bitrix/ext_www/otchet/modules/orm/classes/Kohana/ORM.php(1324): Kohana_Database_Query->execute(Object(Database_MySQL))
#2 /home/bitrix/ext_www/otchet/modules/orm/classes/Kohana/ORM.php(1421): Kohana_ORM->create(NULL)
#3 /home/bitrix/ext_www/otchet/application/classes/Controller/Projects.php(21): Kohana_ORM->save()
#4 /home/bitrix/ext_www/otchet/system/classes/Kohana/Controller.php(84): Controller_Projects->action_index()
#5 [internal function]: Kohana_Controller->execute()
#6 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Projects))
#7 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /home/bitrix/ext_www/otchet/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /home/bitrix/ext_www/otchet/index.php(118): Kohana_Request->execute()
#10 {main} in /home/bitrix/ext_www/otchet/modules/database/classes/Kohana/Database/Query.php:251