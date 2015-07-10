
<!-- Element where elFinder will be created (REQUIRED) -->
<div id="elfinder"></div>


<script type="text/javascript">
	var connectorUrl = '<?php echo $connectorUrl?>';
	var language = '<?php echo $language?>';
  var FileBrowserDialogue = {
    init: function() {
      // Here goes your code for setting your custom things onLoad.
    },
    mySubmit: function (URL) {
      // pass selected file path to TinyMCE
      top.tinymce.activeEditor.windowManager.getParams().setUrl(URL);

      // close popup window
      top.tinymce.activeEditor.windowManager.close();
    }
  }

  $().ready(function() {
     var elf = $('#elfinder').elfinder({
    	 lang : language,
      // set your elFinder options here
      url: connectorUrl,  // connector URL
      getFileCallback: function(file) { // editor callback
// actually file.url - doesnt work for me, but file does. (elfinder 2.0-rc1)
        FileBrowserDialogue.mySubmit(file); // pass selected file path to TinyMCE 
      }
    }).elfinder('instance');
  });
</script>
