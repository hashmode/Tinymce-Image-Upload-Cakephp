<?php 
/**
 * Elfinder integration in Tinymce for Cakphp 2.x
 * Can be a free alternative for Tinymce MoxieManager image upload plugin
 *
 * For Tinymce 4.0.1 and Elfinder 2.0-rc1
 * @link http://www.tinymce.com/download/download.php
 * @link http://elfinder.org/
 *
 * // this cake plugin was developed by
 * @link http://hashmode.com
 * github
 * @link https://github.com/hashmode/Tinymce-Image-Upload-Cakephp
 * 
 * with support from Cakephp Elfinder plugin
 * @link https://github.com/nstyle/cakephp-elfinder
 *
 * @license
 * Plugin per-se is completely free to use in any application(including commercial) and you can modify, merge, copy, distribute etc.
 * unless these actions are not restricted by the source plugins' (Tinymce and Elfinder) license terms.
 * 
 * Tinymce
 * @license LGPL
 * @link http://www.tinymce.com/wiki.php/TinyMCE3x:License
 * 
 * Elfinder
 * @license 3-clauses BSD license
 * @link https://github.com/Studio-42/elFinder#license 
 *
 */

App::uses('Component', 'Controller');
Configure::load('elfinder');

App::uses('elFinderConnector', 'TinymceElfinder.Lib', array('file' => 'TinymceElfinder/elFinderConnector.php'));
App::uses('elFinder', 'TinymceElfinder.Lib', array('file' => 'TinymceElfinder/Elfinder.php'));
App::uses('elFinderVolumeDriver', 'TinymceElfinder.Lib', array('file' => 'TinymceElfinder/elFinderVolumeDriver.php'));
App::uses('elFinderVolumeLocalFileSystem', 'TinymceElfinder.Lib', array('file'=> 'TinymceElfinder/elFinderVolumeLocalFileSystem.php'));

class TinymceElfinderComponent extends Component {
	public $controller = null;
	
	public function initialize(Controller $controller) {
		$this->controller = $controller;
	}	
	
	public function elfinder() {
		$this->controller->layoutPath =  '..' . DS . '..'. DS . 'Plugin' . DS . 'TinymceElfinder' . DS . 'View'. DS . 'Layouts';
		$this->controller->layout = 'elfinder'; 
		
		$this->controller->viewPath =  '..'. DS . 'Plugin' . DS . 'TinymceElfinder' . DS . 'View'. DS . 'TinymceElfinders';
		$this->controller->view = 'elfinder';

		$this->controller->set('connectorUrl', Configure::read('Elfinder.connector_url'));
		$this->controller->set('language', Configure::read('Elfinder.locale'));
	}
	
	public function access($attr, $path, $data, $volume) {
		return strpos(basename($path), '.') === 0       // if file/folder begins with '.' (dot)
		? !($attr == 'read' || $attr == 'write')    	// set read+write to false, other (locked+hidden) set to true
		:  null;                                    	// else elFinder decide it itself
	}
	
	// run elFinder
	public function connector(){
		$this->controller->autoRender = false;
		$options = Configure::read('Elfinder.options');
	
		$connector = new elFinderConnector(new elFinder($options));
		$connector->run();
	}
	
	
	
}