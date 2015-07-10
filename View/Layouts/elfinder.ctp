<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<?php echo $this->Html->charset(); ?>
		
		<?php echo $this->Html->css('TinymceElfinder.jquery-ui.css');?>
		<?php echo $this->Html->script('TinymceElfinder.jquerymin.js');?>
		<?php echo $this->Html->script('TinymceElfinder.jqueryuimin.js');?>
		
		<?php echo $this->Html->css('TinymceElfinder.elfinder.css');?>
		<?php echo $this->Html->css('TinymceElfinder.theme.css');?>
		
		<?php echo $this->Html->script('TinymceElfinder.elfinder.min.js');?>
		<?php echo $this->Html->script('TinymceElfinder.i18n/elfinder.ru.js');?>
		
	</head>
	<body>
		<?php echo $this->fetch('content');?>
	</body>
</html>