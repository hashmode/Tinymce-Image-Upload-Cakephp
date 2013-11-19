Tinymce-Image-Upload-Cakephp
============================


Integration of Elfinder file manager(2.0-rc1) with tinymce(4.0.10) for Cakephp 2.x.
Allows to upload images(and other files) in tinymce. Can be a free alternative for Tinymce MoxieManager image upload plugin

## Source Plugins
1. Tinymce 4.0.1 http://www.tinymce.com/download/download.php (not included in Plugin, should be downloaded and installed separately) 
2. Elfinder 2.0-rc1 http://elfinder.org/ (already included in plugin)

## Installation

Considers that tinymce is already installed 

1. Copy TinymceElfinder folder into app/Plugin and Load Plugin adding `CakePlugin::load('TinymceElfinder');` line into `bootstrap.php`
2. Copy `elfinder.php` config file into `app/Config` folder
3. Add the helper and component in your controller 
```
public $helpers = array('TinymceElfinder.TinymceElfinder');
public $components = array('TinymceElfinder.TinymceElfinder');
```

4. In tinymce init add `file_browser_callback:elFinderBrowser`, and before the script tag(or file), where the tinymce init is located, add this 
`<?php $this->TinymceElfinder->defineElfinderBrowser()?>`

5. Create 2 functions in your controller,  
```
	public function elfinder() {
		$this->TinymceElfinder->elfinder();
	}
	public function connector() {
		$this->TinymceElfinder->connector();
	}
```

  and replace my_controller with your controller's name in `elfinder.php` config file


6. Create folder `Uploads` under `webroot/img`(default, can be changed from elfinder.php)

## Options
In elfinder.php config file 
`window_url` and  `connector_url` - are the urls by which the file manager window and connector are called, should be according to in which controller you create `elfinder()` and `connector()` functions(these can be changed as well), as described in 5th step.
For cake version 2.4 and above in config file use `Router::fullbaseUrl()`, otherwise `FULL_BASE_URL`

All the rest options are the elfinder plugin options 
https://github.com/Studio-42/elFinder/wiki/Connector-configuration-options

## IMPORTANT
If you get some error and than fix it be sure to empty the browser's Cache: CTRL + F5 will NOT help, perhaps because of iframes.

## License
Plugin per se is completely free to use in any application(including commercial) or to modify, merge, copy, distribute etc. unless these actions are not restricted by the source plugins' (Tinymce and Elfinder) license terms.





