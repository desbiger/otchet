<!DOCTYPE html>
<html>
<head>
	<title><?= $title ?></title>

	<?= HTML::script('/include/ganty/jQuery.Gantt-master/js/jquery.min.js') ?>
	<!--	--><? //= HTML::script('http://code.jquery.com/ui/1.11.0/jquery-ui.js') ?>
	<!--	--><? //= HTML::script('http://code.jquery.com/jquery-1.10.2.js') ?>
	<!--	--><? //= HTML::script('http://code.jquery.com/jquery-1.9.1.js') ?>

	<script type = "text/javascript" src = "/include/scripts/source/jquery.fancybox.pack.js"></script>
	<link rel = "stylesheet" href = "/include/scripts/source/jquery.fancybox.css"/>
	<script type = "text/javascript" src = "/include/scripts/tinymce_4.1.3/tinymce/js/tinymce/tinymce.min.js"></script>
	<script type = "text/javascript">

		$(function () {
			tinymce.init({
				selector: "textarea.tiny",
				height: 250,
				language: 'ru',
				theme: 'modern',
				plugins: [
					"advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
					"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
					"save table contextmenu directionality emoticons template paste textcolor"
				],
				content_css: "css/content.css",
				toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
				style_formats: [
					{title: 'Bold text', inline: 'b'},
					{title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
					{title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
					{title: 'Example 1', inline: 'span', classes: 'example1'},
					{title: 'Example 2', inline: 'span', classes: 'example2'},
					{title: 'Table styles'},
					{title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
				]
			});
			$('.fancy').fancybox({
				helpers: {
					title: null
				}
			});
		})
	</script>




	<?= HTML::script('/include/ganty/jQuery.Gantt-master/js/jquery.fn.gantt.js') ?>
	<?= HTML::script('http://taitems.github.com/UX-Lab/core/js/prettify.js') ?>
	<?= HTML::script('http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js') ?>



	<!--	--><? //= HTML::style('/include/style.css') ?>
	<?= HTML::style('/include/metro.css') ?>
	<?= HTML::style('/include/tabs.css') ?>
	<?= HTML::style('/include/gantti.css') ?>
	<?= HTML::style('http://code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css') ?>



	<?= HTML::script('/include/scripts/js.js') ?>
	<?= HTML::script('/include/scripts/tabs.js') ?>



	<script type = "text/javascript" src = "http://cdn.amcharts.com/lib/3/amcharts.js"></script>
	<script type = "text/javascript" src = "/include/scripts/amcharts_3.10.0.free/amcharts/serial.js"></script>
</head>
<body>
<div class = "content">
	<div class = "top">
		<?= $top_menu ?>
		<?= $user_block ?>
	</div>

	<div class = "clear"></div>
	<hr/>
	<div class = "wrapper">
		<?= $content ?>
	</div>
</div>
<?= View::factory('base/footer') ?>
</body>
<?= HTML::style('/include/jquery.datetimepicker.css') ?>
<?= HTML::script('/include/scripts/jquery.datetimepicker.js') ?>

</html>