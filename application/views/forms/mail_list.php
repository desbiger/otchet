<?php

        $email = new EmailReader();
        $inbox = $email->getMessages(array(7));

//	$inbox = ParseMail::factory(8);
?>
<pre><? print_r($inbox);?></pre>
<!--<pre>--><?// var_dump($mail) ?><!--</pre>-->
