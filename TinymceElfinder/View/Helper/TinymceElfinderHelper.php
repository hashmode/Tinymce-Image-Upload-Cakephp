<?php 
App::uses('AppHelper', 'View/Helper');
class TinymceElfinderHelper extends AppHelper {
	public function defineElfinderBrowser() {
		Configure::load('elfinder');
		echo '
		<script type="text/javascript">
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
		</script>';	
			
	}
}