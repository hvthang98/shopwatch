/**
 * @license Copyright (c) 2003-2021, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.filebrowserBrowseUrl = 'public/ckfinder/ckfinder.html';
	config.filebrowserUploadUrl = 'public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
	config.filebrowserWindowWidth = '1000';
	config.filebrowserWindowHeight ='700';
    // config.filebrowserFlashUploadUrl = '/public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
    // config.filebrowserImageUploadUrl = '/public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
    // config.filebrowserFlashBrowseUrl = '/public/ckfinder/ckfinder.html?type=Flash';
    // config.filebrowserImageBrowseUrl = '/public/ckfinder/ckfinder.html?type=Images';

};
