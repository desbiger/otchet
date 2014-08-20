<!DOCTYPE html>
<html>
<head>
	<title><?= $title ?></title>
	<?= HTML::style('/include/style.css') ?>
	<?= HTML::style('http://code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css') ?>
<!--	--><?//= HTML::script('http://code.jquery.com/jquery-1.10.2.js') ?>
	<?= HTML::script('http://code.jquery.com/jquery-1.9.1.js') ?>
	<?= HTML::script('http://code.jquery.com/ui/1.11.0/jquery-ui.js') ?>
	<?= HTML::script('/include/scripts/js.js') ?>

	<?= HTML::script('/include/scripts/globalize.min.js') ?>
	<?= HTML::script('/include/scripts/dx.chartjs.js') ?>
</head>
<body>
<div class = "content">
	<?= $content ?>
</div>
</body>
<?= HTML::style('/include/jquery.datetimepicker.css') ?>
<?= HTML::script('/include/scripts/jquery.js') ?>
<?= HTML::script('/include/scripts/jquery.datetimepicker.js') ?>

</html>