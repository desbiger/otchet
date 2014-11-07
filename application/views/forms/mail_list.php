<?php

        $email = new EmailReader();
        $inbox = $email->getMessages(array(36));
	$email->GetAttachments(36);

//	$inbox = ParseMail::factory(8);
?>
<pre><? var_dump($inbox);?></pre>
<!--<pre>--><?// var_dump($mail) ?><!--</pre>-->
