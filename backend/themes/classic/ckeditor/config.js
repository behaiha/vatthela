/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */
 var aegame = 'http://localhost/lovingrape.com';
CKEDITOR.editorConfig = function( config ) {
	
	 //Define changes to default configuration here. For example:
	 config.language = 'vi';
	 //config.uiColor = '#AADC6E';
	 config.pasteFromWordPromptCleanup = true;
	 config.pasteFromWordRemoveFontStyles = true;
	 config.pasteFromWordRemoveStyles  = true;
	 config.pasteFromWordNumberedHeadingToList  = true;
	 config.pasteFromWordCleanupFile = 'plugins/pastefromword/filter/custom.js';
	 //config new
     
    config.filebrowserBrowseUrl = aegame+'/backend/themes/classic/ckfinder/ckfinder.html';

    config.filebrowserImageBrowseUrl = aegame+'/backend/themes/classic/ckfinder/ckfinder.html?type=Images';

    config.filebrowserFlashBrowseUrl = aegame+'/backend/themes/classic/ckfinder/ckfinder.html?type=Flash';

    config.filebrowserUploadUrl = aegame+'/backend/themes/classic/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';

    config.filebrowserImageUploadUrl = aegame+'/backend/themes/classic/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';

    config.filebrowserFlashUploadUrl = aegame+'/backend/themes/classic/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';

};
