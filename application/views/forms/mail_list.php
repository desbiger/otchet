<?php

	$email = new EmailReader();
	$inbox = $email->getUnseen();
//	$email->GetAttachments(36);

	//	$inbox = ParseMail::factory(8);
?>
<pre><? print_r($inbox); ?></pre>
<!--<pre>--><? // var_dump($mail) ?><!--</pre>-->
