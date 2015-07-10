<?php 
App::uses('AppHelper', 'View/Helper');
class TinymceElfinderHelper extends AppHelper {
	public function defineElfinderBrowser($inline = true) {
		Configure::load('elfinder');
		$script = '
		function elFinderBrowser (field_name, url, type, win) {
			  tinymce.activeEditor.windowManager.open({
			    file: "'.Configure::read('Elfinder.window_url').'",
			    title: "'.Configure::read('Elfinder.title').'",
			    width: '.Configure::read('Elfinder.width').',  
			    height: '.Configure::read('Elfinder.height').',
			    resizable: "'.Configure::read('Elfinder.resizable').'"
			  }, {
			    setUrl: function (url) {
			      win.document.getElementById(field_name).value = url;
			    }
			  });
			  return false;
			}
		';
		if ($inline) echo '<script type="text/javascript">' . $script . '</script>';
		return $script;
	}
}
